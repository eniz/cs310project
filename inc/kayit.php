<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> Kayıt Sayfası</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css" rel="stylesheet">
    <link href="http://twitter.github.com/bootstrap/assets/css/bootstrap-responsive.css" rel="stylesheet">


  </head>
  <body>	  
	
  <div class="container">
	
  <div class="row">

<div class="span8">&nbsp;
</div>	
  
<div class="span8">
</div>
<div class="span8">
<h2>Kayıt Sayfası</h2>

	<form class="form-horizontal" id="registerHere" method='post' action='index.php?pid=44'>
	  <fieldset>
              <legend>Aramıza katılın</legend>
	    <div class="control-group">
	      <label class="control-label" for="input01">Ad</label>
	      <div class="controls">
	        <input type="text" class="input-xlarge" id="user_name" name="user_name" rel="popover" data-content="Adınızı ve Soyadınızı Giriniz" data-original-title="Adınız"/>
	        
	      </div>
	</div>
	
	 <div class="control-group">
		<label class="control-label" for="input01">Email</label>
	      <div class="controls">
	        <input type="text" class="input-xlarge" id="user_email" name="user_email" rel="popover" data-content="Email Adresinizi Giriniz" data-original-title="Email"/>
	       
	      </div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="input01">Parola</label>
	      <div class="controls">
	        <input type="password" class="input-xlarge" id="pwd" name="pwd" rel="popover" data-content="6 karakterden az girmeyiniz" data-original-title="Parola" />
	       
	      </div>
	</div>
	<div class="control-group">
		<label class="control-label" for="input01">Parolanızı Onaylayın</label>
	      <div class="controls">
	        <input type="password" class="input-xlarge" id="cpwd" name="cpwd" rel="popover" data-content="Parolanızı tekrar giriniz" data-original-title="Parola Tekrarı" />
	       
	      </div>
	</div>
	
	

	
	
	<div class="control-group">
		<label class="control-label" for="input01"></label>
	      <div class="controls">
	       <button type="submit" class="btn btn-success" rel="tooltip" title="first tooltip">Hesap Oluştur</button>
	       
	      </div>
	
	</div>
	
	
	   <hr/>
	  </fieldset>
	</form>
	</div>
	
		</div>
        
        
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
	 <div class="container">
</div>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://twitter.github.com/bootstrap/assets/js/jquery.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-transition.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-alert.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-modal.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-dropdown.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-scrollspy.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-tab.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-tooltip.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-popover.js"></script>
	<script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>
	  <script type="text/javascript">
	  $(document).ready(function(){
			$('input').hover(function()
			{
			$(this).popover('show')
		});
			$("#registerHere").validate({
				rules:{
					user_name:"required",
					user_email:{
							required:true,
							email: true
						},
					pwd:{
						required:true,
						minlength: 6
					},
					cpwd:{
						required:true,
						equalTo: "#pwd"
					},
					gender:"required"
				},
				messages:{
					user_name:"Lütfen adınızı giriniz",
					user_email:{
						required:"Lütfen email adresinizi giriniz",
						email:"Email adresi girilmedi"
					},
					pwd:{
						required:"Lütfen parolanıızı giriniz",
						minlength:"Parola 6 karakterden oluşmalı"
					},
					cpwd:{
						required:"Lütfen Parolanızı Onaylayınız",
						equalTo:"Parolanız eşleşmiyor.Dikkat edin."
					},
					gender:"Cinsiyeti seçiniz"
				},
				errorClass: "help-inline",
				errorElement: "span",
				highlight:function(element, errorClass, validClass) {
					$(element).parents('.control-group').addClass('error');
				},
				unhighlight: function(element, errorClass, validClass) {
					$(element).parents('.control-group').removeClass('error');
					$(element).parents('.control-group').addClass('success');
				}
			});
		});
	  </script>
  </body>
</html>
