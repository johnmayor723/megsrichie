<?php

/**

 * Available filters for extending Merlin WP.

 *

 * @package   Merlin WP

 * @version   @@pkg.version

 * @link      https://merlinwp.com/

 * @author    Rich Tabor, from ThemeBeans.com & the team at ProteusThemes.com

 * @copyright Copyright (c) 2018, Merlin WP of Inventionn LLC

 * @license   Licensed GPLv3 for Open Source Use

 */





/**

 * Add your widget area to unset the default widgets from.

 * If your theme's first widget area is "sidebar-1", you don't need this.

 *

 * @see https://stackoverflow.com/questions/11757461/how-to-populate-widgets-on-sidebar-on-theme-activation

 *

 * @param  array $widget_areas Arguments for the sidebars_widgets widget areas.

 *

 * @return array of arguments to update the sidebars_widgets option.

 */

function imigrat_unset_default_widgets_args( $widget_areas ) {



	$widget_areas = array(

		'default-sidebar' => array(),

	);



	return $widget_areas;

}



add_filter( 'merlin_unset_default_widgets_args', 'imigrat_unset_default_widgets_args' );



/**

 * Custom content for the generated child theme's functions.php file.

 *

 * @param string $output Generated content.

 * @param string $slug   Parent theme slug.

 */

function imigrat_child_functions_php( $output, $slug ) {



	$slug_no_hyphens = strtolower( preg_replace( '#[^a-zA-Z]#', '', $slug ) );



	$output = "

		<?php

		/**

		 * Theme functions and definitions.

		 */

		function {$slug_no_hyphens}_child_enqueue_styles() {



		    if ( SCRIPT_DEBUG ) {

		        wp_enqueue_style( '{$slug}-style' , get_template_directory_uri() . '/style.css' );

		    } else {

		        wp_enqueue_style( '{$slug}-minified-style' , get_template_directory_uri() . '/style.css' );

		    }



		    wp_enqueue_style( '{$slug}-child-style',

		        get_stylesheet_directory_uri() . '/style.css',

		        array( '{$slug}-style' ),

		        wp_get_theme()->get('Version')

		    );

		}



		add_action(  'wp_enqueue_scripts', '{$slug_no_hyphens}_child_enqueue_styles' );\n

	";



	// Let's remove the tabs so that it displays nicely.

	$output = trim( preg_replace( '/\t+/', '', $output ) );



	// Filterable return.

	return $output;

}



add_filter( 'merlin_generate_child_functions_php', 'imigrat_child_functions_php', 10, 2 );



/**

 * Define the demo import files (local files).

 * You have to use the same filter as in above example,

 * but with a slightly different array keys: local_*.

 * The values have to be absolute paths (not URLs) to your import files.

 * To use local import files, that reside in your theme folder,

 * please use the below code.

 * Note: make sure your import files are readable!

 */

function imigrat_local_import_files() {

	return array(

		array(

			'import_file_name'         => esc_html__('Main Demo', 'imigrat'),

			'preview_url'              => 'https://themexriver.com/wp/imigrat/',

			'local_import_widget_file' => trailingslashit( get_template_directory() ) . 'demo-import/content/widgets.wie',


			'local_import_file'        => trailingslashit( get_template_directory() ) . 'demo-import/content/content.xml',

			'import_preview_image_url' => get_template_directory_uri() . '/screenshot.png',

			'import_notice'            => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'imigrat' ),



		),

	);

}



add_filter( 'merlin_import_files', 'imigrat_local_import_files' );



/**

 * Execute custom code after the whole import has finished.

 */

function imigrat_after_import_setup() {

	// Assign menus to their locations.

	$main_menu = get_term_by( 'name', 'main menu', 'nav_menu' );

	$footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );



	set_theme_mod(

		'nav_menu_locations', array(

			'main_menu' => $main_menu->term_id,

			'footer_menu' => $footer_menu->term_id,

		)

	);



	// Assign front page and posts page (blog page).

	$front_page_id = get_page_by_title( 'Home Page 1' );

	$blog_page_id  = get_page_by_title( 'News Two' );



	update_option( 'show_on_front', 'page' );

	update_option( 'page_on_front', $front_page_id->ID );

	update_option( 'page_for_posts', $blog_page_id->ID );



    $logo = get_page_by_title( 'logo', OBJECT, 'attachment' );



    if( $logo ) {

    	set_theme_mod( 'custom_logo', $logo->ID );

    }



    if( class_exists('RevSliderSliderImport') ) {

		foreach(array('slider-1') as $slider) {

			$file = get_template_directory() . '/demo-import/content/'.$slider.'.zip';

			if( file_exists($file) ) {

				$importer = new RevSliderSliderImport();

				$response = $importer->import_slider( true, $file );

			}

		}

    }




	global $wp_filesystem;
	require_once ( ABSPATH . '/wp-admin/includes/file.php' );
	WP_Filesystem();
	//theme-options
	$theme_options = trailingslashit( get_template_directory() ) .'demo-import/content/theme-options.json';
	$theme_options_raw_data = $wp_filesystem->get_contents( $theme_options ) ;
	$theme_options_data = maybe_unserialize(json_decode( $theme_options_raw_data, true ));
	update_option( 'imigrat_options', $theme_options_data);

}



add_action( 'merlin_after_all_import', 'imigrat_after_import_setup' );