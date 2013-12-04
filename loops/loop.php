<?php
/**
 * The main loop for displaying posts
 *
 * @package Reactor
 * @subpackage loops
 * @since 1.0.0
 */
?>

<?php
$pagination_type = reactor_option('page_links', 'numbered'); ?>

	<?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <?php // get post format and display template for that format
            if ( !get_post_format() ) : get_template_part('post-formats/format', 'standard');
            else : get_template_part('post-formats/format', get_post_format()); endif; ?>

        <?php endwhile; // end of the loop ?>

        <?php
        if ( current_theme_supports('reactor-page-links') ) {
            reactor_page_links( array('type' => $pagination_type) );
        } ?>

        <?php // if no posts are found
        else : get_template_part('post-formats/format', 'none'); ?>

    <?php endif; // end have_posts() check ?>