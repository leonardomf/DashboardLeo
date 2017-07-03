  <link href="/checkbox-iphone/css/base.css" rel="stylesheet">
  <link href="/checkbox-iphone/css/style.css" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="/css/css-index-dashboard.css">

  
  <script src="/js/jquery-1.4.1.min.js" type="text/javascript"></script>
 <script type="text/javascript">
 $(document).ready(function(){ 
 

 $('#btios').click(function () {
	 if ($(this).is(':checked')) {
		$('#status').html("Entrada");
				$('#divSA').css("display", "none");
$('#divAtraso').css("display", "block");

	 }
	 else {
	 		$('#status').html("Saida");
$('#divAtraso').css("display", "none");

		$('#divSA').css("display", "block");

	 }
 }); 

 $('#JustificativaAtraso').click(function () {
  document.getElementById("btiosAt").checked = true;

 }); 
 $('#JustificativaSA').click(function () {
  document.getElementById("btiosSA").checked = true;

 }); 

 

  
});


</script>
<center>
<br/><br/><br/><br/>	
<form action="recebponto.php" method="post" >

 <div id="checkbox" >
    <div class="container">
<div id="status">Entrada</div>
      <div class="settings" >

        <div class="row" >
          <div class="switch" >
            <input id="btios" class="cmn-toggle cmn-toggle-round" checked="checked" type="checkbox" name="tipo" >
            <label for="btios" ></label>
          </div>
        </div><!-- /row -->
      </div>
    </div>
  </div><!-- #checkbox -->
  <br/><br/>

<label style="position:absolute;border-right:1px solid #ccc;height:40px;width:40px;padding-top:5px;"><img src="Imagens/icons/user65.png" height="30" width="30"></label>
<input readonly type="text" name="login" id="login" value="leonardom@ogmaster.local" style="padding-left:50px;" ></input><br /><br />

<label style="position:absolute; border-right:1px solid #ccc;height:40px;width:40px;padding-top:5px;"><img src="Imagens/icons/time-2.png" height="
30" width="30"></label>

<input readonly type="text" name="data" value="<?php echo date('d/m/Y H:i:s');?>" style="padding-left:50px;" /></input><br /><br />


<br/>
<div id="divAtraso" >
 <div id="checkbox" >
    <div class="container">
<div id="statusat">Atraso</div>
      <div class="settings" >

        <div class="row" >
          <div class="switch" >
            <input id="btiosAt" class="cmn-toggle cmn-toggle-round" type="checkbox" name="atraso" >
            <label for="btiosAt" ></label>
          </div>
        </div><!-- /row -->
      </div>
    </div>
  </div><!-- #checkbox -->

<textarea name="JustificativaAtraso" id="JustificativaAtraso"></textarea>
</div>

<div id="divSA" style="display:none;">
 <div id="checkbox" >
    <div class="container">
<div id="statusSA">Saida Antecipada</div>
      <div class="settings" >

        <div class="row" >
          <div class="switch" >
            <input id="btiosSA" class="cmn-toggle cmn-toggle-round" type="checkbox" name="JustificativaSA" >
            <label for="btiosSA" ></label>
          </div>
        </div><!-- /row -->
      </div>
    </div>
  </div><!-- #checkbox -->

<textarea name="JustificativaSA" id="JustificativaSA"></textarea>
</div>

<br/><br/>
  
  <button type='submit' class='button rect' id="confirma" >
<span>
<span class='label'> Confirmar </span>
</span>
</button>
</form>
</center>


<style type="text/css">
body{
font-size:12px;
	
}
  form{
	font-weight:bold;  
  }
  
    th {
      text-align: right;
      padding: 4px;
      padding-right: 15px;
      vertical-align: top; }
    .css_sized_container .iPhoneCheckContainer {
      width: 250px; }
	  
	  input[type=text], textarea{
		padding:12px;  
		border-radius:5px;
		border:1px solid #ccc;
		width:300px;
	  }
	  
	.notification{
	color:#fff;float:left;position:absolute;border-radius:5px;z-index:999999;margin-top:20px;margin-left:10px;
	max-width:300px;min-width:250px;padding:3px;text-shadow: 0px -1px 0px rgba(0,0,0,0.4);text-align:center;
background: -webkit-linear-gradient(rgba(247,67,67,0.6),rgba(227,49,49,0.9));
background: -moz-linear-gradient(rgba(247,67,67,0.6),rgba(227,49,49,0.9));
background: linear-gradient(rgba(247,67,67,0.6),rgba(227,49,49,0.9));
border:1px solid rgba(205, 36, 44, 0.6);
-moz-box-shadow: 0 2px 4px #ccc;
	-webkit-box-shadow: 0 2px 4px #ccc;
	box-shadow: 0 2px 4px #ccc;	
	}
  </style>
