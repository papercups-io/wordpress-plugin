<?php

/**
 * Fired during plugin activation
 *
 * @link       app.papercups.io/demo
 * @since      1.0.0
 *
 * @package    Papercups
 * @subpackage Papercups/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Papercups
 * @subpackage Papercups/includes
 * @author     Zmago <zmago_devetak@yahoo.com>
 */
class Papercups_Activator
{

  /**
   * Short Description. (use period)
   *
   * Long Description.
   *
   * @since    1.0.0
   */
  public static function activate()
  {
    add_option('papercups_app_id');
  }
}
