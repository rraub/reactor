<?php
/**
 * Reactor Columns
 * a function to set grid columns based on selected layout
 * can also pass a set number of columns to the function
 *
 * @package Reactor
 * @author Anthony Wilhelm (@awshout / anthonywilhelm.com)
 * @since 1.0.0
 * @license GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 */

function reactor_columns( $args = '' ) {

	if ( !is_array( $args ) && is_int( $args ) ) {
		echo 'large-' . $args . ' medium-' . $args . ' small-12 columns';
		return;
	} else {
		$defaults = array(
			'columns'    => '',
			'echo'       => true,
			'sidebar'    => false,
			'sidebar_id' => null,
			'push_pull'  => ''
		);
		$args = wp_parse_args( $args, $defaults );
		$args = apply_filters( 'reactor_columns_args', $args );
	}

	// add push/pull columns
	$pushpull = '';
	if ( $args['push_pull'] && is_array( $args['push_pull'] ) ) {
		$large_pushpull = ( isset( $args['push_pull'][0] ) && $args['push_pull'][0] > 0 ) ? ' large-push-' . intval( $args['push_pull'][0] ) : '';
		$medium_pushpull = ( isset( $args['push_pull'][1] ) && $args['push_pull'][1] > 0 ) ? ' medium-push-' . intval( $args['push_pull'][1] ) : '';
		$small_pushpull = ( isset( $args['push_pull'][2] ) && $args['push_pull'][2] > 0 ) ? ' small-push-' . intval( $args['push_pull'][2] ) : '';

		$large_pushpull = ( isset( $args['push_pull'][0] ) && $args['push_pull'][0] < 0 ) ? ' large-pull-' . intval( $args['push_pull'][0] ) : '';
		$medium_pushpull = ( isset( $args['push_pull'][1] ) && $args['push_pull'][1] < 0 ) ? ' medium-pull-' . intval( $args['push_pull'][1] ) : '';
		$small_pushpull = ( isset( $args['push_pull'][2] ) && $args['push_pull'][2] < 0 ) ? ' small-pull-' . intval( $args['push_pull'][2] ) : '';

		$pushpull = $large_pushpull . $medium_pushpull . $small_pushpull;
	} 
	elseif ( $args['push_pull'] && !is_array( $args['push_pull'] ) ) {
		if ( $args['push_pull'] > 0 ) {
			$pushpull = ' large-push-' . intval( $args['push_pull'] ) . ' medium-push-' . intval( $args['push_pull'] );
		} elseif ( $args['push_pull'] < 0 ) {
			$pushpull = ' large-pull-' . intval( abs( $args['push_pull'] ) ) . ' medium-pull-' . intval( abs( $args['push_pull'] ) );
		}
	}

	// if array of 2 numbers is passed to the function
	if ( $args['columns'] && is_array( $args['columns'] ) ) {
		$large = ( isset( $args['columns'][0] ) ) ? ' large-' . intval( $args['columns'][0] ) : '';
		$medium = ( isset( $args['columns'][1] ) ) ? ' medium-' . intval( $args['columns'][1] ) : '';
		$small = ( isset( $args['columns'][2] ) ) ? ' small-' . intval( $args['columns'][2] ) : '';

		echo $large . $medium . $small . $pushpull . ' columns';
		return;
	}
	// if just a number is passed to the function
	elseif ( $args['columns'] && !is_array( $args['columns'] ) ) {
		echo 'large-' . intval( $args['columns'] ) . ' medium-' . intval( $args['columns'] ) . ' small-12' . $pushpull . ' columns';
		return;
	}

	// get the template layout from meta
	$default = reactor_option('page_layout', '2c-l');
	$layout = reactor_option('', $default, '_template_layout');

	if ( is_page_template('page-templates/template-side-nav.php') ) {
		$layout = 'side-nav';
	}

	// check if tumblog icons are used in blog
	$tumblog = reactor_option('tumblog_icons', false);
	$classes = array();
	
	// else check if columns are for a sidebar
	if ( true == $args['sidebar'] ) {

		// sidebar columns based on layout
		switch ( $layout ) {
			case '1c':
				$classes[] = '';
				break;
			case '3c-l':
			case '3c-r':
			case '3c-c':
				$classes[] = 'large-3';
				$classes[] = 'medium-3';
				break;
			case 'side-nav':
			default:
				// 4 is the default number of columns for 1 sidebar
				$classes[] = 'large-3';
				$classes[] = 'medium-4';
				break;
		}

		// pull the content above left sidebar on small screens
		if ( '3c-r' == $layout ) {
			$classes[] = 'large-pull-6';
			$classes[] = 'medium-pull-6';
		}
		elseif ( '3c-c' == $layout && 1 == $args['sidebar_id'] ) {
			$classes[] = 'large-pull-6';
			$classes[] = 'medium-pull-6';
		}
		elseif ( '2c-r' == $layout ) {
			$classes[] = 'large-pull-9';
			$classes[] = 'medium-pull-8';
		}

	// else apply columns based on template layout or meta
	} else {

		// number of columns for main content based on layout
		switch ( $layout ) {
			case '1c':
				// subtract 1 and offset by 1 if using tumblog icons
				if ( $tumblog && is_home() ) {
					$classes[] = 'large-11';
					$classes[] = 'medium-11';
					$classes[] = 'large-offset-1';
				} else {
					$classes[] = 'large-12';
					$classes[] = 'medium-12';
				}
				break;
			case '3c-l':
			case '3c-r':
			case '3c-c':
				// subtract 1 and offset by 1 if using tumblog icons
				if ( $tumblog && is_home() ) {
					$classes[] = 'large-5';
					$classes[] = 'medium-5';
					$classes[] = 'large-offset-1';
					$classes[] = 'medium-offset-1';
				} else {
					$classes[] = 'large-6';
					$classes[] = 'medium-6';
				}
				break;
			case 'side-nav':	
			default:
				/* 8 is the default number of columns for a page with 1 sidebar
				subtract 1 and offset by 1 if using tumblog icons */
				if ( $tumblog && is_home() ) {
					$classes[] = 'large-8';
					$classes[] = 'medium-7';
					$classes[] = 'large-offset-1';
					$classes[] = 'medium-offset-1';
				} else {
					$classes[] = 'large-9';
					$classes[] = 'medium-8';
				}
				break;
		}

		// push columns for left sidebars
		switch ( $layout ) {
			case '3c-r':
				$classes[] = 'large-push-6';
				$classes[] = 'medium-push-6';
				break;
			case '3c-c':
				$classes[] = 'large-push-3';
				$classes[] = 'medium-push-3';
				break;
			case '2c-r':
				$classes[] = 'large-push-3';
				$classes[] = 'medium-push-4';
				break;
		}
	}

	//always add the columns class
	$classes[] = 'columns';

	// remove empty values
	$classes = array_filter( $classes );

	// add spaces
	$columns = implode( ' ', array_map( 'esc_attr', $classes ) );

	// echo classes unless echo false
	if ( $args['echo'] ) {
		echo apply_filters('reactor_content_cols', $columns);
	} else {
		return apply_filters('reactor_content_cols', $columns);
	}
}