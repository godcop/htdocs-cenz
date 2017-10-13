<?php
/**
 * 此文件为数据库连接文件
 */

define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DBNM','bookmark');  //定义数据库连接常量
$conn=new mysqli(HOST,USER,PASS,DBNM);


?>