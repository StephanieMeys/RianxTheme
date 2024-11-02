<?php 
/**
 * Bootstraps the theme.
 * 
 * @package rianxtheme
 */

 namespace RIANX_THEME\Inc;
 use RIANX_THEME\Inc\Traits\Singleton;

 class RIANX_THEME {
    use Singleton;

    protected function __construct() {
        // load class.

        Assets::get_instance();
        Menus::get_instance();

        $this -> setup_hooks();

    }

    protected function setup_hooks() {
        
        /**
         * Actions.
         */
        add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );
    }

    public function setup_theme() {
        add_theme_support( 'title-tag' );

        add_theme_support( 'custom-logo', [
            'header-text'           => [ 'site-title', 'site-description' ],
            'height'                => 100,
            'width'                 => 400,
            'flex-height'           => true,
            'flex-width'            => true,
            'unlink-homepage-logo'  => false, 
        ] );

        //? Add background on the hole website 
        add_theme_support( 'custom-background', [
            'default-color' => '#fff',
            'default-image' => '',
            'default-repeat'=> 'no-repeat',
        ] );

        //? Features image on posts 
        add_theme_support( 'post-thumbnails' );

        add_theme_support( 'custom-selective-refresh-widgets' );

        add_theme_support( 'automatic-feed-links' );

        add_theme_support( 
            'html5',
            [
                'search-form',
                'comment-form',
                'commend-list',
                'gallery',
                'caption',
                'script',
                'style',
            ]
        );

        //? Gutenberg style editor
        add_editor_style();

        add_theme_support( 'wp-block-styles' );
        add_theme_support( 'align-wide' );

        global $content_width;
        if ( !isset($content_width) ) {
            $content_width = 1240;
        }
    }
 }