<html>
    <head>
        <meta charset="UTF-8">
        <title>Сайт web-студії "Web-DECO"</title>
        <script src="js/clock1.js"></script>
        <script type="text/javascript">
            function send()
            {
                var valid = true;
                var elems = document.forms[0].elements;
                for(var i=0; i<document.forms[0].length; i++)
                {
                    if( elems[i].getAttribute('type') == 'text' ||
                       elems[i].getAttribute('type') == 'password' ||
                       elems[i].getAttribute('type') == 'email' ) 
                    {
                        if(elems[i].value == '')
                        {
                            elems[i].style.border = '2px solid red';
                            valid = false;
                        }
                    }
                }
                if(!valid)
                {
                    alert('Заповніть всі поля!!!');
                    return false;
                }
            }
        </script>
        <style>
            .shadowtext {
                text-shadow: 1px 3px 2px white, 0 0 1em red;
                color: #210042;
                font-size: 2em;
            }
        </style>
        <script>
            window.onload = function()
            {
                setInterval(clockPainting, 1000);
            }
        </script>
        </head>
        <body background="images/bg.jpg">
           <?php
           $log_path = 'log.txt';
           $user_ip = getenv(REMOTE_ADDR);
           $user_brouser = getenv(HTTP_USER_AGENT);
           $curent_time=date("ymd H:i:s");
           $log_string="$user_ip|$user_brouser|$curent_time|\r\n";
           $file=fopen($log_path,"a");
           fwrite($file,$log_string,strlen($log_string));
           fclose($file);
           ?> 
<table border="1" align="center" cellpadding="10">
<tr>
    <td background="images/bg-3.jpg" colspan="2" height="150" align="right"><font size="5" color="Maroon"><h1 class="shadowtext">Сайт web-студії "Web-DECO"</h1></font></td>
</tr>
<tr>
<td colspan="2"><font size="4"><b>
    <a href="index.php">Головна</a>&nbsp;&nbsp;
    <a href="foto.php">Фотогалерея</a>&nbsp;&nbsp;
    <a href="tel.php">Телефони</a>&nbsp;&nbsp;
    <a href="#">Статистика</a>&nbsp;&nbsp;
    <a href="#">Зареєстровані</a>&nbsp;&nbsp;
    </b></font>
    </td>
</tr>
<tr>
<td width="30%" valign="top" >
    <center><canvas id="canvas" height="120" width="120"></canvas></center>
    <hr>
    <font size="5" color="navy"><h2>Новини</h2></font>
    <font size="5" >
        <ul>
            <li><a href="#">Сайт будівельної компанії</a></li>
            <li><a href="#">Сайт ТМ "Новашкола"</a></li>
            <li><a href="#">Редизайн сайту classno.com.ua</a></li>
            <li><a href="#">Розробка CMS для Metro Cash&Carry</a></li>
            <li><a href="#">Сайт-візитка дизайнера інтерфейсів</a></li>
            <p align="right"><a href="#">інші...</a></p>
        </ul>
    </font>
    <hr>
    <h1 align="center"><font color="green">Реєстрація</font></h1>
    <form action="forma.php" method="post" onsubmit="return send() ;">
        <table align="center" bgcolor="#ccc">
            <tr>
                <td><font color="green">Прізвище</font>: </td>
                <td><input type="text" size="10" maxlength="20" name="name2"> </td>
            </tr>
        <tr>
            <td><font color="green">Ім'я</font> : </td>
            <td><input type="text" size="10" maxlength="20" name="name1"></td>
            </tr>
            <tr>
            <td><font color="green">E-Mail</font> : </td>
            <td><input type="email" size="10" maxlength="20" name="email"></td>
            </tr>
            <tr>
                <td><font color="green">Пароль</font> : </td>
                <td><input type="password" size="10" maxlength="20" name="password"></td>
            </tr>
        </table>
        
        <p align="center">
            <input type="submit" value="Зареєструватись" >
            <input type="reset" value="Очистити">
        </p>
    </form>
    <hr>
            </td>
<td width="70%"> valign='top'>
<h1 align="center">Результат пошуку</h1>
<TABLE align="center" border="1" width="90%" style='font-size:100%'>
<tr>
<td align="center"><b>Npp</b></td>
<td align="center"><b>Телефон</b></td>
<td align="center"><b>Прізвище</b></td>
<td align="center"><b>№ вулиці</b></td>
<td align="center"><b>№ Буд.</b></td>
<td align="center"><b>№ Кв.</b></td>
</tr>
<?php
$ntel = $_POST['ntel'];
$fio = $_POST['fio'];
$street = $_POST['nvul'];
$ndom = $_POST['nbud'];

$db_conn = mysqli_connect("localhost", "user", "Qwe45t67u", "tel09");
if (!$db_conn) echo "<b>База даних тимчасово не працює.<b>";
if ($ntel !="") $rez = "SELECT * FROM tel09 WHERE phone LIKE '%$ntel%'";
if ($fio !="") $rez = "SELECT * FROM tel09 WHERE a_name LIKE '%$fio%'";
$nst=(int)$street;
if ($street !="") $rez = "SELECT * FROM tel09 WHERE street = $nst";
if ($ndom !="") $rez = "SELECT * FROM tel09 WHERE house LIKE '$ndom'";

$result = mysqli_query($db_conn,$rez) or die("Запрос не вірний");

$cn=1;
while ($trs = mysqli_fetch_array($result, MYSQLI_NUM)) {
?>
<tr>
<td align="center"><?php echo $cn; ?></td>
<td><?php echo $trs[0]; ?></td>
<td><?php echo $trs[1]; ?></td>
$st = "select * from street where n_street=$trs[2]";
$result1 = mysqli_query($db_conn,$st) or die("Запрос 2 не вірний");
<?php $ts = mysqli_fetch_array($result1, MYSQLI_NUM); ?>
<td><?php echo $ts[1]; ?></td>
<td><?php echo $trs[3]; ?></td>
<td><?php echo $trs[4]; ?></td>
</tr>
<?php $cn++; } ?>
</TABLE>
</tr>
<tr>
<td background="images/bg-3.jpg" colspan="2" valign="middle" height="90">
    <font size="4">Сайт розробив "Автор"</font>
    </td>
</tr>
</table>
        </body>
</html>
