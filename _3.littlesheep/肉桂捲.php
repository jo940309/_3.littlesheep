<?php
    require("class.Cart.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>三隻小羊烘焙室</title>
        <meta charset="utf-8"></meta>
        <link rel="stylesheet" href="css.css" type="text/css">
        <link rel="shortcut icon" href="photo/logo.png" >
        <script src="js.js"></script>
    </head>
    <body class="body1">
        <a href="#" class="back-to-top">︽</a>
        <header id="置中">
            <a href="首頁.php"><img src="photo/logo.png" class="photo1"></a>
            <ul class="menu">
                <li><a href="商品專區.php" class="li1">商品專區</a>
                    <ul>
                        <li><a href="司康.php">司康</a></li>
                        <li><a href="磅蛋糕.php">磅蛋糕</a></li>
                        <li><a href="肉桂捲.php">肉桂捲</a></li>
                        <li><a href="牛角麵包.php">牛角麵包</a></li>
                        <li><a href="葡式蛋塔.php">葡式蛋塔</a></li>
                        <li><a href="美式軟餅乾.php">美式軟餅乾</a></li>
                        <li><a href="巧克力布朗尼.php">巧克力布朗尼</a></li>
                        <li><a href="巴斯克乳酪蛋糕.php">巴斯克乳酪蛋糕</a></li>
                    </ul>
                </li>
                <li><a href="購物車.php" class="li1">購物車</a></li>
                <li><a href="#" class="li1" onclick="openContactForm()">聯絡我們</a></li>
                <li><?php
                session_start();
                if(isset($_SESSION['member_name'])){
                    $user_name = $_SESSION['member_name'];
                    echo "<a href='會員資料.php'>歡迎 " . $user_name . "</a>";
                }
                else{
                    echo "<a href='登入註冊會員.php'>尚未登入</a>";
                }
                ?></li>
            </ul>
            <!--聯絡我們視窗-->
            <div id="contactForm" class="contact-form" style="display: none;">
                <span class="close-btn" onclick="closeContactForm()">&times;</span>
                <h2>聯絡我們</h2>
                <a>電話 : 0988193249</a><br>
                <form id="form" method="post" onsubmit="return ContactFormSuccess();">
                    <label for="sender">電子信箱：</label>
                    <input type="text" id="sender" name="sender" required>

                    <label for="message">信件內容：</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                    <br>
                    <input type="submit" name="contact" value="送出">
                    
                    <?php
                    try {
                        if (isset($_POST["contact"])) {
                            include_once('聯絡我們.inc');
                        }
                    } catch (Exception $e) {
                        // 记录错误到日志文件或其他处理
                    }
                    ?>
                </form>
            </div>

        </header>
        <main>
        <?php
            error_reporting(E_ERROR | E_WARNING);
            session_start();
            $cart =& $_SESSION['classCart'];
            if(!is_object($cart)){
                $cart = new Cart([
                    "cartMaxItem" => 0,
                    "itemMaxQunantity" => 99,
                    "useCookie" => false
                ]);
            }
            $msg = "";

            //建立MySQL資料庫連結
            $link = mysqli_connect("localhost","root","A12345678")
            or die("無法開啟MySQL資料庫連結!<br>");
            mysqli_select_db($link,"_3.littlesheep"); //選擇myschool資料庫
            //設定MySQL查詢字串
            $sql = "SELECT products_id, products_flavour, products_price, products_introduce, products_img
                    FROM products
                    WHERE products_name='肉桂捲'";
            //送出UTF8編碼的MySQL指令
            mysqli_query($link,"SET NAMES utf8");

            //執行SQL查詢
            $result = mysqli_query($link, $sql);
            $total_fields = mysqli_num_fields($result); //取得欄位數
            $total_rows = mysqli_num_rows($result); //取得記錄數


            echo "<main>";
            
            while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)) {
                echo "<table class='buying_table' id='置中'>";
                echo "<form id='form" . $rows[0] . "' method='post'><tr>";

                echo "<td class='buying_td1'><a>" . $rows[0] . "</a></td>";
                echo "<td class='buying_td2'><img src='" . $rows[4] . "' class='buying_img'></td>";

                echo "<td class='buying_td3'>";
                echo "<h1>" . $rows[1] . "&nbsp&nbsp&nbsp&nbsp" . $rows[2] . "</h1>";
                
                echo "<a>" . $rows[3] . "</a></td>";

                echo "<td class='buying_td4'><a>&nbsp&nbsp&nbsp&nbsp數量:</a><br>";
                echo "&nbsp&nbsp&nbsp&nbsp<input class='buying_num' type='text' name='count' required><br>";
                echo "&nbsp&nbsp&nbsp&nbsp<input type='submit' name='order" . $rows[0] . "' value='加入購物車' required></td></tr>";

                echo "</form></table>";

                if (isset($_POST["order$rows[0]"]) && $_POST["count"] != "") {
                    $id = $rows[0];
                    $img = $rows[4];
                    $name = $rows[1];
                    $price = $rows[2];
                    $count = $_POST["count"];

                    $cart->add($id, $count, $img, $name, $price);

                    echo "<script>alert('已將所選的商品\"" . $name . "\"放入購物車!');</script>";
                }
                
            }
            

            mysqli_free_result($result);
            require_once("close.inc");
        ?>
        </main>
    </body>
</html>    