<?php
include "../../models/connect_sql.php";
include_once "../../controllers/admin/getUserList.php";
$arr = getUserList($sql);
echo json_encode($arr);
