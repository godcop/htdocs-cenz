<?php
//全新PHP获取必应首页信息代码
//0日前图片
$imgstr0=file_get_contents('http://cn.bing.com/HPImageArchive.aspx?idx=0&n=1&mkt=zh-CN');//获取0日前图片接口
$storystr0=file_get_contents('http://cn.bing.com/cnhp/coverstory/');//获取故事接口
preg_match("/<urlBase>(.+?)<\/urlBase>/ies",$imgstr0,$imgmatches0);
$imgurl0='http://cn.bing.com'.$imgmatches0[1].'_1920x1080.jpg';//0日前图片链接地址
preg_match("/<copyright>(.+?)<\/copyright>/ies",$imgstr0,$copyrightmatches0);
$imgtitle0=strstr($copyrightmatches0[1],'，',true);//图片介绍标题
$imgaddress0=substr(strstr(strstr($copyrightmatches0[1],'(',true),'，'),3);//图片拍摄地点
$imgauthor0=strstr(substr(strstr($copyrightmatches0[1],'('),4),')',true);//图片作者信息
preg_match("/para1\":\"(.+?)\",\"para2\"/ies",$storystr0,$storymatches0);
$story0=$storymatches0[1];//图片故事

//1日前图片
$imgstr1=file_get_contents('http://cn.bing.com/HPImageArchive.aspx?idx=1&n=1&mkt=zh-CN');
preg_match("/<urlBase>(.+?)<\/urlBase>/ies",$imgstr1,$imgmatches1);
$imgurl1='http://cn.bing.com'.$imgmatches1[1].'_1920x1080.jpg';//1日前图片链接地址
preg_match("/<copyright>(.+?)<\/copyright>/ies",$imgstr1,$copyrightmatches1);
$imgtitle1=strstr($copyrightmatches1[1],'，',true);//图片介绍标题
$imgaddress1=substr(strstr(strstr($copyrightmatches1[1],'(',true),'，'),3);//图片拍摄地点
$imgauthor1=strstr(substr(strstr($copyrightmatches1[1],'('),4),')',true);//图片作者信息

//2日前图片
$imgstr2=file_get_contents('http://cn.bing.com/HPImageArchive.aspx?idx=2&n=1&mkt=zh-CN');
preg_match("/<urlBase>(.+?)<\/urlBase>/ies",$imgstr2,$imgmatches2);
$imgurl2='http://cn.bing.com'.$imgmatches2[1].'_1920x1080.jpg';//2日前图片链接地址
preg_match("/<copyright>(.+?)<\/copyright>/ies",$imgstr2,$copyrightmatches2);
$imgtitle2=strstr($copyrightmatches2[1],'，',true);//图片介绍标题
$imgaddress2=substr(strstr(strstr($copyrightmatches2[1],'(',true),'，'),3);//图片拍摄地点
$imgauthor2=strstr(substr(strstr($copyrightmatches2[1],'('),4),')',true);//图片作者信息

//3日前图片
$imgstr3=file_get_contents('http://cn.bing.com/HPImageArchive.aspx?idx=3&n=1&mkt=zh-CN');
preg_match("/<urlBase>(.+?)<\/urlBase>/ies",$imgstr3,$imgmatches3);
$imgurl3='http://cn.bing.com'.$imgmatches3[1].'_1920x1080.jpg';//3日前图片链接地址
preg_match("/<copyright>(.+?)<\/copyright>/ies",$imgstr3,$copyrightmatches3);
$imgtitle3=strstr($copyrightmatches3[1],'，',true);//图片介绍标题
$imgaddress3=substr(strstr(strstr($copyrightmatches3[1],'(',true),'，'),3);//图片拍摄地点
$imgauthor3=strstr(substr(strstr($copyrightmatches3[1],'('),4),')',true);//图片作者信息

//4日前图片
$imgstr4=file_get_contents('http://cn.bing.com/HPImageArchive.aspx?idx=4&n=1&mkt=zh-CN');
preg_match("/<urlBase>(.+?)<\/urlBase>/ies",$imgstr4,$imgmatches4);
$imgurl4='http://cn.bing.com'.$imgmatches4[1].'_1920x1080.jpg';//4日前图片链接地址
preg_match("/<copyright>(.+?)<\/copyright>/ies",$imgstr4,$copyrightmatches4);
$imgtitle4=strstr($copyrightmatches4[1],'，',true);//图片介绍标题
$imgaddress4=substr(strstr(strstr($copyrightmatches4[1],'(',true),'，'),3);//图片拍摄地点
$imgauthor4=strstr(substr(strstr($copyrightmatches4[1],'('),4),')',true);//图片作者信息

//5日前图片
$imgstr5=file_get_contents('http://cn.bing.com/HPImageArchive.aspx?idx=5&n=1&mkt=zh-CN');
preg_match("/<urlBase>(.+?)<\/urlBase>/ies",$imgstr5,$imgmatches5);
$imgurl5='http://cn.bing.com'.$imgmatches5[1].'_1920x1080.jpg';//5日前图片链接地址
preg_match("/<copyright>(.+?)<\/copyright>/ies",$imgstr5,$copyrightmatches5);
$imgtitle5=strstr($copyrightmatches5[1],'，',true);//图片介绍标题
$imgaddress5=substr(strstr(strstr($copyrightmatches5[1],'(',true),'，'),3);//图片拍摄地点
$imgauthor5=strstr(substr(strstr($copyrightmatches5[1],'('),4),')',true);//图片作者信息

//6日前图片
$imgstr6=file_get_contents('http://cn.bing.com/HPImageArchive.aspx?idx=6&n=1&mkt=zh-CN');
preg_match("/<urlBase>(.+?)<\/urlBase>/ies",$imgstr6,$imgmatches6);
$imgurl6='http://cn.bing.com'.$imgmatches6[1].'_1920x1080.jpg';//6日前图片链接地址
preg_match("/<copyright>(.+?)<\/copyright>/ies",$imgstr6,$copyrightmatches6);
$imgtitle6=strstr($copyrightmatches2[1],'，',true);//图片介绍标题
$imgaddress6=substr(strstr(strstr($copyrightmatches6[1],'(',true),'，'),3);//图片拍摄地点
$imgauthor6=strstr(substr(strstr($copyrightmatches6[1],'('),4),')',true);//图片作者信息

//7日前图片
$imgstr7=file_get_contents('http://cn.bing.com/HPImageArchive.aspx?idx=7&n=1&mkt=zh-CN');
preg_match("/<urlBase>(.+?)<\/urlBase>/ies",$imgstr7,$imgmatches7);
$imgurl7='http://cn.bing.com'.$imgmatches7[1].'_1920x1080.jpg';//7日前图片链接地址
preg_match("/<copyright>(.+?)<\/copyright>/ies",$imgstr7,$copyrightmatches7);
$imgtitle7=strstr($copyrightmatches7[1],'，',true);//图片介绍标题
$imgaddress7=substr(strstr(strstr($copyrightmatches7[1],'(',true),'，'),3);//图片拍摄地点
$imgauthor7=strstr(substr(strstr($copyrightmatches7[1],'('),4),')',true);//图片作者信息
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="description" content="橙子（CENZ.CN）是一个性感的云书签系统。可以把它设为浏览器首页，每天为你推送一张精选美图。可以把它用来收藏网址，真正的无论在何方都可以查看的网址书签。可以把它当作网站导航，打开新奇的互联网世界！橙子，精彩每一天！" />
	<meta name="keywords" content="橙子,云书签,精选美图,网址导航,精彩每一天"/>
	<meta name="keywords" content="CENZ 2.0beta1"/>
	<title>橙子 - 精彩每一天！</title>
	<link rel="shortcut icon" href="favicon.ico">
	<link href="style/style_a.css" rel="stylesheet" media="screen"/>
	<script type="text/javascript">
		var p_smallPic = '',p_smallUrl = '',p_bgPics = [],p_bgPic = [];
		function $$(id){
			return document.getElementById(id);
		}
	</script>
</head>
<body>

<div class="navs" id="navs">
	右侧设置菜单
</div>

<div class="nav_full_bg">
	<img id="nav_full_img" height="100%" width="100%"/>
</div>

<div class="nav_full" id="nav_full">
	<div class="readme">
		<div><a class="nav_full_h1">常用网址 Site Navigation</a></div>
		<div class="lrtk">
		  <a href="http://pan.baidu.com/" class="box01" target="_blank" title="百度网盘"></a>
		  <a href="http://www.virscan.org/" class="box02" target="_blank" title="免费的多引擎在线文件病毒扫描"></a>
		  <a href="http://www.mi.com/" class="box03" target="_blank" title="小米网"></a>
		  <a href="http://www.zhihu.com/" class="box04" target="_blank" title="知乎-与世界分享你的知识、经验和见解"></a>
		  <a href="http://naotu.baidu.com/" class="box05" target="_blank" title="百度脑图-便捷的思维工具"></a>
		  <a href="http://www.youku.com/" class="box06" target="_blank" title="优酷"></a>
		  <a href="http://www.tianditucq.com/" class="box07" target="_blank" title="天地图·重庆"></a>
		  <a href="http://fanyi.youdao.com/" class="box08" target="_blank" title="有道翻译"></a>
		  <a href="http://www.bing.com/" class="box09" target="_blank" title="微软必应搜索"></a>
		  <a href="http://www.wedcq.com/" class="box10" target="_blank" title="地产圈"></a>
		  <a href="http://www.tiexue.net/" class="box11" target="_blank" title="铁血网"></a>
		  <a href="http://www.mawanli.cn/" class="box12" target="_blank" title="麻豌粒"></a>      
		</div>
	</div>
</div>

<div class="lay_wrap">
	<div class="lay_header">
		<div class="header_left">
			<div class="nav_left" id="nav_left"><img src="style/img/menu.png" style="vertical-align: middle" height="20px" width="20px"/></div>
		</div>
		<div class="header_right">
			<!--菜单1-->
			<li class="li_right_a"><a href="http://www.mawanli.cn" target="_blank">麻豌粒</a></li>
			<!--<li class="li_right">|</li>-->
			<!--菜单2-->
			<li class="li_right_a"><a href="http://www.wedcq.com" target="_blank">地产圈</a></li>
			<!--<li class="li_right">|</li>-->
			<!--菜单3-->
			<li class="li_right_a"><a href="http://www.bing.com" target="_blank">必应中国</a></li>
			<!--<li class="li_right">|</li>-->
			<!--菜单4-->
			<li class="li_right_a"><a href="http://www.google.com" target="_blank">谷歌搜索</a></li>
			<!--<li class="li_right">|</li>-->
			<!--菜单5-->
			<li class="li_right_menu"><img src="style/img/setup.png" style="vertical-align: middle" height="20px" width="20px"/></li>
		</div>
	</div>
	<div class="middle_box">
		<div class="text_box">
			<div class="text_h1">
				<a>Daily Sentence</a>
			</div>
			<div class="text_h2">
				<a>所谓成功，只有两个标准，小时候的分数，大了后的存款。</a>
			</div>
		</div>
		<form action="http://www.baidu.com/baidu" class="search" id="sb_form" target="_blank">
			<input name="tn" type="hidden" value="SE_zzsearchcode_shhzc78w"><!--百度站长信息-->
			<input class="sw_qbox" id="inputs" name="wd" title="输入搜索词" type="text" autocomplete="off" baidusug="1"/>
			<input class="sw_qbtn" id="sb_form_go" name="go" tabindex="0" title="百度一下" type="submit" value=""/>
		</form>
	</div>
	<div class="getbing">
		<div class="lay_foot">
			<div class="footbox">
				<a id="downloadimg" download="" alt="下载今日美图" title="下载今日美图"><div class="fb_download"></div></a>
				<a alt="下一张美图" title="下一张美图" onClick="fb_button(-1)"><div class="fb_right"></div></a>
				<a alt="上一张美图" title="上一张美图" onClick="fb_button(1)"><div class="fb_left"></div></a>
				<a alt="今日美图故事" title="今日美图故事"><div class="fb_info"></div></a>
			</div>
		</div>
		<div class="fb_info_b">
			<div class="fb_info_k">
				<div class="info_title_a"><<< 美图故事 Picture story</div>
				<div class="info_bingimg" id="info_bingimg"></div>
				<div class="info_title_b" id="info_title_b"></div>
				<div class="info_title_c" id="info_title_c"></div>
				<div class="info_story" id="info_story"></div>
			</div>
		</div>
		<div class="fb_info_d"></div>
		<div class="lay_background" id="lay_bg">
			<img class="lay_background_img" id="lay_bg_img" alt=""/>
		</div>
	</div>
</div>
<div class="dicen">
</div>

<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="style/main.js"></script>
<script type="text/javascript" >
//0日前必应图片信息
var jsbinginfo0=new Array()
jsbinginfo0[0]="<?php echo $imgurl0 ?>"
jsbinginfo0[1]='<img src="<?php echo $imgurl0 ?>" width="380px" />'
jsbinginfo0[2]="<?php echo $imgtitle0 ?>"
jsbinginfo0[3]="<?php echo $imgaddress0 ?>"
jsbinginfo0[4]="<?php echo $imgauthor0 ?>"
jsbinginfo0[5]="<?php echo $story0 ?>"
//1日前必应图片信息
var jsbinginfo1=new Array()
jsbinginfo1[0]="<?php echo $imgurl1 ?>"
jsbinginfo1[1]='<img src="<?php echo $imgurl1 ?>" width="380px" />'
jsbinginfo1[2]="<?php echo $imgtitle1 ?>"
jsbinginfo1[3]="<?php echo $imgaddress1 ?>"
jsbinginfo1[4]="<?php echo $imgauthor1 ?>"
jsbinginfo1[5]="没有往日美图故事"
//2日前必应图片信息
var jsbinginfo2=new Array()
jsbinginfo2[0]="<?php echo $imgurl2 ?>"
jsbinginfo2[1]='<img src="<?php echo $imgurl2 ?>" width="380px" />'
jsbinginfo2[2]="<?php echo $imgtitle2 ?>"
jsbinginfo2[3]="<?php echo $imgaddress2 ?>"
jsbinginfo2[4]="<?php echo $imgauthor2 ?>"
jsbinginfo2[5]="没有往日美图故事"
//3日前必应图片信息
var jsbinginfo3=new Array()
jsbinginfo3[0]="<?php echo $imgurl3 ?>"
jsbinginfo3[1]='<img src="<?php echo $imgurl3 ?>" width="380px" />'
jsbinginfo3[2]="<?php echo $imgtitle3 ?>"
jsbinginfo3[3]="<?php echo $imgaddress3 ?>"
jsbinginfo3[4]="<?php echo $imgauthor3 ?>"
jsbinginfo3[5]="没有往日美图故事"
//4日前必应图片信息
var jsbinginfo4=new Array()
jsbinginfo4[0]="<?php echo $imgurl4 ?>"
jsbinginfo4[1]='<img src="<?php echo $imgurl4 ?>" width="380px" />'
jsbinginfo4[2]="<?php echo $imgtitle4 ?>"
jsbinginfo4[3]="<?php echo $imgaddress4 ?>"
jsbinginfo4[4]="<?php echo $imgauthor4 ?>"
jsbinginfo4[5]="没有往日美图故事"
//5日前必应图片信息
var jsbinginfo5=new Array()
jsbinginfo5[0]="<?php echo $imgurl5 ?>"
jsbinginfo5[1]='<img src="<?php echo $imgurl5 ?>" width="380px" />'
jsbinginfo5[2]="<?php echo $imgtitle5 ?>"
jsbinginfo5[3]="<?php echo $imgaddress5 ?>"
jsbinginfo5[4]="<?php echo $imgauthor5 ?>"
jsbinginfo5[5]="没有往日美图故事"
//6日前必应图片信息
var jsbinginfo6=new Array()
jsbinginfo6[0]="<?php echo $imgurl6 ?>"
jsbinginfo6[1]='<img src="<?php echo $imgurl6 ?>" width="380px" />'
jsbinginfo6[2]="<?php echo $imgtitle6 ?>"
jsbinginfo6[3]="<?php echo $imgaddress6 ?>"
jsbinginfo6[4]="<?php echo $imgauthor6 ?>"
jsbinginfo6[5]="没有往日美图故事"
//7日前必应图片信息
var jsbinginfo7=new Array()
jsbinginfo7[0]="<?php echo $imgurl7 ?>"
jsbinginfo7[1]='<img src="<?php echo $imgurl7 ?>" width="380px" />'
jsbinginfo7[2]="<?php echo $imgtitle7 ?>"
jsbinginfo7[3]="<?php echo $imgaddress7 ?>"
jsbinginfo7[4]="<?php echo $imgauthor7 ?>"
jsbinginfo7[5]="没有往日美图故事"

//默认美图信息日期指定
var jsbinginfo = jsbinginfo0;
var bingflag = 0;

//向指定id输出html代码
document.getElementById("info_bingimg").innerHTML=jsbinginfo[1];
document.getElementById("info_title_b").innerHTML=jsbinginfo[2];
document.getElementById("info_title_c").innerHTML=jsbinginfo[3] + "&ensp;|&ensp;" + jsbinginfo[4];
document.getElementById("info_story").innerHTML=jsbinginfo[5];
document.getElementById("downloadimg").href=jsbinginfo[0];
document.getElementById("nav_full_img").src=jsbinginfo[0];

    //第一段js
    var styleList = [];
    function callback_179_config(params){
        styleList = params.list || [];
    }

    //第二段js
    var bg_img = $$('lay_bg_img');
    if(styleList.length === 0){
        styleList.push({
            bg : jsbinginfo[0]
        });
    }
    var randomData = Math.floor(Math.random() * styleList.length);

    //第三段js
    window.QZFL = window.QZONE = window.QZFL || window.QZONE || {};
    QZFL.dom = {
        getClientHeight:function(doc){
            var _doc = doc || document;
            return _doc.compatMode == "CSS1Compat"?_doc.documentElement.clientHeight:_doc.body.clientHeight;
        },
        getClientWidth:function(doc){
            var _doc = doc || document;
            return _doc.compatMode == "CSS1Compat"?_doc.documentElement.clientWidth:_doc.body.clientWidth;
        }
    };

    QZONE.LoginPage = {
        bootStrap:function(){
            var lp = QZONE.LoginPage,sl_url = $$('small_url');
            bg_img.src = styleList[randomData].bg;

            window.onload = function(){
                lp.resizeBackground();
            };

            if(p_smallPic){
                sl_url.innerHTML = '<span class="img_slogan"></span>';
            }
            window.onresize = function(){
                lp.resizeBackground();

            };
        },

        resizeBackground:function(){
            var bg = $$('lay_bg'),
                bg_img = $$('lay_bg_img'),
                cw = QZFL.dom.getClientWidth(),
                ch = QZFL.dom.getClientHeight(),
                iw = bg_img.width,
                ih = bg_img.height;
            bg.style.width = cw + "px";
            bg.style.height = ch + "px";
            if(cw / ch > iw / ih){
                var new_h = cw * ih / iw, imgTop = (ch - new_h) / 2;
                bg_img.style.width = cw + "px";
                bg_img.style.height = new_h + "px";
                bg_img.style.top = imgTop + "px";
                bg_img.style.left = "";
            }else{
                var new_w = ch * iw / ih, imgLeft = (cw - new_w) / 2;
                bg_img.style.width = new_w + "px";
                bg_img.style.height = ch + "px";
                bg_img.style.left = imgLeft + "px";
                bg_img.style.top = "";
            }
        },
    };
    QZONE.LoginPage.bootStrap();

</script>

</body>
<!--百度搜索框提示-->
<script charset="gbk" src="http://www.baidu.com/js/opensug.js"></script>
</html>