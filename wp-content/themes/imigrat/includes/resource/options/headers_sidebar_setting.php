<?php

return  array(
    'title'      => esc_html__( 'Headers Sidebar Setting', 'imigrat' ),
    'id'         => 'headers_sidebar_setting',
    'desc'       => '',
    'icon'       => 'el el-wrench',
    'fields'     => array(
        array(
            'id' => 'show_sidebar_icon_v2',
            'type' => 'switcher',
            'title' => esc_html__('Enable Sidebar Info', 'imigrat'),
            'default' => false,
        ),
		array(
			'id'       => 'sidebar_title_v2',
			'type'     => 'text',
			'title'    => esc_html__( 'Title', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Title', 'imigrat' ),
			'dependency' => array(
				array( 'show_sidebar_icon_v2', '==', true ),
			),
		),
		array(
			'id'       => 'sidebar_text_v2',
			'type'     => 'textarea',
			'title'    => esc_html__( 'Description', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Description', 'imigrat' ),
			'dependency' => array(
				array( 'show_sidebar_icon_v2', '==', true ),
			),
		),
		//Social Media
		array(
			'id'       => 'show_social_media_v2',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Enable Social Media', 'imigrat' ),
			'desc'     => esc_html__( 'Enable/Disable Social Media.', 'imigrat' ),
			'default'  => '',
			'dependency' => array(
				array( 'show_sidebar_icon_v2', '==', true ),
			),
		),
		array(
			'id'       => 'sidebar_social_title_v2',
			'type'     => 'text',
			'title'    => esc_html__( 'Social Title', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Contact Title', 'imigrat' ),
			'dependency' => array(
				array( 'show_social_media_v2', '==', true ),
			),
		),
		array(
			'id'    => 'social_media_v2',
			'type'  => 'repeater',
			'title' => esc_html__( 'Social Media', 'imigrat' ),
			'fields'	=> array(
				array(
					'id'       => 'url',
					'type'     => 'text',
					'title'    => esc_html__( 'URL', 'imigrat' ),
					'desc'     => esc_html__( 'Enter the URL of social Profile', 'imigrat' ),
				),
				array(
					'id'       => 'icon',
					'type'     => 'icon',
					'title'    => esc_html__( 'Icon', 'imigrat' ),
					'desc'     => esc_html__( 'Choose the icon', 'imigrat' ),
				),
				array(
					'id'       => 'color',
					'type'     => 'color',
					'title'    => esc_html__( 'Color', 'imigrat' ),
					'desc'     => esc_html__( 'Choose the color', 'imigrat' ),
				),
				array(
					'id'       => 'background',
					'type'     => 'color',
					'title'    => esc_html__( 'Background Color', 'imigrat' ),
					'desc'     => esc_html__( 'Choose the background color', 'imigrat' ),
				),
			),
			'dependency' => array(
				array( 'show_social_media_v2', '==', true ),
			),
		),

		array(
            'id' => 'show_gallery_v2',
            'type' => 'switcher',
            'title' => esc_html__('Enable/Disable Gallery', 'imigrat'),
            'default' => false,
        ),
		array(
			'id'       => 'sidebar_gallery_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Gallery Title', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Gallery Title', 'imigrat' ),
			'dependency' => array(
				array( 'show_gallery_v2', '==', true ),
			),
		),
		array(
			'id'       => 'gallery_imgs',
			'type'     => 'gallery',
			'url'      => true,
			'title'    => esc_html__('Gallery Image', 'imigrat'),
			'desc'     => esc_html__('Insert Gallery Image URl', 'imigrat'),
			'dependency' => array(
				array( 'show_gallery_v2', '==', true ),
			),
		),

	),
);
