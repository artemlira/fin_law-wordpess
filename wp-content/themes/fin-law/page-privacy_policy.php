<?php
/*
Template Name: Privacy Policy
Template Post Type: post, page, product
*/
?>
<?php get_header(); ?>
<main class="privacy-policy">
  <div class="privacy-policy__container">
    <div class="privacy-policy-wrapper">
      <header class="privacy-policy-header">
        <h1 class="privacy-policy-header-title"><?php the_title() ?></h1>
      </header>
      <div class="entry-content">
        <?php the_content() ?>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>

