<?php
/**
 * Template Name: Front Page
 *
 * @package Reactor
 * @subpackge Page-Templates
 * @since 1.0.0
 */
?>

<?php // get the options
$slider_category = reactor_option('frontpage_slider_category', '');
$post_columns = reactor_option('frontpage_post_columns', 3); ?>

<?php get_header(); ?>

	<div id="primary" class="content-area">

        <section id="slider" class="home-slider">
        	<div class="">
		        <?php // slider function passing category from options
				reactor_slider( array(
					'category'     => $slider_category,
					'slider_id'    => 'slider-front-page',
					'data_options' => array(
						'animation'       => 'slide',
						'slide_number'    => 'false',
						'pause_on_hover'  => 'false',
						),
					)
				); ?>
			</div>
        </section><!-- #slider -->

        <main id="main" class="site-main" role="main">
        	<div class="row">
                <div class="<?php reactor_columns(); ?>">

					<?php // get the page loop
                    get_template_part('loops/loop', 'page'); ?>

					<?php // get the main loop
					if ( $post_columns > 0 ) { get_template_part('loops/loop', 'frontpage'); } ?>

                </div><!-- .columns -->

				<?php get_sidebar('frontpage'); ?>
            </div><!-- .row -->
        </main><!-- #main -->

	</div><!-- #primary -->

<?php get_footer(); ?>
