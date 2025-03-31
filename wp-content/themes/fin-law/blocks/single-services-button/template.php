<?php

/**
 * Hero block on the Main page template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
//$quote = !empty(get_field('quote')) ? get_field('quote') : 'Your quote here...';
$text = get_field('button_text');
$link = get_field('button_link');
// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
  $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}
// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'single-services-button';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<a <?php echo esc_attr($anchor); ?> class="<?php echo esc_attr($class_name); ?>"
                                    href="mailto:<?= $link; ?>"><span><?= $text; ?></span>
  <svg class="single-services-button-icon" width="44" height="44" viewBox="0 0 44 44" fill="none"
       xmlns="http://www.w3.org/2000/svg">
    <rect width="44" height="44" rx="22" fill="#050B15"/>
    <path d="M16 16H28M28 16L16 28M28 16V28" stroke="#A8D4B1" stroke-width="2"/>
  </svg>
</a>

