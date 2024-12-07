<?php

/**
 * Hero block on the Main page template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
//$quote = !empty(get_field('quote')) ? get_field('quote') : 'Your quote here...';
$title = get_field('title');
$level_title = get_field('level_title');
// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
  $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}
// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'main-hero-section';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?> class="<?php echo esc_attr($class_name); ?>">
  <div class="main-hero__container main-hero-wrapper">
    <?php if (!empty($title)): ?>
    <<?= $level_title; ?> class="main-hero-title"><?= $title ?></<?= $level_title; ?>>
  <?php endif; ?>
  <video class="hero-video" loop="loop" autoplay="" muted="">
    <source src="<?php bloginfo('template_url'); ?>/assets/videos/02.mp4" type="video/mp4"/>
  </video>
  <svg class="main-hero-mouse" xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42"
       fill="none">
    <path
        d="M8.75 15.75C8.75 8.98451 14.2345 3.5 21 3.5C27.7655 3.5 33.25 8.98451 33.25 15.75V26.25C33.25 33.0155 27.7655 38.5 21 38.5C14.2345 38.5 8.75 33.0155 8.75 26.25V15.75Z"
        stroke="white" stroke-opacity="0.1" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M21 15.75V10.5" stroke="#A8D4B1" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"/>
  </svg>
  <p class="main-hero-scroll-text">Scroll down</p>
  </div>
</section>

