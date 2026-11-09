<?php

return  array(

    'title'      => esc_html__( 'Social Setting', 'imigrat' ),

    'id'         => 'social_setting',

    'desc'       => '',

    'icon'       => 'el el-share',

    'fields'     => array(

        array(

			'id'    => 'icons_social_share',

			'type'  => 'group',

			'title' => esc_html__( 'Social Profiles', 'imigrat' ),

            'fields'    => array(

                array(

                    'id'    => 'icon',

                    'type'  => 'icon',

                    'title' => esc_html__( 'icon', 'imigrat' ),

                ),

                array(

                    'id'    => 'url',

                    'type'  => 'text',

                    'title' => esc_html__( 'Profile URL', 'imigrat' ),

                ),

                array(

                    'id'    => 'background',

                    'type'  => 'color',

                    'title' => esc_html__( 'Background Color', 'imigrat' ),

                ),

                array(

                    'id'    => 'color',

                    'type'  => 'color',

                    'title' => esc_html__( 'Color', 'imigrat' ),

                ),

            )

		),

    ),

);

