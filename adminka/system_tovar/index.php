<?php

  error_reporting(E_ALL & ~E_NOTICE);

  // Устанавливаем соединение с базой данных
  require_once("../../config/config.php");
  // Подключаем блок авторизации
  require_once("../authorize.php");
  // Подключаем SoftTime FrameWork
  require_once("../../config/class.config.dmn.php");
  // Подключаем блок отображения текста в окне браузера
  require_once("../utils/utils.print_page.php");

  // Данные переменные определяют название страницы и подсказку.
  $title = 'Управление блоком "Товарное наполнение сайта"';
  $pageinfo = '<p class=help>Здесь можно добавить
               товарную позицию, отредактировать или
               удалить уже существующую.</p>';

  // Включаем заголовок страницы
  require_once("../utils/top.php");

  try
  {
  
    $page_link=3;
	$p_number=20;
	$obj=new pager_mysql($tbl_product,"", "ORDER BY id DESC",$p_number,$page_link);
	$news=$obj->get_page();
	?>
	<table width=100% border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td width=50% class='menu_right'>
	<?
		// Добавить блок
		echo "<a href=newsadd.php?page=$_GET[page]
				 title='Добавить товар'>
			<img border=0 src='../utils/img/add.gif' align='absmiddle' />
				 Добавить товар</a>";
	?>
	</td>
	<td width=50%>
	</td>
	</tr>
	</table>
	<?
	if(!empty($news))
		{?>
			<table width="100%" class="table" cellpadding="0" cellspacing="0">
			<tr class="header" align="center">
				<td width="200px">Изображение</td>
				<td>Название</td>
				<td>Описание</td>
				<td>Цена</td>
				<td>Категория</td>
				<td>Действие</td>
			</tr>
			<?php
				
				for ($i=0;$i<count($news);$i++)
					{	$url="?id={$news[$i]['id']} page=".$_GET['page'];
						if($news[$i]['showhide']=='show')
							{
								$showhide="<a href='newshide.php$url' title='Скрыть товар'><img src='../utils/img/folder_locked.gif' border='0' align='absmiddle'/>Скрыть</a>";
								$colorrow = '';
							}
						else 
							{
								$showhide="<a href='newsshow.php$url' title='Отобразить товар'><img src='../utils/img/show.gif' border='0' align='absmiddle'/>Отобразить</a>";
								$colorrow = "class='hiddenrow'";
							}
						if($news[$i][picturesmall])
							{
								$pic="<a href='../../media/images/{$news[$i][picture]}' target='_blank'><img src='../../media/images/{$news[$i][picturesmall]}'/></a>";
							}
						else {$pic="-";}
						echo "<tr $colorrow>
								<td>$pic</td>
								<td><h2>{$news[$i]['name'] }</h2></td>
								<td>{$news[$i]['body']}</td>
								<td>{$news[$i]['price']}</td>
								<td>{$news[$i]['catid']}</td>
								<td class='menu_right' valign='top' align='left'>
								<a>$showhide</a> 
								<a href='newsedit.php$url' title='Редактировать'><img src='../utils/img/kedit.gif' border='0' align='absmiddle'/>Редактировать</a>
								<a href='#' onclick=\"delete_position('newsdel.php$url', 'Вы действительно хотите удалить товар?')\" title='Удалить'><img border='0' src='../utils/img/editdelete.gif' align='absmiddle'/>Удалить</a></td>
							</tr>";
					}
			?>
			</table>
	<?php
		
		}
		echo $obj;
  }
  catch(ExceptionMySQL $exc)
  {
    require("../utils/exception_mysql.php"); 
  }

  // Включаем завершение страницы
  require_once("../utils/bottom.php");

echo "";
?>
