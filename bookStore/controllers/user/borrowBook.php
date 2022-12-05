<?php
include "../../models/connect_sql_addUser.php";
$book_name = $_POST["book_name"];
$user_name = $_SESSION['user'];
$isExist = false;



if ($book_name == "") {
    echo "<script>alert('请输入书名'); window.location.href='../../views/user/index.html'</script>";
}


// echo $book_name;
// echo $_SESSION['user'];

////如果该用户没有借阅其他书籍 就借阅当前书籍 
////否则 将输入 该用户已借阅其他书籍
$isExist = isExist($sql, $user_name);
if ($isExist == true) {
    dataup_book($sql, $book_name, $user_name);
} else {
    echo "<script>alert('您已借阅其他书籍,请先归还书籍再次借阅') ;  window.location.href='../../views/user/index.html'</script>";
}


////判断借阅人是否已经借阅书籍
function isExist($sql, $user_name)
{
    $isExist = false;
    $user_book = '';
    $find = "SELECT user_book FROM user WHERE user_name =?";
    $sql_temp = $sql->prepare($find);
    $sql_temp->bind_param("s", $user_name);
    if ($sql_temp->execute()) {
        $sql_temp->bind_result($user_book);
        while ($sql_temp->fetch()) {
            if ($user_book == "无") {
                $isExist = true;
            } else {
                $isExist = false;
            }
        }
    }
    return $isExist;
}


/////更新 book数据表中 借阅人的数据
function dataup_book($sql, $book_name, $user_name)
{
    $state = "已借";
    $dataup_book = "UPDATE books SET book_state=?,book_borrower=? WHERE book_name =?";
    $sql_tempt = $sql->prepare($dataup_book);
    $sql_tempt->bind_param("sss", $state, $user_name, $book_name);
    if ($sql_tempt->execute()) {
        dataup_user($sql, $book_name, $user_name);
    } else {
        echo "借阅失败";
    }
}



/////更行user表中借阅书籍的数据
function dataup_user($sql, $book_name, $user_name)
{
    $dataup_user = "UPDATE user SET user_book = ? WHERE user_name =?";
    $sql_tempt = $sql->prepare($dataup_user);
    $sql_tempt->bind_param("ss", $book_name, $user_name);
    if ($sql_tempt->execute()) {
        echo "<script>alert('借阅成功!') ;  window.location.href='../../views/user/index.html'</script>";
    } else {
        echo "更新失败";
    }
}
