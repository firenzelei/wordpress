<?php

/* 启用后台引导 */
add_action('admin_enqueue_scripts', 'ew_admin_enqueue_scripts');
function ew_admin_enqueue_scripts() {
    wp_enqueue_style('wp-pointer');
    wp_enqueue_script('wp-pointer');
    add_action('admin_print_footer_scripts', 'my_admin_print_footer_scripts');
}
function my_admin_print_footer_scripts() {
    $dismissed = explode(',', (string)get_user_meta(get_current_user_id() , 'dismissed_wp_pointers', true));
    if (!in_array('my_pointer', $dismissed)):
        $pointer_content = '<h3>欢迎使用EchoWeb的WordPress主题</h3>';
        $pointer_content.= '<p>在使用以前您需要从这里进行主题设置，如果您在使用中出现疑问，可以点击右下角的“技术支持”同我们取得联系</p>';
        ?>

        <script type="text/javascript">
            //<![CDATA[
            jQuery(document).ready( function($) {
                $('#toplevel_page_cs-framework').pointer({
                    content: '<?php
                        echo $pointer_content; ?>',
                    position:		{
                        edge:	'left',
                        align:	'center'
                    },
                    pointerWidth:	350,
                    close  : function() {
                        jQuery.post( '<?php
                            bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php', {
                            pointer: 'my_pointer',
                            action: 'dismiss-wp-pointer'
                        });
                    }
                }).pointer('open');
            });
            //]]>
        </script>
    <?php endif; }?>