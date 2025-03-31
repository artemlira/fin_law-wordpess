<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package fin-law
 */

get_header();
?>
  <main id="primary" class="site-main">
    <section class="error-404 not-found">
      <div class="error-404__container">
        <h1 class="error-404-title"><span>4</span>
          <svg class="error-404-title-logo" xmlns="http://www.w3.org/2000/svg" width="183" height="182"
               viewBox="0 0 183 182" fill="none">
            <rect x="0.826172" width="33.0898" height="33.0898" fill="#A8D4B1"/>
            <rect x="0.826172" y="49.637" width="33.0898" height="33.0898" fill="#A8D4B1"/>
            <rect x="0.826172" y="99.2737" width="33.0898" height="33.0898" fill="#A8D4B1"/>
            <rect x="50.4668" y="99.2734" width="33.0898" height="33.0898" fill="#A8D4B1"/>
            <rect x="100.1" y="99.2734" width="33.0898" height="33.0898" fill="#A8D4B1"/>
            <rect x="100.1" y="49.6367" width="33.0898" height="33.0898" fill="#A8D4B1"/>
            <rect x="100.1" width="33.0898" height="33.0898" fill="#A8D4B1"/>
            <rect x="149.736" y="99.2734" width="33.0898" height="33.0898" fill="#A8D4B1"/>
            <rect x="149.736" y="49.637" width="33.0898" height="33.0898" fill="#A8D4B1"/>
            <rect x="0.826172" y="148.91" width="33.0898" height="33.0898" fill="#A8D4B1"/>
            <rect x="50.4668" y="148.91" width="33.0898" height="33.0898" fill="#A8D4B1"/>
            <rect x="100.1" y="148.91" width="33.0898" height="33.0898" fill="#A8D4B1"/>
            <rect x="149.736" y="148.91" width="33.0898" height="33.0898" fill="#A8D4B1"/>
          </svg>
          <span>4</span>
        </h1>
        <p class="error-404-subtitle">Page not found</p>
        <p class="error-404-text">It is possible that such a page does not exist</p>
        <a class="error-404-link"
           href="<?php if (get_locale() == 'de_DE'): ?>/<?php elseif (get_locale() == 'en_US'): ?>/en/<?php endif; ?>">
          <span>Go to home page</span>
          <svg width="45" height="44" viewBox="0 0 45 44" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="0.828125" width="44" height="44" rx="22" fill="white"/>
            <path d="M16.8281 16H28.8281M28.8281 16L16.8281 28M28.8281 16V28" stroke="#050B15" stroke-width="2"/>
          </svg>
        </a>
      </div>
    </section><!-- .error-404 -->
  </main><!-- #main -->
<?php
get_footer();
