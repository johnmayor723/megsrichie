<?php
$styles = [];
foreach ( range( 1, 28 ) as $val ) {
    $styles[$val] = sprintf( esc_html__( 'Style %s', 'imigrat' ), $val );
}
return [
    'title'  => esc_html__( 'General Setting', 'imigrat' ),
    'id'     => 'general_setting',
    'desc'   => '',
    'icon'   => 'el el-wrench',
    'fields' => [
        [

            'id'      => 'theme_preloader',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Enable Preloader', 'imigrat' ),
            'default' => false,
        ],

        // preloader bg color
        [
            'id'         => 'preloader_bg_color',
            'type'       => 'color',
            'title'      => esc_html__( 'Preloader Background Color', 'imigrat' ),
            'default'    => '#3c67ff',
            'dependency' => [ 'theme_preloader', '==', true ],
            'output'     => [
                'background-color' => '#preloader',
            ],
        ],

        // preloader dot color
        [
            'id'      => 'preloader_dot_color',
            'type'    => 'color',
            'title'   => esc_html__( 'Preloader Dot Color', 'imigrat' ),
            'default' => '#fff',
        ],

        [
            'id'      => 'rtl_enable',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Enable RTL', 'imigrat' ),
            'default' => false,
        ],

    ],

];
