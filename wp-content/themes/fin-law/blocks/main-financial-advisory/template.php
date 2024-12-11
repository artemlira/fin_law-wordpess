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
$cards = get_field('financial_advisory_cards');
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
    <<?= $level_title; ?> class="main-financial-advisory-title" data-title="<?= $title ?>"><span></span><?= $title ?>
    <span></span>
  </<?= $level_title; ?>>
  <?php endif; ?>

  <?php if (!empty($cards)): ?>
    <div class="splide financial-advisory-splide">
      <div class="splide__arrows financial-advisory-splide__arrows">
        <button class="splide__arrow splide__arrow--prev financial-advisory-splide__arrow" type="button"
                aria-label="Previous slide"
                aria-controls="splide01-track">
          <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect y="44" width="44" height="44" rx="22" transform="rotate(-90 0 44)" fill="black"/>
            <path d="M25 16L19 22L25 28" stroke="white" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round"/>
          </svg>
        </button>
        <button class="splide__arrow splide__arrow--next financial-advisory-splide__arrow" type="button"
                aria-label="Next slide"
                aria-controls="splide01-track">
          <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect y="44" width="44" height="44" rx="22" transform="rotate(-90 0 44)" fill="black"/>
            <path d="M19 28L25 22L19 16" stroke="white" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round"/>
          </svg>
        </button>
      </div>
      <div class="splide__track financial-advisory-splide__track">
        <ul class="main-financial-advisory-content splide__list financial-advisory-splide__list">
          <?php foreach ($cards as $card):
            $image = $card['image'];
            ?>
            <li class="main-financial-advisory-item splide__slide financial-advisory-splide__slide">
              <h3 class="main-financial-advisory-item-title"><?= $card['title']; ?></h3>
              <div class="main-financial-advisory-item-text"><?= $card['text'] ?></div>
              <div class="main-financial-advisory-item-image">
                <img
                    src="<?= $image['url']; ?>"
                    alt="<?= $image['alt']; ?>"
                    width="372"
                    height="240"
                    loading="lazy"
                >
                <a class="main-financial-advisory-item-button" href="<?= $image['button_link'] ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                    <path d="M1 1H25M25 1L1 25M25 1V25" stroke="white" stroke-width="2"/>
                  </svg>
                </a>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <div class="my-slider-progress">
      <div class="my-slider-progress-bar"></div>
    </div>
  <?php endif; ?>
  </div>
</section>
