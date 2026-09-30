<?php
if (!defined('ABSPATH')) exit;

function qav_detail_pages() {
    static $pages;
    if ($pages === null) $pages = require get_template_directory().'/detail-page-data.php';
    return $pages;
}

function qav_page_url($slug) {
    $page = get_page_by_path($slug);
    return $page ? get_permalink($page) : home_url('/'.$slug.'/');
}

function qav_detail_slug() {
    foreach (qav_detail_pages() as $slug => $page) {
        if (is_page($slug) || is_page_template('page-'.$slug.'.php')) return $slug;
    }
    return '';
}

// All primary navigation is rendered from one source on every native route.
function qav_global_nav() {
    $current = qav_detail_slug();
    $items = [
        ['Profile', qav_home_anchor('about'), is_front_page()],
        ['Practice', qav_page_url('practice'), $current === 'practice'],
        ['Experience', qav_page_url('experience'), $current === 'experience'],
        ['Advocacy', qav_page_url('advocacy'), $current === 'advocacy'],
        ['Insights & Media', qav_hub_url(), qav_hub_is_page()],
        ['Contact', qav_page_url('contact'), $current === 'contact'],
    ];
    foreach ($items as [$label, $url, $active]) {
        echo '<a href="'.esc_url($url).'"'.($active ? ' aria-current="page"' : '').'>'.esc_html($label).'</a>';
    }
}

// Follow the existing hub convention: create absent destination pages on theme
// activation or an authorized admin visit, without altering existing page data.
function qav_detail_create_pages() {
    if (get_option('qav_detail_pages_created')) return;
    foreach (qav_detail_pages() as $slug => $page) {
        if (get_page_by_path($slug)) continue;
        $id = wp_insert_post([
            'post_title' => $page['label'], 'post_name' => $slug,
            'post_type' => 'page', 'post_status' => 'publish',
        ], true);
        if (is_wp_error($id) || !$id) return;
    }
    update_option('qav_detail_pages_created', 1, false);
}
add_action('after_switch_theme', 'qav_detail_create_pages');
add_action('admin_init', function() {
    if (current_user_can('edit_theme_options')) qav_detail_create_pages();
});

add_action('wp_enqueue_scripts', function() {
    if (is_front_page()) {
        wp_add_inline_style('qav-upgrade', '.home-destination-link{margin-top:24px;}');
    }
    $slug = qav_detail_slug();
    if (!$slug) return;
    foreach (['detail-pages', $slug] as $style) {
        $dependencies = $style === 'detail-pages' ? ['qav-upgrade'] : ['qav-detail-pages'];
        wp_enqueue_style('qav-'.$style, get_template_directory_uri().'/'.$style.'.css', $dependencies, filemtime(get_template_directory().'/'.$style.'.css'));
    }
}, 20);
