<?php
add_action('cmb2_admin_init', 'land_cmb_project');

function land_cmb_project()
{
    $cmb = new_cmb2_box(array(
        'id' => 'land_cmb_project',
        'title' => esc_html__('Option Project', 'land'),
        'object_types' => array('land_project'),
        'context' => 'normal',
        'priority' => 'low',
        'show_names' => true,
    ));

	$cmb->add_field( array(
		'name' => esc_html__( 'Website URL', 'land' ),
		'id'   => 'land_cmb_project_web_url',
		'type' => 'text_url',
	) );

	$cmb->add_field( array(
		'name' => esc_html__('Link Video', 'land'),
		'id'   => 'land_cmb_project_link_video',
		'type' => 'text_url',
	) );

}