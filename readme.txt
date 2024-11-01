=== WP Ajax Subscribe ===
Contributors: silwal
Donate link: silwalrabina.com.np
Tags: contact, form, contact form, email, ajax, akismet,
Requires at least: 4.8
Tested up to: 4.9
Requires PHP: 5.2.4
Stable Tag: 5.0.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


Simply add subscribers to mailchimp lists.

== Description ==
Wp Ajax Subscribe uses the mailchip api in order to add a subscriber.

== Installation ==

1. Upload `wp-ajax-subscribe` plugin to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Provide MailChimp API key and List id in backend > WP Subscribe page.
4. Place [wp_ajax_mailchimp] shortcode in your Page/Post content or Place <?php echo do_shortcode('[wp_ajax_mailchimp]'); ?> in any php file.

== Frequently Asked Questions ==

= How to install WP Ajax Subscribe? =

Login to your site. Goto dashboard > plugins > add new. Search WP Ajax Subscribe and click on install.

= How to display the form? =

Use the shortcode [wp_ajax_mailchimp] to display the content.

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the /assets directory or the directory that contains the stable readme.txt (tags or trunk). Screenshots in the /assets
directory take precedence. For example, `/assets/screenshot-1.png` would win over `/tags/4.3/screenshot-1.png`
(or jpg, jpeg, gif).
2. This is the second screen shot

== Changelog ==
= 1.1.1 =
* 22-03-2019
* description added.

= 1.1.0 =
* 22-03-2019
* api link changed.

= 1.0.0 =
* 15-03-2019
* Initial Release.

== Upgrade Notice ==

= 1.1.0 =
* 23-03-2019
* API error fixes. Better ajax function call.