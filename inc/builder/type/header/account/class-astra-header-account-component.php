<?php
/**
 * Account for Astra theme.
 *
 * @package     astra-builder
 * @author      Astra
 * @copyright   Copyright (c) 2020, Astra
 * @link        https://wpastra.com/
 * @since       x.x.x
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'ASTRA_HEADER_ACCOUNT_DIR', ASTRA_THEME_DIR . 'inc/builder/type/header/account' );
define( 'ASTRA_HEADER_ACCOUNT_URI', ASTRA_THEME_URI . 'inc/builder/type/header/account' );

if ( ! class_exists( 'Astra_Header_Account_Component' ) ) {

	/**
	 * Heading Initial Setup
	 *
	 * @since x.x.x
	 */
	class Astra_Header_Account_Component {

		/**
		 * Constructor function that initializes required actions and hooks
		 */
		public function __construct() {

			// @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			require_once ASTRA_HEADER_ACCOUNT_DIR . '/class-astra-header-account-component-loader.php';

			// Include front end files.
			if ( ! is_admin() ) {
				require_once ASTRA_HEADER_ACCOUNT_DIR . '/dynamic-css/dynamic.css.php';
			}
			// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		}

		/**
		 * Account navigation markup
		 */
		public static function account_menu_markup() {

			$theme_location = 'secondary_menu';

			$submenu_class         = apply_filters( 'secondary_submenu_border_class', ' submenu-with-border' );
			$stack_on_mobile_class = 'inline-on-mobile';

			if ( astra_get_option( 'header-account-menu-stack-on-mobile' ) ) {
				$stack_on_mobile_class = 'stack-on-mobile';
			}

			// Menu Animation.
			$menu_animation = astra_get_option( 'header-account-menu-container-animation' );
			if ( ! empty( $menu_animation ) ) {
				$submenu_class .= ' astra-menu-animation-' . esc_attr( $menu_animation ) . ' ';
			}

			/**
			 * Filter the classes(array) for Menu (<ul>).
			 *
			 * @since  3.0.0
			 * @var Array
			 */
			$menu_classes = apply_filters( 'astra_menu_classes', array( 'ast-nav-menu', 'ast-account-nav-menu' ) );

			$items_wrap  = '<nav ';
			$items_wrap .= astra_attr(
				'site-navigation',
				array(
					'id'         => 'site-navigation',
					'class'      => 'ast-flex-grow-1 navigation-accessibility site-header-focus-item',
					'aria-label' => esc_attr__( 'Site Navigation', 'astra' ),
				)
			);
			$items_wrap .= '>';
			$items_wrap .= '<div class="account-main-navigation">';
			$items_wrap .= '<ul id="%1$s" class="%2$s">%3$s</ul>';
			$items_wrap .= '</div>';
			$items_wrap .= '</nav>';

			// Fallback Menu if primary menu not set.
			$fallback_menu_args = array(
				'theme_location' => $theme_location,
				'menu_id'        => 'ast-hf-account-menu',
				'menu_class'     => 'account-main-navigation',
				'container'      => 'div',
				'before'         => '<ul class="' . esc_attr( implode( ' ', $menu_classes ) ) . '">',
				'after'          => '</ul>',
				'walker'         => new Astra_Walker_Page(),
			);

			// To add default alignment for navigation which can be added through any third party plugin.
			// Do not add any CSS from theme except header alignment.
			echo '<div ' . astra_attr( 'ast-main-header-bar-alignment' ) . '>';

			if ( has_nav_menu( $theme_location ) ) {
				wp_nav_menu(
					array(
						'menu_id'         => 'ast-hf-account-menu',
						'menu_class'      => esc_attr( implode( ' ', $menu_classes ) ),
						'container'       => 'div',
						'container_class' => 'account-main-header-bar-navigation',
						'items_wrap'      => $items_wrap,
						'theme_location'  => $theme_location,
					)
				);
			} else {
				echo '<div ' . astra_attr( 'ast-main-header-bar-alignment' ) . '>';
					echo '<div class="account-main-header-bar-navigation">';
						echo '<nav ';
						echo astra_attr(
							'site-navigation',
							array(
								'id' => 'site-navigation',
							)
						);
						echo ' class="ast-flex-grow-1 navigation-accessibility" aria-label="' . esc_attr__( 'Site Navigation', 'astra' ) . '">';
							wp_page_menu( $fallback_menu_args );
						echo '</nav>';
					echo '</div>';
				echo '</div>';
			}
			echo '</div>';
		}
	}

	/**
	 *  Kicking this off by creating an object.
	 */
	new Astra_Header_Account_Component();

}