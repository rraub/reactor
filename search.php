<?php
/**
 * The template for displaying search results
 *
 * @package Reactor
 * @subpackge Templates
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

	<div id="primary" class="content-area">

        <main id="main" class="site-main" role="main">
        	<div class="row">
                <div class="<?php reactor_columns(); ?>">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( __('Search Results for: %s', 'reactor'), '<span>' . get_search_query() . '</span>'); ?></h1>
				</header>

				<?php // start the loop
				while ( have_posts() ) : the_post(); ?>

					<?php // get post format and display template for that format
					if ( !get_post_format() ) : get_template_part('post-formats/format', 'standard');
					else : get_template_part('post-formats/format', get_post_format()); endif; ?>

				<?php endwhile; ?>

				<?php // if no posts are found
				else : else : get_template_part('post-formats/format', 'none'); ?>

			<?php endif; // end have_posts() check ?>

                </div><!-- .columns -->

                <?php get_sidebar(); ?>

            </div><!-- .row -->
        </main><!-- #main -->

	</div><!-- #primary -->

<?php get_footer(); ?>
