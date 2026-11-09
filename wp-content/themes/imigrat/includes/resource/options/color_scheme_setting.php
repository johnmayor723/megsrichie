<?php
$styles = [];
foreach ( range( 1, 28 ) as $val ) {
    $styles[$val] = sprintf( esc_html__( 'Style %s', 'imigrat' ), $val );
}

return [
    'title'  => esc_html__( 'Color Scheme Setting', 'imigrat' ),
    'id'     => 'color_scheme_setting',
    'desc'   => '',
    'fields' => [
        [
            'id'      => 'color_scheme_loader',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Enable Color Scheme', 'imigrat' ),
            'default' => false,
        ],
        [
            'id'         => 'main_color_scheme',
            'type'       => 'color',
            'title'      => esc_html__( 'Main Custom Color Scheme', 'imigrat' ),
            'subtitle'   => esc_html__( 'Choose the Custom color scheme for the theme', 'imigrat' ),
            'dependency' => [ 'color_scheme_loader', '==', true ],
        ],
        [
            'id'         => 'secondary_color_scheme',
            'type'       => 'color',
            'title'      => esc_html__( 'Secondary Custom Color Scheme', 'imigrat' ),
            'subtitle'   => esc_html__( 'Choose the Custom color scheme for the theme', 'imigrat' ),
            'dependency' => [ 'color_scheme_loader', '==', true ],
        ],
    ],
];
