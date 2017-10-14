<?php
    error_reporting(E_ALL &~ E_NOTICE);     //屏蔽错误信息
    include 'conn.php';     //调用数据库连接文件
	
	//判断当前登录的用户
	session_start();
	$username=$_SESSION['username'];
	$sql="select * from user where username='{$username}'";
	$result=$conn->query($sql);
	$attr=$result->fetch_row();
echo $attr[0];
echo $attr[1];
echo $attr[2];
echo $attr[3];
echo $attr[4];
echo $attr[5];
echo $attr[6];
echo $attr[7];
echo $attr[8];
?>