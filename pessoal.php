<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/csspessoal.css" type="text/css" />
<link rel="stylesheet" href="css/redesocial-pessoal.css" type="text/css" />

<!-- Box deslizante/flutuante-->
<link rel="stylesheet" href="assets/css/styles.css" />

    

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="js/ajax-jquery-1.9.1.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<title>Leonardo Freitas Desenvolvimento Web</title>


<script type="text/javascript">
$(document).ready(function(){
 
   $('div.bgParallax').each(function(){
    	var $obj = $(this);
   });	
});
var bgpos = '50% '+ yPos + 'px';
$obj.css('background-position', bgpos );

$('div.bgParallax').each(function(){
	var $obj = $(this);
 
	$(window).scroll(function() {
		var yPos = -($(window).scrollTop() / $obj.data('speed')); 
 
		var bgpos = '50% '+ yPos + 'px';
 
		$obj.css('background-position', bgpos );
 
	}); 
});

</script>
<script type="text/javascript">
$(function () {
  $('.botaonav').each(function () {
    // options
    var distance = 20;
    var time = 1050;
    var hideDelay = 50;

    var hideDelayTimer = null;

    // tracker
    var beingShown = false;
    var shown = false;
    
    var trigger = $('.trigger', this);
    var popup = $('.popup', this).css('opacity', 0);

    // set the mouseover and mouseout on both element
    $([trigger.get(0), popup.get(0)]).mouseover(function () {
      // stops the hide event if we move from the trigger to the popup element
      if (hideDelayTimer) clearTimeout(hideDelayTimer);

      // don't trigger the animation again if we're being shown, or already visible
      if (beingShown || shown) {
        return;
      } else {
        beingShown = true;
 
        // reset position of popup box
        popup.css({
          top: 55,
          left: -80,
          display: 'block' // brings the popup back in to view
        })

        // (we're using chaining on the popup) now animate it's opacity and position
        .animate({
          top: '-=' + distance + 'px',
          opacity: 1
        }, time, 'swing', function() {
          // once the animation is complete, set the tracker variables
          beingShown = false;
          shown = true;
        });
      }
    }).mouseout(function () {
      // reset the timer if we get fired again - avoids double animations
      if (hideDelayTimer) clearTimeout(hideDelayTimer);
      
      // store the timer so that it can be cleared in the mouseover if required
      hideDelayTimer = setTimeout(function () {
        hideDelayTimer = null;
        popup.animate({
          top: '-=' + distance + 'px',
          opacity: 0
        }, time, 'swing', function () {
          // once the animate is complete, set the tracker variables
          shown = false;
          // hide the popup entirely after the effect (opacity alone doesn't do the job)
          popup.css('display', 'none');
        });
      }, hideDelay);
    });
  });
});
</script>
<script type="text/javascript">
 $(document).ready(function(){ 
 
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
				$('#flutuante').fadeIn();
            } else {
                $('.scrollup').fadeOut();
				$('#flutuante').fadeOut();
            }
        }); 
 
        $('.scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });
 
    });
</script>

<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#pessoalcontato').submit(function(){
			var dados = jQuery( this ).serialize();
 
			jQuery.ajax({
				type: "POST",
				url: "pessoalcontato.php",
				data: dados,
				success: function( data )
				{
					if ($("#email")==""){
						$("#result").html('O campo e-mail nao pode ficar vazio!');
					}
					else{
					$("#result").html('Enviado com sucesso!');
					setTimeout('$("#result").fadeOut();', 1500).toggle();
					$("#nome").val('');
					$("#email").val('');
					$("#telefone").val('');
					$("#website").val('');
					$("#mensagem").val('');
					
					$("nome").empty();
					$("email").empty();
					$("telefone").empty();
					$("website").empty();
					$("mensagem").empty();
					}
					}
			});
			
			return false;
		});
	});
	</script>
    

</head>

<body>


<a href="#" class="scrollup">Scroll</a>
<div id="flutuante">
<div class="botaonav">
<a href="#" id="hhh" onclick="$('html,body').animate({scrollTop: $('#home').offset().top}, 1000);"><img src="/Imagens/button/slider_button.png" width="13px" height="15px" class="trigger"/></a><br/>
<div class="popup">
<small>Home</small>
</div>
</div>
<div class="botaonav">
<a href="#" id="hhh" onclick="$('html,body').animate({scrollTop: $('#sobre').offset().top}, 1000);"><img src="/Imagens/button/slider_button.png" width="13px" height="15px" class="trigger"/></a><br/>
<div class="popup">
<small>Sobre</small>
</div>
</div>
<div class="botaonav">
<a href="#" id="hhh" onclick="$('html,body').animate({scrollTop: $('#portfolio').offset().top}, 1000);"><img src="/Imagens/button/slider_button.png" width="13px" height="15px" class="trigger"/></a><br/>
<div class="popup">
<small>Portfolio</small>
</div>
</div>
<div class="botaonav">
<a href="#" id="hhh" onclick="$('html,body').animate({scrollTop: $('#projetos').offset().top}, 1000);"><img src="/Imagens/button/slider_button.png" width="13px" height="15px" class="trigger"/></a><br/>
<div class="popup">
<small>Projetos</small>
</div>
</div>
<div class="botaonav">
<a href="#" id="hhh" onclick="$('html,body').animate({scrollTop: $('#contato').offset().top}, 1000);"><img src="/Imagens/button/slider_button.png" width="13px" height="15px" class="trigger"/></a><br/>
<div class="popup">
<small>Contato</small>
</div>
</div>
</div>



<div id="home" class="bgParallax" data-speed="15">
<div id="etiquetaorcamentogratis"><img src="Imagens/outros/etiquetaOG.png"></div>
<div class="extradiv"><img src="/Imagens/background/radial.png" alt="" /></div>
<div id="frog"><img src="Imagens/outros/frog1.png" /></div>
<div id="menu"><ul><li class="home"><a href="#" onclick="$('html,body').animate({scrollTop: $('#home').offset().top}, 1000);"></a></li><li class="sobre"><a href="#" onclick="$('html,body').animate({scrollTop: $('#sobre').offset().top}, 1000);"></a></li><li class="portfolio"><a href="#" onclick="$('html,body').animate({scrollTop: $('#portfolio').offset().top}, 1000);"></a></li><li class="projetos"><a href="#" onclick="$('html,body').animate({scrollTop: $('#projetos').offset().top}, 1000);"></a></li><li class="contato"><a href="#" onclick="$('html,body').animate({scrollTop: $('#contato').offset().top}, 1000);"></a></li></ul></div>

<div id="dw"><img src="Imagens/outros/DW.png"></div>
<div id="sat_gar"><img src="Imagens/componentes/sat_gar.png"></div>
<div id="sitevalor"><a href="#" onclick="$('html,body').animate({scrollTop: $('#contato').offset().top}, 1000);"><img src="Imagens/outros/sitesvalor.png"></a></div>
</div><!--home-->

<!--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$-->

<div id="sobre" class="bgParallax">
<h1 class="inset-text">Sobre</h1>
<div id="containersobre">
<img src="Imagens/outros/leonardo-freitas.jpg" />
<br/>
<h3>Sou analista de sistemas, estou no 7º período de Ciência da Computação estudando atualmente na Unicarioca. Trabalho numa empresa muita conhecida em comunicação. Sou apaixonado por Design, Desenvolvimento Web, PHP, Mysql, Html5, Css3, Jquery, Ajax, Photoshop, Dreamweaver, etc. 
A maioria do meu conhecimento, a maioria avançado, foi em busca aluciada pela internet  
</h3>

</div>

</div><!--sobre-->

<div id="portfolio" class="bgParallax">

<h1 class="inset-text">Portfólio</h1>

<nav id="filter"></nav>

        <section id="container">
        	<ul id="stage">
            	<li data-tags="Logotipos"><img src="assets/img/shots/1.jpg" alt="Illustration" /></li>
                                <li data-tags="Ferramentas"><img src="assets/img/shots/ps.png" alt="Illustration" /></li>

                <li data-tags="Logotipos, Websites"><img src="assets/img/shots/1.jpg" alt="Illustration" /></li>
                                <li data-tags="Ferramentas"><img src="assets/img/shots/ai.png" alt="Illustration" /></li>

                <li data-tags="Websites"><img src="assets/img/shots/1.jpg" alt="Illustration" /></li>
                                <li data-tags="Ferramentas"><img src="assets/img/shots/flash.png" alt="Illustration" /></li>


                <li data-tags="Logotipos"><img src="assets/img/shots/1.jpg" alt="Illustration" /></li>
                <li data-tags="Ferramentas"><img src="assets/img/shots/dw.png" alt="Illustration" /></li>
                <li data-tags="Websites,Logotipos"><img src="assets/img/shots/1.jpg" alt="Illustration" /></li>
                <li data-tags="Ferramentas"><img src="assets/img/shots/html5.png" alt="Illustration" /></li>
                <li data-tags="Ferramentas"><img src="assets/img/shots/css3.png" alt="Illustration" /></li>
                                <li data-tags="Blogs"><img src="assets/img/shots/blogandressachaban.jpg" title="Blog Andressa Chaban" alt="Illustration" /></li>
                <li data-tags="Ferramentas"><img src="assets/img/shots/ajax.png" alt="Illustration" /></li>
                <li data-tags="Ferramentas"><img src="assets/img/shots/jquery.png" alt="Illustration" /></li>
                                <li data-tags="Parcerias"><img src="assets/img/shots/blogandressachaban.jpg" title="Blog Andressa Chaban" alt="Illustration" /></li>
               
                <li data-tags="Ferramentas"><img src="assets/img/shots/js.png" alt="Illustration" /></li>
                 <li data-tags="Ferramentas"><img src="assets/img/shots/phpmysql.png" alt="Illustration" /></li>
                
            </ul>
        </section>
        
</div><!--portfolio-->

<!--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$-->
<div id="projetos" class="bgParallax">

<div id="sat_gar"><img src="Imagens/componentes/sat_gar.png"></div>
<h1 class="inset-text">Projetos</h1>
<div id="containerprojetos">

<div id="boxprojetos">Projeto Classificados e noticiário de carros nível nacional</div>
<div id="boxprojetos">Projeto Blog 2.0 Andressa Chaban</div>
<div id="boxprojetos">Projeto Sistema de Busca SEO</div>
<div id="boxprojetos">Projeto Classificados e noticiário de carros nível nacional</div>
<div id="boxprojetos">Projeto Blog 2.0 Andressa Chaban</div>
<div id="boxprojetos">Projeto Sistema de Busca SEO</div>
</div><!--containerprojeto-->
</div><!--projetos-->

<!--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$-->
<div id="contato" class="bgParallax">

<h1 class="inset-text">Contato</h1>
<h4 class="inset-text">Através do formulário abaixo você poderá solicitar um orçamento grátis, informações, etc.<br/> Celular: 21 95790763<br/>
E-mail pessoal:leonardo.mf@live.com </h4>
<div id="formcontato">
<form action="" method="POST" id="pessoalcontato" name="pessoalcontato" >
<input type="text" id="nome" name="nome"/>
<input type="text" id="email" name="email"/>
<input type="text" id="telefone" name="telefone"/>
<input type="text" id="website" name="website"/>
<textarea col="5" row="15" id="mensagem" name="mensagem"></textarea>
<input type="submit" id="enviar" value="" />
</form>

<img src="Imagens/outros/formcontato.png"></div>
<div id="result"></div>
<h4 class="inset-text">Satisfação garantiada ou seu dinheiro de volta. </h4>

<footer>
<div id="rssprite">
<ul>
 <li class="face"><a href="http://www.facebook.com" title="Facebook"></a></li>
<li class="twitter"><a href="http://www.twitter.com" title="Twitter"></a></li>
</ul>
</div>
<div id="copyright">@Copyright 2013</div>
<div id="btlike"><img src="Imagens/outros/like.png"></div>
</footer>
</div><!--contato-->

<!--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$-->
<!--box deslizante/flutuante-->
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
        <script language="javascript" src="/assets/js/jquery.quicksand.js" type="text/javascript" charset="utf-8"></script>
        <script language="javascript" src="/assets/js/script.js" type="text/javascript" charset="utf-8"></script>
    
     

</body>
</html>