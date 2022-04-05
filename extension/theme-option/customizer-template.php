<?php
/*
 * Customize
 * */

// Panel Theme Options
use Kirki\Field\Image;
use Kirki\Panel;
use Kirki\Section;

new Panel(
	'land_opt_template_panel',
	[
		'priority' => 10,
		'title'    => esc_html__( 'Template Options', 'land' ),
	]
);

new Section(
	'land_opt_section_template_landing',
	[
		'title'    => esc_html__( 'Landing Page', 'land' ),
		'panel'    => 'land_opt_template_panel',
		'priority' => 10,
	]
);

new Image(
	[
		'settings' => 'land_opt_favicon_landing',
		'label'    => esc_html__( 'Upload Image Favicon', 'land' ),
		'section'  => 'land_opt_section_template_landing',
		'default'  => '',
	]
);