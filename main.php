<?php
    $pid=@$_GET["pid"]; //orta kısımda açılacak olan sayfanın id'si
echo "<center>".@$_GET["mesaj"]."</center>";
if ($pid==1){  //orta kısımda ana sayfanın çağırılması
    include 'inc/default.php';
} else if ($pid==2){ //Ürünler sayfasının çağırılması
    include 'inc/hakkimizda.php';
} else if ($pid==3){ //Sıkça Sorulan Soruların Çağırılması
    include 'inc/iletisim.php';
} else if ($pid==5){  //Kullanıcı giriş sayfasının çağırılması
    include 'inc/login.php';
} else if ($pid==4){
    include 'inc/kayit.php';
} 
else if ($pid==6){  
    include 'inc/urunler.php';
} 
else if ($pid==50){ 
    $vt->LoginKontrol($_POST["txtKullanici"],$_POST["txtParola"]);
}
else if($pid==44){
    //Kayıt girdisi yapılacak.
    $vt->KayitEkle($_POST["user_name"],$_POST["pwd"],$_POST["user_email"]);
}
else if($pid==45){
    //Mesaj içeriği kaydedilecek.
    $vt->MesajEkle($_POST["txtAd"],$_POST["txtSoyad"],$_POST["txtEmail"],$_POST["telefon"],$_POST["mesajlar"]);
}
else if ($pid==51){ 
    session_destroy(); 
    header("Location:index.php?pid=5"); 
}
$kid = @$_GET["kid"];
if($kid==1){
    include 'inc/web.php';
}
else if($kid==2){
    include 'inc/mobil.php';
}
else if($kid==3){
    include 'inc/java.php';
}
else if($kid==4){
    include 'inc/cpp.php';
}
else if($kid==5){
    include 'inc/database.php';
}
else if($kid==6){
    include 'inc/network.php';
}

    
?>