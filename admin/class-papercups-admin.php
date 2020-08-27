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
	public function enqueue_styles() {
    wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/papercups-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts(){
		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/papercups-admin.js', array('jquery', 'wp-color-picker'), $this->version, false);
	}

  function init_settings() {
    $this->register_settings();

    settings_fields('papercups_widget_setting');
    do_settings_fields('papercups_account_id', 'papercups_widget_setting');
    add_settings_section(
        'papercups_settings_section',
        'Papercups Settings Section',
        array($this, 'settings_section_cb'),
        'general'
    );

    $this->add_settings_fields();
  }

  private function register_settings() {
    register_setting('general', 'papercups_account_id');
    register_setting('general', 'papercups_widget_title');
    register_setting('general', 'papercups_widget_subtitle');
    register_setting('general', 'papercups_new_message_placeholder');
    register_setting('general', 'papercups_greeting');
    register_setting('general', 'papercups_primary_color');
    register_setting('general', 'papercups_require_email_upfront');
    register_setting('general', 'papercups_base_url', array('default' => 'https://app.papercups.io'));
  }

  private function add_settings_fields() {
    add_settings_field(
      'papercups_account_id',
      __('Papercups account ID', $this->plugin_name),
      array($this, 'text_input_callback'),
      'general',
      'papercups_settings_section',
      array(
        'type'      => 'text',
        'value'     => get_option('papercups_account_id'),
        'class'     => 'regular-text ltr',
        'label_for' => 'papercups_account_id',
        'tip'       => __('You can get your account ID in the Papercups dashboard', $this->plugin_name)
      ),
    );

    add_settings_field(
      'papercups_base_url',
      __('Papercups app base URL', $this->plugin_name),
      array($this, 'text_input_callback'),
      'general',
      'papercups_settings_section',
      array(
        'type'      => 'text',
        'value'     => get_option('papercups_base_url'),
        'class'     => 'regular-text ltr',
        'label_for' => 'papercups_base_url',
        'tip'       => __('Change this if you have your own instance', $this->plugin_name)
      ),
    );

    add_settings_field(
      'papercups_widget_title',
      __('Widget title', $this->plugin_name),
      array($this, 'text_input_callback'),
      'general',
      'papercups_settings_section',
      array(
        'type'      => 'text',
        'value'     => get_option('papercups_widget_title'),
        'class'     => 'regular-text ltr',
        'label_for' => 'papercups_widget_title',
        'tip'       => __('Set widget title', $this->plugin_name)
      ),
    );

    add_settings_field(
      'papercups_widget_subtitle',
      __('Widget subtitle', $this->plugin_name),
      array($this, 'text_input_callback'),
      'general',
      'papercups_settings_section',
      array(
        'type'      => 'text',
        'value'     => get_option('papercups_widget_subtitle'),
        'class'     => 'regular-text ltr',
        'label_for' => 'papercups_widget_subtitle',
        'tip'       => __('Set widget subtitle', $this->plugin_name)
      ),
    );

    add_settings_field(
      'papercups_new_message_placeholder',
      __('New message placeholder', $this->plugin_name),
      array($this, 'text_input_callback'),
      'general',
      'papercups_settings_section',
      array(
        'type'      => 'text',
        'value'     => get_option('papercups_new_message_placeholder'),
        'class'     => 'regular-text ltr',
        'label_for' => 'papercups_new_message_placeholder',
        'tip'       => __('Set new message placeholder', $this->plugin_name)
      ),
    );

    add_settings_field(
      'papercups_greeting',
      __('Greeting', $this->plugin_name),
      array($this, 'text_input_callback'),
      'general',
      'papercups_settings_section',
      array(
        'type'      => 'text',
        'value'     => get_option('papercups_greeting'),
        'class'     => 'regular-text ltr',
        'label_for' => 'papercups_greeting',
        'tip'       => __('Set greeting message', $this->plugin_name)
      ),
    );

    add_settings_field(
      'papercups_primary_color',
      __('Widget primary color', $this->plugin_name),
      array($this, 'text_input_callback'),
      'general',
      'papercups_settings_section',
      array(
        'type'      => 'text',
        'value'     => get_option('papercups_primary_color'),
        'class'     => 'papercups-color-picker',
        'label_for' => 'papercups_primary_color',
        'tip'       => __('Choose widget color', $this->plugin_name)
      ),
    );

    add_settings_field(
      'papercups_require_email_upfront',
      __('Require email upfront', $this->plugin_name),
      array($this, 'checkbox_input_callback'),
      'general',
      'papercups_settings_section',
      array(
        'type'      => 'checkbox',
        'value'     => get_option('papercups_require_email_upfront'),
        'class'     => 'regular-text ltr',
        'label_for' => 'papercups_require_email_upfront',
        'tip'       => __('Check if you want to require the email upfront', $this->plugin_name)
      ),
    );
  }

  function settings_section_cb($arg) {
    echo __('Here you can add configuration settings for you Papercups widget', $this->plugin_name);
  }

  function text_input_callback($args) {
    $html = '<input id="' . esc_attr($args['label_for']) . '" type="' . esc_attr($args['type']) . '"';
    $html .= ' value="' . esc_attr($args['value']) . '" class="' . $args['class'] . '" name="' . $args['label_for']  . '"/>';
    $html .= '<p class="description">'. esc_attr( $args['tip'] ) .'</p>';

    echo $html;
  }

  function checkbox_input_callback($args) {
    echo '<input type="' . $args['type']  . '" id="' . $args['label_for'] . '" value="1" name="' . $args['label_for']  . '"';
    if ($args['value'] == '1') {
      echo ' checked';
    }
    echo '/>';
  }
}
