<?php
/*
 * Customize
 * */

// Panel Theme Options
use Kirki\Field\Editor;
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
		'title'    => esc_html__( 'Slider', 'land' ),
		'panel'    => 'land_panel_landing_page',
		'priority' => 10,
	]
);

// Field slider list
new Repeater(
	[
		'settings'  => 'land_opt_landing_page_slider_list',
		'label'     => esc_html__( 'Danh sách slider', 'land' ),
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
				'label'   => esc_html__( 'Ảnh', 'land' ),
				'default' => '',
				'choices' => [
					'save_as' => 'id',
				],
			],
			'title'       => [
				'type'    => 'text',
				'label'   => esc_html__( 'Tiêu đề', 'land' ),
				'default' => '',
			],
			'description' => [
				'type'    => 'textarea',
				'label'   => esc_html__( 'Mô tả', 'land' ),
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

// Field text link
new Text(
	[
		'settings' => 'land_opt_landing_page_slider_link_text',
		'label'    => esc_html__( 'Link Text', 'land' ),
		'section'  => 'land_section_landing_page_slider',
		'default'  => esc_html__( 'Detail', 'land' ),
	]
);

// Field target link
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

/*
 * Section Project Introduction
 * */
new Section(
	'land_section_landing_page_project_introduction',
	[
		'title'    => esc_html__( 'Giới Thiệu Dự Án', 'land' ),
		'panel'    => 'land_panel_landing_page',
		'priority' => 10,
	]
);

// Field text project introduction
new Text(
	[
		'settings' => 'land_opt_landing_page_project_introduction_title',
		'label'    => esc_html__( 'Tiêu dề', 'land' ),
		'section'  => 'land_section_landing_page_project_introduction',
		'default'  => esc_html__( 'TỔNG QUAN DỰ ÁN', 'land' ),
	]
);

// Field Upload image project introduction
new Image(
	[
		'settings' => 'land_opt_landing_page_project_introduction_image',
		'label'    => esc_html__( 'Ảnh', 'land' ),
		'section'  => 'land_section_landing_page_project_introduction',
		'default'  => '',
		'choices'  => [
			'save_as' => 'id',
		],
	]
);

// Field project introduction list
new Repeater(
	[
		'settings'  => 'land_opt_landing_page_project_introduction_list',
		'label'     => esc_html__( 'Thông tin dự án', 'land' ),
		'section'   => 'land_section_landing_page_project_introduction',
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'info', 'land' ),
			'field' => 'title',
		],
		'default'   => [
			[
				'title'       => esc_html__( 'Tên dự án', 'land' ),
				'description' => esc_html__( 'M Landmark Residences', 'land' ),
				'checkbox'    => true,
			],

			[
				'title'       => esc_html__( 'Vị trí', 'land' ),
				'description' => esc_html__( 'Số 58 Đường Bạch Đằng, Quận Hải Châu, TP. Đà Nẵng', 'land' ),
				'checkbox'    => false,
			],
		],
		'fields'    => [
			'title' => [
				'type'    => 'text',
				'label'   => esc_html__( 'Tiêu đề', 'land' ),
				'default' => '',
			],

			'description' => [
				'type'    => 'textarea',
				'label'   => esc_html__( 'Mô tả', 'land' ),
				'default' => '',
			],

			'checkbox' => [
				'type'    => 'checkbox',
				'label'   => esc_html__( 'Mô tả chữ đậm', 'kirki' ),
				'default' => false,
			],
		],
	]
);

/*
 * Section Location
 * */
new Section(
	'land_section_landing_page_location',
	[
		'title'    => esc_html__( 'Vị trí', 'land' ),
		'panel'    => 'land_panel_landing_page',
		'priority' => 10,
	]
);

// Field title location
new Text(
	[
		'settings' => 'land_opt_landing_page_location_title',
		'label'    => esc_html__( 'Tiêu dề', 'land' ),
		'section'  => 'land_section_landing_page_location',
		'default'  => esc_html__( 'VỊ TRÍ <span>“KIM CƯƠNG“</span> TẠI ĐÀ NẴNG', 'land' ),
	]
);

// Field upload image location
new Image(
	[
		'settings' => 'land_opt_landing_page_location_image',
		'label'    => esc_html__( 'Ảnh', 'land' ),
		'section'  => 'land_section_landing_page_location',
		'default'  => '',
		'choices'  => [
			'save_as' => 'id',
		],
	]
);

new Editor(
	[
		'settings' => 'land_opt_landing_page_location_description',
		'label'    => esc_html__( 'Mô Tả', 'land' ),
		'section'  => 'land_section_landing_page_location',
		'default'  => esc_html__( 'Siêu dự án tổ hợp khách sạn', 'land' ),
	]
);