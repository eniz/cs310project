<?php  

class db { 
    
    public $sunucu="localhost";  
    public $kullanici="root";
    public $parola="123";        
    public $veritabani="kitapci_db";  
    
    //Sunucuya bağlantı kurmak için yazdığımız fonksiyon 
    private function baglan() {
        mysql_connect($this->sunucu, $this->kullanici, $this->parola) or die("Sunucuya Bağlanamadı");
        mysql_select_db($this->veritabani) or die("Veritabanına Bağlanamadı");
        mysql_set_charset("utf8"); 
    }
    
    //Sunucudan bağlantıyı kopartmak için yazdığımız fonksiyon
    private function kopar() {
        mysql_close();   
    }
    
    //Gönderdiğimiz tablo ismine göre tablodaki bütün verileri geri döndüren fonksiyon
    public function ListeleTumu($tablo) {
        $this->baglan();      
        $sql="Select * from ".$tablo;      
        $veriler=mysql_query($sql) or die("Sorgumuz Hatalı");   
        $this->kopar(); 
        return $veriler; 
        
    }
    //Tablodan rasgele bir kitap getirmek için
    public function RasgeleGetir($tablo){
        $this->baglan();
        $sql = "SELECT Adi,Yazar,Yayinevi,Resim FROM $tablo order by rand() limit 1";
        $veri = mysql_query($sql) or die("Sorgumuz Hatalı");
        $this->kopar();
        return $veri;
    }
    
    //Urunler tablosundan en son eklenen kitapları getir
    public function EnsonGetir($tablo){
        $this -> baglan();
        $sql = "SELECT * From $tablo order by UrunID desc limit 0,6";
        $veri = mysql_query($sql) or die("Sorgumuz Hatalı");
        $this->kopar();
        return $veri;
    } 
    //Yeni bir kullanıcı kaydı alabilmek için
     public function KayitEkle($ad,$parola,$eposta){
         $this->baglan();
         $sql="insert into kullanici (KullaniciAdi,Parola,Eposta,Yetki)
            values ('$ad','$parola','$eposta',1)";
         mysql_query($sql) or die("Sorgu Hatalı");
         echo "Kaydınız Başarıyla Yapılmıştır!";
         $this->kopar();
    }
    //Ziyaretçilerin bize mesaj bırakabilmeleri için
    public function MesajEkle($ad,$soyad,$email,$telefon,$mesaj){
        $this->baglan();
        $sql = "insert into mesaj (Ad,Soyad,Email,Telefon,Mesaj) values('$ad','$soyad','$email','$telefon','$mesaj')";
        mysql_query($sql) or die("Sorgu Hatalı");
        echo "Mesajınız Başarıyla Gönderilmiştir.İlginiz için Teşekkür Ederiz.!";
        $this->kopar();
    }

    public function ListeleKosullu($tablo,$kosul) {
        $this->baglan();
        $sql="Select * from $tablo where $kosul";   
        $veriler=  mysql_query($sql)or die ("Kosullu Sorgu Hatalı");
        $this->kopar();
        return $veriler;
        
    }
    public function LoginKontrol($kullanici,$parola) {
        $this->baglan();
        $sql="Select * from Kullanici where 
               KullaniciAdi='$kullanici' and Parola='$parola'";  
        $veriler=  mysql_query($sql)or die ("Sorgu Hatalı");
        if (mysql_num_rows($veriler)!=0){ 
            $_SESSION["name"]=$kullanici;  
            $kayit=  mysql_fetch_array($veriler);  
            $_SESSION["yetki"]=$kayit["yetki"];  
            if ($_SESSION["yetki"]=='1'){      
                header("Location:index.php?pid=1"); 
            } else if($_SESSION["yetki"]=='100') {
                header("Location:admin/index.php"); 
            }
        } else {   //Login başarısız ise
            header("Location:index.php?pid=5");  
        }
        $this->kopar();        
    }
    public function adminKontrol() {
        if ($_SESSION["yetki"]!=100){ 
            header("Location:../index.php");  
        }
    }
    public function kullaniciEkle($kullanici,$parola,$eposta) {
        $this->adminKontrol();
        $this->baglan();
        $sql="insert into kullanici (KullaniciAdi,Parola,Eposta,yetki)
            values ('$kullanici','$parola','$eposta',1)";  
        mysql_query($sql) or die("Sorgu Hatalı");  
        $this->kopar();
    }
    
    public function kullaniciSil($kullaniciid){
        $this->adminKontrol();
        $this->baglan();
        $sql="DELETE from kullanici where KullaniciID=$kullaniciid";
        mysql_query($sql) or die("Sorgu Hatalı");
        $this->kopar();        
    }
    
    public function kullaniciGuncelle($kullaniciid,$parola,$eposta) {
        $this->adminKontrol();
        $this->baglan();
        $sql="Update kullanici SET Parola='$parola',Eposta='$eposta'
            where KullaniciID=$kullaniciid";
        mysql_query($sql) or die("Sorgu Hatalı");
        $this->kopar();
    }   
    public function cmbKategoriler($name="cmbkategoriler",$seciliid=NULL) {
        $liste=  $this->ListeleTumu("kategori");
         echo "<select name='$name' id='$name'>";
        while ($kayit = mysql_fetch_array($liste)) {
            if($kayit["KategoriID"]==$seciliid){
                echo "<option value='".$kayit["KategoriID"]."' selected>".$kayit["KategoriAdi"]."</option>";
            } else {
                echo "<option value='".$kayit["KategoriID"]."'>".$kayit["KategoriAdi"]."</option>";
            }
        }
        echo "</select>";   
    }
    
    public function urunEkle($urunadi,$yayinevi,$yazar,$fiyat,$kategori) {
        $this->adminKontrol();
        $this->baglan();
        $sql="insert into urun (Adi,Yayinevi,Yazar,Fiyat,Kategori_id)
            values ('$urunadi','$yayinevi','$yazar','$fiyat',$kategori')"; 
        mysql_query($sql) or die("Sorgu Hatalı");  
        $this->kopar();
    }    
    public function urunGuncelle($urunid,$urunadi,$yayinevi,$yazar,$fiyat,$kategori) {
        $this->adminKontrol();
        $this->baglan();
        $sql="Update urun SET Adi='$urunadi',Yayinevi='$yayinevi',Yazar='$yazar',Fiyat='$fiyat',KategoriID='$kategori'
            where UrunID=$urunid";
        mysql_query($sql) or die("Sorgu Hatalı");
        $this->kopar();
    }     
    public function urunSil($urunid){
        $this->adminKontrol();
        $this->baglan();
        $sql="DELETE from urun where UrunID=$urunid";
        mysql_query($sql) or die("Sorgu Hatalı");
        $this->kopar();        
    }  
    public function ListeleSayfalama($tablo,$kosul,$ilk,$sayfakayit) {
        $this->baglan();
        $sql="Select * from $tablo where $kosul Limit $ilk,$sayfakayit";
        //echo $sql;
        $veriler=  mysql_query($sql)or die ("Sayfalama Sorgu Hatalı");
        $this->kopar();
        return $veriler;
    }    
    public function sepeteekle($urunid,$adet,$musteri) {

        $urunliste=  $this->ListeleKosullu("tblurunler", "id=$urunid");
        $urunkayit=  mysql_fetch_array($urunliste);
        $toplamtutar=$urunkayit["fiyat"]*$adet;
        
        $musteriliste=  $this->ListeleKosullu("tblkullanici", "kullanici='$musteri'");
        $musterikayit=  mysql_fetch_array($musteriliste);
        $musteriid=$musterikayit["id"];
        $sql="insert into tblsepet (urun_id,kullanici_id,
            adet,tutar,durum)
            values ('$urunid','$musteriid','$adet','$toplamtutar','0')"; 
        //echo $sql;
        $this->baglan();
        mysql_query($sql) or die("Sorgu Hatalı");  
        $this->kopar();
    }
    
   
    
}

?>
