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
      </div>
      <?php echo apply_shortcodes('[contact-form-7 id="da02f8c" title="Post Contact"]'); ?>
    </div>
  </div><!-- .entry-content -->

  <!--	<footer class="entry-footer">-->
  <!--		--><?php //fin_law_entry_footer(); ?>
  <!--	</footer>-->
</article><!-- #post-<?php the_ID(); ?> -->
