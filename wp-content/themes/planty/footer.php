<?php 
if ( ! defined ('ABSPATH')) {
    exit; //Exit if accessed directly.
}

if( class_exists('\Elementor\Plugin')){

    $pluginElementor = \Elementor\Plugin::instance();
    $contentElementor = $pluginElementor->frontend->get_builder_content_for_display(114);
}

$content = (isset ($contentElementor)) ? $contentElementor: '';

echo $content;

wp_footer();

?>

</body>
</html>