<?php
$server = "localhost";
$sql_name = "root";
$sql_password = "";
$mysql = "book_store";
$sql = new mysqli($server, $sql_name, $sql_password, $mysql);
if ($sql->connect_error) {
    echo "链接出现错误" . $sql->error;
}
$sql->set_charset("utf-8");
session_start();
