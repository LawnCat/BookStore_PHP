<?php
include "../../models/connect_sql_addUser.php";
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    echo json_encode($user);
} else {
    echo json_encode(null);
}
