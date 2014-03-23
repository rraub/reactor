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

    <section id="side-nav-page" class="row">
		<div id="side-nav" class="<?php reactor_columns( array('sidebar' => true) ); ?>">
            <?php reactor_side_nav(); ?>
        </div><!-- #side-menu -->

        <div class="<?php reactor_columns(); ?>">

            <?php // get the page loop
            get_template_part('loops/loop', 'page'); ?>

        </div><!-- .columns -->
        
    </section><!-- #side-nav-page.row -->

<?php get_footer(); ?>
