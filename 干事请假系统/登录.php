<?php
include_once("connect.php");
// 开启Session
session_start();
// 处理用户登录信息
if (isset($_POST['login'])) {
    # 接收用户的登录信息
    $name = trim($_POST['name']);   //Trim() 函数的功能是去掉首尾空格
    $password = trim($_POST['password']);
    $id=trim($_POST['id']);
    // 判断提交的登录信息
    $result=mysqli_query($conn,"select id from tb_demo01");
    $result1=mysqli_query($conn,"select name from tb_demo01");
    $result2=mysqli_query($conn,"select password from tb_demo01");
    if (($name == '') || ($password == '')||($id == '')) {
        // 若为空,视为未填写,提示错误,并3秒后返回登录界面
        header('refresh:3; url=login.html');
        echo "用户名或密码不能为空,系统将在3秒后跳转到登录界面,请重新填写登录信息!";
        exit;
    } else if (($name != $result1) || ($password != $result2)||($id!=$result)){
        # 用户名或密码错误,同空的处理方式
        header('refresh:3; url=login.html');
        echo "用户名或密码错误,系统将在3秒后跳转到登录界面,请重新填写登录信息!";
        exit;
    } else if (($name == $result1) && ($password == $result2)&&($id==$result)) {
        # 用户名和密码都正确,将用户信息存到Session中
        $_SESSION['username'] = $name;
        $_SESSION['id'] = $id;
        $_SESSION['password']=$password;
        if ($_POST['remember'] == "yes") { // 若勾选7天内自动登录,则将其保存到Cookie并设置保留7天
            setcookie('id',$id,time()+7*24*60*60);
            setcookie('username', $name, time()+7*24*60*60);
            setcookie('code', md5($name.md5($password)), time()+7*24*60*60); //md5()函数会将输入的值，加密，然后转换成16字符的二进制格式
        } else {
            // 没有勾选则删除Cookie
            setcookie('id','',time()-999);
            setcookie('username', '', time()-999);
            setcookie('code', '', time()-999);
        }
        // 处理完附加项后跳转到登录成功的首页
        header('location:index.php');
    }
}
?>
