<?php 
	header('content-type:text/html; charset=UTF-8');
	require_once('employer.php');
	$emp=new employer;
	$emp->surname ='Борисов';
	$emp->name='Игорь';
	$emp->patronimic='Иванович';
	
	if (!$emp->set_age(32)){
		exit("ошибка возраста");
	}
	echo $emp->get_full_info();


?>



