
<?php



     $pid=@$_GET["pid"];  //orta kısımda açılacak olan sayfanın id'si
$mesaj=@$_GET["mesaj"];
echo "<center>".$mesaj . "</center><br>";    
if ($pid==100){  //Kullanıcı Sayfasını çağırır
    include_once 'inc/kullaniciislemleri.php';
}
if ($pid==101){  //Ürün Sayfasını çağırır
    include_once 'inc/urunler.php';
}
else if ($pid==150){  //Kullanıcı ekle
    if (@$_POST["txtKullanici"]=="" || @$_POST["txtParola"]=="") {
        header("Location:index.php?pid=100&mesaj=Bilgiler Bos Gecilemez");
    } else {
        $vt->KullaniciEkle($_POST["txtKullanici"],$_POST["txtParola"],
                $_POST["txtEposta"]);
        
                header("Location:index.php?pid=100&mesaj=Kullanıcı Başarıyla Eklendi");
    }        
}
else if($pid==155) { //Kullanıcı Sil
    if (@$_GET["kid"]=="") {
        header("Location:index.php?pid=100&mesaj=Silinecek Kayıdı Seçin");
    } else {
        $vt->kullaniciSil($_GET["kid"]);
        header("Location:index.php?pid=100&mesaj=Kullanıcı Başarıyla Silindi");
    }
}
else if($pid==160) { //Kullanıcı Duzenleme Sayfası
    include_once 'inc/kullaniciduzenleme.php';
} 
else if ($pid==165){  //Kullanıcı Düzenleme
    if (@$_POST["txtParola"]=="" || @$_POST["kullaniciId"]=="") {
        header("Location:index.php?pid=100&mesaj=Bilgiler Bos Gecilemez");
    } else {
        $vt->kullaniciGuncelle($_POST["kullaniciId"], $_POST["txtParola"],$_POST["txtEposta"]);
        header("Location:index.php?pid=160&kid=".@$_POST["kullaniciId"]."&mesaj=Kullanıcı Başarıyla Güncellendi");
    }        
}
else if ($pid==166){  //ÜRÜN Düzenleme
    if (@$_POST["txturun"]=="" || @$_POST["txtuid"]=="") {
        header("Location:index.php?pid=101&mesaj=Bilgiler Bos Gecilemez");
    } else {
        $vt->urunGuncelle($_POST["txtuid"],$_POST["txturun"],$_POST["txtyayinevi"],$_POST["txtyazar"],$_POST["txtfiyat"],$_POST["cmbKategoriler"]);
        header("Location:index.php?pid=175&uid=".@$_POST["txtuid"]."&mesaj=Ürün Başarıyla Güncellendi");
    }        
}
else if ($pid==170){  //Ürün ekle
    if (@$_POST["txturun"]=="" || @$_POST["cmbKategoriler"]=="") {
        header("Location:index.php?pid=101&mesaj=Bilgiler Bos Gecilemez");
    } else {
        $vt->urunEkle($_POST["txturun"],$_POST["txtdetay"],$_POST["txtfiyat"],$_POST["cmbKategoriler"]);
                header("Location:index.php?pid=101&mesaj=Ürün Başarıyla Eklendi");
    }        
}
else if ($pid==175){  //Kullanıcı Düzenleme
    if (@$_GET["uid"]=="") {
        header("Location:index.php?pid=101&mesaj=Düzenlenecek Ürün Seçilmemiş");
    } else {
        include_once 'inc/urunduzenle.php';
    }        
}
else if ($pid==176){  //Ürün SİL
    if (@$_GET["uid"]=="") {
        header("Location:index.php?pid=101&mesaj=Silinecek Ürün Seçilmemiş");
    } else {
        $vt->urunSil(@$_GET["uid"]);
        header("Location:index.php?pid=101&mesaj=Ürün Başarıyla Silinmiştir");
    }        
}
else if ($pid==180){  //
    if (@$_GET["uid"]=="") {
        header("Location:index.php?pid=101&mesaj=Resim Eklenecek Ürün Seçilmemiş");
    } else {
        include_once 'inc/urunresim.php';
    }        
}
else if ($pid==185){  //
    if (@$_POST["uid"]=="") {
        header("Location:index.php?pid=101&mesaj=Resim Eklenecek Ürün Seçilmemiş");
    } else {
        $resimid=$vt->ResimEkle(@$_POST["uid"],@$_POST["txtaciklama"]);
        move_uploaded_file($_FILES["uresim"]["tmp_name"], "../uresimler/".$resimid.".jpg");
        header("Location:index.php?pid=180&uid=".@$_POST["uid"]."&mesaj=Resim Başarıyla Eklendi");
    }        
}
?>
