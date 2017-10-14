<?php
/**
 * 此个人设置项后台
 */
    error_reporting(E_ALL &~ E_NOTICE);     //屏蔽错误信息
    include 'conn.php';     //调用数据库连接文件

    $title1=$_POST['title1'];
    $title2=$_POST['title2'];
	$bgurl=$_POST['bgurl'];
	$links=$_POST['links'];
	$search=$_POST['search'];	//接收前台传递过来的post值

	//判断当前登录的用户
	session_start();
	$username=$_SESSION['username'];
	
	//向数据库相应用户的信息中插入或覆盖设置数据
	$setupsql="update user set title1='{$title1}',title2='{$title2}',bgurl='{$bgurl}',links='{$links}',search='{$search}' where username='{$username}' ";
	$result=$conn->query($setupsql);
	if ($result)
	{
		echo "<script>alert('修改成功！');history.back();</script>";
	}
	else
	{
		echo "<script>alert('编辑失败，请重新试一次！');history.back();</script>";
	}
		

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>