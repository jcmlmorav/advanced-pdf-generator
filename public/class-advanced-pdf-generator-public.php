<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      0.1.0
 *
 * @package    Advanced_Pdf_Generator
 * @subpackage Advanced_Pdf_Generator/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Advanced_Pdf_Generator
 * @subpackage Advanced_Pdf_Generator/public
 * @author     Juan Camilo Mora Vélez <jcmlmorav@gmail.com>
 */

use Dompdf\Dompdf;
use Dompdf\Options;

class Advanced_Pdf_Generator_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $advanced_pdf_generator;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.2.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		ob_start();

		$this->advanced_pdf_generator = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    0.3.0
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

		wp_enqueue_style( $this->advanced_pdf_generator, plugin_dir_url( __FILE__ ) . 'css/advanced-pdf-generator-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->advanced_pdf_generator.'-swal', 'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    0.3.0
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

		wp_enqueue_script( $this->advanced_pdf_generator.'-swal', 'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.all.min.js', array(), $this->version, false );
		wp_enqueue_script( $this->advanced_pdf_generator, plugin_dir_url( __FILE__ ) . 'js/advanced-pdf-generator-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register shortcodes for the public-facing side of the site.
	 *
	 * @since	0.1.0
	 */
	public function register_shortcodes() {
		add_shortcode( $this->advanced_pdf_generator, array($this, 'advanced_pdf_generator_shortcode') );
	}

	/**
	 * Shortcode function for advanced-pdf-generator tag
	 *
	 * @since	0.3.1
	 *
	 */
	public function advanced_pdf_generator_shortcode( $atts = [] ) {

		$content = "<ul id=\"advanced-pdf-generator\">";

		$atts = shortcode_atts( array(
			'download'			=> isset($atts['download']) ? true : false,
			'download_text' 	=> 'Download PDF',
			'download_class' 	=> 'download-pdf',
			'send'				=> isset($atts['send']) ? true : false,
			'send_text' 		=> 'Send PDF',
			'send_class' 		=> 'send-pdf',
			'name_label'		=> 'Name',
			'name_placeholder'  => 'Full name',
			'email_label'		=> 'Email',
			'email_placeholder' => 'E-mail',
			'submit_label'		=> 'Send',
			'view'				=> isset($atts['view']) ? true : false,
			'view_text' 		=> 'View PDF',
			'view_class' 		=> 'view-pdf',
		), $atts, $this->advanced_pdf_generator );

		$download = $atts['download'];
		$send = $atts['send'];
		$view = $atts['view'];

		if( $view || $download || $send ) {
			$file_url = $this->generate_pdf();
		}

		if( $download ) {
			$download_text = $atts['download_text'];
			$download_class = $atts['download_class'];
			$content .= "<li><a class=\"$this->advanced_pdf_generator $download_class\" href=\"$file_url\" download>$download_text</a></li> ";
		}

		if( $send ) {
			$send_text = $atts['send_text'];
			$send_class = $atts['send_class'];
			$name_label = $atts['name_label'];
			$name_placeholder = $atts['name_placeholder'];
			$email_label = $atts['email_label'];
			$email_placeholder = $atts['email_placeholder'];
			$submit_label = $atts['submit_label'];
			$content .= "<li><a class=\"$this->advanced_pdf_generator $send_class\" href=\"javascript:;\" onclick=\"send_apdfg()\" data-toggle=\"modal\" data-target=\"#modal-send\">$send_text</a></li>
			<script>
				function send_apdfg() {
					swal({
						html: '<form id=\"apdfg-send-email\" action=\"" . esc_url( $_SERVER['REQUEST_URI'] ) . "\" method=\"POST\">'+
								'<div class=\"cont-input full\">'+
									'<label>$name_label</label>'+
									'<input name=\"names\" type=\"text\" placeholder=\"$name_placeholder\" required>'+
								'</div>'+
								'<div class=\"cont-input full\">'+
									'<label>$email_label</label>'+
									'<input name=\"email\" type=\"email\" placeholder=\"$email_placeholder\" required>'+
								'</div>'+
								'<input name=\"file_url\" type=\"hidden\" value=\"$file_url\">'+
								'<input class=\"submit\" type=\"submit\" name=\"send-apdfg\" value=\"$submit_label\">'+
							'</form>',
						showConfirmButton: false,
						showCloseButton: true
					});
				}
			</script> ";
		}

		if( $view ) {
			$view_text = $atts['view_text'];
			$view_class = $atts['view_class'];
			$content .= "<li><a class=\"$this->advanced_pdf_generator $view_class\" target=\"_blank\" href=\"$file_url\">$view_text</a></li> ";
		}

		if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['send-apdfg']) ) {
			$email = $this->send_email();
			if( $email ) {
				$content .= "<script>
				window.onload = function() {
					swal({
						title: 'Email sent!',
						type: 'success'
					});
				 }
				</script>";
			} else {
				$content .= "<script>
				window.onload = function() {
					swal({
						title: 'Email NOT sent!',
						type: 'error'
					});
				 }
				</script>";
			}
		}

		$content .= '</ul>';

		return $content;
	}

	/**
	 * Render PDF, save in uploads directory
	 *
	 * @return	$file_url
	 * @since	0.3.1
	 *
	 */
	public function generate_pdf() {
		$options = new Options();
		$options->set('isRemoteEnabled', true);
		$options->set('defaultFont', 'Helvetica');

		$dompdf = new Dompdf($options);

		$uploads = wp_upload_dir();
		if( !file_exists($uploads['basedir'].'/'.$this->advanced_pdf_generator) ) {
			mkdir($uploads['basedir'].'/'.$this->advanced_pdf_generator, 0755);
		}

		$template = $this->get_template_file( get_template_directory() . '/apg-templates/pdf.php' );
		if(!$template) {
			$template = "<p>Template file not found at theme_path.../$this->advanced_pdf_generator/apg-templates/pdf.php </p>";
		}

		$dompdf->loadHtml($template);
		$dompdf->render();
		$output = $dompdf->output();

		ob_start();
		if(!session_id()) {
			session_start();
		}
		$random_str = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10/strlen($x)) )),1,10);
		$file_name = session_id(). '_' . $random_str .'.pdf';
		file_put_contents($uploads['basedir'].'/advanced-pdf-generator/'.$file_name, $output);
		$file_url = $uploads['baseurl'].'/advanced-pdf-generator/'.$file_name;
		return $file_url;
	}

	/**
	 * Load template file to generate PDF
	 *
	 * @since 0.1.0
	 *
	 */
	public function get_template_file($filename, $name=null, $file_url=null) {
		if (is_file($filename)) {
			ob_start();
			require $filename;
			return ob_get_clean();
		}
		return false;
	}

	/**
	 * Send email if send options is enabled and triggered
	 *
	 * @since	0.3.0
	 *
	 */
	public function send_email() {
		$name = sanitize_text_field( $_POST["names"] );
		$email = sanitize_email( $_POST["email"] );
		$file_url = esc_url( $_POST["file_url"] );

		$to = $email;
		$headers = array('Content-Type: text/html; charset=UTF-8');

		$template = $this->get_template_file( get_template_directory() . '/apg-templates/mail.php', $name, $file_url );
		if(!$template) {
			$template = "<p>Hello $name, <br> Here is your PDF file: $file_url</p>";
		}

		if( wp_mail($to, 'PDF', $template, $headers) ) {
			return true;
		} else {
			return false;
		}
	}

}
