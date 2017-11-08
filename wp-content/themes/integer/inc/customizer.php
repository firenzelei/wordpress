<?php
/**
 * Integer Theme Customizer
 *
 * @package Integer
 */

/**
 * Add theme-specific Customizer settings and controls.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function integer_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}
add_action( 'customize_register', 'integer_customize_register' );

/**
 * Add lite version Customizer settings and controls.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function integer_lite_customize_register( $wp_customize ) {

	// Extra Features.
	$wp_customize->add_section( 'upgrade' , array(
		'title' => __( 'Extra Features', 'integer' ),
		'priority' => 300,
		'description' => __( 'Like Integer? Then check out the Pro version! It has some extra features to help you level-up your blog.', 'integer' ),
	) );

	$wp_customize->add_control(
		new Integer_Customize_Control_Message(
			$wp_customize,
			'colors',
			array(
				'label' => __( '1. Custom Colors', 'integer' ),
				'section' => 'upgrade',
				'settings' => array(),
				'description' => __( 'Pro version allows you to set your own colors for text, headings, links, and background.', 'integer' ),
			)
		)
	);

	$wp_customize->add_control(
		new Integer_Customize_Control_Message(
			$wp_customize,
			'layout',
			array(
				'label' => __( '2. Two-column Layout', 'integer' ),
				'section' => 'upgrade',
				'settings' => array(),
				'description' => __( 'With the pro version, you can set the blog layout to display posts in a two-column grid.', 'integer' ),
			)
		)
	);

	$wp_customize->add_control(
		new Integer_Customize_Control_Message(
			$wp_customize,
			'message',
			array(
				'label' => __( '3. Custom Footer Message', 'integer' ),
				'section' => 'upgrade',
				'settings' => array(),
				'description' => __( 'With Integer Pro, you can set your own footer message.', 'integer' ),
				'link_url' => 'https://themepatio.com/themes/integer?utm_source=integer-lite&utm_medium=upgrade-section',
				'link_text' => __( 'Learn More', 'integer' ),
				'link_class' => 'button button-primary',
			)
		)
	);

}
add_action( 'customize_register', 'integer_lite_customize_register' );
