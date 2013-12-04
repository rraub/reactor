<?php
/**
 * The template for displaying the footer
 *
 * @package Reactor
 * @subpackge Templates
 * @since 1.0.0
 */
?>
		<?php
		if ( current_theme_supports('reactor-breadcrumbs')
		&& reactor_option('breadcrumbs', 1) ) : ?>
		<div id="breadcrumbs">
			<div class="row">
				<div class="<?php reactor_columns( 12 ); ?>">
					<?php reactor_breadcrumbs(); ?>
				</div><!-- .columns -->
			</div><!-- .row -->
		</div><!-- #breadcrumbs -->
    	<?php endif; ?>

        <footer id="footer" class="site-footer">
			<div class="row">
				<div class="<?php reactor_columns( 12 ); ?>">

						<?php get_sidebar('footer'); ?>

				</div><!-- .columns -->
			</div><!-- .row -->

			<div class="site-info">
				<div class="row">
					<div class="<?php reactor_columns( 6 ); ?>">

					<?php if ( function_exists('reactor_footer_links') ) : ?>
						<nav class="footer-links" role="navigation">
							<?php reactor_footer_links(); ?>
						</nav><!-- #footer-links -->
					<?php endif; ?>

					</div><!--.columns -->

					<div class="<?php reactor_columns( 6 ); ?>">

						<div id="colophon" class="content-info"  role="contentinfo">
							<?php if ( reactor_option('footer_siteinfo') ) : echo reactor_option('footer_siteinfo'); else : ?>
							<p><span class="copyright">&copy;<?php echo date_i18n('Y'); ?> <?php bloginfo('name'); ?> | </span>
							<span class="site-source"><?php _e('Powered by ', 'reactor'); ?><a href="<?php echo esc_url('http://wordpress.org/'); ?>" title="<?php esc_attr_e('Personal Publishing Platform', 'reactor'); ?>">WordPress</a> &amp; <a href="<?php echo esc_url('http://awtheme.com/') ?>" title="<?php esc_attr_e('WordPress Parent Theme', 'reactor'); ?>">Reactor</a></span></p>
							<?php endif; ?>
						</div><!-- #colophon -->

					</div><!-- .columns -->
				</div><!-- .row -->
			</div><!-- .site-info -->
        </footer><!-- #footer -->

    </div><!-- #content -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>