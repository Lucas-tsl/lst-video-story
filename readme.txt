=== LST Video Story Bubble ===
Contributors: Lucas-tsl
Tags: video, woocommerce, story, instagram, product display
Requires at least: 5.0
Tested up to: 6.9
Requires PHP: 7.2
Stable tag: 1.0.1
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
4. In **Custom Fields > Add New**, create a field group (for example: `LST Video Stories`).
5. Add the following fields (Field Type in parentheses):

* `id_video_youtube_1` (Text)
* `apercu_video_bulle_1` (URL)
* `label_bulle_1` (Text)
* `id_video_youtube_2` (Text)
* `apercu_video_bulle_2` (URL)
* `label_bulle_2` (Text)
* `id_video_youtube_3` (Text)
* `apercu_video_bulle_3` (URL)
* `label_bulle_3` (Text)
* `id_video_youtube_4` (Text)
* `apercu_video_bulle_4` (URL)
* `label_bulle_4` (Text)

6. In the field group **Location Rules**, set: `Post Type` **is equal to** `Product`.
7. Save the field group.
8. Edit a WooCommerce product and fill at least one complete story set:

* `id_video_youtube_X`: YouTube video ID (example: `GfUYq9lvZLQ`) or full YouTube URL.
* `apercu_video_bulle_X`: Direct MP4 preview URL used inside the bubble.
* `label_bulle_X`: Bubble label shown under the circle (example: `Texture`).

9. Place the shortcode `[bulle_video_finale]` in the product description (or template/builder area shown on the product page).
10. View the product on the frontend. If `id_video_youtube_X` and `apercu_video_bulle_X` are both filled, the bubble appears.

== Configuration ==

Important behavior:

* Up to 4 bubbles are supported per product (`_1` to `_4`).
* A bubble is displayed only when both `id_video_youtube_X` and `apercu_video_bulle_X` are provided.
* If no complete story set is configured, the shortcode outputs nothing.

== Frequently Asked Questions ==

= Do I need Advanced Custom Fields (ACF)? =
Yes, the plugin depends on ACF to load the parameters from the WooCommerce product page.

= Can I use self-hosted videos? =
Currently, the plugin focuses on embedding YouTube videos securely and cleanly.

= The shortcode is visible but no bubble is shown. Why? =
Check that for at least one index (`1`, `2`, `3`, or `4`), both fields are filled:
`id_video_youtube_X` and `apercu_video_bulle_X`.

== Screenshots ==

1. Visual example of how the video story bubbles look on a standard WooCommerce product layout.

== Changelog ==

= 1.0.1 =
* Hide the shortcode wrapper completely when no story bubble is configured.
* Keep YouTube video sound enabled in the modal player.

= 1.0.0 =
* Initial release. Setup of shortcode, WP best practices and escaping methods.
