<?php

/**
 * News block on the Main page template.
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
$class_name = 'main-news-section';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?> class="<?php echo esc_attr($class_name); ?>">
  <div class="main-news__container">
    <header class="main-news-header">
      <?php if (!empty($title)): ?>
      <<?= $level_title; ?> class="main-news-title"><?= $title ?></<?= $level_title; ?>>
    <?php endif; ?>
    <?php if (!empty($button_text)): ?>
      <a class="main-news-link desktop-main-news-link" href="<?= $button_link; ?>">
        <span><?= $button_text; ?></span>
        <svg width="42" height="42" viewBox="0 0 45 44" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect x="0.5" width="42" height="42" rx="22" fill="white"/>
          <path d="M16.5 16H28.5M28.5 16L16.5 28M28.5 16V28" stroke="#050B15" stroke-width="2"/>
        </svg>
      </a>
    <?php endif; ?>
    </header>
    <ul class="main-news-content">
      <?php
      global $post;

      $query = new WP_Query([
        'posts_per_page' => 3,
        'category_name' => get_locale() == 'de_DE' ? 'news-de' : 'news-en',
      ]);

      if ($query->have_posts()) {
        while ($query->have_posts()) {
          $query->the_post(); ?>
          <li class="main-news-item card-news-item">
            <?php the_category(); ?>
            <?php if (has_post_thumbnail()) : ?>
              <a class="main-news-item-image-wrapper card-news-item-image-wrapper" href="<?php the_permalink(); ?>"
                 title="<?php the_title_attribute(); ?>">
                <?php the_post_thumbnail(); ?>
              </a>
            <?php else: ?>
              <a class="main-news-item-image-wrapper card-news-item-image-wrapper" href="<?php the_permalink(); ?>">
                <img
                    src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/No_image_available-de.svg.webp"
                    alt="No image available"
                    loading="lazy"
                >
              </a>
            <?php endif; ?>
            <a class="main-news-item-title card-news-item-title"
               href="<?= get_the_permalink(); ?>"><?php the_title(); ?></a>
            <div class="card-news-item-excerpt"><?php the_excerpt(); ?></div>
          </li>
          <?php
        }
      }
      wp_reset_postdata();
      ?>
    </ul>
    <?php if (!empty($button_text)): ?>
      <a class="mobile-main-news-link main-news-link" href="<?= $button_link; ?>">
        <span><?= $button_text; ?></span>
        <svg width="42" height="42" viewBox="0 0 45 44" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect x="0.5" width="42" height="42" rx="22" fill="white"/>
          <path d="M16.5 16H28.5M28.5 16L16.5 28M28.5 16V28" stroke="#050B15" stroke-width="2"/>
        </svg>
      </a>
    <?php endif; ?>
  </div>
</section>
