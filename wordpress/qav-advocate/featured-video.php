<?php
if (!defined('ABSPATH')) exit;

// Initial supplied recordings; future admin fields can provide the same data.
function qav_featured_video_data() {
    $file = get_template_directory().'/assets/featured-videos.json';
    $initial = is_readable($file) ? json_decode(file_get_contents($file), true) : [];
    $items = apply_filters('qav_featured_video_items', is_array($initial) ? $initial : []);
    if (!is_array($items)) return [];
    $items = array_values(array_filter($items, static function($item) {
        if (!is_array($item)) return false;
        if (!empty($item['video_url'])) return true;
        $external = function_exists('qav_video_source') ? qav_video_source($item['external_url'] ?? '') : false;
        return $external && in_array($external['provider'], ['YouTube', 'Vimeo'], true);
    }));
    usort($items, static function($a, $b) { return (int)!empty($b['featured']) <=> (int)!empty($a['featured']); });
    return $items;
}
function qav_featured_video_url($url) {
    return preg_match('~^(https?://|/)~i', $url) ? $url : get_template_directory_uri().'/'.ltrim($url, '/');
}
function qav_featured_video_render($items) {
    if (!$items) return;
    echo '<div class="media-features">';
    foreach ($items as $item) {
        $local = !empty($item['video_url']);
        $title = !empty($item['title']) ? $item['title'] : 'Featured Video';
        $url = $local ? qav_featured_video_url($item['video_url']) : $item['external_url'];
        $poster = !empty($item['poster']) ? qav_featured_video_url($item['poster']) : '';
        $width = absint($item['width'] ?? 1280); $height = absint($item['height'] ?? 720);
        $duration = isset($item['duration_seconds']) ? (int)floor($item['duration_seconds']) : 0;
        ?>
      <article class="media-feature">
        <div class="media-feature-frame">
          <?php if ($local): ?>
          <video controls playsinline preload="none" width="<?php echo $width; ?>" height="<?php echo $height; ?>"<?php if ($poster): ?> poster="<?php echo esc_url($poster); ?>"<?php endif; ?> aria-label="<?php echo esc_attr($title); ?>" tabindex="0">
            <source src="<?php echo esc_url($url); ?>" type="<?php echo esc_attr($item['mime_type'] ?? 'video/mp4'); ?>">
            <p>Your browser cannot play this video. <a href="<?php echo esc_url($url); ?>">Open the original video</a>.</p>
          </video>
          <?php else: ?>
          <a class="media-feature-external" href="<?php echo esc_url($url); ?>" aria-label="<?php echo esc_attr('Watch '.$title); ?>"><?php if ($poster): ?><img src="<?php echo esc_url($poster); ?>" alt="" width="<?php echo $width; ?>" height="<?php echo $height; ?>" loading="lazy"><?php else: echo esc_html('Watch '.$title); endif; ?></a>
          <?php endif; ?>
        </div>
        <div class="media-feature-details">
          <div><p class="eyebrow media-feature-label"><?php echo !empty($item['featured']) ? 'FEATURED RECORDING' : 'RECORDING'; ?></p><h3><?php echo esc_html($title); ?></h3><?php if (!empty($item['description'])): ?><p class="media-feature-description"><?php echo esc_html($item['description']); ?></p><?php endif; ?></div>
          <div class="media-feature-facts">
            <?php if (!empty($item['category'])): ?><span><?php echo esc_html($item['category']); ?></span><?php endif; ?>
            <?php if (!empty($item['publication_date'])): ?><time datetime="<?php echo esc_attr($item['publication_date']); ?>"><?php echo esc_html($item['publication_date']); ?></time><?php endif; ?>
            <?php if ($duration): ?><span aria-label="<?php echo esc_attr('Duration: '.floor($duration/60).' minutes, '.($duration%60).' seconds'); ?>"><?php echo esc_html(sprintf('%02d:%02d', floor($duration/60), $duration%60)); ?></span><?php endif; ?>
            <a class="media-feature-open" href="<?php echo esc_url($url); ?>"><?php echo $local ? 'Open video' : 'Watch video'; ?> <span aria-hidden="true">↗</span></a>
          </div>
        </div>
        <p class="media-feature-status" role="status" aria-live="polite"></p>
      </article>
        <?php
    }
    echo '</div>';
}
add_action('wp_enqueue_scripts', function() {
    if (!qav_hub_is_page()) return;
    $directory = get_template_directory(); $uri = get_template_directory_uri();
    wp_enqueue_style('qav-featured-video', $uri.'/featured-video.css', ['qav-insights-media'], filemtime($directory.'/featured-video.css'));
    wp_enqueue_script('qav-featured-video', $uri.'/featured-video.js', [], filemtime($directory.'/featured-video.js'), true);
}, 21);
