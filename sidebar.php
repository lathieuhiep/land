<?php if( is_active_sidebar( 'land-sidebar-main' ) ): ?>

    <aside class="<?php echo esc_attr( land_col_sidebar() ); ?> site-sidebar order-1">
        <?php dynamic_sidebar( 'land-sidebar-main' ); ?>
    </aside>

<?php endif; ?>