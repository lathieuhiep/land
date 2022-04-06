<?php
$title = get_theme_mod('land_opt_landing_page_project_introduction_title', 'Tổng Quan Dự Án');
$image = get_theme_mod('land_opt_landing_page_project_introduction_image', '');

$defaults_info = [
	[
		'title'       => esc_html__( 'Tên dự án', 'land' ),
		'description' => esc_html__( 'M Landmark Residences', 'land' ),
		'checkbox'    => true,
	],

	[
		'title'       => esc_html__( 'Vị trí', 'land' ),
		'description' => esc_html__( 'Số 58 Đường Bạch Đằng, Quận Hải Châu, TP. Đà Nẵng', 'land' ),
		'checkbox'    => false,
	],
];
$info = get_theme_mod('land_opt_landing_page_project_introduction_list', $defaults_info);

if ( $info ) :
?>
<div class="element-section pt-5 pb-5">
    <div class="container">
        <div class="info-landing">
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col">
                    <div class="info-landing__thumbnail">
					    <?php
					    if ( $image ) :
						    echo wp_get_attachment_image( $image, 'full' );
					    else:
                        ?>
                            <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/info-landing.png' ) ) ?>" width="720" height="960" alt="<?php esc_attr_e('slides', 'land'); ?>">
					    <?php endif; ?>
                    </div>
                </div>

                <div class="col">
                    <div class="info-landing__list">
                        <h2 class="title">
						    <?php echo esc_html( $title ); ?>
                        </h2>

                        <ul>
						    <?php foreach ( $info as $item ) : ?>
                                <li>
                                    <i class="fa-solid fa-arrow-right"></i>
                                    <strong><?php echo esc_html( $item['title'] ); ?></strong>
                                    &#58;
                                    <span class="desc<?php echo esc_attr( $item['checkbox'] ? ' fw-bold' : '' ); ?>"><?php echo esc_html( $item['description'] ); ?></span>
                                </li>
						    <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
endif;