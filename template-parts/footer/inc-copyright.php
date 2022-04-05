<?php
$show_copyright = get_theme_mod('land_opt_show_copyright', 'show');
$copyright = get_theme_mod('land_opt_content_copyright', 'Copyright &amp; DiepLK');
?>

<div class="site-footer__bottom">
    <div class="container">
        <div class="bottom-warp">
            <?php if ( $show_copyright == 'show' ) : ?>

            <div class="copyright">
                <?php echo wpautop( $copyright ); ?>
            </div>

            <?php endif; ?>

            <div class="menu-footer">
                <nav>
                    <?php

                    if ( has_nav_menu( 'footer-menu' ) ) :

                        wp_nav_menu( array(
                            'theme_location'    => 'footer-menu',
                            'menu_class'        => 'menu-footer',
                            'container'         =>  false,
                        ));

                    else:

                    ?>

                        <ul class="main-menu">
                            <li>
                                <a href="<?php echo get_admin_url().'/nav-menus.php'; ?>">
                                    <?php esc_html_e( 'ADD TO MENU','land' ); ?>
                                </a>
                            </li>
                        </ul>

                    <?php endif;?>
                </nav>
            </div>
        </div>
    </div>
</div>