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

    <section id="page" class="row">
        <div class="<?php reactor_columns(); ?>">

			<?php // get the page loop
            get_template_part('loops/loop', 'page'); ?>

        </div><!-- .columns -->

        <?php get_sidebar(); ?>

    </section><!-- #page.row -->

<?php get_footer(); ?>