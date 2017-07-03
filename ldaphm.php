<?php
error_reporting(0);	
$ldaphost = '172.17.34.136';
$ldapport = 389;

$ds = ldap_connect($ldaphost) or die("Could not connect to $ldaphost");
    ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);
//ldap_set_option($ds, LDAP_OPT_DEBUG_LEVEL, 7);.

if ($ds) 
{
	
	
    $username = "Leonardom@OGMASTER.LOCAL";
    $upasswd = "XXXXXX";

    $ldapbind = ldap_bind($ds, $username, $upasswd);



    if ($ldapbind) 
        {print "Congratulations! $username is authenticated";}
    else 
        {print "Access Denied!";}


}
echo "<br/>";



$base_dn = "OU=USERS,DC=OGMASTER,DC=LOCAL";
$filter = "(&(objectCategory=user)(memberOf=IM-ALL_USERS))";

//$ldap_dn="DC=OGMASTER,DC=LOCAL";
$base_dn="OU=LanDesigners,OU=TERCEIROS,DC=OGMASTER,DC=LOCAL";
$filter = "(&(objectCategory=person)(sAMAccountName=$username))";


if (!($search = ldap_search($ds, $base_dn, $filter))) {
     die("Unable to search ldap server");
}

$number_returned = ldap_count_entries($ds,$search);
$info = ldap_get_entries($ds, $search);

echo "The number of entries returned is ". $number_returned."<p>";

for ($i=0; $i<$info["count"]; $i++) {
   echo "Name is: ". $info[$i]["givenname"][0]."<br>";
   echo "Display name is: ". $info[$i]["displayname"][0]."<br>";
   echo "Email is: ". $info[$i]["mail"][0]."<br>";
   echo "Telephone number is: ". $info[$i]["telephonenumber"][0]."<p>";
}
?>

