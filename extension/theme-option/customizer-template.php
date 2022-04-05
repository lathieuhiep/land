<?php
/*
 * Customize
 * */

// Panel Theme Options
use Kirki\Field\Image;
use Kirki\Field\Repeater;
use Kirki\Field\Select;
use Kirki\Field\Text;
use Kirki\Panel;
use Kirki\Section;

new Panel(
	'land_panel_landing_page',
	[
		'priority' => 10,
		'title'    => esc_html__( 'Landing Page', 'land' ),
	]
);

/*
 * Section Slider
 * */
new Section(
	'land_section_landing_page_slider',
	[
		'title'    => esc_html__( 'Section Slider', 'land' ),
		'panel'    => 'land_panel_landing_page',
		'priority' => 10,
	]
);

// Field slider list
new Repeater(
	[
		'settings'  => 'land_opt_landing_page_slider_list',
		'label'     => esc_html__( 'Slider List', 'land' ),
		'section'   => 'land_section_landing_page_slider',
		'priority'  => 10,
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'slider', 'land' ),
			'field' => 'title',
		],
		'default'   => [
			[
				'title'       => esc_html__( 'Title 1', 'land' ),
				'description' => esc_html__( 'Description 1', 'land' ),
				'link_url'    => '#',
			],

			[
				'title'       => esc_html__( 'Title 2', 'land' ),
				'description' => esc_html__( 'Description 2', 'land' ),
				'link_url'    => '#',
			],
		],
		'fields'    => [
			'image'       => [
				'type'    => 'image',
				'label'   => esc_html__( 'Image', 'land' ),
				'default'  => '',
				'choices'  => [
					'save_as' => 'id',
				],
			],
			'title'       => [
				'type'    => 'text',
				'label'   => esc_html__( 'Title', 'land' ),
				'default' => '',
			],
			'description' => [
				'type'    => 'textarea',
				'label'   => esc_html__( 'Description', 'land' ),
				'default' => '',
			],
			'link_url'    => [
				'type'    => 'url',
				'label'   => esc_html__( 'Link URL', 'land' ),
				'default' => '#',
			],
		],
	]
);

new Text(
	[
		'settings' => 'land_opt_landing_page_slider_link_text',
		'label'    => esc_html__( 'Link Text', 'land' ),
		'section'  => 'land_section_landing_page_slider',
		'default'  => esc_html__( 'Detail', 'land' ),
	]
);

new Select(
	[
		'settings' => 'land_opt_landing_page_slider_link_target',
		'label'    => esc_html__( 'Link Target', 'land' ),
		'section'  => 'land_section_landing_page_slider',
		'default'  => '_self',
		'choices'  => [
			'_blank' => esc_html__( 'New Window', 'land' ),
			'_self'  => esc_html__( 'Same Frame', 'land' ),
		],
	]
);