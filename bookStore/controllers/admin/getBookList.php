<?php
include "../../models/connect_sql.php";

function getBooksList($sql)
{
    $arr = array();
    $book_name = '';
    $book_price = '';
    $book_author = '';
    $book_state = '';
    $book_borrower = '';
    $book_info = '';
    $tem = '';
    $getList = "SELECT book_name,book_author,book_price,book_state,book_borrower FROM books ";
    $sql_tmpt = $sql->prepare($getList);
    if ($sql_tmpt->execute()) {
        $sql_tmpt->bind_result($book_name, $book_author, $book_price, $book_state, $book_borrower);

        while ($sql_tmpt->fetch()) {
            array_push($arr, array($book_name, $book_author, $book_price, $book_state, $book_borrower));
        }
    }
    return $arr;
}
