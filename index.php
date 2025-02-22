<?php
/**
 * Plugin Name:       Share Database
 * Description:       This plugin allows you to use a separate staging database
 *                    for local development.
 * Requires at least: 6.6
 * Requires PHP:      7.2
 * Version:           0.0.1
 * Author:            Garth Oliver
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       db-share
 *
 * @package DB Share
 */

namespace DB_Share;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Set the plugin version.
define( 'DBSHARE_VERSION', '0.0.1' );
define( 'DBSHARE_PATH', plugin_dir_path( __FILE__ ) );

// Require vendor files.
require_once DBSHARE_PATH . '/vendor/wp-config-transformer.php';

// Require plugin files.
require_once DBSHARE_PATH . '/app/db-share-actions.php';
require_once DBSHARE_PATH . '/app/db-share-filters.php';
require_once DBSHARE_PATH . '/app/db-share.php';

// Use Initiator class.
use DB_Share\Initiator;

// Initialize the plugin.
if ( ! function_exists( 'db_share' ) ) {
	function db_share() {
		return new Initiator();
	}

	db_share();
}
