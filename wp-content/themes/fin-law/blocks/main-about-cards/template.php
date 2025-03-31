<?php

/**
 * About Cards block on the Main page template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
//$quote = !empty(get_field('quote')) ? get_field('quote') : 'Your quote here...';
$cards = get_field('about_cards');
// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
  $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}
// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'main-about-cards-section panel';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?> class="<?php echo esc_attr($class_name); ?>">
  <div class="main-about-cards__container outer">
    <div class="main-about-cards-wrapper">
      <?php if (!empty($cards)): ?>
        <ul class="main-about-cards-images-list">
          <?php foreach ($cards as $card):
            $image = $card['image'];
            ?>
            <li class="main-about-cards-images-item">
              <img
                  src="<?= $image['url']; ?>"
                  alt="<?= $image['alt']; ?>"
                  width="101"
                  height="163"
                  loading="lazy"
              >
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>
  </div>
</section>


