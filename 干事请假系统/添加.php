<?php
include_once("connect.php");
if (!($_POST['comment'] and $_POST['time'])){
    exit ;
}else{
    $sqlstr1 = "insert into tb_demo02 (time,comment) values('".$_POST['time']."','".$_POST['comment']."')";
    $result = mysqli_query($conn,$sqlstr1);
    $sql2 = mysqli_query($conn,"select comment from tb_demo02");
    $sql1=mysqli_query($conn,"select time from tb_demo02");
    var_dump($sqlstr1);
    if ($result){
        if($sql1 != $_POST['time'])
            if($sql2!=$_POST['comment'])
             echo "添加成功,点击<a href='work5.php'>这里</a>查看信息";
        else {
            if($sql2!=$_POST['comment'])
                echo "添加成功,点击<a href='work5.php'>这里</a>查看信息";
            else
            echo "重复添加，点击<a href='important.php'>这里</a>返回";
            }
    }else{
        exit;
    }
}
?>
