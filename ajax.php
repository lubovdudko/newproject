<?php
require_once("config/config.php");
$id=(int)$_POST['id'];
$query="SELECT * FROM $tbl_product
		WHERE id=$id";
$cat=mysql_query($query);
if(!$cat){exit($query);}
$tovar=mysql_fetch_array($cat);
if($tovar[picturesmall])
	{
		$pic="<img src='media/images/{$tovar[picture]}'/>";
	}
else {$pic="-";}
	echo $tovar['name'];
	echo '<p></p>';
	echo $pic;
	echo $tovar['body'];
	echo $tovar['price'];
?>