<?php

  error_reporting(E_ALL & ~E_NOTICE);

  // Устанавливаем соединение с базой данных
  require_once("../../config/config.php");
  // Подключаем блок авторизации
  require_once("../authorize.php");
  // Подключаем классы формы
  require_once("../../config/class.config.dmn.php");
     // Данные переменные определяют название страницы и подсказку.
    $title = "Редактирование";
    $pageinfo='<p class="help"></p>';
    // Включаем заголовок страницы
    require_once("../utils/top.php");

  // Предотвращаем SQL-инъекцию
  $_GET['id'] = intval($_GET['id']);

  try
  {
  $query="SELECT * FROM $tbl_category
		 WHERE showhide='show'";
	$cat=mysql_query($query);
	if(!$cat)
	{
		exit($query);
	}
	$category_arr=array();
	while ($cats=mysql_fetch_array($cat))
	{
		$category_arr[$cats['id']]=$cats['name'];
	}
    // Извлекаем из таблицы news запись, соответствующую
    // исправляемому новостному сообщению
    $query = "SELECT * FROM $tbl_product
              WHERE id=$_GET[id]";
    $new = mysql_query($query);
    if(!$new)
    {
      throw new ExceptionMySQL(mysql_error(), 
                               $query,
                              "Ошибка при обращении
                               к таблице новостей");
    }
    $news = mysql_fetch_array($new);
    if(empty($_POST))
    {
      // Берем информацию для оставшихся переменных из базы данных
      $_REQUEST = $news;
    }
    $name        = new field_text("name",
                                  "Название",
                                  true,
                                  $_REQUEST['name']);
    $body        = new field_textarea("body",
                                  "Описание",
                                  true,
                                  $_REQUEST['body']);
	$price        = new field_text("price",
                                  "Цена",
                                  true,
                                  $_REQUEST['price']);
	$catid		  =new field_select("catid",
									"Категория",
									$category_arr,
									$_REQUEST["catid"]);
	$vip		  =new field_select("vip",
									"Показывать",
									array("1"=>"Только в разделах", "2"=>"В разделах и на главной"),
									$_REQUEST["vip"]);
	$picture=new field_file("picture",
							"Фото",
							false,
							$_FILES,"../../media/images/");								
    // Инициируем форму массивом из двух элементов
    // управления - поля ввода name и текстовой области
    // textarea
      $form = new form(array(
	                        "name" => $name, 
                            "body" => $body,
							"price"=>$price,
							"catid"=>$catid,
							"vip"=>$vip,
							"picture"=>$picture)
                    "Редактировать",
                    "field");

    // Обработчик HTML-формы
    if(!empty($_POST))
    {
      // Проверяем корректность заполнения HTML-формы
      // и обрабатываем текстовые поля
      $error = $form->check();
      if(empty($error))
      {
        // Формируем SQL-запрос на добавление новости
    $query = "SELECT * FROM $tbl_product 
              WHERE id=$_GET[id]";
    $new = mysql_query($query);
    if(mysql_num_rows($new) > 0)
    {
      $news = mysql_fetch_array($new);
      if(file_exists("../../media/images/".$news['picture']))
      {
        @unlink("../../media/images/".$news['picture']);
		@unlink("../../media/images/".$news['picturesmall']);
      }
    }
		$var=$form->fields['picture']->get_filename();
			if ($var)
			{
				$picture=date("y_m_d_h_i_").$var;
				$picturesmall='s_'.$picture;
				resizeimg("../../media/images/".$picture, "../../media/images/".$picturesmall, 200,200);
			}
			else
			{
				$picture='';
				$picturesmall="";
			}
		$query = "UPDATE $tbl_product 
                  SET name = '{$form->fields['name']->value}',
                      body = '{$form->fields['body']->value}',
					  price = '{$form->fields['price']->value}',
					  catid = '{$form->fields['catid']->value}',
					  vip = '{$form->fields['vip']->value}',
					  picture=$picture,
					  picturesmall=$picturesmall 
                  WHERE id=".$_GET['id'];
        if(!mysql_query($query))
        {
          throw new ExceptionMySQL(mysql_error(), 
                                   $query,
                                  "Ошибка при редактировании 
                                   новостного сообщения");
        }
        // Осуществляем переадресацию на главную страницу
        // администрирования
        ?>
		<script>
		 document.location.href="index.php?page=<?php echo $_GET['page'] ?>";
		</script>
		<?php
      }
    }

 
  
?>
<div align=left>
<FORM>
<INPUT class="button" TYPE="button" VALUE="На предыдущую страницу" 
onClick="history.back()">
</FORM> 
</div>
<?
    // Выводим сообщения об ошибках, если они имеются
    if(!empty($error))
    {
      foreach($error as $err)
      {
        echo "<span style=\"color:red\">$err</span><br>";
      }
    }
?>
<table width=100%>
<tr>
<td>
<div class="table_user">
<?
    // Выводим HTML-форму 
    $form->print_form();
?>
</div>
</td>
</tr>
</table>
<?
  }
  catch(ExceptionObject $exc) 
  {
    require("../utils/exception_object.php"); 
  }
  catch(ExceptionMySQL $exc)
  {
    require("../utils/exception_mysql.php"); 
  }
  catch(ExceptionMember $exc)
  {
    require("../utils/exception_member.php"); 
  }

  // Включаем завершение страницы
  require_once("../utils/bottom.php");
?>
