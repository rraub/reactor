<?php
/**
 * The default template file
 *
 * @package Reactor
 * @subpackge Templates
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

    <section id="index-page" class="row">
        <div class="<?php reactor_columns(); ?>">

    		<?php // get the main loop
    		get_template_part('loops/loop', 'index'); ?>

        </div><!-- .columns -->

        <?php get_sidebar(); ?>

    </section><!-- #index-page.row -->

<?php get_footer(); ?>