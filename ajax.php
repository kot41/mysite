<?php
	require_once('config/config.php');
	$_POST['id']=intval($_POST['id']);
	$query = "SELECT * FROM $tbl_tovar WHERE id=".$_POST['id'];
	$tov = mysql_query($query);
	if(!$tov) {
		exit($query);
	}
	while($tovar = mysql_fetch_array($tov)) {
		echo $tovar['name'];
		echo "<br>";
		echo "<img src='/media/uploads/".$tovar['picture']."' width='480px'/>";
		echo "<br>";
		echo $tovar['body'];
		echo "<br>";
		echo $tovar['price'];
	}
?>
