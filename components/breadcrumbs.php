<nav class="breadcrumbs">
  <ol class="breadcrumbs__list" vocab="http://schema.org/" typeof="BreadcrumbList">
    <?php
    $crumbs = count($args) !== 0 ? $args : [
      [
        'name' => get_the_title(pll_get_post(9)),
        'link' => pll_home_url(),
      ],
      [
        'name' => get_the_title(),
      ],
    ];

    foreach ($crumbs as $key => $crumb) :
      $name = strip_tags($crumb['name']);
    ?>
      <li class="breadcrumbs__item" typeof="ListItem" property="itemListElement">

        <?php if (array_key_exists('link', $crumb)) : ?>
          <a class="breadcrumbs__link link" href="<?= $crumb['link'] ?>"><?= $name ?></a>
        <?php else : ?>
          <span><?= $name ?></span>
        <?php endif; ?>

        <meta property="position" content="<?= $key + 1 ?>">
      </li>
    <?php endforeach; ?>
  </ol>
</nav>