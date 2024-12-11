<?php

/**
 * Team Slider block on the Main page template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
//$quote = !empty(get_field('quote')) ? get_field('quote') : 'Your quote here...';
$title = get_field('main_team_slider_title');
$level_title = get_field('main_team_slider_level_title');
// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
  $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}
// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'main-team-slider-section';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?> class="<?php echo esc_attr($class_name); ?>">
  <div class="main-team-slider__container">
    <?php if (!empty($title)): ?>
    <<?= $level_title; ?> class="main-team-slider-title"><?= $title ?></<?= $level_title; ?>>
  <?php endif; ?>
  <div class="main-team-slider splide">
    <div class="splide__arrows main-team-slider-splide__arrows">
      <button class="splide__arrow splide__arrow--prev main-team-slider-splide__arrow" type="button"
              aria-label="Previous slide"
              aria-controls="splide01-track">
        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect y="44" width="44" height="44" rx="22" transform="rotate(-90 0 44)" fill="#FAFAFA"/>
          <path d="M25 16L19 22L25 28" stroke="black" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round"/>
        </svg>
      </button>
      <button class="splide__arrow splide__arrow--next main-team-slider-splide__arrow" type="button"
              aria-label="Next slide"
              aria-controls="splide01-track">
        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect y="44" width="44" height="44" rx="22" transform="rotate(-90 0 44)" fill="white"/>
          <path d="M19 28L25 22L19 16" stroke="black" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round"/>
        </svg>
      </button>
    </div>
    <div class="splide__track">
      <ul class="main-team-slider-content splide__list">
        <?php
        global $post;

        $query = new WP_Query([
          'post_type' => 'team',
          'posts_per_page' => -1,
          'order' => 'ASC', //DESC
        ]);

        if ($query->have_posts()) {
          while ($query->have_posts()) {
            $query->the_post(); ?>
            <li class="main-team-slider-item splide__slide">
              <?php the_category(); ?>
              <?php if (has_post_thumbnail()) : ?>
                <a class="main-team-slider-item-image-wrapper" href="<?php the_permalink(); ?>"
                   title="<?php the_title_attribute(); ?>">
                  <?php the_post_thumbnail(); ?>
                </a>
              <?php else: ?>
                <a class="main-team-slider-item-image-wrapper" href="<?php the_permalink(); ?>">
                  <img
                      src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/No_image_available-de.svg.webp"
                      alt="No image available"
                      loading="lazy"
                  >
                </a>
              <?php endif; ?>
              <?php
              $terms = get_the_terms(get_the_ID(), 'team_rank');

              if ($terms && !is_wp_error($terms)):
                $term_names = wp_list_pluck($terms, 'name'); ?>

                <p class="main-team-slider-category"><?= implode(', ', $term_names); ?></p>
              <?php endif; ?>
              <a class="main-team-slider-item-title"
                 href="<?= get_the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
            <?php
          }
        }
        wp_reset_postdata();
        ?>
      </ul>
    </div>
  </div>
  </div>
</section>

