<?php
/**
 * 此为设置用户昵称后台
 */
    error_reporting(E_ALL &~ E_NOTICE);     //屏蔽错误信息
    include 'conn.php';     //调用数据库连接文件

    $nickname=$_POST['nickname'];//接收前台传递过来的post值

	//判断当前登录的用户
	session_start();
	$username=$_SESSION['username'];
	
	//向数据库相应用户的信息中插入或覆盖设置数据
	$setupsql="update user set nickname='{$nickname}' where username='{$username}' ";
	$result=$conn->query($setupsql);
	if ($result)
	{
		header("Location:../home.php");
	}
	else
	{
		echo "<script>alert('编辑失败，请重新试一次！');history.back();</script>";
	}

?>