<?php require_once ("templates/top.php");
?>	 
	<a href="index.en.php?url=<?php echo $_GET['url']?>">English</a>
<?php		
	if ($_GET['url']) {
		$file = $_GET['url'];
	}
	//if (isset($_POST['url'])) $file=$_POST['url'];
	else {
	$file = 'index';
	}
	

 $query = "SELECT * FROM $tbl_maintext WHERE url = '$file'";
	  $sql = mysql_query($query);
		if(!$sql) {
			exit($query);
		}
	  $text = mysql_fetch_array($sql); //преобразование в массив

?>
<h1><?php echo $text['name'];?></h1>
<div class="main-text">
	<?php echo $text['body'];?></div>	
	
	 


<!--<div class="main-text">
	 <?php/* echo $productmap['name'];
		  echo $productmap['body'];
		  echo $productmap['price']; */?>
		  
		  
	<?php /*$phones = "SELECT * FROM $tbl_catalogtext"; // запрос на выборку
	  $qwer = mysql_query($phones);
		if(!$qwer) {
			exit($phones);
		} 
	 
		if(mysql_num_rows($qwer)) {
		while($productmap = mysql_fetch_array($qwer)) {
				echo $productmap['name'];
		
		}
		}
		
	*/?> 
</div> -->
	
	
<?php require_once ("templates/bottom.php"); ?>

<!-- @mysql_connect($sdd_db_host,$sdd_db_user,$sdd_db_pass); // коннект с сервером бд
@mysql_select_db($sdd_db_name); // выбор бд
$result=mysql_query('SELECT * FROM `table_name`'); // запрос на выборку
while($row=mysql_fetch_array($result))
{
echo '<p>Запись id='.$row['id'].'. Текст: '.$row['text'].'</p>';// выводим данные
} -->