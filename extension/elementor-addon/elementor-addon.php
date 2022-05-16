<?php
// Register Category Elementor Addon
function land_register_category_elementor_addon( $elements_manager ) {

	$elements_manager->add_category(
		'mytheme',
		[
			'title' => esc_html__( 'My Them', 'land' ),
			'icon' => 'icon-goes-here',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'land_register_category_elementor_addon' );

// Register Widgets Elementor Addon
function land_register_widget_elementor_addon( $widgets_manager ) {

	// include add on
    require get_parent_theme_file_path( '/extension/elementor-addon/widgets/slides.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/about-text.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/post-carousel.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/post-grid.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/testimonial-slider.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/carousel-images.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/contact-form-7.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/info-box.php' );
    require get_parent_theme_file_path( '/extension/elementor-addon/widgets/video.php' );
    require get_parent_theme_file_path( '/extension/elementor-addon/widgets/project-grid.php' );

	// register add on
    $widgets_manager->register( new \land_Elementor_Addon_Slides() );
	$widgets_manager->register( new \land_Elementor_Addon_About_Text() );
	$widgets_manager->register( new \land_Elementor_Addon_Post_Carousel() );
	$widgets_manager->register( new \land_Elementor_Addon_Post_Grid() );
	$widgets_manager->register( new \land_Elementor_Addon_Testimonial_Slider() );
	$widgets_manager->register( new \land_Elementor_Addon_Carousel_Images() );
	$widgets_manager->register( new \land_Elementor_Addon_Contact_Form_7() );
	$widgets_manager->register( new \land_Elementor_Addon_Info_Box() );
    $widgets_manager->register( new \Land_Elementor_Addon_Video() );
    $widgets_manager->register( new \land_Elementor_Addon_Project_Grid() );

}
add_action( 'elementor/widgets/register', 'land_register_widget_elementor_addon' );

// Register Script Elementor Addon
function land_register_script_elementor_addon() {
	wp_register_script( 'land-elementor-custom', get_theme_file_uri( '/assets/js/elementor-custom.js' ), array(), '1.0.0', true );
}
add_action( 'elementor/frontend/after_enqueue_styles', 'land_register_script_elementor_addon' );