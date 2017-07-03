<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
</head>
<div id="boxcomentarios">

<?php 
include ("conexao.php");
include ("sessao.php");


$conexao = mysqli_connect("localhost", "root", "", "dbmaster");
$sql="SELECT * FROM comentarios ORDER BY data, hora ASC";
if ($resultado = mysqli_query($conexao, $sql))
{
while ($linha=mysqli_fetch_assoc($resultado))
{  
$data_mysql = $linha['data'];
$timestamp = strtotime($data_mysql); // Gera o timestamp de $data_mysql
date('d/m/Y', $timestamp);
 ?>

<table>
	<tr>
		<strong><th><img src="/imagens/outros/avatar.png" height="35" width="42"/><?php echo " ";?><?php echo $linha['nome'];?></th></strong>
        
	</tr>
    
<tr>
	<td><?php echo $linha['comentario'];?></td>
</tr>
<tr>
	<td><?php echo $linha['hora']; echo " | "; echo date('d/m/Y', $timestamp);?></td>
</tr>

</table>
<?php
}}

?>

</div><br/>

</div><br/>
<style type="text/css">
#boxcomentarios{
	font-family:"Segoe UI";
	font-size:10px;
width:500px;
height:auto;
border:1px;
border-radius:5px;
border-color:#999;
border-style:solid;
color:#333;
margin:0px;
text-align:left;
}
</style>
</body>
</html>