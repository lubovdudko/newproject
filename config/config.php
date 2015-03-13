<?php
	$dblocation="localhost";
	$dbname="newproject";
	$dbuser="root";
	$dbpassword="";
	//tables
	$tbl_maintext="maintexts";
  $tbl_user="users";
  $tbl_product="products";
  $tbl_account="system_accounts";
  $tbl_category="category";
	$dbuse=mysql_connect($dblocation,$dbuser,$dbpassword);
	if(!$dbuse)
		{exit("Сервер баз данных не отвечает");}
	$dbselectname=mysql_select_db($dbname, $dbuse);
	if(!$dbselectname)
		{exit("База данных не отвечает");}
	@mysql_query("SET NAMES 'utf8'");
?>