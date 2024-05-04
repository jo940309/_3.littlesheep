
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
                        
                    }
                    ?>
                </form>
            </div>

        </header>

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
        

        echo "<table class='car_title' border=0><tr>";
        echo "<td class='car_delete'>刪除商品</td>";
        echo "<td class='car_id'>商品編號</td>";
        echo "<td class='car_img'>商品示意圖</td>";
        echo "<td class='car_name'>商品名稱</td>";
        echo "<td class='car_price'>定價</td>";
        echo "<td class='car_count'>數量</td>";
        echo "<td class='car_subtotal'>小計</td>";
        echo "</tr></table>";

        if(!$cart -> isEmpty()){
            $total = 0;
            $total_count = 0;

            echo "<form id='sent_order' method='post'>";

            foreach($cart->getItems() as $items) {
                $price = $items["attributs"]["price"];
                $count = $items['count'];
                $subtotal = $count * $price;

                echo "<table class='car_table' border=0><tr>";
                echo "<td class='car_delete'><a href='刪除.php?id=" . $items['id'] . "'>刪除</a></td>";

                echo "<td class='car_id' name='myorder_products_id'>" . $items['id'] ."</td>";
                echo "<td><img class='car_img' src='" . $items['attributs']['img'] . "'></td>";
                echo "<td class='car_name' name='myorder_products'>" . $items['attributs']['name'] ."</td>";
                echo "<td class='car_price' name='myorder_price'>$ " . $items["attributs"]["price"] ."</td>";
                echo "<td class='car_count' name='myorder_num'>" . $items['count'] ."</td>";
                echo "<td class='car_subtotal'>$ " . $subtotal ."</td>";

                $total = $total + $subtotal;
                $total_count = $total_count + $count;
            }

            echo "<tr><td class='car_total' colspan='7' align='right'>";
            echo "總數量 = " . $total_count . "個&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
            echo "總金額 = NT$ " . $total . "元</td></tr></table>";

            echo "<input class='sent_order' type='submit' name='sent_order' value='送出訂單' required></form>";
            echo "<br><br><br><br><br><br><br><br><br><br><br><br>";

            if(isset($_POST['sent_order'])){
                include_once('我的訂單.inc');
            }

        }
        else{
            echo "<table class='car_empty' border=0><tr>";
            echo "<td class='car_id' colspan='7'>目前購物車是空的歐!</td>";
        }
        ?>
    </body>
</html>    