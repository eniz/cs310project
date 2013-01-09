
              <h2>En Son Eklenenler</h2>
              <div class="span12">
               <table class="table">
                  <thead>
                   <tr>
                     <th>Resim</th>
                     <th>Ad </th>
                     <th>Yayınevi</th>
                     <th>Yazar</th>
                     <th>Fiyat</th>
                   </tr>
                  </thead>                 
                <?php
                  $liste = $vt->EnsonGetir("urun");
                  while($kayit = mysql_fetch_array($liste)){
                      $resim = $kayit['Resim'];
                      $adi = $kayit["Adi"];
                      echo "<tr>
                           <td><img src=".$resim."></td>
                           <td>".$kayit["Adi"]."</td>    
                           <td>".$kayit["Yayinevi"]."</td>
                           <td>".$kayit["Yazar"]."</td>
                           <td>".$kayit["Fiyat"]."$
                               
                             <div id='myModal' class='modal hide fade' style='display:block;'>
                                <div class='modal-header'>
                                  <button class='close' data-dismiss='modal'>X</button>
                                  <h3>Online E-Kitap indir</h3>
                                </div>
                                <div class='modal-body'>
                                  <span>Link uçmadan indirin.Teşekkürler</span>
                                  
                                  <a class='btn btn-large btn-success'  href='".$kayit["Download"]."'> <i class='icon-download-alt icon-white'></i>İndir</a>
                                </div>
                                <div class='modal-footer'>
                                <a class='btn' data-dismiss='modal' href='#'>Kapat</a>
                                </div>
                             </div>
                             
                            <a class='btn btn-success' data-toggle='modal'  href='#myModal'> <i class='icon-download-alt icon-white'></i>İndir</a>
                           </td>";
                       
                  }
                ?>
                </table>
              </div>
                               
              