<?php require_once ("templates/top.php");
	  require_once ("utils/utils.users.php");
	
	  echo '<h2>Вход</h2>';
	?>  
	<div class='form_style'>
		
	<div class='form_auth'>
	<?php
	$name=new field_text('name', 'Логин', TRUE, $_POST['name']); // для вывода формы input type text	
	?>
	</div>
	<div class='form_auth'>
	<?php
	$pass=new field_password('pass', 'пароль', TRUE, $_POST['pass']);	
	?>  
	</div>
	<div class='button'>
	<?php
	$form=new form(array('name'=>$name, 'pass'=>$pass), 'вход', 'field');
	?>
	</div>
	</div>
	<?php
		if($_POST) {
			$error = $form -> check();
			
			if(!$error){
				enter($form->fields['name']->value, $form -> fields['pass'] -> value);
			
				
?>

 <script>
	 document.location.href='index.php';
 </script>
<?php	
			}
			else {
				echo 'ошибка входа';
			}		
		}
	$form->print_form();										
	require_once ("templates/bottom.php");
	


?>