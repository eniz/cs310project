<form action="index.php?pid=170" method="POST">
<table class="table table-striped" border="0" align="center">

        <tr>
            <td>Kitap Adı</td>
            <td><input type="text" name="txtKitap" value="" /></td>
        </tr>
        <tr>
            <td>Yayınevi</td>
            <td><input type="text" name="txtYayinevi" value="" /></td>
        </tr>
        <tr>
            <td>Yazar</td>
            <td><input type="text" name="txtYazar" value="" /></td>
        </tr>
        <tr>
            <td>Fiyat</td>
            <td><input type="text" name="txtFiyat" value="" /></td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td>
                <?php
                    $vt->cmbKategoriler("cmbKategoriler");
                ?>
            </td>
        </tr>        
        
        <tr align="center">
            <td colspan="2"><input class="btn btn-large btn-primary" type="submit" value="Ekle" /></td>
        </tr>
</table>
</form>
<br>
<br>
<table class="table table-striped" border="0" align="center" width="90%">
        <tr>
            <td>Ürün Adı</td>
            <td>Yayınevi</td>
            <td>Yazar</td>
            <td>Fiyat</td>
            <td>Kategori</td>
            <td>İşlemler</td>
        </tr>
<?php
    $sid=@$_GET["sid"];
    if ($sid=="" || $sid<1) {
        $sid=1;
    }
    $sayfakayit=10;
    $kayitliste=$vt->ListeleKosullu("urun",'1');
    $toplamkayit=  mysql_num_rows($kayitliste);
    $ilkkayit=($sid-1)*$sayfakayit;
    
    $liste=$vt->ListeleSayfalama("urun",'1',$ilkkayit,$sayfakayit);
    while ($kayit = mysql_fetch_array($liste)) {
        echo "<tr>
            <td>".$kayit["Adi"]."</td>
            <td>".$kayit["Yayinevi"]."</td>
            <td>".$kayit["Yazar"]."</td>
            <td>".$kayit["Fiyat"]."</td>
            <td>".$kayit["KategoriID"]."</td>
            <td>
             <a class='btn btn-danger' href='index.php?pid=176&uid=".$kayit["KategoriID"]."'><i class='icon-trash icon-white'></i>Sil</a>
             <a class='btn btn-success' href='index.php?pid=175&uid=".$kayit["KategoriID"]."'><i class='icon-edit icon-white'></i>Düzenle</a>
            </td>
        </tr>";
    }
?>
        <tr>
            <td colspan="5" align="center">
                <div id="pagination">
            <?php
                $sayfa=1;
                while ((($sayfa-1)*$sayfakayit)<$toplamkayit) {
                    if ($sayfa==$sid) {
                        echo " $sayfa ";
                    } else {
                        echo "<a class='badge badge-success' href='index.php?pid=101&sid=$sayfa'> $sayfa </a>";
                    }
                        $sayfa++;
                }
            ?>
                </div>
            </td>
        </tr>    
</table>
