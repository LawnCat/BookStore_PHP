<?php
include "../../models/connect_sql_addUser.php";
unset($_SESSION["user"]);
echo "<script>alert('已退出'); window.location.href='../../views/user/login.html'</script>";
