<?php

/**
 * About block on the Main page template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
//$quote = !empty(get_field('quote')) ? get_field('quote') : 'Your quote here...';
$title = get_field('title');
$level_title = get_field('level_title');
$text = get_field('text');
$cards = get_field('about_cards');
// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
  $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}
// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'main-about-section panel';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?> class="<?php echo esc_attr($class_name); ?>">
  <div class="main-about__container outer">
    <div class="main-about-wrapper">
      <?php if (!empty($title)): ?>
      <<?= $level_title; ?> class="main-about-title"><?= $title ?></<?= $level_title; ?>>
    <?php endif; ?>
    <?php if (!empty($text)): ?>
      <div class="main-about-text-overlay">
        <div class="main-about-text"><?= $text; ?></div>
      </div>
    <?php endif; ?>
  </div>
  </div>
</section>


