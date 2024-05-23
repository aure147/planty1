<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); 
//$post = get_post (30);
//$to_print = $post->post_content;
//echo $to_print;

if (class_exists('\Elementor\Plugin')) {
  
  $pluginElementor = \Elementor\Plugin::instance();
  $contentElementor = $pluginElementor->frontend->get_builder_content_for_display(24);
}

$content = (isset($contentElementor)) ? $contentElementor : '';
echo $content;


