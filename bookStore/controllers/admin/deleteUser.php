<?php
include '../../models/connect_sql.php';
$userName = $_GET['userName'];


// 先判断用户是否存在

$isExist = false;
$isExist = isExist($sql, $userName);


if ($isExist) {
    deleteUser($sql, $userName);
} else {
    echo "<script> alert('用户不存在 请先创建用户') ;  window.location.href='../../views/admin/userManage.html'</script>";
}


function isExist($sql, $userName)
{
    $isExist = false;
    $name = '';
    $find = "SELECT user_name FROM user WHERE user_name =?";
    $sql_tempt = $sql->prepare($find);
    $sql_tempt->bind_param("s", $userName);
    if ($sql_tempt->execute()) {
        $sql_tempt->bind_result($name);
        while ($sql_tempt->fetch()) {
            $isExist = true;
        }
    }
    return $isExist;
}
function deleteUser($sql, $userName)
{
    $delte = 'DELETE FROM user WHERE user_name =?';
    $sql_tempt = $sql->prepare($delte);
    $sql_tempt->bind_param("s", $userName);
    if ($sql_tempt->execute()) {
        echo "<script> alert('删除成功'); window.location.href='../../views/admin/userManage.html' </script>";
    } else {
        echo "删除失败";
    }
}
