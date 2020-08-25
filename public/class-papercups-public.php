<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       app.papercups.io/demo
 * @since      1.0.0
 *
 * @package    Papercups
 * @subpackage Papercups/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Papercups
 * @subpackage Papercups/public
 * @author     Zmago <zmago_devetak@yahoo.com>
 */
class Papercups_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script($this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/papercups-public.js', array( 'jquery' ), $this->version, false);
    wp_localize_script($this->plugin_name, 'papercupsVars',
        array(
           'accountId'             => get_option('papercups_account_id'),
           'title'                 => get_option('papercups_widget_title'),
           'subtitle'              => get_option('papercups_widget_subtitle'),
           'newMessagePlaceholder' => get_option('papercups_new_message_placeholder'),
           'primaryColor'          => get_option('papercups_primary_color'),
           'greeting'              => get_option('papercups_greeting'),
           'requireEmailUpfront'   => get_option('papercups_require_email_upfront'),
           'baseUrl'               => get_option('papercups_base_url')
        )
    );
	}

	/**
	 * Insert widget script in header.
	 *
	 * @since    1.0.0
	 */

	 public function header_script() {
	    ?>
          <script type="text/javascript"
                   async
                   defer
                   src="https://app.papercups.io/widget.js">
           </script>
       <?php
	 }
}