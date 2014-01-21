<?php
/**
 * Template Name: Side Menu
 *
 * @package Reactor
 * @subpackge Page-Templates
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

	<div id="primary" class="content-area">

        <main id="main" class="site-main" role="main">
        	<div class="row">

                <div class="<?php reactor_columns(); ?> push-3">

                <?php // get the page loop
                get_template_part('loops/loop', 'page'); ?>

                </div><!-- .columns -->

                <div id="side-menu" class="<?php reactor_columns('', true, true); ?> pull-9">
                    <?php reactor_side_menu(); ?>
                </div><!-- #side-menu -->

            </div><!-- .row -->
        </main><!-- #main -->

	</div><!-- #primary -->

<?php get_footer(); ?>
