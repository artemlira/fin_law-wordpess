<?php

/**
 * Hero block on the Career page template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
//$quote = !empty(get_field('quote')) ? get_field('quote') : 'Your quote here...';
$title = get_field('title');
$level_title = get_field('level_title');
$text = get_field('text');
$image = get_field('image');
// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
  $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}
// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'career-hero-section';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?> class="<?php echo esc_attr($class_name); ?>">
  <div class="career-hero__container">
    <div class="career-hero-content">
      <?php if (!empty($title)): ?>
      <<?= $level_title; ?> class="career-hero-title"><?= $title ?></<?= $level_title; ?>>
    <?php endif; ?>
    <?php if (!empty($text)): ?>
      <div class="career-hero-text"><?= $text; ?></div>
    <?php endif; ?>
  </div>
  <div class="career-hero-image-wrapper">
    <?php if (!empty($image)): ?>
      <img
          class="career-hero-image"
          src="<?= $image['url']; ?>"
          alt="<?= $image['alt'] ?>"
          width="588"
          height="320"
          loading="lazy"
      >
    <?php endif; ?>
  </div>
  </div>
</section>

