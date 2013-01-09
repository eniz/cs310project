<?php
session_start();  
include_once '../inc/db.php'; 
$vt=new db();      
$vt->adminKontrol();  
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../css/bootstrap.css" rel="stylesheet"/>
        <link href="../css/bootstrap-responsive.css" rel="stylesheet"/>
        <title>Kitap Cenneti Admin Paneli</title>
    </head>
    <body>
        <div class="page-header">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div id="logo" class="span3">
                        <h2>Merhaba Admin</h2>
                    </div>
                    <div id="menu" class="span9">
                            <ul  class="nav nav-pills">
                               <li class="active" title="Anasayfa"><a href="../index.php"><i class="icon-home"></i>Anasayfa</a></li>
                               <li title="Kullanıcı İşlemleri"><a href="index.php?pid=100"><i class="icon-user"></i>Kullanıcı İşlemleri</a></li>
                               <li title="Kitap İşlemleri"><a href="index.php?pid=101"><i class="icon-book"></i>Kitap İşlemleri</a></li> 
                            </ul>
                    </div>
                  </div>
             </div>     
         </div>
        <div class="row-fluid">
          <?php
            include_once 'main.php';  
          ?>
        </div>
    </body>
</html>
