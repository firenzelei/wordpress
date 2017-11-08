<?php   
/*
Plugin Name:Hunter主题设置 
Plugin URI:http://www.fitcat.xyz  
Description:Hunter主题后台设置
Version:1.0  
Author:LanerZhao
Author URI:http://www.fitcat.xyz  
*/ 
function theme_setting(){
	add_theme_page(__('Hunter主题设置'),__('Hunter主题设置'),'edit_themes',basename(__FILE__),'setting_function');
	add_action('admin_init', 'register_theme_setting');
}
function register_theme_setting(){
	register_setting('settings_form','w_options');
}
add_action('admin_menu','theme_setting');
function setting_function(){?>
	<div class="wrap">
		<h4>感谢您使用<code>Hunter主题</code> Version:1.0  作者：<a href="http://www.fitcat.xyz">Lanerzhao</a></h4>
		<?php
			if( $_GET['settings-updated']){
				echo '<div id="message" class="updated fade"><p><strong> Hunter主题设置已保存 </strong></p></div>';
			}
			if( 'reset' == isset($_REQUEST['reset']) ) {
				delete_option('w_options');
				echo '<div id="message" class="updated fade"><p><strong> Hunter主题设置已重置 </strong></p></div>';
			}
			 //加载上传图片
			wp_enqueue_script('thickbox'); wp_enqueue_style('thickbox');  
		?>
		<p class="description" id="tagline-description">以下设置图片的选项，需要点击上传按钮上传本地图片或选择媒体库图片，然后点击<code>插入到文章</code>即可拷贝到文本框内</p>
		<form method="post" action="options.php">
			<?php settings_fields('settings_form'); ?>
			<?php $options=get_option('w_options'); ?>
			<table class="form-table">
                <tbody>
				<tr>
					<th scope="row">网站LOGO</th>
					<td><input type="url" class="regular-text code" name="w_options[w_logo]" value="<?php echo $options['w_logo']; ?>" /><input type="button" class="button button-primary" name="w_logo_button" value="上传" id="upbottom1" style="margin-left:10px"/><p class="description" id="tagline-description">Logo高度最好为32像素，以下5个二维码大小至少200*200像素</p></td>
                </tr>
				
				<tr>
					<th scope="row">微信打赏二维码</th>
					<td><input type="url"  class="regular-text code" name="w_options[ds_weixin]" value="<?php echo $options['ds_weixin']; ?>" /><input type="button" class="button button-primary" name="ds_weixin_button" value="上传" id="upbottom4" style="margin-left:10px"/></td>
                </tr>
				<tr>
					<th scope="row">QQ打赏二维码</th>
					<td><input type="url"  class="regular-text code" name="w_options[ds_qq]" value="<?php echo $options['ds_qq']; ?>" /><input type="button" class="button button-primary" name="ds_qq_button" value="上传" id="upbottom5" style="margin-left:10px"/></td>
                </tr>
				<tr>
					<th scope="row">支付宝打赏二维码</th>
					<td><input type="url"  class="regular-text code" name="w_options[ds_alipay]" value="<?php echo $options['ds_alipay']; ?>" /><input type="button" class="button button-primary" name="ds_alipay_button" value="上传" id="upbottom6" style="margin-left:10px"/></td>
                </tr>
				<tr>
					<th scope="row">备案号</th>
					<td><input type="text" class="regular-text" name="w_options[w_beian]" value="<?php echo $options['w_beian']; ?>" /><p class="description" id="tagline-description">请输入您网站的备案号用于底部显示，可留空</p></td>
                </tr>
				<tr>
					<th scope="row">首页描述（Description）</th>
					<td><fieldset>
					<p>请输入你的网站描述，一般不超过200个字符</p>
					<p><textarea name="w_options[w_description]" rows="8" cols="60" id="w_options[w_description]" class="code"><?php echo $options['w_description']; ?></textarea></p>
		            </fieldset></td>
                </tr>
				<tr>
					<th scope="row">首页关键词（KeyWords）</th>
					<td><fieldset>
					<p>请输入你的网站关键词，一般不超过100个字符，每个词用英文逗号隔开</p>
					<p><textarea name="w_options[w_keywords]" rows="4" cols="60" id="w_options[w_keywords]" class="code"><?php echo $options['w_keywords']; ?></textarea></p>
		            </fieldset></td>
                </tr>
				<tr>
					<th scope="row">内页底部版权声明</th>
					<td><fieldset>
					<p>请输入你的网站声明，请注意不要超过90个汉字</p>
					<p><textarea name="w_options[w_shm]" rows="4" cols="60" id="w_options[w_shm]" class="code"><?php echo $options['w_shm']; ?></textarea></p>
		            </fieldset></td>
                </tr>
				<tr>
					<th scope="row">流量统计代码</th>
					<td><fieldset>
					<p>这里放置您的统计代码。如百度统计、站长统计等</p>
					<p><textarea name="w_options[w_tj]" rows="8" cols="60" id="w_options[w_tj]" class="code"><?php echo $options['w_tj']; ?></textarea></p>
		            </fieldset></td>
                </tr>
				</tbody>
			</table>
			
			<h3 class="title">主题二次开发</h3><p>二次开发需要有偿收费，您可添加我的QQ：2891798986</p>
            <?php submit_button(); ?>
		</form>
		<form method="post">
			<p>注意：以下操作将会删除您的所有设置</p>
			<p class="submit"><input type="submit" name="reset" class="button button-primary" value="重置主题"/><input type="hidden" name="reset" value="reset" /></p>
		</form>
		<div class="clear"></div>
	</div>
	<script type="text/javascript">
	jQuery(document).ready(function(){jQuery('#upbottom1,#upbottom2,#upbottom3,#upbottom4,#upbottom5,#upbottom6').click(function(){targetfield=jQuery(this).prev('.regular-text');tb_show('','media-upload.php?type=image&amp;TB_iframe=true');return false});window.send_to_editor=function(html){imgurl=jQuery('img',html).attr('src');jQuery(targetfield).val(imgurl);tb_remove()}});
	</script>
<?php } ?>