<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema de comentários Leo System Development</title>
<!--Javascript-->
<script type="text/javascript" src='/js/jsglobal.js' charset='utf-8'></script>
<script type="text/javascript" src="/js/ajax-jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="/js/ajax-jquery.min.1.4.3.js"></script>
<script type="text/javascript" src="/js/ajax-jquery.min.1.8.3.js"></script>
<script type="text/javascript" src="/js/tooltip.js"></script>
<script type="text/javascript" src="/js/tooltip-min.js"></script>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/js/progress.js" type="text/javascript" charset="utf-8"></script>


<script language="javascript">
$(document).ready(function(){
    var y_fixo = $("#load").offset().top;
    $(window).scroll(function () {
        $("#load").animate({
            top: y_fixo+$(document).scrollTop()+"px"
            },{duration:500,queue:false}
        );
    });
});
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
                <script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#ajax_form').submit(function(){
			var dados = jQuery( this ).serialize();
 
			jQuery.ajax({
				type: "POST",
				url: "recebecomentario.php",
				data: dados,
				success: function( data )
				{
					window.location.reload();
					//alert( data );
					$("#nome").val('');                   
					$("#comentario").val(''); 
					}
			});
			
			return false;
		});
	});
	</script>
</head>

<body>
<?php include("sessao.php"); ?>


        


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script type="text/javascript">

$(function() 
{
$('.more').live("click",function() 
{
var ID = $(this).attr("id");
if(ID)
{
$("#more"+ID).html('<img src="/imagens/outros/fb-loading.gif" />');

$.ajax({
type: "POST",
url: "ajax_more.php",
data: "lastmsg="+ ID, 
cache: false,
success: function(html){
//$("ol#updates").append(html);
$(html).appendTo('ol#updates').hide().fadeIn('slow');
$("#more"+ID).remove(); // removing old more button
}
});
}
else
{
$(".morebox").html('Não há mais comentários!');// no results

}

return false;
});
});
</script>
<style type="text/css">
body{
	background-image:url(Imagens/background/bg_tile.jpg);
		font-family:"Segoe UI";
	font-size:10px;
	color:#000;
width:700px;
height:auto;
border:0px;
border-radius:5px;
border-color:#999;
border-style:solid;
color:#333;
margin:0px;
text-align:left;

}

*{ margin:0px; padding:0px }
ol.timeline
{ 
list-style:none
}
ol.timeline li
{ 
position:relative;
padding:9px; 
}
.morebox
{
font-weight:bold;
color:#333333;
text-align:center;
border:0px;
padding:8px;
margin-top:8px;
margin-bottom:8px;
-moz-border-radius: 6px;
-webkit-border-radius: 6px;
}
.morebox a{ color:#333333; text-decoration:none}
.morebox a:hover{ color:#333333; text-decoration:none}


#comment{
	
}

#comment tr th img{

box-shadow:0px 1px 50px rbga(0,0,0,0.9);
border:3px solid #fff;
position:absolute;
margin-left:-70px;

}

#comment tr #boxdata{

box-shadow:0px 1px 50px rbga(0,0,0,0.9);
border-radius:70px;	
position:absolute;
margin-left:-92px;
margin-top:25px;
color:#333;
font-weight:bold;
top:5px;
}


.arrow_box {
	position: relative;
	/*background: #ffffff;
	border: 1px solid #56646e;*/
	border-radius:20px;
	margin-left:85px;
		background: rgb(225,225,225);
background: -moz-linear-gradient(-45deg,  rgba(242,242,242,1) 1%, rgba(219,219,219,1) 50%, rgba(209,209,209,1) 51%, rgba(254,254,254,1) 100%);
background: -webkit-gradient(linear, left top, right bottom, color-stop(1%,rgba(242,242,242,1)), color-stop(50%,rgba(219,219,219,1)), color-stop(51%,rgba(209,209,209,1)), color-stop(100%,rgba(254,254,254,1)));
background: -webkit-linear-gradient(-45deg,  rgba(242,242,242,1) 1%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%);
background: -o-linear-gradient(-45deg,  rgba(242,242,242,1) 1%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%);
background: -ms-linear-gradient(-45deg,  rgba(242,242,242,1) 1%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%);
background: linear-gradient(188deg,  rgba(242,242,242,1) 1%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f2f2', endColorstr='#fefefe',GradientType=1 );

box-shadow: 5px 5px 15px rgba(255,255,255,0.1);
}


#arrow_comment{
	margin-left:-30px;
	margin-top:10px;
}

#comment tr td .comments{
	margin-right:50px;
	padding-right:50px;
}
#boxdata{
margin-top:50px;
padding-top:10px;	
}

.jive-thread-post-body-container{
background: #edf3fe url(Imagens/outros/thread-post-bg.jpg) 0 0 repeat-x;

border-color: #c5d9e8;
	border-radius:20px;
	margin-left:85px;
}
</style>





<!-- /-*/-*/*-/*-/*-/*-/*-/*-/*-/*-/-*/*-/*-/*-/*-/*-/*-/*-/*-/*-/*-/*-/*-/*-/*-/*-/*-/-*/*-/*-/*-/*-/*-/*-/*--->






<div id="box">
<small> Faça um comentário </small><br/>
<form method="POST" action="" id="ajax_form">
<input type="text" id="nome" name="nome" size="79" placeholder="<?php echo $_SESSION['nome']; echo " "; echo $_SESSION['nome'];?>" value="<?php echo $_SESSION['nome']; echo " "; echo $_SESSION['nome'];?>" readonly/><br/>
<textarea id="comentario" name="comentario" rows="2" cols="59" placeholder="Comentário..."></textarea><br/><input type="submit" value="Enviar comentário" />
</form>
</div>

    
<ol class="timeline" id="updates">

<?php
$conexao = mysql_connect("localhost", "root", "", "dbmaster") or die ("Erro ao conectar ao banco de dados");
$db=mysql_select_db("dbmaster");
$sql=mysql_query("select * from comentarios ORDER BY id DESC LIMIT 3");
while($row=mysql_fetch_array($sql))
{
$msg_id=$row['id'];
$comentario=$row['comentario'];
$nome=$row['nome'];
$hora=$row['hora'];
$data_mysql = $row['data'];
$timestamp = strtotime($data_mysql); // Gera o timestamp de $data_mysql
date('d/m/Y', $timestamp);
?>
<li>
<div class="jive-thread-post-body-container">
<table id="comment">

	<tr>
		<strong><th><div id="boximg"><img src="/imagens/outros/avatar.png" height="35" width="40" /></div><?php echo " ";?></th></strong>
      </tr>
      
      <tr>
	<td><div id="boxdata"><small><br/><?php echo $hora; echo " | "; echo date('d/m/Y', $timestamp);?></small></div></td>
</tr>          
      <tr>
	<td><div id="arrow_comment"><img src="Imagens/outros/arrow_comment.gif"></div><strong><div class="comments"><?php echo $nome;?></strong><br/><?php echo $comentario;?><br/><br/></div></td>
</tr>



</table>
</li>
<?php } ?>
</ol>
<div class="ateaqui"></div>

<div id="more<?php echo $msg_id; ?>" class="morebox">
<strong><a href="#" class="more" id="<?php echo $msg_id; ?>" onclick="$('html,body').animate({scrollTop: $('.ateaqui').offset().top}, 2000);">Carregar mais</a></strong>
</div>

</div>


</body>
</html>