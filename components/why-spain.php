<?php
$post_id = pll_get_post(271);
?>

<section class="slug-advantages section">
  <div class="container">
    <div class="slug-advantages__block block">
      <header class="slug-advantages__header section__header block">
        <h2 class="h2 h2_orange"><?= get_field('why_spain_title', $post_id) ?></h2>
      </header>
      <div class="slug-advantages__grid">
        <div class="slug-advantages__image bg-cover"
          style="background-image: url(<?= get_field('why_spain_image', $post_id) ?>);"></div>
        <div class="slug-advantages__cards block">
          <?php
          foreach (get_field('why_spain_cards', $post_id) as $card) :
          ?>
            <div class="slug-advantages-card">
              <svg class="slug-advantages__icon" width="32" height="32" xmlns="http://www.w3.org/2000/svg">
                <use xlink:href="#checkmark-flower" />
              </svg>
              <div class="h3"><?= $card['title'] ?></div>
              <p><?= $card['description'] ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>