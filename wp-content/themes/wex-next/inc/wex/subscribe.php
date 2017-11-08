<?php
// 屏蔽WordPress默认小工具
function my_unregister_widgets() {

    unregister_widget( 'WP_Widget_Calendar' );
    unregister_widget( 'WP_Widget_Categories' );
    unregister_widget( 'WP_Widget_Links' );
    unregister_widget( 'WP_Widget_Meta' );
    unregister_widget( 'WP_Widget_Pages' );
    unregister_widget( 'WP_Widget_Recent_Comments' );
    unregister_widget( 'WP_Widget_Recent_Posts' );
    unregister_widget( 'WP_Widget_RSS' );
    unregister_widget( 'WP_Widget_Search' );
    unregister_widget( 'WP_Widget_Tag_Cloud' );
    unregister_widget( 'WP_Nav_Menu_Widget' );
    unregister_widget( 'WP_Widget_Archives' );
}
add_action( 'widgets_init', 'my_unregister_widgets' );

function dashboard_custom_feed_output() {
    echo '<div class="rss-widget">';
    wp_widget_rss_output(array(
        'url' => 'http://www.imwex.cn/category/wordpress/next-theme/feed', //rss地址
        'title' => 'NEXT主题更新',
        'items' => 6,         //显示篇数
        'show_summary' => 0,  //是否显示摘要，1为显示
        'show_author' => 0,   //是否显示作者，1为显示
        'show_date' => 1  )); //是否显示日期
    echo '</div>';
}
function h_add_dashboard_widgets() {
    wp_add_dashboard_widget('example_dashboard_widget', 'NEXT主题更新', 'dashboard_custom_feed_output');
}
add_action('wp_dashboard_setup', 'h_add_dashboard_widgets' );

?>