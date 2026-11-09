<?php

/**

 * Theme functions and definitions.

 */

function imigrat_child_enqueue_styles() {



    if ( SCRIPT_DEBUG ) {

        wp_enqueue_style( 'imigrat-style' , get_template_directory_uri() . '/style.css' );

    } else {

        wp_enqueue_style( 'imigrat-minified-style' , get_template_directory_uri() . '/style.css' );

    }



    wp_enqueue_style( 'imigrat-child-style',

        get_stylesheet_directory_uri() . '/style.css',

        array( 'imigrat-style' ),

        wp_get_theme()->get('Version')

    );

}



add_action(  'wp_enqueue_scripts', 'imigrat_child_enqueue_styles' );