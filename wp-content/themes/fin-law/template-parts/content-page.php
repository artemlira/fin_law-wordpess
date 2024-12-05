<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fin-law
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <!--  --><?php //fin_law_post_thumbnail(); ?>

  <div class="entry-content">
    <?php
    the_content();

    wp_link_pages(
      array(
        'before' => '<div class="page-links">' . esc_html__('Pages:', 'fin-law'),
        'after' => '</div>',
      )
    );
    ?>
  </div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
