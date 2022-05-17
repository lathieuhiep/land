<?php

use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Land_Elementor_Addon_Contact_Form_7 extends Widget_Base {

	public function get_categories() {
		return array( 'mytheme' );
	}

	public function get_name() {
		return 'land-contact-form-7';
	}

	public function get_title() {
		return esc_html__( 'Contact Form 7', 'land' );
	}

	public function get_icon() {
		return 'eicon-form-horizontal';
	}

	protected function register_controls() {

		// Content section
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Contact Form', 'land' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'contact_form_list',
			[
				'label' => esc_html__('Select Form', 'land'),
				'type' => Controls_Manager::SELECT,
				'label_block' => true,
				'options' => land_get_form_cf7(),
				'default' => '0',
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'land' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Title contact', 'land' ),
			]
		);

		$this->end_controls_section();

        // style section
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style', 'land' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_options',
			[
				'label' => esc_html__( 'Title Options', 'land' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     =>  esc_html__( 'Color', 'land' ),
				'type'      =>  Controls_Manager::COLOR,
				'default'   =>  '',
				'selectors' =>  [
					'{{WRAPPER}} .element-contact-form-7 .title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .element-contact-form-7 .title',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( !empty( $settings['contact_form_list'] ) ) :
	?>

		<div class="element-contact-form-7">
            <?php if ( !empty($settings['title']) ) : ?>
                <h3 class="title">
                    <?php echo esc_html( $settings['title'] ); ?>
                </h3>
			<?php
            endif;

            echo do_shortcode('[contact-form-7 id="' . $settings['contact_form_list'] . '" ]');
            ?>
		</div>

	<?php
		endif;
	}

}