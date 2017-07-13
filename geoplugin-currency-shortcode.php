<?php
/**
 * Geoplugin Currency Shortcode
 *
 * Use geoplugin.net to automatically show a live conversion of a currency amount
 * on your site. Has GBP as default base currency. If you want a different
 * currency or output format, fork the plugin.
 *
 * @package   Gamajo\GeopluginCurrencyShortcode
 * @author    Gary Jones
 * @license   GPL-2.0+
 * @copyright 2011 Gamajo Tech
 *
 * @wordpress-plugin
 * Plugin Name: Geoplugin Currency Shortcode
 * Plugin URI:  http://code.garyjones.co.uk/plugins/geoplugin-currency-shortcode
 * Description: Use geoplugin.net to automatically show a live conversion of a currency amount on your site. Has GBP as default base currency. If you want a different currency or output format, fork the plugin.
 * Version:     1.0.1
 * Author:      Gary Jones
 * Author URI:  https://gamajo.com
 * Text Domain: geoplugin-currency-shortcode
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

add_shortcode( 'currency', 'geoplugin_currency_shortcode' );
/**
 * The currency shortcode handler.
 *
 * Usage:
 * [currency]800[/currency]
 * [currency base="USD"]2000[/currency]
 *
 * The ~ character is included in the output to indicate that it is only an
 * approximate conversion, as the geoplugin.net rates will be different to the
 * rates you might actually use.
 *
 * @since 1.0.0
 *
 * @param array  $atts    Attributes - only base="XXX" is supported, where XXX
 *                        is the three-letter currency code (GBP, USD, EUR etc.).
 * @param string $content Contains the numerical amount. Do not include the
 *                        original currency unit in this.
 * @return string Original content, followed by converted amount if currency of
 *                users IP address location is different to base currency.
 */
function geoplugin_currency_shortcode( $atts, $content = null ) {
	$atts = shortcode_atts(
		[ 'base' => 'GBP' ],
		$atts,
		'currency'
	);

	$query_args = [
		'base_currency' => $atts['base'],
		'ip'            => $_SERVER['REMOTE_ADDR'],
	];

	$url = add_query_arg( $query_args, 'http://www.geoplugin.net/php.gp' );

	$geoplugin_array = unserialize( file_get_contents( $url ) );

	if (
		isset( $geoplugin_array['geoplugin_currencyCode'] ) &&
		$geoplugin_array['geoplugin_currencyCode'] !== $atts['base'] &&
		is_numeric( $content )
	) {
		$amount = round( ( $content * $geoplugin_array['geoplugin_currencyConverter'] ), 2 );

		return $content . ' (~' . $geoplugin_array['geoplugin_currencySymbol'] . $amount . ')';
	}

	return $content;
}
