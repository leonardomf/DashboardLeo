<?php
error_reporting(0);
sleep(1);
$acao = $_POST['acao'];
$host = $_POST['host'];
$diretorio = $_POST['dir'];
$pw = 'leolmftriton@#87';


$acao = isset( $_POST['acao'] ) ? $_POST['acao'] : null;
if(isset($host)){


switch ($acao) {

	
case 0:

/*ABERTURA DE PROGRAMA*/
function ExecProgram($host,$dir) {
	
$dirfix="C:\Program Files";
if($dirfix){
$dirfix="C:\Program Files";
}
else{
$dirfix="C:\Program Files (x86)";
}
$dirdyn="\Internet Explorer\iexplore.exe";
$dir="C:\Program Files (x86)\Google\Chrome\Application\chrome.exe";

$pingresult = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host \"$dir\" http://infoservicos.infoglobo.com.br", $output, $status);
}
echo "O comando foi enviado para abertura do Infoserviços";
ExecProgram($host,$dir);
break;
  
  
case 1:
              
/*ABRE PROGRAMAS COMUNS DO WINDOWS - PAINT, NOTEPAD, CALC*/
function ExecProgramWindows($host) {
    $result = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host notepad", $output, $status);
}
echo "O comando foi enviado para abertura do Bloco de Notas";
ExecProgramWindows($host);

break;
    
	
case 2:
    
/*SHUTDOWN FUNCIONANDO */
function ExecShutdownR($host,$diretorio) {
 	$resultshutdown = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host cmd.exe /c shutdown -r -t \"$diretorio\"", $output, $status);
}
echo "A máquina será reiniciada em ".$diretorio." segundos";
ExecShutdownR($host,$diretorio);

break;



case 3:
    
/*SHUTDOWN*/
function ExecShutdownS($host,$diretorio) {
 	$resultshutdown = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host cmd.exe /c shutdown -s -t \"$diretorio\" ", $output, $status);
}
echo "A máquina será desligada em ".$diretorio." segundos";
ExecShutdownS($host,$diretorio);

break;


case 4:

/*INSTALAR EXE*/
function ExecCancShutdown($host) {
 	$resultshutdown = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host cmd.exe /c shutdown -a", $output, $status);
}
echo "Desligamento da máquina cancelado com sucesso";
ExecCancShutdown($host);

break;


case 5:

/*GPUPDATE*/
function ExecGpUpdate($host) {
    $result = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host Gpupdate /force", $output, $status);
}
echo "Gpupdate /force executado na máquina";
ExecGpUpdate($host);

break;



case 6:

/*GPUPDATE*/
function ExecGpUpdate($host) {
    $result = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host Gpupdate /force /sync", $output, $status);
}
echo "Gpupdate /force /sync executado na máquina";
ExecGpUpdate($host);

break;


case 7:

/*ABERTURA DE PROGRAMA*/
function ExecProgram($host,$dir) {
    $pingresult = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host calc", $output, $status);
}
echo "Aberto a Calculadora do Windows com sucesso";
ExecProgram($host,$dir);

break;


case 8:

/*ABERTURA MSTSC*/
function ExecProgram($host,$dir) {
    $pingresult = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host mstsc", $output, $status);
}
echo "Aberto o Remote Desktop do Windows com sucesso";
ExecProgram($host,$dir);

break;


case 9:

/*EXECUTAR BATCH*/
function ExecBatch($host,$diretorio) {
    $result = exec(dirname(__FILE__)."\\psexec -i -s -d -u ogmaster\leonardom -p ".$pw." \\\\$host \"$diretorio\"", $output, $status);
}
echo "Batch executada com sucesso";
ExecBatch($host,$diretorio);

break;


case 10:
    
/*ABERTURA DE PROGRAMA*/
function ExecProgram($host,$diretorio) {

$pingresult = exec(dirname(__FILE__)."\\psexec -i -s -d -u ogmaster\leonardom -p ".$pw." \\\\$host \"$diretorio\" ", $output, $status);
}
echo "Comando enviado para abertura do programa ".$diretorio." com sucesso";
ExecProgram($host,$diretorio);
break;


case 11:

/*IPCONFIG*/
function ExecIpConfig($host) {
    $result = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host -d ipconfig \\all", $output, $status);
}
echo "Comando Ipconfig enviado";
ExecIpConfig($host);

break;



case 12:

/*FINALIZAR PROCESSO*/
function ExecFinalizaProcesso($host,$diretorio) {
    $result = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host -u ogmaster\leonardom -p ".$pw." taskkill /f /im \"$diretorio\"", $output, $status);
}
echo "Finalizado processo ".$diretorio." com sucesso";
ExecFinalizaProcesso($host,$diretorio);

break;

case 13:

/*TRANSFERIR ARQUIVO*/
function ExecTransFiles($host,$diretorio) {
    $result = exec(dirname(__FILE__)."\\psexec -s \\\\$host cmd /c copy \"$diretorio\" c:\\ /y", $output, $status);
}
echo "Transferência de arquivo ".$diretorio." do ".$host." copiado para C da máquina";
ExecTransFiles($host,$diretorio);

break;



case 14:

/*INSTALAR MSI PASSIVAMENTE*/
function ExecInstallPass($host,$diretorio) {
	
	if(isset($diretorio) && !empty($diretorio)){
		
    $result = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host msiexec /i \"$diretorio\" /passive /quiet", $output, $status);
    $result1 = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host wusa \"$diretorio\" /passive /quiet", $output, $status);
	
	}
	else
	{
	echo "Diretorio inexistente";	
	}
}
echo "Instalado com sucesso";

ExecInstallPass($host,$diretorio);

break;




case 15:
/*DESINSTALAR MSI PASSIVAMENTE*/
function ExecUnistallPass($host,$diretorio) {
    $result = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host msiexec /x \"$diretorio\" /passive /quiet", $output, $status);
}
echo "Desinstalado com sucesso";
ExecUnistallPass($host,$diretorio);

break;



case 16:
/*DESATIVAR FIREWALL*/
function ExecDesativarFirewall($host,$diretorio) {
    $result = exec(dirname(__FILE__)."\\psexec -i -s -d -u ogmaster\leonardom -p ".$pw." \\\\$host netsh advfirewall set currentprofile state off", $output, $status);
 $result = exec(dirname(__FILE__)."\\psexec -i -s -d -u ogmaster\leonardom -p ".$pw." \\\\$host netsh advfirewall set allprofiles state off", $output, $status);
  $result = exec(dirname(__FILE__)."\\psexec -i -s -d -u ogmaster\leonardom -p ".$pw." \\\\$host netsh firewall set opmode disable", $output, $status);
}
echo "Firewall desativado";
ExecDesativarFirewall($host,$diretorio);

break;



case 17:
/*ATIVAR FIREWALL*/

function ExecAtivarFirewall($host,$diretorio) {
    $result = exec(dirname(__FILE__)."\\psexec -i -s -d -u ogmaster\leonardom -p ".$pw." \\\\$host netsh advfirewall set currentprofile state on", $output, $status);
 $result = exec(dirname(__FILE__)."\\psexec -i -s -d -u ogmaster\leonardom -p ".$pw." \\\\$host netsh advfirewall set allprofiles state on", $output, $status);
  $result = exec(dirname(__FILE__)."\\psexec -i -s -d -u ogmaster\leonardom -p ".$pw." \\\\$host netsh firewall set opmode enable", $output, $status);
}
echo "Firewall ativado";
ExecAtivarFirewall($host,$diretorio);

break;


case 18:

/*MODIFICAR PROXY*/
function ExecProxy($host) {
    $result = exec(dirname(__FILE__)."\\psexec -s \\\\$host cmd /c copy \"\\\\pc7975\bkp\programas\proxy\Proxy3SI.vbs\" c:\\", $output, $status);
	 $result2 = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host wscript.exe \"c:\Proxy3SI.vbs\"", $output, $status);
	 $result2 = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host cmd /c del \"c:\Proxy3SI.vbs\"", $output, $status);

}
echo "Comando enviado";
ExecProxy($host);

break;


case 19:

/*MODIFICAR PROXY*/
function ExecProxy($host) {
    $result = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host wscript.exe \"\\\\pc7975\bkp\programas\proxy\Proxy2.vbs\"", $output, $status);
}
echo "Comando enviado";
ExecProxy($host);

break;


case 20:

/*INSTALAR OU REINSTALAR CLIENT KACE*/
function ClientKace($host) {
	set_time_limit(1000000);

   $result2 = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host msiexec /x \"\\\\infok1000\\client\\agent_provisioning\\windows_platform\\ampagent-6.4.522_infok1000.msi\" /passive /quiet", $output, $status);

sleep(50);
   $result = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host msiexec /i \"\\\\infok1000\\client\\agent_provisioning\\windows_platform\\ampagent-6.4.522_infok1000.msi\" /passive /quiet", $output, $status);
  // sleep(10);
  //$result1 = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host wusa \"\\\\infok1000\\client\\agent_provisioning\\windows_platform\\ampagent-6.4.522_infok1000.msi\" /passive /quiet", $output, $status);
   //$result3 = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host wusa \"\\\\infok1000\\client\\agent_provisioning\\windows_platform\\ampagent-6.4.522_infok1000.msi\" /passive /quiet", $output, $status);
  //  $result4 = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host msiexec /i \"\\\\infok1000\\client\\agent_provisioning\\windows_platform\\ampagent-6.4.522_infok1000.msi\" /passive /quiet", $output, $status);
   // $result5 = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host wusa \"\\\\infok1000\\client\\agent_provisioning\\windows_platform\\ampagent-6.4.522_infok1000.msi\" /passive /quiet", $output, $status);

sleep(100);
$pingresult = exec(dirname(__FILE__)."\\psexec -i -s -d -u ogmaster\leonardom -p ".$pw." \\\\$host \"C:\Program Files\Dell\KACE\runkbot.exe\" ", $output, $status);
$pingresult1 = exec(dirname(__FILE__)."\\psexec -i -s -d -u ogmaster\leonardom -p ".$pw." \\\\$host \"C:\Program Files (x86)\Dell\KACE\runkbot.exe\" ", $output, $status);

sleep(20);
$result8 = exec(dirname(__FILE__)."\\psexec -i -s -d -u ogmaster\leonardom -p ".$pw." \\\\$host \"\\\\pc7975\\bkp\\runkbot40.bat\" ", $output, $status);
//echo "Realizado com sucesso!";
}
echo "Processo de instalação do client Kace enviado com sucesso. Teste em poucos minutos.";
ClientKace($host);

break;



case 21:

/*HIBERNAR*/
function ExecHibernar($host) {
    $result = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host powercfg -h on", $output, $status);
	    $result1 = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host cmd.exe /c shutdown -h -f", $output, $status);

}
echo "Máquina será hibernada em poucos segundos.";
ExecHibernar($host);

break;

case 22:

/*NETBIOS*/
function ExecDesNetBios($host) {
$result = exec(dirname(__FILE__)."\\psexec -i -s -d -u ogmaster\leonardom -p ".$pw." \\\\$host \"\\\\infok1000\\client\\deployment\\NetBios\\kace4768.bat\"", $output, $status);
$result1 = exec(dirname(__FILE__)."\\psexec -i -s -d -u ogmaster\leonardom -p ".$pw." \\\\$host \"\\\\infok1000\\client\\deployment\\NetBios\\kace7894.bat\"", $output, $status);

}
echo "Desabilitado NetBios com sucesso.";
ExecDesNetBios($host);

break;


case 23:

/*NETBIOS*/
function HabilitarRDC($host) {
    $result = exec(dirname(__FILE__)."\\psexec -i -s -d -u ogmaster\leonardom -p ".$pw." \\\\$host netsh advfirewall set currentprofile state off", $output, $status);
 $result = exec(dirname(__FILE__)."\\psexec -i -s -d -u ogmaster\leonardom -p ".$pw." \\\\$host netsh advfirewall set allprofiles state off", $output, $status);
  $result = exec(dirname(__FILE__)."\\psexec -i -s -d -u ogmaster\leonardom -p ".$pw." \\\\$host netsh firewall set opmode disable", $output, $status);
$result = exec(dirname(__FILE__)."\\psexec -i -s -d -u ogmaster\leonardom -p ".$pw." \\\\$host REG ADD \"HKLM\\SYSTEM\\CurrentControlSet\\Control\\Terminal Server\" /v fDenyTSConnections /t REG_DWORD /d 0 /f", $output, $status);


}
echo "Habilitado RDC do Windows com sucesso.";
HabilitarRDC($host);

break;








} //switch case










//echo $acao;
//echo $host;
//echo $diretorio;
//echo " Comando enviado para o destino com sucesso.";


}//(if)
else{
echo " Impossível executar o comando.";	
}


?>