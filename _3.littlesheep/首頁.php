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
            <img src="photo/封面照片.jpg" class="cover">
            <p class="word">THREE<br>&nbspLITTLE SHEEP</p>
        </main>
        <main id="置中">
            <div class="首1">
                <a href="司康.php"><h4>司康</h4></a>
                <a href="司康.php"><img src="首頁/司康1.jpg" class="首圖"></a>
                <a href="司康.php"><img src="首頁/司康2.jpg" class="首圖2"></a>
            </div>
            <div class="首1">
                <a href="磅蛋糕.php"><h4>磅蛋糕</h4></a>
                <a href="磅蛋糕.php"><img src="首頁/磅蛋糕1.jpg" class="首圖"></a>
                <a href="磅蛋糕.php"><img src="首頁/磅蛋糕2.jpg" class="首圖2"></a>
            </div>
            <div class="首1">
                <a href="肉桂捲.php"><h4>肉桂捲</h4>  </a>             
                <a href="肉桂捲.php"><img src="首頁/肉桂捲1.jpg" class="首圖"></a>
                <a href="肉桂捲.php"><img src="首頁/肉桂捲2.jpg" class="首圖2"></a>
            </div>
        </main>
        <main id="置中" >
            <div class="首2">
                <a href="牛角麵包.php"><h4>牛角麵包</h4></a>
                <a href="牛角麵包.php"><img src="首頁/牛角麵包1.jpg" class="首圖"></a>
                <a href="牛角麵包.php"><img src="首頁/牛角麵包2.jpg" class="首圖2"></a>
            </div>
            <div class="首2">
                <a href="葡式蛋塔.php"><h4>葡式蛋塔</h4></a>
                <a href="葡式蛋塔.php"><img src="首頁/蛋塔1.jpg" class="首圖"></a>
                <a href="葡式蛋塔.php"><img src="首頁/蛋塔2.jpg" class="首圖2"></a>
            </div>
            <div class="首2">
                <a href="美式軟餅乾.php"><h4>美式軟餅乾</h4></a>
                <a href="美式軟餅乾.php"><img src="首頁/軟餅乾1.jpg" class="首圖"></a>
                <a href="美式軟餅乾.php"><img src="首頁/軟餅乾2.jpg" class="首圖2"></a>
            </div>
        </main>
        <main id="置中">
            <div class="首3">
                <a href="巧克力布朗尼.php"><h4>巧克力布朗尼</h4></a>
                <a href="巧克力布朗尼.php"><img src="首頁/布朗尼1.jpg" class="首圖"></a>
                <a href="巧克力布朗尼.php"><img src="首頁/布朗尼2.jpg" class="首圖2"></a>
            </div>
            <div class="首3">
                <a href="巴斯克乳酪蛋糕.php"><h4>巴斯克乳酪蛋糕</h4></a>
                <a href="巴斯克乳酪蛋糕.php"><img src="首頁/巴斯克1.jpg" class="首圖"></a>
                <a href="巴斯克乳酪蛋糕.php"><img src="首頁/巴斯克2.jpg" class="首圖2"></a>
            </div>
        </main>
        <footer class='footer'>
            <h1 class='聯絡我們'>聯絡我們 :</h1><br>
            <table id='置中'>
                <tr>
                    <td class='contct_td'>電話 :</td>
                    <td class='contct_td'>0988193249</td>
                </tr>
                <tr>
                    <td class='contct_td'>電子郵件 :</td>
                    <td class='contct_td'>jojojojoyang@gmail.com</td>
                </tr>
                <tr>
                    <td class='contct_td'>Instagram :</td>
                    <td class='contct_td'>@_3.littleshee</td>
                </tr>
            </table>
        </footer>
    </body>
</html>    