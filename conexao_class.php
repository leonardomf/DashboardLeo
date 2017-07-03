<?php
	$link = mysql_connect("localhost", "root", " ");
	mysql_select_db("modelo", $link );
	mysql_set_charset('utf8'); 
	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
	
	function protect( $str )
	{
		if( !is_array( $str ) ) {			
			$str = preg_replace('~&#x([0-9a-f]+);~ei', 'chr(hexdec("\\1"))', $str);
			$str = preg_replace('~&#([0-9]+);~e', 'chr("\\1")', $str);
			$str = str_replace("&lt;script","",$str);
			$str = str_replace("script>","",$str);
			$str = str_replace("&lt;Script","",$str);
			$str = str_replace("Script>","",$str);
			$str = trim($str);
			$tbl = get_html_translation_table(HTML_ENTITIES);
			$tbl = array_flip($tbl);
			$str = addslashes($str);
			$str = strip_tags($str);
			return strtr($str, $tbl);
		} 
		else return $str;
	}
?>