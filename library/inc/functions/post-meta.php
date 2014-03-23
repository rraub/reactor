<?php 
/**
 * Reactor Post Meta
 *
 * @package Reactor
 * @author Anthony Wilhelm (@awshout / anthonywilhelm.com)
 * @since 1.0.0
 * @credit TewentyTwelve Theme
 * @usees $post
 * @param $args Optional. Override defaults.
 * @license GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 */

/**
 * Meta information for current post: cats, tags, author, and date
 */
if ( !function_exists('reactor_post_meta') ) {
	function reactor_post_meta( $args = '' ) {
		
		do_action('reactor_post_meta', $args);
		
		global $post; $meta = '';
		
		$defaults = array(
			'include'       => array('author', 'date', 'categories', 'tags'),
			'exclude'       => array(),
			'show_icons'    => false,
			'uncategorized' => false,
			'echo'          => true,
		);
        $args = wp_parse_args( $args, $defaults );
		
		// cats
		$count = 0;
		$categories = '';
		$cats = get_the_category();			
		foreach ( $cats as $cat ) {
			$count++;
			if ( $args['uncategorized'] ) {
				$categories .= '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '" ';
				$categories .= 'title="' . esc_attr( __('View all posts in ', 'reactor') . $cat->name ) . '">' . $cat->name . '</a>';
				if ( $count != count( $cats ) ){
					$categories .= ', ';
				}
			} else {
				if ( $cat->slug != 'uncategorized' || $cat->name != 'Uncategorized' ) {
					$categories .= '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '" ';
					$categories .= 'title="' . esc_attr( __('View all posts in ', 'reactor') . $cat->name ) . '">' . $cat->name . '</a>';
					if ( $count != count( $cats ) ){
						$categories .= ', ';
					}
				}
			}
		}
		
		// Tags
		$tags = get_the_tag_list( '', ', ', '' );
	
		// Date
		$date  = '<a href="' . esc_url( get_month_link( get_the_time('Y'), get_the_time('m') ) ) . '" ';
		$date .= '"title="' .  esc_attr( __('View all posts from ', 'reactor') . get_the_time('M') . ' ' . get_the_time('Y') ) . '" rel="bookmark">';
		$date .= '<time class="entry-date datetime="' . esc_attr( get_the_date('c') ) . '" pubdate>' . esc_html( get_the_date() ) . '</time></a>';
	
		// Author
		$author  = '<a class="author" href="' . esc_url( get_author_posts_url( get_the_author_meta('ID') ) ) . '" ';
		$author .= 'title="' . esc_attr( __('View all posts by ', 'reactor') . get_the_author() ) . '" rel="author">';
		$author .= get_the_author() . '</a>';

		$include = (array)$args['include'];
		$exclude = (array)$args['exclude'];
		if( in_array( 'date', $include ) && !in_array( 'date', $exclude ) ) {
			$meta .= ( $args['show_icons'] ) ? '<i class="fi-calendar"></i> ' : __('Posted', 'reactor');
			$meta .= ' ' . $date . ' ';
		}
		if( in_array( 'author', $include ) && !in_array( 'author', $exclude ) ) {
			$meta .= ( $args['show_icons'] ) ? '<i class="fi-torso"></i> ' : __('by', 'reactor');
			$meta .= ' ' . $author  . ' ';
		}
		if( in_array( 'categories', $include ) && !in_array( 'categories', $exclude ) ) {
			if( $categories ) {
				$meta .= ( $args['show_icons'] ) ? '<i class="fi-folder"></i> ' : __('in', 'reactor');
				$meta .= ' ' . $categories  . ' ';
			}
		}
		if( in_array( 'tags', $include ) && !in_array( 'tags', $exclude ) ) {
			if( $tags ) {
				$meta .= '<div class="entry-tags">';
				$meta .= ( $args['show_icons'] ) ? '<i class="fi-price-tag"></i> ' : __('Tags:', 'reactor');
				$meta .= ' ' . $tags . '</div>';
			}
		}

		if( $args['echo'] ) {
			echo apply_filters('reactor_post_meta', $meta, $defaults);
		} else {
			return apply_filters('reactor_post_meta', $meta, $defaults);
		}
	}
}