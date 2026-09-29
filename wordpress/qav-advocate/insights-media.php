<?php
if(!defined('ABSPATH')) exit;
require_once get_template_directory().'/selected-media.php';
require_once get_template_directory().'/featured-video.php';
require_once get_template_directory().'/interview-archive.php';
// The hub reads the existing posts, media post type and editorial metadata.
function qav_hub_url(){
    $page=get_page_by_path('insights-media');
    return $page?get_permalink($page):home_url('/insights-media/');
}
function qav_hub_is_page(){return is_page('insights-media') || is_page_template('page-insights-media.php');}
function qav_hub_nav(){
    echo '<a href="'.esc_url(qav_hub_url()).'"'.(qav_hub_is_page()?' aria-current="page"':'').'>Insights &amp; Media</a>';
}
function qav_hub_create_page(){
    if(get_option('qav_hub_page_created'))return;
    $page=get_page_by_path('insights-media');
    if(!$page){
        $id=wp_insert_post(['post_title'=>'Insights & Media','post_name'=>'insights-media','post_type'=>'page','post_status'=>'publish'],true);
        if(is_wp_error($id) || !$id)return;
    }
    update_option('qav_hub_page_created',1,false);
}
add_action('after_switch_theme','qav_hub_create_page');
add_action('admin_init',function(){if(current_user_can('edit_theme_options'))qav_hub_create_page();});
add_action('wp_enqueue_scripts',function(){
    if(qav_hub_is_page())wp_enqueue_style('qav-insights-media',get_template_directory_uri().'/insights-media.css',['qav-upgrade'],filemtime(get_template_directory().'/insights-media.css'));
},20);
function qav_hub_posts($args,$featured_first=false){
    $args=array_merge(['post_type'=>'post','post_status'=>'publish','has_password'=>false,'posts_per_page'=>3,'ignore_sticky_posts'=>true,'no_found_rows'=>true,'orderby'=>'date','order'=>'DESC'],$args);
    if(!$featured_first)return (new WP_Query($args))->posts;
    $featured_args=$args;
    $featured_args['meta_query']=['relation'=>'AND',$args['meta_query']??[],['key'=>'_qav_featured','value'=>'1']];
    $posts=(new WP_Query($featured_args))->posts;
    if(count($posts)<$args['posts_per_page']){
        $args['post__not_in']=array_merge($args['post__not_in']??[],wp_list_pluck($posts,'ID'));
        $args['posts_per_page']-=count($posts);
        $posts=array_merge($posts,(new WP_Query($args))->posts);
    }
    return $posts;
}
function qav_hub_data(){
    $terms=get_terms(['taxonomy'=>['category','qav_media_category'],'hide_empty'=>true,'orderby'=>'name']);
    if(is_wp_error($terms))$terms=[];
    $token=isset($_GET['topic'])&&is_string($_GET['topic'])?sanitize_text_field(wp_unslash($_GET['topic'])):'';
    $selected=null;
    foreach($terms as $term)if($token===$term->taxonomy.'-'.$term->term_id){$selected=$term;break;}
    $insight_args=[];$media_args=['post_type'=>'qav_media'];
    if($selected){
        $filter=[['taxonomy'=>$selected->taxonomy,'field'=>'term_id','terms'=>$selected->term_id]];
        if($selected->taxonomy==='category'){$insight_args['tax_query']=$filter;$media_args['post__in']=[0];}
        else{$media_args['tax_query']=$filter;$insight_args['post__in']=[0];}
    }
    $featured=qav_hub_posts(array_merge($insight_args,['posts_per_page'=>1]),true);
    $featured=$featured[0]??null;
    $insights=qav_hub_posts($insight_args);
    $videos=qav_hub_posts(array_merge($media_args,['meta_query'=>[['key'=>'_qav_video_url','value'=>'','compare'=>'!=']]]),true);
    $media=qav_hub_posts($media_args,true);
    return compact('featured','insights','videos','media','terms','selected');
}
function qav_hub_item($item){
    $id=$item->ID;$media=$item->post_type==='qav_media';
    $terms=get_the_terms($id,$media?'qav_media_category':'category');
    $category=$terms&&!is_wp_error($terms)?$terms[0]->name:'';
    $source=$media&&function_exists('qav_video_source')?qav_video_source(get_post_meta($id,'_qav_video_url',true)):false;
    $recorded=$media?get_post_meta($id,'_qav_recorded_date',true):'';
    $date=$recorded?:get_the_date('Y-m-d',$id);
    return ['id'=>$id,'media'=>$media,'url'=>get_permalink($id),'title'=>get_the_title($id),'category'=>$category,
        'excerpt'=>wp_trim_words(wp_strip_all_tags(strip_shortcodes($item->post_excerpt?:$item->post_content)),30),
        'date'=>$date,'date_label'=>$recorded?wp_date(get_option('date_format'),strtotime($recorded.' 12:00:00')):get_the_date('j F Y',$id),
        'reading'=>max(1,(int)ceil(str_word_count(wp_strip_all_tags(strip_shortcodes($item->post_content)))/220)),
        'provider'=>$source?$source['provider']:'','channel'=>$media?get_post_meta($id,'_qav_channel',true):'',
        'duration'=>$media?get_post_meta($id,'_qav_duration',true):''];
}
function qav_hub_meta($item){?>
<div class="hub-meta">
<?php if($item['category']){?><span class="hub-category"><?php echo esc_html($item['category']);?></span><?php }?>
<?php if($item['channel']){?><span><?php echo esc_html($item['channel']);?></span><?php }?>
<?php if($item['provider']){?><span><?php echo esc_html($item['provider']);?></span><?php }?>
<time datetime="<?php echo esc_attr($item['date']);?>"><?php echo esc_html($item['date_label']);?></time>
<?php if(!$item['media']){?><span><?php echo absint($item['reading']);?> min read</span><?php }elseif($item['duration']){?><span><?php echo esc_html($item['duration']);?></span><?php }?>
</div>
<?php }
function qav_hub_image($item,$featured=false){?>
<div class="hub-card-visual">
<?php if(has_post_thumbnail($item['id']))echo get_the_post_thumbnail($item['id'],$featured?'large':'qav-card',['loading'=>$featured?'eager':'lazy','sizes'=>$featured?'(max-width: 700px) 90vw, 45vw':'(max-width: 700px) 90vw, (max-width: 1024px) 45vw, 30vw']);else{?><span class="hub-card-placeholder" aria-hidden="true">Q.</span><?php }?>
<?php if($item['provider']){?><span class="hub-play" aria-hidden="true"><svg viewBox="0 0 20 20"><path d="m5 3 11 7-11 7z" /></svg></span><?php }?>
</div>
<?php }
function qav_hub_action($item,$label){?>
<a class="text-link" href="<?php echo esc_url($item['url']);?>"><?php echo esc_html($label);?> <span aria-hidden="true">→</span><span class="sr-only">: <?php echo esc_html($item['title']);?></span></a>
<?php }
function qav_hub_feature($post){$item=qav_hub_item($post);?>
<article class="hub-feature">
  <div class="hub-feature-copy">
    <?php qav_hub_meta($item);?>
    <h2><a href="<?php echo esc_url($item['url']);?>"><?php echo esc_html($item['title']);?></a></h2>
    <?php if($item['excerpt']){?><p><?php echo esc_html($item['excerpt']);?></p><?php }?>
    <?php qav_hub_action($item,'Read Insight');?>
  </div>
  <?php qav_hub_image($item,true);?>
</article>
<?php }
function qav_hub_grid($posts,$kind='insight'){
    echo '<div class="'.($kind==='interview'?'hub-media-list':'hub-grid').'">';
    foreach($posts as $post){$item=qav_hub_item($post);?>
<article class="hub-card">
  <?php qav_hub_image($item);?>
  <div class="hub-card-copy">
    <?php qav_hub_meta($item);?>
    <h3><a href="<?php echo esc_url($item['url']);?>"><?php echo esc_html($item['title']);?></a></h3>
    <?php if($item['excerpt']){?><p><?php echo esc_html($item['excerpt']);?></p><?php }?>
    <?php qav_hub_action($item,$kind==='insight'?'Read Insight':($kind==='video'?'Watch':'View Interview'));?>
  </div>
</article>
<?php }echo '</div>';
}
function qav_hub_more($hub,$kind){
    if(!$hub[$kind] && !($kind==='insights'&&$hub['featured']))return;
    $url=$kind==='insights'?qav_insights_url():qav_media_url();
    if($hub['selected'])$url=add_query_arg('topic',$hub['selected']->term_id,$url);
    echo '<div class="hub-more"><a class="text-link" href="'.esc_url($url).'">'.($kind==='insights'?'View all Insights':'View all Media &amp; Interviews').' <span aria-hidden="true">→</span></a></div>';
}
function qav_hub_topics($hub){?>
<nav class="hub-topic-nav" aria-label="Filter insights and media by topic">
<a href="<?php echo esc_url(qav_hub_url().'#hub-featured');?>"<?php if(!$hub['selected'])echo ' aria-current="true"';?>>All</a>
<?php foreach($hub['terms'] as $term){$active=$hub['selected'] && $hub['selected']->term_id===$term->term_id && $hub['selected']->taxonomy===$term->taxonomy;?>
<a href="<?php echo esc_url(add_query_arg('topic',$term->taxonomy.'-'.$term->term_id,qav_hub_url()).'#hub-featured');?>"<?php if($active)echo ' aria-current="true"';?>><?php echo esc_html($term->name);?><small><?php echo $term->taxonomy==='category'?'Insight':'Media';?></small></a>
<?php }?></nav>
<?php }
function qav_hub_filter_status($hub){
    if(!$hub['selected'])return;
    echo '<p class="hub-filter-status">Showing topic: <strong>'.esc_html($hub['selected']->name).'</strong><a href="'.esc_url(qav_hub_url()).'">Show all insights and media</a></p>';
}
