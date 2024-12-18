<nav class="breadcrumbs">
  <ol class="breadcrumbs__list">
    <?php
    $crumbs = count($args) !== 0 ? $args : [
      [
        'name' => get_the_title(pll_get_post(9)),
        'link' => pll_home_url(),
      ],
      [
        'name' => get_the_title(),
        'shadow-link' => get_permalink(),
      ],
    ];

    foreach ($crumbs as $key => $crumb) :
      $name = strip_tags($crumb['name']);
    ?>
      <li class="breadcrumbs__item">

        <?php if (array_key_exists('link', $crumb)) : ?>
          <a class="breadcrumbs__link link" href="<?= $crumb['link'] ?>">
            <?= $name ?>
          </a>
        <?php else : ?>
          <span><?= $name ?></span>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ol>
</nav>