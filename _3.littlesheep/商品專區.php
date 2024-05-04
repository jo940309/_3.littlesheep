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
        $one_for_pages = 6;

        if(isset($_GET["Pages"])){
            $pages = $_GET["Pages"];
        }
        else{
            $pages = 1;
        }

        //建立MySQL資料庫連結
        $link = mysqli_connect("localhost","root","A12345678")
        or die("無法開啟MySQL資料庫連結!<br>");
        mysqli_select_db($link,"_3.littlesheep"); //選擇myschool資料庫
        //設定MySQL查詢字串
        $sql = "SELECT products_flavour, products_price, products_img, products_name
                FROM products";
        //送出UTF8編碼的MySQL指令
        mysqli_query($link,"SET NAMES utf8");

        //執行SQL查詢
        $result = mysqli_query($link, $sql);
        $total_fields = mysqli_num_fields($result); //取得欄位數
        $total_rows = mysqli_num_rows($result); //取得記錄數

        //計算總頁數
        $total_pages = ceil($total_rows/$one_for_pages); //ceil 無條件進位
        //計算這一頁第1筆紀錄的位置
        $offset = ($pages-1)*$one_for_pages;
        mysqli_data_seek($result,$offset); //移到此紀錄

        echo "<main class='products-form'><div>";
        echo "<table id='置中'>";
        
        $j = 1;
        while ($rows = mysqli_fetch_array($result, MYSQLI_NUM) and $j<=$one_for_pages){
            if ($j%3==1){
                echo "<tr>";
            }
            for($x = 0; $x<=$total_fields-1; $x++){
                switch ($x){
                    case 0:
                        echo "<td class='products-td'><a class='products-name' href='" . $rows[3] . ".php'>" . $rows[$x]. "</a>";
                        break;
                    case 1:
                        echo "<a class='products-price' href='" . $rows[3] . ".php'>" . $rows[$x] . "元</a>";
                        break;
                    case 2:
                        echo "<a  href='" . $rows[3] . ".php'><img src='" . $rows[$x] . "' class='products-img' id='置中'></a></td>";
                        break;
                } 
            }
            if ($j%3==0){
                echo "</tr>";
            }
            $j++;
        }
        echo "</table></div><br>";
        
        echo "<div id='置中'>";
        if($pages>1){ //顯示上一頁
            echo "<a class='turn-pages' href='商品專區.php?Pages=" . ($pages-1) . "'>上一頁</a> ";
        }
        else{
            echo "<a class='Noturn-pages'>上一頁</a> ";
        }

        for ($i=1; $i<=$total_pages; $i++){
            if($i!=$pages){
                echo "<a class='turn-pages' href=\"商品專區.php?Pages= " . $i . "\">" . $i . " </a>";
            }
            else{
                echo "<a class='Noturn-pages'>" . $i . " </a>";
            }
        }

        if ($pages < $total_pages){ //顯示下一頁
            echo "<a class='turn-pages' href='商品專區.php?Pages=" . ($pages+1) . "'>下一頁</a> ";
        }
        else{
            echo "<a class='Noturn-pages'>下一頁</a> ";
        }
        
        echo "</div></main>";
        
        mysqli_free_result($result);
        require_once("close.inc");
        ?>
        <br><br><br><br><br>
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
        <br><br><br><br><br>
    </body>
</html>    