<?php
	session_start();
	require_once ('config/config.php');
	require_once ('config/class.config.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>
			My site
		</title>
		<meta charset="utf-8">
		<meta name="description" content="utf-8">
		<meta name="keywords" content="облака">
		<link type="text/css" href="media/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="media/css/style.css" rel="stylesheet">
		<script src="/media/js/jquery-1.11.2.min.js"></script>
		<script>
			$(function() {
				$('.topmenu a:eq(0)').bind('mouseover', function(){
					$('#header').css({
						'background':'#CCCCCC'}) 
						});
			
			$('.topmenu').bind('mouseout', function(){
						 $('#header').css({
									'background':''}); 
						});
			});
		</script>
	</head>
	
	<body>
		<div id="header">
				<img src="media/image/logo.png" class="logo">
				<div class="logo-text">	
				
				<?php		if ($_SESSION['id_user_position']) {
				?>
				<a href="cabinet.php">Личный кабинет</a>
				|
				<a href="logout.php">Выход</a>
				<?php
				}
				else {
				?>
				<a href="auth.php">Вход</a>
				|
				<a href="reg.php">Регистрация</a>
				<?php
					
				}
				
?>				
				</div>
				
				
		</div>
		
		<div class="topmenu">
				<a href="index.php">Главная</a>
				<a href="#">Новости</a>
				<a href="index.php?url=mobile_phone_1">Товары</a>
				<a href="#">Контакты</a>
				<a href="index.php?url=about">О нас</a>
				<a href="#">Отзывы</a>
				
		</div>
		
		<div class="container">
			<div class="col-md-2">
				<div class="menu">
					
					
					<a href="#" class="btn btn-primary">Новости</a>
					<a href="index.php?url=categories" class="btn btn-primary">Товары</a>
					<a href="#" class="btn btn-primary">Контакты</a>
					<a href="index.php?url=about" class="btn btn-primary">О нас</a>
					<a href="#" class="btn btn-primary">Отзывы</a>
<?php	
					$query = "SELECT * FROM $tbl_catalogtext WHERE showhide='show'";
					$cat = mysql_query($query);
					if(!$cat){
					exit($query);
	
	}
	while ($category = mysql_fetch_array($cat)) {
			echo "<a href='cat.php?id=".$category['id']."'>".$category['name']."</a>";					
			}		
?>
	
				</div>
			</div>
			
			<div class="col-md-8">
			
	