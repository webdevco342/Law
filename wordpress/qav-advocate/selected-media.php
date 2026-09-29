<?php
if (!defined('ABSPATH')) exit;

// The manifest is the initial content. A future CMS can supply the same fields
// through this filter without changing the composition or its templates.
function qav_selected_media_data() {
    $path = get_template_directory().'/assets/selected-media.json';
    $initial = is_readable($path) ? json_decode(file_get_contents($path), true) : [];
    $photos = apply_filters('qav_selected_media_photos', is_array($initial) ? $initial : []);
    if (!is_array($photos)) return [];
    $photos = array_values(array_filter($photos, static function($photo) {
        return is_array($photo) && !empty($photo['url']) && !empty($photo['width']) && !empty($photo['height']);
    }));
    usort($photos, static function($a, $b) {
        return ((int)!empty($b['featured']) <=> (int)!empty($a['featured'])) ?: (($a['order'] ?? 0) <=> ($b['order'] ?? 0));
    });
    return $photos;
}
function qav_selected_media_url($url) {
    if (preg_match('~^(https?://|/)~i', $url)) return $url;
    return get_template_directory_uri().'/'.ltrim($url, '/');
}
function qav_selected_media_srcset($sources) {
    $values = [];
    foreach ($sources as $source) {
        if (!empty($source['url']) && !empty($source['width'])) $values[] = esc_url(qav_selected_media_url($source['url'])).' '.absint($source['width']).'w';
    }
    return implode(', ', $values);
}
function qav_selected_media_photo($photo, $index) {
    $featured = $index === 0;
    $sizes = $featured ? '(max-width: 600px) calc(100vw - 48px), (max-width: 900px) 70vw, 48vw' : '(max-width: 600px) calc(100vw - 60px), (max-width: 900px) 45vw, 23vw';
    $custom_link = !empty($photo['link']);
    $href = $custom_link ? $photo['link'] : qav_selected_media_url($photo['url']);
    $alt = $photo['alt'] ?? '';
    ?>
    <figure class="selected-media-photo<?php echo $featured ? ' selected-media-featured' : ''; ?>">
      <a href="<?php echo esc_url($href); ?>"<?php if (!$custom_link) echo ' data-photo-viewer'; ?> aria-label="<?php echo esc_attr(($custom_link ? 'Explore photograph: ' : 'View full photograph: ').$alt); ?>">
        <span class="selected-media-image"><picture>
          <?php if (!empty($photo['sources']['webp'])): ?><source type="image/webp" srcset="<?php echo esc_attr(qav_selected_media_srcset($photo['sources']['webp'])); ?>" sizes="<?php echo esc_attr($sizes); ?>"><?php endif; ?>
          <img src="<?php echo esc_url(qav_selected_media_url($photo['url'])); ?>"<?php if (!empty($photo['sources']['jpeg'])): ?> srcset="<?php echo esc_attr(qav_selected_media_srcset($photo['sources']['jpeg'])); ?>" sizes="<?php echo esc_attr($sizes); ?>"<?php endif; ?> alt="<?php echo esc_attr($alt); ?>" width="<?php echo absint($photo['width']); ?>" height="<?php echo absint($photo['height']); ?>" loading="lazy" decoding="async">
        </picture></span>
        <span class="selected-media-meta" aria-hidden="true"><span><?php echo esc_html(sprintf('%02d', $index + 1)); ?></span><span><?php echo $custom_link ? 'Explore photograph' : 'View photograph'; ?> <svg viewBox="0 0 20 20"><path d="M4 16 16 4M4 4h12v12"/></svg></span></span>
      </a>
      <?php if (!empty($photo['caption'])): ?><figcaption><?php echo esc_html($photo['caption']); ?></figcaption><?php endif; ?>
    </figure>
    <?php
}
function qav_selected_media_section() {
    $photos = qav_selected_media_data();
    if (!$photos) return;
    $supporting = array_slice($photos, 1);
    $split = (int)ceil(count($supporting) / 2);
    ?>
  <section class="hub-section selected-media" id="selected-media" aria-labelledby="selected-media-title">
    <div class="container">
      <div class="selected-media-heading"><div><p class="eyebrow">IN PICTURES</p><h2 id="selected-media-title">Selected Media</h2></div><span class="selected-media-count"><?php echo esc_html(sprintf('%02d', count($photos))); ?> PHOTOGRAPHS</span></div>
      <div class="selected-media-composition">
        <?php qav_selected_media_photo($photos[0], 0); ?>
        <?php foreach ([array_slice($supporting, 0, $split), array_slice($supporting, $split)] as $column => $rail): if (!$rail) continue; ?>
        <div class="selected-media-rail">
          <?php foreach ($rail as $index => $photo) qav_selected_media_photo($photo, 1 + $column * $split + $index); ?>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
    <?php
}
add_action('wp_enqueue_scripts', function() {
    if (!qav_hub_is_page()) return;
    $directory = get_template_directory();
    $uri = get_template_directory_uri();
    wp_enqueue_style('qav-selected-media', $uri.'/selected-media.css', ['qav-insights-media'], filemtime($directory.'/selected-media.css'));
    wp_enqueue_script('qav-selected-media', $uri.'/selected-media.js', [], filemtime($directory.'/selected-media.js'), true);
}, 21);
