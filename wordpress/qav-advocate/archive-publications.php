<?php
if(!defined('ABSPATH')) exit;
$media=is_post_type_archive('qav_media') || is_tax('qav_media_category');$type=$media?'qav_media':'post';$tax=$media?'qav_media_category':'category';
$base=$media?qav_media_url():qav_insights_url();
$search=isset($_GET['query'])&&is_string($_GET['query'])?sanitize_text_field(wp_unslash($_GET['query'])):'';
$category=isset($_GET['topic'])&&is_scalar($_GET['topic'])?absint($_GET['topic']):0;
if(is_category()||is_tax('qav_media_category'))$category=get_queried_object_id();
$paged=max(1,absint(get_query_var('paged')),absint(get_query_var('page')));
$args=['post_type'=>$type,'post_status'=>'publish','posts_per_page'=>6,'paged'=>$paged,'s'=>$search,'ignore_sticky_posts'=>true];
$featured=null;
if(!$media && !$search && !$category){$featured_query=new WP_Query(['post_type'=>'post','post_status'=>'publish','posts_per_page'=>1,'meta_query'=>[['key'=>'_qav_featured','value'=>'1']],'ignore_sticky_posts'=>true]);if($featured_query->posts){$featured=$featured_query->posts[0];$args['post__not_in']=[$featured->ID];}}
if($category)$args['tax_query']=[['taxonomy'=>$tax,'field'=>'term_id','terms'=>$category]];
$publications=new WP_Query($args);$terms=get_terms(['taxonomy'=>$tax,'hide_empty'=>true]);
get_header(); ?>
<main id="main" class="archive-main" tabindex="-1"><div class="container"><p class="eyebrow">QURAT-UL-AIN VIIRK / <?php echo $media?'MEDIA':'THE LEGAL JOURNAL';?></p><h1><?php echo $media?'Media &amp; interviews.':'Insights &amp; perspectives.';?></h1><p class="archive-intro"><?php echo $media?'Conversations, interviews and commentary on law and society.':'Legal analysis and reflections from the practice. A space for considered perspectives and informed discussion.';?></p>
<form class="archive-tools" role="search" method="get" action="<?php echo esc_url($base);?>"><label for="publication-search">Search <?php echo $media?'media':'insights';?><input id="publication-search" name="query" type="search" value="<?php echo esc_attr($search);?>" placeholder="Search by keyword"></label><label for="publication-topic">Category<select id="publication-topic" name="topic"><option value="">All categories</option><?php if(!is_wp_error($terms))foreach($terms as $term){?><option value="<?php echo absint($term->term_id);?>" <?php selected($category,$term->term_id);?>><?php echo esc_html($term->name);?></option><?php }?></select></label><button class="button button-gold" type="submit">Apply filters <span aria-hidden="true">↗</span></button><?php if($search||$category){?><a class="filter-reset" href="<?php echo esc_url($base);?>">Clear filters</a><?php }?></form>
<?php if($featured && $paged===1){global $post;$post=$featured;setup_postdata($post);echo '<section class="archive-featured" aria-label="Featured insight"><p class="eyebrow">FEATURED INSIGHT</p>';qav_card();echo '</section>';wp_reset_postdata();}
if($publications->have_posts()){?><p class="archive-summary"><?php $count=$publications->found_posts+($featured?1:0);echo esc_html(sprintf('%s publication%s',number_format_i18n($count),$count===1?'':'s'));if($search)echo ' matching “'.esc_html($search).'”';?></p><div class="publication-grid"><?php while($publications->have_posts()){$publications->the_post();qav_card();}?></div><?php
$pagination=paginate_links(['base'=>str_replace(999999999,'%#%',esc_url(get_pagenum_link(999999999))),'format'=>'?paged=%#%','current'=>$paged,'total'=>$publications->max_num_pages,'prev_text'=>'← Previous','next_text'=>'Next →','type'=>'array','add_args'=>array_filter(['query'=>$search,'topic'=>$category])]);
if($pagination)echo '<nav class="pagination" aria-label="Publications pages">'.implode('',$pagination).'</nav>';
}elseif(!$featured){qav_empty($media,(bool)($search||$category));}wp_reset_postdata();?></div></main><?php get_footer(); ?>
