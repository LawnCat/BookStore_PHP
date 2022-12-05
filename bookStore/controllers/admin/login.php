<?php
include_once "../../models/connect_sql.php";

$adminName = $_POST["adminName"];
$adminPassword = $_POST["adminPassword"];

// 先判断用户是否在数据库中
$isExist = isUserExist($sql, $adminName, $adminPassword);
if ($isExist) {
    echo " alert('登陆成功') ;  <script> window.location.href ='../../views/admin/userManage.html' </script> ";
} else {
    echo "<script>alert('请检查用户名与密码') ; window.location.href='../../views/admin/login.html'</script>";
}


function isUserExist($sql, $adminName, $adminPassword)
{
    $isExist = false;
    $name = "";
    $password = "";
    $search = "SELECT admin_name,admin_password FROM admin WHERE admin_name =? and admin_password =?";
    $sql_tempt = $sql->prepare($search);
    $sql_tempt->bind_param("ss", $adminName, $adminPassword);
    if ($sql_tempt->execute()) {
        $sql_tempt->bind_result($name, $password);
        while ($sql_tempt->fetch()) {
            $isExist = true;
        }
    }
    return $isExist;
}
