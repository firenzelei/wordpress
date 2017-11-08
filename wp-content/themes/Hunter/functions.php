<?php
add_theme_support('post-thumbnails');
add_filter('xmlrpc_enabled','__return_true');
add_filter( 'show_admin_bar', '__return_false' );
add_image_size('thumbnail', 800, 340, true);
include('theme-options.php');  
include('meta-boxes.php'); 

//防pingback攻击 
add_filter( ‘xmlrpc_methods’, ‘remove_xmlrpc_pingback_ping’ );
function remove_xmlrpc_pingback_ping( $methods ) {
unset( $methods[‘pingback.ping’] );
return $methods;
};

//正确的加载Java Scripts和CSS
function hunterScripts() {  
	    //Enqueue Javascripts
	    wp_register_script( 'default', get_template_directory_uri() . '/js/jquery.min.js'); 
      wp_register_script( 'ajax', get_template_directory_uri() . '/ajax/comments-ajax.js'); 
      wp_register_script( 'mainjs',get_template_directory_uri() . '/js/way.js');
      //Enqueue Css Style  
      wp_register_style( 'mainstyle', get_template_directory_uri() . '/style.css' );  
      wp_register_style('mobilestyle',get_template_directory_uri() . '/mobile.css', array('home.css'));
      wp_register_style('archivestyle',get_template_directory_uri() . '/archive.css' , array('home.css'));
        if ( !is_admin() ) { /** Load Scripts and Style on Website Only */ 
          wp_enqueue_script('default'); 
          wp_enqueue_script( 'ajax' );  
          wp_enqueue_script('mainjs');
          wp_enqueue_style( 'mainstyle' );
          wp_enqueue_style('mobilestyle');
          wp_enqueue_style('archivestyle');  
    }  
}  
add_action( 'init', 'hunterScripts' );


//恢复友链
add_filter( 'pre_option_link_manager_enabled', '__return_true' );

//头像被墙
function get_ssl_avatar($avatar) {
   $avatar = preg_replace('/.*\/avatar\/(.*)\?s=([\d]+)&.*/','<img src="https://secure.gravatar.com/avatar/$1?s=$2" class="avatar avatar-$2" height="$2" width="$2">',$avatar);
   return $avatar;
}
add_filter('get_avatar', 'get_ssl_avatar');

//图片添加alt属性
add_filter( 'the_content', 'image_alt');
function image_alt($c) {
global $post;
$title = $post->post_title;
$s = array('/src="(.+?.(jpg|bmp|png|jepg|gif))"/i'=> 'src="$1" alt="'.$title.'"');
foreach($s as$p => $r){
$c = preg_replace($p,$r,$c);
}
return$c;
}

//取消描述中的p标签
function deletehtml($description) {  
    $description = trim($description);  
    $description = strip_tags($description,"");  
    return ($description); 
} 
add_filter('category_description', 'deletehtml');

//统计
function custom_the_views($post_id, $echo=true, $views='') {
    $count_key = 'views';  
    $count = get_post_meta($post_id, $count_key, true);  
    if ($count == '') {  
        delete_post_meta($post_id, $count_key);  
        add_post_meta($post_id, $count_key, '0');  
        $count = '0';  
    }  
    if ($echo)  
        echo number_format_i18n($count) . $views;  
    else  
        return number_format_i18n($count) . $views;  
}  
function set_post_views() {  
    global $post;  
    $post_id = $post->ID;  
    $count_key = 'views';  
    $count = get_post_meta($post_id, $count_key, true);  
    if (is_single() || is_page()) {  
        if ($count == '') {  
            delete_post_meta($post_id, $count_key);  
            add_post_meta($post_id, $count_key, '0');  
        } else {  
            update_post_meta($post_id, $count_key, $count + 1);  
        }  
    }  
}  
add_action('get_header', 'set_post_views'); 

//点赞
add_action('wp_ajax_nopriv_way_zan', 'way_zan');
add_action('wp_ajax_way_zan', 'way_zan');
function way_zan(){
    global $wpdb,$post;
    $id = $_POST["um_id"];
    $action = $_POST["um_action"];
    if ( $action == 'ding'){
        $specs_raters = get_post_meta($id,'way_zan',true);
        $expire = time() + 99999999;
        $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false; // make cookies work with localhost
        setcookie('way_zan_'.$id,$id,$expire,'/',$domain,false);
        if (!$specs_raters || !is_numeric($specs_raters)) {
            update_post_meta($id, 'way_zan', 1);
        } 
        else {
            update_post_meta($id, 'way_zan', ($specs_raters + 1));
        }
        echo get_post_meta($id,'way_zan',true);
    } 
    die;
}

//分享
add_action('wp_ajax_nopriv_way_share', 'way_share');
add_action('wp_ajax_way_share', 'way_share');
function way_share(){
    global $wpdb,$post;
    $id = $_POST["um_id"];
    $action = $_POST["um_action"];
    if ( $action == 'share'){
        $specs_raters = get_post_meta($id,'way_share',true);
        $expire = time() + 99999999;
        if (!$specs_raters || !is_numeric($specs_raters)) {
            update_post_meta($id, 'way_share', 1);
        } 
        else {
            update_post_meta($id, 'way_share', ($specs_raters + 1));
        }
        echo get_post_meta($id,'way_share',true);
    } 
    die;
}

// 评论添加@
function ludou_comment_add_at( $comment_text, $comment = '') {
  if( $comment->comment_parent > 0) {
    $comment_text = '@<a href="#comment-' . $comment->comment_parent . '">'.get_comment_author( $comment->comment_parent ) . '</a> ' . $comment_text;
  }

  return $comment_text;
}
add_filter( 'comment_text' , 'ludou_comment_add_at', 20, 2);

//背景
add_custom_background();


//自定义菜单
register_nav_menus(
  array(
	 'header-menu' => __( '导航自定义菜单' ),
	 'foot-menu' => __( '页脚自定义菜单' )
  )
);

//去除分类链接
add_action( 'load-themes.php',  'no_category_base_refresh_rules');
add_action('created_category', 'no_category_base_refresh_rules');
add_action('edited_category', 'no_category_base_refresh_rules');
add_action('delete_category', 'no_category_base_refresh_rules');
function no_category_base_refresh_rules() {
	global $wp_rewrite;
	$wp_rewrite -> flush_rules();
}
// register_deactivation_hook(__FILE__, 'no_category_base_deactivate');
// function no_category_base_deactivate() {
//  remove_filter('category_rewrite_rules', 'no_category_base_rewrite_rules');
//  // We don't want to insert our custom rules again
//  no_category_base_refresh_rules();
// }
// Remove category base
add_action('init', 'no_category_base_permastruct');
function no_category_base_permastruct() {
	global $wp_rewrite, $wp_version;
	if (version_compare($wp_version, '3.4', '<')) {		 // For pre-3.4 support		 $wp_rewrite -> extra_permastructs['category'][0] = '%category%';
	} else {
		$wp_rewrite -> extra_permastructs['category']['struct'] = '%category%';
	}
}
// Add our custom category rewrite rules
add_filter('category_rewrite_rules', 'no_category_base_rewrite_rules');
function no_category_base_rewrite_rules($category_rewrite) {
	//var_dump($category_rewrite); // For Debugging
	$category_rewrite = array();
	$categories = get_categories(array('hide_empty' => false));
	foreach ($categories as $category) {
		$category_nicename = $category -> slug;
		if ($category -> parent == $category -> cat_ID)// recursive recursion
			$category -> parent = 0;
		elseif ($category -> parent != 0)
			$category_nicename = get_category_parents($category -> parent, false, '/', true) . $category_nicename;
		$category_rewrite['(' . $category_nicename . ')/(?:feed/)?(feed|rdf|rss|rss2|atom)/?$'] = 'index.php?category_name=$matches[1]&feed=$matches[2]';
		$category_rewrite['(' . $category_nicename . ')/page/?([0-9]{1,})/?$'] = 'index.php?category_name=$matches[1]&paged=$matches[2]';
		$category_rewrite['(' . $category_nicename . ')/?$'] = 'index.php?category_name=$matches[1]';
	}
	// Redirect support from Old Category Base
	global $wp_rewrite;
	$old_category_base = get_option('category_base') ? get_option('category_base') : 'category';
	$old_category_base = trim($old_category_base, '/');
	$category_rewrite[$old_category_base . '/(.*)$'] = 'index.php?category_redirect=$matches[1]';
	//var_dump($category_rewrite); // For Debugging
	return $category_rewrite;
}
// Add 'category_redirect' query variable
add_filter('query_vars', 'no_category_base_query_vars');
function no_category_base_query_vars($public_query_vars) {
	$public_query_vars[] = 'category_redirect';
	return $public_query_vars;
}
// Redirect if 'category_redirect' is set
add_filter('request', 'no_category_base_request');
function no_category_base_request($query_vars) {
	//print_r($query_vars); // For Debugging
	if (isset($query_vars['category_redirect'])) {
		$catlink = trailingslashit(get_option('home')) . user_trailingslashit($query_vars['category_redirect'], 'category');
		status_header(301);
		header("Location: $catlink");
		exit();
	}
	return $query_vars;
}

//时间显示方式'xx以前'
function timeago( $ptime ) {
    $ptime = strtotime($ptime);
    $etime = time() - $ptime;
    if ($etime < 1) return '刚刚';
    $interval = array (
        12 * 30 * 24 * 60 * 60  =>  '年前<c>('.date('Y-m-d', $ptime).')</c>',
        30 * 24 * 60 * 60       =>  '个月前<c>('.date('m-d', $ptime).')</c>',
        7 * 24 * 60 * 60        =>  '周前<c>('.date('m-d', $ptime).')</c>',
        24 * 60 * 60            =>  '天前',
        60 * 60                 =>  '小时前',
        60                      =>  '分钟前',
        1                       =>  '秒前'
    );
    foreach ($interval as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . $str;
        }
    };
}

//评论表情
add_filter('smilies_src','custom_smilies_src',1,10);
function custom_smilies_src ($img_src, $img, $siteurl){
return get_bloginfo('template_directory').'/images/smilies/'.$img;
}

//禁用自带表情及修复4.2表情冲突
function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );    
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );  
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );
/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param    array  $plugins  
 * @return   array             Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
	return array_diff( $plugins, array( 'wpemoji' ) );
}
function smilies_reset() {
    global $wpsmiliestrans, $wp_smiliessearch;
 
    // don't bother setting up smilies if they are disabled
    if ( !get_option( 'use_smilies' ) )
        return;
 
    $wpsmiliestrans = array(
    ':mrgreen:' => 'icon_mrgreen.gif',
    ':neutral:' => 'icon_neutral.gif',
    ':twisted:' => 'icon_twisted.gif',
      ':arrow:' => 'icon_arrow.gif',
      ':shock:' => 'icon_eek.gif',
      ':smile:' => 'icon_smile.gif',
        ':???:' => 'icon_confused.gif',
       ':cool:' => 'icon_cool.gif',
       ':evil:' => 'icon_evil.gif',
       ':grin:' => 'icon_biggrin.gif',
       ':idea:' => 'icon_idea.gif',
       ':oops:' => 'icon_redface.gif',
       ':razz:' => 'icon_razz.gif',
       ':roll:' => 'icon_rolleyes.gif',
       ':wink:' => 'icon_wink.gif',
        ':cry:' => 'icon_cry.gif',
        ':eek:' => 'icon_surprised.gif',
        ':lol:' => 'icon_lol.gif',
        ':mad:' => 'icon_mad.gif',
        ':sad:' => 'icon_sad.gif',
          '8-)' => 'icon_cool.gif',
          '8-O' => 'icon_eek.gif',
          ':-(' => 'icon_sad.gif',
          ':-)' => 'icon_smile.gif',
          ':-?' => 'icon_confused.gif',
          ':-D' => 'icon_biggrin.gif',
          ':-P' => 'icon_razz.gif',
          ':-o' => 'icon_surprised.gif',
          ':-x' => 'icon_mad.gif',
          ':-|' => 'icon_neutral.gif',
          ';-)' => 'icon_wink.gif',
        // This one transformation breaks regular text with frequency.
        //  '8)' => 'icon_cool.gif',
           '8O' => 'icon_eek.gif',
           ':(' => 'icon_sad.gif',
           ':)' => 'icon_smile.gif',
           ':?' => 'icon_confused.gif',
           ':D' => 'icon_biggrin.gif',
           ':P' => 'icon_razz.gif',
           ':o' => 'icon_surprised.gif',
           ':x' => 'icon_mad.gif',
           ':|' => 'icon_neutral.gif',
           ';)' => 'icon_wink.gif',
          ':!:' => 'icon_exclaim.gif',
          ':?:' => 'icon_question.gif',
    );
}
smilies_reset();

//评论列表
function commentlist($comment,$args,$depth){
	$GLOBALS['comment']=$comment; 
	//主评论计数器
	global $commentcount, $page, $wpdb;
	if ( (int) get_option('page_comments') === 1 && (int) get_option('thread_comments') === 1 ) { //开启嵌套评论和分页才启用
		if(!$commentcount) { //初始化楼层计数器
			$page = ( get_query_var('cpage') ) ? get_query_var('cpage') : get_page_of_comment( $comment->comment_ID, $args ); //获取当前评论列表页码
			$cpp = get_option('comments_per_page'); //获取每页评论显示数量
			if ( get_option('comment_order') === 'desc' ) { //倒序
				$cnt = get_comments('post_id='.$post->ID.'&status=approve&count=true'); //获取主评论总数量
				if (ceil($cnt / $cpp) == 1 || ($page > 1 && $page  == ceil($cnt / $cpp))) { //如果评论只有1页或者是最后一页，初始值为主评论总数
					$commentcount = $cnt + 1;
				} else {
					$commentcount = $cpp * $page + 1;
				}
			} else {
				$commentcount = $cpp * ($page - 1);
			}
		}
		if ( !$parent_id = $comment->comment_parent ) {
			$commentcountText = '<span class="floor">';
			if ( get_option('comment_order') === 'desc' ) { //倒序
				$commentcountText .= --$commentcount . '楼';
			} else {
				switch ($commentcount) {
					case 0:
						$commentcountText .= '沙发'; ++$commentcount;
						break;
					case 1:
						$commentcountText .= '板凳'; ++$commentcount;
						break;
					default:
						$commentcountText .= ++$commentcount . '楼';
						break;
				}
			}
			$commentcountText .= '</span>';
		}
	}
	//主评论计数器END
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID ?>">				
		<div id="comment-<?php comment_ID(); ?>" class="comment_body">
			<div class="author"><?php echo get_avatar($comment,'30'); ?></div>
			<div class="comment_data">
				<span class="name"><?php printf(__('%s'), get_comment_author_link()) ?></span>
				<span class="time"><?php echo timeago( $comment->comment_date_gmt ); ?></span>
				<?php echo $commentcountText; //主评论楼层号?>
				<div class="reply">
					<?php comment_reply_link(array_merge($args,array('reply_text' =>'回复','depth' =>$depth,'max_depth'=>$args['max_depth']))) ?>
				</div>
				<?php if($comment->comment_approved=='0'): ?>
					<em><span class="moderation"><?php _e('Your comment is awaiting moderation.') ?></span></em>
				<?php endif; ?>
				<div class="comment_text">
					<?php comment_text() ?>
				</div>
			</div>
		</div>
<?php 
}
?>