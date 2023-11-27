<?php
include_once("connect.php");
$sqlstr1 = "delete from tb_demo02 where id =".$_POST['id'];		//定义删除语句
$result = mysqli_query($conn,$sqlstr1);				//执行删除操作
if ($result){
    echo "<script>alert('删除成功');location='Remove_Pages.html';</script>";  //删除成功则返回操作页面
}else{
    exit;
}
?>

