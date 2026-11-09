<?php



define( 'IMIGRAT_ROOT', get_template_directory() . '/' );



require_once get_template_directory() . '/includes/functions/functions.php';

include_once get_template_directory() . '/includes/classes/base.php';

include_once get_template_directory() . '/includes/classes/dotnotation.php';

include_once get_template_directory() . '/includes/classes/header-enqueue.php';

include_once get_template_directory() . '/includes/classes/options.php';
include_once get_template_directory() . '/includes/classes/options-codestar.php';


include_once get_template_directory() . '/includes/classes/ajax.php';

include_once get_template_directory() . '/includes/classes/common.php';

include_once get_template_directory() . '/includes/classes/bootstrap_walker.php';

include_once get_template_directory() . '/includes/library/class-tgm-plugin-activation.php';

require_once get_template_directory() . '/includes/library/hook.php';



// Merlin demo import.

require_once get_template_directory() . '/demo-import/class-merlin.php';

require_once get_template_directory() . '/demo-import/merlin-config.php';

require_once get_template_directory() . '/demo-import/merlin-filters.php';



add_action( 'after_setup_theme', 'imigrat_wp_load', 5 );



function imigrat_wp_load() {



	defined( 'IMIGRAT_URL' ) or define( 'IMIGRAT_URL', get_template_directory_uri() . '/' );

	define(  'IMIGRAT_KEY','!@#imigrat');

	define(  'IMIGRAT_URI', get_template_directory_uri() . '/');



	if ( ! defined( 'IMIGRAT_NONCE' ) ) {

		define( 'IMIGRAT_NONCE', 'imigrat_wp_theme' );

	}



	( new \IMIGRAT\Includes\Classes\Base )->loadDefaults();

	( new \IMIGRAT\Includes\Classes\Ajax )->actions();



}

add_action( 'init', 'imigrat_bunch_theme_init');

function imigrat_bunch_theme_init()

{

	$bunch_exlude_hooks = include_once get_template_directory(). '/includes/resource/remove_action.php';

	foreach( $bunch_exlude_hooks as $k => $v )

	{

		foreach( $v as $value )

		remove_action( $k, $value[0], $value[1] );

	}



}
