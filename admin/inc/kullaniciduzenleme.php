<?php

$liste=$vt->ListeleKosullu("kullanici","KullaniciID=".@$_GET["kid"]);
$kayit=  mysql_fetch_array($liste);
?>
<form action="index.php?pid=165" method="POST">
<table class="table-condensed " border="0" align="center">
        <tr>
            <td>Kullanıcı Adı</td>
            <td>
        <input type="hidden" name="kullaniciId" value="<?php echo $kayit["KullaniciID"]; ?>"/>
                <?php echo $kayit["KullaniciAdi"]; ?></td>
        </tr>
        <tr>
            <td>Parola</td>
            <td><input type="password" name="txtParola" value="" /></td>
        </tr>
        <tr>
            <td>E Posta</td>
            <td><input type="text" name="txtEposta" 
                       value="<?php echo $kayit["Eposta"]; ?>" /></td>
        </tr>
        <tr align="center">
            <td colspan="2">
                <input class="btn btn-danger" type="reset" value="Temizle" />
                <input class="btn btn-primary" type="submit" value="Düzenle" /></td>
        </tr>
</table>
</form>
