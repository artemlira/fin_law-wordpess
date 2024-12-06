<?php get_header();

//if (!dynamic_sidebar('sidebar-1')) : dynamic_sidebar('sidebar-1');endif;

?>

<section class="section-blog">
  <header class="section-blog-header">
    <div class="section-blog-header__container">
      <h1 class="section-blog-title">News</h1>
      <form class="subscription-form" role="search" method="get" id="searchform" action="<?php echo home_url('/') ?>">
        <input class="subscription-input" type="search"
               value="<?php echo get_search_query() ?>" name="s" id="s"
               placeholder="Search">
        <button class="subscription-button" type="submit" id="searchsubmit">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
            <path
                d="M21 21.5L16.65 17.15M19 11.5C19 15.9183 15.4183 19.5 11 19.5C6.58172 19.5 3 15.9183 3 11.5C3 7.08172 6.58172 3.5 11 3.5C15.4183 3.5 19 7.08172 19 11.5Z"
                stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
      </form>
    </div>
  </header>
  <div class="section-blog__container">
    <ul class="section-blog-list">
      <?php
      global $post;

      $query = new WP_Query([
        'posts_per_page' => 12,
        'category_name' => get_locale() == 'de_DE' ? 'blog-de' : 'blog-en',
      ]);

      if ($query->have_posts()) {
        while ($query->have_posts()) {
          $query->the_post(); ?>
          <li class="section-blog-item card-news-item">
            <?php the_category(); ?>
            <?php if (has_post_thumbnail()) : ?>
              <a class="section-blog-item-image-wrapper card-news-item-image-wrapper" href="<?php the_permalink(); ?>"
                 title="<?php the_title_attribute(); ?>">
                <?php the_post_thumbnail(); ?>
              </a>
            <?php else: ?>
              <a class="section-blog-item-image-wrapper card-news-item-image-wrapper" href="<?php the_permalink(); ?>">
                <img
                    class="section-blog-item-image"
                    src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/No_image_available-de.svg.webp"
                    alt="No image available"
                    loading="lazy"
                >
              </a>
            <?php endif; ?>
            <a class="section-blog-item-title card-news-item-title"
               href="<?= get_the_permalink(); ?>"><?php the_title(); ?></a>
            <div class="section-blog-item-excerpt card-news-item-excerpt"><?php the_excerpt(); ?></div>
          </li>
          <?php
        }
      }
      wp_reset_postdata();
      ?>
    </ul>
    <?php
    $args = array(
      'show_all' => false, // показаны все страницы участвующие в пагинации
      'end_size' => 1,     // количество страниц на концах
      'mid_size' => 1,     // количество страниц вокруг текущей
      'prev_next' => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
      'prev_text' => __('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
  <path d="M15 18L9 12L15 6" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>'),
      'next_text' => __('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
  <path d="M9 18L15 12L9 6" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>'),
      'add_args' => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
      'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
      'screen_reader_text' => __('Posts navigation'),
      'class' => 'pagination', // CSS класс, добавлено в 5.5.0.
    );
    the_posts_pagination($args); ?>
  </div>
</section>

<?php get_footer(); ?>

