<?php
/*
Template Name: Career
Template Post Type: post, page, product
*/

get_header();
?>
<section class="career-page">
  <div class="career-page__container">
    <?php the_content(); ?>
    <?php if (get_locale() == 'de_DE'): ?>
      <?php echo apply_shortcodes('[contact-form-7 id="ba26489" title="Page Contacts"]'); ?>
    <?php elseif (get_locale() == 'en_US'): ?>
      <?php echo apply_shortcodes('[contact-form-7 id="d4b0389" title="Page Contacts_EN"]'); ?>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
