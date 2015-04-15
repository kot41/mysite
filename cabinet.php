<?php  require_once ("templates/top.php");

	if($_SESSION['id_user_position']) {
		$query = "SELECT * FROM $tbl_user WHERE id = ".$_SESSION['id_user_position']; 
		$usr = mysql_query($query);
		if(!$usr) {	
			exit($query);
		}
		$user = mysql_fetch_array($usr);
		echo '<h3>Ваши пользовательские данные</h3>';
		echo 'Логин: '.$user['username'];
		echo '<br>';
		echo 'Почта: '.$user['email'];
		echo '<br>';
		echo 'Дата регистрации: '.$user['datereg'];
		echo '<br>';
		echo 'Дата последнего входа: '.$user['lastvisit'];
	}
	
		
	$new_email=new field_text_email('email', 'Новый емэйл', TRUE, $_POST['email']);
	$form=new form(array('email'=>$email), 'сменить почту', 'field');
	$form->print_form();	
	
	$result = mysql_query("UPDATE mobiles SET email='$new_email' WHERE id='5'");
	echo $result;
	require_once ("templates/bottom.php");


?>