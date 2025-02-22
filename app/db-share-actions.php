<?php
/**
 * DB Share Actions Class
 * This class contains all plugin related action hooks.
 * 
 * @version 0.0.1
 * @package DB Share
 */

namespace DB_Share;

class Actions {
  /**
   * Initialization
   * 
   * @return void
   */
  public function admin_menu() {
    add_submenu_page( 
      'options-general.php',
      __( 'Database Share', 'db-share' ),
      __( 'Database Share', 'db-share' ),
      'manage_options',
      'db-share', 
      array( $this, 'create_plugin_admin' )
    );
  }

  /**
   * 
   */
  public function create_plugin_admin() {
    require_once DBSHARE_PATH . '/views/admin.php';
  }
}