<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/lukaiser
 * @since      1.0.0
 *
 * @package    Pressbooks_Epub_With_Svg
 * @subpackage Pressbooks_Epub_With_Svg/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Pressbooks_Epub_With_Svg
 * @subpackage Pressbooks_Epub_With_Svg/public
 * @author     Lukas Kaiser <reg@lukaiser.com>
 */
class Pressbooks_Epub_With_Svg_Public {

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
		 * defined in Pressbooks_Epub_With_Svg_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pressbooks_Epub_With_Svg_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/pressbooks-epub-with-svg-public.css', array(), $this->version, 'all' );

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
		 * defined in Pressbooks_Epub_With_Svg_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pressbooks_Epub_With_Svg_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/pressbooks-epub-with-svg-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Filter image filename
	 *
	 * @hook	pb_epub201_fetchAndSaveUniqueImage_filename
	 * @since    1.0.0
	 * @param	string	$filename	the current filename
	 * @param	string	$ori_filename	the original filename
	 * @param	object	$response	the response
	 */
	public function filename($filename, $ori_filename, $response) {
		if ($response['headers']['content-type'] == 'image/svg+xml') {
			$filename = md5( array_pop( $ori_filename ) );
			return $filename .'.svg';
		}else{
			return $filename;
		}
	}

	/**
	 * Filter valid image extension
	 * 
	 * @hook	pb_is_valid_image_extension
	 * @since    1.0.0
	 * @param	boolean	$valid	is valid extension
	 * @param	string	$extension	the extensions
	 */
	public function valid_extension($valid, $extension) {
		return $valid || 'svg' === substr($extension, 0, 3);
	}

	/**
	 * Filter valid image type
	 * 
	 * @hook	pb_is_valid_image_type
	 * @since    1.0.0
	 * @param boolean $valid if is valid
	 * @param string $type the type of the image
	 * @param file	$file	the file
	 */
	public function valid_type($valid, $type, $file) {
		return $valid || 'image/svg+xml' === mime_content_type($file);
	}

	/**
	 * Filter should the image be compressed
	 * 
	 * @hook	pb_epub201_fetchAndSaveUniqueImage_compress
	 * @since    1.0.0
	 * @param boolean $compress should it be compressed
	 * @param file $tmp_file the temp file
	 */
	public function should_compress($compress, $tmp_file) {
		return $compress && 'image/svg+xml' != mime_content_type($tmp_file);
	}

}
