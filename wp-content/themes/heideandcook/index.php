<?php
require_once __DIR__.'/App/bootstrap.php';

$twig = $container->get("twig.environment");
$template = 'index.html.twig';
$data = [];

if(is_404()) {
    $template = 'pages/404.html.twig';
} else {
    $template = 'index.html.twig';
    $flexibleContent = [];
    while(have_rows('content')) {
        the_row();
        switch($layout = get_row_layout()) {
            case 'services':
                $flexibleContent[] = $twig->render('panels/services.html.twig', $data);
                break;
            case 'why_choose_us':
                $flexibleContent[] = $twig->render('panels/why-choose-us.html.twig', $data);
                break;
            case 'recent_work':
                $flexibleContent[] = $twig->render('panels/case-studies-slider.html.twig', $data);
                break;
            default:
                throw new Exception('Could not render layout for '.$layout);
                break;
        }
    }
    $data['content'] = $flexibleContent;
}

echo $twig->render($template, $data);