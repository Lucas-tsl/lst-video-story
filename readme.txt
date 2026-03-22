=== LST Video Story Bubble ===
Contributors: Lucas-tsl
Tags: video, woocommerce, story, instagram, product display
Requires at least: 5.0
Tested up to: 6.9
Requires PHP: 7.2
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Add interactive Instagram-style video stories to WooCommerce product pages.

== Description ==

This plugin adds interactive Instagram-style video stories to WooCommerce product pages using a simple shortcode `[bulle_video_finale]`. 

Features:
* Adds up to 4 video story bubbles per product.
* Automatically integrates with YouTube videos (simply provide the URL or ID).
* Utilizes Advanced Custom Fields (ACF) to manage fields elegantly in the backend.
* Creates a modernized, app-like feeling for eCommerce web stores.
* Lightweight, secure, and fast!

Please note: This plugin relies on Advanced Custom Fields (ACF) to fetch its data. You need to configure fields (`id_video_youtube_X`, `apercu_video_bulle_X`, `label_bulle_X`) on the Product post type.

== Installation ==

1. Upload the plugin folder to the `/wp-content/plugins/` directory, or install the plugin directly through the WordPress plugins screen.
2. Ensure you have the `Advanced Custom Fields` (ACF) plugin installed and active.
3. Activate the plugin through the 'Plugins' screen in WordPress.
4. Set up your custom fields for the WooCommerce `Product` post type.
5. Place the shortcode `[bulle_video_finale]` in your product description to display the stories.

== Frequently Asked Questions ==

= Do I need Advanced Custom Fields (ACF)? =
Yes, the plugin depends on ACF to load the parameters from the WooCommerce product page.

= Can I use self-hosted videos? =
Currently, the plugin focuses on embedding YouTube videos securely and cleanly.

== Screenshots ==

1. Visual example of how the video story bubbles look on a standard WooCommerce product layout.

== Changelog ==

= 1.0.0 =
* Initial release. Setup of shortcode, WP best practices and escaping methods.
