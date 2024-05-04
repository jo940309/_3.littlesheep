<?php
//建立MySQL資料庫連結
$link = mysqli_connect("localhost", "root", "A12345678")
or die("無法開啟MySQL資料庫連結!<br>");
mysqli_select_db($link, "_3.littlesheep"); //選擇myschool資料庫

// 設定 MySQL 查詢字串
$sql = "";

//送出UTF8編碼的MySQL指令
mysqli_query($link, "SET NAMES utf8");

require_once "class.Cart.php";
$cart =& $_SESSION['classCart'];
if (!is_object($cart)) {
    $cart = new Cart([
        "cartMaxItem" => 0,
        "itemMaxQunantity" => 99,
        "useCookie" => false
    ]);
}



if(isset($_SESSION['member_id'])){
    foreach ($cart->getItems() as $items) {
        $sql = "";
        
        $id = mysqli_real_escape_string($link, $items["id"]);
        $name = mysqli_real_escape_string($link, $items["attributs"]["name"]);
        $count = mysqli_real_escape_string($link, $items["count"]);
        $subtotal = mysqli_real_escape_string($link, $subtotal);
        $member = mysqli_real_escape_string($link, $_SESSION['member_id']);

        $member = $_SESSION['member_id'];

        $sql = "INSERT INTO myorder(myorder_products_id, myorder_products, myorder_num, myorder_price, myorder_member_id)
                VALUES ($id, '$name', $count, $subtotal ,$member)";

        
    }

    if ($result = mysqli_query($link, $sql)) {
        echo "<script>alert('訂單送出成功! 謝謝支持~');</script>";
        $cart->clear();
        echo "<script>window.location.href = '購物車.php';</script>";
    }
    else{
        echo "<script>alert('訂單送出失敗...');</script>";
        exit;
    }
    
}
else{
    echo "<script>alert('請先登入會員!');</script>";
}


// 關閉 MySQL 資料庫連結
mysqli_close($link);
?>