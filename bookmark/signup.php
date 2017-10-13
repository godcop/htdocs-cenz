<?php
/**
 * 此文件为注册后台
 */
    error_reporting(E_ALL &~ E_NOTICE);     //屏蔽错误信息
    include 'conn.php';     //调用数据库连接文件

    $username=$_POST['username'];
    $password=$_POST['password'];
	$email=$_POST['email'];		//接收前台传递过来的post值

    if ($username == "" || $password == "" || $email == "")       //判断用户名和密码是否为空
    {
        echo "<script>alert('请完善相关注册信息！');</script>";
    }
    else
    {
        $selsql="SELECT username FROM user WHERE username = '$username'";
        $selres=$conn->query($selsql);
        $selrow=$selres->fetch_object();
        if ($selrow)                   //判断用户名是否存在
        {
            echo "<script>alert('用户名已存在');history.back()</script>";
        }
        else
        {
            $inssql="INSERT INTO user(username,password,email) VALUES('$username','$password','$email')";
            $insres=$conn->query($inssql);      //插入用户信息
            if ($insres)
            {
                echo "<script>alert('注册成功');location.href='../index.php';</script>";
            }
            else
            {
                echo "<script>alert('注册失败');history.back();</script>";
            }
        }
    }

?>