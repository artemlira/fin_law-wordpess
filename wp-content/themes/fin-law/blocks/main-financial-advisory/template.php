<?php

/**
 * Legacy Financial Advisory block on the Main page template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
//$quote = !empty(get_field('quote')) ? get_field('quote') : 'Your quote here...';
$title = get_field('title');
$level_title = get_field('level_title');
$button_text = get_field('button_text');
$button_link = get_field('button_link');
// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
  $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}
// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'main-financial-advisory-section';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?> class="<?php echo esc_attr($class_name); ?>">
  <div class="main-financial-advisory__container">
    <?php if (!empty($title)): ?>
    <<?= $level_title; ?> class="main-financial-advisory-title"><span></span><?= $title ?><span></span>>
  </<?= $level_title; ?>>
  <?php endif; ?>
  <ul class="main-financial-advisory-content">

    <li class="main-financial-advisory-item">
      <h3 class="main-financial-advisory-item-title"></h3>
      <div class="main-financial-advisory-item-text"></div>
      <div class="main-financial-advisory-item-image">
        <img
            src=""
            alt=""
            width=""
            height=""
            loading="lazy"
        >
        <button type="button"></button>
      </div>
    </li>
  </ul>
  </div>
</section>
