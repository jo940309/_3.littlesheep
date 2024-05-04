<?php
//建立MySQL資料庫連結
$link = mysqli_connect("localhost", "root", "A12345678")
    or die("無法開啟MySQL資料庫連結!<br>");
mysqli_select_db($link, "_3.littlesheep"); //選擇myschool資料庫

// 送出UTF8編碼的MySQL指令
mysqli_query($link, "SET NAMES utf8");

// 從 $_POST 中取得修改後的資料
$name = mysqli_real_escape_string($link, $_POST["chang_name"]);
$password = mysqli_real_escape_string($link, $_POST["chang_password"]);
$phone = mysqli_real_escape_string($link, $_POST["chang_phone"]);
$email = mysqli_real_escape_string($link, $_POST["chang_email"]);

// 使用 session 中的 member_id 進行更新
$member_id = $_SESSION['member_id'];

// 設定 MySQL 查詢字串
$sql = "UPDATE member
        SET member_name='$name', member_password='$password', member_phone='$phone', member_email='$email'
        WHERE member_id = $member_id";

if (mysqli_query($link, $sql)) {
    // 更新 session 中的資料
    $_SESSION['member_name'] = $name;
    $_SESSION['member_password'] = $password;
    $_SESSION['member_phone'] = $phone;
    $_SESSION['member_email'] = $email;

    echo "<script>alert('資料修改成功!'); window.location.href='會員資料.php';</script>";
    exit;
} else {
    echo "<script>alert('資料修改失敗...');</script>";
}

// 關閉 MySQL 資料庫連結
mysqli_close($link);
?>
