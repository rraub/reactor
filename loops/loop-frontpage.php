<?php
/**
 * The loop for displaying posts on the front page template
 *
 * @package Reactor
 * @subpackage loops
 * @since 1.0.0
 */
?>

<?php // get the options
$post_category = reactor_option('frontpage_post_category', '');
if ( -1 == $post_category ) { $post_category = ''; } // fix customizer -1
$number_posts = reactor_option('frontpage_number_posts', 3);
$post_columns = reactor_option('frontpage_post_columns', 3);
$page_links = reactor_option('frontpage_page_links', 0);
$pagination_type = reactor_option('page_links', 'numbered'); ?>

					<?php // start the loop
					$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                    $args = array(
						'post_type'           => 'post',
						'cat'                 => $post_category,
						'posts_per_page'      => $number_posts,
						'ignore_sticky_posts' => 1,
						'paged'               => $paged );

					global $frontpage_query;
                    $frontpage_query = new WP_Query( $args ); ?>

				    <?php if ( $frontpage_query->have_posts() ) : ?>

                        <?php // if more than one column use block-grid
						if ( $post_columns != 1 ) echo '<ul class="multi-column large-block-grid-' . $post_columns . '">'; ?>

                            <?php while ( $frontpage_query->have_posts() ) : $frontpage_query->the_post(); global $more; $more = 0; ?>

								<?php if ( $post_columns != 1 ) echo '<li>'; ?>

                                    <?php // display frontpage post format
									get_template_part('post-formats/format', 'standard'); ?>

								<?php if ( $post_columns != 1 ) echo '</li>'; ?>

                            <?php endwhile; // end of the loop ?>

						<?php if ( $post_columns != 1 ) echo '</ul>'; // close the block-grid ?>

                    	<?php
						if ( $page_links && current_theme_supports('reactor-page-links') ) {
							reactor_page_links( array('query' => 'frontpage_query', 'type' => $pagination_type) );
						} ?>

                    <?php // if no posts are found
					else : get_template_part('post-formats/format', 'none'); ?>

                    <?php endif; // end have_posts() check ?>