<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://wordpress.org/plugins/advanced-pdf-generator
 * @since      0.4.0
 *
 * @package    Advanced_Pdf_Generator
 * @subpackage Advanced_Pdf_Generator/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Advanced_Pdf_Generator
 * @subpackage Advanced_Pdf_Generator/admin
 * @author     Juan Camilo Mora Vélez <jcmlmorav@gmail.com>
 */
class Advanced_Pdf_Generator_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.4.0
	 * @access   private
	 * @var      string    $advanced_pdf_generator    The ID of this plugin.
	 */
	private $advanced_pdf_generator;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.4.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.4.0
	 * @param      string    $advanced_pdf_generator       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $advanced_pdf_generator, $version ) {

		$this->advanced_pdf_generator = $advanced_pdf_generator;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    0.4.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->advanced_pdf_generator, plugin_dir_url( __FILE__ ) . 'css/advanced-pdf-generator-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    0.4.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->advanced_pdf_generator, plugin_dir_url( __FILE__ ) . 'js/advanced-pdf-generator-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Function to register administration screen for plugin Options
	 *
	 * @since 0.4.0
	 */
	public function advanced_pdf_generator_menu() {
		add_menu_page( 'Advanced PDF Generator', 'Advanced PDF Generator', 'manage_options', $this->advanced_pdf_generator, array( $this, 'load_admin_page_content' ) );
	}

	/**
	 * Load file that contains the page render code
	 *
	 * @since 0.4.0
	 */
	public function load_admin_page_content() {
		global $wpdb;

		$table_apdfg_values = $wpdb->prefix . 'apdfg_values';

		if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
			$values = $wpdb->get_row( "SELECT * FROM $table_apdfg_values LIMIT 1", OBJECT );
			$wpdb->update(
				$table_apdfg_values,
				array(
					'download'			=> isset($_POST['download']),
					'download_text' 	=> $_POST['download_text'],
					'download_class' 	=> $_POST['download_class'],
					'send'				=> isset($_POST['send']),
					'send_text' 		=> $_POST['send_text'],
					'send_class' 		=> $_POST['send_class'],
					'name_label' 		=> $_POST['name_label'],
					'name_placeholder' 	=> $_POST['name_placeholder'],
					'email_label' 		=> $_POST['email_label'],
					'email_placeholder' => $_POST['email_placeholder'],
					'success_message' 	=> $_POST['success_message'],
					'error_message' 	=> $_POST['error_message'],
					'submit_label' 		=> $_POST['submit_label'],
					'view'				=> isset($_POST['view']),
					'view_text' 		=> $_POST['view_text'],
					'view_class' 		=> $_POST['view_class']
				),
				array( 'id' => $values->id )
			);
			?>
			<div class="notice notice-success is-dismissible">
	            <p><?php _e( 'Values updated!', 'apdfg' ); ?></p>
	        </div>
			<?php
		}

		$values = $wpdb->get_row( "SELECT * FROM $table_apdfg_values LIMIT 1", OBJECT );

		require_once plugin_dir_path( __FILE__ ) . 'partials/advanced-pdf-generator-admin-display.php';
	}

}
