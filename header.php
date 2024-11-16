<?php
setlocale(LC_ALL, 'ru_RU');
$baseUrl  = get_template_directory_uri();

$visas = get_posts([
  'posts_per_page' => -1,
  'post_type' => 'product',
  'orderby' => 'date',
  'order' => 'ASC',
]);

$services = get_posts([
  'posts_per_page' => -1,
  'post_type' => 'service',
  'orderby' => 'date',
  'order' => 'ASC',
]);

$phone = get_field('phone', 'option');
$address = get_field('address', 'option');
$email = get_field('email', 'option');
$telegram = get_field('telegram', 'option');
$whatsapp = get_field('whatsapp', 'option');

$about_link = [
  'url' => get_permalink(pll_get_post(428)),
  'title' => get_the_title(pll_get_post(428)),
];
$journal_link = [
  'url' => get_permalink(pll_get_post(137)),
  'title' => get_the_title(pll_get_post(137)),
];
$stories_link = [
  'url' => get_permalink(pll_get_post(419)),
  'title' => get_the_title(pll_get_post(419)),
];
$feedback_link = [
  'url' => get_permalink(pll_get_post(143)),
  'title' => get_the_title(pll_get_post(143)),
];
$contacts_link = [
  'url' => get_permalink(pll_get_post(141)),
  'title' => get_the_title(pll_get_post(141)),
];
$privacy_link = [
  'url' => get_permalink(pll_get_post(3)),
  'title' => get_the_title(pll_get_post(3)),
];
?>

<!DOCTYPE html>
<html <?= language_attributes() ?> prefix="og: http://ogp.me/ns# article: http://ogp.me/ns/article# profile: http://ogp.me/ns/profile# fb: http://ogp.me/ns/fb#">

<head>
  <meta charset="UTF-8">
  <title><?= wp_title() ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/app.css">
  <?php wp_head(); ?>
</head>

<body>
  <header class="header" data-header>
    <!-- Разработано в Онви -->
    <div class="container container_full-height">
      <div class="header__content">
        <div class="header__inner">
          <div class="header__logo">
            <a href="<?= pll_home_url() ?>">
              <svg width="147" height="56" xmlns="http://www.w3.org/2000/svg">
                <use xlink:href="#logo" />
              </svg>
            </a>
          </div>
          <ul class="header-nav">
            <li class="header-nav__item">
              <span>
                <?= pll__('Визы и ВНЖ') ?></span>
              <div class="header-nav__subcontent">
                <ul class="header-nav__submenu">
                  <?php
                  if ($visas) :
                    foreach ($visas as $visa) :
                      $title = $visa->post_title;
                      $link = get_permalink($visa->ID);
                  ?>
                      <li class="header-nav__subitem">
                        <a class="link link_lighter" href="<?= $link ?>"><?= $title ?></a>
                      </li>
                  <?php
                    endforeach;
                  endif;
                  ?>
                </ul>
              </div>
              <div class="header-nav__overlay"></div>
            </li>

            <li class="header-nav__item">
              <span><?= pll__('Услуги') ?></span>
              <div class="header-nav__subcontent">
                <ul class="header-nav__submenu">
                  <?php
                  if ($services) :
                    foreach ($services as $service) :
                      $title = $service->post_title;
                      $link = get_permalink($service->ID);
                  ?>
                      <li class="header-nav__subitem">
                        <a class="link link_lighter" href="<?= $link ?>"><?= $title ?></a>
                      </li>
                  <?php
                    endforeach;
                  endif;
                  ?>
                </ul>
              </div>
              <div class="header-nav__overlay"></div>
            </li>

            <li class="header-nav__item">
              <a class="link" href="<?= $about_link['url'] ?>"><?= $about_link['title'] ?></a>
            </li>

            <li class="header-nav__item">
              <a class="link" href="<?= $journal_link['url'] ?>"><?= $journal_link['title'] ?></a>
            </li>

            <li class="header-nav__item">
              <a class="link" href="<?= $stories_link['url'] ?>"><?= $stories_link['title'] ?></a>
            </li>

            <li class="header-nav__item">
              <a class="link" href="<?= $feedback_link['url'] ?>"><?= $feedback_link['title'] ?></a>
            </li>

            <li class="header-nav__item">
              <a class="link" href="<?= $contacts_link['url'] ?>"><?= $contacts_link['title'] ?></a>
            </li>
          </ul>
          <div class="header__contacts">
            <?php if ($phone) : ?>
              <div class="header__phone">
                <a class="link" href="tel:<?= $phone ?>">
                  <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                    <use xlink:href="#phone" />
                  </svg>
                  <?= $phone ?>
                </a>
              </div>
            <?php endif; ?>

            <div class="header__socials social-links">
              <?php if ($whatsapp) : ?>
                <a class="header__social social-links__item social-links__item_whatsapp" href="<?= $whatsapp ?>" target="_blank">
                  <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg">
                    <use xlink:href="#whatsapp-circle" />
                  </svg>
                </a>
              <?php endif; ?>

              <?php if ($telegram) : ?>
                <a class="header__social social-links__item social-links__item_telegram" href="<?= $telegram ?>" target="_blank">
                  <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg">
                    <use xlink:href="#telegram-circle" />
                  </svg>
                </a>
              <?php endif; ?>
            </div>

            <div class="header__buttons">

              <?php
              $langs = pll_the_languages([
                'raw' => 1,
              ]);
              $other_lang = reset(array_filter($langs, fn($lang) => !$lang['current_lang']));
              ?>
              <a class="header__button button button_secondary button_small" href="<?= $other_lang['url'] ?>">
                <?= strtoupper($other_lang['slug']) ?>
              </a>

              <?php if ($telegram) : ?>
                <a href="<?= $telegram ?>" target="_blank" class="header__button header__button_telegram button button_primary button_small button_telegram">
                  Telegram
                </a>
              <?php endif; ?>
              <button class="header__button header__button_popup button button_primary button_small" type="button" data-button="chances">
                <?= pll__('Оценить шансы') ?>
              </button>
              <button class="header__button header__burger button-icon" type="button" data-burger>
                <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                  <use xlink:href="#three-lines" />
                </svg>
                <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                  <use xlink:href="#cross" />
                </svg>
              </button>
            </div>
          </div>
        </div>

        <div class="burger-menu">
          <ul class="burger-menu__nav">
            <li class="burger-menu__link burger-menu__link_has-menu">
              <span><?= pll__('Визы и ВНЖ') ?></span>
              <ul class="burger-menu__submenu">
                <?php
                if ($visas) :
                  foreach ($visas as $visa) :
                    $title = $visa->post_title;
                    $link = get_permalink($visa->ID);
                ?>
                    <li class="burger-menu__sublink">
                      <a class="link link_lighter" href="<?= $link ?>"><?= $title ?></a>
                    </li>
                <?php
                  endforeach;
                endif;
                ?>
              </ul>
            </li>

            <li class="burger-menu__link burger-menu__link_has-menu">
              <span><?= pll__('Услуги') ?></span>
              <ul class="burger-menu__submenu">
                <?php
                if ($services) :
                  foreach ($services as $service) :
                    $title = $service->post_title;
                    $link = get_permalink($service->ID);
                ?>
                    <li class="burger-menu__sublink">
                      <a class="link link_lighter" href="<?= $link ?>"><?= $title ?></a>
                    </li>
                <?php
                  endforeach;
                endif;
                ?>
              </ul>
            </li>

            <li class="burger-menu__link">
              <a class="link" href="<?= $about_link['url'] ?>"><?= $about_link['title'] ?></a>
            </li>

            <li class="burger-menu__link">
              <a class="link" href="<?= $journal_link['url'] ?>"><?= $journal_link['title'] ?></a>
            </li>

            <li class="burger-menu__link">
              <a class="link" href="<?= $stories_link['url'] ?>"><?= $stories_link['title'] ?></a>
            </li>

            <li class="burger-menu__link">
              <a class="link" href="<?= $feedback_link['url'] ?>"><?= $feedback_link['title'] ?></a>
            </li>

            <li class="burger-menu__link">
              <a class="link" href="<?= $contacts_link['url'] ?>"><?= $contacts_link['title'] ?></a>
            </li>
          </ul>
          <?php if ($email) : ?>
            <div class="burger-menu__item">
              <div><?= pll__('Электронная почта') ?></div>
              <a href="mailto:<?= $email ?>" class="link"><?= $email ?></a>
            </div>
          <? endif; ?>

          <?php if ($address) : ?>
            <address class="burger-menu__item">
              <div><?= pll__('Адрес офиса') ?></div>
              <span><?= $address ?></span>
            </address>
          <? endif; ?>

          <?php if ($phone) : ?>
            <div class="burger-menu__item">
              <div><?= pll__('Позвоните нам') ?></div>
              <a href="tel:<?= $phone ?>" class="link"><?= $phone ?></a>
            </div>
          <? endif; ?>

          <div class="header__socials social-links">
            <?php if ($whatsapp) : ?>
              <a class="header__social social-links__item social-links__item_whatsapp" href="<?= $whatsapp ?>" target="_blank">
                <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg">
                  <use xlink:href="#whatsapp-circle" />
                </svg>
              </a>
            <? endif; ?>

            <?php if ($telegram) : ?>
              <a class="header__social social-links__item social-links__item_telegram" href="<?= $telegram ?>" target="_blank">
                <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg">
                  <use xlink:href="#telegram-circle" />
                </svg>
              </a>
            <? endif; ?>
          </div>
          <div class="burger-menu__bottom">
            <a href="<?= $privacy_link['url'] ?>" class="link link_gray" target="_blank"><?= $privacy_link['title'] ?></a>
            <span><?= pll__('Все права защищены') ?> © 2024</span>
          </div>
        </div>
      </div>
    </div>
  </header>