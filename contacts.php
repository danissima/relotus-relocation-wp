<?php

/**
 * Template name: Контакты
 */
$baseUrl  = get_template_directory_uri();
get_header();

$phone = get_field('phone', 'option');
$address = get_field('address', 'option');
$email = get_field('email', 'option');
$telegram = get_field('telegram', 'option');
$whatsapp = get_field('whatsapp', 'option');
?>

<main>
  <section class="contacts">
    <div class="container">

      <?php get_template_part('components/breadcrumbs') ?>
      <h1 class="h1 h1_blue"><?= pll__('Контакты') ?></h1>
      <div class="block block_equal-padding">
        <div class="contacts__grid">
          <div class="contacts__links" style="grid-area: links;">
            <?php if ($email) : ?>
              <div class="contacts__link contacts__link_email">
                <span class="contacts__label"><?= pll__('Электронная почта') ?></span>
                <a class="link" href="mailto:<?= $email ?>"><?= $email ?></a>
              </div>
            <?php endif; ?>

            <?php if ($phone) : ?>
              <div class="contacts__link">
                <span class="contacts__label"><?= pll__('Позвоните нам') ?></span>
                <a class="link" href="tel:<?= $phone ?>"><?= $phone ?></a>
              </div>
            <?php endif; ?>
          </div>
          <div class="contacts__address" style="grid-area: address;">
            <?php if ($address) : ?>
              <address class="contacts__link">
                <span class="contacts__label"><?= pll__('Адрес офиса') ?></span>
                <div><?= $address ?></div>
              </address>
            <?php endif; ?>

            <div class="contacts__media">
              <?php if ($telegram) : ?>
                <a href="<?= $telegram ?>" class="button button_telegram" target="_blank">
                  Telegram
                </a>
              <?php endif; ?>

              <?php if ($whatsapp) : ?>
                <a href="<?= $whatsapp ?>" class="button button_whatsapp" target="_blank">
                  WhatsApp
                </a>
              <?php endif; ?>
            </div>
          </div>
          <div class="contacts__map" style="grid-area: map;">
            <div style="position:relative;overflow:hidden; height: 100%;"><a
                href="https://yandex.ru/maps/10429/barcelona/?utm_medium=mapframe&utm_source=maps"
                style="color:#eee;font-size:12px;position:absolute;top:0px;">Барселона</a><a
                href="https://yandex.ru/maps/10429/barcelona/house/ZlcHcwRmTEIbWF90YHV1d3Vh/?ll=2.157385%2C41.393479&utm_medium=mapframe&utm_source=maps&z=14.14"
                style="color:#eee;font-size:12px;position:absolute;top:14px;">Проспект Диагональ, 419 —
                Яндекс Карты</a><iframe
                src="https://yandex.ru/map-widget/v1/?lang=<?= pll_current_language() ?>_RU&ll=2.157385%2C41.393479&mode=search&ol=geo&ouri=ymapsbm1%3A%2F%2Fgeo%3Fdata%3DCgo1ODkyNDAzNjg3EkpTcGFpbiwgQ29tdW5pdGF0IGF1dMOybm9tYSBkZSBDYXRhbHVueWEsIEJhcmNlbG9uYSwgQXZpbmd1ZGEgRGlhZ29uYWwsIDQxOSIKDYrVCUAVK5QlQg%2C%2C&z=14.14"
                width="100%" height="100%" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
  include 'components/contact-form.php';
  ?>
</main>

<?php get_footer(); ?>