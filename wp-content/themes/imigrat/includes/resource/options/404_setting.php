<?php
return array(
	'title'      => esc_html__( '404 Page Settings', 'imigrat' ),
	'id'         => '404_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => '404_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( '404 Source Type', 'imigrat' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'imigrat' ),
				'e' => esc_html__( 'Elementor', 'imigrat' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => '404_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'imigrat' ),
			'options'     => 'posts',
			'query_args'     => [
				'post_type' => [ 'elementor_library' ],
			],
			'dependency' => array( '404_source_type', '==', 'e' ),
		),
		array(
			'id'       => '404_default_st',
			'type'     => 'heading',
			'content'    => esc_html__( '404 Default', 'imigrat' ),
			'dependency' => [ '404_source_type', '==', 'd' ],
		),
		
		array(
			'id'    => '404_page_banner',
			'type'  => 'switcher',
			'title' => esc_html__( 'Show Banner', 'imigrat' ),
			'desc'  => esc_html__( 'Enable to show Banner on 404 page.', 'imigrat' ),
			'default'  => true,
			'dependency'	=> array( '404_source_type', '==', 'd' ),
		),
		array(
			'id'       => '404_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'imigrat' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'imigrat' ),
			'dependency' => [
				array( '404_page_banner', '==', true ),
				[ '404_source_type', '==', 'd' ],
			],
		),
		array(
			'id'       => '404_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'imigrat' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'imigrat' ),
			'required' => array( '404_page_banner', '=', true ),
			'dependency' => [
				array( '404_page_banner', '==', true ),
				[ '404_source_type', '==', 'd' ],
			],
		),
		
		//404 Page Settings
		array(
			'id'    => '404-page_title',
			'type'  => 'text',
			'title' => esc_html__( '404 Title', 'imigrat' ),
			'desc'  => esc_html__( 'Enter 404 section title that you want to show', 'imigrat' ),
			'dependency'	=> array( '404_source_type', '==', 'd' ),
		),
		array(
			'id'    => '404_page_sub_title',
			'type'  => 'text',
			'title' => esc_html__( '404 Page Tag Line', 'imigrat' ),
			'desc'  => esc_html__( 'Enter 404 section Tag Line that you want to show', 'imigrat' ),
			'dependency'	=> array( '404_source_type', '==', 'd' ),
		),
		array(
			'id'    => '404-page-text',
			'type'  => 'textarea',
			'title' => esc_html__( '404 Page Text', 'imigrat' ),
			'desc'  => esc_html__( 'Enter 404 section Text that you want to show', 'imigrat' ),
			'dependency'	=> array( '404_source_type', '==', 'd' ),
		),
		array(
			'id'    => 'back_home_btn',
			'type'  => 'switcher',
			'title' => esc_html__( 'Show Button', 'imigrat' ),
			'desc'  => esc_html__( 'Enable to show back to home button.', 'imigrat' ),
			'default'  => true,
			'dependency'	=> array( '404_source_type', '==', 'd' ),
		),
		array(
			'id'       => 'back_home_btn_label',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Label', 'imigrat' ),
			'desc'     => esc_html__( 'Enter back to home button label that you want to show.', 'imigrat' ),
			'default'  => esc_html__( 'Go To Home', 'imigrat' ),
			'dependency' => array( 
				array( 'back_home_btn', '==', true ),
				array( '404_source_type', '==', 'd' ),
			),
		),
	),
);