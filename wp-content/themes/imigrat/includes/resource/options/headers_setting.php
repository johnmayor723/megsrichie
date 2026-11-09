<?php
return array(
	'title'      => esc_html__( 'Header Setting', 'imigrat' ),
	'id'         => 'headers_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'header_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Header Source Type', 'imigrat' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'imigrat' ),
				'e' => esc_html__( 'Elementor', 'imigrat' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'header_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'imigrat' ),
			'options'     => 'posts',
			'query_args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'chosen'	=> true,
			'ajax'	=> true,
			'settings'	=> array(
				'min_length'	=> 1,
			),
			'dependency' => [ 'header_source_type', '==', 'e' ],
		),
		array(
		    'id'       => 'header_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Header Styles', 'imigrat' ),
		    'subtitle' => esc_html__( 'Choose Header Styles', 'imigrat' ),
		    'options'  => array(
			    'header_v1'  => get_template_directory_uri() . '/assets/images/redux/header/header1.png',
			    'header_v2'  => get_template_directory_uri() . '/assets/images/redux/header/header2.png',
			    'header_v3'  => get_template_directory_uri() . '/assets/images/redux/header/header3.png',
			    'header_v4'  => get_template_directory_uri() . '/assets/images/redux/header/header4.png',
			    'header_v5'  => get_template_directory_uri() . '/assets/images/redux/header/header5.png',
			    'header_v6'  => get_template_directory_uri() . '/assets/images/redux/header/header6.png',
			),
			'dependency' => array( 'header_source_type', '==', 'd' ),
			'default' => 'header_v1',
	    ),

		/***********************************************************************
								Header Version 1 Start
		************************************************************************/

		array(
			'id'       => 'header_v1_settings_section_start',
			'type'     => 'heading',
			'content'    => esc_html__( 'Header Style One Settings', 'imigrat' ),
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v1' ),
		),

		//Search Icon
		array(
            'id' => 'show_search_icon_v1',
            'type' => 'switcher',
            'title' => esc_html__('Enable Search Icon', 'imigrat'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v1' ),
        ),

		//Phone Number
		array(
            'id' => 'show_phone_no',
            'type' => 'switcher',
            'title' => esc_html__('Enable Phone Number', 'imigrat'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v1' ),
        ),
		array(
			'id'       => 'phone_title_v1',
			'type'     => 'text',
			'title'    => esc_html__( 'Phone Title', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Phone Number', 'imigrat' ),
			'dependency' => array( 'show_phone_no|header_style_settings', '==', 'true' ),
		),
		array(
			'id'       => 'phone_no_v1',
			'type'     => 'text',
			'title'    => esc_html__( 'Phone Number', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Phone Number', 'imigrat' ),
			'dependency' => array( 'show_phone_no|header_style_settings', '==', 'true|header_v1' ),
		),

		//Button Info
		array(
            'id' => 'show_btn_info_v1',
            'type' => 'switcher',
            'title' => esc_html__('Enable Get A Quote Button', 'imigrat'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v1' ),
        ),
		array(
			'id'       => 'btn_title_v1',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Title', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Button Title', 'imigrat' ),
			'dependency' => array( 'show_btn_info_v1|header_style_settings', '==', 'true|header_v1' ),
		),
		array(
			'id'       => 'btn_link_v1',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Link', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Button Link', 'imigrat' ),
			'dependency' => array( 'show_btn_info_v1|header_style_settings', '==', 'true|header_v1' ),
		),



		/***********************************************************************
								Header Version 2 Start
		************************************************************************/
		array(
			'id'       => 'header_v2_settings_section_start',
			'type'     => 'heading',
			'content'    => esc_html__( 'Header Style Two Settings', 'imigrat' ),
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v2' ),
		),

		//Address
		array(
            'id' => 'show_header_address_v2',
            'type' => 'switcher',
            'title' => esc_html__('Enable Address', 'imigrat'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v2' ),
        ),
		array(
			'id'       => 'header_address_v2',
			'type'     => 'text',
			'title'    => esc_html__( 'Address', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Address', 'imigrat' ),
			'dependency' => array( 'show_email_address2|header_style_settings', '==', 'true|header_v2' ),
		),

		//Phone Number
		array(
            'id' => 'show_phone_no2',
            'type' => 'switcher',
            'title' => esc_html__('Enable Phone Number', 'imigrat'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v2' ),
        ),
		array(
			'id'       => 'phone_no_v2',
			'type'     => 'text',
			'title'    => esc_html__( 'Phone Number', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Phone Number', 'imigrat' ),
			'dependency' => array( 'show_phone_no2|header_style_settings', '==', 'true|header_v2' ),
		),

		//Email Address
		array(
            'id' => 'show_email_address2',
            'type' => 'switcher',
            'title' => esc_html__('Enable Email Address', 'imigrat'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v2' ),
        ),
		array(
			'id'       => 'email_address_v2',
			'type'     => 'text',
			'title'    => esc_html__( 'Email Address', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Email Address', 'imigrat' ),
			'dependency' => array( 'show_email_address2|header_style_settings', '==', 'true|header_v2' ),
		),

		//Social Media
		array(
			'id'       => 'header_show_social_media_v2',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Enable Social Media', 'imigrat' ),
			'desc'     => esc_html__( 'Enable/Disable Social Media.', 'imigrat' ),
			'default'  => '',
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v2' ),
		),
		array(
			'id'    => 'header_social_media_v2',
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
			'dependency' => array( 'header_show_social_media_v2|header_style_settings', '==', 'true|header_v2' ),
		),

		//Search Icon
		array(
            'id' => 'show_search_icon_v2',
            'type' => 'switcher',
            'title' => esc_html__('Enable Search Icon', 'imigrat'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v2' ),
        ),

		//Button Info
		array(
            'id' => 'show_btn_info_v2',
            'type' => 'switcher',
            'title' => esc_html__('Enable Get A Quote Button', 'imigrat'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v2' ),
        ),
		array(

			'id'       => 'btn_title_v2',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Title', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Button Title', 'imigrat' ),
			'dependency' => array( 'show_btn_info_v2|header_style_settings', '==', 'true|header_v2' ),
		),
		array(
			'id'       => 'btn_link_v2',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Link', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Button Link', 'imigrat' ),
			'dependency' => array( 'show_btn_info_v2|header_style_settings', '==', 'true|header_v2' ),
		),


		/***********************************************************************
								Header Version 3 Start
		************************************************************************/
		array(
			'id'       => 'header_v3_settings_section_start',
			'type'     => 'heading',
			'content'    => esc_html__( 'Header Style Three Settings', 'imigrat' ),
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v3' ),
		),

		//Address
		array(
            'id' => 'show_header_address_v3',
            'type' => 'switcher',
            'title' => esc_html__('Enable Address', 'imigrat'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v3' ),
        ),
		array(
			'id'       => 'header_address_v3',
			'type'     => 'text',
			'title'    => esc_html__( 'Address', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Address', 'imigrat' ),
			'dependency' => array( 'show_email_address3|header_style_settings', '==', 'true|header_v3' ),
		),

		//Phone Number
		array(
            'id' => 'show_phone_no3',
            'type' => 'switcher',
            'title' => esc_html__('Enable Phone Number', 'imigrat'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v3' ),
        ),
		array(
			'id'       => 'phone_no_v3',
			'type'     => 'text',
			'title'    => esc_html__( 'Phone Number', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Phone Number', 'imigrat' ),
			'dependency' => array( 'show_phone_no3|header_style_settings', '==', 'true|header_v3' ),
		),

		//Email Address
		array(
            'id' => 'show_email_address3',
            'type' => 'switcher',
            'title' => esc_html__('Enable Email Address', 'imigrat'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v3' ),
        ),
		array(
			'id'       => 'email_address_v3',
			'type'     => 'text',
			'title'    => esc_html__( 'Email Address', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Email Address', 'imigrat' ),
			'dependency' => array( 'show_email_address3|header_style_settings', '==', 'true|header_v3' ),
		),

		//Social Media
		array(
			'id'       => 'show_social_media_v3',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Enable Social Media', 'imigrat' ),
			'desc'     => esc_html__( 'Enable/Disable Social Media.', 'imigrat' ),
			'default'  => '',
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v3' ),
		),
		array(
			'id'    => 'social_media_v3',
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
			'dependency' => array( 'show_social_media_v3|header_style_settings', '==', 'true|header_v3' ),
		),

		//Search Icon
		array(
            'id' => 'show_search_icon_v3',
            'type' => 'switcher',
            'title' => esc_html__('Enable Search Icon', 'imigrat'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v3' ),
        ),

		//Button Info
		array(
            'id' => 'show_btn_info_v3',
            'type' => 'switcher',
            'title' => esc_html__('Enable Get A Quote Button', 'imigrat'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v3' ),
        ),
		array(

			'id'       => 'btn_title_v3',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Title', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Button Title', 'imigrat' ),
			'dependency' => array( 'show_btn_info_v3|header_style_settings', '==', 'true|header_v3' ),
		),
		array(
			'id'       => 'btn_link_v3',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Link', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Button Link', 'imigrat' ),
			'dependency' => array( 'show_btn_info_v3|header_style_settings', '==', 'true|header_v3' ),
		),

		/***********************************************************************
								Header Version 4 Start
		************************************************************************/
		array(
			'id'       => 'header_v4_settings_section_start',
			'type'     => 'heading',
			'content'    => esc_html__( 'Header Style Four Settings', 'imigrat' ),
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v4' ),
		),

		//Address
		array(
            'id' => 'show_header_address4',
            'type' => 'switcher',
            'title' => esc_html__('Office Address', 'imigrat'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v4' ),
        ),
		array(
			'id'       => 'header_address_v4',
			'type'     => 'text',
			'title'    => esc_html__( 'Address', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Address', 'imigrat' ),
			'dependency' => array( 'show_header_address4|header_style_settings', '==', 'true|header_v4' ),
		),

		//Phone Number
		array(
            'id' => 'show_phone_no4',
            'type' => 'switcher',
            'title' => esc_html__('Enable Phone Number', 'imigrat'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v4' ),
        ),
		array(
			'id'       => 'phone_no_v4',
			'type'     => 'text',
			'title'    => esc_html__( 'Phone Number', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Phone Number', 'imigrat' ),
			'dependency' => array( 'show_phone_no4|header_style_settings', '==', 'true|header_v4' ),
		),

		//Email Address
		array(
            'id' => 'show_email_address4',
            'type' => 'switcher',
            'title' => esc_html__('Enable Email Address', 'imigrat'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v4' ),
        ),
		array(
			'id'       => 'email_address_v4',
			'type'     => 'text',
			'title'    => esc_html__( 'Email Address', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Email Address', 'imigrat' ),
			'dependency' => array( 'show_email_address4|header_style_settings', '==', 'true|header_v4' ),
		),

		//Button Info
		array(
            'id' => 'show_btn_info_v4',
            'type' => 'switcher',
            'title' => esc_html__('Enable Get A Quote Button', 'imigrat'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v4' ),
        ),
		array(

			'id'       => 'btn_title_v4',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Title', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Button Title', 'imigrat' ),
			'dependency' => array( 'show_btn_info_v4|header_style_settings', '==', 'true|header_v4' ),
		),
		array(
			'id'       => 'btn_link_v4',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Link', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Button Link', 'imigrat' ),
			'dependency' => array( 'show_btn_info_v4|header_style_settings', '==', 'true|header_v4' ),
		),

		/***********************************************************************
								Header Version 5 Start
		************************************************************************/
		array(
			'id'       => 'header_v5_settings_section_start',
			'type'     => 'heading',
			'content'    => esc_html__( 'Header Style Five Settings', 'imigrat' ),
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v5' ),
		),

		//Email Address
		array(
            'id' => 'show_email_address5',
            'type' => 'switcher',
            'title' => esc_html__('Enable Email Address', 'imigrat'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v5' ),
        ),
		array(
			'id'       => 'email_address_v5',
			'type'     => 'text',
			'title'    => esc_html__( 'Email Address', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Email Address', 'imigrat' ),
			'dependency' => array( 'show_email_address5|header_style_settings', '==', 'true|header_v5' ),
		),

		//Address
		array(
			'id' => 'show_header_address_v5',
			'type' => 'switcher',
			'title' => esc_html__('Enable Address', 'imigrat'),
			'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v5' ),
		),
		array(
			'id'       => 'header_address_v5',
			'type'     => 'text',
			'title'    => esc_html__( 'Address', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Address', 'imigrat' ),
			'dependency' => array( 'show_header_address_v5|header_style_settings', '==', 'true|header_v5' ),
		),

		//Social Media
		array(
			'id'       => 'show_social_media_v5',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Enable Social Media', 'imigrat' ),
			'desc'     => esc_html__( 'Enable/Disable Social Media.', 'imigrat' ),
			'default'  => '',
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v5' ),
		),
		array(
			'id'    => 'social_media_v5',
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
			'dependency' => array( 'show_social_media_v5|header_style_settings', '==', 'true|header_v5' ),
		),

		//Button Info
		array(
            'id' => 'show_btn_info_v5',
            'type' => 'switcher',
            'title' => esc_html__('Enable Get A Quote Button', 'imigrat'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v5' ),
        ),
		array(

			'id'       => 'btn_title_v5',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Title', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Button Title', 'imigrat' ),
			'dependency' => array( 'show_btn_info_v5|header_style_settings', '==', 'true|header_v5' ),
		),
		array(
			'id'       => 'btn_link_v5',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Link', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Button Link', 'imigrat' ),
			'dependency' => array( 'show_btn_info_v5|header_style_settings', '==', 'true|header_v5' ),
		),

		/***********************************************************************
								Header Version 6 Start
		************************************************************************/
		array(
			'id'       => 'header_v6_settings_section_start',
			'type'     => 'heading',
			'content'    => esc_html__( 'Header Style Six Settings', 'imigrat' ),
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v6' ),
		),

		//Email Address
		array(
            'id' => 'show_email_address6',
            'type' => 'switcher',
            'title' => esc_html__('Enable Email Address', 'imigrat'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v6' ),
        ),
		array(
			'id'       => 'email_address_v6',
			'type'     => 'text',
			'title'    => esc_html__( 'Email Address', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Email Address', 'imigrat' ),
			'dependency' => array( 'show_email_address6|header_style_settings', '==', 'true|header_v6' ),
		),

		//Address
		array(
			'id' => 'show_header_address_v6',
			'type' => 'switcher',
			'title' => esc_html__('Enable Address', 'imigrat'),
			'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v6' ),
		),
		array(
			'id'       => 'header_address_v6',
			'type'     => 'text',
			'title'    => esc_html__( 'Address', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Address', 'imigrat' ),
			'dependency' => array( 'show_header_address_v6|header_style_settings', '==', 'true|header_v6' ),
		),

		//Social Media
		array(
			'id'       => 'show_social_media_v6',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Enable Social Media', 'imigrat' ),
			'desc'     => esc_html__( 'Enable/Disable Social Media.', 'imigrat' ),
			'default'  => '',
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v6' ),
		),
		array(
			'id'    => 'social_media_v6',
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
			'dependency' => array( 'show_social_media_v6|header_style_settings', '==', 'true|header_v6' ),
		),

		//Button Info
		array(
            'id' => 'show_btn_info_v6',
            'type' => 'switcher',
            'title' => esc_html__('Enable Get A Quote Button', 'imigrat'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v6' ),
        ),
		array(

			'id'       => 'btn_title_v6',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Title', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Button Title', 'imigrat' ),
			'dependency' => array( 'show_btn_info_v6|header_style_settings', '==', 'true|header_v6' ),
		),
		array(
			'id'       => 'btn_link_v6',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Link', 'imigrat' ),
			'desc'     => esc_html__( 'Enter The Button Link', 'imigrat' ),
			'dependency' => array( 'show_btn_info_v6|header_style_settings', '==', 'true|header_v6' ),
		),


	),

);
