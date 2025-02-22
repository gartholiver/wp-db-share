<?php
/**
 * Database Share Admin Page
 */

namespace DB_Share;

use WP_Config_Transformer;

// Submission functionality.
if ( 'POST' === $_SERVER['REQUEST_METHOD'] ) {
  $db_name = isset( $_POST['db-name'] ) ? $_POST['db-name']: DB_NAME;
  $db_user = isset( $_POST['db-user'] ) ? $_POST['db-user']: DB_USER;
  $db_pass = isset( $_POST['db-password'] ) ? $_POST['db-password']: DB_PASSWORD;
  $db_host = isset( $_POST['db-host'] ) ? $_POST['db-host']: DB_HOST;

  $transformer = new WP_Config_Transformer( ABSPATH . 'wp-config.php' );

  if ( $transformer->exists( 'constant', 'WP_HOME' ) ) {
    $transformer->update( 'constant', 'WP_HOME', "https://{$_SERVER['HTTP_HOST']}" );
  } else {
    $transformer->add( 'constant', 'WP_HOME', "https://{$_SERVER['HTTP_HOST']}" );
  }

  if ( $transformer->exists( 'constant', 'WP_HOME' ) ) {
    $transformer->update( 'constant', 'WP_SITEURL', "https://{$_SERVER['HTTP_HOST']}" );
  } else {
    $transformer->add( 'constant', 'WP_SITEURL', "https://{$_SERVER['HTTP_HOST']}" );
  }

  $transformer->update( 'constant', 'DB_NAME', $db_name );
  $transformer->update( 'constant', 'DB_USER', $db_user );
  $transformer->update( 'constant', 'DB_PASSWORD', $db_pass );
  $transformer->update( 'constant', 'DB_HOST', $db_host );
} else {
  $db_name = DB_NAME;
  $db_user = DB_USER;
  $db_pass = DB_PASSWORD;
  $db_host = DB_HOST;
}
?>

<div class="wrap">
  <h1><?php _e( 'Database Share Settings', 'db-share' ); ?></h1>

  <form method="POST" action="" novalidate="novalidate">
    <table class="form-table" role="presentation">
      <tbody>
        <tr>
          <th scope="row">
            <label for="db-name">
              <?php _e( 'Database Name', 'db-share' ); ?>
            </label>
          </th>
          <td>
            <input name="db-name" type="text" id="db-name" value="<?php esc_attr_e( $db_name, 'db-share' ); ?>" class="regular-text">
          </td>
        </tr>
        <tr>
          <th scope="row">
            <label for="db-user">
              <?php _e( 'Database Name', 'db-share' ); ?>
            </label>
          </th>
          <td>
            <input name="db-user" type="text" id="db-user" value="<?php esc_attr_e( $db_user, 'db-share' ); ?>" class="regular-text">
          </td>
        </tr>
        <tr>
          <th scope="row">
            <label for="db-password">
              <?php _e( 'Database Password', 'db-share' ); ?>
            </label>
          </th>
          <td>
            <input name="db-password" type="password" id="db-password" value="<?php esc_attr_e( $db_pass, 'db-share' ); ?>" class="regular-text">
          </td>
        </tr>
        <tr>
          <th scope="row">
            <label for="db-host">
              <?php _e( 'Database Host', 'db-share' ); ?>
            </label>
          </th>
          <td>
            <input name="db-host" type="text" id="db-host" value="<?php esc_attr_e( $db_host, 'db-share' ); ?>" class="regular-text">
          </td>
        </tr>
      </tbody>
    </table>


    <p class="submit">
      <input type="submit" name="submit" id="submit" class="button button-primary" value="Update Configuration">
    </p>
  </form>
</div>