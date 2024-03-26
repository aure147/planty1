<?php
add_action('init','wp_menu');
function wp_menu(){
    add_theme_support('menus'); 
  
}
add_action('wp_enqueue_scripts','plantystyle');
function plantystyle (){
    wp_enqueue_style( 'plantystyle', get_stylesheet_uri() );
    
}
?>
