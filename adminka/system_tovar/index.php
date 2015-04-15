<?php

  error_reporting(E_ALL & ~E_NOTICE);

  // Устанавливаем соединение с базой данных
  require_once("../../config/config.php");
  // Подключаем блок авторизации
  require_once("../authorize.php");
  // Подключаем SoftTime FrameWork
  require_once("../../config/class.config.dmn.php");
  // Подключаем блок отображения текста в окне браузера
  require_once("../utils/utils.print_page.php");

  // Данные переменные определяют название страницы и подсказку.
  $title = 'Управление блоком "Текстовое наполнение сайта"';
  $pageinfo = '<p class=help>Здесь можно добавить
               новостной блок, отредактировать или
               удалить уже существующий блок.</p>';

  // Включаем заголовок страницы
  require_once("../utils/top.php");

  try
  {

?>
<table width=100% border="0" cellpadding="0" cellspacing="0">
<tr>
<td width=50% class='menu_right'>
<?
    // Добавить блок
    echo "<a href=newsadd.php?page=$_GET[page]
             title='Добавить новость'>
		<img border=0 src='../utils/img/add.gif' align='absmiddle' />
             Добавить новость</a>";
?>
</td>
<td width=50%>
</td>
</tr>
</table>
<?
  $page_link = 3;
	$number = 20;
	$obj = new pager_mysql($tbl_tovar, '', "ORDER BY id DESC", $number, $page_link);	
	$news = $obj -> get_page(); // get_page вернет массив данных
	if(!empty($news)) {
	?>
		<table width="100%" class="table" border="1px solid #000000" cellspacing="0" cellpadding="0">
		 <tr class="header" align="center">
			<td width="200px">Изображение</td>
			<td>Наименование</td>
			<td>Цена</td>
			<td>Действия</td>
		</tr>
	<?
	for($i=0; $i<count($news); $i++) {
		if($news[$i]['picturesmall']) {
			$picture = "<img src='../../media/uploads/".$news[$i]['picturesmall']."'width='200px'/>";
		}
		else {
			$picture = '-';
		}
		$url = "?id=".$news[$i]['id']."&page=".$_GET['page'];
		if($news[$i]['showhide'] == 'show') {
			$showhide = "<a href = 'newshide.php$url' title='Скрыть'>
			<img src=../utils/img/folder_locked.gif border=0 align='absmiddle'>
			Скрыть</a>";
			$colorrow="";
		} // end if
		else{
		$showhide = "<a href='newsshow.php$url?' title='Отобразить'>
					<img src='../utils/img/show.gif' border=0 align=absmiddle'/>
						Отобразить</a>";
		$colorrow="class='hiddenrow'";
		
		} //end else
		
		
			echo "<tr $colorrow>
				  <td>".$picture."</td>
				  <td>".$news[$i]['name']."</td>
				  <td>".$news[$i]['price']."</td>  
				  <td class=menu>".$showhide."
				  <a href=newsedit.php$url title='редактировать'><img src='../utils/img/kedit.gif'
				  align='absmiddle'/>редактировать</a>
				  <a href='#' onclick=\"delete_position('newsdel.php$url',
										'вы действительно хотите удалить?');\" title='удалить'>
				  <img src='../utils/img/editdelete.gif' align='absmiddle'>
					удалить</a>
				  </td>
				  </tr>";
				  		  
	} // end for
echo "</table>";	
	}
	
	
  }
  catch(ExceptionMySQL $exc)
  {
    require("../utils/exception_mysql.php"); 
  }

  // Включаем завершение страницы
  require_once("../utils/bottom.php");

echo "";
?>