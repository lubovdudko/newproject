<?php 
	require_once ("templates/top.php" );
	$query="SELECT * FROM $tbl_product
			WHERE showhide='show' AND catid='1'";
	$cat=mysql_query($query);
	if (!$cat)
	{
		exit($query);
	}
	while($tovar=mysql_fetch_array($cat))
	{	
		if($tovar[picturesmall])
							{
								$pic="<a href='media/images/{$tovar[picture]}' target='_blank'><img src='media/images/{$tovar[picturesmall]}'/></a>";
							}
						else {$pic="-";}
		echo '<div class="col-md-4">';
		echo "<a href='#' data='".$tovar['id']."'>".$tovar['name']."</a>";
		echo $pic;
		echo '<p></p>';
		
		echo '</div>';
	}
	?>
<script>
 $(function(){
	var fx={
		'initModal':function(){
			if($('.modal-window').length==0)
			{
			$('<div>').attr('id','query-overlay').fadeIn(2000).appendTo('body');
			return $('<div>').addClass('modal-window').fadeIn(2000).appendTo('body');
			}
			else
			{
			return $('.modal-window');
			}
		}
	}
	$(".col-md-4 a").bind('click',function(e){
	e.preventDefault();
	var data=$(this).attr('data');
	modal=fx.initModal();
	$("<a>").attr('href','#').addClass('modal-close-btn').html('&times;').click(function(event){event.preventDefault();
	$('#query-overlay').fadeOut('slow',function(){$(this).remove();});
	modal.fadeOut('slow',function(){$(this).remove();});}).appendTo(modal);
	$.ajax({
	type:'Post',
	url:'ajax.php',
	data:'id='+data,
	success:function(data){
	modal.append(data);},
	error:function(msg){
	modal.append(msg);}
	});
	});
 });
</script>
	<?php
	require_once ("templates/bottom.php" );?>