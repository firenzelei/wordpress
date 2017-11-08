<?php

//add_action( 'admin_bar_menu', 'custom_account_greeting', 999 );

function custom_account_greeting( $wp_admin_bar ) {
    $my_account_node = $wp_admin_bar->get_node( 'my-account' );
    if ( $my_account_node ) {
        $hour = date( 'G', current_time( 'timestamp' ) );
        $greeting = '晚上好';
        if ( $hour >= 18 ) {
            $greeting = '晚上好';
        } elseif ( $hour >= 14 ) {
            $greeting = '下午好';
        } elseif ( $hour >= 11 ) {
            $greeting = '中午好';
        } elseif ( $hour >= 5 ) {
            $greeting = '早上好';
        };
        $args = array(
            'id'    => 'my-account',
            'title' => str_replace( '您好', $greeting, $my_account_node->title )
        );
        $wp_admin_bar->add_node( $args );
    };
}

?>