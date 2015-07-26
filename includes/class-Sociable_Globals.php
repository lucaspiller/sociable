<?php

/*
 * Global Arrays For The sociable Plugin.
 */

class Sociable_Globals{
	/*
	 * Return The Non Default Registered Post Types
	 */

	public static function sociable_get_post_types() {

		$args = array(

			'public'   => true,

			'_builtin' => false,

		);

		$types = get_post_types( $args, 'objects' , 'and' );

		return $types;

	}

	public static function get_sociable_image_path() {

		global $sociable_options;

		if ( empty( $sociable_options['custom_icons'] ) ) {

			if ( $sociable_options['icon_option'] != 'option6' ) {

				$path = trailingslashit( SOCIABLE_HTTP_PATH . 'images/'.$sociable_options['icon_option'].'/' . $sociable_options['icon_size'] );

			} else {

				$path = trailingslashit( SOCIABLE_HTTP_PATH . 'images/original/' );

			}
		} else {

			$path = trailingslashit( SOCIABLE_HTTP_PATH . 'images/customIcons/' );

		}

		return $path;

	}

	public static function get_sociable_image( $site, $description ) {

		global $sociable_options;

		$imageclass = '';

		$imagestyle = '';

		$imagepath = self::get_sociable_image_path();

		// Get The Source Of The Image
		if ( ! isset( $site['spriteCoordinates'] ) || ! isset( $sociable_options['use_sprites'] ) || is_feed() ) {

			if ( strpos( $site['favicon'], 'http' ) === 0 ) {

				$imagesource = $site['favicon'];

			} else {

				$imagesource = $imagepath.$site['favicon'];

			}
		} else {

			$imagesource = $imagepath . 'services-sprite.gif';

			$services_sprite_url = $imagepath . 'sprite.png';

			$spriteCoords = $site['spriteCoordinates'];

			$size = $sociable_options['icon_size'];

			$imagestyle = 'width: ' . $size . 'px; height: ' . $size . 'px; background: transparent url(' . $services_sprite_url . ') no-repeat; background-position:' . $spriteCoords[$size] . 'px 0';

		}

		if ( isset( $sociable_options['use_alphamask'] ) ) {

			$imageclass .= 'sociable-hovers';

		}

		// If A Class Has Been Specified, Ensure It Is Added To The Class Attribute.
		if ( isset( $site['class'] ) ) {

			$imageclass .= 'sociable_' . $site['class'];

		}

		if ( $imagestyle != '' ) {

			$imagestyle = 'style="' . $imagestyle . '"';

		}

		if ( $sociable_options['icon_option'] != 'option6' ) {

			$image = '<img  src="' . $imagesource . '" title="' . $description . '" alt="' . $description . '"' . $imagestyle . ' />' ;

		} else {

			$image = '<img class="' . $imageclass . '" src="' . $imagesource . '" title="' . $description . '" alt="' . $description . '"' . $imagestyle . ' />' ;

		}

		return $image;

	}
}

?>
