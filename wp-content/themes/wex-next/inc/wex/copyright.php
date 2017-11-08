<?php

//custom admin logo
function custom_cs_copyright() {
    echo '
<link rel="stylesheet" href="//at.alicdn.com/t/font_433573_asdca7778vqxs9k9.css">
    <style type="text/css">
   #footer-upgrade,#wp-admin-bar-wp-logo,.cs-footer>.cs-block-left,.cs-footer>.cs-block-right { display: none !important; }
   #contact{       
    position: fixed;z-index: 9;right: 60px;bottom: 40px;padding: 7px 16px;font-size: 14px;line-height: 20px;color: #fff;
    background: #47ad67;-webkit-border-radius: 20px;border-radius: 20px;-webkit-box-shadow: 1px 1px 5px 1px rgba(20,20,20,0.2);
    box-shadow: 1px 1px 5px 1px rgba(20,20,20,0.2);text-decoration: none;
  }
  #contact:hover{
    background: #47c57f;
  }
    </style>
    
    
    
    ';
}
add_action('admin_head', 'custom_cs_copyright');


function add_kefu_admin () {
    echo '
    
 
    <a id="contact" href="http://wpa.qq.com/msgrd?v=3&uin=865852099&site=qq&menu=yes" target="_blank" rel="nofollow"><i class="iconfont icon-tubiao215"></i>&nbsp;技术支持</a>
    
  
    
    ';
}
add_filter('admin_footer_text', 'add_kefu_admin');


?>