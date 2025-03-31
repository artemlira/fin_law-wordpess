<?php get_header();
$currentPost = get_the_title();
?>

  <div class="single-crypto_services__container">
    <header class="single-crypto_services-header">
      <h1 class="single-crypto_services-title"><?php the_title(); ?></h1>
    </header>
    <div class="single-crypto_services-image-wrapper">
      <?php if (has_post_thumbnail()): ?>
        <?php the_post_thumbnail(); ?>
      <?php endif; ?>
    </div>
    <div class="single-crypto_services-content">
      <ul class="single-crypto_services-list">
        <?php
        global $post;
        $query = new WP_Query([
          'post_type' => 'crypto_services',
          'posts_per_page' => -1,
          'order' => 'ASC', //DESC
        ]);

        if ($query->have_posts()) {
          while ($query->have_posts()) {
            $query->the_post();
            $post_title = get_the_title();
            ?>
            <li class="single-crypto_services-item">
              <a class="single-crypto_services-item-link" href="<?php the_permalink(); ?>"
                 title="<?php the_title_attribute(); ?>">
                <span class="single-crypto_services-item-title"><?php the_title(); ?></span>
                <?php if ($currentPost == $post_title) : ?>
                  <svg class="single-crypto_services-item-icon" width="44" height="44" viewBox="0 0 44 44" fill="none"
                       xmlns="http://www.w3.org/2000/svg">
                    <rect width="44" height="44" rx="22" fill="#050B15"/>
                    <path d="M16 16H28M28 16L16 28M28 16V28" stroke="white" stroke-width="2"/>
                  </svg>
                <?php else: ?>
                  <div class="single-crypto_services-item-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                      <path d="M1 1H13M13 1L1 13M13 1V13" stroke="#A8D4B1" stroke-width="2"/>
                    </svg>
                  </div>
                <?php endif; ?>
              </a>
            </li>
            <?php
          }
        }
        wp_reset_postdata();
        ?>
      </ul>
      <div>
        <?php the_content(); ?>
      </div>
    </div>
  </div>
<?php get_footer(); ?>