<?php
/**
 * The template for displaying 404 pages
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
                <div class="<?php reactor_columns(12); ?>">

                    <article id="post-0" class="post error404 no-results not-found">
                        <header class="entry-header">
                            <h1 class="entry-title"><?php _e('This is somewhat embarrassing, isn&rsquo;t it?', 'reactor'); ?></h1>
                        </header>

                        <div class="entry-content panel">
                            <p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching will help.', 'reactor'); ?></p>
                            <?php get_search_form(); ?>
                        </div><!-- .entry-content -->
                    </article><!-- #post-0 -->

                </div><!-- .columns -->

            </div><!-- .row -->
        </main><!-- #main -->

	</div><!-- #primary -->

<?php get_footer(); ?>