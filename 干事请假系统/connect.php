<?php
$conn = mysqli_connect("localhost", "root", "root", "db_database11") or die("连接数据库服务器失败！".mysqli_error()); //连接MySQL服务器，选择数据库
mysqli_query($conn,"set names utf8");
header ( "Content-type: text/html; charset=utf-8" ); //发送一个原始 HTTP 标头[Http Header]到客户端
?>
