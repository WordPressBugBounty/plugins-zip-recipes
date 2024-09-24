<?php

/*
    Plugin Name: Zip Recipes Lover
    Text Domain: zip-recipes
    Domain Path: /languages
    Plugin URI: https://ziprecipes.net/
    Plugin GitHub: https://github.com/really-simple-plugins/zip-recipes-free
    Description: A plugin that adds all the necessary microdata to your recipes, so they will show up in Google's Recipe Search
    Version: 8.2.6
    Author: Igor Benić
    Author URI: https://ibenic.com/
    License: GPLv3 or later
    Copyright 2020 Rogier Lankhorst
*/
/*
    Zip Recipes is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Zip Recipes Plugin is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Zip Recipes Plugin. If not, see <http://www.gnu.org/licenses/>.
*/
namespace ZRDN;

// Make sure we don't expose any info if called directly
defined( 'ABSPATH' ) or die( "Error! Cannot be called directly." );
if ( !function_exists( '\\ZRDN\\zr_fs' ) ) {
    // Create a helper function for easy SDK access.
    function zr_fs() {
        global $zr_fs;
        if ( !isset( $zr_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $zr_fs = fs_dynamic_init( array(
                'id'             => '14746',
                'slug'           => 'zip-recipes',
                'premium_slug'   => 'zip-recipes-lover',
                'type'           => 'plugin',
                'public_key'     => 'pk_8fce9733a1349d1c76abfbef87413',
                'is_premium'     => false,
                'premium_suffix' => 'Lover',
                'has_addons'     => false,
                'has_paid_plans' => true,
                'menu'           => array(
                    'slug'    => 'zrdn-recipes',
                    'support' => false,
                ),
                'is_live'        => true,
            ) );
        }
        return $zr_fs;
    }

    // Init Freemius.
    zr_fs();
    function zr_fs_custom_connect_message_on_update(
        $message,
        $user_first_name,
        $plugin_title,
        $user_login,
        $site_link,
        $freemius_link
    ) {
        return sprintf(
            __( 'Hey %1$s' ) . ',<br>' . __( 'Please help us improve %2$s! If you opt-in, some data about your usage of %2$s will be sent to %5$s. If you skip this, that\'s okay! %2$s will still work just fine.', 'zip-recipes' ),
            $user_first_name,
            '<b>' . $plugin_title . '</b>',
            '<b>' . $user_login . '</b>',
            $site_link,
            $freemius_link
        );
    }

    zr_fs()->add_filter(
        'connect_message_on_update',
        __NAMESPACE__ . '\\zr_fs_custom_connect_message_on_update',
        10,
        6
    );
    $old_edd_license = get_option( 'zrdn_license_key' );
    if ( $old_edd_license ) {
        zr_fs()->override_i18n( array(
            'activate-free-version' => __( "Continue using your old license", 'zip-recipes' ),
        ) );
    }
    // Signal that SDK was initiated.
    do_action( 'zr_fs_loaded' );
}
if ( !function_exists( __NAMESPACE__ . '\\zrdn_activation_check' ) ) {
    /**
     * Checks if the plugin can safely be activated, at least php 5.6 and wp 4.6
     * @since 7.0.0
     */
    function zrdn_activation_check() {
        if ( version_compare( PHP_VERSION, '7.2', '<' ) ) {
            deactivate_plugins( plugin_basename( __FILE__ ) );
            wp_die( __( 'Zip Recipes cannot be activated. The plugin requires PHP 7.2 or higher', 'zip-recipes' ) );
        }
        global $wp_version;
        if ( version_compare( $wp_version, '4.9', '<' ) ) {
            deactivate_plugins( plugin_basename( __FILE__ ) );
            wp_die( __( 'Zip Recipes cannot be activated. The plugin requires WordPress 4.9 or higher', 'zip-recipes' ) );
        }
        if ( file_exists( WP_CONTENT_DIR . DIRECTORY_SEPARATOR . 'plugins' . DIRECTORY_SEPARATOR . 'zip-recipes-premium' . DIRECTORY_SEPARATOR . 'zip-recipes-lover.php' ) ) {
            deactivate_plugins( 'zip-recipes-premium/zip-recipes-lover.php' );
        }
    }

    register_activation_hook( __FILE__, __NAMESPACE__ . '\\zrdn_activation_check' );
}
if ( defined( 'ZRDN_PLUGIN_BASENAME' ) ) {
    if ( defined( 'ZRDN_FREE' ) ) {
        deactivate_plugins( 'zip-recipes/zip-recipes.php' );
        //add_action('admin_notices', __NAMESPACE__ . '\zrdn_notice_free_active');
    } elseif ( defined( 'ZRDN_PRODUCT_ID' ) && ZRDN_PRODUCT_ID === 1851 ) {
        deactivate_plugins( 'zip-recipes-friend/zip-recipes-friend.php' );
        //add_action('admin_notices', __NAMESPACE__ . '\zrdn_notice_free_active');
    } elseif ( file_exists( WP_CONTENT_DIR . DIRECTORY_SEPARATOR . 'plugins' . DIRECTORY_SEPARATOR . 'zip-recipes-premium' . DIRECTORY_SEPARATOR . 'zip-recipes-lover.php' ) ) {
        deactivate_plugins( 'zip-recipes-premium/zip-recipes-lover.php' );
    } else {
        deactivate_plugins( 'zip-recipes-lover/zip-recipes-lover.php' );
    }
} else {
    define( 'ZRDN_PLUGIN_PRODUCT_URL', 'https://ziprecipes.net/downloads/zip-recipes-lover' );
    define( 'ZRDN_PLUGIN_PRODUCT_FILE', __FILE__ );
    define( 'ZRDN_PLUGIN_DIRECTORY_URL', plugin_dir_url( __FILE__ ) );
    define( 'ZRDN_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
    define( 'ZRDN_PLUGIN_URL', sprintf( '%s/%s/', plugins_url(), dirname( plugin_basename( __FILE__ ) ) ) );
    define( 'ZRDN_API_URL', "https://api.ziprecipes.net" );
    define( 'ZRDN_PATH', plugin_dir_path( __FILE__ ) );
    define( 'ZRDN_PLUGIN_PRODUCT_NAME', 'Zip Recipes Lover' );
    $debug = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? time() : '' );
    define( 'ZRDN_VERSION_NUM', '8.2.4' . $debug );
    if ( !defined( 'ZRDN_PREMIUM' ) ) {
        define( 'ZRDN_FREE', true );
    }
    add_action( 'plugins_loaded', __NAMESPACE__ . '\\init', 9 );
}
/**
 * --exclude=plugins/AutomaticNutrition*
 * --exclude=plugins/Authors*
 * --exclude=plugins/CustomTemplates*
 * --exclude=plugins/ImperialMetricsConverter*
 * --exclude=plugins/Import*
 * --exclude=plugins/Licensing*
 * --exclude=plugins/MostPopularRecipes*
 * --exclude=plugins/RecipeActions*
 * --exclude=plugins/RecipeReviews*
 * --exclude=plugins/RecipeSearch*
 * --exclude=plugins/ServingAdjustment*
 * --exclude=plugins/VisitorRating*
 * --exclude=plugins/_internal*
 * --exclude=*languages/zip-recipes*.po
 * --exclude=*languages/zip-recipes*.mo zip-recipes-lover/. zip-recipes/
 */
if ( !function_exists( __NAMESPACE__ . '\\init' ) ) {
    function init(  $className  ) {
        require_once ZRDN_PATH . '/models/Recipe.php';
        require_once ZRDN_PATH . '_inc/class.ziprecipes.util.php';
        require_once ZRDN_PATH . 'class.ziprecipes.php';
        require_once ZRDN_PATH . 'class-review.php';
        require_once ZRDN_PATH . '_inc/helper_functions.php';
        require_once ZRDN_PATH . '_inc/PluginBase.php';
        require_once ZRDN_PATH . 'RecipeTable/RecipeMenu.php';
        require_once ZRDN_PATH . 'NutritionLabel/NutritionLabel.php';
        require_once ZRDN_PATH . 'cron/cron.php';
        if ( is_admin() ) {
            require_once ZRDN_PATH . 'upgrade-zip.php';
            require_once ZRDN_PATH . 'grid/grid-enqueue.php';
            require_once ZRDN_PATH . 'class-field.php';
            require_once ZRDN_PATH . 'shepherd/tour.php';
        }
        /**
         * API endpoint & Basic Auth
         */
        require_once ZRDN_PATH . "controllers/Response.php";
        require_once ZRDN_PATH . "controllers/EndpointController.php";
        if ( !function_exists( 'is_plugin_active' ) ) {
            require_once ABSPATH . '/wp-admin/includes/plugin.php';
        }
        ZipRecipes::init();
    }

}
if ( !function_exists( __NAMESPACE__ . '\\zrdn_set_defaults' ) ) {
    register_activation_hook( __FILE__, __NAMESPACE__ . '\\zrdn_set_defaults' );
    /**
     * set defaults on activation
     */
    function zrdn_set_defaults() {
        if ( !get_option( 'zrdn_defaults_set' ) ) {
            //set some defaults
            $settings = get_option( 'zrdn_settings_general' );
            $zrdn_print['show_summary_on_archive_pages'] = true;
            update_option( 'zrdn_settings_general', $settings );
            update_option( 'zrdn_defaults_set', true );
        }
    }

}
if ( !function_exists( __NAMESPACE__ . '\\zrdn_check_translations' ) ) {
    register_activation_hook( __FILE__, __NAMESPACE__ . '\\zrdn_check_translations' );
    function zrdn_check_translations() {
        //dirname with levels does not exist before php 7
        if ( version_compare( PHP_VERSION, '7.0', '<' ) ) {
            return;
        }
        $path = dirname( ZRDN_PATH, 2 ) . "/languages/plugins/";
        if ( !file_exists( $path ) ) {
            return;
        }
        $extensions = array("po", "mo");
        if ( $handle = opendir( $path ) ) {
            while ( false !== ($file = readdir( $handle )) ) {
                if ( $file != "." && $file != ".." ) {
                    $file = $path . '/' . $file;
                    $ext = strtolower( pathinfo( $file, PATHINFO_EXTENSION ) );
                    if ( is_file( $file ) && in_array( $ext, $extensions ) && strpos( $file, 'zip-recipes' ) !== FALSE && strpos( $file, 'backup' ) === FALSE ) {
                        //copy to new file
                        $new_name = str_replace( 'zip-recipes', 'zip-recipes-backup', $file );
                        rename( $file, $new_name );
                    }
                }
            }
            closedir( $handle );
        }
    }

}
/**
 * Load iframe has to hook into admin init, otherwise languages are not loaded yet.
 *
 * */
if ( !function_exists( __NAMESPACE__ . '\\zrdn_maybe_load_iframe' ) ) {
    function zrdn_maybe_load_iframe() {
        // Setup query catch for recipe insertion popup.
        if ( strpos( $_SERVER['REQUEST_URI'], 'media-upload.php' ) && strpos( $_SERVER['REQUEST_URI'], '&type=z_recipe' ) && !strpos( $_SERVER['REQUEST_URI'], '&wrt=' ) ) {
            // pluggable.php is needed for current_user_can
            require_once ABSPATH . 'wp-includes/pluggable.php';
            // user is logged in and can edit posts or pages
            if ( \current_user_can( 'edit_posts' ) || \current_user_can( 'edit_pages' ) ) {
                $get_info = $_REQUEST;
                $post_id = ( isset( $get_info["post_id"] ) ? intval( $get_info["post_id"] ) : 0 );
                if ( isset( $get_info["recipe_post_id"] ) && !isset( $get_info["add-recipe-button"] ) && strpos( $get_info["recipe_post_id"], '-' ) !== false ) {
                    // EDIT recipe
                    $recipe_id = preg_replace( '/[0-9]*?\\-/i', '', $get_info["recipe_post_id"] );
                    wp_redirect( add_query_arg( array(
                        "page"    => "zrdn-recipes",
                        "action"  => "new",
                        "id"      => $recipe_id,
                        "post_id" => $post_id,
                        "popup"   => true,
                    ), admin_url( "admin.php" ) ) );
                } else {
                    // New recipe
                    wp_redirect( add_query_arg( array(
                        "page"    => "zrdn-recipes",
                        "action"  => "new",
                        "post_id" => $post_id,
                        "popup"   => true,
                    ), admin_url( "admin.php" ) ) );
                }
            }
            exit;
        }
    }

    add_action( 'admin_init', __NAMESPACE__ . '\\zrdn_maybe_load_iframe', 30 );
}
if ( !function_exists( __NAMESPACE__ . '\\zrdn_start_tour' ) ) {
    /**
     * Start the tour of the plugin on activation
     */
    function zrdn_start_tour() {
        if ( !get_site_option( 'zrdn_tour_shown_once' ) ) {
            update_site_option( 'zrdn_tour_started', true );
        }
    }

    register_activation_hook( __FILE__, __NAMESPACE__ . '\\zrdn_start_tour' );
}