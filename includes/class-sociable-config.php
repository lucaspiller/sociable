<?php
/**
 * Manages plugin configuration stored in the database
 *
 * @since 4.4.0
 * @package Sociable
 */

/**
 * Manages plugin configuration stored in the database
 *
 * @since 4.4.0
 * @package Sociable
 */
class Sociable_Config {
	/**
	 * Resets the sociable classic configuration
	 *
	 * @since 4.4.0
	 */
	public static function sociable_reset() {
		self::sociable_delete();
		self::sociable_init();
	}

	/**
	 * Removes the sociable classic configuration
	 *
	 * @since 4.4.0
	 */
	public static function sociable_delete() {
		global $wpdb;

		// Delete all metadata from the database.
		$wpdb->query( "DELETE FROM $wpdb->postmeta WHERE meta_key = '_sociableoff'" );

		delete_option( 'sociable_options' );
		delete_option( 'sociable_known_sites' );
	}

	/**
	 * Initialises the sociable classic configuration
	 *
	 * @since 4.4.0
	 */
	public static function sociable_init() {
		global $sociable_options, $sociable_known_sites;

		$sociable_options = array(
			'pixel'                  => '',
			'version'                => '4.4.0',
			'automatic_mode'         => 'on',
			'tagline'                => 'Be Sociable, Share!',
			'custom_image_directory' => '',
			'use_stylesheet'         => 'on',
			'use_images'             => 'on',
			'use_alphamask'          => 'on',
			'new_window'             => 'on',
			'help_grow'              => '',
			'locations' => array(
				'is_single' => 'on',
				'is_page'   => 'on',
			 ),
			'active_sites' => array(
				'Twitter'             => 'on',
				'Facebook'            => 'on',
				'email'               => 'on',
				'vuible'              => 'on',
				'StumbleUpon'         => 'on',
				'Delicious'           => 'on',
				'LinkedIn'            => 'on',
				'More'                => 'on',
				'Twitter Counter'     => 'on',
				'Facebook Counter'    => 'on',
				'Google +'            => 'on',
				'LinkedIn Counter'    => 'on',
				'StumbleUpon Counter' => 'on',
			),
			'icon_size'    => '32',
			'icon_option'  => 'option1',
			'active'       => 1,
			'linksoptions' => '',
		);
		update_option( 'sociable_options', $sociable_options );

		$sociable_known_sites = array(
			'Facebook' => array(
				'favicon' => 'facebook.png',
				'url'     => 'http://www.facebook.com/share.php?u=PERMALINK&amp;t=TITLE',
				'spriteCoordinates' => array(
					'16' => array( '-48px','0px' ),
					'32' => array( '-96px','0px' ),
					'48' => array( '-144px','0px' ),
					'64' => array( '-192px','0px' ),
				),
			),
			'Facebook Counter' => array(
				'counter' => 1,
				'favicon' => 'likecounter.png',
				'url'     => '<iframe src="http://www.facebook.com/plugins/like.php?href=PERMALINKCOUNT&send=false&layout=button_count&show_faces=false&action=like&colorscheme=light&font" scrolling="no" frameborder="0" style="border:none; overflow:hidden;height:32px;width:100px" allowTransparency="true"></iframe>',
				'spriteCoordinates' => array(
					'16' => array( '-48px','0px' ),
					'32' => array( '-96px','0px' ),
					'48' => array( '-144px','0px' ),
					'64' => array( '-192px','0px' ),
				),
			),
			'Twitter' => array(
				'favicon' => 'twitter.png',
				'url'     => 'http://twitter.com/intent/tweet?text=TITLE%20-%20PERMALINK%20  SHARETAG',
				'spriteCoordinates' => array(
					'16' => array( '-144px','-16px' ),
					'32' => array( '-288px','-32px' ),
					'48' => array( '-432px','-48px' ),
					'64' => array( '-576px','-64px' ),
				),
			),
			'Twitter Counter' => array(
				'counter' => 1,
				'favicon' => 'twitter.png',
				'url'     => '<a href="https://twitter.com/share" data-text="TITLECOUNT - PERMALINKCOUNT" data-url="PERMALINKCOUNT" class="twitter-share-button" data-count="horizontal">Tweet</a><script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>',
				'spriteCoordinates' => array(
					'16' => array( '-144px','-16px' ),
					'32' => array( '-288px','-32px' ),
					'48' => array( '-432px','-48px' ),
					'64' => array( '-576px','-64px' ),
				),
			),
			'LinkedIn' => array(
				'favicon' => 'linkedin.png',
				'url'     => 'http://www.linkedin.com/shareArticle?mini=true&amp;url=PERMALINK&amp;title=TITLE&amp;source=BLOGNAME&amp;summary=EXCERPT',
				'spriteCoordinates' => array(
					'16' => array( '-144px','0px' ),
					'32' => array( '-288px','0px' ),
					'48' => array( '-432px','0px' ),
					'64' => array( '-576px','0px' ),
				),
			),
			'LinkedIn Counter' => array(
				'counter' => 1,
				'favicon' => 'linkedin.png',
				'url'     => '<script src="//platform.linkedin.com/in.js" type="text/javascript"></script><script type="IN/Share" data-url="PERMALINKCOUNT" data-counter="right"></script>',
				'spriteCoordinates' => array(
					'16' => array( '-144px','0px' ),
					'32' => array( '-288px','0px' ),
					'48' => array( '-432px','0px' ),
					'64' => array( '-576px','0px' ),
				),
			),
			'Delicious' => array(
				'favicon' => 'delicious.png',
				'url'     => 'http://delicious.com/post?url=PERMALINK&amp;title=TITLE&amp;notes=EXCERPT',
				'spriteCoordinates' => array(
					'16' => array( '-16px','0px' ),
					'32' => array( '-32px','0px' ),
					'48' => array( '-48px','0px' ),
					'64' => array( '-64px','0px' ),
				),
			),
			'Digg' => array(
				'favicon' => 'digg.png',
				'url'     => 'http://digg.com/submit?phase=2&amp;url=PERMALINK&amp;title=TITLE&amp;bodytext=EXCERPT',
				'spriteCoordinates' => array(
					'16' => array( '-32px','0px' ),
					'32' => array( '-64px','0px' ),
					'48' => array( '-96px','0px' ),
					'64' => array( '-128px','0px' ),
				),
			),
			'Reddit' => array(
				'favicon' => 'reddit.png',
				'url'     => 'http://reddit.com/submit?url=PERMALINK&amp;title=TITLE',
				'spriteCoordinates' => array(
					'16' => array( '-64px','-16px' ),
					'32' => array( '-128px','-32px' ),
					'48' => array( '-192px','-48px' ),
					'64' => array( '-256px','-64px' ),
				),
			),
			'StumbleUpon' => array(
				'favicon' => 'stumbleupon.png',
				'url'     => 'http://www.stumbleupon.com/submit?url=PERMALINK&title=TITLE',
				'spriteCoordinates' => array(
					'16' => array( '-112px','-16px' ),
					'32' => array( '-224px','-32px' ),
					'48' => array( '-336px','-48px' ),
					'64' => array( '-448px','-64px' ),
				),
			),
			'StumbleUpon Counter' => array(
				'counter' => 1,
				'favicon' => 'stumbleupon.png',
				'url'     => '<script src="//www.stumbleupon.com/hostedbadge.php?s=2&r=PERMALINKCOUNT"></script>',
				'spriteCoordinates' => array(
					'16' => array( '-112px','-16px' ),
					'32' => array( '-224px','-32px' ),
					'48' => array( '-336px','-48px' ),
					'64' => array( '-448px','-64px' ),
				),
			),
			'vuible' => array(
				'favicon' => 'vuible.png',
				'url'     => 'http://vuible.com/pins-settings/?m=bm&imgsrc=SOURCE&source=PERMALINK&title=TITLE&video=0',
				'spriteCoordinates' => array(
					'16' => array( '-112px','-16px' ),
					'32' => array( '-224px','-32px' ),
					'48' => array( '-336px','-48px' ),
					'64' => array( '-448px','-64px' ),
				),
			),
			'Google Bookmarks' => array(
				'favicon'     => 'google.png',
				'url'         => 'http://www.google.com/bookmarks/mark?op=edit&amp;bkmk=PERMALINK&amp;title=TITLE&amp;annotation=EXCERPT',
				'description' => 'Google Bookmarks',
				'spriteCoordinates' => array(
					'16' => array( '-96px','0px' ),
					'32' => array( '-192px','0px' ),
					'48' => array( '-288px','0px' ),
					'64' => array( '-384px','0px' ),
				),
			),
			'Google +' => array(
				'counter'     => 1,
				'favicon'     => 'google.png',
				'url'         => '<g:plusone annotation="bubble" href="PERMALINKCOUNT" size="medium"></g:plusone>',
				'description' => 'Google Bookmarks',
				'spriteCoordinates' => array(
					'16' => array( '-96px','0px' ),
					'32' => array( '-192px','0px' ),
					'48' => array( '-288px','0px' ),
					'64' => array( '-384px','0px' ),
				),
			),
			'HackerNews' => array(
				'favicon' => 'hacker_news.png',
				'url'     => 'http://news.ycombinator.com/submitlink?u=PERMALINK&amp;t=TITLE',
				'spriteCoordinates' => array(
					'16' => array( '-128px','0px' ),
					'32' => array( '-256px','0px' ),
					'48' => array( '-384px','0px' ),
					'64' => array( '-512px','0px' ),
				),
			),
			'Tumblr' => array(
				'favicon' => 'tumblr.png',
				'url'     => 'http://www.tumblr.com/share?v=3&amp;u=PERMALINK&amp;t=TITLE&amp;s=EXCERPT',
				'spriteCoordinates' => array(
					'16' => array( '-128px','-16px' ),
					'32' => array( '-256px','-32px' ),
					'48' => array( '-384px','-48px' ),
					'64' => array( '-512px','-64px' ),
				),
				'supportsIframe' => false,
			),
			'email' => array(
				'favicon' => 'gmail.png',
				'url'     => 'https://mail.google.com/mail/?view=cm&fs=1&to&su=TITLE&body=PERMALINK&ui=2&tf=1&shva=1',
				'spriteCoordinates' => array(
					'16' => array( '-80px','0px' ),
					'32' => array( '-160px','0px' ),
					'48' => array( '-240px','0px' ),
					'64' => array( '-320px','0px' ),
				),
				'supportsIframe' => false,
			),
			'More' => array(
				'favicon' => 'more.png',
				'url'     => 'javascript:more();',
				'spriteCoordinates' => array(
					'16' => array( '0px','0px' ),
					'32' => array( '0px','0px' ),
					'48' => array( '0px','0px' ),
					'64' => array( '0px','0px' ),
				),
			),
		);
		update_option( 'sociable_known_sites' , $sociable_known_sites );
	}

	/**
	 * Resets the skyscraper configuration
	 *
	 * @since 4.4.0
	 */
	public static function skyscraper_reset() {
		self::skyscraper_delete();
		self::skyscraper_init();
	}

	/**
	 * Removes the skyscraper configuration
	 *
	 * @since 4.4.0
	 */
	public static function skyscraper_delete() {
		delete_option( 'skyscraper_options' );
		delete_option( 'skyscraper_latest' );
		delete_option( 'skyscraper_mentions' );
	}

	/**
	 * Initialises the skyscraper configuration
	 *
	 * @since 4.4.0
	 */
	public static function skyscraper_init() {
		global $skyscraper_options, $skyscraper_latest, $skyscraper_mentions;

		$skyscraper_options = array(
			'pixel'            => '',
			'version'          => '1.0',
			'widget_width'     => '60px',
			'widget_position'  => '1',
			'background_color' => '#fefefe',
			'labels_color'     => '#f7f7f7',
			'text_size'        => '10px',
			'counters' => array(
				'check'  => '1',
				'folded' => '1',
			),
			'share' => array(
				'check'  => '1',
				'folded' => '1',
			),
			'num_tweets' => 3,
			'num_rss'    => 3,
			'locations' => array(
				'is_front_page' => 1,
				'is_home'       => 1,
				'is_single'     => 1,
				'is_page'       => 1,
				'is_category'   => 1,
				'is_date'       => 1,
				'is_tag'        => 1,
				'is_author'     => 1,
				'is_search'     => 1,
				'is_rss'        => 1,
			),
			'counters' => array(
				'check'  => 1,
				'folded' => 1,
			),
			'share' => array(
				'check'  => 1,
				'folded' => 1,
			),
			'sociable_banner'            => '',
			'sociable_banner_timer'      => 15,
			'sociable_banner_text'       => 'Please spread the word: Be Sociable, Share!',
			'sociable_banner_colorBack'  => '#FFFFFF',
			'sociable_banner_fontSize'   => '9px',
			'sociable_banner_colorLabel' => '#F7F7F7',
			'sociable_banner_colorFont'  => '#6A6A6A',
			'accept_read_twitter'        => '',
			'accept_read_rss'            => '',
		);
		update_option( 'skyscraper_options', $skyscraper_options );

		$skyscraper_latest = array();
		update_option( 'skyscraper_latest', $skyscraper_latest );

		$skyscraper_mentions = array();
		update_option( 'skyscraper_mentions', $skyscraper_mentions );
	}

	/**
	 * Loads the data.
	 *
	 * @since 4.4.0
	 */
	public static function load() {
		global $sociable_options, $skyscraper_options, $skyscraper_latest, $skyscraper_mentions, $sociable_known_sites;

		// Load plugin options, n.b. these are globals.
		$sociable_options     = get_option( 'sociable_options' );
		$skyscraper_options   = get_option( 'skyscraper_options' );
		$skyscraper_latest    = get_option( 'skyscraper_latest' );
		$skyscraper_mentions  = get_option( 'skyscraper_mentions' );
		$sociable_known_sites = get_option( 'sociable_known_sites' );
	}

	/**
	 * Check whether the data needs to be upgraded.
	 *
	 * @since 4.4.0
	 */
	public static function check_for_upgrade() {
		global $sociable_options;

		if ( ! isset( $sociable_options['icon_size'] ) || '' === $sociable_options['icon_size'] || ! isset( $sociable_options['version'] ) ) {

			// Either the configuration isn't present, or we have upgraded from a
			// very old version.
			self::sociable_reset();
			self::skyscraper_reset();

		} else {

			self::remove_old_networks();

		}
	}

	/**
	 * Removes old social networks that are no longer supported.
	 *
	 * @since 4.4.0
	 */
	public static function remove_old_networks() {
		global $sociable_known_sites;
		global $sociable_options;

		$needs_update = false;

		$removed_sites = array(
			'Add to favorites',
			'Google Reader',
			'Digg Counter',
			'vuible Counter',
			'BlinkList',
			'MSNReporter',
			'Myspace',
			'Sphinn',
			'Posterous',
		);

		foreach ( $removed_sites as $site ) {
			if ( isset( $sociable_options['active_sites'][ $site ] ) || isset( $sociable_known_sites[ $site ] ) ) {
				unset( $sociable_options['active_sites'][ $site ] );
				unset( $sociable_known_sites[ $site ] );
				$needs_update = true;
			}
		}

		if ( $needs_update ) {
			delete_option( 'sociable_options' );
			add_option( 'sociable_options', $sociable_options );
			delete_option( 'sociable_known_sites' );
			add_option( 'sociable_known_sites', $sociable_known_sites );
		}
	}
}

?>
