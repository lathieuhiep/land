<?php

use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Land_Elementor_Addon_Video extends Widget_Base {

    public function get_categories(): array {
        return array( 'mytheme' );
    }

    public function get_name(): string {
        return 'land-video';
    }

    public function get_title(): string {
        return esc_html__( 'Video Theme', 'land' );
    }

    public function get_icon(): string {
        return 'eicon-video-playlist';
    }

    protected function register_controls() {

        // video section
        $this->start_controls_section(
            'video_section',
            [
                'label' => esc_html__( 'Video', 'land' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'video',
            [
                'label' => esc_html__( 'Choose Video', 'plugin-name' ),
                'type' => Controls_Manager::MEDIA,
                'media_type' => 'video',
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $video_url = $settings['video']['url'];

        if ( empty( $video_url ) ) {
            return '';
        }
    ?>

        <div class="element-video">
            <video src="<?php echo esc_attr( $video_url ); ?>" autoplay loop muted></video>
        </div>

        <?php
    }

}