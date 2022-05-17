<?php
get_header();

$land_check_elementor =   get_post_meta( get_the_ID(), '_elementor_edit_mode', true );

$land_class_elementor =   '';

if ( $land_check_elementor ) :
    $land_class_elementor =   ' site-container-elementor';
endif;
?>

    <main class="site-container<?php echo esc_attr( $land_class_elementor ); ?>">
        <?php
        if ( $land_check_elementor ) :
            get_template_part('template-parts/page/content','page-elementor');
        else:
            get_template_part('template-parts/page/content','page');
        endif;
        ?>
    </main>

<?php
get_footer();