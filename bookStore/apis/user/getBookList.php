<?php
include "../../models/connect_sql.php";
include '../../controllers/user/getBookList.php';
$arr = getBooksList($sql);
echo json_encode($arr);
