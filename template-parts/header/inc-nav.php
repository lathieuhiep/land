<?php
$sticky_menu = get_theme_mod( 'land_opt_sticky_menu', 'on' );
$logo = get_theme_mod( 'land_opt_image_logo', '' );
$cart = get_theme_mod( 'land_opt_cart_menu', 'show' );
$style_menu = get_post_meta(get_the_ID(), 'land_cmb_page_style_menu', true);

if ( empty( $style_menu ) && $sticky_menu == 'on' ) :
    $class_type_nav = 'active-sticky-nav';
else :
    if ( $style_menu == 'fixed' ) :
        $class_type_nav = 'fixed-top';
    elseif ( $style_menu == 'absolute' ):
        $class_type_nav = 'position-absolute top-0 start-0 end-0';
    else:
	    $class_type_nav = '';
    endif;
endif;

?>

<nav id="site-navigation" class="main-navigation <?php echo esc_attr( $class_type_nav ); ?>">
    <div class="site-navbar navbar-expand-lg">
        <div class="container">
            <div class="site-navigation_warp d-flex justify-content-lg-end">
                <div class="site-logo d-flex align-items-center">
                    <a href="<?php echo esc_url( get_home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
                        <?php
                            if ( !empty( $logo ) ) :
                                echo wp_get_attachment_image( $logo, 'full' );
                            else :
                        ?>

                            <img class="logo-default" src="<?php echo esc_url( get_theme_file_uri( '/assets/images/logo.png' ) ) ?>" alt="<?php echo esc_attr( get_bloginfo('title') ); ?>" width="64" height="64" />

                        <?php endif; ?>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#site-menu" aria-controls="site-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                </div>

                <div id="site-menu" class="site-menu collapse navbar-collapse d-lg-flex justify-content-lg-end">
                    <?php
                    if ( has_nav_menu('primary') && !is_page_template('templates/template-landing.php') ) :
                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'menu_class'     => 'navbar-nav',
                            'container'      => false,
                        ) ) ;
                    elseif ( has_nav_menu('landing') && is_page_template('templates/template-landing.php') ):
	                    wp_nav_menu( array(
		                    'theme_location' => 'landing',
		                    'menu_class'     => 'navbar-nav',
		                    'container'      => false,
	                    ) ) ;
                    else:
                    ?>
                        <ul class="main-menu">
                            <li>
                                <a href="<?php echo get_admin_url().'/nav-menus.php'; ?>">
                                    <?php esc_html_e( 'ADD TO MENU','land' ); ?>
                                </a>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</nav>