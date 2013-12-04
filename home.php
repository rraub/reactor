<?php
/**
 * The main template file and posts page
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

					<?php /* get the page loop
					only works when posts page is set in the reading settings */
                    get_template_part('loops/loop', 'page'); ?>

					<?php // get the loop
					get_template_part('loops/loop', 'index'); ?>

                </div><!-- .columns -->

                <?php get_sidebar(); ?>

            </div><!-- .row -->
        </main><!-- #main -->

	</div><!-- #primary -->

<?php get_footer(); ?>