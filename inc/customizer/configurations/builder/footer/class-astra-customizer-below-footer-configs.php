<?php
/**
 * Astra Theme Customizer Configuration Below footer.
 *
 * @package     astra-builder
 * @author      Astra
 * @copyright   Copyright (c) 2020, Astra
 * @link        https://wpastra.com/
 * @since       x.x.x
 */

// No direct access, please.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'Astra_Customizer_Config_Base' ) ) {

	/**
	 * Register Below footer Customizer Configurations.
	 *
	 * @since x.x.x
	 */
	class Astra_Customizer_Below_Footer_Configs extends Astra_Customizer_Config_Base {

		/**
		 * Register Builder Below footer Customizer Configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since x.x.x
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$defaults = Astra_Theme_Options::defaults();

			$_section = 'section-below-footer-builder';

			$column_count = range( 1, Astra_Constants::$num_of_footer_columns );
			$column_count = array_combine( $column_count, $column_count );

			$_configs = array(

				// Section: Below Footer.
				array(
					'name'     => $_section,
					'type'     => 'section',
					'title'    => __( 'Below Footer', 'astra' ),
					'panel'    => 'panel-footer-builder-group',
					'priority' => 30,
				),

				/**
				 * Option: Footer Builder Tabs
				 */
				array(
					'name'        => ASTRA_THEME_SETTINGS . '[builder-footer-below-tabs]',
					'section'     => $_section,
					'type'        => 'control',
					'control'     => 'ast-builder-header-control',
					'priority'    => 0,
					'description' => '',
				),

				// Section: Below Footer Layout Divider.
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[hbb-footer-layout-options-separator-divider]',
					'section'  => $_section,
					'priority' => 20,
					'type'     => 'control',
					'control'  => 'ast-divider',
					'settings' => array(),
					'context'  => Astra_Constants::$general_tab,
				),

				/**
				 * Option: Column count
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[hbb-footer-column]',
					'default'   => astra_get_option( 'hbb-footer-column' ),
					'type'      => 'control',
					'control'   => 'select',
					'section'   => $_section,
					'priority'  => 2,
					'title'     => __( 'Column', 'astra' ),
					'choices'   => $column_count,
					'context'   => Astra_Constants::$general_tab,
					'transport' => 'postMessage',
					'partial'   => array(
						'selector'            => '.site-below-footer-wrap',
						'container_inclusive' => false,
						'render_callback'     => array( Astra_Builder_Footer::get_instance(), 'below_footer' ),
					),
				),

				/**
				 * Option: Row Layout
				 */
				array(
					'name'        => ASTRA_THEME_SETTINGS . '[hbb-footer-layout]',
					'section'     => $_section,
					'default'     => astra_get_option( 'hbb-footer-layout' ),
					'priority'    => 3,
					'title'       => __( 'Layout', 'astra' ),
					'type'        => 'control',
					'control'     => 'ast-row-layout',
					'context'     => Astra_Constants::$general_tab,
					'input_attrs' => array(
						'responsive' => true,
						'footer'     => 'primary',
					),
					'transport'   => 'postMessage',
				),

				/**
				 * Option: Layout Width
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[hbb-footer-layout-width]',
					'default'   => astra_get_option( 'hbb-footer-layout-width' ),
					'type'      => 'control',
					'control'   => 'select',
					'section'   => $_section,
					'priority'  => 25,
					'title'     => __( 'Width', 'astra' ),
					'choices'   => array(
						'full'    => __( 'Full Width', 'astra' ),
						'content' => __( 'Content Width', 'astra' ),
					),
					'suffix'    => '',
					'context'   => Astra_Constants::$general_tab,
					'transport' => 'postMessage',
				),

				// Section: Below Footer Height.
				array(
					'name'        => ASTRA_THEME_SETTINGS . '[hbb-footer-height]',
					'section'     => $_section,
					'transport'   => 'postMessage',
					'default'     => astra_get_option( 'hbb-footer-height' ),
					'priority'    => 30,
					'title'       => __( 'Height', 'astra' ),
					'type'        => 'control',
					'control'     => 'ast-slider',
					'suffix'      => '',
					'input_attrs' => array(
						'min'  => 30,
						'step' => 1,
						'max'  => 600,
					),
					'context'     => Astra_Constants::$general_tab,
				),

				/**
				 * Option: Vertical Alignment
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[hbb-footer-vertical-alignment]',
					'default'   => astra_get_option( 'hbb-footer-vertical-alignment' ),
					'type'      => 'control',
					'control'   => 'select',
					'section'   => $_section,
					'priority'  => 34,
					'title'     => __( 'Vertical Alignment', 'astra' ),
					'choices'   => array(
						'flex-start' => __( 'Top', 'astra' ),
						'center'     => __( 'Middle', 'astra' ),
						'flex-end'   => __( 'Bottom', 'astra' ),
					),
					'context'   => Astra_Constants::$general_tab,
					'transport' => 'postMessage',
				),

				// Section: Below Footer Color & Backgroud Heading.
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[hbb-footer-colors-heading]',
					'section'  => $_section,
					'type'     => 'control',
					'control'  => 'ast-heading',
					'priority' => 60,
					'title'    => __( 'Background Color', 'astra' ),
					'settings' => array(),
					'context'  => Astra_Constants::$design_tab,
				),

				// Group Option: Below Footer Background styling.
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[hbb-footer-background-styling]',
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'Background', 'astra' ),
					'section'   => $_section,
					'transport' => 'postMessage',
					'priority'  => 70,
					'context'   => Astra_Constants::$design_tab,
				),

				// Option: Below Footer Background styling.
				array(
					'name'      => 'hbb-footer-bg-obj-responsive',
					'parent'    => ASTRA_THEME_SETTINGS . '[hbb-footer-background-styling]',
					'type'      => 'sub-control',
					'section'   => $_section,
					'control'   => 'ast-responsive-background',
					'transport' => 'postMessage',
					'default'   => $defaults['hbb-footer-bg-obj-responsive'],
					'label'     => __( 'Background', 'astra' ),
					'priority'  => 5,
					'context'   => Astra_Constants::$general_tab,
				),
			);

			$_configs = array_merge( $_configs, Astra_Builder_Base_Configuration::prepare_advanced_tab( $_section ) );

			return array_merge( $configurations, $_configs );
		}
	}

	/**
	 * Kicking this off by creating object of this class.
	 */
	new Astra_Customizer_Below_Footer_Configs();
}
