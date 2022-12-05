<?php
include "../../models/connect_sql.php";

function getBooksList($sql)
{
    $arr = array();
    $book_name = '';
    $book_price = '';
    $book_author = '';
    $book_state = '';
    $book_info = '';
    $getList = "SELECT book_name,book_author,book_price,bookInfo,book_state FROM books ";
    $sql_tmpt = $sql->prepare($getList);
    if ($sql_tmpt->execute()) {
        $sql_tmpt->bind_result($book_name, $book_author, $book_price, $book_info, $book_state);

        while ($sql_tmpt->fetch()) {
            if ($book_state != '已借') {
                array_push($arr, array($book_name, $book_author, $book_price, $book_info, $book_state));
            }
        }
    }
    return $arr;
}
