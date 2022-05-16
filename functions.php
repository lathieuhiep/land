<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Setup Theme
if ( ! function_exists( 'land_setup' ) ):

	function land_setup() {
		// Set the content width based on the theme's design and stylesheet.
		global $content_width;

		if ( ! isset( $content_width ) ) {
			$content_width = 900;
		}

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'land', get_parent_theme_file_path( '/languages' ) );

		/**
		 * Set up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which
		 * runs before the init hook. The init hook is too late for some features, such
		 * as indicating support post thumbnails.
		 *
		 */
		add_theme_support( 'custom-header' );

		add_theme_support( 'custom-background' );

		//Enable support for Post Thumbnails
		add_theme_support( 'post-thumbnails' );

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		// This theme uses wp_nav_menu() in two locations.
        register_nav_menus(
            array(
	            'landing'   => esc_html__('Landing Page Menu', 'land'),
                'primary'   => esc_html__('Primary Menu', 'land'),
                'footer-menu' => esc_html__('Footer Menu', 'land'),
            )
        );

        // add theme support title-tag
		add_theme_support( 'title-tag' );
	}

	add_action( 'after_setup_theme', 'land_setup' );

endif;

// Required: Plugin Activation
require get_parent_theme_file_path( '/includes/class-tgm-plugin-activation.php' );
require get_parent_theme_file_path( '/includes/plugin-activation.php' );

// Required: theme add_action
require get_parent_theme_file_path( '/includes/theme-add-action.php' );

// Required: Kirki customizer
if ( class_exists('Kirki') ) {
    require get_theme_file_path( 'extension/theme-option/customizer.php' );
	require get_theme_file_path( 'extension/theme-option/customizer-template.php' );
}

// Required: Custom post type
require get_parent_theme_file_path( 'extension/post-type/project.php' );

// Required: CMB2
if ( !class_exists('CMB2') ) {
    require get_parent_theme_file_path( '/extension/meta-box/cmb_post.php' );
    require get_parent_theme_file_path( '/extension/meta-box/cmb_page.php' );
}

//  Required: Meta Box Framework
if ( class_exists( 'RW_Meta_Box' ) ) {
	require get_parent_theme_file_path( '/extension/meta-box/project-options.php' );
}

if ( ! function_exists( 'rwmb_meta' ) ) {

	function rwmb_meta( $key, $args = '', $post_id = null ): bool {
		return false;
	}

}

// Required: Elementor
if ( did_action( 'elementor/loaded' ) ) :
    require get_parent_theme_file_path( '/extension/elementor-addon/elementor-addon.php' );
endif;

// Require Widgets
foreach ( glob( get_parent_theme_file_path( '/extension/widgets/*.php' ) ) as $land_file_widgets ) {
	require $land_file_widgets;
}

// Require Register Sidebar
require get_parent_theme_file_path( '/includes/register-sidebar.php' );

// Require Theme Scripts
require get_parent_theme_file_path( '/includes/theme-scripts.php' );

// Walker for the main menu
add_filter( 'walker_nav_menu_start_el', 'land_add_arrow',10,4);
function land_add_arrow( $output, $item, $depth, $args ){
	if('primary' == $args->theme_location && $depth >= 0 ){
		if (in_array("menu-item-has-children", $item->classes)) {
			$output .='<span class="sub-menu-toggle"></span>';
		}
	}

	return $output;
}

// Callback Comment List
function land_comments( $land_comment, $land_comment_args, $land_comment_depth ) {

	if ( 'div' === $land_comment_args['style'] ) :

		$land_comment_tag       = 'div';
		$land_comment_add_below = 'comment';

	else :

		$land_comment_tag       = 'li';
		$land_comment_add_below = 'div-comment';

	endif;

	?>
    <<?php echo $land_comment_tag ?><?php comment_class( empty( $land_comment_args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

	<?php if ( 'div' != $land_comment_args['style'] ) : ?>

        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">

	<?php endif; ?>

    <div class="comment-author vcard">
		<?php if ( $land_comment_args['avatar_size'] != 0 ) {
			echo get_avatar( $land_comment, $land_comment_args['avatar_size'] );
		} ?>

    </div>

	<?php if ( $land_comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation">
			<?php esc_html_e( 'Your comment is awaiting moderation.', 'land' ); ?>
        </em>
	<?php endif; ?>

    <div class="comment-meta commentmetadata">
        <div class="comment-meta-box">
             <span class="name">
                <?php comment_author_link(); ?>
            </span>
            <span class="comment-metadata">
                <?php comment_date(); ?>
            </span>

			<?php edit_comment_link( esc_html__( 'Edit ', 'land' ) ); ?>

			<?php comment_reply_link( array_merge( $land_comment_args, array(
				'add_below' => $land_comment_add_below,
				'depth'     => $land_comment_depth,
				'max_depth' => $land_comment_args['max_depth']
			) ) ); ?>

        </div>

        <div class="comment-text-box">
			<?php comment_text(); ?>
        </div>
    </div>

	<?php if ( 'div' != $land_comment_args['style'] ) : ?>
        </div>
	<?php endif; ?>

	<?php
}

// Content Nav
if ( ! function_exists( 'land_comment_nav' ) ) :

	function land_comment_nav() {
		// Are there comments to navigate through?
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :

			?>
            <nav class="navigation comment-navigation">
                <h2 class="screen-reader-text">
					<?php esc_html_e( 'Comment navigation', 'land' ); ?>
                </h2>

                <div class="nav-links">
					<?php
					if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'land' ) ) ) :
						printf( '<div class="nav-previous">%s</div>', $prev_link );
					endif;

					if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'land' ) ) ) :
						printf( '<div class="nav-next">%s</div>', $next_link );
					endif;
					?>
                </div><!-- .nav-links -->
            </nav><!-- .comment-navigation -->

		<?php
		endif;
	}

endif;

// Social Network
function land_get_social_url() {
    $defaults = land_get_social_defaults();

	$social_networks = get_theme_mod('land_opt_social_list', $defaults);

	foreach ( $social_networks as $item ) :
		$social_url = $item['url'];

		if ( $social_url ) :
    ?>
        <div class="social-network-item">
            <a href="<?php echo esc_url( $social_url ); ?>" target="<?php echo esc_attr( $item['target'] ); ?>">
                <i class="<?php echo $item['icon']; ?>"></i>
            </a>
        </div>
    <?php
		endif;
	endforeach;
}

function land_get_social_defaults(): array
{
	return [
        [
            'title' => 'Facebook',
            'icon' => 'fab fa-facebook-f',
            'url' => '#',
            'target' => '_blank'
        ],
        [
            'title' => 'Youtube',
            'icon' => 'fab fa-youtube',
            'url' => '#',
            'target' => '_blank'
        ],
        [
            'title' => 'Twitter',
            'icon' => 'fab fa-twitter',
            'url' => '#',
            'target' => '_blank'
        ],
        [
            'title' => 'Instagram',
            'icon' => 'fab fa-instagram',
            'url' => '#',
            'target' => '_blank'
        ],
    ];
}

// Pagination
function land_pagination() {
	the_posts_pagination( array(
		'type'               => 'list',
		'mid_size'           => 2,
		'prev_text'          => esc_html__( 'Previous', 'land' ),
		'next_text'          => esc_html__( 'Next', 'land' ),
		'screen_reader_text' => '&nbsp;',
	) );
}

// Pagination Nav Query
function land_paging_nav_query( $query ) {

	$args = array(
		'prev_text' => esc_html__( ' Previous', 'land' ),
		'next_text' => esc_html__( 'Next', 'land' ),
		'current'   => max( 1, get_query_var( 'paged' ) ),
		'total'     => $query->max_num_pages,
		'type'      => 'list',
	);

	$paginate_links = paginate_links( $args );

	if ( $paginate_links ) :

		?>
        <nav class="pagination">
			<?php echo $paginate_links; ?>
        </nav>

	<?php

	endif;
}

// Sanitize Pagination
add_action( 'navigation_markup_template', 'land_sanitize_pagination' );
function land_sanitize_pagination( $land_content ) {
	// Remove role attribute
	$land_content = str_replace( 'role="navigation"', '', $land_content );

	// Remove h2 tag
    return preg_replace( '#<h2.*?>(.*?)<\/h2>#si', '', $land_content );
}

// Get col global
function land_col_use_sidebar( $option_sidebar, $active_sidebar ): string
{

	if ( $option_sidebar != 'hide' && is_active_sidebar( $active_sidebar ) ):

		if ( $option_sidebar == 'left' ) :
			$class_position_sidebar = ' order-1 order-md-2';
		else:
			$class_position_sidebar = ' order-1';
		endif;

		$class_col_content = 'col-12 col-md-8 col-lg-9' . $class_position_sidebar;
	else:
		$class_col_content = 'col-md-12';
	endif;

	return $class_col_content;
}

function land_col_sidebar(): string
{
    return 'col-12 col-md-4 col-lg-3';
}

// Post Meta
function land_post_meta() {
	?>

    <div class="site-post-meta">
        <span class="site-post-author">
            <?php esc_html_e( 'Author:', 'land' ); ?>

            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                <?php the_author(); ?>
            </a>
        </span>

        <span class="site-post-date">
            <?php esc_html_e( 'Post date: ', 'land' );
            the_date(); ?>
        </span>

        <span class="site-post-comments">
            <?php
            comments_popup_link( '0 ' . esc_html__( 'Comment', 'land' ), '1 ' . esc_html__( 'Comment', 'land' ), '% ' . esc_html__( 'Comments', 'land' ) );
            ?>
        </span>
    </div>

	<?php
}

// Link Pages
function land_link_page() {

	wp_link_pages( array(
		'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'land' ),
		'after'       => '</div>',
		'link_before' => '<span class="page-number">',
		'link_after'  => '</span>',
	) );

}

// Comment
function land_comment_form() {

	if ( comments_open() || get_comments_number() ) :
		?>
        <div class="site-comments">
			<?php comments_template( '', true ); ?>
        </div>
	<?php
	endif;
}

// Get Category Check Box
function land_check_get_cat( $type_taxonomy ): array
{
	$cat_check = array();
	$category  = get_terms(
		array(
			'taxonomy'   => $type_taxonomy,
			'hide_empty' => false
		)
	);

	if ( isset( $category ) && ! empty( $category ) ):
		foreach ( $category as $item ) {
			$cat_check[ $item->term_id ] = $item->name;
		}
	endif;

	return $cat_check;
}

// Share Facebook
function land_post_share() {

	?>
    <div class="site-post-share">
        <iframe src="https://www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&width=150&layout=button&action=like&size=large&share=true&height=30&appId=612555202942781" width="150" height="30" style="border:none;overflow:hidden" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
    </div>
	<?php

}

// Opengraph
add_action( 'wp_head', 'land_opengraph', 5 );
function land_opengraph() {
	global $post;

	if ( is_single() ) :

		if ( has_post_thumbnail( $post->ID ) ) :
			$img_src = get_the_post_thumbnail_url( get_the_ID(), 'full' );
		else :
			$img_src = get_theme_file_uri( '/images/no-image.png' );
		endif;

        $excerpt = $post->post_excerpt;

		if ( $excerpt ) :
			$excerpt = strip_tags( $post->post_excerpt );
			$excerpt = str_replace( "", "'", $excerpt );
		else :
			$excerpt = get_bloginfo( 'description' );
		endif;

    ?>
        <meta property="og:url" content="<?php the_permalink(); ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="<?php the_title(); ?>" />
        <meta property="og:description" content="<?php echo esc_attr( $excerpt ); ?>" />
        <meta property="og:image" content="<?php echo esc_url( $img_src ); ?>" />
	<?php

	else :
		return;
	endif;
}

// Custom Search Post
function land_include_custom_post_types_in_search_results( $query ) {
	if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
		$query->set( 'post_type', array( 'post' ) );
	}
}
add_action( 'pre_get_posts', 'land_include_custom_post_types_in_search_results' );

// Get Contact Form 7
function land_get_form_cf7(): array {
    $options = array();

    if ( function_exists('wpcf7') ) {

	    $wpcf7_form_list = get_posts( array(
            'post_type' => 'wpcf7_contact_form',
		    'numberposts' => -1,
        ) );

	    $options[0] = esc_html__('Select a Contact Form', 'land');

	    if ( !empty($wpcf7_form_list) && !is_wp_error($wpcf7_form_list) ) :
		    foreach ( $wpcf7_form_list as $item ) :
			    $options[$item->ID] = $item->post_title;
		    endforeach;
	    else :
		    $options[0] = esc_html__('Create a Form First', 'land');
	    endif;

    }

    return $options;
}