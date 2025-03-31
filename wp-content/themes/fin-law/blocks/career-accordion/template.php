<?php

/**
 * Accordion block on the Career page template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
//$quote = !empty(get_field('quote')) ? get_field('quote') : 'Your quote here...';
$title = get_field('title');
$level_title = get_field('level_title');
$text = get_field('text');
$accordions = get_field('main_accordions');
// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
  $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}
// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'career-accordion-section';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?> class="<?php echo esc_attr($class_name); ?>">
  <div class="career-accordion__container">
    <?php if (!empty($title)): ?>
    <<?= $level_title; ?> class="career-section-title"><?= $title ?></<?= $level_title; ?>>
  <?php endif; ?>
  <?php if (!empty($text)): ?>
    <div class="career-section-text"><?= $text ?></div>
  <?php endif; ?>
  <?php if ($accordions): ?>
    <?php foreach ($accordions as $accordion):
      $image = $accordion['image'];
      ?>
      <div class="career-accordion">
        <?php if (!empty($image)): ?>
          <div class="career-accordion-image">
            <img
                src="<?= $image['url']; ?>"
                alt="<?= $image['alt']; ?>"
                width="64"
                height="64"
                loading="lazy"
            >
          </div>
        <?php endif; ?>
        <div class="career-accordion-control" aria-expanded="false" role="button">
          <h3 class="career-accordion-title"><?= $accordion['title'] ?></h3>
          <button class="career-accordion-icon" type="button">
            <span><?php if (get_locale() == 'de_DE'): ?>schließen<?php elseif (get_locale() == 'en_US'): ?>close<?php endif; ?></span>
            <svg width="45" height="44" viewBox="0 0 45 44" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect x="0.5" width="44" height="44" rx="22" fill="white"/>
              <path d="M16.5 19L22.5 25L28.5 19" stroke="#050B15" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"/>
            </svg>
          </button>
        </div>
        <div class="career-accordion-content" aria-hidden="true">
          <div class="career-accordion-content-text"><?= $accordion['text'] ?></div>
        </div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
  </div>
</section>

