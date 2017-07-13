=== Plugin Name ===
Contributors: GaryJ
Donate link: http://code.garyjones.co.uk/donate/
Tags: geoplugin, currency
Requires at least: 3.0
Tested up to: 4.6
Stable tag: 1.0.1

Use geoplugin.net to automatically show a live conversion of a currency amount on your site.

== Description ==

Usage:
 [currency]800[/currency]
 [currency base="USD"]2000[/currency]

Only base="XXX" is supported, where XXX is the three-letter currency code (GBP, USD, EUR etc.)
This plugin has GBP as the default base currency. If you want a different default base currency or output format, fork the plugin.

The ~ character is included in the output to indicate that it is only an approximate conversion, as the geoplugin.net rates will be different to the rates you might actually use.

== Installation ==

1. Unzip and upload `geoplugin-currency-shortcode` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= Can I change the base currency or output format? =

Yes, amend the plugin code. For such a simple plugin, it's unlikely I'll be adding a settings page.

== Screenshots ==

1. Showing the output before and after the plugin is activated.

== Changelog ==

= 1.0.1 =
* Code rewrite for best practices.

= 1.0.0 =
* First public version.

== Upgrade Notice ==

= 1.0.1 =
Code rewrite, no new features. Not critical to update.

= 1.0.0 =
Update from nothingness. You will feel better for it.
