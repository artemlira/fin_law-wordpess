<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fin-law
 */
$group = get_field('services_menu_in_header', 'option');
$menus = $group['services_menu'];
?>

<footer id="colophon" class="site-footer">
  <div class="footer__container">
    <div class="footer-row footer-row1">
      <?php
      if (has_nav_menu('top-menu-footer'))
        wp_nav_menu(
          array(
            'theme_location' => 'top-menu-footer',
            'menu_class' => 'top-footer-menu',
            'container' => 'ul',
          )
        );
      ?>
      <a class="footer-linkedin" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path
              d="M18.3362 18.339H15.6707V14.1622C15.6707 13.1662 15.6505 11.8845 14.2817 11.8845C12.892 11.8845 12.6797 12.9683 12.6797 14.0887V18.339H10.0142V9.75H12.5747V10.9207H12.6092C12.967 10.2457 13.837 9.53325 15.1367 9.53325C17.8375 9.53325 18.337 11.3108 18.337 13.6245L18.3362 18.339ZM7.00373 8.57475C6.14573 8.57475 5.45648 7.88025 5.45648 7.026C5.45648 6.1725 6.14648 5.47875 7.00373 5.47875C7.85873 5.47875 8.55173 6.1725 8.55173 7.026C8.55173 7.88025 7.85798 8.57475 7.00373 8.57475ZM8.34023 18.339H5.66723V9.75H8.34023V18.339ZM19.6697 3H4.32923C3.59498 3 3.00098 3.5805 3.00098 4.29675V19.7033C3.00098 20.4202 3.59498 21 4.32923 21H19.6675C20.401 21 21.001 20.4202 21.001 19.7033V4.29675C21.001 3.5805 20.401 3 19.6675 3H19.6697Z"
              fill="#F7F7F7"/>
        </svg>
      </a>
    </div>
    <div class="footer-row footer-row2">
      <div class="footer-slider splide">
        <div class="splide__arrows footer-splide__arrows">
          <button class="splide__arrow splide__arrow--prev footer-splide__arrow" type="button"
                  aria-label="Previous slide"
                  aria-controls="splide01-track">
            <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect y="44" width="44" height="44" rx="22" transform="rotate(-90 0 44)" fill="#FAFAFA"/>
              <path d="M25 16L19 22L25 28" stroke="black" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"/>
            </svg>
          </button>
          <button class="splide__arrow splide__arrow--next footer-splide__arrow" type="button"
                  aria-label="Next slide"
                  aria-controls="splide01-track">
            <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect y="44" width="44" height="44" rx="22" transform="rotate(-90 0 44)" fill="white"/>
              <path d="M19 28L25 22L19 16" stroke="black" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"/>
            </svg>
          </button>
        </div>
        <div class="splide__track">
          <ul class="footer-services-menu-list splide__list">
            <?php if (!empty($group['services_menu'])): ?>
              <?php foreach ($menus as $menu):
                $image_menu_de = $menu['image_de'];
                $image_menu_en = $menu['image_en'];
                $title_menu_de = $menu['title_de'];
                $link_menu_de = $menu['link_de'];
                $title_menu_en = $menu['title_en'];
                $link_menu_en = $menu['link_en'];
                ?>
                <li class="footer-services-menu-item splide__slide">
                  <div class="footer-services-menu-item-wrapper">
                    <?php if (!empty($image_menu_de) || !empty($image_menu_en)): ?>
                      <?php if (get_locale() == 'de_DE'): ?>
                        <img
                            src="<?= $image_menu_de['url'] ?>"
                            alt="<?= $image_menu_de['alt'] ?>"
                            width="32"
                            height="32"
                            loading="lazy"
                        >
                      <?php elseif (get_locale() == 'en_US'): ?>
                        <img
                            src="<?= $image_menu_en['url'] ?>"
                            alt="<?= $image_menu_en['alt'] ?>"
                            width="32"
                            height="32"
                            loading="lazy"
                        >
                      <?php endif; ?>
                    <?php endif; ?>
                    <?php if (get_locale() == 'de_DE'): ?>
                      <a href="<?= $link_menu_de; ?>" class="footer-services-menu-link"
                         type="button"><?= $title_menu_de; ?></a>
                    <?php elseif (get_locale() == 'en_US'): ?>
                      <a href="<?= $link_menu_en; ?>" class="footer-services-menu-link"
                         type="button"><?= $title_menu_en; ?></a>
                    <?php endif; ?>
                  </div>
                  <?php if (!empty($menu['services_submenu'])):
                    $submenus = $menu['services_submenu'];
                    ?>
                    <ul class="footer-services-submenu-list">
                      <?php foreach ($submenus as $submenu):
                        $item_submenu_de = $submenu['item_submenu_de'];
                        $link_submenu_de = $submenu['link_submenu_de'];
                        $item_submenu_en = $submenu['item_submenu_en'];
                        $link_submenu_en = $submenu['link_submenu_en'];
                        ?>
                        <li class="footer-services-submenu-item">
                          <?php if (get_locale() == 'de_DE'): ?>
                            <a href="<?= $link_submenu_de ?>"
                               class="footer-services-submenu-link"><?= $item_submenu_de; ?></a>
                          <?php elseif (get_locale() == 'en_US'): ?>
                            <a href="<?= $link_submenu_en; ?>"
                               class="footer-services-submenu-link"><?= $item_submenu_en; ?></a>
                          <?php endif; ?>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
                </li>
              <?php endforeach; ?>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-row footer-row3">
      <div class="footer-subscribe-wrapper">
        <h3 class="footer-subscribe-title">Join our newsletter</h3>
        <?php echo apply_shortcodes('[contact-form-7 id="16d5190" title="Subscribe"]'); ?>
      </div>
    </div>
    <hr class="footer-line">
    <div class="footer-row footer-row4">
      <p class="footer-copyright">© Copyright FIN LAW</p>
      <?php
      if (has_nav_menu('menu-footer'))
        wp_nav_menu(
          array(
            'theme_location' => 'menu-footer',
            'menu_class' => 'main-footer-menu',
            'container' => 'ul',
          )
        );
      ?>
    </div>

  </div><!-- .footer__container -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
