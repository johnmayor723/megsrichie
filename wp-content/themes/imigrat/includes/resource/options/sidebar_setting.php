<?php
return array(
    'title'         => esc_html__( 'Custom Sidebar Settings', 'imigrat' ),
    'id'            => 'sidebar_setting',
    'desc'          => '',
    'icon'          => 'el el-indent-left',
    'fields'        => array(
        array(
            'id' => 'custom_sidebar_name',
            'type' => 'repeater',
            'title' => esc_html__('Dynamic Custom Sidebar', 'imigrat'),
            'desc' => esc_html__('This section is used to create custom sidebar', 'imigrat'),
            'fields'    => [
                array(
                    'id'    => 'sidebar',
                    'type'  => 'text',
                    'title' => esc_html__('Sidebar', 'imigrat'),
                ),
            ]
        ),
    ),
);
