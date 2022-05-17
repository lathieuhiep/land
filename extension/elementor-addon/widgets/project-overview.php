<?php

use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Land_Elementor_Project_Overview extends Widget_Base {

	public function get_categories(): array {
		return array( 'mytheme' );
	}

	public function get_name(): string {
		return 'land-project-overview';
	}

	public function get_title(): string {
		return esc_html__( 'Tổng quan dự án', 'land' );
	}

	public function get_icon(): string {
		return 'eicon-post-list';
	}

	public function get_script_depends() {
		return ['land-elementor-custom'];
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

		$this->start_controls_tabs(
			'content_tabs'
		);

		// content tab image
		$this->start_controls_tab(
			'content_tab_image',
			[
				'label' => esc_html__( 'Images', 'land' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'land' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Tổng quan dự án', 'land' ),
			]
		);

		$this->add_control(
			'gallery',
			[
				'label' => esc_html__( 'Add Images', 'land' ),
				'type' => Controls_Manager::GALLERY,
				'default' => [],
			]
		);

		$this->end_controls_tab();

		// content tab info
		$this->start_controls_tab(
			'content_tab_info',
			[
				'label' => esc_html__( 'Info', 'land' ),
			]
		);

		$repeater = new Repeater();

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
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'List Content' , 'land' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Repeater List', 'land' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'land' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'land' ),
					],
					[
						'list_title' => esc_html__( 'Title #2', 'land' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'land' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$title = $settings['title'];
		$gallery = $settings['gallery'];
		$list = $settings['list'];
	?>

		<div class="element-project-overview">
			<?php if ( $title ) : ?>
			<h2 class="title text-center">
				<?php echo esc_html( $title ); ?>
			</h2>
			<?php endif; ?>

			<div class="info row row-cols-1 row-cols-md-2">
				<div class="col info__left mb-4 mb-md-0">
                    <?php if ( $gallery ) : ?>
                        <ul class="project-gallery">
                            <?php
                            foreach ( $gallery as $image ):
                                $thumb_url = wp_get_attachment_thumb_url($image['id']);
                            ?>
                                <li data-thumb="<?php echo esc_url( $thumb_url ); ?>">
                                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="" />
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>

				<div class="col info__right">
					<?php if ( $list ) : ?>
                        <div class="list-info">
                            <div class="item">
                                <strong class="item__text">
                                    <?php esc_html_e('Tên dự án', 'land'); ?>
                                </strong>

                                <strong class="item__text">
		                            <?php the_title(); ?>
                                </strong>
                            </div>

							<?php foreach ( $list as $item ): ?>
                                <div class="item">
                                    <strong class="item__text">
                                        <?php echo esc_html( $item['list_title'] ); ?>
                                    </strong>

                                    <div class="item__text content">
                                        <?php echo wpautop( $item['list_content'] ); ?>
                                    </div>
                                </div>
							<?php endforeach; ?>
                        </div>
					<?php endif; ?>
                </div>
			</div>
		</div>

		<?php
	}

}