<?php require_once("templates/top.php");
require_once("utils/utils.users.php");
$login=new field_text("login","Логин",true,$_POST["login"]);
$pass=new field_password("pass","Пароль",true,$_POST["pass"]);
$form=new form(array("login"=>$login, "pass"=>$pass), "Войти", "field");
if($_POST){
	$error=$form->check();
		if(!$error){
			if(enter($form->fields['login']->value,
					 $form->fields['pass']->value )){
					 echo 'Данные не верны!';}
			}
?>
          <script>
          document.location.href="index.php";
          </script>
<?php 
		if($error){
			foreach($error as $err){
			echo"<span class='error'>$err </span><br/>";}
		}
 }
?>
<h2>Войти</h2>
<div class="regform">
<?php $form->print_form();?>
</div>
<?php require_once("templates/bottom.php")?>