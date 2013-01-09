<?php
  session_start();
  include_once 'inc/db.php';
  $vt = new db();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="script/jquery-1.7.2.min.js"></script>        
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-responsive.css" rel="stylesheet">
        <script src="script/bootstrap-carousel.js"></script>
        <!--<script src="script/bootstrap-popover.js"></script><-->
        <script src="script/bootstrap-modal.js"></script>
        <script src="script/bootstrap-transition.js"></script>
        <script src="script/bootstrap-tooltip.js"></script>
        <script src="script/bootstrap-collapse.js"></script>
        <style>
            body{
            }
        </style>
        <script type="text/javascript">
            $(function(){
              $('#myModal').modal('hide');
               $('#element').tooltip('show'); /*Ürün detayını gösterirken lazım olacak*/
               $('#myCarousel').carousel({
                    interval: 4000
                 });
            })

        </script>
        <title>Kitap Cenneti</title>
    </head>
    <body>
        
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn-navbar" data-target=".nav-collapse" data-toggle="collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="index.php?pid=1">Kitap Cenneti</a>
                    <div class="nav-collapse">
                     <ul class="nav">
                         <li class="active"><a href="index.php?pid=1"><i class="icon-home icon-white"></i>Anasayfa</a></li>
                         <li><a href="index.php?pid=2"><i class="icon-user icon-white"></i>Hakkımızda</a></li>
                         <li><a href="index.php?pid=3"><i class="icon-comment icon-white"></i>İletişim</a></li>
                         <li><a class="" href="index.php?pid=4"><i class="icon-pencil icon-white"></i>Kayıt Yap</a></li>
                     </ul>
                        <form class="navbar-search pull-left" action="">
                            <input class="search-query span2" type="text" placeholder="Arama Yap"/>
                        </form>
                        <p class="navbar-text pull-right">
                        
                           <?php
                            
                          if (@$_SESSION["yetki"]==100){  
                           echo "<a class='btn btn-primary' href='admin/index.php?pid=1'>Kontrol Paneli</a> ";
                           }   
                           if (@$_SESSION["name"]==""){
                                    echo "Hoşgeldin Misafir";
                                    echo "<a class='btn btn-success' href='index.php?pid=5'>Giriş</a> ";
                              } else {
                                    echo "Hoşgeldin"." ".@$_SESSION["name"];
                                    echo "<a class='btn btn-danger' href='index.php?pid=51'>Çıkış</a> ";
                              }
                           ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav">
              <li class="page-header"><h3>Kategoriler</h3></li>
                <ul class="nav nav-list">
                    <li class="">
              <?php
                  $liste=$vt->ListeleTumu("Kategori");  
                  while ($kayit = mysql_fetch_array($liste)) {  
                  echo "<a class='' href='index.php?kid=".$kayit["KategoriID"].
                  "'>".$kayit["KategoriAdi"]."</a><br>";
                  
                 } 
               ?>
                    </li>
                </ul>
              <li class="page-header"><h3>Günün Kitabı</h3></li>
              <?php
               $liste=$vt->RasgeleGetir("urun");
               while($kayit = mysql_fetch_array($liste)){
                   $resim = $kayit["Resim"];
                   $adi = $kayit["Adi"]; 
                   $yazar = $kayit["Yazar"]; 
                   $yayinevi = $kayit["Yayinevi"];
                   echo "<img src=".$resim." style='width:70%;height:70%' /><br/>
                   <blockquote><p><strong>$adi</strong></p>
                  <br /><p>$yazar</p>
                  <br /><p>$yayinevi</p>
                   </blockquote>";
               }
               ?>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span8">
          
            <div id="myCarousel" class="carousel slide" style="margin-top: 50px;">
                <div class="carousel-inner">
                    <div class="active item" style="width:120%;height:120%;">
                        <img src="img/498.jpg"/>
                        <div class="carousel-caption">
                         <h4>Kitap Cenneti</h4>
                         <p>HTML5,CSS3 ve jQuery ile WEB standartlarını yakalayın.</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="img/512.jpg"/>
                        <div class="carousel-caption">
                         <h4>Kitap Cenneti</h4>
                         <p>Mobil Programlama ile Mobil Dünyanın kapılarını aralayın.</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="img/521.jpg"/>
                        <div class="carousel-caption">
                         <h4>Kitap Cenneti</h4>
                         <p>Oracle,MS SQL Server ile veritabanı programlayın.SQL diline hakim olun.</p>
                        </div>
                    </div>
                </div>
                <!-- Carousel nav -->
                 <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                 <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
            </div>    
          <div class="row-fluid">
              
              <?php
                include_once 'main.php';   //ekranın orta kısmı sayfamıza çağırılır
              ?>
          </div><!--/row-->
        </div><!--/span-->

      </div><!--/row-->
      
          
      
      <hr>

      <footer>
        <p>&copy; EnzGLk 2012 <a href="https://twitter.com/#!/enzglk"><img src="img/twitter.png" alt=""/></a>
            <a href="http://www.facebook.com/enzglk"><img src="img/facebook.png" alt=""/></a></p>
            <ul class="breadcrumb">
              <li>
                <a href="index.php?pid=1">Anasayfa</a> <span class="divider">/</span>
              </li>
              <li>
                <a href="index.php?kid=1">Web</a> <span class="divider">/</span>
             </li>
                <li>
                <a href="index.php?kid=2">Mobil</a> <span class="divider">/</span>
             </li>
                <li>
                <a href="index.php?kid=3">Java</a> <span class="divider">/</span>
             </li><li>
                <a href="index.php?kid=4">C++</a> <span class="divider">/</span>
             </li>
                <li>
                <a href="index.php?kid=5">Database</a> <span class="divider">/</span>
             </li><li>
                <a href="index.php?kid=6">Network</a> <span class="divider"></span>
             </li>
            </ul>
      </footer>

    </div><!--/.fluid-container-->

    
    </body>
</html>
