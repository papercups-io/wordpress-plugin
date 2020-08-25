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
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Papercups_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Papercups_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/papercups-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Papercups_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Papercups_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/papercups-public.js', array( 'jquery' ), $this->version, false );
    wp_localize_script( $this->plugin_name, 'papercupsVars',
        array(
           'accountId'             => 'xxx', // @TODO query from stored value
           'title'                 => __( 'Welcome to Papercups!', 'papercups' ),
           'subtitle'              => __( 'Ask us anything in the chat window below 😊', 'papercups' ),
           'newMessagePlaceholder' => __( 'Start typing...', 'papercups' ),
           'primaryColor'          => '#13c2c2',  // @TODO query from stored value
           'greeting'              => __( 'Hi there! How can I help you?', 'papercups' ),
           'requireEmailUpfront'   => true, // @TODO query from stored value
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