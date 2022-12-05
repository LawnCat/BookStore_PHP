<?php
include_once  "../../models/connect_sql_addUser.php";
$userAccount = $_POST["userAccount"];
$userPassword = $_POST["userPassword"];

$isExist = false;
// 先判断用户是否在数据库中
$isExist = isUserExist($sql, $userAccount, $userPassword);
if ($isExist) {
    echo "<script>alert('登录成功'); window.location.href='../../views/user/index.html' ;</script>";
} else {
    echo "<script>alert('为查询到相关信息,请检查账号和密码') ; window.location.href='../../views/user/login.html'</script>";
}


function isUserExist($sql, $userAccount, $userPassword)
{
    $isExist = false;
    $account = "";
    $password = "";
    $name = '';
    $search = "SELECT user_account,user_password,user_name FROM user WHERE user_account =? and user_password =?";
    $sql_tempt = $sql->prepare($search);
    $sql_tempt->bind_param("ss", $userAccount, $userPassword);
    if ($sql_tempt->execute()) {
        $sql_tempt->bind_result($account, $password, $name);
        while ($sql_tempt->fetch()) {
            $isExist = true;
            $_SESSION['user'] = $name;
        }
    }
    $sql_tempt->free_result();
    $sql_tempt->close();
    return $isExist;
}
$sql->close();
