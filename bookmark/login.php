<?php
/**
 * 此文件为登录后台
 */
    error_reporting(E_ALL &~ E_NOTICE);     //屏蔽错误信息
    include 'conn.php';     //调用数据库连接文件
	
    $username=$_POST['username'];
    $password=$_POST['password'];

	//接收前台post值

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
				Session_start();       //使用SESSION前必须调用该函数。
				$token = md5($username);
				$_SESSION['username']=$username;   //注册一个SESSION变量
				
				if ($_POST['remember'] == "yes"){	//判断登录时是否选择记住密码
					$remtime = time()+3600*24*7;	//登录状态7天之内记住
					setcookie("username", $username, $remtime, "/");
					setcookie("token", $token, $remtime, "/");
				}

				header("Location:../");
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

session_start();

//注销登录
if($_GET['action'] == "logout"){
	unset($_SESSION['username']);
	setcookie('username','',0,"/");
	setcookie('token','',0,"/");
    header("Location:../");
    exit;
}
?>