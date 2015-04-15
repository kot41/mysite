<?php
	require_once ("templates/top.php");
	$query = "SELECT * FROM $tbl_catalogtext WHERE id=".$_GET['id'];
	$cat = mysql_query($query);
	if(!$cat){
		exit($query);
	
	}
	while ($category = mysql_fetch_array($cat)) {
		echo "<h2>".$category['name']."</h2>";
	}
	$query = "SELECT * FROM $tbl_tovar WHERE $tbl_tovar.cat_id=".$_GET['id'];
	$cat = mysql_query($query);
	if(!$cat){
		exit($query);
	}
	while($tovs = mysql_fetch_array($cat)) {
		echo "<div class='tov'>
			  <a href='#' data=".$tovs['id'].">
			 <img src='/media/uploads/".$tovs['picturesmall']."' />
			 </a>
			<div class='name'>
			".$tovs['name']."
			</div>
			</div>";
	}
?>
 <script>
	$(function(){
		var fx = {
			'initModal' : function(){
			if($('.modal-window').length == 0){
				$('<div>').attr('id', 'jquery-overlay').fadeIn('slow').appendTo('body');
				return $('<div>').addClass('modal-window').appendTo('body');
			}else{
				return $('.modal-window');
				}
			}
		}
		$('.tov a').bind('click', function(){
			var data = $(this).attr('data');
			var modal = fx.initModal();
			$.ajax({
				'type' : 'POST',
				'url' : 'ajax.php',
				'data' : 'id='+data,
				'success' : function(data){
					modal.append(data);
				},
				'error' : function(){
					modal.append(msg);
				}
			});
			$('<a>').attr('href', '#').addClass('modal-close-btn').html('&times').click(function(event){
				event.preventDefault();
				modal.remove();
				$('#jquery-overlay').remove();
			}).appendTo(modal);
			$('#jquery-overlay').click(function(){
				$(this).remove();
				modal.remove();
				
			});
			});
		});
 </script>
<?php	
	require_once ("templates/bottom.php");
?>