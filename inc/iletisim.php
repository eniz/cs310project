  
<h2>İletişim Formu</h2>
<hr>
<form name="iletisim" method="post" action="index.php?pid=45">
    <fieldset>
<table width="450px">
<tr>
 <td valign="top">
  <label for="first_name">Adınız *</label>
 </td>
 <td valign="top">
  <input  type="text" name="txtAd" maxlength="50" size="30">
 </td>
</tr>
<tr>
 <td valign="top"">
  <label for="last_name">Soyadınız *</label>
 </td>
 <td valign="top">
  <input  type="text" name="txtSoyad" maxlength="50" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="email">Email Adresiniz *</label>
 </td>
 <td valign="top">
  <input  type="text" name="txtEmail" maxlength="80" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="telephone">Telefon Numaranız</label>
 </td>
 <td valign="top">
  <input  type="text" name="telefon" maxlength="30" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="comments">Mesajınız *</label>
 </td>
 <td valign="top">
  <textarea  name="mesajlar" maxlength="1000" cols="25" rows="6"></textarea>
 </td>
</tr>
<tr>
 <td colspan="2" style="text-align:center">
     <button type="submit" class="btn btn-success" rel="tooltip" title="first tooltip">Mesaj Gönder</button>
 </td>
</tr>
</table>
    </fieldset>
</form>
