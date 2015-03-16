<?php 
session_start();
require_once("config/config.php");
require_once("config/class.config.php");
?>
<!Doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<title>Made By Love - украшения ручной работы</title>
	<meta name="description" content="Сайт-витрина украшений ручной работы MadeByLove">
	<meta name="keywords" content="">
	<link rel="shortcut icon" href="media/img/favicon.ico" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
	<script src="/media/js/jquery-1.11.2.min.js"></script>
	<script>
	$(function(){
		$('.menutop a:eq(0)').bind('mouseover', function(){
			{$('#header').css('background','url(media/img/bg3.jpg) no-repeat center')};
			{$('.menutop a:eq(0)').css('font-weight','bold');}
		});
		$('.menutop a:eq(1)').bind('mouseover', function(){
			{$('#header').css('background','url(media/img/bg4.jpg)')};
			{$('.menutop a:eq(1)').css('font-weight','bold');}
		});
		$('.menutop a:eq(2)').bind('mouseover', function(){
			{$('#header').css('background','url(media/img/bg5.jpg)')};
			{$('.menutop a:eq(2)').css('font-weight','bold');}
		});
		$('.menutop a:eq(3)').bind('mouseover', function(){
			{$('#header').css('background','url(media/img/bg6.jpg)')};
			{$('.menutop a:eq(3)').css('font-weight','bold');}
		});
		$('.menutop a:eq(4)').bind('mouseover', function(){
			{$('#header').css('background','url(media/img/bg7.jpg)')};
			{$('.menutop a:eq(4)').css('font-weight','bold');}
		});
		$('.menutop').bind('mouseout', function(){
			{$('#header').css({
			'background':'url(media/img/bg.jpg) no-repeat center',
			'background-size':'cover',
			'padding':'0em 0em'})};
			{$('.menutop a').css('font-weight','lighter');}
		});
	$('.button button:eq(0)').bind('click', function(){
			$('body').css('background','url(media/img/bg8.jpg)')
		});
	$('.button button:eq(1)').bind('click', function(){
			$('body').css('background','url(media/img/bg2.jpg)')
		});	
	});
	</script>
	<script>
$(function(){
$(window).bind("load", function() { 

       var footerHeight = 0,
           footerTop = 0,
           $footer = $("#footer");

       positionFooter();

       function positionFooter() {

                footerHeight = $footer.height();
                footerTop = ($(window).scrollTop()+$(window).height()-footerHeight)+"px";

               if ( ($(document.body).height()+footerHeight) < $(window).height()) {
                   $footer.css({
                        position: "absolute"
                   }).animate({
                        top: footerTop
                   })
               } else {
                   $footer.css({
                        position: "static"
                   })
               }

       }

       $(window)
               .scroll(positionFooter)
               .resize(positionFooter)

});
});
</script>
	<link type="text/css" rel="stylesheet" href="media/bootstrap/css/bootstrap.min.css"/>
	<link type="text/css" rel="stylesheet" href="media/css/style.css"/>
	</head>
	<body>
		<div id="header"></div>
		<div class="menutop">
		<a href='index.php?url=index'>Главная</a>
		<a href='index.php?url=accessories'>Украшения</a>
		<a href='index.php?url=gallery'>Галерея</a>
		<a href='index.php?url=payment'>Оплата</a>
		<a href='index.php?url=contact'>Контакты</a>
		</div>
		<div class="main">
			<div class="col-md-2">
				<div class="menuleft">
					<div class="menuhead">
					<div class="menubody">
						<a href="tovars.php" class="btn btn-default">Серьги</a>
						<a href="#" class="btn btn-default">Кулоны и подвески</a>
						<a href="#" class="btn btn-default">Кольца</a>
						<a href="#" class="btn btn-default">Браслеты</a>
						<a href="#" class="btn btn-default">Броши</a>
						<a href="#" class="btn btn-default">Наборы</a>
						<a href="#" class="btn btn-default">Другое</a>
					</div></div>
				<a id='search' href="search.php">Поиск по товарам</a>
				</div>
			</div>
			<div class="col-md-8">