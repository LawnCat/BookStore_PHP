<?php
include "../../models/connect_sql.php";
$book_name = $_GET["bookName"];
$book_author = $_GET["bookAuthor"];
$book_price = $_GET["bookPrice"];
$book_info = $_GET['bookInfo'];
addBook($sql, $book_name, $book_author, $book_price, $book_info);

function addBook($sql, $book_name, $book_author, $book_price, $book_info)
{
    $add = "INSERT INTO books(book_name,book_author,book_price ,bookInfo) VALUES (?,?,?,?)";
    $sql_tmpt = $sql->prepare($add);
    $sql_tmpt->bind_param("ssss", $book_name, $book_author, $book_price, $book_info);
    if ($sql_tmpt->execute()) {
        echo "<script>alert('信息添加成功') ; window.location.href='../../views/admin/bookManage.html'</script>";
    } else {
        echo "插入失败";
    }
}
