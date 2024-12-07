<?php get_header(); ?>

  <section class="single-team">
    <div class="single-team__container">
      <header class="single-team-header">
        <div class="single-team-image-wrapper">
          <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail(); ?>
          <?php else: ?>
            <img
                src="
                     <?php echo esc_url(get_template_directory_uri()); ?>/assets/images/No_image_available-de.svg.webp"
                alt="No image available"
                loading="lazy"
            >
          <?php endif; ?>
          <?php
          $terms = get_the_terms(get_the_ID(), 'team_rank');

          if ($terms && !is_wp_error($terms)):
            $term_names = wp_list_pluck($terms, 'name'); ?>

            <p class="single-team-category"><?= implode(', ', $term_names); ?></p>
          <?php endif; ?>
          <h3 class="single-team-title"><?php the_title(); ?></h3>
        </div>
        <?php if (!empty(get_field('single_team_page_description'))): ?>
          <div class="single-team-content"><?= get_field('single_team_page_description'); ?></div>
        <?php endif; ?>
      </header>

      <div class="single-team-buttons-wrapper">
        <div class="single-team-nav-links">
          <?php if (get_previous_post_link()): echo get_previous_post_link('%link', '<svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect y="44" width="44" height="44" rx="22" transform="rotate(-90 0 44)" fill="#FAFAFA"/>
                  <path d="M25 16L19 22L25 28" stroke="#050B15" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"/>
                </svg>');
          else: ?>
            <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect y="44" width="44" height="44" rx="22" transform="rotate(-90 0 44)" fill="#FAFAFA"
                    fill-opacity="0.1"/>
              <path d="M25 16L19 22L25 28" stroke="white" stroke-opacity="0.1" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"/>
            </svg>
          <?php endif; ?>
          <?php if (get_next_post_link()): echo get_next_post_link('%link', '<svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
      <rect y="44" width="44" height="44" rx="22" transform="rotate(-90 0 44)" fill="white"/>
      <path d="M19 28L25 22L19 16" stroke="#050B15" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      ');
          else: ?>
            <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect y="44" width="44" height="44" rx="22" transform="rotate(-90 0 44)" fill="white" fill-opacity="0.1"/>
              <path d="M19 28L25 22L19 16" stroke="white" stroke-opacity="0.1" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"/>
            </svg>
          <?php endif; ?>
        </div>
        <?php if (!empty(get_field('single_team_page_text_button'))): ?>
          <a class="single-team-button" href="<?= get_field('single_team_page_button_link'); ?>">
            <span><?= get_field('single_team_page_text_button'); ?></span>
            <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect width="44" height="44" rx="22" fill="white"/>
              <path d="M28 25L22 19L16 25" stroke="#050B15" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"/>
            </svg>
          </a>
        <?php endif; ?>
      </div>
      <div class="experience-wrapper">
        <?php if (!empty(get_field('single_team_page_experience_list_left'))):
          $left_list = get_field('single_team_page_experience_list_left');
          ?>
          <ul class="experience-list experience-list-col1">
            <?php foreach ($left_list as $item): ?>
              <li class="experience-item"><?= $item['text']; ?></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
        <?php if (!empty(get_field('single_team_page_experience_list_left'))):
          $right_list = get_field('single_team_page_experience_list_right');
          ?>
          <ul class="experience-list experience-list-col2">
            <?php foreach ($right_list as $item): ?>
              <li class="experience-item"><?= $item['text']; ?></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>
    </div>
  </section>
<?php get_footer(); ?>