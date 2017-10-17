<?php

	session_start();
	$username=$_SESSION['username'];

	//用户头像上传
	// 附件的存储位置、附件的名字
	$path = "../upload/avatar/";
	$username = $_SESSION['username'];
	// 拼接成该文件在服务器上的名称
	$server_name = $path.$username.".png";

	if($_FILES['avatar']['error']>0) {
		die("出错了！".$_FILES['photo']['error']); 
	}
	
	if(move_uploaded_file($_FILES['avatar']['tmp_name'],$server_name)){
		echo "<script>alert('恭喜您，上传成功！');history.back();</script>";
	}else{ 
		echo "<script>alert('对不起，上传头像失败了！');history.back();</script>";
	}

?>