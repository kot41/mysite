<?php 
	function enter($name, $password) {
		global $tbl_user;
		$query = "SELECT * FROM $tbl_user WHERE username = '$name' AND password = '$password' AND blockunblock = 'unblock' LIMIT 1";
		$usr = mysql_query($query);
		if(!$usr){
			exit($query);
		}
		if(mysql_num_rows($usr)){
			$user = mysql_fetch_array($usr);
			$_SESSION['id_user_position'] = $user['id']; 
			$query = "UPDATE $tbl_user SET lastvisit = NOW() WHERE id = ".$user['id'];
			$cat = mysql_query($query);
			if(!$cat){
				exit($query);
			}
			return TRUE;
		}
		else{
			return FALSE;
		}
	}






?>