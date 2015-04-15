<?php 
	require_once ("templates/top.php");
?>	 
	<a href="index.php?url=<?php echo $_GET['url']?>">Русский</a>
<?php		
	if ($_GET['url']) {
		$file = $_GET['url'];
	}
	//if (isset($_POST['url'])) $file=$_POST['url'];
	else {
	$file = 'index';
	}
	
	$query = "SELECT * FROM $tbl_maintext WHERE url = '".$_GET['url']."' AND lang = 'en'";
	
  $sql = mysql_query($query);
		if(!$sql) {
			exit($query);
		}
	  $text = mysql_fetch_array($sql); 

?>
<h1><?php echo $text['name'];?></h1>
<div class="main-text">
	<?php echo $text['body'];?></div>	
	
	 


<div class="main-text">
	<?php/* echo $productmap['name'];
		  echo $productmap['body'];
		  echo $productmap['price']; */?>
	<?php $phones = "SELECT * FROM $tbl_catalogtext"; // 
	  $qwer = mysql_query($phones);
		if(!$qwer) {
			exit($phones);
		} 
	 
		if(mysql_num_rows($qwer)) {
		while($productmap = mysql_fetch_array($qwer)) {
				echo $productmap['name'];
		
		}
		}
		
	?>
</div>
	
	<?php require_once ("templates/bottom.php"); ?>

