<?php
get_header();

$land_check_elementor = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );
?>

<main class="site-single-project">
	<?php
	if ( $land_check_elementor ) :
		get_template_part('template-parts/project/inc','elementor');
	else:
		get_template_part('template-parts/project/inc','content');
	endif;
	?>
</main>

<?php
get_footer();
