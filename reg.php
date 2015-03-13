<?php require_once("templates/top.php");
$login=new field_text("login","Логин",true,$_POST["login"]);
$pass=new field_password("pass","Пароль",true,$_POST["pass"]);
$passrep=new field_password("passrep","Повтор пороля",true,$_POST["passrep"]);
$email=new field_text_email("email","E-mail",true,$_POST["email"]);
$form=new form(array("login"=>$login,"email"=>$email, "pass"=>$pass, "passrep"=>$passrep), "Регистрация", "field");
if($_POST){
  $error=$form->check();
    if($form->fields['pass']->value!=$form->fields['passrep']->value)
      {
        $error[]='Поля Пароль и Повтор пароля не совпадают';
      }
      $query="SELECT COUNT(*) 
              FROM $tbl_user WHERE login='{$form->fields["login"]->value}'";
      $user=mysql_query($query);
        if(mysql_result($user,0))
        {
          $error[]='Пользователь с таким именем уже существует';
        }
    if(!$error){
         $query="INSERT INTO $tbl_user VALUES(
         NULL,
         '{$form->fields['login']->value}',
         '{$form->fields['pass']->value}',
         '{$form->fields['email']->value}',
         NOW(),
         NOW(),
         'unblock')";
        $cat=mysql_query($query);
          if(!$cat){
            exit($query);
      }
    ?>
          <script>
          document.location.href="login.php";
          </script>
    <?php 
    }
 
    if($error){
     foreach($error as $err){
     echo"<span class='error'>$err </span><br/>";
     }
   
   }
}?>
<h2>Регистрация</h2>
<div class="regform">
<?php $form->print_form();?>
</div>
<?php require_once("templates/bottom.php")?>