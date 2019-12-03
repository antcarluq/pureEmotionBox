<?php
/**
 * Theme Customizer Class
 */
class Zurbox_Customizer {
	// Create new object.
	public function __construct() {
		// Register WP Customizer.
		add_action( 'customize_register',              		array( $this, 'register' ) );

		// Sanitization functions.
		add_action( 'customize_register',              		array( $this, 'enqueue_sanitization' ) );

		// Live Preview.
		add_action( 'customize_preview_init',          	array( $this, 'live_preview' ) );

		// Custom CSS.
		add_action( 'customize_controls_print_styles', 	array( $this, 'control_css' ) );

		// Retrieve default values.
		add_filter( 'zurbox_option_defaults',        		array( $this, 'get_defaults' ) );

		// CSS output.
		add_action( 'wp_head',                         		array( $this, 'css_output' ) );

		// Google fonts output.
		add_filter( 'zurbox_font_families',          		array( $this, 'font_families_output' ) );
	}

	// Set args input.
	public function args() {
		$args = array(
			 'slug'                 => '',
			 'opt_type'             => '',
			 'name'                 => '',
			 'description'          => '',
			 'panel'                => '',
			 'section'              => '',
			 'default'              => '',
			 'priority'             => 160,
			 'capability'           => 'edit_theme_options',
			 'theme_supports'       => '',
			 'transport'            => 'refresh',
			 'sanitize_js_callback' => '',
			 'choices'              => array(),
			 'input_attrs'          => array(),
			 'css_output'           => array(),
			 'js_mod'               => '',
		);
		return $args;
	}

	/**
	 * Set settings input.
	 */
	public function settings_input() {
		return apply_filters( 'zurbox_settings_input', array() );
	}

	/**
	 * Registers WordPress Customizer.
	 */
	public function register( $wp_customize ) {
		$_settings = $this->settings_input();

		foreach( $_settings as $settings ) {

			$settings = wp_parse_args( $settings, self::args() );

			// Add settings.
			if( 'panel' != $settings['opt_type'] || 'section' != $settings['opt_type'] ) {
				$wp_customize->add_setting( $settings['slug'], array(
					  'type'                 => 'theme_mod',
					  'default'              => $settings['default'],
					  'transport'            => $settings['transport'],
					  'capability'           => $settings['capability'],
					  'sanitize_js_callback' => $settings['sanitize_js_callback'],
					  'theme_supports'       => $settings['theme_supports'],
				));
			}

			// Add controls.
			switch ( $settings['opt_type'] ) {
				case 'panel':
					$wp_customize->add_panel( $settings['slug'], array(
						  'title'          => $settings['name'],
						  'priority'       => $settings['priority'],
						  'description'    => $settings['description'],
						  'capability'     => $settings['capability'],
						  'theme_supports' => $settings['theme_supports'],
					));
					//error_log( print_r( $settings ) );
					break;
				
				case 'section':
					$wp_customize->add_section( $settings['slug'], array(
						  'title'          => $settings['name'],
						  'description'    => $settings['description'],
						  'priority'       => $settings['priority'],
						  'capability'     => $settings['capability'],
						  'theme_supports' => $settings['theme_supports'],
						  'panel'          => $settings['panel'],
					));
					//error_log( print_r( $settings ) );
					break;

				case 'google_fonts':
					$wp_customize->add_control( $settings['slug'], array(
						  'section'     => $settings['section'],
						  'type'        => 'select',
						  'label'       => $settings['name'],
						  'description' => $settings['description'],
						  'choices'     => self::get_fonts('family'),
						  'priority'    => $settings['priority'],
						  'settings'    => $settings['slug'],
					));
					//error_log( print_r( $settings ) );
					break;

				case 'image':
					$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $settings['slug'], array(
						  'section'     => $settings['section'],
						  'type'        => 'image',
						  'label'       => $settings['name'],
						  'description' => $settings['description'],
						  'choices'     => $settings['choices'],
						  'input_attrs' => $settings['input_attrs'],
						  'priority'    => $settings['priority'],
						  'settings'    => $settings['slug'],
					)) );
					//error_log( print_r( $settings ) );
					break;

				case 'sorter':
					$wp_customize->add_control( new Customizer_Check_Sortable( $wp_customize, $settings['slug'], array(
						  'section'     => $settings['section'],
						  'type'        => 'ckecksorter',
						  'label'       => $settings['name'],
						  'description' => $settings['description'],
						  'choices'     => $settings['choices'],
						  'input_attrs' => $settings['input_attrs'],
						  'priority'    => $settings['priority'],
						  'settings'    => $settings['slug'],
					)) );
					//error_log( print_r( $settings ) );
					break;

				case 'color':
					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $settings['slug'], array(
						  'section'     => $settings['section'],
						  'type'        => 'color',
						  'label'       => $settings['name'],
						  'description' => $settings['description'],
						  'choices'     => $settings['choices'],
						  'input_attrs' => $settings['input_attrs'],
						  'priority'    => $settings['priority'],
						  'settings'    => $settings['slug'],
					)) );
					//error_log( print_r( $settings ) );
					break;

				case 'upload':
					$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, $settings['slug'], array(
						  'section'     => $settings['section'],
						  'type'        => 'upload',
						  'label'       => $settings['name'],
						  'description' => $settings['description'],
						  'choices'     => $settings['choices'],
						  'input_attrs' => $settings['input_attrs'],
						  'priority'    => $settings['priority'],
						  'settings'    => $settings['slug'],
					)) );
					break;

				default:
					$wp_customize->add_control( $settings['slug'] , array(
						  'section'              => $settings['section'],
						  'type'                 => $settings['opt_type'],
						  'label'                => $settings['name'],
						  'description'          => $settings['description'],
						  'choices'              => $settings['choices'],
						  'input_attrs'          => $settings['input_attrs'],
						  'priority'             => $settings['priority'],
						  'settings'             => $settings['slug'],
						  'default'    => $settings['default'],
					));
					//error_log( print_r( $settings ) );
					break;
			}
		}
	} // register

	/**
	 * Enqueue sanitization functions.
	 */
	public function enqueue_sanitization() {
		add_filter( 'sanitize_option_theme_mods_' . get_option( 'stylesheet' ) , array( $this, 'sanitize' ) );
	}

	/**
	 * Sanitizes the setting values.
	 */
	public function sanitize( $data ) {
		$_settings = $this->settings_input();
		foreach( $_settings as $settings ) {
			$settings = wp_parse_args( $settings, self::args() );
			$_slug    = $settings['slug'];

			if( ! array_key_exists( $_slug, $data ) ) {
				continue;
			}

			$input    = $data[$_slug];
			$choices  = isset( $settings['choices'] ) ? $settings['choices'] : array();
			$output   = '';

			if( isset( $settings['sanitize_cb'] ) && is_callable( $settings['sanitize_cb'] ) ) {
				$output = call_user_func( $settings['sanitize_cb'], $input );
			}
			else {
				switch ( $settings['opt_type'] ) {
					case 'checkbox':
						$output = ( 1 == $input ) ? 1 : '';
						break;

					case 'number':
						$output = empty( $input ) ? '' : intval( $input );
						break;

					case 'range':
						$output = absint( $input );
						break;

					case 'url':
					case 'image':
					case 'upload':
						$output = esc_url_raw( $input );
						break;

					case 'radio':
					case 'select':
						$output = array_key_exists( $input, $choices ) ? $input : '';
						break;

					case 'text':
						$output = sanitize_text_field( $input );
						break;

					case 'textarea':
						$output = wp_kses_post( force_balance_tags( $input ) );
						break;

					case 'color':
						$output = sanitize_hex_color( $input );
						break;

					default:
						$output = sanitize_text_field( $input );
						break;
				}
			}

			$data[$_slug] = $output;
		}

		return $data;
	}

	/**
	 * Enqueue live preview javascript.
	 */
	public function live_preview() {
		if( defined( 'ZURBOX_ADMIN_URI' ) ) {
			wp_enqueue_script( 'customizer', ZURBOX_ADMIN_URI . 'customizer.js', array('jquery', 'customize-preview'), '27092016', true );
		}
	}

	/**
	 * Custom CSS.
	 */
	public function control_css() {
		if( defined( 'ZURBOX_ADMIN_URI' ) ) {
			wp_enqueue_style( 'customizer', ZURBOX_ADMIN_URI . 'customizer.css', array(), '27092016' );
		}
	}

	/**
	 * Generate CSS.
	 */
	public function generate_css( $key = '', $default = '', $selector = '', $style = '', $mix_val = '' ) {
		$value = get_theme_mod( $key, $default );
		$return = '';
		if( !empty( $value ) && $value != $default ) {
			$return = sprintf('%s{%s:%s;}', $selector, $style, $value . $mix_val );
		}
		return $return;
	}

	/**
	 * Print CSS output.
	 */
	public function css_output() {
		$output    = '';
		$_settings = $this->settings_input();
		foreach( $_settings as $settings ) {
			$settings = wp_parse_args( $settings, self::args() );
			if( isset( $settings['css_output'] ) && is_array( $settings['css_output'] ) ) {
				foreach( $settings['css_output'] as $order => $css_output ) {
					$css_output = wp_parse_args( $css_output, array( 'class' => '', 'style' => '', 'val' => '', 'mix' => '' ) );
					$output    .= self::generate_css( $settings['slug'], $settings['default'], $css_output['class'], $css_output['style'], $css_output['val'] . $css_output['mix'] );
				}
			}
		}
		
		$output    = apply_filters( 'zurbox_customizer_css_output', $output );
		if( ! empty( $output ) ) {
			printf('<style id="customize-css" type="text/css">%s</style>' . "\n", $output );
		}
	}

	/**
	 * Get Google Fonts.
	 */
	public function get_font_families_output() {
		$output    = array();
		$_settings = $this->settings_input();
		foreach( $_settings as $settings ) {
			$settings = wp_parse_args( $settings, self::args() );
			if( 'google_fonts' == $settings['opt_type'] ) {
				$name = get_theme_mod( $settings['slug'], $settings['default'] );
				$name = ( $name != $settings['default'] ) ? $name : $settings['default'];
				if( ! empty( $name ) ) {
					$variants = self::get_fonts('variants', $name);
					$variants = implode(',', $variants);
					$variants = rtrim( $variants, ',');
					$output[] = $name . ':' . $variants;
				}
			}
		}
		return $output;
	}


	/**
	 * Retrieve Google fonts.
	 */
	public function font_families_output( $defaults ) {
		$args = self::get_font_families_output();
		return wp_parse_args( $args, $defaults );
	}

	/**
	 * Retrieve default values.
	 */
	public function get_defaults() {
		$output    = array();
		$_settings = $this->settings_input();
		foreach( $_settings as $settings ) {
			$settings = wp_parse_args( $settings, self::args() );
			$output[$settings['slug']] = $settings['default'];
		}
		return $output;
	}

	/**
	 * Get fonts.
	 */
	public function get_fonts( $key = 'family', $mod = 'all' ) {
		if( ! defined('ZURBOX_ADMIN_DIR') || ! in_array( $key, array( 'family', 'variants', 'subsets' ) ) ) {
			return array();
		}
		else {
			$output = array();
			$font_file = file( ZURBOX_ADMIN_DIR . 'assets/webfonts.json' );
			$font_file = implode('', $font_file);
			$args      = json_decode( $font_file, true );
			if( isset( $args['items'] ) && is_array( $args['items'] ) ) {
				foreach( $args['items'] as $order => $line ) {
					$font_name = $args['items'][$order]['family'];
					// if( 'family' == $key ) {
					// 	$output[''] = esc_html__( '&mdash; Theme Default &mdash; ', 'zurbox-lite' );
					// }
					$output[$font_name] = $args['items'][$order][$key];
				}

				if( 'all' != $mod ) {
					return isset( $output[$mod] ) ? $output[$mod] : NULL;
				}
			}
			return $output;
		}
	}
}

/**
 * Return new object.
 */
new Zurbox_Customizer;