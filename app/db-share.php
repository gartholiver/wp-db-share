<?php
/**
 * DB Share Class
 * The main plugin class. This will run all WordPress hooks.
 * 
 * @version 0.0.1
 * @package DB Share
 */

namespace DB_Share;

use DB_Share\Actions;
use DB_Share\Filters;

class Initiator {
  /**
   * Initialization
   * 
   * @return void
   */
  public function __construct() {
    $actions = new Actions();

    add_action( 'admin_menu', array( $actions, 'admin_menu' ) );
  }
}