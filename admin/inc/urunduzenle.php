<?php
    $liste=$vt->ListeleKosullu("urun","UrunID=".@$_GET["uid"]);
    $kayit=  mysql_fetch_array($liste);

?>
<form action="index.php?pid=166" method="POST">
<table  class="table table-striped" border="0" align="center">
<input type="hidden" name="txtuid" value="<?php echo $kayit["UrunID"]; ?>" />
        <tr>
            <td>Kitabın Adı</td>
            <td><input class="span3" type="text" name="txturun" 
                       value="<?php echo $kayit["Adi"]; ?>" /></td>
        </tr>
        <tr>
            <td>Yayınevi</td>
            <td><input class="span3" type="text" name="txtyayinevi" 
                       value="<?php echo $kayit["Yayinevi"]; ?>" /></td>
        </tr>
        <tr>
            <td>Yazar</td>
            <td><input class="span3" type="text" name="txtyazar" 
                       value="<?php echo $kayit["Yazar"]; ?>" /></td>
        </tr>
         <tr>
            <td>Fiyat</td>
            <td><input class="span3" type="text" name="txtfiyat" 
                       value="<?php echo $kayit["Fiyat"]; ?>" /></td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td>
                <?php
                    $vt->cmbKategoriler("cmbKategoriler",$kayit["KategoriID"]);
                ?>
            </td>
        </tr>        
        
        <tr align="center">
            <td colspan="2"><input class="btn btn-success" type="submit" value="Düzenle" /></td>
        </tr>
</table>
</form>