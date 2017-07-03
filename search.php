<?php include("back-url.php");include("topo.php");?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="/css/css-index-dashboard.css">
<link type="text/css" rel="stylesheet" href="/css/animate.css">


<script type="text/javascript" src="/js/ajax-jquery-1.9.1.min.js"></script>
<script src="/js/jquery-1.4.1.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
$("#containersearch").animate().fadeIn(1000);
$("#logoo").animate().fadeIn(1000);

});


$('#search').click(function(){
	$('#search').css("width","800px");
});











$(function(){
$(".search").keyup(function() 
{ 
//$(this).val($(this).val().toUpperCase());
var searchid = $(this).val();
var dataString = 'search='+ searchid;
if(searchid!='')
{
    $.ajax({
    type: "POST",
    url: "search-ajax-kace.php",
    data: dataString,
    cache: false,
    success: function(html)
    {
    $("#result").html(html).show();
    }
    });
}return false;    
});
/*
jQuery("#result").live("click",function(e){ 
    var $clicked = $(e.target);
    var $name = $clicked.find('.name').html();
    var decoded = $("<div/>").html($name).text();
    $('#searchid').val(decoded);
});
jQuery(document).live("click", function(e) { 
    var $clicked = $(e.target);
    if (! $clicked.hasClass("search")){
    jQuery("#result").fadeOut(); 
    }
});*/
$('#searchid').click(function(){
    jQuery("#result").fadeIn();
});
});







</script>
</head>
<body>

<br />
<br /><br /><br />




<center><span><a href="/search" style="display:none;outline:none;border:none;" id="logoo"><img src="/Imagens/Icons/icloud_w200.png" class='animated flipinx'></a></span>
<p></p>
<div id="containersearch" style="margin:0px auto;width:905px;height:40px;display:none;">
<input type="text" class="search" id="searchid" placeholder="Pesquise algum computador..." style="box-shadow:0px 7px 20px rgba(255,255,255,0.1);width:900px;height:40px;font-size:12px;outline:none; background:rgba(255,255,255,0.5); color:#444;font-weight:100;font-size:12px;padding-left:10px;" />
<button class="btnsearch" id="btnsearch"  type="submit">
<span id="writesearch" style="color:#fff;position:absolute;margin:13px 25px;font-weight:bold;font-size:11px;">SEARCH</span>
<img src="../Imagens/search/icon_search.png" />
</button>
</div>


<div id="result"></div>

</center>

<style type="text/css">

body{margin:0px;padding:0px;
/*background:url(../Imagens/background/bg.jpg);*/
background-color:#fafafa;

/*
background:url(../Imagens/background/1680x1050.png) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;*/

font-family: "Open Sans";
font-size:12px;font-weight:100; color:#222;


}


@font-face {
font-family: "Superstar M45";
src: url("/fonts/Superstar M54/Superstar M54.ttf");
}
@font-face {
font-family: "Myriadpro";
src: url("/fonts/Myriadpro/MMYRIADPRO-LIGHT.OTF");
}

@font-face {
font-family: "Open Sans";
src: url("/fonts/Open Sans/OpenSans-Light.ttf");
}	
@font-face {
font-family: "iconfont";
src: url("/fonts/iconfont.woff");
}
::-webkit-input-placeholder{
color:#777;	
}
::-moz-placeholder{
color:#777;	
}
.search:focus{
	border:1px solid #FFF;
	outline:none;
	transition: border .2s,color .2s;

}


[data-icon]:before {
font-family: "iconfont" !important;
font-size:14px;
color:#fff;
content: attr(data-icon);
font-style: normal !important;
font-weight: normal !important;
font-variant: normal !important;
text-transform: none !important;
speak: none;
line-height: 0;
margin-top:5px;
outline:none;
border:none;text-align: center;
-webkit-font-smoothing: antialiased;
-moz-osx-font-smoothing: grayscale;
}
[data-icon] {
font-family: "iconfont" !important;
font-size:14px;
color:#fff;
content: attr(data-icon);
font-style: normal !important;
font-weight: normal !important;
font-variant: normal !important;
text-transform: none !important;
speak: none;
line-height: 0;
top:5px;
outline:none;
border:none;text-align: center;
-webkit-font-smoothing: antialiased;
-moz-osx-font-smoothing: grayscale;
}
.btnsearch{
margin-left:-100px;
outline:none;
border:none;
height:30px;
width:40px;
margin-top:-1px;
position:absolute;
background:transparent;
cursor:pointer;	
-moz-border-radius-topleft: 3px;
-webkit-border-top-right-radius: 3px;
border-top-right-radius: 3px;
-moz-border-radius-bottomleft: 3px;
-webkit-border-bottom-right-radius: 3px;
border-bottom-right-radius: 3px;

}
.btnsearch:hover{
	background:transparent;
color:#000;
}
#searchid{

	
	border:1px solid rgba(0,0,0,0.1);

}
#searchid:focus{
	border:1px solid rgba(0,90,255,0.8);height:15px;transition: border .2s,color .2s;
}

#searchid:hover{
	border:1px solid rgba(0,90,255,0.8);
	outline:none;
	transition: border .7s,color .3s;
	
}


</style>

</body>
</html>