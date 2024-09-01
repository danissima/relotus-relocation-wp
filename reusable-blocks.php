<?php

/**
 * Template name: Сквозные блоки
 */
$baseUrl  = get_template_directory_uri();
get_header();

$cards = get_field('feedback_cards');
$json_cards = json_encode($cards);
?>
<main>
   
</main>
<?php get_footer(); ?>