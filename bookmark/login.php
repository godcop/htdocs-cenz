<?php
/**
 * 此文件为登录后台
 */
    error_reporting(E_ALL &~ E_NOTICE);     //屏蔽错误信息
    include 'conn.php';     //调用数据库连接文件

    $username=$_POST['username'];
    $password=$_POST['password'];     //接收前台post值

    if ($username == "" || $password == "")      //判断用户名和密码是否为空
    {
        echo "<script>alert('请输入用户名和密码');history.back();</script>";
    }
    else
    {
        $selsql="SELECT username,password FROM user WHERE username = '$username'";
        $selres=$conn->query($selsql);
        $selrow=$selres->fetch_object();
        if ($selrow->username == $username)
        {                                                //查询是否有此用户
            if ($selrow->password == $password)              //判断密码是否正确
            {
                echo "<script>alert('登录成功');location.href='../myindex.php';</script>";
            }
            else
            {
                echo "<script>alert('密码错误');history.back();</script>";
            }
        }
        else
        {
            echo "<script>alert('用户不存在');history.back();</script>";
        }
    }

    
?>