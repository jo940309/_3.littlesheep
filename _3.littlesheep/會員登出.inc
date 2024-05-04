<?php 
session_start();

if (isset($_SESSION['member_id'])) 
{
    unset($_SESSION['member_id']);
    unset($_SESSION['member_email']);
    unset($_SESSION['member_password']);
    unset($_SESSION['member_name']);
    unset($_SESSION['member_phone']);
}

?>

<script>alert('登出成功');</script>
<script>window.location.href = '登入註冊會員.php';</script>
