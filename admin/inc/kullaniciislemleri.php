<form action="index.php?pid=150" method="POST">
<table class="table table-condensed" border="0" align="center">

        <tr>
            <td>Kullanıcı Adı</td>
            <td><input type="text" name="txtKullanici" value="" /></td>
        </tr>
        <tr>
            <td>Parola</td>
            <td><input type="password" name="txtParola" value="" /></td>
        </tr>
        <tr>
            <td>EPosta</td>
            <td><input type="text" name="txtEposta" value="" /></td>
        </tr>
        <tr align="center">
            <td colspan="2"><input class="btn btn-large btn-primary" type="submit" value="Ekle" /></td>
        </tr>
</table>
</form>
<br>
<br>
<table class="table table-condensed" border="0" align="center" width="90%">
        <tr>
            <td>Kullanıcı</td>
            <td>Parola</td>
            <td>Eposta</td>
            <td>Yetki</td>
            <td>İşlemler</td>
        </tr>
<?php
    $liste=$vt->ListeleTumu("kullanici");
    while ($kayit = mysql_fetch_array($liste)) {
       echo "<tr>
            <td>".$kayit["KullaniciAdi"]."</td>
            <td>".$kayit["Parola"]."</td>
            <td>".$kayit["Eposta"]."</td>
            <td>".$kayit["yetki"]."</td>
            <td>";
       
       if ($kayit["yetki"]!=100) {
           echo " <a class='btn btn-danger' href='index.php?pid=155&kid=".$kayit["KullaniciID"]
                   ."'><i class='icon-trash icon-white'></i>Sil</a>
                  <a class='btn btn-success' href='index.php?pid=160&kid=".$kayit["KullaniciID"]
                   ."'><i class='icon-edit icon-white'></i>Düzenle</a>";
       } else {
           echo "Admin kendini silemez!!!";
       }
       echo "</td></tr>";
        
    
}
?>
</table>
