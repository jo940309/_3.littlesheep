<?php
/*onsubmit="return ContactFormSuccess();"
// 建立 MySQL 資料庫連結
$link = mysqli_connect("localhost", "root", "A12345678") 
or die("無法開啟 MySQL 資料庫連結!<br>");
mysqli_select_db($link, "_3.littlesheep"); // 選擇 feedback 資料庫

// 設定 MySQL 查詢字串
$sql = "";

// 送出 UTF8 編碼的 MySQL 指令
mysqli_query($link, "SET NAMES utf8");

// 處理表單提交
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取表单数据
    $sender = mysqli_real_escape_string($link, $_POST["sender"]);
    $message = mysqli_real_escape_string($link, $_POST["message"]);

    // 构建插入数据的 SQL 语句
    $sql = "INSERT INTO feedback (email, feedback) VALUES ('$sender', '$message')";

    // 执行 SQL 语句
    $result = mysqli_query($link, $sql);

    // 检查插入是否成功
    if (!$result) {
        die("插入失敗：" . mysqli_error($link));
    }
}

// 關閉 MySQL 資料庫連結
mysqli_close($link);

*/

try {
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sender = $_POST["sender"];
    $message = $_POST["message"];

    $to = "s1110934024@nutc.edu.tw";
    $subject = "意見回饋";
    $body = "寄件人: $sender\n\n内容:\n$message";
    $header = "From: $sender";

    // 寄送郵件
    if (mail($to, $subject, $body, $header)) {
        echo "<script>alert('送出成功，謝謝您的意見！');</script>";
    } else {
        echo "<script>alert('送出失敗，請重新發送！');</script>";
    }

}

} catch (Exception $e) {
    // 这里可以处理异常，例如记录到日志文件
    // 如果你不想执行任何操作，可以留空
}

?>
