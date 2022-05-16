<?php
add_filter( 'rwmb_meta_boxes', 'land_register_meta_boxes_project' );

function land_register_meta_boxes_project( $meta_boxes ) {
	$meta_boxes[] = [
		'title'      => esc_html__( 'Option Project', 'land' ),
		'id'         => 'land_register_meta_boxes_project',
		'post_types' => [ 'land_project' ],
		'context'    => 'normal',
		'priority'   => 'low',
		'fields'     => [
			[
				'type' => 'text',
				'name' => esc_html__( 'Link Website', 'land' ),
				'id'   => 'land_meta_boxes_project_link_web',
			],

			[
				'type'             => 'video',
				'name'             => esc_html__( 'Video', 'land' ),
				'id'               => 'land_meta_boxes_project_video',
				'max_file_uploads' => 1,
			],
		],
	];

	return $meta_boxes;
}