<?php
include "../../models/connect_sql.php";
header('content-type:text/html;charset=utf-8');

function getUserList($sql)
{
    $array = array();
    $name = "";
    $account = "";
    $gender = '';
    $password = '';
    $phone = '';
    $book = '';
    $getUserList = "SELECT user_name,user_gender,user_account,user_password,user_phone ,user_book FROM user";
    $sql_tmpt = $sql->prepare($getUserList);
    if ($sql_tmpt->execute()) {
        $sql_tmpt->bind_result($name, $gender, $account, $password, $phone, $book);
        while ($sql_tmpt->fetch()) {
            array_push($array, array($name, $gender, $account, $password, $phone, $book));
        }
    }
    $sql_tmpt->free_result();
    $sql_tmpt->close();
    return $array;
}
