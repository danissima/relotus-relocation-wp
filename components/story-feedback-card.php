<?php
$id = $args->ID;
$link = get_permalink(pll_get_post($id));
$name = get_field('client_name', $id);
$photo = get_field('client_avatar', $id);
$position = get_field('client_position', $id);
?>

<a href="<?= $link ?>" class="feedback-card">
  <div class="feedback-card__avatar">
    <img class="image-full-cover absolute-top-left" loading="lazy" src="<?= $photo ?>" alt="<?= $name ?>">
  </div>
  <div class="h4"><?= $name ?></div>
  <div class="feedback-card__text">
    <p><?= $position ?></p>
  </div>
  <svg class="feedback-card__pattern" width="404" height="204" xmlns="http://www.w3.org/2000/svg">
    <use xlink:href="#pattern-1" />
  </svg>
</a>