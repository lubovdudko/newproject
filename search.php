<?php require_once("templates/top.php");
$arr=array('0'=>'Выберите из списка');
$query="SELECT * FROM $tbl_category
	WHERE showhide='show'";
	$cat=mysql_query($query);
	if(!$cat){
	exit($query);
	}
	while($cats=mysql_fetch_array($cat)){
	$arr[$cats['id']]=$cats['name'];
	}
	$name=new field_text("name","Название",false,$_POST["name"]);
	$pricefrom= new field_text("pricefrom", "Цена от", false, $_POST["pricefrom"]);
	$priceto= new field_text("priceto", "Цена до", false, $_POST["priceto"]);
	$sale= new field_checkbox('sale', 'На акции', $_POST['sale']);
	$image= new field_checkbox('image', 'С изображением', $_POST['image']);
	$category= new field_select('category', 'Выберите категорию',$arr, $_POST['category']);
	$form=new form(array("name"=>$name,"pricefrom"=>$pricefrom, "priceto"=>$priceto, "sale"=>$sale,"image"=>$image, "category"=>$category), "Найти", "field");
	
	if($_POST){
		if ($form->fields['name']->value!=''){
		$tmp1="AND name LIKE '%".trim($form->fields['name']->value)."%'";
		}
		if ($form->fields['pricefrom']->value!=''){
		$tmp2="AND price>'".trim($form->fields['pricefrom']->value)."'";
		}
		if ($form->fields['priceto']->value!=''){
		$tmp3="AND price<'".trim($form->fields['priceto']->value)."'";
		}
		if ($form->fields['sale']->value!=''){
		$tmp4="AND vip=2";
		}
		if ($form->fields['image']->value!=''){
		$tmp5="AND picture!=0";
		}
		if ($form->fields['category']->value!='0'){
		$tmp6="AND catid ='".trim($form->fields['category']->value)."'";
		}
		
	$query="SELECT * FROM $tbl_product WHERE id>0 AND showhide='show' $tmp1 $tmp2 $tmp3 $tmp4 $tmp5 $tmp6";
	$cat =mysql_query($query);
	
	if(!$cat){
		exit($query);
	}
	while($tovs=mysql_fetch_array($cat)){
		if($tovs[picturesmall])
							{
								$pic="<a href='media/images/{$tovs[picture]}' target='_blank'><img src='media/images/{$tovs[picturesmall]}'/></a>";
							}
		echo '<div class="col-md-4">';
		echo "<a href='#' data='".$tovs['id']."'>".$tovs['name']."</a>";
		echo $pic;
		echo '<p></p>';
		echo $tovs['price'];
		echo '</div>';
		
	}
	}
	?>
	<p></p>
	<?php
	$form->print_form();?>	
	
	

<?php require_once("templates/bottom.php")?>
