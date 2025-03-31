<?php
/*
Template Name: Contact
Template Post Type: post, page, product
*/

get_header();
?>
<section class="contact-page">
  <div class="contact-page__container">
    <h1 class="contact-page-title"><?php the_title(); ?></h1>
    <div class="contact-page-content">
      <div class="contact-page-contacts">
        <?php $phone = get_field('contact_page_phone');
        $str = preg_replace("/[^0-9]/", '', $phone); ?>
        <a class="contact-page-phone" href="tel:<?= $str; ?>">Telephone: <?= $phone; ?></a>
        <a class="contact-page-email"
           href="mailto:<?= get_field('contact_page_email') ?>">Email: <?= get_field('contact_page_email') ?></a>
        <hr class="contact-page-line">
        <div class="contact-page-address">
          <?= get_field('contact_page_address'); ?>
        </div>
      </div>
      <div class="contact-page-map">
        <?= get_field('contact_page_map'); ?>
      </div>

    </div>
    <?php if (get_locale() == 'de_DE'): ?>
      <?php echo apply_shortcodes('[contact-form-7 id="ba26489" title="Page Contacts"]'); ?>
    <?php elseif (get_locale() == 'en_US'): ?>
      <?php echo apply_shortcodes('[contact-form-7 id="d4b0389" title="Page Contacts_EN"]'); ?>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
