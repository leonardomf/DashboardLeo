<?php

$time = $_POST["time"];
         // Verifica se o checkbox com nome nacionalidade foi selecionado
         if(isset($_POST["time"])) {
             echo "Seu time é" ?> <?php echo $time; ?> <?php " !!";
         }  else  {
             echo "Você não é brasileiro!!";
         }
?>

<?php

$view = $_POST["view"];
         // Verifica se o checkbox com nome nacionalidade foi selecionado
         if(isset($_POST["view"])) {
			 //echo $view ON ou OFF;
			switch (strtoupper($view)){
			case 'ON':
             echo "O seu Wireless está ligado !!";
			 break;
			 default:

echo ("O seu Wireless está desligado!");
break;
			}}/*
         }  else  {
             echo "!!";
         }*/
?>
<?php
 
          // Verifica se alguma cor foi selecionada
         if(isset($_POST["cor"])) {
             // Faz um loop no Array de checkbox
             // A função count retorna a quantidade de checkbox selecionado
             for($i = 0; $i < count($_POST["cor"]); $i++) {
                 echo "A cor ".$_POST["cor"][$i]." foi selecionada!<br />";
             }
         } else {
             echo "Nenhuma cor foi selecionada!";
		 }
?>
