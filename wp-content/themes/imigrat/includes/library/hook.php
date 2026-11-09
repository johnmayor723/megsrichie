<?php
/**
 * Hookup all the tags here.
 *
 * @package IMIGRAT
 * @author  The Genious
 * @version 1.0
 */
/**
 * Load the default config
 */
//imigrat_load_default_hooks
function imigrat_load_default_hooks() {
	$config = imigrat_WSH()->config( 'default' );
	if ( is_array( $config ) ) {
		foreach ( $config as $key => $more ) {
			foreach ( $more as $k => $value ) {
				$func = is_array( $value ) ? $value[0] : $value;
				$priority = isset( $value[1] ) ? $value[1] : 99;
				$params   = isset( $value[2] ) ? $value[2] : 2;
				add_action( $key, $func, $priority, $params );
			}
		}
	}
}

/**
 * [imigrat_main_header_area description]
 *
 * @return [type] [description]
 */
//imigrat_main_header_area
function imigrat_main_header_area() {

	$options     = imigrat_WSH()->option();
    $header_type = '';
    $header_e = 0;
    $header_d = '';

    if( is_page() ) {
		$header_source_type = ( isset($imigrat_meta['header_source_type']) ) ? $imigrat_meta['header_source_type'] : '';
		$header_new_elementor_template = ( isset($imigrat_meta['header_new_elementor_template']) ) ? $imigrat_meta['header_new_elementor_template']: '';
		$header_style_settings = ( isset($imigrat_meta['header_style_settings']) ) ? $imigrat_meta['header_style_settings'] : '';
		$imigrat_meta = get_post_meta( get_the_ID(), 'imigrat_meta', true );
		$header_type = $header_source_type;
        $header_e    = $header_new_elementor_template;
        $header_d    = $header_style_settings;

	}



	if( ! $header_type || $header_type == 'd' ) {
    	$header_type = $options->get( 'header_source_type' );
        $header_e = $options->get('header_elementor_template');
        $header_d = $options->get('header_style_settings');

	}

        if ( $header_type == 'e' AND class_exists( '\Elementor\Plugin' ) AND $header_e ) {
            echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $header_e );
            return false;
        } elseif ( $header_type == 'd' AND class_exists( '\Elementor\Plugin' ) AND $header_d ) {
            //need to change
			$imigrat_meta = get_post_meta( get_the_ID(), 'imigrat_meta', true );
			$header_option = $options->get( 'header_style_settings' );
			$header_style = ( isset($imigrat_meta['header_style_settings']) ) ? $imigrat_meta['header_style_settings'] : $header_option;

		}else {

			//need to change
            $imigrat_meta = get_post_meta( get_the_ID(), 'imigrat_meta', true );
			$header_option = $options->get( 'header_style_settings' );
			$header_style = ( isset($imigrat_meta['header_style_settings']) ) ? $imigrat_meta['header_style_settings'] : $header_option;

		}

	//need to change
	if ( $header_style == 'header_v1' ) {
		imigrat_template_load( 'templates/header/default-header.php' );

	} elseif ( $header_style == 'header_v2' ) {
		imigrat_template_load( 'templates/header/header_v2.php' );

	} elseif ( $header_style == 'header_v3' ) {
		imigrat_template_load( 'templates/header/header_v3.php' );

	} elseif ( $header_style == 'header_v4' ) {
		imigrat_template_load( 'templates/header/header_v4.php' );

	} elseif ( $header_style == 'header_v5' ) {
		imigrat_template_load( 'templates/header/header_v5.php' );

	} elseif ( $header_style == 'header_v6' ) {
		imigrat_template_load( 'templates/header/header_v6.php' );

	} else {
		imigrat_template_load( 'templates/header/header_v3.php' );
	}
}

/**
 * [imigrat_main_footer_area description]
 *
 * @return [type] [description]
 */
//imigrat_main_footer_area

function imigrat_main_footer_area() {
	$options     = imigrat_WSH()->option();
    $footer_type = '';
    $footer_e = 0;
    $footer_d = '';



    if( is_page() ) {
		$footer_source_type = ( isset($imigrat_meta['footer_source_type']) ) ? $imigrat_meta['footer_source_type'] : '';
		$footer_new_elementor_template = ( isset($imigrat_meta['footer_new_elementor_template']) ) ? $imigrat_meta['footer_new_elementor_template']: '';
		$footer_style_settings = ( isset($imigrat_meta['footer_style_settings']) ) ? $imigrat_meta['footer_style_settings'] : '';
		$imigrat_meta = get_post_meta( get_the_ID(), 'imigrat_meta', true );
	    $footer_type = $footer_source_type;
        $footer_e    = $footer_new_elementor_template;
        $footer_d    = $footer_style_settings;
	}

	if( ! $footer_type || $footer_type == 'd' ) {
    	$footer_type = $options->get( 'footer_source_type' );
        $footer_e = $options->get('footer_elementor_template');
        $footer_d = $options->get('footer_style_settings');

	}

        if ( $footer_type == 'e' AND class_exists( '\Elementor\Plugin' ) AND $footer_e ) {
            echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $footer_e );
            return false;

        } elseif ( $footer_type == 'd' AND class_exists( '\Elementor\Plugin' ) AND $footer_d ) {
            //need to change
			$imigrat_meta = get_post_meta( get_the_ID(), 'imigrat_meta', true );
			$footer_option = $options->get( 'footer_style_settings' );
			$footer_style = ( isset($imigrat_meta['footer_style_settings']) ) ? $imigrat_meta['footer_style_settings'] : $footer_option;

		}else {
            //need to change
			$imigrat_meta = get_post_meta( get_the_ID(), 'imigrat_meta', true );
			$footer_option = $options->get( 'footer_style_settings' );
			$footer_style = ( isset($imigrat_meta['footer_style_settings']) ) ? $imigrat_meta['footer_style_settings'] : $footer_option;
		}

	//need to change

	if ( $footer_style == 'footer_v1' ) {
		imigrat_template_load( 'templates/footer/default-footer.php' );
	} elseif ( $footer_style == 'footer_v2' ) {
		imigrat_template_load( 'templates/footer/footer_v2.php' );
	} elseif ( $footer_style == 'footer_v3' ) {
		imigrat_template_load( 'templates/footer/footer_v3.php' );
	} elseif ( $footer_style == 'footer_v4' ) {
		imigrat_template_load( 'templates/footer/footer_v4.php' );
	} elseif ( $footer_style == 'footer_v5' ) {
		imigrat_template_load( 'templates/footer/footer_v5.php' );
	} elseif ( $footer_style == 'footer_v6' ) {
		imigrat_template_load( 'templates/footer/footer_v6.php' );
	} else {
		imigrat_template_load( 'templates/footer/default-footer.php' );
	}

}

/**
 * [imigrat_sidebar description]
 *
 * @return [type] [description]
 */
//imigrat_sidebar
function imigrat_sidebar( $data ) {
	imigrat_template_load( 'templates/sidebar.php', compact( 'data' ) );
}

/**
 * [imigrat_banner description]
 *
 * @return [type] [description]
 */
//imigrat_banner
function imigrat_banner( $data ) {
	imigrat_template_load( 'templates/banner/banner.php', compact( 'data' ) );
}