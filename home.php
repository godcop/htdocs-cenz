<?php
include ('bookmark/home_getbinginfo.php');
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
	<link href="style/style.css" rel="stylesheet" media="screen"/>
	<script type="text/javascript">
		var p_smallPic = '',p_smallUrl = '',p_bgPics = [],p_bgPic = [];
		function $$(id){
			return document.getElementById(id);
		}
	</script>
</head>
<body>

<div class="navs" id="navs">
	<div class="setup_wrap">
		<div class="setup_avatar">
			<img class="setup_avatar_img" src="<?php echo $avatar ?>">
			<div class="setup_avatar_t"><?php echo $show_name ?>，欢迎你！</div>
			<div class="setup_avatar_edit">
				<a id="showavatarbox">编辑</a> | 
				<a href="bookmark/login.php?action=logout">退出</a>
			</div>
			<div class="upload_avatar" id="upload_avatar">
				<form action="bookmark/editnickname.php" method="post">
					<input class="setup_input" type="text" name="nickname" value="<?php echo $nickname; ?>" placeholder="输入昵称"/>
					<input class="setup_submit" type="submit" value="修改昵称">
				</form>
				<div class="setup_avatarbox"></div>
				<form action="bookmark/uploadavatar.php" method="post" enctype="multipart/form-data">
					<input class="avatar_txt" type="text" name="textfield" id="textfield" placeholder="上传图片本地地址"/>
					<input type="file" name="avatar" class="avatar_file" id="avatar_file" size="28" onchange="document.getElementById('textfield').value=this.value" />
					<div class="avatar_btn">
						<label for="avatar_file"><div class="avatar_choose">选择</div></label>
						<input type="submit" name="submit" class="avatar_upload" value="上传" />
					</div>
				</form>
			</div>
		</div>
		<div class="setup_title_h1">首页设置</div>
		<div class="setup_title_h2">简单设置即可让你的视界更性感</div>
		<form action="bookmark/setup.php" class="setup_subbox" method="post" id="setup_subbox">
			<input class="setup_input" type="text" name="title1" value="<?php echo $setup_title1; ?>" placeholder="首页标题：少于10个字符"/>
			<input class="setup_input" type="text" name="title2" value="<?php echo $setup_title2; ?>" placeholder="每日一语：少于25个字符"/>
			<input class="setup_input" type="text" name="bgurl" value="<?php echo $setup_bgurl; ?>" placeholder="自定义背景：http://x.com/x.jpg"/>
			<input class="setup_input" type="text" name="links" value="<?php echo $setup_links; ?>" placeholder="顶部链接：橙子，http://cenz.cn;"/>
			<div class="setup_search_title">默认搜索引擎</div>
			<div class="setup_search_box">
				<div><input class="setup_search" id="radio-1" type="radio" name="search" value="baidu" <?php echo $checked_baidu;?>><label for="radio-1"></label> 百度 Baidu.com</div>
				<div><input class="setup_search" id="radio-2" type="radio" name="search" value="google" <?php echo $checked_google;?>><label for="radio-2"></label> 谷歌 Google.com</div>
				<div><input class="setup_search" id="radio-3" type="radio" name="search" value="bing" <?php echo $checked_bing;?>><label for="radio-3"></label> 必应 Bing.com</div>
				<div><input class="setup_search" id="radio-5" type="radio" name="search" value="sogou" <?php echo $checked_sogou;?>><label for="radio-5"></label> 搜狗 sogou.com</div>
				<div><input class="setup_search" id="radio-6" type="radio" name="search" value="duck" <?php echo $checked_duck;?>><label for="radio-6"></label> 鸭子 Duckduckgo.com</div>
				<div><input class="setup_search" id="radio-4" type="radio" name="search" value="360" <?php echo $checked_360;?>><label for="radio-4"></label> 360搜索 so.com</div>
			</div>
			<input class="setup_submit" type="submit" value="确认提交">
		</form>
		<div class="setup_bottom">
			<img class="setup_bottom_img" src="style/img/logo.png">
			<div class="setup_bottom_h">
				<div class="setup_bottom_h1">橙子</div>
				<div class="setup_bottom_h2">2.0 beta2</div>
			</div>
			<div class="setup_bottom_h3">永远相信明天会更美好!</div>
		</div>
	</div>
</div>

<div class="nav_full_bg">
	<!--<img id="nav_full_img" height="100%" width="100%"/>-->
</div>

<div class="nav_full" id="nav_full">
	<div class="nav_nav_bg" id="nav_nav_bg">
		<ul class="nav_nav">
			<a href="#"><li>橙子主页</li></a>
			<a href="#"><li>精选站点</li></a>
			<a href="#"><li>常用网址</li></a>
			<a href="#"><li>自定义</li></a>
		</ul>
	</div>
	<div class="nav_main" id="nav_main">
		<div class="content">
			<div class="marks"><!--网址标签卡start-->
				<div class="marks_top_box">
					<img class="marks_top_box_ico" src="style/img/favicon.ico">
					<div class="marks_site_box">
						<div class="marks_site">知乎</div>
						<div class="marks_coll"><img class="marks_coll_ico" src="style/img/coll.png"><a href="#">编程学习</a></div>
					</div>
					<div class="marks_edit"><a href="#"><img class="marks_edit_ico" src="style/img/edit.png"></a>
					</div>
				</div>
				<div class="marks_bottom_box">
					<div class="marks_title" title="在生活中有哪些让你觉得高端的东西就是好的瞬间？">在生活中有哪些让你觉得高端的东西就是好的瞬间？</div>
					<div class="marks_url"><a href="#">https://www.zhihu.com/question/64676168/answer/241615734</a></div>
					<div class="marks_enter"><a href="##">进入</a></div>
				</div>
			</div><!--网址标签卡end-->
			<div class="marks"><!--网址标签卡start-->
				<div class="marks_top_box">
					<img class="marks_top_box_ico" src="style/img/favicon.ico">
					<div class="marks_site_box">
						<div class="marks_site">知乎</div>
						<div class="marks_coll"><img class="marks_coll_ico" src="style/img/coll.png"><a href="#">编程学习</a></div>
					</div>
					<div class="marks_edit"><a href="#"><img class="marks_edit_ico" src="style/img/edit.png"></a>
					</div>
				</div>
				<div class="marks_bottom_box">
					<div class="marks_title" title="在生活中有哪些让你觉得高端的东西就是好的瞬间？">在生活中有哪些让你觉得高端的东西就是好的瞬间？</div>
					<div class="marks_url"><a href="#">https://www.zhihu.com/question/64676168/answer/241615734</a></div>
					<div class="marks_enter"><a href="##">进入</a></div>
				</div>
			</div><!--网址标签卡end-->
			<div class="marks"><!--网址标签卡start-->
				<div class="marks_top_box">
					<img class="marks_top_box_ico" src="style/img/favicon.ico">
					<div class="marks_site_box">
						<div class="marks_site">知乎</div>
						<div class="marks_coll"><img class="marks_coll_ico" src="style/img/coll.png"><a href="#">编程学习</a></div>
					</div>
					<div class="marks_edit"><a href="#"><img class="marks_edit_ico" src="style/img/edit.png"></a>
					</div>
				</div>
				<div class="marks_bottom_box">
					<div class="marks_title" title="在生活中有哪些让你觉得高端的东西就是好的瞬间？">在生活中有哪些让你觉得高端的东西就是好的瞬间？</div>
					<div class="marks_url"><a href="#">https://www.zhihu.com/question/64676168/answer/241615734</a></div>
					<div class="marks_enter"><a href="##">进入</a></div>
				</div>
			</div><!--网址标签卡end-->
			<div class="marks"><!--网址标签卡start-->
				<div class="marks_top_box">
					<img class="marks_top_box_ico" src="style/img/favicon.ico">
					<div class="marks_site_box">
						<div class="marks_site">知乎</div>
						<div class="marks_coll"><img class="marks_coll_ico" src="style/img/coll.png"><a href="#">编程学习</a></div>
					</div>
					<div class="marks_edit"><a href="#"><img class="marks_edit_ico" src="style/img/edit.png"></a>
					</div>
				</div>
				<div class="marks_bottom_box">
					<div class="marks_title" title="在生活中有哪些让你觉得高端的东西就是好的瞬间？">在生活中有哪些让你觉得高端的东西就是好的瞬间？</div>
					<div class="marks_url"><a href="#">https://www.zhihu.com/question/64676168/answer/241615734</a></div>
					<div class="marks_enter"><a href="##">进入</a></div>
				</div>
			</div><!--网址标签卡end-->
			<div class="marks"><!--网址标签卡start-->
				<div class="marks_top_box">
					<img class="marks_top_box_ico" src="style/img/favicon.ico">
					<div class="marks_site_box">
						<div class="marks_site">知乎</div>
						<div class="marks_coll"><img class="marks_coll_ico" src="style/img/coll.png"><a href="#">编程学习</a></div>
					</div>
					<div class="marks_edit"><a href="#"><img class="marks_edit_ico" src="style/img/edit.png"></a>
					</div>
				</div>
				<div class="marks_bottom_box">
					<div class="marks_title" title="在生活中有哪些让你觉得高端的东西就是好的瞬间？">在生活中有哪些让你觉得高端的东西就是好的瞬间？</div>
					<div class="marks_url"><a href="#">https://www.zhihu.com/question/64676168/answer/241615734</a></div>
					<div class="marks_enter"><a href="##">进入</a></div>
				</div>
			</div><!--网址标签卡end-->
			<div class="marks"><!--网址标签卡start-->
				<div class="marks_top_box">
					<img class="marks_top_box_ico" src="style/img/favicon.ico">
					<div class="marks_site_box">
						<div class="marks_site">知乎</div>
						<div class="marks_coll"><img class="marks_coll_ico" src="style/img/coll.png"><a href="#">编程学习</a></div>
					</div>
					<div class="marks_edit"><a href="#"><img class="marks_edit_ico" src="style/img/edit.png"></a>
					</div>
				</div>
				<div class="marks_bottom_box">
					<div class="marks_title" title="在生活中有哪些让你觉得高端的东西就是好的瞬间？">在生活中有哪些让你觉得高端的东西就是好的瞬间？</div>
					<div class="marks_url"><a href="#">https://www.zhihu.com/question/64676168/answer/241615734</a></div>
					<div class="marks_enter"><a href="##">进入</a></div>
				</div>
			</div><!--网址标签卡end-->
			<div class="marks"><!--网址标签卡start-->
				<div class="marks_top_box">
					<img class="marks_top_box_ico" src="style/img/favicon.ico">
					<div class="marks_site_box">
						<div class="marks_site">知乎</div>
						<div class="marks_coll"><img class="marks_coll_ico" src="style/img/coll.png"><a href="#">编程学习</a></div>
					</div>
					<div class="marks_edit"><a href="#"><img class="marks_edit_ico" src="style/img/edit.png"></a>
					</div>
				</div>
				<div class="marks_bottom_box">
					<div class="marks_title" title="在生活中有哪些让你觉得高端的东西就是好的瞬间？">在生活中有哪些让你觉得高端的东西就是好的瞬间？</div>
					<div class="marks_url"><a href="#">https://www.zhihu.com/question/64676168/answer/241615734</a></div>
					<div class="marks_enter"><a href="##">进入</a></div>
				</div>
			</div><!--网址标签卡end-->
			<div class="marks"><!--网址标签卡start-->
				<div class="marks_top_box">
					<img class="marks_top_box_ico" src="style/img/favicon.ico">
					<div class="marks_site_box">
						<div class="marks_site">知乎</div>
						<div class="marks_coll"><img class="marks_coll_ico" src="style/img/coll.png"><a href="#">编程学习</a></div>
					</div>
					<div class="marks_edit"><a href="#"><img class="marks_edit_ico" src="style/img/edit.png"></a>
					</div>
				</div>
				<div class="marks_bottom_box">
					<div class="marks_title" title="在生活中有哪些让你觉得高端的东西就是好的瞬间？">在生活中有哪些让你觉得高端的东西就是好的瞬间？</div>
					<div class="marks_url"><a href="#">https://www.zhihu.com/question/64676168/answer/241615734</a></div>
					<div class="marks_enter"><a href="##">进入</a></div>
				</div>
			</div><!--网址标签卡end-->
			<div class="marks"><!--网址标签卡start-->
				<div class="marks_top_box">
					<img class="marks_top_box_ico" src="style/img/favicon.ico">
					<div class="marks_site_box">
						<div class="marks_site">知乎</div>
						<div class="marks_coll"><img class="marks_coll_ico" src="style/img/coll.png"><a href="#">编程学习</a></div>
					</div>
					<div class="marks_edit"><a href="#"><img class="marks_edit_ico" src="style/img/edit.png"></a>
					</div>
				</div>
				<div class="marks_bottom_box">
					<div class="marks_title" title="在生活中有哪些让你觉得高端的东西就是好的瞬间？">在生活中有哪些让你觉得高端的东西就是好的瞬间？</div>
					<div class="marks_url"><a href="#">https://www.zhihu.com/question/64676168/answer/241615734</a></div>
					<div class="marks_enter"><a href="##">进入</a></div>
				</div>
			</div><!--网址标签卡end-->
			<div class="marks"><!--网址标签卡start-->
				<div class="marks_top_box">
					<img class="marks_top_box_ico" src="style/img/favicon.ico">
					<div class="marks_site_box">
						<div class="marks_site">知乎</div>
						<div class="marks_coll"><img class="marks_coll_ico" src="style/img/coll.png"><a href="#">编程学习</a></div>
					</div>
					<div class="marks_edit"><a href="#"><img class="marks_edit_ico" src="style/img/edit.png"></a>
					</div>
				</div>
				<div class="marks_bottom_box">
					<div class="marks_title" title="在生活中有哪些让你觉得高端的东西就是好的瞬间？">在生活中有哪些让你觉得高端的东西就是好的瞬间？</div>
					<div class="marks_url"><a href="#">https://www.zhihu.com/question/64676168/answer/241615734</a></div>
					<div class="marks_enter"><a href="##">进入</a></div>
				</div>
			</div><!--网址标签卡end-->
			<div class="marks"><!--网址标签卡start-->
				<div class="marks_top_box">
					<img class="marks_top_box_ico" src="style/img/favicon.ico">
					<div class="marks_site_box">
						<div class="marks_site">知乎</div>
						<div class="marks_coll"><img class="marks_coll_ico" src="style/img/coll.png"><a href="#">编程学习</a></div>
					</div>
					<div class="marks_edit"><a href="#"><img class="marks_edit_ico" src="style/img/edit.png"></a>
					</div>
				</div>
				<div class="marks_bottom_box">
					<div class="marks_title" title="在生活中有哪些让你觉得高端的东西就是好的瞬间？">在生活中有哪些让你觉得高端的东西就是好的瞬间？</div>
					<div class="marks_url"><a href="#">https://www.zhihu.com/question/64676168/answer/241615734</a></div>
					<div class="marks_enter"><a href="##">进入</a></div>
				</div>
			</div><!--网址标签卡end-->
			<div class="marks"><!--网址标签卡start-->
				<div class="marks_top_box">
					<img class="marks_top_box_ico" src="style/img/favicon.ico">
					<div class="marks_site_box">
						<div class="marks_site">知乎</div>
						<div class="marks_coll"><img class="marks_coll_ico" src="style/img/coll.png"><a href="#">编程学习</a></div>
					</div>
					<div class="marks_edit"><a href="#"><img class="marks_edit_ico" src="style/img/edit.png"></a>
					</div>
				</div>
				<div class="marks_bottom_box">
					<div class="marks_title" title="在生活中有哪些让你觉得高端的东西就是好的瞬间？">在生活中有哪些让你觉得高端的东西就是好的瞬间？</div>
					<div class="marks_url"><a href="#">https://www.zhihu.com/question/64676168/answer/241615734</a></div>
					<div class="marks_enter"><a href="##">进入</a></div>
				</div>
			</div><!--网址标签卡end-->
			<div class="marks"><!--网址标签卡start-->
				<div class="marks_top_box">
					<img class="marks_top_box_ico" src="style/img/favicon.ico">
					<div class="marks_site_box">
						<div class="marks_site">知乎</div>
						<div class="marks_coll"><img class="marks_coll_ico" src="style/img/coll.png"><a href="#">编程学习</a></div>
					</div>
					<div class="marks_edit"><a href="#"><img class="marks_edit_ico" src="style/img/edit.png"></a>
					</div>
				</div>
				<div class="marks_bottom_box">
					<div class="marks_title" title="在生活中有哪些让你觉得高端的东西就是好的瞬间？">在生活中有哪些让你觉得高端的东西就是好的瞬间？</div>
					<div class="marks_url"><a href="#">https://www.zhihu.com/question/64676168/answer/241615734</a></div>
					<div class="marks_enter"><a href="##">进入</a></div>
				</div>
			</div><!--网址标签卡end-->
			<div class="marks"><!--网址标签卡start-->
				<div class="marks_top_box">
					<img class="marks_top_box_ico" src="style/img/favicon.ico">
					<div class="marks_site_box">
						<div class="marks_site">知乎</div>
						<div class="marks_coll"><img class="marks_coll_ico" src="style/img/coll.png"><a href="#">编程学习</a></div>
					</div>
					<div class="marks_edit"><a href="#"><img class="marks_edit_ico" src="style/img/edit.png"></a>
					</div>
				</div>
				<div class="marks_bottom_box">
					<div class="marks_title" title="在生活中有哪些让你觉得高端的东西就是好的瞬间？">在生活中有哪些让你觉得高端的东西就是好的瞬间？</div>
					<div class="marks_url"><a href="#">https://www.zhihu.com/question/64676168/answer/241615734</a></div>
					<div class="marks_enter"><a href="##">进入</a></div>
				</div>
			</div><!--网址标签卡end-->
		</div>
	</div>
</div>

<div class="lay_wrap">
	<div class="lay_header">
		<div class="header_left">
			<div class="nav_left" id="nav_left"><img src="style/img/menu.png" style="vertical-align: middle" height="20px" width="20px"/></div>
		</div>
		<div class="header_right">
			<?php 
			echo $get_links1;echo $get_links2;echo $get_links3;echo $get_links4;echo $get_links5;echo $get_links6;echo $get_links7;echo $get_links8;echo $get_links9;echo $get_links10;?>
			
			<li class="li_right_menu"><img src="style/img/setup.png" style="vertical-align: middle" height="20px" width="20px"/></li>
		</div>
	</div>
	<div class="middle_box">
		<div class="text_box">
			<div class="text_h1">
				<a><?php echo $title1;?></a>
			</div>
			<div class="text_h2">
				<a><?php echo $title2;?></a>
			</div>
		</div>
		<!--根据选择输出搜索框代码-->
		<?php echo $search;?>
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
<script src="style/main_home.js"></script>
<script type="text/javascript" >

//用户自定义的背景图片信息
var jsbinginfoa=new Array()
jsbinginfoa[0]="<?php echo $imgurla ?>"
jsbinginfoa[1]='<img src="<?php echo $imgurla ?>" width="380px" />'
jsbinginfoa[2]="<?php echo $imgtitlea ?>"
jsbinginfoa[3]="<?php echo $imgaddressa ?>"
jsbinginfoa[4]="<?php echo $imgauthora ?>"
jsbinginfoa[5]="<?php echo $storya ?>"

//0日前必应图片信息
var jsbinginfo0=new Array()
jsbinginfo0[0]="<?php echo $imgurl0 ?>"
jsbinginfo0[1]='<img src="<?php echo $imgurl0 ?>" width="380px" />'
jsbinginfo0[2]="<?php echo $imgtitle0 ?>"
jsbinginfo0[3]="<?php echo $imgaddress0 ?>"
jsbinginfo0[4]="<?php echo $imgauthor0 ?>"
jsbinginfo0[5]="<?php echo $story0 ?>"

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
var jsbinginfo = jsbinginfoa;
var bingflag = 0;

//向指定id输出html代码
document.getElementById("info_bingimg").innerHTML=jsbinginfo[1];
document.getElementById("info_title_b").innerHTML=jsbinginfo[2];
document.getElementById("info_title_c").innerHTML=jsbinginfo[3] + "&ensp;|&ensp;" + jsbinginfo[4];
document.getElementById("info_story").innerHTML=jsbinginfo[5];
document.getElementById("downloadimg").href=jsbinginfo[0];
//document.getElementById("nav_full_img").src=jsbinginfo[0];

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