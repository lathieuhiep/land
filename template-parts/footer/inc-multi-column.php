<?php
$footer_column = get_theme_mod('land_opt_column_footer', 'column-4');
$number_column = (int) substr( $footer_column, -1 );

if( is_active_sidebar( 'land-sidebar-footer-column-1' ) || is_active_sidebar( 'land-sidebar-footer-column-2' ) || is_active_sidebar( 'land-sidebar-footer-column-3' ) || is_active_sidebar( 'land-sidebar-footer-column-4' ) ) :

?>

    <div class="site-footer__column">
        <div class="container">
            <div class="row">
                <?php
                for( $i = 0; $i < $number_column; $i++ ):
                    $j = $i +1;
                    $land_col = get_theme_mod( 'land_opt_column_width_footer_' .  $j, 3);

                    if( is_active_sidebar( 'land-sidebar-footer-column-'.$j ) ):
                ?>

                    <div class="col-12 col-sm-6 col-lg-<?php echo esc_attr( $land_col ); ?>">

                        <?php dynamic_sidebar( 'land-sidebar-footer-column-'.$j ); ?>

                    </div>

                <?php
                    endif;

                endfor;
                ?>
            </div>
        </div>
    </div>

<?php endif; ?>