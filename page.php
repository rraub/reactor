<?php
/**
 * The default template for displaying pages
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

					<?php // get the page loop
                    get_template_part('loops/loop', 'page'); ?>

                </div><!-- .columns -->

                <?php get_sidebar(); ?>

            </div><!-- .row -->
        </main><!-- #main -->

	</div><!-- #primary -->

<?php get_footer(); ?>