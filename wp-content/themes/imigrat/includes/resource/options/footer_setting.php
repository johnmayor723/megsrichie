<?php
return array(
	'title'      => esc_html__( 'Footer Setting', 'imigrat' ),
	'id'         => 'footer_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'footer_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Footer Source Type', 'imigrat' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'imigrat' ),
				'e' => esc_html__( 'Elementor', 'imigrat' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'footer_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'imigrat' ),
			'options'     => 'posts',
			'query_args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'dependency' => [ 'footer_source_type', '==', 'e' ],
		),
		array(
		    'id'       => 'footer_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Footer Styles', 'imigrat' ),
		    'subtitle' => esc_html__( 'Choose Footer Styles', 'imigrat' ),
		    'options'  => array(
			    'footer_v1'  => get_template_directory_uri() . '/assets/images/redux/footer/footer1.png',
				'footer_v2'  => get_template_directory_uri() . '/assets/images/redux/footer/footer2.png',
				'footer_v3'  => get_template_directory_uri() . '/assets/images/redux/footer/footer3.png',
				'footer_v4'  => get_template_directory_uri() . '/assets/images/redux/footer/footer4.png',
				'footer_v5'  => get_template_directory_uri() . '/assets/images/redux/footer/footer5.png',
				'footer_v6'  => get_template_directory_uri() . '/assets/images/redux/footer/footer6.png',
			),
			'dependency' => array( 'footer_source_type', '==', 'd' ),
			'default' => 'footer_v3',
	    ),

		/***********************************************************************
								Footer Version 1 Start
		************************************************************************/
		array(
			'id'       => 'footer_v1_settings_section_start',
			'type'     => 'heading',
			'indent'      => true,
			'content'    => esc_html__( 'Footer Style One Settings', 'imigrat' ),
			'dependency' => array(
				array( 'footer_style_settings', '==', 'footer_v1' ),
				array( 'footer_source_type', '==', 'd' )
			),
		),
		//Social Media
		array(
			'id'    => 'footer_cta',
			'type'  => 'repeater',
			'title' => esc_html__( 'Footer CTA', 'imigrat' ),
			'dependency' => array(
				array( 'footer_style_settings', '==', 'footer_v1' ),
				array( 'footer_style_settings', '==', 'footer_v3' ),
			),
			'fields'	=> array(
				array(
					'id'       => 'footer_cta_img_v1',
					'type'     => 'media',
					'url'      => true,
					'title'    => esc_html__( 'Footer CTA Image', 'imigrat' ),
					'subtitle' => esc_html__( 'Insert Footer CTA Image', 'imigrat' ),
				),
				array(
					'id'       => 'footer_cta_icon',
					'type'     => 'select',
					'title'    => esc_html__( 'Footer cta Icons', 'imigrat' ),
					'options'  => get_fontawesome_icons(),
				),
				array(
					'id'    => 'footer_cta_title',
					'type'  => 'text',
					'title' => esc_html__( 'Footer cta Title', 'imigrat' ),
					'default' => esc_html__( 'Proin Tempus', 'imigrat' ),
					'desc'  => esc_html__( 'Enter the Footer cta Titlee', 'imigrat' ),
				),
				array(
					'id'    => 'footer_cta_btn_title',
					'type'  => 'text',
					'title' => esc_html__( 'Cta Button Title', 'imigrat' ),
					'desc'  => esc_html__( 'Enter the Cta Button Title', 'imigrat' ),
				),
				array(
					'id'    => 'footer_cta_btn_url',
					'type'  => 'text',
					'title' => esc_html__( 'External Url', 'imigrat' ),
					'desc'  => esc_html__( 'Enter the External Url', 'imigrat' ),
				),
			),
		),
		//Copy Rights Text
		array(
			'id'      => 'copyright_text1',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'imigrat' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'imigrat' ),
			'dependency' => array(
				array( 'footer_style_settings', '==', 'footer_v1' ),
				array( 'footer_source_type', '==', 'd' )
			),
		),
		/***********************************************************************
								Footer Version 2 Start
		************************************************************************/
		array(
			'id'       => 'footer_v2_settings_section_start',
			'type'     => 'heading',
			'indent'      => true,
			'content'    => esc_html__( 'Footer Style Two Settings', 'imigrat' ),
			'dependency' => array(
				array( 'footer_style_settings', '==', 'footer_v2' ),
				array( 'footer_source_type', '==', 'd' )
			),
		),
		array(
			'id'       => 'footer_logo_img_v2',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Logo Image', 'imigrat' ),
			'subtitle' => esc_html__( 'Insert Footer Logo Image', 'imigrat' ),
			'dependency' => array(
				array( 'footer_style_settings', '==', 'footer_v2' ),
				array( 'footer_source_type', '==', 'd' )
			),
		),
		//Top Footer
		array(
            'id' => 'show_footer_top_v2',
            'type' => 'switcher',
            'title' => esc_html__('Enable Footer Top', 'imigrat'),
            'default' => false,
			'dependency' => array(
				array( 'footer_style_settings', '==', 'footer_v2' ),
				array( 'footer_source_type', '==', 'd' )
			),
        ),
		array(
			'id'       => 'footer_img1_v2',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Client Image One', 'imigrat' ),
			'subtitle' => esc_html__( 'Insert Client Image One', 'imigrat' ),
			'dependency' => array(
				array( 'show_footer_top_v2', '==', true ),
				array( 'footer_source_type', '==', 'd' )
			),
		),
		array(
			'id'       => 'footer_img2_v2',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Client Image Two', 'imigrat' ),
			'subtitle' => esc_html__( 'Insert Client Image Two', 'imigrat' ),
			'dependency' => array(
				array( 'show_footer_top_v2', '==', true ),
				array( 'footer_source_type', '==', 'd' )
			),
		),
		array(
			'id'       => 'footer_img3_v2',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Client Image Three', 'imigrat' ),
			'subtitle' => esc_html__( 'Insert Client Image Three', 'imigrat' ),
			'dependency' => array(
				array( 'show_footer_top_v2', '==', true ),
				array( 'footer_source_type', '==', 'd' )
			),
		),
		array(
			'id'       => 'footer_description_v2',
			'type'     => 'textarea',
			'title'    => esc_html__( 'Description', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Description', 'imigrat' ),
			'dependency' => array(
				array( 'show_footer_top_v2', '==', true ),
				array( 'footer_source_type', '==', 'd' )
			),
		),
		array(
			'id'       => 'footer_btn_title_v2',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Title', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Button Title', 'imigrat' ),
			'dependency' => array(
				array( 'show_footer_top_v2', '==', true ),
				array( 'footer_source_type', '==', 'd' )
			),
		),
		array(
			'id'       => 'footer_btn_link_v2',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Link', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Button Link', 'imigrat' ),
			'dependency' => array(
				array( 'show_footer_top_v2', '==', true ),
				array( 'footer_source_type', '==', 'd' )
			),
		),
		array(
			'id'       => 'footer_phone_title_v2',
			'type'     => 'text',
			'title'    => esc_html__( 'Phone Title', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Phone Title', 'imigrat' ),
			'dependency' => array(
				array( 'show_footer_top_v2', '==', true ),
				array( 'footer_source_type', '==', 'd' )
			),
		),
		array(
			'id'       => 'footer_phone_no_v2',
			'type'     => 'text',
			'title'    => esc_html__( 'Phone Number', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Phone Number', 'imigrat' ),
			'dependency' => array(
				array( 'show_footer_top_v2', '==', true ),
				array( 'footer_source_type', '==', 'd' )
			),
		),
		//Copy Rights Text
		array(
			'id'      => 'copyright_text2',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'imigrat' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'imigrat' ),
			'dependency' => array(
				array( 'footer_style_settings', '==', 'footer_v2' ),
				array( 'footer_source_type', '==', 'd' )
			),
		),

		/***********************************************************************
								Footer Version 3 Start
		************************************************************************/
		array(
			'id'       => 'footer_v3_settings_section_start',
			'type'     => 'heading',
			'indent'      => true,
			'content'    => esc_html__( 'Footer Style Three Settings', 'imigrat' ),
			'dependency' => array(
				array( 'footer_style_settings', '==', 'footer_v3' ),
				array( 'footer_source_type', '==', 'd' )
			),
		),
		array(
			'id'       => 'footer_logo_img_v3',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Logo Image', 'imigrat' ),
			'subtitle' => esc_html__( 'Insert Footer Logo Image', 'imigrat' ),
			'dependency' => array(
				array( 'footer_style_settings', '==', 'footer_v3' ),
				array( 'footer_source_type', '==', 'd' )
			),
		),
		//Copy Rights Text
		array(
			'id'      => 'copyright_text1',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'imigrat' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'imigrat' ),
			'dependency' => array(
				array( 'footer_style_settings', '==', 'footer_v3' ),
				array( 'footer_source_type', '==', 'd' )
			),
		),

		/***********************************************************************
								Footer Version 4 Start
		************************************************************************/
		array(
			'id'       => 'footer_v4_settings_section_start',
			'type'     => 'heading',
			'indent'      => true,
			'content'    => esc_html__( 'Footer Style Four Settings', 'imigrat' ),
			'dependency' => array(
				array( 'footer_style_settings', '==', 'footer_v4' ),
				array( 'footer_source_type', '==', 'd' )
			),
		),
		//Copy Rights Text
		array(
			'id'      => 'copyright_text4',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'imigrat' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'imigrat' ),
			'dependency' => array(
				array( 'footer_style_settings', '==', 'footer_v4' ),
				array( 'footer_source_type', '==', 'd' )
			),
		),

		/***********************************************************************
								Footer Version 5 Start
		************************************************************************/
		array(
			'id'       => 'footer_v5_settings_section_start',
			'type'     => 'heading',
			'indent'      => true,
			'content'    => esc_html__( 'Footer Style Fiver Settings', 'imigrat' ),
			'dependency' => array(
				array( 'footer_style_settings', '==', 'footer_v5' ),
				array( 'footer_source_type', '==', 'd' )
			),
		),
		//Copy Rights Text
		array(
			'id'      => 'copyright_text5',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'imigrat' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'imigrat' ),
			'dependency' => array(
				array( 'footer_style_settings', '==', 'footer_v5' ),
				array( 'footer_source_type', '==', 'd' )
			),
		),

		/***********************************************************************
								Footer Version 6 Start
		************************************************************************/
		array(
			'id'       => 'footer_v6_settings_section_start',
			'type'     => 'heading',
			'indent'      => true,
			'content'    => esc_html__( 'Footer Style Six Settings', 'imigrat' ),
			'dependency' => array(
				array( 'footer_style_settings', '==', 'footer_v6' ),
				array( 'footer_source_type', '==', 'd' )
			),
		),
		//Copy Rights Text
		array(
			'id'      => 'copyright_text6',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'imigrat' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'imigrat' ),
			'dependency' => array(
				array( 'footer_style_settings', '==', 'footer_v6' ),
				array( 'footer_source_type', '==', 'd' )
			),
		),

	),
);
