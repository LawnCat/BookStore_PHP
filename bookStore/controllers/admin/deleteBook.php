<?php

use LDAP\Result;

include "../../models/connect_sql.php";
$book_name = $_GET["book_name_delete"];
$isExist = false;


// 判断书名是否存在
$isExist = isExist($sql, $book_name);

if ($isExist) {

    delete($sql, $book_name);
} else {
    echo "<script>alert('没有查询到相关信息');window.location.href='../../views/admin/bookManage.html'</script>";

    echo "书名不存在";
}

function isExist($sql, $book_name)
{
    $name = '';
    $isExist = false;
    $find = "SELECT book_name FROM books WHERE book_name =?";
    $sql_tempt = $sql->prepare($find);
    $sql_tempt->bind_param("s", $book_name);
    if ($sql_tempt->execute()) {
        $sql_tempt->bind_result($name);
        while ($sql_tempt->fetch()) {
            $isExist = true;
        }
    }
    return $isExist;
}

function delete($sql, $book_name)
{
    $delete = "DELETE FROM books WHERE book_name =?";
    $sql_tempt = $sql->prepare($delete);
    $sql_tempt->bind_param("s", $book_name);
    if ($sql_tempt->execute()) {
        echo "<script>alert('${book_name}删除成功'); window.location.href='../../views/admin/bookManage.html'</script>";
    } else {
        echo "删除失败";
    }
}
