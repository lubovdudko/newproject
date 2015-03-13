<?php
function enter($name, $pass){
global $tbl_user;
$query ="SELECT * FROM $tbl_user 
		WHERE login = '$name' AND pass='$pass' 
		AND blockunblock='unblock'";
$us=mysql_query($query);
	if(!$us){
		exit($query);
		}
	if(mysql_num_rows($us)){
		$user=mysql_fetch_array($us);
		$_SESSION["id_user_position"]=$user["id"];
		$query="UPDATE $tbl_user SET lastvisit=NOW()
				WHERE id=".$user['id'];
		$cat=mysql_query($query);
		if(!$cat){
			exit($query);}
			return true;
			}
	else{
		return false;
		}
}
?>	