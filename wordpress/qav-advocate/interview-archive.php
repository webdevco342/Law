<?php
if (!defined('ABSPATH')) exit;

function qav_interview_data() {
    $file = get_template_directory().'/assets/interviews.json';
    $initial = is_readable($file) ? json_decode(file_get_contents($file), true) : [];
    $items = apply_filters('qav_interview_items', is_array($initial) ? $initial : []);
    if (!is_array($items)) return [];
    $items = array_values(array_filter($items, static function($item) {
        if (!is_array($item)) return false;
        if (!empty($item['videoSource'])) return true;
        $url = wp_parse_url($item['externalUrl'] ?? '');
        return $url && ($url['scheme'] ?? '') === 'https' && in_array(strtolower($url['host'] ?? ''), ['youtube.com', 'www.youtube.com', 'm.youtube.com', 'youtu.be'], true);
    }));
    usort($items, static function($a, $b) {
        return ((int)!empty($b['featured']) <=> (int)!empty($a['featured'])) ?: (($a['order'] ?? 0) <=> ($b['order'] ?? 0));
    });
    return $items;
}
function qav_interview_url($url) {
    return preg_match('~^(https?://|/)~i', $url) ? $url : get_template_directory_uri().'/'.ltrim($url, '/');
}
function qav_interview_render($items) {
    if (!$items) return;
    echo '<div class="interview-archive">';
    foreach ($items as $index => $item) {
        $lead = $index === 0; $local = !empty($item['videoSource']);
        $title = !empty($item['title']) ? $item['title'] : ($lead ? 'Featured Interview' : sprintf('Interview %02d', $index + 1));
        $url = $local ? qav_interview_url($item['videoSource']) : $item['externalUrl'];
        $poster = !empty($item['poster']) ? qav_interview_url($item['poster']) : '';
        $width = max(1, absint($item['width'] ?? 1280)); $height = max(1, absint($item['height'] ?? 720));
        $duration = (int)floor($item['durationSeconds'] ?? 0);
        ?>
        <article class="interview<?php echo $lead ? ' interview--featured' : ''; ?>">
          <div class="interview-frame" style="--interview-ratio: <?php echo $width; ?> / <?php echo $height; ?>">
            <?php if ($local): ?>
            <video controls playsinline preload="none" width="<?php echo $width; ?>" height="<?php echo $height; ?>"<?php if ($poster): ?> poster="<?php echo esc_url($poster); ?>"<?php endif; ?> aria-label="<?php echo esc_attr($title); ?>" tabindex="0">
              <source src="<?php echo esc_url($url); ?>" type="<?php echo esc_attr($item['mimeType'] ?? 'video/mp4'); ?>">
              <p>Your browser cannot play this video. <a href="<?php echo esc_url($url); ?>">Open the original video</a>.</p>
            </video>
            <?php else: ?>
            <a class="interview-external" href="<?php echo esc_url($url); ?>" aria-label="<?php echo esc_attr('Watch '.$title.' on YouTube'); ?>"><?php if ($poster): ?><img src="<?php echo esc_url($poster); ?>" alt="" width="<?php echo $width; ?>" height="<?php echo $height; ?>" loading="lazy"><?php else: echo esc_html('Watch '.$title.' on YouTube'); endif; ?></a>
            <?php endif; ?>
          </div>
          <div class="interview-details">
            <div><?php if ($lead): ?><p class="eyebrow interview-label">01 / SELECTED RECORDING</p><?php endif; ?><h3><?php echo esc_html($title); ?></h3><?php if (!empty($item['description'])): ?><p class="interview-description"><?php echo esc_html($item['description']); ?></p><?php endif; ?></div>
            <div class="interview-facts">
              <?php if (!empty($item['category'])): ?><span><?php echo esc_html($item['category']); ?></span><?php endif; ?>
              <?php if (!empty($item['date'])): ?><time datetime="<?php echo esc_attr($item['date']); ?>"><?php echo esc_html($item['date']); ?></time><?php endif; ?>
              <?php if ($duration): ?><span class="interview-duration" aria-label="<?php echo esc_attr('Duration: '.floor($duration/60).' minutes, '.($duration%60).' seconds'); ?>"><?php echo esc_html(sprintf('%02d:%02d', floor($duration/60), $duration%60)); ?></span><?php endif; ?>
              <a class="interview-open" href="<?php echo esc_url($url); ?>" aria-label="<?php echo esc_attr(($local ? 'Open original video: ' : 'Watch on YouTube: ').$title); ?>"><?php echo $local ? 'Open video' : 'Watch video'; ?> <span aria-hidden="true">↗</span></a>
            </div>
          </div>
          <p class="interview-status" role="status" aria-live="polite"></p>
        </article>
        <?php
    }
    echo '</div>';
}
add_action('wp_enqueue_scripts', function() {
    if (!qav_hub_is_page()) return;
    $directory = get_template_directory(); $uri = get_template_directory_uri();
    wp_enqueue_style('qav-interview-archive', $uri.'/interview-archive.css', ['qav-insights-media'], filemtime($directory.'/interview-archive.css'));
    wp_enqueue_script('qav-interview-archive', $uri.'/interview-archive.js', [], filemtime($directory.'/interview-archive.js'), true);
}, 21);
