<?php
if (!defined('ABSPATH')) exit;
require_once get_template_directory().'/insights-media.php';
require_once get_template_directory().'/detail-pages.php';
// The companion plugin keeps publication data independent of the theme.
if (!function_exists('qav_profile')) {
    function qav_profile($key) {
        $defaults=['name'=>'Qurat-ul-Ain Viirk','designation'=>'Advocate High Court','email'=>'wicky.mechanier1446@gmail.com','phone'=>'+92 313 7277355','phone_secondary'=>'+92 303 5980803','address'=>"4B One Lahore, Qurban Police Lines,\nJail Road, Lahore",'portrait_id'=>0,'seo_title'=>'Qurat-ul-Ain Viirk | Advocate High Court Lahore','seo_description'=>'Qurat-ul-Ain Viirk, Advocate High Court in Lahore. Legal advocacy, institutional advisory and rights-focused practice.'];
        return $defaults[$key] ?? '';
    }
    add_action('admin_notices',function(){echo '<div class="notice notice-warning"><p>Activate the included QAV Publishing plugin to manage the professional profile and media library.</p></div>';});
}
function qav_theme_setup(){
    add_theme_support('title-tag'); add_theme_support('post-thumbnails'); add_theme_support('responsive-embeds');
    add_theme_support('html5',['search-form','gallery','caption','style','script']); add_theme_support('editor-styles');
    add_editor_style('editor.css'); add_image_size('qav-card',800,500,true);
}
add_action('after_setup_theme','qav_theme_setup');
function qav_assets(){
    wp_enqueue_style('qav-core',get_template_directory_uri().'/style.css',[],filemtime(get_template_directory().'/style.css'));
    wp_enqueue_style('qav-upgrade',get_template_directory_uri().'/upgrade.css',['qav-core'],filemtime(get_template_directory().'/upgrade.css'));
    wp_enqueue_script('qav-site',get_template_directory_uri().'/script.js',[],filemtime(get_template_directory().'/script.js'),['strategy'=>'defer','in_footer'=>true]);
    wp_enqueue_script('qav-video',get_template_directory_uri().'/media.js',[],filemtime(get_template_directory().'/media.js'),['strategy'=>'defer','in_footer'=>true]);
}
add_action('wp_enqueue_scripts','qav_assets');
// Keep WordPress's route/page-count validation aligned with the six-item archives.
add_action('pre_get_posts',function($query){
    if(is_admin() || !$query->is_main_query() || !($query->is_home() || $query->is_post_type_archive('qav_media') || $query->is_category() || $query->is_tax('qav_media_category')))return;
    $query->set('posts_per_page',6);$query->set('post_status','publish');$query->set('ignore_sticky_posts',true);
    $search=isset($_GET['query'])&&is_string($_GET['query'])?sanitize_text_field(wp_unslash($_GET['query'])):'';
    $topic=isset($_GET['topic'])&&is_scalar($_GET['topic'])?absint($_GET['topic']):0;
    if($search)$query->set('s',$search);
    if($topic)$query->set('tax_query',[['taxonomy'=>$query->is_post_type_archive('qav_media')?'qav_media_category':'category','field'=>'term_id','terms'=>$topic]]);
    if($query->is_home()&&!$search&&!$topic){$featured=get_posts(['post_type'=>'post','post_status'=>'publish','numberposts'=>1,'meta_query'=>[['key'=>'_qav_featured','value'=>'1']],'fields'=>'ids']);if($featured)$query->set('post__not_in',$featured);}
});
function qav_asset($path){return get_template_directory_uri().'/'.ltrim($path,'/');}
function qav_home_anchor($id){return is_front_page() ? '#'.$id : home_url('/#'.$id);}
function qav_insights_url(){return get_permalink((int)get_option('page_for_posts')) ?: home_url('/insights/');}
function qav_media_url(){return get_post_type_archive_link('qav_media') ?: home_url('/media/');}
function qav_tel($key){return 'tel:'.preg_replace('/[^+0-9]/','',qav_profile($key));}
function qav_portrait($hero=false){
    $id=(int)qav_profile('portrait_id');
    if($id && wp_attachment_is_image($id)) {
        echo '<span class="client-portrait">'.wp_get_attachment_image($id,$hero?'large':'thumbnail',false,['alt'=>'Qurat-ul-Ain Viirk, Advocate High Court','loading'=>$hero?'eager':'lazy','fetchpriority'=>$hero?'high':'auto']).'</span>';return;
    }
    $sizes=$hero?'(max-width: 700px) 90vw, (max-width: 1100px) 40vw, 440px':'90px';
    echo '<picture class="client-portrait">';
    foreach(['avif','webp'] as $format){$src=[];foreach([480,800,1186] as $w)$src[]=esc_url(qav_asset("assets/images/portrait-$w.$format"))." {$w}w";echo '<source type="image/'.esc_attr($format).'" srcset="'.esc_attr(implode(', ',$src)).'" sizes="'.esc_attr($sizes).'">';}
    echo '<img src="'.esc_url(qav_asset('assets/images/portrait-800.jpg')).'" srcset="'.esc_url(qav_asset('assets/images/portrait-480.jpg')).' 480w, '.esc_url(qav_asset('assets/images/portrait-800.jpg')).' 800w, '.esc_url(qav_asset('assets/images/portrait-1186.jpg')).' 1186w" sizes="'.esc_attr($sizes).'" width="1186" height="1582" alt="Qurat-ul-Ain Viirk, Advocate High Court" loading="'.($hero?'eager':'lazy').'" fetchpriority="'.($hero?'high':'auto').'" decoding="async"></picture>';
}
function qav_author_name($id=0){return get_post_meta($id?:get_the_ID(),'_qav_author',true) ?: 'Qurat-ul-Ain Viirk';}
function qav_description(){
    $detail=qav_detail_slug();
    if($detail) return get_post_meta(get_the_ID(),'_qav_seo_description',true) ?: qav_detail_pages()[$detail]['description'];
    if(qav_hub_is_page()) return 'Legal perspectives, professional commentary and selected media appearances from Qurat-ul-Ain Viirk, Advocate High Court.';
    if(is_front_page()) return qav_profile('seo_description');
    if(is_page('privacy')) return 'How the Qurat-ul-Ain Viirk website handles enquiries, administration cookies and optional video players.';
    if(is_singular()) return get_post_meta(get_the_ID(),'_qav_seo_description',true) ?: wp_trim_words(wp_strip_all_tags(get_the_excerpt()),30,'…');
    return is_post_type_archive('qav_media')?'Media, interviews and legal conversations from Qurat-ul-Ain Viirk, Advocate High Court.':'Legal insights and professional perspectives from Qurat-ul-Ain Viirk, Advocate High Court.';
}
add_filter('pre_get_document_title',function($title){
    $detail=qav_detail_slug();
    if($detail) return get_post_meta(get_the_ID(),'_qav_seo_title',true) ?: qav_detail_pages()[$detail]['title'];
    if(is_front_page()) return qav_profile('seo_title');
    if(is_singular()){ $custom=get_post_meta(get_the_ID(),'_qav_seo_title',true); return ($custom?:get_the_title()).' | Qurat-ul-Ain Viirk'; }
    return (is_post_type_archive('qav_media')?'Media & Interviews':(is_404()?'Page not found':'Insights & Perspectives')).' | Qurat-ul-Ain Viirk';
});
function qav_metadata(){
    // Let an established SEO plugin own metadata if the host installs one.
    if(defined('WPSEO_VERSION') || defined('RANK_MATH_VERSION') || defined('AIOSEO_VERSION')) return;
    $url=is_singular()?get_permalink():(is_front_page()?home_url('/'): (is_post_type_archive('qav_media')?qav_media_url():qav_insights_url()));
    $photo=is_singular() && has_post_thumbnail()?get_the_post_thumbnail_url(null,'large'):qav_asset('assets/images/portrait-800.jpg');
    if((int)qav_profile('portrait_id') && !(is_singular() && has_post_thumbnail())) $photo=wp_get_attachment_image_url((int)qav_profile('portrait_id'),'large')?:$photo;
    echo '<meta name="description" content="'.esc_attr(qav_description()).'">';
    echo '<meta property="og:type" content="'.(is_singular('post')?'article':'website').'"><meta property="og:locale" content="en_PK">';
    foreach(['title'=>wp_get_document_title(),'description'=>qav_description(),'url'=>$url,'image'=>$photo,'site_name'=>'Qurat-ul-Ain Viirk'] as $key=>$value) echo '<meta property="og:'.esc_attr($key).'" content="'.esc_attr($value).'">';
    echo '<meta name="twitter:card" content="summary_large_image">';
    if(!is_singular() && !is_404()) echo '<link rel="canonical" href="'.esc_url($url.(get_query_var('paged')>1?'page/'.absint(get_query_var('paged')).'/':'')).'">';
    $person=['@type'=>'Person','@id'=>home_url('/#advocate'),'name'=>'Qurat-ul-Ain Viirk','jobTitle'=>'Advocate High Court','url'=>home_url('/'),'image'=>$photo];
    if(is_front_page()){$person['telephone']=[qav_profile('phone'),qav_profile('phone_secondary')];$person['email']=qav_profile('email');$person['address']=['@type'=>'PostalAddress','streetAddress'=>qav_profile('address'),'addressLocality'=>'Lahore','addressCountry'=>'PK'];$person['knowsLanguage']=['Urdu','English','Punjabi'];$data=$person;}
    elseif(is_singular('post')){$data=['@type'=>'Article','headline'=>get_the_title(),'description'=>qav_description(),'datePublished'=>get_the_date(DATE_W3C),'dateModified'=>get_the_modified_date(DATE_W3C),'author'=>['@type'=>'Person','name'=>qav_author_name()],'mainEntityOfPage'=>$url];if(has_post_thumbnail())$data['image']=$photo;}
    else{$data=['@type'=>'WebPage','name'=>wp_get_document_title(),'description'=>qav_description(),'url'=>$url];}
    $data['@context']='https://schema.org';echo '<script type="application/ld+json">'.wp_json_encode($data,JSON_HEX_TAG|JSON_HEX_AMP|JSON_HEX_APOS|JSON_HEX_QUOT|JSON_UNESCAPED_SLASHES).'</script>';
}
add_action('wp_head','qav_metadata',5);
function qav_empty($media=false,$search=false){?>
<div class="publication-empty"><span class="empty-index" aria-hidden="true"><?php echo $media?'▷':'Aa';?></span><div><p class="eyebrow"><?php echo $media?'CONVERSATIONS & PERSPECTIVES':'THE LEGAL JOURNAL';?></p><h2><?php echo $search?'No matching publications.':($media?'Conversations, to come.':'Insights are forthcoming.');?></h2><p><?php echo $search?'Try another search or category.':'New publications will appear here when published.';?></p></div></div>
<?php }
function qav_card($heading='h2'){
    $media=get_post_type()==='qav_media';$taxonomy=$media?'qav_media_category':'category';$terms=get_the_terms(get_the_ID(),$taxonomy);$term=$terms&&!is_wp_error($terms)?$terms[0]->name:'';
    $heading=in_array($heading,['h2','h3'],true)?$heading:'h2';?>
<article class="publication-card"><a class="card-image" href="<?php the_permalink();?>" tabindex="-1" aria-hidden="true"><?php if(has_post_thumbnail()) the_post_thumbnail('qav-card',['alt'=>'','loading'=>'lazy']); else echo '<span class="image-placeholder">'.($media?'▷':'Q.').'</span>';if($media)echo '<span class="play-badge">WATCH INTERVIEW ↗</span>';?></a><div class="card-meta"><?php if($term)echo '<span>'.esc_html($term).'</span><span aria-hidden="true">·</span>';?><time datetime="<?php echo esc_attr(get_the_date(DATE_W3C));?>"><?php echo esc_html(get_the_date('j F Y'));?></time></div><<?php echo $heading;?>><a href="<?php the_permalink();?>"><?php the_title();?></a></<?php echo $heading;?>><p><?php echo esc_html(wp_trim_words(get_the_excerpt(),27));?></p><?php if(!$media){?><p class="card-byline"><?php echo esc_html(qav_author_name());?> · <?php echo max(1,(int)ceil(str_word_count(wp_strip_all_tags(get_the_content()))/220));?> min read</p><?php }?><a class="text-link" href="<?php the_permalink();?>"><?php echo $media?'Watch & Read':'Read Insight';?> <span aria-hidden="true">↗</span><span class="sr-only">: <?php the_title();?></span></a></article>
<?php }
function qav_home_publications($type){
    $args=['post_type'=>$type,'post_status'=>'publish','posts_per_page'=>3,'ignore_sticky_posts'=>true,'meta_query'=>[['key'=>'_qav_featured','value'=>'1']]];
    $featured=new WP_Query($args);$ids=wp_list_pluck($featured->posts,'ID');$posts=$featured->posts;
    if(count($posts)<3){unset($args['meta_query']);$args['posts_per_page']=3-count($posts);$args['post__not_in']=$ids;$latest=new WP_Query($args);$posts=array_merge($posts,$latest->posts);}
    if(!$posts){qav_empty($type==='qav_media');return;}
    echo '<div class="publication-grid '.($type==='qav_media'?'media-featured-grid':'insights-home-grid').'">';global $post;foreach($posts as $post){setup_postdata($post);qav_card('h3');}wp_reset_postdata();echo '</div>';
}
function qav_author_module(){
    if(qav_author_name()!=='Qurat-ul-Ain Viirk'){echo '<aside class="author-module"><div></div><div><p class="eyebrow">AUTHOR</p><h2>'.esc_html(qav_author_name()).'</h2></div></aside>';return;}?>
<aside class="author-module" aria-label="About the author"><?php qav_portrait();?><div><p class="eyebrow">ABOUT THE AUTHOR</p><h2>Qurat-ul-Ain Viirk</h2><p>Advocate High Court, Lahore. Her practice brings together litigation, institutional advisory and a commitment to human rights and legal education.</p><a class="text-link" href="<?php echo esc_url(qav_home_anchor('about'));?>">View professional profile ↗</a></div></aside>
<?php }
function qav_related(){
    $type=get_post_type();$tax=$type==='qav_media'?'qav_media_category':'category';$ids=wp_get_post_terms(get_the_ID(),$tax,['fields'=>'ids']);if(!$ids||is_wp_error($ids))return;
    $q=new WP_Query(['post_type'=>$type,'post_status'=>'publish','posts_per_page'=>3,'post__not_in'=>[get_the_ID()],'tax_query'=>[['taxonomy'=>$tax,'field'=>'term_id','terms'=>$ids]],'ignore_sticky_posts'=>true]);
    if(!$q->have_posts())return;echo '<section class="related-section"><div class="container"><h2>Continue exploring.</h2><div class="publication-grid">';while($q->have_posts()){$q->the_post();qav_card('h3');}echo '</div></div></section>';wp_reset_postdata();
}
function qav_practice_insights(){
    $slugs=['civil-law','criminal-law','corporate-law','banking-law','property-lda','workplace-harassment','womens-rights'];
    $terms=get_terms(['taxonomy'=>'category','slug'=>$slugs,'hide_empty'=>true]);if(!$terms||is_wp_error($terms))return;
    echo '<aside class="practice-reading"><p class="eyebrow">EXPLORE RELATED INSIGHTS</p><nav aria-label="Insights by practice area">';foreach($terms as $term)echo '<a href="'.esc_url(add_query_arg('topic',$term->term_id,qav_insights_url())).'">'.esc_html($term->name).' ↗</a>';echo '</nav></aside>';
}
// Native block editor supplies formatting, image uploads, revisions and scheduling.
add_filter('comments_open','__return_false');add_filter('pings_open','__return_false');
add_action('after_switch_theme',function(){
    if(!get_page_by_path('insights')) wp_insert_post(['post_title'=>'Insights','post_name'=>'insights','post_type'=>'page','post_status'=>'publish']);
    $insights=get_page_by_path('insights');if($insights && !get_option('page_for_posts'))update_option('page_for_posts',$insights->ID);
    if(!get_option('page_on_front')){
        $front=get_page_by_path('home');$id=$front?$front->ID:wp_insert_post(['post_title'=>'Qurat-ul-Ain Viirk','post_name'=>'home','post_type'=>'page','post_status'=>'publish']);
        if($id&&!is_wp_error($id)){update_option('page_on_front',$id);update_option('show_on_front','page');}
    }
    if(!get_page_by_path('privacy'))wp_insert_post(['post_title'=>'Privacy Notice','post_name'=>'privacy','post_type'=>'page','post_status'=>'publish']);
    if(!get_option('permalink_structure'))update_option('permalink_structure','/insights/%postname%/');
    flush_rewrite_rules();
});
