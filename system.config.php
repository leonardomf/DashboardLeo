<?php
$system_path = dirname(__FILE__);
echo $system_path;
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
echo SELF;
?>