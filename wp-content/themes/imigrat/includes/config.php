<?php
/**
 * Theme config file.
 *
 * @package IMIGRAT
 * @author  TheGenious
 * @version 1.0
 * changed
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}
$config = array();
$config['default']['imigrat_main_header'][] 	= array( 'imigrat_main_header_area', 99 );
$config['default']['imigrat_main_footer'][] 	= array( 'imigrat_main_footer_area', 99 );
$config['default']['imigrat_sidebar'][] 	    = array( 'imigrat_sidebar', 99 );
$config['default']['imigrat_banner'][] 	    = array( 'imigrat_banner', 99 );
return $config;
