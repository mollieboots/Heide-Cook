<?php
require_once __DIR__.'/App/bootstrap.php';

ob_start();
wp_head();
$head = ob_get_clean();

$twig = $container->get("twig.environment");

// if (is_home()) {
//     $twig->render('index.html.twig')
// }

echo $twig->render('index.html.twig', array('title' => get_the_title(), 'head' => $head));
