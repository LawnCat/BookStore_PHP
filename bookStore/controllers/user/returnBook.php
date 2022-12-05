<?php
include "../../models/connect_sql_addUser.php";
$book_name = $_POST["book_name"];
$user_name = $_SESSION['user'];
// $book_name = "高等数学";
// $user_name = "陈勇";
echo "here";
///     tag == 0 :  用户已借阅书籍 但是与当前用户输入的书籍名称不一样
///     tag == 1 :  用户已借阅书籍 用户当前输入的书籍名额 与数据库中名称一样
///     tag == -1 : 用户没有阅书籍  
$tag = 0;
$tag = isRight($sql, $book_name, $user_name);
if ($tag == 1) {
    echo "here";
    upData_book($sql, $user_name, $book_name);
} else if ($tag == 0) {
    echo "<script>alert('您输入的书名与当前已借阅的书籍书名不对'); window.location.href='../../views/user/index.html'</script>";
} else {
    echo "<script>alert('当前没有借阅任何书籍'); window.location.href='../../views/user/index.html'</script>";
}
// 先判断用户所现在是否已经借阅了书籍 同时判断借阅的书籍与当前归还的书籍是否为 同一本书籍
function isRight($sql, $book_name, $user_name)
{
    $tag = -1;
    $bookName_sql = '';
    $find = "SELECT user_book FROM user WHERE user_name =?";
    $sql_tempt = $sql->prepare($find);
    $sql_tempt->bind_param("s", $user_name);
    if ($sql_tempt->execute()) {
        $sql_tempt->bind_result($bookName_sql);
        while ($sql_tempt->fetch()) {
            if ($book_name == $bookName_sql) {
                $tag = 1;
            } else if ($bookName_sql == "无") {
                $tag = -1;
            } else {
                $tag = 0;
            }
        }
    } else {
        echo "判断错误";
    }
    $sql_tempt->free_result();
    $sql_tempt->close();
    return $tag;
}
/// 更新 book表中数据  
function upData_book($sql, $user_name, $book_name)
{
    $book_state = "未借";
    $book_borrower = "无";
    echo "here";

    $dataup_book = "UPDATE books SET book_state=? , book_borrower=? WHERE book_name =?";
    echo "here";

    $sql_tmpt = $sql->prepare($dataup_book);
    echo "here";
    $sql_tmpt->bind_param("sss", $book_state, $book_borrower, $book_name);
    if ($sql_tmpt->execute()) {
        upData_user($sql, $user_name);
    } else {
        echo "book表更新失败";
    }
    $sql_tmpt->free_result();
    $sql_tmpt->close();
}


function upData_user($sql, $user_name)
{
    $book = "无";
    $updata_user = "UPDATE user SET user_book=? WHERE user_name=?";
    $sql_tempt = $sql->prepare($updata_user);
    $sql_tempt->bind_param("ss", $book, $user_name);
    if ($sql_tempt->execute()) {
        echo "<script>alert('书籍归还成功！') ; window.location.href='../../views/user/index.html'</script>";
    }
    $sql_tempt->free_result();
    $sql_tempt->close();
}
