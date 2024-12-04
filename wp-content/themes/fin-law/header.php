<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fin-law
 */
$group = get_field('services_menu_in_header', 'option');
$menus = $group['services_menu'];
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <meta name="robots" content="noarchive">
  <link rel="canonical" href="<?php echo get_permalink(); ?>"/>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
  <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'fin-law'); ?></a>

  <header id="masthead" class="site-header">
    <div class="header__container">
      <div class="site-branding">
        <a href="/">
          <span>fin</span>
          <?php
          $custom_logo_id = get_theme_mod('custom_logo');
          $logo_img = '';
          if ($custom_logo_id) {
            $logo_img = wp_get_attachment_image($custom_logo_id, 'full', false, array(
              'class' => 'custom-logo',
              'itemprop' => 'logo',
            ));
          }
          echo $logo_img;
          ?>
          <span>law</span>
        </a>
      </div><!-- .site-branding -->
      <div class="header-controls-wrapper">
        <button class="services-menu-button" type="button" aria-expanded="false" aria-controls="services-menu">
          Services
          <svg width="45" height="44" viewBox="0 0 45 44" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect class="white-color" x="0.0915527" width="44" height="44" rx="22" fill="white"/>
            <path class="black-color" d="M16.0916 19L22.0916 25L28.0916 19" stroke="#050B15" stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"/>
          </svg>
        </button>
        <ul class="lang" id="top-lang">
          <li class="pll-parent-menu-item dropdown">
            <a href="#pll_switcher"><?php echo pll_current_language('slug') ?></a>
            <ul class="sub-menu">
              <?php if (function_exists('pll_the_languages')) {
                pll_the_languages(array('display_names_as' => 'slug', 'hide_current' => 0));
              } ?>
            </ul>
          </li>
        </ul>
        <?php
        if (has_nav_menu('menu-header'))
          wp_nav_menu(
            array(
              'theme_location' => 'menu-header',
              'menu_class' => 'main-header-menu',
              'container' => 'ul',
            )
          );
        ?>
        <button class="burger-menu-button" type="button"><span></span></button>
      </div>
      <nav id="site-navigation" class="main-navigation">
        <ul class="services-menu-list">
          <?php if (!empty($group['services_menu'])): ?>
            <?php foreach ($menus as $menu):
              $image_menu_de = $menu['image_de'];
              $image_menu_en = $menu['image_en'];
              $title_menu_de = $menu['title_de'];
              $link_menu_de = $menu['link_de'];
              $title_menu_en = $menu['title_en'];
              $link_menu_en = $menu['link_en'];
              ?>
              <li class="services-menu-item">
                <div class="services-menu-item-wrapper">
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
                    <a href="<?= $link_menu_de; ?>" class="services-menu-link"
                       type="button"><?= $title_menu_de; ?></a>
                  <?php elseif (get_locale() == 'en_US'): ?>
                    <a href="<?= $link_menu_en; ?>" class="services-menu-link"
                       type="button"><?= $title_menu_en; ?></a>
                  <?php endif; ?>
                </div>
                <?php if (!empty($menu['services_submenu'])):
                  $submenus = $menu['services_submenu'];
                  ?>
                  <ul class="services-submenu-list">
                    <?php foreach ($submenus as $submenu):
                      $item_submenu_de = $submenu['item_submenu_de'];
                      $link_submenu_de = $submenu['link_submenu_de'];
                      $item_submenu_en = $submenu['item_submenu_en'];
                      $link_submenu_en = $submenu['link_submenu_en'];
                      ?>
                      <li class="services-submenu-item">
                        <?php if (get_locale() == 'de_DE'): ?>
                          <a href="<?= $link_submenu_de ?>" class="services-submenu-link"><?= $item_submenu_de; ?></a>
                        <?php elseif (get_locale() == 'en_US'): ?>
                          <a href="<?= $link_submenu_en; ?>" class="services-submenu-link"><?= $item_submenu_en; ?></a>
                        <?php endif; ?>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                <?php endif; ?>
              </li>
            <?php endforeach; ?>
          <?php endif; ?>
        </ul>
      </nav><!-- #site-navigation -->
      <nav class="mobile-main-navigation">
        <?php
        if (has_nav_menu('menu-header'))
          wp_nav_menu(
            array(
              'theme_location' => 'menu-header',
              'menu_class' => 'mobile-main-header-menu',
              'container' => 'ul',
            )
          );
        ?>
        <ul class="mobile-services-menu-list">
          <?php if (!empty($group['services_menu'])): ?>
            <?php foreach ($menus as $menu):
              $image_menu_de = $menu['image_de'];
              $image_menu_en = $menu['image_en'];
              $title_menu_de = $menu['title_de'];
              $link_menu_de = $menu['link_de'];
              $title_menu_en = $menu['title_en'];
              $link_menu_en = $menu['link_en'];
              ?>
              <li class="mobile-services-menu-item menu-item">
                <div class="mobile-services-menu-item-wrapper">
                  <?php if (get_locale() == 'de_DE'): ?>
                    <a href="<?= $link_menu_de; ?>" class="mobile-services-menu-link"
                       type="button"><?= $title_menu_de; ?></a>
                  <?php elseif (get_locale() == 'en_US'): ?>
                    <a href="<?= $link_menu_en; ?>" class="mobile-services-menu-link"
                       type="button"><?= $title_menu_en; ?></a>
                  <?php endif; ?>
                </div>
                <?php if (!empty($menu['services_submenu'])):
                  $submenus = $menu['services_submenu'];
                  ?>
                  <ul class="mobile-services-submenu-list">
                    <?php foreach ($submenus as $submenu):
                      $item_submenu_de = $submenu['item_submenu_de'];
                      $link_submenu_de = $submenu['link_submenu_de'];
                      $item_submenu_en = $submenu['item_submenu_en'];
                      $link_submenu_en = $submenu['link_submenu_en'];
                      ?>
                      <li class="mobile-services-submenu-item menu-item">
                        <?php if (get_locale() == 'de_DE'): ?>
                          <a href="<?= $link_submenu_de ?>"
                             class="mobile-services-submenu-link"><?= $item_submenu_de; ?></a>
                        <?php elseif (get_locale() == 'en_US'): ?>
                          <a href="<?= $link_submenu_en; ?>"
                             class="mobile-services-submenu-link"><?= $item_submenu_en; ?></a>
                        <?php endif; ?>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                <?php endif; ?>
              </li>
            <?php endforeach; ?>
          <?php endif; ?>
        </ul>
      </nav>
    </div>
  </header><!-- #masthead -->
