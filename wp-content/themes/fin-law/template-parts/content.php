<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fin-law
 */
$post_id = get_queried_object_id();
$cat = get_the_category($post_id);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <div class="entry-header__container">
      <?php fin_law_post_thumbnail(); ?>
      <div class="entry-header-content">
        <?php the_date('M d, Y'); ?>
        <h1 class="post-title"><?php the_title_attribute(); ?></h1>
        <?php the_tags('<ul><li>', '</li><li>', '</li></ul>'); ?>
      </div>
    </div>
  </header>

  <div class="entry-content">
    <div class="entry-content__container">
      <div>
        <?php
        the_content(
          sprintf(
            wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
              __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'fin-law'),
              array(
                'span' => array(
                  'class' => array(),
                ),
              )
            ),
            wp_kses_post(get_the_title())
          )
        );

        wp_link_pages(
          array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'fin-law'),
            'after' => '</div>',
          )
        );
        ?>
        <a class="single-post-subscribe"
           href="#"><span><?php if (get_locale() == 'de_DE'): ?>Newsletter abonnieren<?php elseif (get_locale() == 'en_US'): ?>Subscribe to Newsletter<?php endif; ?></span>
          <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="44" height="44" rx="22" fill="white"/>
            <path d="M16 16H28M28 16L16 28M28 16V28" stroke="#050B15" stroke-width="2"/>
          </svg>
        </a>
      </div>
      <?php echo apply_shortcodes('[contact-form-7 id="da02f8c" title="Post Contact"]'); ?>
    </div>
    <div class="single-post-news-wrapper splide">
      <div class="splide__arrows single-post-news-splide__arrows">
        <button class="splide__arrow splide__arrow--prev single-post-news-splide__arrow" type="button"
                aria-label="Previous slide"
                aria-controls="splide01-track">
          <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect y="44" width="44" height="44" rx="22" transform="rotate(-90 0 44)" fill="black"/>
            <path d="M25 16L19 22L25 28" stroke="white" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round"/>
          </svg>
        </button>
        <button class="splide__arrow splide__arrow--next single-post-news-splide__arrow" type="button"
                aria-label="Next slide"
                aria-controls="splide01-track">
          <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect y="44" width="44" height="44" rx="22" transform="rotate(-90 0 44)" fill="black"/>
            <path d="M19 28L25 22L19 16" stroke="white" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round"/>
          </svg>
        </button>
      </div>
      <div class="single-post-news__container splide__track">
        <ul class="single-post-news-content splide__list">
          <?php
          global $post;

          $query = new WP_Query([
            'orderby' => 'rand',
            'posts_per_page' => 3,
            'category_name' => get_locale() == 'de_DE' ? 'news-de' : 'news-en',
          ]);

          if ($query->have_posts()) {
            while ($query->have_posts()) {
              $query->the_post(); ?>
              <li class="single-post-news-item splide__slide">
                <?php the_category(); ?>
                <?php if (has_post_thumbnail()) : ?>
                  <a class="single-post-news-item-image-wrapper"
                     href="<?php the_permalink(); ?>"
                     title="<?php the_title_attribute(); ?>">
                    <?php the_post_thumbnail(); ?>
                  </a>
                <?php else: ?>
                  <a class="single-post-news-item-image-wrapper"
                     href="<?php the_permalink(); ?>">
                    <img
                        src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/No_image_available-de.svg.webp"
                        alt="No image available"
                        loading="lazy"
                    >
                  </a>
                <?php endif; ?>
                <a class="single-post-news-item-title card-news-item-title"
                   href="<?= get_the_permalink(); ?>"><?php the_title(); ?></a>
                <div class="single-post-news-item-excerpt card-news-item-excerpt"><?php the_excerpt(); ?></div>
              </li>
              <?php
            }
          }
          wp_reset_postdata();
          ?>
        </ul>
      </div>
    </div>
  </div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
