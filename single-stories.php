<?php
$baseUrl  = get_template_directory_uri();
get_header();
?>
<main>
  <article class="story">
    <div class="container">
      <?php
      get_template_part('components/breadcrumbs', null, [
        [
          'name' => get_the_title(pll_get_post(9)),
          'link' => pll_home_url(),
        ],
        [
          'name' => get_the_title(pll_get_post(419)),
          'link' => get_permalink(pll_get_post(419)),
        ],
        [
          'name' => get_the_title(),
        ],
      ])
      ?>

      <header class="story__header">
        <h1 class="h1 h1_orange"><?= get_the_title() ?></h1>
        <time datetime="<?= the_date_xml() ?>"><?= the_date('j F Y') ?></time>
      </header>
      <div class="story__content">
        <div class="story__text" style="grid-area: text;">
          <div id="story-content" class="block block_equal-padding plain-html">
            <?= the_content() ?>
          </div>
        </div>
        <div class="story__author" style="grid-area: author;">
          <div class="block block_equal-padding">
            <div class="article-author">
              <div class="article-author__content">
                <div class="article-author__info">
                  <div class="article-author__avatar">
                    <img class="image-full-cover" loading="lazy" src="<?= get_field('client_avatar') ?>" alt="<?= get_field('client_name') ?>">
                  </div>
                  <div class="article-author__name">
                    <div class="h4"><?= get_field('client_name') ?></div>
                    <div class="article-author__position"><?= get_field('client_position') ?></div>
                  </div>
                </div>
              </div>
            </div>
            <p class="story__quote">«<?= get_field('preview')?>»</p>
          </div>
        </div>

        <div class="story__share">
          <p><?= pll__('Поделиться') ?>:</p>
          <script src="https://yastatic.net/share2/share.js"></script>
          <div class="ya-share2" data-curtain data-size="l" data-shape="round"
            data-services="vkontakte,telegram,viber,whatsapp"></div>
        </div>
      </div>
    </div>
  </article>

  <?php
  include 'components/contact-form.php';
  include 'components/promo-banner.php';
  include 'components/products.php';
  include 'components/services.php';
  ?>

</main>

<?php get_footer(); ?>