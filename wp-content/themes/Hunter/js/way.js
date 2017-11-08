//jQuery显隐菜单
$(document).ready(function(){$(".iconfont-search").click(function(){$(".search-window").show().animate({opacity:'0.99',height:'100%',width:'100%'},"fast")});$(".close-search").click(function(){$(".search-window").animate({opacity:'1',height:'0',width:'0'},"fast").hide("slow")})});
$(document).ready(function(){$(".iconfont-menu").click(function(){$(".left-menu").animate({opacity:'0.99',left:'0'})});$(".close-menu").click(function(){$(".left-menu").animate({left:'-51%'},"fast")})});
$(document).ready(function(){$('.sub-menu').hide();$(".top-menu>li").hover(function(){$(this).find(".sub-menu").slideDown("fast")},function(){$(this).find(".sub-menu").slideUp("fast")})});
$(document).ready(function(){$('.smilies-down').hide();$('.smilies-btn').click(function(){$('.smilies-down').slideToggle("fast");$(this).toggleClass("cerrar")})});
$(document).ready(function(){$(".support-button").click(function(){$(".sponsor-up").show("fast",function(){$(this).addClass("on").prev("dl").addClass("sponsor-dark")})});$(document).click(function(e){var _con=$('.on');if(!_con.is(e.target)&&_con.has(e.target).length===0){$('.on').hide("fast",function(){$(this).removeClass("on").prev("dl").removeClass("sponsor-dark")})}})});
$(document).ready(function(){$(".share-button").click(function(){$(".share-up").show("fast",function(){$(this).addClass("on1").prev("span").addClass("sponsor-dark")})});$(document).click(function(e){var _con=$('.on1');if(!_con.is(e.target)&&_con.has(e.target).length===0){$('.on1').hide("fast",function(){$(this).removeClass("on1").prev("span").removeClass("sponsor-dark")})}})});
$(document).ready(function(){$(".share-weixin").click(function(){$(".qrcode").show("fast",function(){$(this).addClass("on2").prev("div").addClass("sponsor-dark")})});$(document).click(function(e){var _con=$('.on2');if(!_con.is(e.target)&&_con.has(e.target).length===0){$('.on2').hide("fast",function(){$(this).removeClass("on2").prev("div").removeClass("sponsor-dark")})}});$(".way_share").click(function(){$(".on1").hide("fast",function(){$(this).removeClass("on1").prev("span").removeClass("sponsor-dark")})})});
$(document).ready(function(){$('.close-button').click(function(){$(".sponsor-dark").click()});});
$(document).ready(function(){$('.show-weixin').click(function(){$(this).addClass("ok");$('.show-qq,.show-alipay').removeClass("ok");$(".qr-weixin").show();$(".qr-qq,.qr-alipay").hide()});$('.show-qq').click(function(){$(this).addClass("ok");$('.show-weixin,.show-alipay').removeClass("ok");$(".qr-qq").show();$(".qr-weixin,.qr-alipay").hide()});$('.show-alipay').click(function(){$(this).addClass("ok");$('.show-weixin,.show-qq').removeClass("ok");$(".qr-alipay").show();$(".qr-qq,.qr-weixin").hide()})});
$(document).ready(function(){$('.previous').hover(function(){$(".prevspan").show();$('.prev').hide()},function(){$(".prevspan").hide();$('.prev').show()});$('.nextpost').hover(function(){$(".nextspan").show();$('.next').hide()},function(){$(".nextspan").hide();$('.next').show()})});

//点赞
$.fn.postLike=function(){if($(this).hasClass('done')){alert('小爱怡情大爱伤身~');return false}else{$(this).addClass('done');var id=$(this).data("id"),action=$(this).data('action'),rateHolder=$(this).children('.count');var ajax_data={action:"way_zan",um_id:id,um_action:action};$.post("/wp-admin/admin-ajax.php",ajax_data,function(data){$(rateHolder).html(data)});return false}};$(document).on("click",".WayZan",function(){$(this).postLike()});

//分享按钮
$(document).ready(function() {
	//WAY
	window.WAY = window.WAY || {}
	WAY.shareimage = WAY.shareimage || ''
	WAY.shareimagethumb = WAY.shareimagethumb ? Number(WAY.shareimagethumb) : 1
	WAY.click = 'click'
	//图片获取
	if (WAY.shareimage) {
		if (!WAY.shareimagethumb && $('.entry-content img:first').length) {
			WAY.shareimage = $('.entry-content img:first').attr('src')
		}
	}
	//meta信息获取
	var share = {
		url: document.URL,
		pic: WAY.shareimage,
		title: document.title || '',
		desc: $('meta[name="description"]').length ? $('meta[name="description"]').attr('content') : ''
	}
	//为按钮赋值
	$('[etap="share"]').on(WAY.click, function() {
		var dom = $(this)
		var to = dom.data('share')
		var url = ''

		switch (to) {
		case 'qq':
			url = 'http://connect.qq.com/widget/shareqq/index.html?url=' + share.url + '&desc=' + share.desc + '&summary=' + share.title + '&site=zeshlife&pics=' + share.pic
			break;

		case 'weibo':
			url = 'http://service.weibo.com/share/share.php?title=【' + share.title + '】' + share.desc + '&url=' + share.url + '&source=bookmark&pic=' + share.pic
			break;

		case 'douban':
			url = 'http://www.douban.com/share/service?image=' + share.pic + '&href=' + share.url + '&name=' + share.title + '&text=' + share.desc
			break;

		case 'qzone':
			url = 'http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=' + share.url + '&title=' + share.title + '&desc=' + share.desc
			break;

		case 'renren':
			url = 'http://widget.renren.com/dialog/share?srcUrl=' + share.pic + '&resourceUrl=' + share.url + '&title=' + share.title + '&description=' + share.desc
			break;

		}

		if (!dom.attr('href') && !dom.attr('target')) {
			dom.attr('href', url).attr('target', '_blank')
		}
	})
});

//分享计数
$.fn.postshare=function(){var id=$(this).data("id"),action=$(this).data('action'),rateHolder=$(this).children('.share_count');var ajax_data={action:"way_share",um_id:id,um_action:action};$.post("/wp-admin/admin-ajax.php",ajax_data,function(data){$(rateHolder).html(data)});return false};$(document).on("click",".way_share",function(){$(this).postshare()});

//无限加载
jQuery(document).ready(function($) {
	if($('#pagination a').length==0) {
     $('#pagination').hide();};
	 if($('.commentnavi a').length==0) {
     $('.commentnavi').hide();};//若不存在链接则隐藏
    //点击下一页的链接(即那个a标签)   
    $('#pagination a,.commentnavi a').click(function() {
        $this = $(this);
        $this.addClass('loading').text("正在加载..."); //给a标签加载一个loading的class属性，可以用来添加一些加载效果   
        var href = $this.attr("href"); //获取下一页的链接地址   
        if (href != undefined) { //如果地址存在   
            $.ajax({ //发起ajax请求   
                url: href, //请求的地址就是下一页的链接   
                type: "get", //请求类型是get     
                error: function(request) {
                //如果发生错误怎么处理   
                },
                success: function(data) { //请求成功   
                    $this.removeClass('loading').text("加载更多"); //移除loading属性   
                    var $res = $(data).find(".post-list,.depth-1"); //从数据中挑出文章数据，请根据实际情况更改   
                    $('#archive,.commentlist').append($res.fadeIn(500)); //将数据加载加进posts-loop的标签中。   
                    var newhref = $(data).find("#pagination a,.commentnavi a").attr("href"); //找出新的下一页链接   
                    if (newhref != undefined) {
                        $("#pagination a,.commentnavi a").attr("href", newhref);
                    } else {
                        $("#pagination,.commentnavi").remove(); //如果没有下一页了，隐藏   
                    }
                }
            });
        }
        return false;
    });
});

//打赏通知
function reward_tz() {
	var WAY = prompt('您打赏的方式是（微信/QQ/支付宝）:', '');
	if (WAY) {
		var RMB = prompt('您打赏的金额是（元）:', '')
	};
	if (RMB) {
		$(".sponsor-dark,#comment").click();
		window.location.href = '#comments';
		document.getElementById('comment').
		value = document.getElementById('comment').value + '此文很赞，我用' + WAY + '打赏了您' + RMB + '元，请注意查收！';
	}
}

//返回顶部滚屏
$(document).ready(function($) {
    // 利用 data-scroll 属性，滚动到任意 dom 元素
    $.scrollto = function(scrolldom, scrolltime) {	
        $(scrolldom).click( function(){ 
            var scrolltodom = $(this).attr("data-scroll");
            $(this).addClass("active").siblings().removeClass("active");
            $('html, body').animate({
                scrollTop: $(scrolltodom).offset().top
            }, scrolltime);
            return false;
        });		
    };
    // 判断位置控制 返回顶部的显隐
    $(window).scroll(function() {
        if ($(window).scrollTop() > 500) {
            $("#back-to-top").fadeIn(600);
        } else {
            $("#back-to-top").fadeOut(600);
        }
    });
    // 启用
    $.scrollto("#back-to-top", 300);
	});
