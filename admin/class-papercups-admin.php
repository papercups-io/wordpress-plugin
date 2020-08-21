<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       app.papercups.io/demo
 * @since      1.0.0
 *
 * @package    Papercups
 * @subpackage Papercups/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Papercups
 * @subpackage Papercups/admin
 * @author     Zmago <zmago_devetak@yahoo.com>
 */
class Papercups_Admin
{

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

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

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/papercups-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

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

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/papercups-admin.js', array('jquery'), $this->version, false);
	}

	/**
	 * Register the administration menu for the plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0.0
	 */
	public function add_plugin_admin_menu()
	{
		/*
		 * Add a settings page for this plugin to the Settings menu.
		 */
		add_menu_page(
			__('Papercups', $this->plugin_name),
			__('Papercups', $this->plugin_name),
			'manage_options',
			$this->plugin_name,
			array($this, 'display_plugin_admin_page'),
			'dashicons-admin-comments'
		);
	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_admin_page()
	{
		require plugin_dir_path(dirname(__FILE__)) . 'admin/partials/papercups-admin-display.php';
	}
}
