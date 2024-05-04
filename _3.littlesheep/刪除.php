<?php
error_reporting(E_ERROR | E_WARNING);
require_once "class.Cart.php";
session_start();
$cart =& $_SESSION['classCart'];
if(!is_object($cart)){
    $cart = new Cart([
        "cartMaxItem" => 0,
        "itemMaxQunantity" => 99,
        "useCookie" => false
    ]);
}

if (isset($_GET['id'])) {
    $idToDelete = $_GET['id'];
    $cart->remove($idToDelete);
}
// 重定向到購物車頁面
header("Location: 購物車.php");
exit; // 確保在重定向後結束執行

?>
