<?php
add_action('cmb2_admin_init', 'land_page_meta_boxes');

function land_page_meta_boxes()
{
    $cmb = new_cmb2_box(array(
        'id' => 'land_cmb_page',
        'title' => esc_html__('Options Page', 'land'),
        'object_types' => array('page'),
        'context' => 'normal',
        'priority' => 'low',
        'show_names' => true,
    ));

    $cmb->add_field( array(
        'name'             => esc_html__('Style Menu', 'land'),
        'id'               => 'land_cmb_page_style_menu',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => '',
        'options'          => array(
            'fixed' => __( 'Fixed', 'land' ),
            'absolute'   => __( 'Absolute', 'land' ),
        ),
    ) );
}