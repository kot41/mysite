<?php require_once ("templates/top.php");
		
	$name=new field_text('name', 'Логин', TRUE, $_POST['name']); // для вывода формы input type text		
	$email=new field_text_email('email', 'емэйл', TRUE, $_POST['email']);	
	$pass=new field_password('pass', 'пароль', TRUE, $_POST['pass']);	
	$passrep=new field_password('passrep', 'подтверждение пароля', TRUE, $_POST['passrep']);
	
	$form=new form(array('name'=>$name, 'email'=>$email, 'pass'=>$pass, 'passrep'=>$passrep), 'регистрация', 'field');
	
	if($_POST){
	$error=$form->check();
		if($form->field['pass']->value != $form->field['passrep']->value) {
			$error[] = 'Пароли не совпадают';
	
		}
		$query = "SELECT COUNT(*) FROM $tbl_user WHERE username='{$form->fields['name']->value}'";
		
		$usr = mysql_query($query);
		if(!$usr) {
			exit($query);

		}		
		if(mysql_result($usr, 0)) {
			$error[] = 'Такой логин уже есть в базе';
		}
		
		if(!$error){
$query="INSERT INTO $tbl_user VALUES (NULL, '{$form->fields['name']->value}',
											'{$form->fields['pass']->value}', 
											'{$form->fields['email']->value}',
											
												NOW(),
												NOW(),
												'unblock')";
	
	$cat=mysql_query($query);
		if(!$cat){
			exit($query);
		}
?>
<script>
	document.location.href='index.php';
</script>	

<?php
		}
	if ($error){
		foreach($error as $err){
		echo "<span style='color:red'>";
		echo $err;
		echo "</span><br/>";
		}

	}	
	
		
}										
$form->print_form();										
	
	require_once ("templates/bottom.php");
	


?>