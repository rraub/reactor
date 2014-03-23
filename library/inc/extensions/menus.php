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

	if ( in_array( 'side-nav', $menus[0] ) ) {
		register_nav_menu('side-nav', __( 'Side Nav', 'reactor'));
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
function reactor_top_bar_l( $args = '' ) {
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
	$args = wp_parse_args( $args, $defaults );
	$args = apply_filters( 'reactor_top_bar_l', $args );

	return wp_nav_menu( $args );
}

/**
 * Top bar right menu
 *
 * @since 1.0.0
 * @see wp_nav_menu
 * @param array $locations Associative array of menu location identifiers (like a slug) and descriptive text.
 */
function reactor_top_bar_r( $args = '' ) {
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
	$args = wp_parse_args( $args, $defaults );
	$args = apply_filters( 'reactor_top_bar_r', $args );

	return wp_nav_menu( $args );
}

/**
 * Side Nav
 *
 * @since 2.0.0
 * @see wp_nav_menu
 * @param array $locations Associative array of menu location identifiers (like a slug) and descriptive text.
 */
function reactor_side_nav( $args = '' ) {
	$defaults = array(
		'theme_location'  => 'side-nav',
		'container'       => 'nav',
		'container_class' => 'side-nav-container',
		'menu_class'      => 'side-nav',
		'echo'            => true,
		'fallback_cb'     => false,
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 0,
		'walker'          => new Side_Nav_Walker()
	 );
	$args = wp_parse_args( $args, $defaults );
	$args = apply_filters( 'reactor_side_nav', $args );

	return wp_nav_menu( $args );
}

/**
 * Footer menu
 *
 * @since 1.0.0
 * @see wp_nav_menu
 * @param array $locations Associative array of menu location identifiers (like a slug) and descriptive text.
 */
function reactor_footer_links( $args = '' ) {
	$defaults = array(
		'theme_location'  => 'footer-links',
		'container'       => false,
		'menu_class'      => 'inline-list',
		'echo'            => true,
		'fallback_cb'     => false,
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 1,
	);
	$args = wp_parse_args( $args, $defaults );
	$args = apply_filters( 'reactor_footer_links', $args );

	return wp_nav_menu( $args );
}