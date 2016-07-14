<?php
require_once __DIR__.'/App/bootstrap.php';

$twig = $container->get("twig.environment");
$template = 'index.html.twig';
$data = [];

setup_postdata($post);

function handle_content_rows($twig, &$data) {
    $flexibleContent = [];
    while(have_rows('content')) {
        the_row();
        switch($layout = get_row_layout()) {
            case 'content_two_columns':
                $flexibleContent[] = $twig->render('panels/content-two-col.html.twig', $data);
                break;
            case 'content_two_columns_reversed':
                $flexibleContent[] = $twig->render('panels/content-two-col-reversed.html.twig', $data);
                break;
            case 'content_grid':
                $flexibleContent[] = $twig->render('panels/content-grid.html.twig', $data);
                break;
            case 'our_partners':
                $flexibleContent[] = $twig->render('panels/partners.html.twig', $data);
                break;
            case 'services':
                $flexibleContent[] = $twig->render('panels/services.html.twig', $data);
                break;
            case 'why_choose_us':
                $flexibleContent[] = $twig->render('panels/why-choose-us.html.twig', $data);
                break;
            case 'recent_work':
                $flexibleContent[] = $twig->render('panels/case-studies-slider.html.twig', $data);
                break;
            case 'office_tabs':
                $flexibleContent[] = $twig->render('panels/office.html.twig', $data);
                break;
            case 'horizontal_menu':
                $flexibleContent[] = $twig->render('panels/horizontal-menu.html.twig', $data);
                break;
            default:
                throw new Exception('Could not render layout for '.$layout);
                break;
        }
    }
    $data['content'] = $flexibleContent;
}
handle_content_rows($twig, $data);

if(is_404()) {
    $template = 'pages/404.html.twig';
}
elseif(is_post_type_archive('case_studies') || is_tax('case_studies_tags')) {
    $template = 'pages/archive-case-studies.html.twig';
        if(get_queried_object()) {
            $data['current_category'] = get_taxonomy(get_queried_object()->taxonomy);
        }
        $teasers = [];
        while(have_posts()) {
            the_post();
            $teasers[] = $twig->render('panels/case-studies-teaser.html.twig');
        }
        $data['teasers'] = $teasers;
} elseif(get_post_field('post_name', get_post()) == 'case-studies') {
    $template = 'pages/archive-case-studies.html.twig';
    $teasers = [];
    $loop = new \WP_Query([
        'post_type' => 'case_studies',
        'post_status' => 'publish',
        'posts_per_page' => -1
    ]);
    while($loop->have_posts()) {
        $loop->the_post();
        setup_postdata($loop->post);
        $teasers[] = $twig->render('panels/case-studies-teaser.html.twig');
    }
    $data['teasers'] = $teasers;
    wp_reset_postdata();
    setup_postdata($post);
}
elseif(is_home() || is_archive() || is_search()) {
    $template = 'pages/post.html.twig';
    $teasers = [];
    while(have_posts()) {
        the_post();
        $teasers[] = $twig->render('panels/blog-teaser.html.twig');
    }
    $data['teasers'] = $teasers;
    wp_reset_postdata();
    setup_postdata($post);
}
elseif(get_post_type() == 'case_studies') {
    $template = 'pages/single-case-studies.html.twig';
}
elseif (is_page()) {
    $template = 'base.html.twig';
}
elseif(is_single()){
    $template = 'pages/single-post.html.twig';
}
else {
    $template = 'base.html.twig';
}

echo $twig->render($template, $data);
