<?php
get_header();

$title = get_theme_mod('land_opt_title_404', '');
$content = get_theme_mod('land_opt_content_404', '');
$image = get_theme_mod('land_opt_image_404', '');
?>

<div class="site-error text-center">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 align-items-center justify-content-center">
            <div class="col">
                <figure class="site-error__image404">
                    <?php
                    if( !empty( $image ) ):
                        echo wp_get_attachment_image( $image, 'full' );
                    else:
                        echo'<img src="'.esc_url( get_theme_file_uri( '/assets/images/404.jpg' ) ).'" alt="'.get_bloginfo('title').'" />';
                    endif;
                    ?>
                </figure>
            </div>

            <div class="col">
                <h1 class="site-title-404">
                    <?php
                    if ( $title != '' ):
                        echo esc_html( $title );
                    else:
                        esc_html_e( 'Awww...Do Not Cry', 'land' );
                    endif;
                    ?>
                </h1>

                <div id="site-error-content">
                    <?php
                    if ( $content != '' ) :
                        echo wpautop( $content );
                    else:
                    ?>
                        <p>
                            <?php esc_html_e( 'It is just a 404 Error!', 'land' ); ?>
                            <br />
                            <?php esc_html_e( 'What you are looking for may have been misplaced', 'land' ); ?>
                            <br />
                            <?php esc_html_e( 'in Long Term Memory.', 'land' ); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div id="site-error-back-home">
                    <a href="<?php echo esc_url( get_home_url('/') ); ?>" title="<?php echo esc_html__('Go to the Home Page', 'land'); ?>">
                        <?php esc_html_e('Go to the Home Page', 'land'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>