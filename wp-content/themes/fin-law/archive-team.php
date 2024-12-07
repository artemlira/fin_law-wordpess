<?php
/*
Template Name: Team
Template Post Type: post, page, product
*/


get_header();

//if (!dynamic_sidebar('sidebar-1')) : dynamic_sidebar('sidebar-1');endif;

?>

<section class="section-team">
  <header class="section-team-header">
    <div class="section-team-header__container">
      <h1 class="section-team-title"><?php if (get_locale() == 'de_DE'): ?>Team <?php elseif (get_locale() == 'en_US'): ?>Team EN <?php endif; ?></h1>
    </div>
  </header>
  <div class="section-team-content__container">
    <ul class="section-team-list">
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
          <li class="section-team-item">
            <?php if (has_post_thumbnail()) : ?>
              <a class="section-team-item-image-wrapper" href="<?php the_permalink(); ?>"
                 title="<?php the_title_attribute(); ?>">
                <?php the_post_thumbnail(); ?>
              </a>
            <?php else: ?>
              <a class="section-team-item-image-wrapper" href="<?php the_permalink(); ?>">
                <img
                    src="
            <?php echo esc_url(get_template_directory_uri()); ?>/assets/images/No_image_available-de.svg.webp"
                    alt="No image available"
                    loading="lazy"
                >
              </a>
            <?php endif; ?>
            <?php
            $terms = get_the_terms(get_the_ID(), 'team_rank');

            if ($terms && !is_wp_error($terms)):
              $term_names = wp_list_pluck($terms, 'name'); ?>

              <p class="section-team-item-category"><?= implode(', ', $term_names); ?></p>
            <?php endif; ?>
            <h3 class="section-team-item-title"><?php the_title(); ?></h3>
          </li>
          <?php
        }
      }
      wp_reset_postdata();
      ?>
    </ul>
  </div>
</section>

<?php get_footer(); ?>


