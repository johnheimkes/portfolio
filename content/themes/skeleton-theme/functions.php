<?php
/**
 * TheIV Theme
 *
 * @category   TheIV_Theme
 * @package    TheIV_Theme
 * @subpackage Functions
 * @author     John Heimkes IV <john@markupisart.com>
 * @version    $Id$
 */

/**
 * Includes
 */
include_once 'modules/register-post-types.php';
include_once 'modules/register-taxonomies.php';

/**
 * Widget Includes
 */
include_once 'widgets/skeleton-widget.php';

/**
 * Theme Supports
 */
add_theme_support('post-thumbnails');
add_theme_support('custom-background');
add_theme_support('custom-header');

/**
 * Constants
 */
define('DISALLOW_FILE_EDIT', true); // because we don't want the client to modify files directly on server.
define('THEIV_THEME_PATH_URL', get_template_directory_uri() . '/');

add_action('wp_enqueue_scripts', 'theivEnqueueScripts');
add_action('wp_enqueue_scripts', 'theivEnqueueStyles');

/**
 * Register & enqueue all Javascript files for the theme.
 *
 * @return void
 */
function theivEnqueueScripts()
{
    // Global script
    wp_register_script(
        'global',
        THEIV_THEME_PATH_URL . 'assets/scripts/global.js',
        array('jquery'),
        '1.0',
        true
    );

    wp_enqueue_script('global');

    // Comment reply script for threaded comments (registered in WP core)
    if (is_singular() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

/**
 * Register & enqueue all stylesheets for the theme. /style.css is not used.
 *
 * @return void
 */
function theivEnqueueStyles()
{
    global $wp_styles;

    // Reset Stylesheet
    wp_register_style(
        'reset',
        THEIV_THEME_PATH_URL . 'assets/styles/reset.css',
        false,
        '1.0',
        'screen, projection'
    );

    // Primary Screen Stylesheet
    wp_register_style(
        'screen',
        THEIV_THEME_PATH_URL . 'assets/styles/screen.css',
        array('reset'),
        '1.0',
        'screen, projection'
    );
    
    // WYSIWYG Stylesheet
    wp_register_style(
        'wysiwyg',
        THEIV_THEME_PATH_URL . 'assets/styles/wysiwyg.css',
        array('reset'),
        '1.0',
        'screen, projection'
    );

    // Print Stylesheet
    wp_register_style(
        'print',
        THEIV_THEME_PATH_URL . 'assets/styles/print.css',
        array('reset'),
        '1.0',
        'print'
    );

    // IE 9 Stylesheet
    wp_register_style(
        'ie9',
        THEIV_THEME_PATH_URL . 'assets/styles/ie9.css',
        array('screen'),
        '1.0',
        'screen, projection'
    );

    // IE 8 Stylesheet
    wp_register_style(
        'ie8',
        THEIV_THEME_PATH_URL . 'assets/styles/ie8.css',
        array('screen'),
        '1.0',
        'screen, projection'
    );

    // IE 7 Stylesheet
    wp_register_style(
        'ie7',
        THEIV_THEME_PATH_URL . 'assets/styles/ie7.css',
        array('screen'),
        '1.0',
        'screen, projection'
    );

    // Conditional statements for IE stylesheets
    $wp_styles->add_data('ie9', 'conditional', 'lte IE 9');
    $wp_styles->add_data('ie8', 'conditional', 'lte IE 8');
    $wp_styles->add_data('ie7', 'conditional', 'lte IE 7');

    // Queue the stylesheets. Note that because screen was registered
    // with reset as a dependency, it does not need to be enqueued here.
    wp_enqueue_style('screen');
    wp_enqueue_style('wysiwyg');
    wp_enqueue_style('print');
    wp_enqueue_style('ie9');
    wp_enqueue_style('ie8');
    wp_enqueue_style('ie7');
}
