<?php
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * CSFramework Shortcode Config
 *
 * @since 1.0
 * @version 1.0
 *
 */
$shortcodes       = array();

$shortcodes[]     = array(
    'name'          => 'group_1',
    'title'         => 'Group #1',
    'shortcodes'    => array(

        array(
            'name'      => 'cs_toggle',
            'title'     => 'Toggle',
            'fields'    => array(
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'niubi',
                    'help'  => 'Reference site about Lorem Ipsum.',
                ),
                array(
                    'id'    => 'content',
                    'type'  => 'textarea',
                    'title' => 'Content',
                )
            ),
        ),

    )
);

CSFramework_Shortcode_Manager::instance( $shortcodes );

?>