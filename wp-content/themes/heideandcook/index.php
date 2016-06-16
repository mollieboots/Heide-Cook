<?php
require_once __DIR__.'/App/bootstrap.php';

$twig = $container->get("twig.environment");
$template = 'index.html.twig';
$data = [];

if(is_404()) {
    $template = 'pages/404.html.twig';
}
elseif(is_post_type_archive('case_studies')) {
    $template = 'pages/archive-case-studies.html.twig';
    $teasers = [];
    while(have_posts()) {
        the_post();
        $teasers[] = $twig->render('panels/case-studies-teaser.html.twig');
    }
    $data['teasers'] = $teasers;
    wp_reset_postdata();
}
elseif(get_post_type() == 'case_studies') {
    $template = 'pages/single-case-studies.html.twig';
}
else {
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