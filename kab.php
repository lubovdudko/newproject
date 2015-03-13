<?php require_once("templates/top.php");
	if($_SESSION['id_user_position']){
		$query="SELECT * FROM $tbl_user WHERE id=".$_SESSION['id_user_position'];
		$cat=mysql_query($query);
			if(!$cat){
				exit($query);}
			$user=mysql_fetch_array($cat);
			echo "<h2>".$user['login']."</h2>";
			echo "<h2>".$user['email']."</h2>";
	}
	else{
		echo"Ошибка входа";
	}
?>
<?php require_once("templates/bottom.php")?>