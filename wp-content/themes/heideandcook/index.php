<?php
require_once __DIR__.'/App/bootstrap.php';

$twig = $container->get("twig.environment");
$template = 'index.html.twig';
$data = [];

echo $twig->render($template, $data);
