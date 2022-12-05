<?php
include "../../models/connect_sql.php";
function getUserInfo($sql, $name)
{
    $userName = '';
    $userGender = '';
    $userPhone = '';
    $userBook = '';
    $userAccount = '';
    $arr = array();
    $find = "SELECT user_name, user_account,user_gender ,user_phone ,user_book FROM user WHERE user_name=?";
    $sql_tempt = $sql->prepare($find);
    $sql_tempt->bind_param("s", $name);
    if ($sql_tempt->execute()) {
        $sql_tempt->bind_result($userName, $userAccount, $userGender, $userPhone, $userBook);
        while ($sql_tempt->fetch()) {
            array_push($arr, array($userName, $userAccount, $userGender, $userPhone, $userBook));
        }
    }
    return $arr;
}
