<?php

use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit;

class land_Elementor_Addon_Project_Grid extends Widget_Base
{

    public function get_categories()
    {
        return array('mytheme');
    }

    public function get_name()
    {
        return 'land-project-grid';
    }

    public function get_title()
    {
        return esc_html__('Project Grid', 'land');
    }

    public function get_icon()
    {
        return 'eicon-gallery-grid';
    }

    protected function register_controls()
    {

        // Content query
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Query', 'land'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'select_cat',
            [
                'label' => esc_html__('Select Category', 'land'),
                'type' => Controls_Manager::SELECT2,
                'options' => land_check_get_cat('land_project_cat'),
                'multiple' => true,
                'label_block' => true
            ]
        );

        $this->add_control(
            'limit',
            [
                'label' => esc_html__('Number of Posts', 'land'),
                'type' => Controls_Manager::NUMBER,
                'default' => 6,
                'min' => 1,
                'max' => 100,
                'step' => 1,
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label' => esc_html__('Order By', 'land'),
                'type' => Controls_Manager::SELECT,
                'default' => 'id',
                'options' => [
                    'id' => esc_html__('Post ID', 'land'),
                    'author' => esc_html__('Post Author', 'land'),
                    'title' => esc_html__('Title', 'land'),
                    'date' => esc_html__('Date', 'land'),
                    'rand' => esc_html__('Random', 'land'),
                ],
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => esc_html__('Order', 'land'),
                'type' => Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => [
                    'ASC' => esc_html__('Ascending', 'land'),
                    'DESC' => esc_html__('Descending', 'land'),
                ],
            ]
        );

        $this->end_controls_section();

        // Content layout
        $this->start_controls_section(
            'content_layout',
            [
                'label' => esc_html__('Layout Settings', 'land'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'column_number',
            [
                'label' => esc_html__('Column', 'land'),
                'type' => Controls_Manager::SELECT,
                'default' => 3,
                'options' => [
                    1 => esc_html__('1 Column', 'land'),
                    2 => esc_html__('2 Column', 'land'),
                    3 => esc_html__('3 Column', 'land'),
                    4 => esc_html__('4 Column', 'land'),
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $cate = $settings['select_cat'];
        $limit = $settings['limit'];
        $order_by = $settings['order_by'];
        $order = $settings['order'];

	    $tax_query = array();
        if ( $cate ) :
            $tax_query = array(
	            array(
		            'taxonomy' => 'land_project_cat',
		            'terms'    => $cate,
	            )
            );
        endif;

        // Query
        $args = array(
            'post_type' => 'land_project',
            'posts_per_page' => $limit,
            'orderby' => $order_by,
            'order' => $order,
            'ignore_sticky_posts' => 1,
            'tax_query' => $tax_query,
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :

        ?>

            <div class="element-project-grid">
                <div class="row row-cols-sm-2 row-cols-md-3 row-cols-lg-<?php echo esc_attr( $settings['column_number'] ); ?>">
                    <?php
                    while ($query->have_posts()):
                        $query->the_post();

                    $link_web = rwmb_meta('land_meta_boxes_project_link_web');
                    $video = rwmb_meta('land_meta_boxes_project_video', ['limit' => 1]);
                    ?>
                        <div class="col">
                            <div class="item-post">
                                <div class="item-post__thumbnail">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <?php
                                        if (has_post_thumbnail()) :
                                            the_post_thumbnail('large');
                                        else:
                                        ?>
                                            <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/no-image.png')) ?>" alt="<?php the_title(); ?>"/>
                                        <?php endif; ?>
                                    </a>

                                    <?php if ( $video ) : ?>
                                        <a class="play" href="<?php echo esc_url( $video[0]['src'] ); ?>" data-lity>
                                            <i class="fas fa-play"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>

                                <h2 class="item-post__title">
                                    <a href="<?php echo esc_url( !empty( $link_web ) ? $link_web : get_the_permalink() ); ?>" target="_blank" title="<?php the_title(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>

                                <div class="item-post__content">
                                    <p>
                                        <?php
                                        if (has_excerpt()) :
                                            echo esc_html( get_the_excerpt() );
                                        else:
                                            echo esc_html(wp_trim_words(get_the_content(), 30, '...'));
                                        endif;
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>

        <?php

        endif;
    }

}