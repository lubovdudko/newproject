<?php

  error_reporting(E_ALL & ~E_NOTICE);

  // Устанавливаем соединение с базой данных
  require_once("../../config/config.php");
  // Подключаем блок авторизации
  require_once("../authorize.php");
  // Подключаем классы формы
  require_once("../../config/class.config.dmn.php");

  if(empty($_POST))
  {
    // Отмечаем флажок hide
    $_REQUEST['hide'] = true;
  }   
  $title     = 'Добавление товара';
    $pageinfo  = '<p class=help></p>';
    // Включаем заголовок страницы
    require_once("../utils/top.php");
	require_once("../../utils/utils.resizeimg.php");
  try
  {	$query="SELECT * FROM $tbl_category
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
	if(empty($_POST))
	{
		$_REQUEST["showhide"]=true;
	}
	$name=new field_text("name",
						"Название",
						true,
						$_POST["name"]);
	$body=new field_textarea("body",
							"Описание",
							true,
							$_POST["body"]);
	$price=new field_text("price",
						  "Цена",
						  true,
						  $_POST["price"]);
	$catid=new field_select("catid",
							"Категория",
							$category_arr,
							$_POST["catid"]);
	$showhide=new field_checkbox("showhide",
								"Отображать",
								$_REQUEST["showhide"]);
	$vip=new field_select("vip",
						"Показывать",
						array("1"=>"Только в разделах", "2"=>"В разделах и на главной"),
						$_POST["vip"]);
	$picture=new field_file("picture",
							"Фото",
							false,
							$_FILES,"../../media/images/");
	$form=new form(array("name"=>$name, 
						 "body"=>$body, 
						 "price"=>$price, 
						 "catid"=>$catid,
						 "showhide"=>$showhide, 
						 "vip"=>$vip, 
						 "picture"=>$picture ), 
						 "Добавить", "field");
	
	if($_POST)
	{
	$error=$form->check();
		if(!$error)
		{	if($form->fields['showhide']->value)
				{
				$showhide='show';
				}
			else{$showhide='hide';}
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
			$query="INSERT INTO $tbl_product VALUES(
			 NULL,
			 '{$form->fields['name']->value}',
			 '{$form->fields['body']->value}',
			 '{$form->fields['price']->value}',
			 '{$form->fields['catid']->value}',
			 '{$form->fields['showhide']->value}',
			 '{$form->fields['vip']->value}',
			 '$picture',
			 '$picturesmall',
			 NOW())";
			$cat=mysql_query($query);
          if(!$cat)
			{
            exit($query);
			}
		
		 ?>
          <script>
          document.location.href="index.php";
          </script>
        <?php 
		}
		if($error)
		{
		 foreach($error as $err)
		 {
		 echo"<span class='error'>$err </span><br/>";
		 }
		}
    }
	$form->print_form();
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
