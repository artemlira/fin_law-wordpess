<?php get_header();

//if (!dynamic_sidebar('sidebar-1')) : dynamic_sidebar('sidebar-1');endif;
$post_id = get_queried_object_id();
$cat = get_the_category($post_id);
?>

<section class="section-blog">
  <header class="section-blog-header">
    <div class="section-blog-header__container">
      <h1 class="section-blog-title">Suchergebnis</h1>
      <?php
      /* translators: %s: search query. */
      printf(esc_html__('%s', 'globalimmnetwork'), '<p class="post-subtitle">"' . get_search_query() . '"</p>');
      ?>
    </div>
  </header>
  <div class="section-blog__container">
    <ul class="section-blog-list">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <li class="section-blog-item">
          <?php if (has_post_thumbnail()) : ?>
            <a class="section-blog-item-image-wrapper" href="<?php the_permalink(); ?>"
               title="<?php the_title_attribute(); ?>">
              <?php the_post_thumbnail(); ?>
            </a>
          <?php else: ?>
            <img
                class="section-blog-item-image"
                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/No_image_available-de.svg.webp"
                alt="No image available"
                loading="lazy"
            >
          <?php endif; ?>

          <div class="section-blog-item-content">
            <a class="section-blog-item-title" href="<?= get_the_permalink(); ?>"><?php the_title(); ?></a>
            <div class="section-blog-item-excerpt"><?php the_excerpt(); ?></div>
          </div>
        </li>
      <?php endwhile; ?>

      <?php endif; ?>
    </ul>
  </div>
</section>

<?php get_footer(); ?>
