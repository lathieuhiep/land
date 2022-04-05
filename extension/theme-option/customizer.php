<?php
/*
 * Customize
 * */

use Kirki\Field\Dimensions;
use Kirki\Field\Editor;
use Kirki\Field\Image;
use Kirki\Field\Radio_Buttonset;
use Kirki\Field\Repeater;
use Kirki\Field\Select;
use Kirki\Field\Slider;
use Kirki\Field\Text;
use Kirki\Field\Typography;
use Kirki\Panel;
use Kirki\Section;

// Panel Theme Options
new Panel(
	'land_opt_panel',
	[
		'priority' => 10,
		'title'    => esc_html__( 'Theme Options', 'land' ),
	]
);

/*
 * Section General
 * */
new Section(
	'land_opt_section_general',
	[
		'title'    => esc_html__( 'General', 'land' ),
		'panel'    => 'land_opt_panel',
		'priority' => 10,
	]
);

// Field Upload Favicon
new Image(
	[
		'settings' => 'land_opt_favicon',
		'label'    => esc_html__( 'Upload Image Favicon', 'land' ),
		'section'  => 'land_opt_section_general',
		'default'  => '',
	]
);

// Field Upload Logo
new Image(
	[
		'settings' => 'land_opt_image_logo',
		'label'    => esc_html__( 'Upload Image Logo', 'land' ),
		'section'  => 'land_opt_section_general',
		'default'  => '',
		'choices'  => [
			'save_as' => 'id',
		],
	]
);

// Field Set Width Height Logo
new Dimensions(
	[
		'settings'        => 'land_opt_size_logo',
		'label'           => esc_html__( 'Set width / height Logo', 'land' ),
		'description'     => esc_html__( 'width: 100px, height: 100px', 'land' ),
		'section'         => 'land_opt_section_general',
		'default'         => [
			'width'  => '',
			'height' => '',
		],
		'output'          => array(
			array(
				'element' => '.site-logo img'
			),
		),
		'active_callback' => [
			[
				'setting'  => 'land_opt_image_logo',
				'operator' => '!=',
				'value'    => '',
			]
		],
	]
);

// Field show loading
new Radio_Buttonset(
	[
		'settings' => 'land_opt_show_loading',
		'label'    => esc_html__( 'Show Loading', 'land' ),
		'section'  => 'land_opt_section_general',
		'default'  => 'off',
		'choices'  => [
			'on'  => esc_html__( 'Show', 'land' ),
			'off' => esc_html__( 'Hide', 'land' ),
		],
	]
);

// Field upload image loading
new Image(
	[
		'settings'        => 'land_opt_image_loading',
		'label'           => esc_html__( 'Upload Image Loading', 'land' ),
		'section'         => 'land_opt_section_general',
		'description'     => esc_html__( 'Upload image .gif', 'land' ),
		'default'         => '',
		'active_callback' => [
			[
				'setting'  => 'land_opt_show_loading',
				'operator' => '===',
				'value'    => 'on',
			]
		]
	]
);

// Field show back to top
new Radio_Buttonset(
	[
		'settings' => 'land_opt_back_to_top',
		'label'    => esc_html__( 'Show Back To Top', 'land' ),
		'section'  => 'land_opt_section_general',
		'default'  => 'on',
		'choices'  => [
			'on'  => esc_html__( 'Show', 'land' ),
			'off' => esc_html__( 'Hide', 'land' ),
		],
	]
);

/*
 * Section Menu
 * */
new Section(
	'land_opt_section_menu',
	[
		'title'    => esc_html__( 'Menu', 'land' ),
		'panel'    => 'land_opt_panel',
		'priority' => 10,
	]
);

// Field Show Sticky Menu
new Radio_Buttonset(
	[
		'settings' => 'land_opt_sticky_menu',
		'label'    => esc_html__( 'Sticky menu', 'land' ),
		'section'  => 'land_opt_section_menu',
		'default'  => 'on',
		'choices'  => [
			'on'  => esc_html__( 'Yes', 'land' ),
			'off' => esc_html__( 'No', 'land' ),
		],
	]
);

// Field Show Cart
new Radio_Buttonset(
	[
		'settings' => 'land_opt_cart_menu',
		'label'    => esc_html__( 'Cart', 'land' ),
		'section'  => 'land_opt_section_menu',
		'default'  => 'show',
		'choices'  => [
			'show' => esc_html__( 'Show', 'land' ),
			'hide' => esc_html__( 'Hide', 'land' ),
		],
	]
);

/*
 * Section Contact Us
 * */
new Section(
	'land_opt_section_contact_us',
	[
		'title'    => esc_html__( 'Contact us', 'land' ),
		'panel'    => 'land_opt_panel',
		'priority' => 10,
	]
);

// Field Show Contact Us
new Radio_Buttonset(
	[
		'settings' => 'land_opt_show_contact_us',
		'label'    => esc_html__( 'Show Contact Us', 'land' ),
		'section'  => 'land_opt_section_contact_us',
		'default'  => 'show',
		'choices'  => [
			'show' => esc_html__( 'Show', 'land' ),
			'hide' => esc_html__( 'Hide', 'land' ),
		],
	]
);

// Field Address Contact
new Text(
	[
		'settings' => 'land_opt_address_contact_us',
		'label'    => esc_html__( 'Address', 'land' ),
		'section'  => 'land_opt_section_contact_us',
		'default'  => esc_html__( '988782, Our Street, S State', 'land' ),
		'priority' => 10,
	]
);

// Field Mail Contact
new Text(
	[
		'settings' => 'land_opt_mail_contact_us',
		'label'    => esc_html__( 'Mail', 'land' ),
		'section'  => 'land_opt_section_contact_us',
		'default'  => 'info@domain.com',
	]
);

// Field Phone Contact
new Text(
	[
		'settings' => 'land_opt_phone_contact_us',
		'label'    => esc_html__( 'Phone', 'land' ),
		'section'  => 'land_opt_section_contact_us',
		'default'  => '+1 234 567 186',
	]
);

/*
 * Section Blog Post
 * */
new Section(
	'land_opt_section_blog_post',
	[
		'title'       => esc_html__( 'Blog Post', 'land' ),
		'panel'       => 'land_opt_panel',
		'description' => esc_html__( 'Use for archive, index, page search', 'land' ),
		'priority'    => 10,
	]
);

// Field Sidebar Blog Post
new Radio_Buttonset(
	[
		'settings' => 'land_opt_sidebar_blog_post',
		'label'    => esc_html__( 'Blog Sidebar', 'land' ),
		'section'  => 'land_opt_section_blog_post',
		'default'  => 'right',
		'choices'  => [
			'hide'  => esc_html__( 'Hide', 'land' ),
			'left'  => esc_html__( 'Left', 'land' ),
			'right' => esc_html__( 'Right', 'land' ),
		],
	]
);

// Field Blog Per Row
new Radio_Buttonset(
	[
		'settings' => 'land_opt_per_row_blog_post',
		'label'    => esc_html__( 'Blog Per Row', 'land' ),
		'section'  => 'land_opt_section_blog_post',
		'default'  => '2',
		'choices'  => [
			'2' => esc_html__( '2 Column', 'land' ),
			'3' => esc_html__( '3 Column', 'land' ),
			'4' => esc_html__( '4 Column', 'land' ),
		],
	]
);

/*
 * Section Single Post
 * */
new Section(
	'land_opt_section_single_post',
	[
		'title'    => esc_html__( 'Single Post', 'land' ),
		'panel'    => 'land_opt_panel',
		'priority' => 10,
	]
);

// Field Sidebar Single Post
new Radio_Buttonset(
	[
		'settings' => 'land_opt_sidebar_single_post',
		'label'    => esc_html__( 'Single Sidebar', 'land' ),
		'section'  => 'land_opt_section_single_post',
		'default'  => 'right',
		'choices'  => [
			'hide'  => esc_html__( 'Hide', 'land' ),
			'left'  => esc_html__( 'Left', 'land' ),
			'right' => esc_html__( 'Right', 'land' ),
		],
	]
);

// Field Show Share Post
new Radio_Buttonset(
	[
		'settings' => 'land_opt_share_single_post',
		'label'    => esc_html__( 'Show Share Post', 'land' ),
		'section'  => 'land_opt_section_single_post',
		'default'  => 'show',
		'choices'  => [
			'show' => esc_html__( 'Show', 'land' ),
			'hide' => esc_html__( 'Hide', 'land' ),
		],
	]
);

// Field Show Related Post
new Radio_Buttonset(
	[
		'settings' => 'land_opt_related_single_post',
		'label'    => esc_html__( 'Show Related Post', 'land' ),
		'section'  => 'land_opt_section_single_post',
		'default'  => 'show',
		'choices'  => [
			'show' => esc_html__( 'Show', 'land' ),
			'hide' => esc_html__( 'Hide', 'land' ),
		],
	]
);

// Field Show Related Post Limit
new Slider(
	[
		'settings' => 'land_opt_related_limit_single_post',
		'label'    => esc_html__( 'Related Post Limit', 'land' ),
		'section'  => 'land_opt_section_single_post',
		'default'  => 3,
		'choices'  => [
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
		],
	]
);

/*
 * Section Social Network
 * */
new Section(
	'land_opt_section_social_network',
	[
		'title'    => esc_html__( 'Social Network', 'land' ),
		'panel'    => 'land_opt_panel',
		'priority' => 10,
	]
);

// Field Social List
new Repeater(
	[
		'settings'  => 'land_opt_social_list',
		'label'     => esc_html__( 'Create Social Links', 'land' ),
		'section'   => 'land_opt_section_social_network',
		'tooltip'   => esc_html__( 'Use Font Awesome Free 6', 'land' ),
		'row_label' => array(
			'type'  => 'field',
			'value' => esc_html__( 'Social link', 'land' ),
			'field' => 'title',
		),
		'default'   => [
			[
				'title'  => esc_html__( 'Facebook', 'land' ),
				'icon'   => 'fab fa-facebook-f',
				'url'    => '#',
				'target' => '_blank',
			],
			[
				'title'  => esc_html__( 'Youtube', 'land' ),
				'icon'   => 'fab fa-youtube',
				'url'    => '#',
				'target' => '_blank',
			],
			[
				'title'  => esc_html__( 'Twitter', 'land' ),
				'icon'   => 'fab fa-twitter',
				'url'    => '#',
				'target' => '_blank',
			],
			[
				'title'  => esc_html__( 'Instagram', 'land' ),
				'icon'   => 'fab fa-instagram',
				'url'    => '#',
				'target' => '_blank',
			],
		],
		'fields'    => [
			'title'  => [
				'type'        => 'text',
				'label'       => esc_html__( 'Title', 'land' ),
				'description' => esc_html__( 'Ex: Facebook', 'land' ),
				'default'     => '',
			],
			'icon'   => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Icon Name', 'land' ),
				'description' => esc_html__( 'Font Awesome icons. Ex: fab fa-facebook-f', 'land' ) . ' <a href="https://fontawesome.com/search" target="_blank"><strong>' . esc_html__( 'View All', 'land' ) . ' </strong></a>',
				'default'     => '',
			),
			'url'    => [
				'type'    => 'url',
				'label'   => esc_html__( 'Link URL', 'land' ),
				'default' => '#',
			],
			'target' => [
				'type'    => 'select',
				'label'   => esc_html__( 'Link Target', 'land' ),
				'default' => '_blank',
				'choices' => [
					'_blank' => esc_html__( 'New Window', 'land' ),
					'_self'  => esc_html__( 'Same Frame', 'land' ),
				],
			],
		],
	]
);

/*
 * Section Shop
 * */
new Section(
	'land_opt_section_shop',
	[
		'title'       => esc_html__( 'Shop', 'land' ),
		'description' => esc_html__( 'Settings WooCommerce', 'land' ),
		'panel'       => 'land_opt_panel',
		'priority'    => 10,
	]
);

// Field Limit Product
new Slider(
	[
		'settings' => 'land_opt_limit_product',
		'label'    => esc_html__( 'Limit Product', 'land' ),
		'section'  => 'land_opt_section_shop',
		'default'  => 12,
		'choices'  => [
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
		],
	]
);

// Field Products Per Row
new Radio_Buttonset(
	[
		'settings' => 'land_opt_per_row_product',
		'label'    => esc_html__( 'Products Per Row', 'land' ),
		'section'  => 'land_opt_section_shop',
		'default'  => '4',
		'choices'  => [
			'3' => esc_html__( '3 Column', 'land' ),
			'4' => esc_html__( '4 Column', 'land' ),
			'5' => esc_html__( '5 Column', 'land' ),
		],
	]
);

// Field Sidebar Shop
new Radio_Buttonset(
	[
		'settings' => 'land_opt_sidebar_shop',
		'label'    => esc_html__( 'Shop Sidebar', 'land' ),
		'section'  => 'land_opt_section_shop',
		'default'  => 'left',
		'choices'  => [
			'hide'  => esc_html__( 'Hide', 'land' ),
			'left'  => esc_html__( 'Left', 'land' ),
			'right' => esc_html__( 'Right', 'land' ),
		],
	]
);

/*
 * Section Footer
 * */
new Section(
	'land_opt_section_footer',
	[
		'title'    => esc_html__( 'Footer', 'land' ),
		'panel'    => 'land_opt_panel',
		'priority' => 10,
	]
);

// Field Sidebar Footer
new Select(
	[
		'settings'    => 'land_opt_column_footer',
		'label'       => esc_html__( 'Number of Footer Columns', 'land' ),
		'section'     => 'land_opt_section_footer',
		'default'     => 'column-4',
		'placeholder' => esc_html__( 'Choose an option', 'land' ),
		'choices'     => [
			'column-0' => esc_html__( 'Hide Column', 'land' ),
			'column-1' => esc_html__( '1', 'land' ),
			'column-2' => esc_html__( '2', 'land' ),
			'column-3' => esc_html__( '3', 'land' ),
			'column-4' => esc_html__( '4', 'land' ),
		],
	]
);

// Field Footer Width Column 1
new Slider(
	[
		'settings'        => 'land_opt_column_width_footer_1',
		'label'           => esc_html__( 'Column width 1', 'land' ),
		'section'         => 'land_opt_section_footer',
		'description'     => esc_html__( 'Min: 1, max: 12, default value: 3', '' ),
		'default'         => 3,
		'choices'         => [
			'min'  => 1,
			'max'  => 12,
			'step' => 1,
		],
		'active_callback' => [
			[
				'setting'  => 'land_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-0',
			]
		]
	]
);

// Field Footer Width Column 2
new Slider(
	[
		'settings'        => 'land_opt_column_width_footer_2',
		'label'           => esc_html__( 'Column width 2', 'land' ),
		'section'         => 'land_opt_section_footer',
		'description'     => esc_html__( 'Min: 1, max: 12, default value: 3', '' ),
		'default'         => 3,
		'choices'         => [
			'min'  => 1,
			'max'  => 12,
			'step' => 1,
		],
		'active_callback' => [
			[
				'setting'  => 'land_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-0',
			],
			[
				'setting'  => 'land_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-1',
			]
		]
	]
);

// Field Footer Width Column 3
new Slider(
	[
		'settings'        => 'land_opt_column_width_footer_3',
		'label'           => esc_html__( 'Column width 3', 'land' ),
		'section'         => 'land_opt_section_footer',
		'description'     => esc_html__( 'Min: 1, max: 12, default value: 3', '' ),
		'default'         => 3,
		'choices'         => [
			'min'  => 1,
			'max'  => 12,
			'step' => 1,
		],
		'active_callback' => [
			[
				'setting'  => 'land_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-0',
			],
			[
				'setting'  => 'land_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-1',
			],
			[
				'setting'  => 'land_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-2',
			]
		]
	]
);

// Field Footer Width Column 4
new Slider(
	[
		'settings'        => 'land_opt_column_width_footer_4',
		'label'           => esc_html__( 'Column width 4', 'land' ),
		'section'         => 'land_opt_section_footer',
		'description'     => esc_html__( 'Min: 1, max: 12, default value: 3', '' ),
		'default'         => 3,
		'choices'         => [
			'min'  => 1,
			'max'  => 12,
			'step' => 1,
		],
		'active_callback' => [
			[
				'setting'  => 'land_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-0',
			],
			[
				'setting'  => 'land_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-1',
			],
			[
				'setting'  => 'land_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-2',
			],
			[
				'setting'  => 'land_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-3',
			]
		]
	]
);

/*
 * Section Copyright
 * */
new Section(
	'land_opt_section_copyright',
	[
		'title'    => esc_html__( 'Copyright', 'land' ),
		'panel'    => 'land_opt_panel',
		'priority' => 10,
	]
);

// Field Show copyright
new Radio_Buttonset(
	[
		'settings' => 'land_opt_show_copyright',
		'label'    => esc_html__( 'Show Copyright', 'land' ),
		'section'  => 'land_opt_section_copyright',
		'default'  => 'show',
		'choices'  => [
			'show' => esc_html__( 'Show', 'land' ),
			'hide' => esc_html__( 'Hide', 'land' ),
		],
	]
);

// Field Content Copyright
new Editor(
	[
		'settings' => 'land_opt_content_copyright',
		'label'    => esc_html__( 'Content', 'land' ),
		'section'  => 'land_opt_section_copyright',
		'default'  => esc_html__( 'Copyright &amp; DiepLK', 'land' ),
	]
);

/*
 * Section Typography
 * */
new Section(
	'land_opt_section_typography',
	[
		'title'    => esc_html__( 'Typography', 'land' ),
		'panel'    => 'land_opt_panel',
		'priority' => 10,
	]
);

// Field Typography
new Typography(
	[
		'settings'  => 'land_opt_typography',
		'label'     => esc_html__( 'Body', 'land' ),
		'section'   => 'land_opt_section_typography',
		'transport' => 'auto',
		'default'   => [
			'font-family'    => '',
			'variant'        => '',
			'font-style'     => '',
			'color'          => '',
			'font-size'      => '',
			'line-height'    => '',
			'letter-spacing' => '',
		],
		'output'    => [
			[
				'element' => 'body',
			],
		],
	]
);

/*
 * Section 404
 * */
new Section(
	'land_opt_section_404',
	[
		'title'    => esc_html__( '404 Options', 'land' ),
		'panel'    => 'land_opt_panel',
		'priority' => 10,
	]
);

// Field Upload Image 404
new Image(
	[
		'settings' => 'land_opt_image_404',
		'label'    => esc_html__( 'Upload Image', 'land' ),
		'section'  => 'land_opt_section_404',
		'default'  => '',
		'choices'  => [
			'save_as' => 'id',
		],
	]
);

// Field Title 404
new Text(
	[
		'settings' => 'land_opt_title_404',
		'label'    => esc_html__( 'Title', 'land' ),
		'section'  => 'land_opt_section_404',
		'default'  => esc_html__( 'Awww...Do Not Cry', 'land' ),
	]
);

// Field Content 404
new Editor(
	[
		'settings' => 'land_opt_content_404',
		'label'    => esc_html__( 'Content', 'land' ),
		'section'  => 'land_opt_section_404',
		'default'  => esc_html__( 'It is just a 404 Error! What you are looking for may have been misplaced in Long Term Memory.', 'land' ),
	]
);