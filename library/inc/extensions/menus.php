<?php
/**
 * Register Menus
 * register menus in WordPress
 * creates menu functions for use in theme
 *
 * @package Reactor
 * @author Anthony Wilhelm (@awshout / anthonywilhelm.com)
 * @author Eddie Machado (@eddiemachado / themeble.com/bones)
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/wp_nav_menu
 * @license GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 */
add_action('init', 'reactor_register_menus');

function reactor_register_menus() {

    /**
	 * Register navigation menus for a theme.
	 *
	 * @since 1.0.0
	 * @param array $locations Associative array of menu location identifiers (like a slug) and descriptive text.
	 */
	$menus = get_theme_support( 'reactor-menus' );

	if ( !is_array( $menus[0] ) ) {
		return;
	}

	if ( in_array('top-bar-l', $menus[0] ) ) {
		register_nav_menu('top-bar-l', __( 'Top Bar Left', 'reactor'));
	}

	if ( in_array( 'top-bar-r', $menus[0] ) ) {
		register_nav_menu('top-bar-r', __( 'Top Bar Right', 'reactor'));
	}

	if ( in_array( 'footer-links', $menus[0] ) ) {
		register_nav_menu('footer-links', __( 'Footer Links', 'reactor'));
	}

}

/**
 * Top bar left menu
 *
 * @since 1.0.0
 * @see wp_nav_menu
 * @param array $locations Associative array of menu location identifiers (like a slug) and descriptive text.
 */
if ( !function_exists('reactor_top_bar_l') ) {
	function reactor_top_bar_l() {
		$defaults = array(
			'theme_location'  => 'top-bar-l',
			'container'       => false,
			'menu_class'      => 'top-bar-menu left',
			'echo'            => 0,
			'fallback_cb'     => false,
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'           => 0,
			'walker'          => new Top_Bar_Walker()
		 );
		return wp_nav_menu( $defaults );
	}
}

/**
 * Top bar right menu
 *
 * @since 1.0.0
 * @see wp_nav_menu
 * @param array $locations Associative array of menu location identifiers (like a slug) and descriptive text.
 */
if ( !function_exists('reactor_top_bar_r') ) {
	function reactor_top_bar_r() {
		$defaults = array(
			'theme_location'  => 'top-bar-r',
			'container'       => false,
			'menu_class'      => 'top-bar-menu right',
			'echo'            => 0,
			'fallback_cb'     => false,
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'           => 0,
			'walker'          => new Top_Bar_Walker()
		 );
		return wp_nav_menu( $defaults );
	}
}

/**
 * Footer menu
 *
 * @since 1.0.0
 * @see wp_nav_menu
 * @param array $locations Associative array of menu location identifiers (like a slug) and descriptive text.
 */
if ( !function_exists('reactor_footer_links') ) {
	function reactor_footer_links() {
		$defaults = array(
			'theme_location'  => 'footer-links',
			'container'       => false,
			'menu_class'      => 'inline-list',
			'echo'            => true,
			'fallback_cb'     => false,
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'           => 1,
		 );
		wp_nav_menu( $defaults );
	}
}

/**
 * Side Menu
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_list_pages
 * @credit wearerequired http://required.ch/
 * @since 1.2.0
 */
if ( !function_exists('reactor_side_nav') ) {
	function reactor_side_nav( $nav_args = '' ) {
		global $post;

		// default args
		$defaults = array(
			'show_home' => true,
			'home_text' => __( '&larr; Home', 'reactor' ),
			'before'	=> '<ul class="side-nav">',
			'after'		=> '</ul>',
		);
		$nav_args = apply_filters( 'reactor_side_menu', wp_parse_args( $nav_args, $defaults ) );

		// wp_list_pages args
		$args = array(
			'title_li' 	  => '',
			'depth'		  => 1,
			'sort_column' => 'menu_order',
			'echo'		  => 0,
		);

		// setup the page list based on ancestor id or post id
		if ( $post->post_parent ) {
			$ancestors = get_post_ancestors($post->ID);
			$root = count($ancestors)-1;
			$args['child_of'] = $ancestors[$root];
		} else {
			$args['child_of'] = $post->ID;
		}

		// generate the page list
		$children = wp_list_pages( $args );

		// add the home link if args is true and using side nav
		if ( $nav_args['show_home'] == true ) {
			$nav_args['before'] .= '<li><a href="' . get_home_url() . '">' . $nav_args['home_text'] . '</a></li><li class="divider"></li>';
		}

		// display the menu if there are subpages
		if ( $children ) {

			$output = $nav_args['before'] . $children . $nav_args['after'];

			echo $output;
		}
	}
}