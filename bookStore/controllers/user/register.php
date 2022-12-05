<?php
include_once "../../models/connect_sql.php";
$userName = $_POST["userName"];
$userAccount = $_POST["userAccount"];
$userPassword = $_POST["userPassword"];
$userGender = $_POST["userGender"];
$userPhone = $_POST["userPhone"];


// 先判断用户是否在数据库中
$isExist = isUserExist($sql, $userName, $userAccount, $userPassword);
if ($isExist) {
    echo "存在";
} else {
    addUser($sql, $userName, $userAccount, $userPassword, $userGender, $userPhone);
    echo "<script>alert('注册成功'); window.location.href='../../views/user/login'</script>";
}


function isUserExist($sql, $userName, $userAccount, $userPassword)
{
    $isExist = false;
    $account = "";
    $password = "";
    $name = "";
    $search = "SELECT user_name,user_account,user_password FROM user WHERE user_name=? and user_account =? and user_password =?";
    $sql_tempt = $sql->prepare($search);
    $sql_tempt->bind_param("sss", $userName, $userAccount, $userPassword);
    if ($sql_tempt->execute()) {
        $sql_tempt->bind_result($name, $account, $password);
        while ($sql_tempt->fetch()) {
            $isExist = true;
        }
    }
    return $isExist;
}

function addUser($sql, $userName, $userAccount, $userPassword, $userGender, $userPhone)
{
    $add = "INSERT INTO user(user_name,user_gender,user_account,user_password,user_phone) VALUES(?,?,?,?,?)";
    $sql_tempt = $sql->prepare($add);
    $sql_tempt->bind_param("sssss", $userName, $userGender, $userAccount, $userPassword, $userPhone);
    if ($sql_tempt->execute()) {
        echo "插入成功" . $sql_tempt->insert_id;
    } else {
        echo "插入失败" . $sql_tempt->error;
    }
    $sql_tempt->free_result();
    $sql_tempt->close();
}
