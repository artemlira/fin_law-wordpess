<?php get_header();

//if (!dynamic_sidebar('sidebar-1')) : dynamic_sidebar('sidebar-1');endif;
$post_id = get_queried_object_id();
$cat = get_the_category($post_id);
?>

<section class="section-blog">
  <header class="section-blog-header">
    <div class="section-blog-header__container">
      <h1 class="section-blog-title"><?php if (get_locale() == 'de_DE'): ?>Suchergebnis<?php elseif (get_locale() == 'en_US'): ?>Search result<?php endif; ?></h1>
      <?php
      /* translators: %s: search query. */
      printf(esc_html__('%s', 'globalimmnetwork'), '<p class="post-subtitle">"' . get_search_query() . '"</p>');
      ?>
    </div>
  </header>
  <div class="section-blog__container">
    <ul class="section-blog-list">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <li class="section-search-item card-news-item">
          <?php if (has_post_thumbnail()) : ?>
            <a class="section-search-item-image-wrapper card-news-item-image-wrapper" href="<?php the_permalink(); ?>"
               title="<?php the_title_attribute(); ?>">
              <?php the_post_thumbnail(); ?>
            </a>
          <?php else: ?>
            <a class="section-search-item-image-wrapper card-news-item-image-wrapper" href="<?php the_permalink(); ?>">
              <img
                  class="section-blog-item-image"
                  src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/No_image_available-de.svg.webp"
                  alt="No image available"
                  loading="lazy"
              >
            </a>
          <?php endif; ?>

          <div class="section-search-item-content">
            <a class="section-search-item-title card-news-item-title"
               href="<?= get_the_permalink(); ?>"><?php the_title(); ?></a>
            <div class="section-search-item-excerpt card-news-item-excerpt"><?php the_excerpt(); ?></div>
          </div>
        </li>
      <?php endwhile; ?>

      <?php endif; ?>
    </ul>
  </div>
</section>

<?php get_footer(); ?>
