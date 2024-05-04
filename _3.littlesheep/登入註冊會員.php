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

        <main class="login_pages" id="置中">
            <div class="">
                <h2>會員登入</h2>
                <form id="loginForm" method="post">

                    <label for="name">姓名：</label>
                    <input type="text" id="name_in" name="name_in" required>

                    <label for="password">密碼：</label>
                    <input type="password" id="password_in" name="password_in" required>

                    <label for="phone">電話：</label>
                    <input type="text" id="phone_in" name="phone_in" required>

                    <label for="email">電子信箱：</label>
                    <input type="text" id="email_in" name="email_in" required>

                    <br><br>

                    <input type="submit" name="login" value="登入">
                        
                    <?php
                        if (isset($_POST["login"])) {
                            include_once('會員登入.inc');
                        }
                    ?>
                </form>
            </div>

            <div class="logup">
                <h2>會員註冊</h2>
                <form id="registerForm" method="post">

                    <label for="name">姓名：</label>
                    <input type="text" id="name_up" name="name_up" required>

                    <label for="password">密碼：</label>
                    <input type="password" id="password_up" name="password_up" required>

                    <label for="phone">電話：</label>
                    <input type="text" id="phone_up" name="phone_up" required>

                    <label for="email">電子信箱：</label>
                    <input type="text" id="email_up" name="email_up" required>

                    <br><br>

                    <input type="submit" name="register" value="註冊">

                    <?php
                        if (isset($_POST["register"])) {
                            include_once('會員註冊.inc');
                        }
                    ?>
                </form>
            </div>
        </main>
    </body>
</html>    