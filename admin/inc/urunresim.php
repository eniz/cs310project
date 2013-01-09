<?php
    $liste=$vt->ListeleKosullu("tblurunler","id=".@$_GET["uid"]);
    $kayit=  mysql_fetch_array($liste);

?>
<form action="index.php?pid=185" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="uid" 
           value="<?php echo @$_GET["uid"];?>"/>
    <table border="1" width="80%" align="center">
            <tr align="center">
                <td colspan="2"><?php echo $kayit["urun_adi"]; ?></td>
            </tr>
            <tr>
                <td>Açıklama</td>
                <td><textarea name="txtaciklama" rows="4" cols="20">
                    </textarea></td>
            </tr>
            <tr>
                <td>Resim</td>
                <td>
                  <input type="file" name="uresim"/>  
                </td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <input type="submit" value="EKLE" />
                </td>
            </tr>
    </table>

</form>

<table border="1" align="center" width="90%">
        <tr>
            <td>Resim</td>
            <td>Açıklama</td>
            <td>İşlem</td>
        </tr>
<?php
    $liste=$vt->ListeleKosullu("tblresimler","urun_id=".@$_GET["uid"]);
    while ($kayit = mysql_fetch_array($liste)) {
        echo "<tr>
            <td>
<a href='../uresimler/".$kayit["id"].".jpg'>
<img src='../uresimler/".$kayit["id"].".jpg' 
        width='60' height='60'/>
</a>        </td>
            <td>".$kayit["aciklama"]."</td>
            <td>Sil
            </td>
        </tr>";
    
    }

?>
</table>