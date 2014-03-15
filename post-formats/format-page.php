<?php
/**
 * The template for displaying page content
 *
 * @package Reactor
 * @subpackage Post-Formats
 * @since 1.0.0
 */
?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-body">

                <?php
            	if ( !is_page_template('page-templates/template-front-page.php')
                && !is_page_template('page-templates/template-news-page.php') ) : ?>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header><!-- .entry-header -->
                <?php endif; ?>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div><!-- .entry-content -->

                <footer class="entry-footer">
                    <?php
					if ( !is_page_template() ) {
                        wp_link_pages( array('before' => '<div class="page-links">' . __('Pages:', 'reactor'), 'after' => '</div>') );
                    }
                    edit_post_link( __('Edit', 'reactor'), '<div class="edit-link"><span>', '</span></div>');
                    ?>
                </footer><!-- .entry-footer -->

            </div><!-- .entry-body -->
        </article><!-- #post -->