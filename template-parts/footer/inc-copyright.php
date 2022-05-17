<?php
$show_copyright = get_theme_mod('land_opt_show_copyright', 'show');
$copyright = get_theme_mod('land_opt_content_copyright', 'Copyright &amp; DiepLK');

if ( $show_copyright != 'show' ) :
    return false;
endif;
?>

<div class="site-footer__bottom">
    <div class="container">
        <div class="copyright text-center">
		    <?php echo wpautop( $copyright ); ?>
        </div>
    </div>
</div>