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

        <?php
        //session_start();
        $name = $_SESSION['member_name'];
        $password = $_SESSION['member_password'];
        $phone = $_SESSION['member_phone'];
        $email = $_SESSION['member_email'];

        echo "<main class='chang_pages' id='置中'>";
        echo "<div class='chang_'>";
        echo "<h2 id='置中'>修改會員資料</h2>";
        echo "<form id='registerForm' method='post'>";

        echo "<label for='name'>姓名：</label>";
        echo "<input type='text' id='chang_name' name='chang_name' value='" . $name . "'>";

        echo "<label for='password'>密碼：</label>";
        echo "<input type='password' id='chang_password' name='chang_password' value='" . $password . "' required>";
        
        echo "<label for='phone'>電話：</label>";
        echo "<input type='text' id='chang_phone' name='chang_phone' value='" . $phone . "' required>";

        echo "<label for='email'>電子信箱：</label>";
        echo "<input type='text' id='chang_email' name='chang_email' value='" . $email . "' required>";

        echo "<br><br>";

        echo "<div id='置中'><input type='submit' name='reset' value='修改'></div>";
        if (isset($_POST["reset"])) {
            include_once('修改.inc');
        }

        echo "</form></div></main>";
        ?>
    </body>
</html>    