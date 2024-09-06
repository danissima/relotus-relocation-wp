<?php
$index = $args['index'];
$name = $args['name'];
$photo = $args['photo'];
$description = $args['description'];
?>

<div class="feedback-card" data-feedback-card="<?= $index ?>">
  <div class="feedback-card__avatar bg-cover"
    style="background-image: url(<?= $photo ?>);">
  </div>
  <h4><?= $name ?></h4>
  <div class="feedback-card__text">
    <p><?= $description ?></p>
    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
      <use xlink:href="#volume-1" />
    </svg>
  </div>
  <svg class="feedback-card__pattern" width="404" height="204" xmlns="http://www.w3.org/2000/svg">
    <use xlink:href="#pattern-1" />
  </svg>
</div>