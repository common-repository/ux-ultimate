<?php
/*
	Plugin Name: UX Ultimate
	Description: This plugin will create a lot of elements for Flatsome.
    Plugin URI: https://uxultimate.com
	Version: 1.2
    Author: OneMan
	Author URI: https://onemedia.pro
	Text Domain: ux-ultimate
	Domain Path: /languages
    License: GPLv2 or later
    License URI: http://www.gnu.org/licenses/gpl-2.0.html
	Domain Path: /languages
*/

// Copyright (c) 2022 OnemediaPro. All rights reserved.
//
// Released under the GPLv3 license
// http://www.gnu.org/licenses/gpl-3.0.html
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// **********************************************************************

if ( !defined( 'ABSPATH' ) ) {
    header( 'Location: /' );
    die;
}

include_once ABSPATH . 'wp-admin/includes/plugin.php';

if ( !defined( 'PHP_MAJOR_VERSION' ) || PHP_MAJOR_VERSION < 7 || PHP_MAJOR_VERSION == 7 && PHP_MINOR_VERSION < 1 ) {
    deactivate_plugins( plugin_basename( __FILE__ ) );
    add_action( 'admin_notices', function () {
        ?>
        <div class="notice notice-error is-dismissible">
            <p><?php 
        _e( 'Ux Ultimate requires PHP 7.4 or higher.', UXULTIMATE_TEXT_DOMAIN );
        ?></p>
        </div>
		<?php 
    } );
    return;
}

// Version Defines
define("UXULTIMATE_TEXT_DOMAIN", "ux-ultimate");
define( 'UXULTIMATE_VERSION', '1.0.0' );
define( 'UXULTIMATE_INFO_VERSION', '1.0.0' );
define( 'UXULTIMATE_IS_BETA', false );
define( 'UXULTIMATE_PREFIX_SHORTCODE', 'uxu');

define( 'UXULTIMATE_FLATSOME_COMMONS', get_template_directory() . '/inc/builder/shortcodes/commons');

define( 'UXULTIMATE_TOOLS_DIR', dirname( __FILE__ ) );
define( 'UXULTIMATE_CONFIG_DIR', UXULTIMATE_TOOLS_DIR . '/config' );
define( 'UXULTIMATE_CLASSES_DIR', UXULTIMATE_TOOLS_DIR . '/classes' );
define( 'UXULTIMATE_VENDOR_DIR', UXULTIMATE_TOOLS_DIR . '/vendor' );
define( 'UXULTIMATE_LIB_DIR', UXULTIMATE_TOOLS_DIR . '/lib' );
define( 'UXULTIMATE_VIEW_DIR', UXULTIMATE_TOOLS_DIR . '/views' );
define( 'UXULTIMATE_PLUGIN_NAME', plugin_basename( __FILE__ ) );
define( 'UXULTIMATE_PUB_IMG_DIR', UXULTIMATE_TOOLS_DIR . '/public/img' );

define( 'UXULTIMATE_BLOCKS_DIR', UXULTIMATE_TOOLS_DIR . '/public/blocks' );
// URL defines for CSS/JS
$plug_url = plugin_dir_url( __FILE__ );
define( 'UXULTIMATE_TOOLS_URL', $plug_url );
define( 'UXULTIMATE_PUB_URL', $plug_url . 'public/' );
define( 'UXULTIMATE_PUB_JS_URL', $plug_url . 'public/js/' );
define( 'UXULTIMATE_PUB_BUILD_URL', $plug_url . 'public/build/' );
define( 'UXULTIMATE_PUB_CSS_URL', $plug_url . 'public/css/' );
define( 'UXULTIMATE_PUB_IMG_URL', $plug_url . 'public/img/' );
define( 'UXULTIMATE_BLOCKS_URL', $plug_url . 'public/blocks/' );
define( 'UXULTIMATE_PUB_IMG_ELEMENT_ICON_URL', $plug_url . 'public/img/elements-icon/' );

// Composer

if ( file_exists( UXULTIMATE_VENDOR_DIR . '/autoload.php' ) ) {
    $loader = require_once UXULTIMATE_VENDOR_DIR . '/autoload.php';
}

if(!file_exists(get_template_directory(). '/inc/builder/helpers.php')) {
    deactivate_plugins( plugin_basename( __FILE__ ) );
    add_action( 'admin_notices', function () {
        ?>
        <div class="notice notice-error is-dismissible">
            <p><?php
                _e( 'Ux Ultimate requires theme Flatsome.', UXULTIMATE_TEXT_DOMAIN );
                ?></p>
        </div>
        <?php
    } );
    return;
}
require_once get_template_directory() . '/inc/builder/helpers.php';
// Register Styles
if (!\function_exists('uxultimate_scripts')) {
    function uxultimate_scripts() {
        $filenames = "mix-manifest.json";
        $string = file_get_contents($filenames, FILE_USE_INCLUDE_PATH);
        $jsonArray = json_decode($string, true);
        uxultimate_assets_enqueue($jsonArray);

        $fileLib = "public/lib/manifest.json";
        $stringTextLib = file_get_contents($fileLib, FILE_USE_INCLUDE_PATH);
        $jsonArrayLib = json_decode($stringTextLib, true);
        uxultimate_assets_lib_enqueue($jsonArrayLib);
    }


    function uxultimate_assets_enqueue(array $jsonArray): void
    {
        foreach ($jsonArray as $key => $item) {
            $keyEnqueue = uxultimate_path_to_string($key);
            if (str_contains($keyEnqueue, "js")) {
                wp_enqueue_script($keyEnqueue, UXULTIMATE_TOOLS_URL . $item);
            }
            if (str_contains($keyEnqueue, "css")) {
                wp_enqueue_style($keyEnqueue, UXULTIMATE_TOOLS_URL . $item);
            }
        }
    }
    function uxultimate_assets_lib_enqueue(array $jsonArray): void
    {
        foreach ($jsonArray as $key => $item) {
            $keyEnqueue = uxultimate_path_to_string($key);
            if (str_contains($keyEnqueue, "js")) {
                wp_enqueue_script($keyEnqueue, UXULTIMATE_PUB_URL . $item['file']);
            }
            if (str_contains($keyEnqueue, "css")) {
                wp_enqueue_style($keyEnqueue, UXULTIMATE_PUB_URL . $item['file']);
            }
        }
    }
}

if(!function_exists("uxultimate_path_to_string")){
    function uxultimate_path_to_string(string $path): string {
        $result = $path;
        $result = str_replace("/", "_", $result);
        $result = str_replace(".", "_", $result);
        return $result;
    }
};

add_action( 'wp_enqueue_scripts', 'uxultimate_scripts', 101 );

new UxUltimate\Plugin\InitBlocks();