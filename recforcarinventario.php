<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"><meta name="robots" content="noindex"><meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE"><title>Interface do Administrador do K1000</title><link rel="shortcut icon" href="/favicon.ico"><link type="text/css" rel="stylesheet" href="http://infok1000/common/css/minified/vendor/select2.css?build=6.3.113397"><link type="text/css" rel="stylesheet" media="print" href="http://infok1000/common/css/minified/print.css?build=6.3.113397"><!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="http://infok1000/common/css/minified/k1000-theme-ie.css?build=6.3.113397" /><![endif]--><link type="text/css" rel="stylesheet" href="http://infok1000/common/css/minified/k1000-theme.css?build=6.3.113397"><!--[if IE]><script type="text/javascript" src="http://infok1000/common/js/minified/vendor/html5.js?build=6.3.113397"></script><![endif]--><script type="text/javascript" src="http://infok1000/common/js/minified/vendor/jquery.js?build=6.3.113397"></script>
<script type="text/javascript" src="http://infok1000/common/js/minified/vendor/jquery.fixes.js?build=6.3.113397"></script><script type="text/javascript">jQuery.noConflict();</script><script type="text/javascript" src="http://infok1000/common/js/minified/vendor/jquery.cookie.js?build=6.3.113397"></script><script type="text/javascript" src="http://infok1000/common/js/minified/vendor/jquery-ui.custom.js?build=6.3.113397"></script><script type="text/javascript" src="http://infok1000/common/js/minified/vendor/jquery.json.js?build=6.3.113397"></script><script type="text/javascript" src="http://infok1000/common/js/minified/vendor/bootstrap.js?build=6.3.113397"></script><script type="text/javascript" src="http://infok1000/common/js/minified/vendor/select2.js?build=6.3.113397"></script><script type="text/javascript" src="http://infok1000/common/js/minified/vendor/jquery.wheelmouse.js?build=6.3.113397"></script><script type="text/javascript" src="http://infok1000/common/js/minified/vendor/bootbox.js?build=6.3.113397"></script><script type="text/javascript" src="http://infok1000/common/js/lang.php?locale=br&amp;build=6.3.113397"></script><script type="text/javascript" src="http://infok1000/common/js/minified/functions.js?build=6.3.113397"></script><script type="text/javascript">var original_onkeypress=document.onkeypress;if(original_onkeypress!=null){ document.onkeypress=allowSearchEnterKey;}</script>

<script src="/js/jquery-1.4.1.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){ 
$("#forcecheckin").click();
//setTimeout("history.go(-1)",1000);
// $("#ForceCheckinForm").submit();
//$("#forcecheckin").submit();
//window.onload = function() { document.getElementById('ForceCheckinForm').submit() }

//document.getElementById("ForceCheckinForm").submit();

});
</script>
</head>

<?php

//sleep(2);

$mappedid = $_POST['mappedid'];
//$mappedid = "2827";


?>

                                            






<form id="ForceCheckinForm" name="ForceCheckinForm" method="post" action="http://infok1000/adminui/machine.php?ID=<?php echo $mappedid; ?>" target="_self" enctype="multipart/form-data">

<input type="hidden" name="" value="<?php echo $mappedid; ?>">


<input name="forcecheckin" id="forcecheckin"  class="inputFormatButton" type="submit" value="Forçar inventário"  hidden="hidden" style="position: absolute; left: -9999px; width: 1px; height: 1px;" />

</form>
                   
                    
          

              
<?php
sleep(0);
echo 'Forçando inventário...Aguarde.'

?>

      
       


 
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
          