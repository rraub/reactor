<?php
/**
 * Template Name: News Page
 *
 * @package Reactor
 * @subpackge Page-Templates
 * @since 1.0.0
 */
?>

<?php // get the options
$slider_category = reactor_option('newspage_slider_category', ''); ?>

<?php get_header(); ?>

	<div id="primary" class="content-area">

        <main id="main" class="site-main" role="main">
        	<div class="row">
                <div class="<?php reactor_columns(); ?>">

                    <?php // slider function passing category from options and id
					reactor_slider( array('category' => $slider_category, 'slider_id' => 'slider-news-page') ); ?>

					<?php // get the page loop
                    get_template_part('loops/loop', 'page'); ?>

					<?php // get the news page loop
					get_template_part('loops/loop', 'newspage'); ?>

                </div><!-- .columns -->

                <?php get_sidebar(); ?>

            </div><!-- .row -->
        </main><!-- #main -->

	</div><!-- #primary -->

<?php get_footer(); ?>