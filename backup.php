<?php
header('Content-Type: text/html; charset=utf-8');
ini_set ('default_charset', 'UTF8');
setlocale(LC_ALL, "pt_BR");
date_default_timezone_set('America/Sao_Paulo');
define( 'CHARSET',   'UTF-8' );
header( 'Content-Type: text/html; charset=' . CHARSET );



session_start();
  if(!isset($_SESSION['LOGIN_STATUS']) && empty($_SESSION['LOGIN_STATUS'])){
      header('location:login?'.$_SERVER ['REQUEST_URI']);
  }
  else if($_SESSION['uname']==='leonardom'){
		
	
			


$directory = 'C:\Users\leonardom\Desktop\IG-QS-LEO';

set_time_limit(1000000000);

error_reporting(5);
unlink("c:/xampp/htdocs/backup_www_wamp.zip"); //apagar backup antigo


// the name of your zip archive to be created
$zipfile = 'backup_www_wamp.zip';



// DO NOT TOUCH BELOW IF YOU DONT KNOW WHAT IT IS
// all the process below

$filenames = array();

// function that browse the directory and all subdirectories inside

function browse($directory) {
	
global $filenames;
    if ($handle = opendir($directory)) {
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != ".." && is_file($directory.'/'.$file)) {
                $filenames[] = $directory.'/'.$file;
            }
            else if ($file != "." && $file != ".." && is_dir($directory.'/'.$file)) {
                browse($directory.'/'.$file);
            }
        }
        closedir($handle);
    }
    return $filenames;
}

browse($directory);

// creating zip archive, adding browsed files

$zip = new ZipArchive();

if ($zip->open($zipfile, ZIPARCHIVE::CREATE)!==TRUE) {
    exit("cannot open <$zipfile>\n");
}

foreach ($filenames as $filename) {
    //echo "Adding " . $filename . "<br/>";
    $zip->addFile($filename,$filename);
}

echo "Total: " . $zip->numFiles . " Arquivos compactados \n";
//echo "status:" . $zip->status . "\n";
$zip->close();


$filename = 'c:/xampp/htdocs/backup_www_wamp.zip';
$size = filesize($filename);
if ($size<='1048576'){
$unidmedida=" KB";
}
if ($size>='1048577' and $size<='1073741824'){
$unidmedida=" MB";
}
if ($size>='1073741825' and $size<='1099511627776'){
$unidmedida=" GB";
}
if ($size>'1099511627776'){
$unidmedida=" TR";
}
echo '<br/>Tamanho do arquivo compactado: '.bcdiv($size,1048576,2).$unidmedida;
}
  
else{
echo 'acesso negado!';	
}

  
  
  
  
  
?>