<?php
include_once("connect.php");
$sqlstr1 = "update * from tb_demo02 where comment = " . $_POST['comment'];
$sqlstr2 = "update * from tb_demo02 where time = " . $_POST['time'];
$id=$_POST['id'];
$result = mysqli_query($conn, $sqlstr1);
$result1 = mysqli_query($conn, $sqlstr2);
$rows = mysqli_fetch_row($result);//将查询结果返回为数组
$sqlstr3 = "UPDATE tb_demo02 SET id = '$id' WHERE id = 'id'";
if (mysqli_query($conn, $sqlstr3)) {
    $response = [
        'status' => 'success',
        'message' => 'Password updated successfully'
    ];
} else {
    $response = [
        'status' => 'error',
        'message' => 'Error updating password: ' . mysqli_error($conn)
    ];
}
?>
