<?php
include '../../models/connect_sql_addUser.php';
include '../../controllers/user/getUserInfo.php';
$name = $_SESSION['user'];
$arr = getUserInfo($sql, $name);
echo json_encode($arr);
