
    <h2>Зробити сайт з нами легко</h2></font>
    <h1 align="center">Дякуємо за регістрацію !</h1>
    <?php
    $st=$_POST['name2'].";".$_POST['name1'].";".$_POST['email'].";".$_POST['password']."\n";
    $fp = fopen("baza.txt","a");
    $test = fwrite($fp$st);
    echo "<h2 align='center' >Ви ввели :".$_POST['name2'].",".$_POST['name1'].",".$_POST['email'].",".$_POST['password']."</h2>";
    ?>
    </h1>
  Ми можемо створити сайт, який стане для Вас вдалою інвестицією.</p></p></font>

