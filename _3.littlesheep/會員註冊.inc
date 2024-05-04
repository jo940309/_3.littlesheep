<?php
try {

//建立MySQL資料庫連結
$link = mysqli_connect("localhost", "root", "A12345678")
    or die("無法開啟MySQL資料庫連結!<br>");
mysqli_select_db($link, "_3.littlesheep"); //選擇myschool資料庫

// 設定 MySQL 查詢字串
$sql = "";

//送出UTF8編碼的MySQL指令
mysqli_query($link, "SET NAMES utf8");

// 收取表單數據
$email = mysqli_real_escape_string($link, $_POST["email_up"]);
$password = mysqli_real_escape_string($link, $_POST["password_up"]);
$name = mysqli_real_escape_string($link, $_POST["name_up"]);
$phone = mysqli_real_escape_string($link, $_POST["phone_up"]);

// 處理表單提交
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //檢查帳號是否重複
    $check = "SELECT * FROM member WHERE member_email='" . $email . "'";

    if (mysqli_num_rows(mysqli_query($link, $check)) == 0) {
        $sql = "INSERT INTO member (member_email, member_password, member_name, member_phone) 
                VALUES ('$email', '$password', '$name', '$phone')";
    
        if (mysqli_query($link, $sql)) {
            echo "<br>註冊成功! 請利用左側登入";
            
        } else {
            echo "Error creating table: " . mysqli_error($link);
        }
    } else {
        echo "<br>該帳號已註冊! 請利用左側登入";
        
    }    
}
// 關閉 MySQL 資料庫連結
mysqli_close($link);
// 跳转到注册结果页面
//header("Location: 會員專區.php");
//exit;


} catch (Exception $e) {
    // 这里可以处理异常，例如记录到日志文件
    // 如果你不想执行任何操作，可以留空
}
?>