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