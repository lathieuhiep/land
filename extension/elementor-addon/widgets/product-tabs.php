<?php

use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Land_Elementor_Addon_Product_Tabs extends Widget_Base {

	public function get_categories(): array {
		return array( 'mytheme' );
	}

	public function get_name(): string {
		return 'land-product-tabs';
	}

	public function get_title(): string {
		return esc_html__( 'Product Tabs', 'land' );
	}

	public function get_icon(): string {
		return 'eicon-product-tabs';
	}

	protected function register_controls() {

		// content section
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'land' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'list_image',
			[
				'label' => esc_html__( 'Choose Image', 'land' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'list_title', [
				'label' => esc_html__( 'Title', 'land' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'land' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_content', [
				'label' => esc_html__( 'Content', 'land' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'List Content' , 'land' ),
				'show_label' => false,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Repeater Tab', 'land' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Tab #1', 'land' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'land' ),
					],
					[
						'list_title' => esc_html__( 'Tab #2', 'land' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'land' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$list = $settings['list'];

		if ( empty($list) ) :
			return true;
		endif;
	?>

		<div class="element-product-tabs">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<?php foreach ( $list as $key => $item ): ?>
					<li class="nav-item" role="presentation">
						<button class="nav-link <?php echo esc_attr( $key == 0 ? 'active' : '' ); ?>" data-bs-toggle="tab" data-bs-target="#tab-<?php echo esc_attr($item['_id']); ?>" type="button">
							<?php echo esc_html( $item['list_title'] ); ?>
						</button>
					</li>
				<?php endforeach; ?>
			</ul>

			<div class="tab-content">
				<?php foreach ( $list as $key => $item ): ?>
					<div class="tab-pane fade <?php echo esc_attr( $key == 0 ? 'show active' : '' ); ?>" id="tab-<?php echo esc_attr($item['_id']); ?>">
						<?php echo esc_html( $item['list_content'] ); ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<?php
	}

}