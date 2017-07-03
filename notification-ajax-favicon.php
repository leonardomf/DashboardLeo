<html>
	<head>
		<link rel="icon" href="favicon.ico">
		<title>Notificações by Leo</title>
<?php
error_reporting(0);

?>
<script type="text/javascript" src="/js/ajax-jquery-1.9.1.min.js"></script>

		<script src="/js/require-favicon.js"></script>
		<script>
			
			var leo = '';
			 function refresh_div() {
        jQuery.ajax({
            url:'require-notifications.php',
            type:'POST',
            success:function(results) {
                jQuery(".result").html(results);
			leo = results;
            }
        });
    }
    ty = setInterval(refresh_div,10);
			

				require([
				'js/tinycon.favicon.min.js'
			], function (T) {
			var count = 0;
						
			

				setInterval(function(){	
	if (leo == 0){
	leo='';
}
				++count;
				T.setBubble(leo);
				}, 10);
				
			});
		
				/*		(function(){
				var count = 0;
				setInterval(function(){
					++count;
					Tinycon.setBubble(count);
				}, 1000);
			})();
*/

		</script>
        
	</head>
	<body>
<div><img src="Imagens/icons/noti0.png"/><span class='result number'><span></div>

<h1>NOTIFICAÇÕES</h1>
	</body>
</html>
PHP 5
<pre>
$connection = mysql_connect('localhost','root','') or die(mysql_error());
$database = mysql_select_db('dbnotifications') or die(mysql_error());
$sqli=mysql_query("SELECT * FROM notifications");
echo mysql_num_rows($sqli);
</pre>
<br>
<br>
PHP 7
<pre>

$conn = 'mysql:dbname=dbnotifications;host=localhost';
$user = 'root';
$password = '';

try {
    $conn = new PDO($conn, $user, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} 
catch (PDOException $e) {
    echo 'Erro de conexao: ' . $e->getMessage();
}

$res = $conn->prepare('SELECT COUNT(*) FROM notifications');
$res->execute();
$num_rows = $res->fetchColumn();
echo $num_rows;
</pre>

<style>
body{
font-family:Arial, Helvetica, sans-serif;
background:url(Imagens/background/hol-20160129-cat-m-lsshirts-bg.jpg);

size:100% 100%;
}

.number{
	width:30px;
	border:0px solid #0F3;
font-size:20px;
position:absolute;
top:20px;
left:17px;
text-align:center;
font-weight:bold;
color:#fff;
font-family:Arial, Helvetica, sans-serif
}



</style>