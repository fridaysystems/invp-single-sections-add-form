<?php
/**
 * Plugin Name: Inventory Presser - Add CF7 Form to Singles
 * Plugin URI: https://github.com/fridaysystems/invp-single-sections-add-form
 * Description: Add-on for Inventory Presser. Adds a Contact Form 7 form to vehicle details pages.
 * Author: Corey Salzano
 * Author URI: https://inventorypresser.com
 * Version: 1.0.0
 * License: GPLv2
 * Text domain: invp-single-sections-add-form
 *
 * @author  Corey Salzano <csalzano@duck.com>
 * @package invp_single_sections_add_form
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'invp_single_sections_add_form' ) ) {
	add_action( 'invp_single_sections', 'invp_single_sections_add_form' );
	/**
	 * Runs a Contact Form 7 shortcode and adds its content to vehicle details
	 * pages content sections.
	 *
	 * @param  array $sections An array of content sections on vehicle details pages.
	 * @return array
	 */
	function invp_single_sections_add_form( $sections ) {
		// Generate the form HTML. Change this line to load your form.
		$form_html = apply_shortcodes( '[contact-form-7 id="3ef650d" title="Lead Contact Form"]' );
		if ( '' === $form_html ) {
			return $sections;
		}
		// Add the form to the sections array.
		$sections['form'] = sprintf(
			'<h2 class="vehicle-content-wrap">%s</h2><div class="vehicle-content-wrap">%s</div>',
			__( 'Check Availability', 'invp-single-sections-add-form' ),
			$form_html
		);
		return $sections;
	}
}
