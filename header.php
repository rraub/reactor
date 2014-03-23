<?php
/**
 * The template for displaying the header
 *
 * @package Reactor
 * @subpackge Templates
 * @since 1.0.0
 */?><!DOCTYPE html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title('|', true, 'right'); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <!-- WordPress head -->
        <?php wp_head(); ?>
        <!-- end WordPress head -->
    </head>

    <body <?php body_class(); ?>>

        <?php
        if ( has_nav_menu('top-bar-l') || has_nav_menu('top-bar-r') ) {
            $topbar_args = array(
                'title'     => reactor_option('topbar_title', get_bloginfo('name')),
                'title_url' => reactor_option('topbar_title_url', home_url()),
                'fixed'     => reactor_option('topbar_fixed', 0),
                'contained' => reactor_option('topbar_contain', 1),
            );
            echo reactor_top_bar( $topbar_args );
        } ?>

        <header id="header" class="site-header">
            <div class="row">
                <div class="<?php reactor_columns( 12 ); ?> site-branding">

                    <?php if ( reactor_option('logo_image') ) : ?>
                    <div class="site-logo">
                        <a href="<?php echo esc_url( home_url('/') ); ?>" title="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>" rel="home">
                            <img src="<?php echo reactor_option('logo_image') ?>" alt="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?> logo">
                        </a>
                    </div><!-- .site-logo -->
                    <?php endif; // end if logo ?>
                    <div class="title-area">
                        <p class="site-title"><a href="<?php echo esc_url( home_url('/') ); ?>" title="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                        <p class="site-description"><?php bloginfo('description'); ?></p>
                    </div>

                </div><!-- .columns -->
            </div><!-- .row -->
        </header><!-- #header -->

        <main id="content" class="site-content" role="main">