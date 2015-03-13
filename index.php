<?php 
	require_once ("templates/top.php" );
	if($_GET['url']){
	$file=$_GET['url'];}
	else {
	$file="index";
	}
	$query="SELECT * FROM $tbl_maintext 
			WHERE url='$file'";
	$cat=mysql_query($query);
	if(!$cat){exit($query);}
	$text=mysql_fetch_array($cat);
?>
				<div class="center"><h2><?=$text["name"];?></h2>
					<div class="row"><p><?=$text["body"];?></p> 
					<p></p>
					</div>
				</div>
<?php require_once ("templates/bottom.php" );?>