<?php
$slides = get_theme_mod('land_opt_landing_page_slider_list', '');
$link_text = get_theme_mod('land_opt_landing_page_slider_link_text', 'Detail');
$link_target = get_theme_mod('land_opt_landing_page_slider_link_target','_self');

if ( $slides ) :
	$settings_slider = [
		'items'    => 1,
		'loop'     => true,
		'autoplay' => true,
		'nav'      => true,
		'dots'     => false
	];
?>

<div class="element-section">
	<div class="slider-page owl-carousel" data-settings-owl='<?php echo wp_json_encode( $settings_slider ); ?>'>
		<?php foreach ( $slides as $item ) : ?>
		<div class="item">
			<div class="item__thumbnail">
				<?php
				if ( $item['image'] ) :
					echo wp_get_attachment_image( $item['image'], 'full' );
				else:
				?>
					<img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/slider-default.png' ) ) ?>" alt="<?php esc_attr_e('slides', 'land'); ?>">
				<?php endif; ?>
			</div>

            <div class="item__content">
               <div class="container">
                   <div class="dark-box">
                       <h4 class="title">
		                   <?php echo esc_html( $item['title'] ); ?>
                       </h4>

                       <p class="desc">
		                   <?php echo esc_html( $item['description'] ); ?>
                       </p>

                       <a class="link" href="<?php echo esc_url( $item['link_url'] ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
		                   <?php echo esc_html( $link_text ); ?>
                           <i class="fa-solid fa-angle-right"></i>
                       </a>
                   </div>
               </div>
            </div>
		</div>
		<?php endforeach; ?>
	</div>
</div>

<?php
endif;