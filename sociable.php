<?php
/*
Plugin Name: Sociable
Plugin URI: http://yoast.com/wordpress/sociable/
Description: Automatically add links on your posts, pages and RSS feed to your favorite social bookmarking sites. Go to <a href="options-general.php?page=Sociable">Settings -> Sociable</a> for setup.
Version: 3.0.3
Author: Joost de Valk
Author URI: http://yoast.com/

Copyright 2006 Peter Harkins (ph@malaprop.org)
Copyright 2008 Joost de Valk (joost@joostdevalk.nl)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

// Pre-2.6 compatibility
if ( !defined('WP_CONTENT_URL') )
    define( 'WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
if ( !defined('WP_CONTENT_DIR') )
    define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
 
// Guess the location
$sociablepluginpath = WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)).'/';

function sociable_init_locale(){
	global $sociablepluginpath;
	load_plugin_textdomain('sociable', $sociablepluginpath);
}
add_filter('init', 'sociable_init_locale');

$sociable_known_sites = Array(

	'BarraPunto' => Array(
		'favicon' => 'barrapunto.png',
		'url' => 'http://barrapunto.com/submit.pl?subj=TITLE&amp;story=PERMALINK',
	),
	
	'blinkbits' => Array(
		'favicon' => 'blinkbits.png',
		'url' => 'http://www.blinkbits.com/bookmarklets/save.php?v=1&amp;source_url=PERMALINK&amp;title=TITLE&amp;body=TITLE',
	),

	'BlinkList' => Array(
		'favicon' => 'blinklist.png',
		'url' => 'http://www.blinklist.com/index.php?Action=Blink/addblink.php&amp;Url=PERMALINK&amp;Title=TITLE',
	),

	'BlogMemes' => Array(
		'favicon' => 'blogmemes.png',
		'url' => 'http://www.blogmemes.net/post.php?url=PERMALINK&amp;title=TITLE',
	),

	'BlogMemes Fr' => Array(
		'favicon' => 'blogmemes.png',
		'url' => 'http://www.blogmemes.fr/post.php?url=PERMALINK&amp;title=TITLE',
	),

	'BlogMemes Sp' => Array(
		'favicon' => 'blogmemes.png',
		'url' => 'http://www.blogmemes.com/post.php?url=PERMALINK&amp;title=TITLE',
	),

	'BlogMemes Cn' => Array(
		'favicon' => 'blogmemes.png',
		'url' => 'http://www.blogmemes.cn/post.php?url=PERMALINK&amp;title=TITLE',
	),

	'BlogMemes Jp' => Array(
		'favicon' => 'blogmemes.png',
		'url' => 'http://www.blogmemes.jp/post.php?url=PERMALINK&amp;title=TITLE',
	),

	'blogmarks' => Array(
		'favicon' => 'blogmarks.png',
		'url' => 'http://blogmarks.net/my/new.php?mini=1&amp;simple=1&amp;url=PERMALINK&amp;title=TITLE',
	),

	'Blogosphere News' => Array(
		'favicon' => 'blogospherenews.gif',
		'url' => 'http://www.blogospherenews.com/submit.php?url=PERMALINK&amp;title=TITLE',
	),

	'Blogsvine' => Array(
		'favicon' => 'blogsvine.png',
		'url' => 'http://blogsvine.com/submit.php?url=PERMALINK',
	),
	
	'blogtercimlap' => Array(
		'favicon' => 'blogter.png',
		'url' => 'http://cimlap.blogter.hu/index.php?action=suggest_link&amp;title=TITLE&amp;url=PERMALINK',
	),

	'Faves' => Array(
		'favicon' => 'bluedot.png',
		'url' => 'http://faves.com/Authoring.aspx?u=PERMALINK&amp;title=TITLE',
	),

	'Book.mark.hu' => Array(
		'favicon' => 'bookmarkhu.png',
		'url' => 'http://book.mark.hu/bookmarks.php/?action=add&amp;address=PERMALINK%2F&amp;title=TITLE',
                'description' => 'description',
	),

	'Bumpzee' => Array(
		'favicon' => 'bumpzee.png',
		'url' => 'http://www.bumpzee.com/bump.php?u=PERMALINK',
	),

	'co.mments' => Array(
		'favicon' => 'co.mments.gif',
		'url' => 'http://co.mments.com/track?url=PERMALINK&amp;title=TITLE',
	),

	'connotea' => Array(
		'favicon' => 'connotea.png',
		'url' => 'http://www.connotea.org/addpopup?continue=confirm&amp;uri=PERMALINK&amp;title=TITLE',
	),


	'del.icio.us' => Array(
		'favicon' => 'delicious.png',
		'url' => 'http://del.icio.us/post?url=PERMALINK&amp;title=TITLE',
	),

	'De.lirio.us' => Array(
		'favicon' => 'delirious.png',
		'url' => 'http://de.lirio.us/rubric/post?uri=PERMALINK;title=TITLE;when_done=go_back',
	),

	'Design Float' => Array(
		'favicon' => 'designfloat.gif',
		'url' => 'http://www.designfloat.com/submit.php?url=PERMALINK&amp;title=TITLE',
	),

	'Digg' => Array(
		'favicon' => 'digg.png',
		'url' => 'http://digg.com/submit?phase=2&amp;url=PERMALINK&amp;title=TITLE',
		'description' => 'Digg',
	),

	'DotNetKicks' => Array(
		'favicon' => 'dotnetkicks.png',
		'url' => 'http://www.dotnetkicks.com/kick/?url=PERMALINK&amp;title=TITLE',
		'description' => 'description',
	),

	'DZone' => Array(
		'favicon' => 'dzone.png',
		'url' => 'http://www.dzone.com/links/add.html?url=PERMALINK&amp;title=TITLE',
		'description' => 'description',
	),

	'eKudos' => Array(
		'favicon' => 'ekudos.gif',
		'url' => 'http://www.ekudos.nl/artikel/nieuw?url=PERMALINK&amp;title=TITLE',
	),

	'email' => Array(
		'favicon' => 'email_link.png',
		'url' => 'mailto:?subject=TITLE&amp;body=PERMALINK',
		'description' => __('E-mail this story to a friend!','sociable'),
	),

	'Facebook' => Array(
		'favicon' => 'facebook.png',
		'url' => 'http://www.facebook.com/share.php?u=PERMALINK&amp;t=TITLE',
	),

	'Fark' => Array(
		'favicon' => 'fark.png',
		'url' => 'http://cgi.fark.com/cgi/fark/farkit.pl?h=TITLE&amp;u=PERMALINK',
	),

	'feedmelinks' => Array(
		'favicon' => 'feedmelinks.png',
		'url' => 'http://feedmelinks.com/categorize?from=toolbar&amp;op=submit&amp;url=PERMALINK&amp;name=TITLE',
	),

	'Furl' => Array(
		'favicon' => 'furl.png',
		'url' => 'http://www.furl.net/storeIt.jsp?u=PERMALINK&amp;t=TITLE',
	),

	'Fleck' => Array(
		'favicon' => 'fleck.gif',
		'url' => 'http://extension.fleck.com/?v=b.0.804&amp;url=PERMALINK',
	),

	'GeenRedactie' => array(
		'favicon' => 'geenredactie.png',
		'url'=> 'http://www.geenredactie.nl/submit?url=PERMALINK&amp;title=TITLE'
	),
	
	'Global Grind' => Array (
		'favicon' => 'globalgrind.gif',
		'url' => 'http://globalgrind.com/submission/submit.aspx?url=PERMALINK&amp;type=Article&amp;title=TITLE'
	),
	
	'Google' => Array (
		'favicon' => 'googlebookmark.png',
		'url' => 'http://www.google.com/bookmarks/mark?op=edit&amp;bkmk=PERMALINK&amp;title=TITLE'
	),
	
	'Gwar' => Array(
		'favicon' => 'gwar.gif',
		'url' => 'http://www.gwar.pl/DodajGwar.html?u=PERMALINK',
	),

	'Haohao' => Array(
		'favicon' => 'haohao.png',
		'url' => 'http://www.haohaoreport.com/submit.php?url=PERMALINK&amp;title=TITLE',
	),

	'HealthRanker' => Array(
		'favicon' => 'healthranker.gif',
		'url' => 'http://healthranker.com/submit.php?url=PERMALINK&amp;title=TITLE',
	),

	'Hemidemi' => Array(
		'favicon' => 'hemidemi.png',
		'url' => 'http://www.hemidemi.com/user_bookmark/new?title=TITLE&amp;url=PERMALINK',
	),

	'IndianPad' => Array(
		'favicon' => 'indianpad.png',
		'url' => 'http://www.indianpad.com/submit.php?url=PERMALINK',
	),

	'Internetmedia' => Array(
		'favicon' => 'im.png',
		'url' => 'http://internetmedia.hu/submit.php?url=PERMALINK'
	),

	'kick.ie' => Array(
		'favicon' => 'kickit.png',
		'url' => 'http://kick.ie/submit/?url=PERMALINK&amp;title=TITLE',
	),

	'Kirtsy' => Array(
		'favicon' => 'kirtsy.gif',
		'url' => 'http://www.kirtsy.com/submit.php?url=PERMALINK&amp;title=TITLE',
	),

	'laaik.it' => Array(
		'favicon' => 'laaikit.png',
		'url' => 'http://laaik.it/NewStoryCompact.aspx?uri=PERMALINK&amp;headline=TITLE&amp;cat=5e082fcc-8a3b-47e2-acec-fdf64ff19d12',
	),

	'Leonaut' => Array(
		'favicon' => 'leonaut.gif',
		'url' => 'http://www.leonaut.com/submit.php?url=PERMALINK&amp;title=TITLE'
	),
	
	'LinkArena' => Array(
		'favicon' => 'linkarena.gif',
		'url' => 'http://linkarena.com/bookmarks/addlink/?url=PERMALINK&amp;title=TITLE',
	),
	
	'LinkaGoGo' => Array(
		'favicon' => 'linkagogo.png',
		'url' => 'http://www.linkagogo.com/go/AddNoPopup?url=PERMALINK&amp;title=TITLE',
	),

	'LinkedIn' => Array(
		'favicon' => 'linkedin.png',
		'url' => 'http://www.linkedin.com/shareArticle?mini=true&amp;url=PERMALINK&amp;title=TITLE&amp;source=BLOGNAME&amp;summary=EXCERPT',
	),

	'Linkter' => Array(
		'favicon' => 'linkter.png',
		'url' => 'http://www.linkter.hu/index.php?action=suggest_link&amp;url=PERMALINK&amp;title=TITLE',
	),
	
	'Live' => Array(
		'favicon' => 'live.png',
		'url' => 'https://favorites.live.com/quickadd.aspx?marklet=1&amp;url=PERMALINK&amp;title=TITLE',
	),

	'Ma.gnolia' => Array(
		'favicon' => 'magnolia.png',
		'url' => 'http://ma.gnolia.com/bookmarklet/add?url=PERMALINK&amp;title=TITLE',
	),

	'Meneame' => Array(
		'favicon' => 'meneame.gif',
		'url' => 'http://meneame.net/submit.php?url=PERMALINK',
	),
	
	'MisterWong' => Array(
		'favicon' => 'misterwong.gif',
		'url' => 'http://www.mister-wong.com/addurl/?bm_url=PERMALINK&amp;bm_description=TITLE&amp;plugin=soc',
	),

	'MisterWong.DE' => Array(
		'favicon' => 'misterwong.gif',
		'url' => 'http://www.mister-wong.de/addurl/?bm_url=PERMALINK&amp;bm_description=TITLE&amp;plugin=soc',
	),
	
	'Mixx' => Array(
		'favicon' => 'mixx.png',
		'url' => 'http://www.mixx.com/submit?page_url=PERMALINK&amp;title=TITLE',
	),
	
	'muti' => Array(
		'favicon' => 'muti.png',
		'url' => 'http://www.muti.co.za/submit?url=PERMALINK&amp;title=TITLE',
	),
	
	'MyShare' => Array(
		'favicon' => 'myshare.png',
		'url' => 'http://myshare.url.com.tw/index.php?func=newurl&amp;url=PERMALINK&amp;desc=TITLE',
	),

	'MySpace' => Array(
		'favicon' => 'myspace.png',
		'url' => 'http://www.myspace.com/Modules/PostTo/Pages/?u=PERMALINK&amp;t=TITLE',
	),

	'N4G' => Array(
		'favicon' => 'n4g.gif',
		'url' => 'http://www.n4g.com/tips.aspx?url=PERMALINK&amp;title=TITLE',
	),
	
	'NewsVine' => Array(
		'favicon' => 'newsvine.png',
		'url' => 'http://www.newsvine.com/_tools/seed&amp;save?u=PERMALINK&amp;h=TITLE',
	),

	'Netvouz' => Array(
		'favicon' => 'netvouz.png',
		'url' => 'http://www.netvouz.com/action/submitBookmark?url=PERMALINK&amp;title=TITLE&amp;popup=no',
	),

	'NuJIJ' => Array(
		'favicon' => 'nujij.gif',
		'url' => 'http://nujij.nl/jij.lynkx?t=TITLE&amp;u=PERMALINK',
	),
	
	'Ping.fm' => Array(
		'favicon' => 'ping.gif',
		'url' => 'http://ping.fm/ref/?link=PERMALINK&amp;title=TITLE',
	),

	'PlugIM' => Array(
		'favicon' => 'plugim.png',
		'url' => 'http://www.plugim.com/submit?url=PERMALINK&amp;title=TITLE',
	),

	'Pownce' => Array(
		'favicon' => 'pownce.gif',
		'url' => 'http://pownce.com/send/link/?url=PERMALINK&amp;note_body=TITLE&amp;note_to=all'
	),

	'ppnow' => Array(
		'favicon' => 'ppnow.png',
		'url' => 'http://www.ppnow.net/submit.php?url=PERMALINK',
	),
	
	'Print' => Array(
		'favicon' => 'printer.png',
		'url' => 'javascript:window.print();',
		'description' => __('Print this article!', 'sociable'),
	),
	
	'Propeller' => Array(
		'favicon' => 'propeller.gif',
		'url' => 'http://www.propeller.com/submit/?url=PERMALINK',
	),

	'Ratimarks' => Array(
		'favicon' => 'ratimarks.png',
		'url' => 'http://ratimarks.org/bookmarks.php/?action=add&address=PERMALINK&amp;title=TITLE',
	),

	'Rec6' => Array(
		'favicon' => 'rec6.gif',
		'url' => 'http://www.syxt.com.br/rec6/link.php?url=PERMALINK&amp;=TITLE',
	),

	'Reddit' => Array(
		'favicon' => 'reddit.png',
		'url' => 'http://reddit.com/submit?url=PERMALINK&amp;title=TITLE',
	),

	'SalesMarks' => Array(
		'favicon' => 'salesmarks.gif',
		'url' => 'http://salesmarks.com/submit?edit[url]=PERMALINK&amp;edit[title]=TITLE',
	),
	
	'Scoopeo' => Array(
		'favicon' => 'scoopeo.png',
		'url' => 'http://www.scoopeo.com/scoop/new?newurl=PERMALINK&amp;title=TITLE',
	),	

	'scuttle' => Array(
		'favicon' => 'scuttle.png',
		'url' => 'http://www.scuttle.org/bookmarks.php/maxpower?action=add&amp;address=PERMALINK&amp;title=TITLE',
                'description' => 'description',
	),

	'Segnalo' => Array(
		'favicon' => 'segnalo.gif',
		'url' => 'http://segnalo.alice.it/post.html.php?url=PERMALINK&amp;title=TITLE',
	),

	'Shadows' => Array(
		'favicon' => 'shadows.png',
		'url' => 'http://www.shadows.com/features/tcr.htm?url=PERMALINK&amp;title=TITLE',
	),

	'Simpy' => Array(
		'favicon' => 'simpy.png',
		'url' => 'http://www.simpy.com/simpy/LinkAdd.do?href=PERMALINK&amp;title=TITLE',
	),

	'Slashdot' => Array(
		'favicon' => 'slashdot.png',
		'url' => 'http://slashdot.org/bookmark.pl?title=TITLE&amp;url=PERMALINK',
	),

	'Smarking' => Array(
		'favicon' => 'smarking.png',
		'url' => 'http://smarking.com/editbookmark/?url=PERMALINK&amp;title=TITLE',
	),

	'Socialogs' => Array(
		'favicon' => 'socialogs.gif',
		'url' => 'http://socialogs.com/add_story.php?story_url=PERMALINK&amp;story_title=TITLE',
	),
	
	'Spurl' => Array(
		'favicon' => 'spurl.png',
		'url' => 'http://www.spurl.net/spurl.php?url=PERMALINK&amp;title=TITLE',
	),

	'SphereIt' => Array(
		'favicon' => 'sphere.png',
		'url' => 'http://www.sphere.com/search?q=sphereit:PERMALINK&amp;title=TITLE',
	),

	'Sphinn' => Array(
		'favicon' => 'sphinn.gif',
		'url' => 'http://sphinn.com/submit.php?url=PERMALINK&amp;title=TITLE',
	),

	'StumbleUpon' => Array(
		'favicon' => 'stumbleupon.png',
		'url' => 'http://www.stumbleupon.com/submit?url=PERMALINK&amp;title=TITLE',
	),

	'Symbaloo' => Array(
		'favicon' => 'symbaloo.png',
		'url' => 'http://www.symbaloo.com/nl/add/url=PERMALINK&amp;title=TITLE&amp;icon=http%3A//static01.symbaloo.com/_img/favicon.png',
	),
	
	'Taggly' => Array(
		'favicon' => 'taggly.png',
		'url' => 'http://taggly.com/bookmarks.php/pass?action=add&amp;address=',
	),

	'Technorati' => Array(
		'favicon' => 'technorati.png',
		'url' => 'http://technorati.com/faves?add=PERMALINK',
	),

	'TailRank' => Array(
		'favicon' => 'tailrank.png',
		'url' => 'http://tailrank.com/share/?text=&amp;link_href=PERMALINK&amp;title=TITLE',
	),

	'ThisNext' => Array(
		'favicon' => 'thisnext.png',
		'url' => 'http://www.thisnext.com/pick/new/submit/sociable/?url=PERMALINK&amp;name=TITLE',
	),

	'Tipd' => Array(
		'favicon' => 'tipd.png',
		'url' => 'http://tipd.com/submit.php?url=PERMALINK',
	),
	
	'Tumblr' => Array(
		'favicon' => 'tumblr.gif',
		'url' => 'http://www.tumblr.com/share?v=3&amp;u=PERMALINK&amp;t=TITLE&amp;s=',
	),
		
	'TwitThis' => Array(
		'favicon' => 'twitter.gif',
		'url' => 'http://twitter.com/home?status=PERMALINK',
	),

	'Upnews' => Array(
			'favicon' => 'upnews.gif',
			'url' => 'http://www.upnews.it/submit?url=PERMALINK&amp;title=TITLE',
	),
	
	'Webnews.de' => Array(
        'favicon' => 'webnews.gif',
        'url' => 'http://www.webnews.de/einstellen?url=PERMALINK&amp;title=TITLE',
    ),

	'Webride' => Array(
		'favicon' => 'webride.png',
		'url' => 'http://webride.org/discuss/split.php?uri=PERMALINK&amp;title=TITLE',
	),

	'Wikio' => Array(
		'favicon' => 'wikio.gif',
		'url' => 'http://www.wikio.com/vote?url=PERMALINK',
	),

	'Wikio FR' => Array(
		'favicon' => 'wikio.gif',
		'url' => 'http://www.wikio.fr/vote?url=PERMALINK',
	),

	'Wikio IT' => Array(
		'favicon' => 'wikio.gif',
		'url' => 'http://www.wikio.it/vote?url=PERMALINK',
	),
	
	'Wists' => Array(
		'favicon' => 'wists.png',
		'url' => 'http://wists.com/s.php?c=&amp;r=PERMALINK&amp;title=TITLE',
		'class' => 'wists',
	),

	'Wykop' => Array(
		'favicon' => 'wykop.gif',
		'url' => 'http://www.wykop.pl/dodaj?url=PERMALINK',
	),

	'Xerpi' => Array(
		'favicon' => 'xerpi.gif',
		'url' => 'http://www.xerpi.com/block/add_link_from_extension?url=PERMALINK&amp;title=TITLE',
	),

	'YahooBuzz' => Array(
		'favicon' => 'yahoobuzz.gif',
		'url' => 'http://buzz.yahoo.com/submit/?submitUrl=PERMALINK&amp;submitHeadline=TITLE&amp;submitSummary=EXCERPT&amp;submitCategory=science&amp;submitAssetType=text',
		'description' => 'Yahoo! Buzz',
	),
	
	'YahooMyWeb' => Array(
		'favicon' => 'yahoomyweb.png',
		'url' => 'http://myweb2.search.yahoo.com/myresults/bookmarklet?u=PERMALINK&amp;=TITLE',
	),

	'Yigg' => Array(
		'favicon' => 'yiggit.png',
		'url' => 'http://yigg.de/neu?exturl=PERMALINK&amp;exttitle=TITLE',
	 ),
);

// For maintaining backwards compatability
if (!function_exists('strip_shortcodes')) {
	function strip_shortcodes($content) {
		return $content;
	}
}

function sociable_html($display=Array()) {
	global $sociable_known_sites, $sociablepluginpath, $wp_query, $post; 

	$sociableooffmeta = get_post_meta($post->ID,'sociableoff',true);
	if ($sociableooffmeta == "true") {
		return "";
	}

	$active_sites = get_option('sociable_active_sites');

	$html = "";

	$imagepath = $sociablepluginpath.'images/';

	// if no sites are specified, display all active
	// have to check $active_sites has content because WP
	// won't save an empty array as an option
	if (empty($display) and $active_sites)
		$display = $active_sites;
	// if no sites are active, display nothing
	if (empty($display))
		return "";

	// Load the post's data
	$blogname 	= urlencode(get_bloginfo('name')." ".get_bloginfo('description'));
	$post 		= $wp_query->post;
	
	$excerpt	= urlencode(strip_tags(strip_shortcodes($post->post_excerpt)));
	if ($excerpt == "") {
		$excerpt = urlencode(substr(strip_tags(strip_shortcodes($post->post_content)),0,250));
	}
	$excerpt	= str_replace('+','%20',$excerpt);
	
	$permalink 	= urlencode(get_permalink($post->ID));
	
	$title 		= urlencode($post->post_title);
	$title 		= str_replace('+','%20',$title);
	
	$rss 		= urlencode(get_bloginfo('ref_url'));

	$html .= "\n<div class=\"sociable\">\n";
	
	$tagline = get_option("sociable_tagline");
	if ($tagline != "") {
		$html .= "<div class=\"sociable_tagline\">\n";
		$html .= stripslashes($tagline);
		$html .= "\n</div>";
	}
	
	$html .= "\n<ul>\n";

	foreach($display as $sitename) {
		// if they specify an unknown or inactive site, ignore it
		if (!in_array($sitename, $active_sites))
			continue;

		$site = $sociable_known_sites[$sitename];

		$url = $site['url'];
		$url = str_replace('PERMALINK', $permalink, $url);
		$url = str_replace('TITLE', $title, $url);
		$url = str_replace('RSS', $rss, $url);
		$url = str_replace('BLOGNAME', $blogname, $url);
		$url = str_replace('EXCERPT', $excerpt, $url);

		if (isset($site['description']) && $site['description'] != "") {
			$description = $site['description'];
		} else {
			$description = $sitename;
		}
		$link = "<li>";		
		$link .= "<a rel=\"nofollow\"";
		if (get_option('sociable_usetargetblank') && $site['url'] != 'javascript:window.print();') {
			$link .= " target=\"_blank\"";
		}
		$link .= " href=\"$url\" title=\"$description\">";
		$link .= "<img src=\"".$imagepath.$site['favicon']."\" title=\"$description\" alt=\"$description\" class=\"sociable-hovers";
		if (isset($site['class']) && $site['class'])
			$link .= " sociable_{$site['class']}";
		$link .= "\" />";
		$link .= "</a></li>";
		
		$html .= "\t".apply_filters('sociable_link',$link)."\n";
	}

	$html .= "</ul>\n</div>\n";

	return $html;
}

// Hook the_content to output html if we should display on any page
$sociable_contitionals = get_option('sociable_conditionals');
if (is_array($sociable_contitionals) and in_array(true, $sociable_contitionals)) {
	add_filter('the_content', 'sociable_display_hook');
	add_filter('the_excerpt', 'sociable_display_hook');
	// add_filter('the_excerpt_rss', 'sociable_display_hook');
	
	function sociable_display_hook($content='') {
		$conditionals = get_option('sociable_conditionals');
		if ((is_home()     and $conditionals['is_home']) or
		    (is_single()   and $conditionals['is_single']) or
		    (is_page()     and $conditionals['is_page']) or
		    (is_category() and $conditionals['is_category']) or
			(is_tag() 	   and $conditionals['is_tag']) or
		    (is_date()     and $conditionals['is_date']) or
			(is_author()   and $conditionals['is_author']) or
		    (is_search()   and $conditionals['is_search'])) {
			$content .= sociable_html();
		} elseif ((is_feed() and $conditionals['is_feed'])) {
			$sociable_html = sociable_html();
			$sociable_html = strip_tags($sociable_html,"<a><img>");
			$sociable_html = str_replace('<a rel="nofollow" title="Print this article!"><img src="'.$imagepath.'printer.png" title="Print this article!" alt="Print this article!" class="sociable-hovers" /></a>','',$sociable_html);
			$content .= $sociable_html . "<br/><br/>";
		}
		return $content;
	}
}

// Hook wp_head to add css
add_action('wp_head', 'sociable_wp_head');
function sociable_wp_head() {
	global $sociablepluginpath;
	if (in_array('Wists', get_option('sociable_active_sites'))) {
		echo '<script language="JavaScript" type="text/javascript" src="' . $sociablepluginpath . 'wists.js"></script>'."\n";
	}
	if (get_option('sociable_usecss') == true) {
		echo '<link rel="stylesheet" type="text/css" media="screen" href="' . $sociablepluginpath . 'sociable.css" />'."\n";
	}
}

// Plugin config/data setup
register_activation_hook(__FILE__, 'sociable_activation_hook');

function sociable_activation_hook() {
	return sociable_restore_config(False);
}

// restore built-in defaults, optionally overwriting existing values
function sociable_restore_config($force=False) {
	// Load defaults, taking care not to smash already-set options
	global $sociable_known_sites;

	if ($force or !is_array(get_option('sociable_active_sites')))
		update_option('sociable_active_sites', array(
			'Digg',
			'Sphinn',
			'del.icio.us',
			'Facebook',
			'Mixx',
			'Google',
		));

	// tagline defaults to a Hitchiker's Guide to the Galaxy reference
	if ($force or !is_string(get_option('sociable_tagline')))
		update_option('sociable_tagline', "<strong>" . __("Share and Enjoy:", 'sociable') . "</strong>");

	// only display on single posts and pages by default
	if ($force or !is_array(get_option('sociable_conditionals')))
		update_option('sociable_conditionals', array(
			'is_home' => False,
			'is_single' => True,
			'is_page' => True,
			'is_category' => False,
			'is_tag' => False,
			'is_date' => False,
			'is_search' => False,
			'is_author' => False,
			'is_feed' => False,
		));

	if ($force or !is_bool(get_option('usecss')))
		update_option('sociable_usecss', true);
}

// Hook the admin_menu display to add admin page
add_action('admin_menu', 'sociable_admin_menu');
function sociable_admin_menu() {
	add_submenu_page('options-general.php', 'Sociable', 'Sociable', 8, 'Sociable', 'sociable_submenu');
}

// Admin page header
add_action('admin_head', 'sociable_admin_head');
function sociable_admin_head() {
	if (isset($_GET['page']) && $_GET['page'] == 'Sociable') {
		global $sociablepluginpath, $wp_version;

		if ($wp_version < "2.6") { 
			echo '<script language="JavaScript" type="text/javascript" src="'.$sociablepluginpath.'jquery/jquery.js"></script>';
		} 
	?>
	<script language="JavaScript" type="text/javascript" src="<?php echo $sociablepluginpath; ?>jquery/ui.core.js"></script>
	<script language="JavaScript" type="text/javascript" src="<?php echo $sociablepluginpath; ?>jquery/ui.sortable.js"></script>
	<script language="JavaScript" type="text/javascript"><!--
	jQuery(document).ready(function(){
	  jQuery("#sociable_site_list").sortable({});
	});
	/* make checkbox action prettier */
	function toggle_checkbox(id) {
		var checkbox = document.getElementById(id);

		checkbox.checked = !checkbox.checked;
		if (checkbox.checked)
			checkbox.parentNode.className = 'active';
		else
			checkbox.parentNode.className = 'inactive';
	}
	--></script>

	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $sociablepluginpath; ?>sociable-admin.css" />
<?php
	}
}

function sociable_message($message) {
	echo "<div id=\"message\" class=\"updated fade\"><p>$message</p></div>\n";
}

function sociable_meta() {
	global $post;
	$sociableoff = false;
	$sociableoffmeta = get_post_meta($post->ID,'sociableoff',true);
	if ($sociableoffmeta == "true") {
		$sociableoff = true;
	}
	?>
	<input type="checkbox" name="sociableoff" <?php if ($sociableoff) { echo 'checked="checked"'; } ?>/> Sociable disabled?
	<?php
}

function sociable_option() {
	global $post;
	$sociableoff = false;
	$sociableoffmeta = get_post_meta($post->ID,'sociableoff',true);
	if ($sociableoffmeta == "true") {
		$sociableoff = true;
	}
	if ( current_user_can('edit_posts') ) { ?>
	<fieldset id="sociableoption" class="dbx-box">
	<h3 class="dbx-handle">Sociable</h3>
	<div class="dbx-content">
		<input type="checkbox" name="sociableon" <?php if ($sociableoff) { echo 'checked="checked"'; } ?>/> Sociable disabled?
	</div>
	</fieldset>
	<?php 
	}
}

function sociable_meta_box() {
	// Check whether the 2.5 function add_meta_box exists, and if it doesn't use 2.3 functions.
	if ( function_exists('add_meta_box') ) {
		add_meta_box('sociable','Sociable','sociable_meta','post');
		add_meta_box('sociable','Sociable','sociable_meta','page');
	} else {
		add_action('dbx_post_sidebar', 'sociable_option');
		add_action('dbx_page_sidebar', 'sociable_option');
	}
}
add_action('admin_menu', 'sociable_meta_box');

function sociable_insert_post($pID) {
	delete_post_meta($pID, 'sociableoff');
	update_post_meta($pID, 'sociableoff', ($_POST['sociableoff'] ? 'true' : 'false'));
}
add_action('wp_insert_post', 'sociable_insert_post');

// The admin page
function sociable_submenu() {
	global $sociable_known_sites, $sociable_date, $sociablepluginpath;

	// update options in db if requested
	if (isset($_REQUEST['restore']) && $_REQUEST['restore']) {
		check_admin_referer('sociable-config');
		sociable_restore_config(True);
		sociable_message(__("Restored all settings to defaults.", 'sociable'));
	} else if (isset($_REQUEST['save']) && $_REQUEST['save']) {
		check_admin_referer('sociable-config');
		// update active sites
		$active_sites = Array();
		if (!$_REQUEST['active_sites'])
			$_REQUEST['active_sites'] = Array();
		foreach($_REQUEST['active_sites'] as $sitename=>$dummy)
			$active_sites[] = $sitename;
		update_option('sociable_active_sites', $active_sites);
		// have to delete and re-add because update doesn't hit the db for identical arrays
		// (sorting does not influence associated array equality in PHP)
		delete_option('sociable_active_sites', $active_sites);
		add_option('sociable_active_sites', $active_sites);

		if (isset($_POST['usetargetblank']) && $_POST['usetargetblank']) {
			update_option('sociable_usetargetblank',true);
		} else {
			update_option('sociable_usetargetblank',false);
		}
		
		// update conditional displays
		$conditionals = Array();
		if (!$_POST['conditionals'])
			$_POST['conditionals'] = Array();
		
		$curconditionals = get_option('sociable_conditionals');
		if (!array_key_exists('is_feed',$curconditionals)) {
			$curconditionals['is_feed'] = false;
		}
		foreach($curconditionals as $condition=>$toggled)
			$conditionals[$condition] = array_key_exists($condition, $_POST['conditionals']);
			
		update_option('sociable_conditionals', $conditionals);

		// update tagline
		if (!$_REQUEST['tagline'])
			$_REQUEST['tagline'] = "";
		update_option('sociable_tagline', $_REQUEST['tagline']);

		if (!$_REQUEST['usecss'])
			$usecss = false;
		else
			$usecss = true;
		update_option('sociable_usecss', $usecss);
		
		sociable_message(__("Saved changes.", 'sociable'));
	}
	
	// show active sites first and in order
	$active_sites = get_option('sociable_active_sites');
	$active = Array(); $disabled = $sociable_known_sites;
	foreach($active_sites as $sitename) {
		$active[$sitename] = $disabled[$sitename];
		unset($disabled[$sitename]);
	}
	uksort($disabled, "strnatcasecmp");

	// load options from db to display
	$tagline 		= stripslashes(get_option('sociable_tagline'));
	$conditionals 	= get_option('sociable_conditionals');
	$updated 		= get_option('sociable_updated');
	$usetargetblank = get_option('sociable_usetargetblank');
	// display options
?>
<form action="<?php echo attribute_escape( $_SERVER['REQUEST_URI'] ); ?>" method="post">
<?php
	if ( function_exists('wp_nonce_field') )
		wp_nonce_field('sociable-config');
?>

<div class="wrap">
	<h2><?php _e("Sociable Options", 'sociable'); ?></h2>
	<table class="form-table">
	<tr>
		<th>
			<?php _e("Sites", "sociable"); ?>:<br/>
			<small><?php _e("Check the sites you want to appear on your site. Drag and drop sites to reorder them.", 'sociable'); ?></small>
		</th>
		<td>
			<div style="width: 100%; height: 100%">
			<ul id="sociable_site_list">
				<?php foreach (array_merge($active, $disabled) as $sitename=>$site) { ?>
					<li id="<?php echo $sitename; ?>"
						class="sociable_site <?php echo (in_array($sitename, $active_sites)) ? "active" : "inactive"; ?>">
						<input
							type="checkbox"
							id="cb_<?php echo $sitename; ?>"
							class="checkbox"
							name="active_sites[<?php echo $sitename; ?>]"
							onclick="javascript:toggle_checkbox('<?php echo $sitename; ?>');"
							<?php echo (in_array($sitename, $active_sites)) ? ' checked="checked"' : ''; ?>
						/>
						<img src="<?php echo $sociablepluginpath.'images/'.$site['favicon']; ?>" width="16" height="16" alt="" />
						<?php echo $sitename; ?>
					</li>
				<?php } ?>
			</ul>
			</div>
			<input type="hidden" id="site_order" name="site_order" value="<?php echo join('|', array_keys($sociable_known_sites)) ?>" />
		</td>
	</tr>
	<tr>
		<th scope="row" valign="top">
			<?php _e("Tagline", "sociable"); ?>
		</th>
		<td>
			<?php _e("Change the text displayed in front of the icons below. For complete customization, copy the contents of <em>sociable.css</em> in the Sociable plugin directory to your theme's <em>style.css</em> and disable the use of the sociable stylesheet below.", 'sociable'); ?><br/>
			<input size="80" type="text" name="tagline" value="<?php echo attribute_escape($tagline); ?>" />
		</td>
	</tr>
	<tr>
		<th scope="row" valign="top">
			<?php _e("Position:", "sociable"); ?>
		</th>
		<td>
			<?php _e("The icons appear at the end of each blog post, and posts may show on many different types of pages. Depending on your theme and audience, it may be tacky to display icons on all types of pages.", 'sociable'); ?><br/>
			<br/>
			<input type="checkbox" name="conditionals[is_home]"<?php echo ($conditionals['is_home']) ? ' checked="checked"' : ''; ?> /> <?php _e("Front page of the blog", 'sociable'); ?><br/>
			<input type="checkbox" name="conditionals[is_single]"<?php echo ($conditionals['is_single']) ? ' checked="checked"' : ''; ?> /> <?php _e("Individual blog posts", 'sociable'); ?><br/>
			<input type="checkbox" name="conditionals[is_page]"<?php echo ($conditionals['is_page']) ? ' checked="checked"' : ''; ?> /> <?php _e('Individual WordPress "Pages"', 'sociable'); ?><br/>
			<input type="checkbox" name="conditionals[is_category]"<?php echo ($conditionals['is_category']) ? ' checked="checked"' : ''; ?> /> <?php _e("Category archives", 'sociable'); ?><br/>
			<input type="checkbox" name="conditionals[is_tag]"<?php echo ($conditionals['is_tag']) ? ' checked="checked"' : ''; ?> /> <?php _e("Tag listings", 'sociable'); ?><br/>
			<input type="checkbox" name="conditionals[is_date]"<?php echo ($conditionals['is_date']) ? ' checked="checked"' : ''; ?> /> <?php _e("Date-based archives", 'sociable'); ?><br/>
			<input type="checkbox" name="conditionals[is_author]"<?php echo ($conditionals['is_author']) ? ' checked="checked"' : ''; ?> /> <?php _e("Author archives", 'sociable'); ?><br/>
			<input type="checkbox" name="conditionals[is_search]"<?php echo ($conditionals['is_search']) ? ' checked="checked"' : ''; ?> /> <?php _e("Search results", 'sociable'); ?><br/>
			<input type="checkbox" name="conditionals[is_feed]"<?php echo ($conditionals['is_feed']) ? ' checked="checked"' : ''; ?> /> <?php _e("RSS feed items", 'sociable'); ?><br/>
		</td>
	</tr>
	<tr>
		<th scope="row" valign="top">
			<?php _e("Use CSS:", "sociable"); ?>
		</th>
		<td>
			<input type="checkbox" name="usecss" <?php echo (get_option('sociable_usecss')) ? ' checked="checked"' : ''; ?> /> <?php _e("Use the sociable stylesheet?", "sociable"); ?>
		</td>
	</tr>
	<tr>
		<th scope="row" valign="top">
			<?php _e("Open in new window:", "sociable"); ?>
		</th>
		<td>
			<input type="checkbox" name="usetargetblank" <?php echo (get_option('sociable_usetargetblank')) ? ' checked="checked"' : ''; ?> /> <?php _e("Use <code>target=_blank</code> on links? (Forces links to open a new window)", "sociable"); ?>
		</td>		
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<span class="submit"><input name="save" value="<?php _e("Save Changes", 'sociable'); ?>" type="submit" /></span>
			<span class="submit"><input name="restore" value="<?php _e("Restore Built-in Defaults", 'sociable'); ?>" type="submit"/></span>
		</td>
	</tr>
</table>

<h2>Like this plugin?</h2>
<p><?php _e('Why not do any of the following:','sociable'); ?></p>
<ul class="sociablemenu">
	<li><?php _e('Link to it so other folks can find out about it.','sociable'); ?></li>
	<li><?php _e('<a href="http://wordpress.org/extend/plugins/sociable/">Give it a good rating</a> on WordPress.org.','sociable'); ?></li>
	<li><?php _e('<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=2017947">Donate a token of your appreciation</a>.','sociable'); ?></li>
</ul>
<h2>Need support?</h2>
<p><?php _e(' If you have any problems or good ideas, please talk about them in the <a href="http://wordpress.org/tags/sociable">Support forums</a>.', 'sociable'); ?></p>

<h2>Credits</h2>
<p><?php _e('<a href="http://yoast.com/wordpress/sociable/">Sociable</a> was originally developed by <a href="http://push.cx/">Peter Harkins</a> and has been maintained by <a href="http://yoast.com/">Joost de Valk</a> since the beginning of 2008. It\'s released under the GNU GPL version 2.','Sociable'); ?></p>

</div>

</form>

<?php
}

function sociable_add_ozh_adminmenu_icon( $hook ) {
	static $sociableicon;
	if (!$sociableicon) {
		$sociableicon = WP_CONTENT_URL . '/plugins/' . plugin_basename(dirname(__FILE__)). '/book_add.png';
	}
	if ($hook == 'Sociable') return $sociableicon;
	return $hook;
}

function sociable_filter_plugin_actions( $links, $file ){
	//Static so we don't call plugin_basename on every plugin row.
	static $this_plugin;
	if ( ! $this_plugin ) $this_plugin = plugin_basename(__FILE__);
	
	if ( $file == $this_plugin ){
		$settings_link = '<a href="options-general.php?page=Sociable">' . __('Settings') . '</a>';
		array_unshift( $links, $settings_link ); // before other links
	}
	return $links;
}

add_filter( 'plugin_action_links', 'sociable_filter_plugin_actions', 10, 2 );
add_filter( 'ozh_adminmenu_icon', 'sociable_add_ozh_adminmenu_icon' );				

if (get_option('sociable_usecss_set_once') != true) {
	update_option('sociable_usecss', true);
	update_option('sociable_usecss_set_once', true);
}

require_once("yoast-posts.php");
?>
