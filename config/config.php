<?php
	$dblocation = 'localhost';
	$dbname = 'mobiles';
	$dbuserroot = 'root';
	$dbpass = '';
	
	//таблицы
	
	$tbl_maintext = 'maintexts';
	$dbcnx = mysql_connect($dblocation, $dbuserroot, $dbpass);
	if(!$dbcnx) {
		exit('no connect to MySQL');
	}	
	$dbuse = mysql_select_db($dbname, $dbcnx);
	if(!$dbuse) {
		exit('no connect to database!');
	}	
	mysql_query('SET NAMES "utf8"');
	
	$tbl_catalogtext = 'catalogs';
	$tbl_user = 'users';
	$tbl_accounts = 'system_accounts';
	$tbl_tovar = 'tovars';
	
	
?>