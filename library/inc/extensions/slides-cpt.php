<?php
/**
 * Slides Custom Post Type and custom taxonomy
 *
 * @package Reactor
 * @author Anthony Wilhelm (@awshout / anthonywilhelm.com)
 * @author Eddie Machado (@eddiemachado / themeble.com/bones)
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/register_post_type#Example
 * @license GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 */

add_action('after_setup_theme', 'reactor_register_post_types', 16);

function reactor_register_post_types() {
	if ( current_theme_supports('reactor-orbit-slider') ) {

		/**
		 * Register slide post type
		 * Do not use before init
		 *
		 * @see register_post_type
		 * @since 1.0.0
		 */
		function reactor_slide_register() {
			$labels = array(
				'name'               => __('Slideshow', 'reactor'),
				'singular_name'      => __('Slide', 'reactor'),
				'add_new'            => __('Add New', 'reactor'),
				'add_new_item'       => __('Add New Slide', 'reactor'),
				'edit_item'          => __('Edit Slide', 'reactor'),
				'new_item'           => __('New Slide', 'reactor'),
				'all_items'          => __('All Slides', 'reactor'),
				'view_item'          => __('View Slide', 'reactor'),
				'search_items'       => __('Search Slides', 'reactor'),
				'not_found'          => __('Nothing found', 'reactor'),
				'not_found_in_trash' => __('Nothing found in Trash', 'reactor'),
				'parent_item_colon'  => '',
				'menu_name'          => __('Slides', 'reactor')
			 );

			$args = array(
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'menu_icon'          => get_template_directory_uri() . '/library/img/admin/admin-slides.png',
				'rewrite'	         => true,
				'capability_type'    => 'post',
				'taxonomies'         => array('slide-category'),
				'has_archive'        => false,
				'hierarchical'       => true,
				'menu_position'      => 7,
					'rewrite'    => array(
					'slug'       => __('slideshow-post', 'reactor'),
					'with_front' => false,
					'feed'       => true,
					'pages'      => true ),
				'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes')
			  );
			register_post_type('slide' , $args );
		}
		add_action('init', 'reactor_slide_register');

		/**
		 * Create slide taxonomies
		 * Do not use before init
		 *
		 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
		 * @see register_taxonomy
		 * @since 1.0.0
		 */
		function reactor_slide_taxonomies() {
			// Add new taxonomy, make it hierarchical ( like categories )
			$labels = array(
				'name'              => __('Slide Categories', 'reactor'),
				'singular_name'     => __('Slide Category', 'reactor'),
				'search_items'      => __('Search Slide Categories', 'reactor'),
				'all_items'         => __('All Slide Categories', 'reactor'),
				'parent_item'       => __('Parent Slide Category', 'reactor'),
				'parent_item_colon' => __('Parent Slide Category:', 'reactor'),
				'edit_item'         => __('Edit Slide Category', 'reactor'),
				'update_item'       => __('Update Slide Category', 'reactor'),
				'add_new_item'      => __('Add New Slide Category', 'reactor'),
				'new_item_name'     => __('New Slide Category Name', 'reactor'),
				'menu_name'         => __('Categories', 'reactor'),
		 	);

			register_taxonomy('slide-category', array('slide'),
			array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
			  ));
		}
		add_action('init', 'reactor_slide_taxonomies', 0);
	}

}