<?php
/*
Template Name: Crypto Services
Template Post Type: post, page, product
*/


get_header();

//if (!dynamic_sidebar('sidebar-1')) : dynamic_sidebar('sidebar-1');endif;

?>
<section class="section-crypto_services">
  <div class="crypto_services__container">
    <header class="crypto_services-header">
      <h1 class="crypto_services-title"><?php the_title(); ?></h1>
    </header>
    <div class="crypto_services-content-wrapper splide">
      <div class="splide__arrows crypto_services-splide__arrows">
        <button class="splide__arrow splide__arrow--prev crypto_services-splide__arrow" type="button"
                aria-label="Previous slide"
                aria-controls="splide01-track">
          <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect y="44" width="44" height="44" rx="22" transform="rotate(-90 0 44)" fill="black"/>
            <path d="M25 16L19 22L25 28" stroke="white" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round"/>
          </svg>
        </button>
        <button class="splide__arrow splide__arrow--next crypto_services-splide__arrow" type="button"
                aria-label="Next slide"
                aria-controls="splide01-track">
          <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect y="44" width="44" height="44" rx="22" transform="rotate(-90 0 44)" fill="black"/>
            <path d="M19 28L25 22L19 16" stroke="white" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round"/>
          </svg>
        </button>
      </div>
      <div class="crypto_services-content splide__track">
        <ul class="crypto_services-list splide__list">
          <?php
          global $post;
          $query = new WP_Query([
            'post_type' => 'crypto_services',
            'posts_per_page' => -1,
            'order' => 'ASC', //DESC
          ]);

          if ($query->have_posts()) {
            while ($query->have_posts()) {
              $query->the_post(); ?>
              <li class="crypto_services-item splide__slide">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                  <span class="crypto_services-item-title"><?php the_title(); ?></span>
                  <svg class="crypto_services-item-icon" width="44" height="45" viewBox="0 0 44 45" fill="none"
                       xmlns="http://www.w3.org/2000/svg">
                    <rect y="0.5" width="44" height="44" rx="22" fill="#050B15"/>
                    <path d="M16 16.5H28M28 16.5L16 28.5M28 16.5V28.5" stroke="white" stroke-width="2"/>
                  </svg>
                </a>
              </li>
              <?php
            }
          }
          wp_reset_postdata();
          ?>
        </ul>
      </div>
    </div>
    <?php the_content(); ?>
  </div>
</section>

<?php get_footer(); ?>



