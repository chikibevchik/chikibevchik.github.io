<h2>Зробити сайт з нами легко</h2></font>
    <h1 align="center">Дякуємо за регістрацію !</h1>
    <?php
    <h1 align="center">Список зареєстрованих !</h1>;
    <table align="center" border="1" width="600">
    <tr>
    <td align="center"><b>Призвіще</b></td>
    <td align="center"><b>Імя</b></td>
    <td align="center"><b>e-mail</b></td>
    <td align="center"><b>Пароль</b></td>
</tr>
<?php
$data =file("baza.txt");
foreach ($data as $line)
{
    $trs = explode (";",$line);
    echo '<tr>';
    echo '<td>'.$trs[0].'</td>';
    echo '<td>'.$trs[1].'</td>';
    echo '<td>'.$trs[2].'</td>';
    echo '<td>'.$trs[3].'</td>';
    echo '<tr>';
}
?>
</table>;
    ?>
    </h1>
  Ми можемо створити сайт, який стане для Вас вдалою інвестицією.</p></p></font>