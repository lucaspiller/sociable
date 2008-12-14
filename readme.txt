=== Sociable ===
Contributors: joostdevalk
Donate link: http://yoast.com/donate/
Tags: social, bookmark, bookmarks, bookmarking, social bookmarking, social bookmarks
Requires at least: 2.2
Tested up to: 2.7
stable tag: 2.9.10

Automatically add links on your posts, pages and RSS feed to your favorite social bookmarking sites.

== Description ==
Automatically add links to your favorite social bookmarking sites on your posts, pages and in your RSS feed. You can choose from 99 different social bookmarking sites!

More info:

* More info on [Sociable](http://yoast.com/wordpress/sociable/), with info on how to add sites to it, and how to integrate it into your WordPress in other ways.
* Read more about [WordPress SEO](http://yoast.com/articles/wordpress-seo/) so you can get the most out of this plugin.
* Check out the other [Wordpress plugins](http://yoast.com/wordpress/) by the same author.

**Changelog**

* 2.9.10 Fixes issue with excerpt not being urlencoded
* 2.9.9 Fixes for the custom fields issue.
* 2.9.8 Fixes for WP 2.7
* 2.9.6 Added Symbaloo, Tumblr,
* 2.9.5 Fixed Fark & Propeller links, added missing i18n strings, added Yahoo Buzz 
* 2.9.4 Removed PopCurrent and Rawsugar as they no longer exist, renamed BlueDot to Faves
* 2.9.3 Added Leonaut, MySpace, fixed plugin description, added option to disable Sociable on a per post basis, added option to display sociable on tag pages, added extra security to config page, fixed print button, fixed Twitter functionality.
* 2.9.2 Added Swedish and Chinese localisations, thx to [Mikael Jorhult](http://www.mishkin.se/) and [Hugo Chen](http://take-ez.com/)
* 2.9.1 Fixed bug where jQuery UI would be loaded twice.
* 2.9 Removed Tool-Man in favor of jQuery, thx to Martin Joosse.
* 2.8.4 Bugfixes.
* 2.8.3 Added wikio.it, upnews.it, muti.co.za, makes LinkedIn work even better, and makes opening in a new window optional
* 2.8.2 Now adds icons to feeds with excerpts too, added LinkedIn
* 2.8.1 Fixed some small issues and made sure tagline shows up again
* 2.8 Added option to show bookmark icons in feed, added Ratimarks, fixed xhtml compliance, fixed blue dot bug
* 2.6.9 Fixed WP 2.6 compatibility
* 2.6.8 Updated documentation
* 2.6.7 Renamed Sk*rt to Kirtsy, Added designfloat, fixed description
* 2.5.4 Added HealthRanker, N4G, Meneame, BarraPunto, Laaik.it and E-mail option
* 2.5.3 Added Global Grind, Salesmarks, Webnews.de, Xerpi, Yigg
* 2.5.2 Added NuJIJ, eKudos, Sk-rt, Socialogs and MisterWong.de
* 2.5.1 Swapped Netscape for Propeller

Special thanks to [Robert Harm](http://www.die-truppe.com/) for coming up with loads of nice ideas.

== Installation ==

Download, Upgrading, Installation:

Upgrade

1. First deactivate Sociable
1. Remove the `sociable` directory

**Install**

1. Unzip the `sociable.zip` file. 
1. Upload the the `sociable` folder (not just the files in it!) to your `wp-contents/plugins` folder. If you're using FTP, use 'binary' mode.

**Activate**

1. In your WordPress administration, go to the Plugins page
1. Activate the Sociable plugin and a subpage for Sociable will appear
   in your Options menu.

If you find any bugs or have any ideas, please mail me.

**Advanced Users**

Sociable hooks `the_content()` and `the_excerpt()` to display without requiring theme editing. To heavily customize the display, use the admin panel to turn off the display on all pages, then add calls to your theme files:

This is optional extra customization for advanced users:
`&lt;?php if (function_exists(&#x27;sociable_html&#x27;)) { print sociable_html(); } ?&gt; // all active sites`
`&lt;?php if (function_exists(&#x27;sociable_html&#x27;)) { print sociable_html(Array(&quot;Reddit&quot;, &quot;del.icio.us&quot;)); } ?&gt; // only these sites if they are active`
