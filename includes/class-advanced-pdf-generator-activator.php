<?php

/**
 * Fired during plugin activation
 *
 * @link       https://wordpress.org/plugins/advanced-pdf-generator
 * @since      0.4.0
 *
 * @package    Advanced_Pdf_Generator
 * @subpackage Advanced_Pdf_Generator/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      0.4.0
 * @package    Advanced_Pdf_Generator
 * @subpackage Advanced_Pdf_Generator/includes
 * @author     Juan Camilo Mora Vélez <jcmlmorav@gmail.com>
 */
class Advanced_Pdf_Generator_Activator {

	/**
	 * Creating required tables with default values
	 *
	 * @since    0.4.0
	 */
	public static function activate() {
		global $wpdb;

		$table_apdfg_values = $wpdb->prefix . 'apdfg_values';
		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE IF NOT EXISTS $table_apdfg_values (
			id int NOT NULL AUTO_INCREMENT,
			download tinyint(1) DEFAULT 1 NOT NULL,
			download_text varchar(100) DEFAULT 'Download' NOT NULL,
			download_class varchar(100) DEFAULT 'download-link' NOT NULL,
			send tinyint(1) DEFAULT 1 NOT NULL,
			send_text varchar(100) DEFAULT 'Send' NOT NULL,
			send_class varchar(100) DEFAULT 'send-link' NOT NULL,
			name_label varchar(100) DEFAULT 'Name' NOT NULL,
			name_placeholder varchar(100) DEFAULT 'Full name' NOT NULL,
			email_label varchar(100) DEFAULT 'E-mail' NOT NULL,
			email_placeholder varchar(100) DEFAULT 'E-mail' NOT NULL,
			success_message varchar(255) DEFAULT 'E-mail has been sent.' NOT NULL,
			error_message varchar(255) DEFAULT 'E-mail NOT sent.' NOT NULL,
			submit_label varchar(100) DEFAULT 'Send' NOT NULL,
			view tinyint(1) DEFAULT 1 NOT NULL,
			view_text varchar(100) DEFAULT 'View' NOT NULL,
			view_class varchar(100) DEFAULT 'view-link' NOT NULL,
			PRIMARY KEY  (id)
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );

		$check_values = $wpdb->get_var( "SELECT count(*) FROM $table_apdfg_values" );
		if( !$check_values ) {
			$default_values = $wpdb->insert(
				$table_apdfg_values,
				array(
					'download'			=> 1,
					'download_text' 	=> 'Download',
					'download_class' 	=> 'download-link',
					'send'				=> 1,
					'send_text' 		=> 'Send',
					'send_class' 		=> 'send-link',
					'name_label' 		=> 'Name',
					'name_placeholder' 	=> 'Full name',
					'email_label' 		=> 'E-mail',
					'email_placeholder' => 'E-mail',
					'success_message' 	=> 'E-mail has been sent.',
					'error_message' 	=> 'E-mail NOT sent.',
					'submit_label' 		=> 'Send',
					'view'				=> 1,
					'view_text' 		=> 'View',
					'view_class' 		=> 'view-link'
				)
			);
		}
	}

}
