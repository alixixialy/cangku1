
    }
    else
    {
        $password = test_input($_POST["password"]);
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}
?>

<h2>登录</h2>
<p><span class="error">* 必需字段。</span></p>
<form method="post" action="work1.php">
    名字: <input type="text" name="name" value="<?php echo $name;?>">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
    学号:<input type="text" name="id" value="<?php echo $id;?>">
    <span class="error">*<?php echo $idErr;?></span>
    <br><br>
    密码: <input type="text" name="password" value="<?php echo $password;?>">
    <span class="error">* <?php echo $passwordErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="登录">
    <td class='m_td'><a href='work2.php'>注册</a></td>
</form>

</body>
</html>
