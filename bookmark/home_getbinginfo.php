<?php
    error_reporting(E_ALL &~ E_NOTICE);     //屏蔽错误信息
    include 'conn.php';     //调用数据库连接文件
	
	session_start();
if(!isset($_SESSION['username'])){
    header("Location:/");
    exit();
}
	$username=$_SESSION['username'];
	

	$setupsql="select * from user where username='{$username}'";
	$result=$conn->query($setupsql);
	$setupinfo=$result->fetch_row();//得到当前登录用户的所有信息
	
	//从数据库中获取的当前用户已配置的信息
	$setup_title1=$setupinfo[4];
	$setup_title2=$setupinfo[5];
	$setup_bgurl=$setupinfo[6];
	$setup_links=$setupinfo[7];
	
	//判断用户是否设置首页标题，如没有设置，则为默认标题。
	if($setupinfo[4]==""){
		$title1="Daily Sentence";
	}else{
		$title1=$setupinfo[4];
	}
	
	//判断用户是否设置每日一语，如没有设置，则为默认每日一语。
	if($setupinfo[5]==""){
		$title2="所谓成功，只有两个标准，小时候的分数，大了后的存款。";
	}else{
		$title2=$setupinfo[5];
	}
	
	//判断用户是否设置自定义背景图片，如没有设置，则为默认图片。(目前还是用的最笨的办法)
	if($setupinfo[6]==""){
		$imgstra=file_get_contents('http://cn.bing.com/HPImageArchive.aspx?idx=0&n=1&mkt=zh-CN');//获取0日前图片接口
		$storystra=file_get_contents('http://cn.bing.com/cnhp/coverstory/');//获取故事接口
		preg_match("/<urlBase>(.+?)<\/urlBase>/ies",$imgstra,$imgmatchesa);
		$imgurla='http://cn.bing.com'.$imgmatchesa[1].'_1920x1080.jpg';//0日前图片链接地址
		preg_match("/<copyright>(.+?)<\/copyright>/ies",$imgstra,$copyrightmatchesa);
		$imgtitlea=strstr($copyrightmatchesa[1],'，',true);//图片介绍标题
		$imgaddressa=substr(strstr(strstr($copyrightmatchesa[1],'(',true),'，'),3);//图片拍摄地点
		$imgauthora=strstr(substr(strstr($copyrightmatchesa[1],'('),4),')',true);//图片作者信息
		preg_match("/para1\":\"(.+?)\",\"para2\"/ies",$storystra,$storymatchesa);
		$storya=$storymatchesa[1];//图片故事
		if ($imgtitlea==null) {
		  $imgtitlea=strstr($copyrightmatchesa[1],'(',true);
		  $imgaddressa="必应精选";
		} 
	}else{
		$imgurla=$setupinfo[6];
		$imgtitlea="自定义背景图片";
		$imgaddressa="自定义";
		$imgauthora=$username;
		$storya="这是【".$username."】自定义的背景图片</br>Tips:</br>1.如果没有背景图片显示，请检查背景图片URL是否输入正确。</br>2.左右切换图片后，如要返回自定义背景图片，请刷新本页面！";
	}
	
	//根据用户选择的搜索引擎自动更换搜索引擎
	//从数据库中获取的当前用户已配置的默认搜索引擎
	$search_baidu='<form action="http://www.baidu.com/baidu" class="search" id="sb_form" target="_blank">
			<input name="tn" type="hidden" value="SE_zzsearchcode_shhzc78w"><!--百度站长信息-->
			<input class="sw_qbox" id="inputs" name="wd" title="输入搜索词" type="text" autocomplete="off" baidusug="1"/>
			<input class="sw_qbtn" id="sb_form_go" name="go" tabindex="0" title="百度一下" type="submit" value=""/>
		</form>';
	$search_google='<form action="http://www.google.com/search" class="search" id="sb_form" target="_blank">
			<input class="sw_qbox" id="inputs" name="q" title="输入搜索词" type="text" />
			<input class="sw_qbtn" id="sb_form_go" name="btnG" title="谷歌一下" type="submit" value=""/>
		</form>';
	$search_bing='<form action="https://cn.bing.com/search" method="get" class="search" id="sb_form" target="_blank">
			<input class="sw_qbox" id="inputs" name="q" title="输入搜索词" type="text" />
			<input class="sw_qbtn" id="sb_form_go" title="必应搜索" type="submit" value=""/>
		</form>';
	$search_360='<form action="https://www.so.com/s" method="get" class="search" id="sb_form" target="_blank">
			<input class="sw_qbox" id="inputs" name="q" title="输入搜索词" type="text" />
			<input class="sw_qbtn" id="sb_form_go" title="360搜索" type="submit" value=""/>
		</form>';
	$search_sogou='<form action="https://www.sogou.com/web" method="get" class="search" id="sb_form" target="_blank">
			<input class="sw_qbox" id="inputs" name="query" title="输入搜索词" type="text" />
			<input class="sw_qbtn" id="sb_form_go" title="搜狗搜索" type="submit" value=""/>
		</form>';
	$search_duck='<form action="https://duckduckgo.com/search" method="get" class="search" id="sb_form" target="_blank">
			<input class="sw_qbox" id="inputs" name="q" title="输入搜索词" type="text" />
			<input class="sw_qbtn" id="sb_form_go" title="鸭子搜索" type="submit" value=""/>
		</form>';
	
	switch ($setupinfo[8]) {
		case "duck":
			$search=$search_duck;
			$checked_duck='checked="checked"';
			break;
		case "google":
			$search=$search_google;
			$checked_google='checked="checked"';
			break;
		case "bing":
			$search=$search_bing;
			$checked_bing='checked="checked"';
			break;
		case "360":
			$search=$search_360;
			$checked_360='checked="checked"';
			break;
		case "sogou":
			$search=$search_sogou;
			$checked_sogou='checked="checked"';
			break;
		default:
			$search=$search_baidu;
			$checked_baidu='checked="checked"';
	}
	
	//判断用户是否设置自定义首页顶部链接，如没有设置，则为默认链接。
	if($setupinfo[7]==""){
		$links1=array("必应","http://www.bing.com");
		$links2=array("百度","http://www.baidu.com");
		$links3=array("谷歌","http://www.google.com");
		$links4=array("知乎","http://www.zhihu.com");
		$links5=array("深度","http://www.deepin.org");
		if($links1[0]!=""){
			$get_links1='<li class="li_right_a"><a href="'.$links1[1].'" target="_blank">'.$links1[0].'</a></li>';
		}
		if($links2[0]!=""){
			$get_links2='<li class="li_right_a"><a href="'.$links2[1].'" target="_blank">'.$links2[0].'</a></li>';
		}
		if($links3[0]!=""){
			$get_links3='<li class="li_right_a"><a href="'.$links3[1].'" target="_blank">'.$links3[0].'</a></li>';
		}
		if($links4[0]!=""){
			$get_links4='<li class="li_right_a"><a href="'.$links4[1].'" target="_blank">'.$links4[0].'</a></li>';
		}
		if($links5[0]!=""){
			$get_links5='<li class="li_right_a"><a href="'.$links5[1].'" target="_blank">'.$links5[0].'</a></li>';
		}

	}else{
		$links=";".$setupinfo[7];
		preg_match_all("/;(.+?);/ies",$links,$links_arr);
		$links1=array(strstr($links_arr[1][0],',',true),stristr($links_arr[1][0],'h'));
		$links2=array(strstr($links_arr[1][1],',',true),stristr($links_arr[1][1],'h'));
		$links3=array(strstr($links_arr[1][2],',',true),stristr($links_arr[1][2],'h'));
		$links4=array(strstr($links_arr[1][3],',',true),stristr($links_arr[1][3],'h'));
		$links5=array(strstr($links_arr[1][4],',',true),stristr($links_arr[1][4],'h'));
		
		if($links1[0]!=""){
			$get_links1='<li class="li_right_a"><a href="'.$links1[1].'" target="_blank">'.$links1[0].'</a></li>';
		}
		if($links2[0]!=""){
			$get_links2='<li class="li_right_a"><a href="'.$links2[1].'" target="_blank">'.$links2[0].'</a></li>';
		}
		if($links3[0]!=""){
			$get_links3='<li class="li_right_a"><a href="'.$links3[1].'" target="_blank">'.$links3[0].'</a></li>';
		}
		if($links4[0]!=""){
			$get_links4='<li class="li_right_a"><a href="'.$links4[1].'" target="_blank">'.$links4[0].'</a></li>';
		}
		if($links5[0]!=""){
			$get_links5='<li class="li_right_a"><a href="'.$links5[1].'" target="_blank">'.$links5[0].'</a></li>';
		}
	}

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
if ($imgtitle0==null) {
  $imgtitle0=strstr($copyrightmatches0[1],'(',true);
  $imgaddress0="必应精选";
} 

//1日前图片
$imgstr1=file_get_contents('http://cn.bing.com/HPImageArchive.aspx?idx=1&n=1&mkt=zh-CN');
preg_match("/<urlBase>(.+?)<\/urlBase>/ies",$imgstr1,$imgmatches1);
$imgurl1='http://cn.bing.com'.$imgmatches1[1].'_1920x1080.jpg';//1日前图片链接地址
preg_match("/<copyright>(.+?)<\/copyright>/ies",$imgstr1,$copyrightmatches1);
$imgtitle1=strstr($copyrightmatches1[1],'，',true);//图片介绍标题
$imgaddress1=substr(strstr(strstr($copyrightmatches1[1],'(',true),'，'),3);//图片拍摄地点
$imgauthor1=strstr(substr(strstr($copyrightmatches1[1],'('),4),')',true);//图片作者信息
if ($imgtitle1==null) {
  $imgtitle1=strstr($copyrightmatches1[1],'(',true);
  $imgaddress1="必应精选";
} 

//2日前图片
$imgstr2=file_get_contents('http://cn.bing.com/HPImageArchive.aspx?idx=2&n=1&mkt=zh-CN');
preg_match("/<urlBase>(.+?)<\/urlBase>/ies",$imgstr2,$imgmatches2);
$imgurl2='http://cn.bing.com'.$imgmatches2[1].'_1920x1080.jpg';//2日前图片链接地址
preg_match("/<copyright>(.+?)<\/copyright>/ies",$imgstr2,$copyrightmatches2);
$imgtitle2=strstr($copyrightmatches2[1],'，',true);//图片介绍标题
$imgaddress2=substr(strstr(strstr($copyrightmatches2[1],'(',true),'，'),3);//图片拍摄地点
$imgauthor2=strstr(substr(strstr($copyrightmatches2[1],'('),4),')',true);//图片作者信息
if ($imgtitle2==null) {
  $imgtitle2=strstr($copyrightmatches2[1],'(',true);
  $imgaddress2="必应精选";
} 

//3日前图片
$imgstr3=file_get_contents('http://cn.bing.com/HPImageArchive.aspx?idx=3&n=1&mkt=zh-CN');
preg_match("/<urlBase>(.+?)<\/urlBase>/ies",$imgstr3,$imgmatches3);
$imgurl3='http://cn.bing.com'.$imgmatches3[1].'_1920x1080.jpg';//3日前图片链接地址
preg_match("/<copyright>(.+?)<\/copyright>/ies",$imgstr3,$copyrightmatches3);
$imgtitle3=strstr($copyrightmatches3[1],'，',true);//图片介绍标题
$imgaddress3=substr(strstr(strstr($copyrightmatches3[1],'(',true),'，'),3);//图片拍摄地点
$imgauthor3=strstr(substr(strstr($copyrightmatches3[1],'('),4),')',true);//图片作者信息
if ($imgtitle3==null) {
  $imgtitle3=strstr($copyrightmatches3[1],'(',true);
  $imgaddress3="必应精选";
} 

//4日前图片
$imgstr4=file_get_contents('http://cn.bing.com/HPImageArchive.aspx?idx=4&n=1&mkt=zh-CN');
preg_match("/<urlBase>(.+?)<\/urlBase>/ies",$imgstr4,$imgmatches4);
$imgurl4='http://cn.bing.com'.$imgmatches4[1].'_1920x1080.jpg';//4日前图片链接地址
preg_match("/<copyright>(.+?)<\/copyright>/ies",$imgstr4,$copyrightmatches4);
$imgtitle4=strstr($copyrightmatches4[1],'，',true);//图片介绍标题
$imgaddress4=substr(strstr(strstr($copyrightmatches4[1],'(',true),'，'),3);//图片拍摄地点
$imgauthor4=strstr(substr(strstr($copyrightmatches4[1],'('),4),')',true);//图片作者信息
if ($imgtitle4==null) {
  $imgtitle4=strstr($copyrightmatches4[1],'(',true);
  $imgaddress4="必应精选";
} 

//5日前图片
$imgstr5=file_get_contents('http://cn.bing.com/HPImageArchive.aspx?idx=5&n=1&mkt=zh-CN');
preg_match("/<urlBase>(.+?)<\/urlBase>/ies",$imgstr5,$imgmatches5);
$imgurl5='http://cn.bing.com'.$imgmatches5[1].'_1920x1080.jpg';//5日前图片链接地址
preg_match("/<copyright>(.+?)<\/copyright>/ies",$imgstr5,$copyrightmatches5);
$imgtitle5=strstr($copyrightmatches5[1],'，',true);//图片介绍标题
$imgaddress5=substr(strstr(strstr($copyrightmatches5[1],'(',true),'，'),3);//图片拍摄地点
$imgauthor5=strstr(substr(strstr($copyrightmatches5[1],'('),4),')',true);//图片作者信息
if ($imgtitle5==null) {
  $imgtitle5=strstr($copyrightmatches5[1],'(',true);
  $imgaddress5="必应精选";
} 

//6日前图片
$imgstr6=file_get_contents('http://cn.bing.com/HPImageArchive.aspx?idx=6&n=1&mkt=zh-CN');
preg_match("/<urlBase>(.+?)<\/urlBase>/ies",$imgstr6,$imgmatches6);
$imgurl6='http://cn.bing.com'.$imgmatches6[1].'_1920x1080.jpg';//6日前图片链接地址
preg_match("/<copyright>(.+?)<\/copyright>/ies",$imgstr6,$copyrightmatches6);
$imgtitle6=strstr($copyrightmatches6[1],'，',true);//图片介绍标题
$imgaddress6=substr(strstr(strstr($copyrightmatches6[1],'(',true),'，'),3);//图片拍摄地点
$imgauthor6=strstr(substr(strstr($copyrightmatches6[1],'('),4),')',true);//图片作者信息
if ($imgtitle6==null) {
  $imgtitle6=strstr($copyrightmatches6[1],'(',true);
  $imgaddress6="必应精选";
} 

//7日前图片
$imgstr7=file_get_contents('http://cn.bing.com/HPImageArchive.aspx?idx=7&n=1&mkt=zh-CN');
preg_match("/<urlBase>(.+?)<\/urlBase>/ies",$imgstr7,$imgmatches7);
$imgurl7='http://cn.bing.com'.$imgmatches7[1].'_1920x1080.jpg';//7日前图片链接地址
preg_match("/<copyright>(.+?)<\/copyright>/ies",$imgstr7,$copyrightmatches7);
$imgtitle7=strstr($copyrightmatches7[1],'，',true);//图片介绍标题
$imgaddress7=substr(strstr(strstr($copyrightmatches7[1],'(',true),'，'),3);//图片拍摄地点
$imgauthor7=strstr(substr(strstr($copyrightmatches7[1],'('),4),')',true);//图片作者信息
if ($imgtitle7==null) {
  $imgtitle7=strstr($copyrightmatches7[1],'(',true);
  $imgaddress7="必应精选";
} 

?>