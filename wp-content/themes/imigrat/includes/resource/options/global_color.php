<?php
return [
    'title'      => esc_html__( 'Global Color Settings', 'imigrat' ),
    'id'         => 'global_setting',
    'desc'       => '',
    'subsection' => true,
    'fields'     => [
        // primary color
        [
            'id'      => 'primary_color',
            'type'    => 'color',
            'title'   => esc_html__( 'Primary Color', 'imigrat' ),
            'default' => '#ff0000',
        ],
    ],
];
