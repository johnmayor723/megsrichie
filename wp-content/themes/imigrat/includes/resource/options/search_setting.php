<?php



return  array(

    'title'      => esc_html__( 'Search Page Settings', 'imigrat' ),

    'id'         => 'search_setting',

    'desc'       => '', 

    'subsection' => true,

    'fields'     => array(

	    array(

		    'id'      => 'search_source_type',

		    'type'    => 'button_set',

		    'title'   => esc_html__( 'Search Source Type', 'imigrat' ),

		    'options' => array(

			    'd' => esc_html__( 'Default', 'imigrat' ),

			    'e' => esc_html__( 'Elementor', 'imigrat' ),

		    ),

		    'default' => 'd',

	    ),

	    array(

		    'id'       => 'search_elementor_template',

		    'type'     => 'select',

		    'title'    => __( 'Template', 'imigrat' ),

		    'options'     => 'posts',

		    'query_args'     => [

			    'post_type' => [ 'elementor_library' ],

				'posts_per_page'=> -1,

		    ],

		    'dependency' => [ 'search_source_type', '==', 'e' ],

	    ),



	    array(

		    'id'       => 'search_default_st',

		    'type'     => 'heading',

		    'content'    => esc_html__( 'Search Default', 'imigrat' ),

		    'dependency' => array( 'search_source_type', '==', 'd' ),

	    ),

	    array(

		    'id'      => 'search_page_banner',

		    'type'    => 'switcher',

		    'title'   => esc_html__( 'Show Banner', 'imigrat' ),

		    'desc'    => esc_html__( 'Enable to show banner on blog', 'imigrat' ),

		    'default' => true,

			'dependency'	=> array( 'search_source_type', '==', 'd' ),

	    ),

	    array(

		    'id'       => 'search_banner_title',

		    'type'     => 'text',

		    'title'    => esc_html__( 'Banner Section Title', 'imigrat' ),

		    'desc'     => esc_html__( 'Enter the title to show in banner section', 'imigrat' ),

		    'dependency' => array( 

				array('search_page_banner', '==', true ),

				array( 'search_source_type', '==', 'd' ),

			),

	    ),

	    array(

		    'id'       => 'search_page_background',

		    'type'     => 'media',

		    'url'      => true,

		    'title'    => esc_html__( 'Background Image', 'imigrat' ),

		    'desc'     => esc_html__( 'Insert background image for banner', 'imigrat' ),

		    'default'  => array(

				'url' => IMIGRAT_URI . 'assets/images/background/1.jpg',

			),

		    'dependency' => array(

				array( 'search_page_banner', '==', true ),

				array( 'search_source_type', '==', 'd' ),

			),

	    ),



	    array(

		    'id'       => 'search_sidebar_layout',

		    'type'     => 'image_select',

		    'title'    => esc_html__( 'Layout', 'imigrat' ),

		    'subtitle' => esc_html__( 'Select main content and sidebar alignment.', 'imigrat' ),

		    'options'  => array(

				'left'  => get_template_directory_uri() . '/assets/images/redux/2cl.png',

				'full' => get_template_directory_uri() . '/assets/images/redux/1col.png',

				'right' => get_template_directory_uri() . '/assets/images/redux/2cr.png',

		    ),



		    'default' => 'right',

			'dependency'	=> array( 'search_source_type', '==', 'd' ),

	    ),



	    array(

		    'id'       => 'search_page_sidebar',

		    'type'     => 'select',

		    'title'    => esc_html__( 'Sidebar', 'imigrat' ),

		    'desc'     => esc_html__( 'Select sidebar to show at blog listing page', 'imigrat' ),

		    'dependency' => array(

			    array( 'search_sidebar_layout', '!=', 'full' ),

				array( 'search_source_type', '==', 'd' ),

		    ),

		    'options'  => 'sidebars',

	    ),



    ),

);











