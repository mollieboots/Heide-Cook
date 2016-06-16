<?php
/**
 * Created by PhpStorm.
 * User: rpark
 * Date: 6/8/2016
 * Time: 11:20 PM
 */

namespace Supertheme\WordPress\Twig;


class WordPress
{
    public function title($post = 0, $before = '', $after = '')
    {
        $title = get_the_title($post);

        if (strlen($title) == 0) {
            return '';
        }

        $title = $before . $title . $after;

        return $title;
    }

    public function content($more_link_text = null, $strip_teaser = false)
    {
        return the_content($more_link_text, $strip_teaser);
    }

    public function featuredImage($post = null, $size = 'post-thumbnail', $attr = '')
    {
        return get_the_post_thumbnail($post, $size, $attr);
    }

    public function body_class($class = '')
    {
        return 'class="'.join(' ', get_body_class($class )).'"';
    }

    public function header()
    {
        ob_start();
        wp_head();
        return ob_get_clean();
    }

    public function footer()
    {
        ob_start();
        wp_footer();
        return ob_get_clean();
    }

    public function templateURI()
    {
        return get_template_directory_uri();
    }

    public function URL($post = 0, $leavename = false) {
        return get_permalink();
    }
}