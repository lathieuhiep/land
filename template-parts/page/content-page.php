<div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="site-page-content">
            <?php
            the_content();
            land_link_page();
            ?>
        </div>
    <?php
        land_comment_form();
    endwhile;
    ?>
</div>