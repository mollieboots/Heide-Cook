<?php
require_once __DIR__.'/App/bootstrap.php';

$twig = $container->get("twig.environment");
$template = 'pages/about.html.twig';
$data = [];

echo $twig->render($template, $data);
