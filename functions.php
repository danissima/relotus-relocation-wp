<?php
/* remove jquery (hopefuly) */
if (!is_admin()) wp_deregister_script('jquery');

/* query to load more journal posts */
function journal_load_more()
{
  $selected_topic = array_key_exists('topic_id', $_POST) ? $_POST['topic_id'] : null;

  $ajaxposts = new WP_Query([
    'post_type' => 'journal',
    'posts_per_page' => 3,
    'paged' => $_POST['paged'],
    'tax_query' => $selected_topic ? [
      [
        'taxonomy' => 'journal_post_topic',
        'field' => 'term_id',
        'terms' => $selected_topic,
      ],
    ] : [],
  ]);

  $response = '';
  $max_pages = $ajaxposts->max_num_pages;

  if ($ajaxposts->have_posts()) {
    ob_start();

    foreach ($ajaxposts->posts as $post) {
      $response .= get_template_part('components/journal-card', null, $post);
    }

    $output = ob_get_contents();
    ob_end_clean();
  } else {
    $response = '';
  }

  $result = [
    'total_pages' => $max_pages,
    'html' => $output,
    'topic_id' => $selected_topic,
  ];

  echo json_encode($result);
  exit;
}

add_action('wp_ajax_journal_load_more', 'journal_load_more');
add_action('wp_ajax_nopriv_journal_load_more', 'journal_load_more');

/* query to load more stories posts */
function stories_load_more()
{
  $ajaxposts = new WP_Query([
    'post_type' => 'stories',
    'posts_per_page' => 6,
    'paged' => $_POST['paged'],
  ]);

  $response = '';
  $max_pages = $ajaxposts->max_num_pages;

  if ($ajaxposts->have_posts()) {
    ob_start();

    foreach ($ajaxposts->posts as $post) {
      $response .= get_template_part('components/story-article-card', null, $post);
    }

    $output = ob_get_contents();
    ob_end_clean();
  } else {
    $response = '';
  }

  $result = [
    'total_pages' => $max_pages,
    'html' => $output,
  ];

  echo json_encode($result);
  exit;
}

add_action('wp_ajax_stories_load_more', 'stories_load_more');
add_action('wp_ajax_nopriv_stories_load_more', 'stories_load_more');

pll_register_string('visas', 'Визы и ВНЖ');
pll_register_string('services', 'Услуги');
pll_register_string('check_chances', 'Оценить шансы');
pll_register_string('check_relocation_chances', 'Узнать шансы на переезд');
pll_register_string('email', 'Электронная почта');
pll_register_string('office_address', 'Адрес офиса');
pll_register_string('call_us', 'Позвоните нам');
pll_register_string('all_rights_reserved', 'Все права защищены');
pll_register_string('feedback_from_entrepreneurs', 'Отзывы предпринимателей, которые успешно переехали в Испанию');
pll_register_string('relocation_journal', 'Журнал о релокации');
pll_register_string('open_journal', 'Открыть журнал');
pll_register_string('help_with_relocation', 'Поможем переехать в Испанию без стресса и ошибок за 45 дней');
pll_register_string('find_best_visa', 'Подберем лучший ВНЖ или визу под ваши цели и ситуацию');
pll_register_string('free_consultation', 'Бесплатная консультация');
pll_register_string('learn_more', 'Подробнее');
pll_register_string('online_journal_about_relocation', 'Онлайн-журнал о жизни и иммиграции в Испанию');
pll_register_string('all_articles', 'Все статьи');
pll_register_string('load_more', 'Загрузить ещё');
pll_register_string('contents', 'Содержание');
pll_register_string('might_be_interested', 'Вам может быть интересно');
pll_register_string('youtube_channel_relocation_videos', '20+ видео об особенностях релокации в Испанию на нашем ютуб-канале');
pll_register_string('open_youtube_channel', 'Открыть канал на Youtube');
pll_register_string('we_check_chances_free', 'Бесплатно оценим шансы на переезд в Испанию');
pll_register_string('30_relocation_programs', 'В Испании есть более 30 программ миграции для иностранцев, поэтому самостоятельно разобраться во всех вариантах и выбрать программу очень сложно.');
pll_register_string('fill_short_form', 'Заполните короткую анкету и наши эксперты подберут оптимальные варианты индивидуально под вашу ситуацию.');
pll_register_string('your_name', 'Ваше имя');
pll_register_string('your_citizenship', 'Ваше гражданство');
pll_register_string('your_location', 'Где проживаете сейчас');
pll_register_string('your_age', 'Ваш возраст');
pll_register_string('your_phone_number', 'Ваш номер телефона');
pll_register_string('your_email', 'Ваш E-mail');
pll_register_string('how_many_people', 'В каком составе планируете переезд?');
pll_register_string('only_me', 'Я один');
pll_register_string('with_partner', 'С партнером');
pll_register_string('with_partner_and_children', 'С партнером и детьми');
pll_register_string('with_family_and_parents', 'С семьей и родителями');
pll_register_string('how_long_staying', 'На какой срок планируете переезд?');
pll_register_string('less_than_year', 'До 1 года');
pll_register_string('less_than_2_years', 'До 2 лет');
pll_register_string('less_than_5_years', 'До 5 лет');
pll_register_string('forever', 'Навсегда');
pll_register_string('your_relocate_budget', 'Какой бюджет готовы заложить для переезда?');
pll_register_string('less_than_2k', 'До 2 000 евро');
pll_register_string('2k_10k', '2 000 -  10 000 евро');
pll_register_string('10k_50k', '10 000 - 50 000 евро');
pll_register_string('more_than_50k', 'более 50 000 евро');
pll_register_string('fill_form_current_type', 'Заполните формы и мы расскажем особенности программы и подойдет ли вам этот тип релокации');
pll_register_string('send_request', 'Оставить заявку');
pll_register_string('step', 'шаг');
pll_register_string('az', 'А-Я');
pll_register_string('articles_by_type', 'Статьи по типу ВНЖ');
pll_register_string('request_success', 'Заявка отправлена!');
pll_register_string('request_error', 'Ошибка. Попробуйте позже');
pll_register_string('page_not_found', 'Страница не найдена.');
pll_register_string('article_author', 'Автор статьи');
pll_register_string('share', 'Поделиться');
pll_register_string('program_advantages', 'Преимущества программы');
pll_register_string('privacy_policy_long', 'Политика в отношении обработки персональных данных');
pll_register_string('new', 'Новое');
pll_register_string('send_request_free_consultation', 'Оставьте заявку на бесплатную консультацию эксперта');
pll_register_string('your_question', 'Ваш вопрос');
