<?php
include "../../models/connect_sql.php";
include '../../controllers/admin/getBookList.php';
$arr = getBooksList($sql);
echo json_encode($arr);
