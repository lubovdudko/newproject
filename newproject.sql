-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3307
-- Время создания: Мар 09 2015 г., 12:57
-- Версия сервера: 5.5.38-log
-- Версия PHP: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `newproject`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `showhide` enum('show','hide') NOT NULL DEFAULT 'show',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `showhide`) VALUES
(1, 'Серьги', 'show'),
(2, 'Подвески', 'show'),
(3, 'Кольца', 'show'),
(4, 'Браслеты', 'show'),
(5, 'Броши', 'show'),
(6, 'Наборы', 'show'),
(7, 'Другое', 'show');

-- --------------------------------------------------------

--
-- Структура таблицы `maintexts`
--

CREATE TABLE IF NOT EXISTS `maintexts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `body` text NOT NULL,
  `url` tinytext NOT NULL,
  `showhide` enum('show','hide') NOT NULL DEFAULT 'show',
  `lang` enum('ru','eng') NOT NULL DEFAULT 'ru',
  `putdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `maintexts`
--

INSERT INTO `maintexts` (`id`, `name`, `body`, `url`, `showhide`, `lang`, `putdate`) VALUES
(1, 'Добро пожаловать на сайт!', '<div class="texts"><p><b>MadeByLove</b> – мастерская авторских украшений и аксессуаров. Здесь создаются разные украшения для разных людей, каждое – с уникальным настроением и смыслом.\nВсе изделия, размещенные на сайте, созданы по оригинальным идеям и изготовлены вручную.  В большинстве случаев детали и элементы украшений также являются ручной работой.\n</p></div>\n<div class="pic"><img src="media/img/picture1.jpg"><img src="media/img/picture3.jpg"><img src="media/img/picture2.jpg"></div>\n<div class="texts"><p>Нам неинтересно повторяться и тиражировать - значительная часть работ приходит в мир в ограниченном количестве или единственном экземпляре. Нам нравится сочетать различные техники, комбинировать материалы, экспериментировать с формами. Мы также не ограничиваю себя определенным направлением – поэтому, в портфолио есть и забавные текстильные броши, и утонченные вечерние украшения. Мы надеемся, что Вы найдете здесь что-то особенное для себя и своих близких!\n</p></div>\n<div><p><i>Любовь Дудко</i></p></div>', 'index', 'show', 'ru', '2015-02-25'),
(2, 'Украшения', '<h2>Несколько слов об украшениях</h2>', 'accessories', 'show', 'ru', '2015-02-25'),
(3, 'Контакты', '<div class="texts"><p><ul>\n<li><img src="media/img/gmail.gif"><b>Email:</b>lubovdudko3@gmail.com</li>\n<li><img src="media/img/velcom.gif"><b>Phone:</b>+375291533438</li>\n<li><img src="media/img/skype.gif"><b>Skype:</b>lubov_dudko</li>\n<li><img src="media/img/vk.gif"><b>VK:</b><a href="http://vk.com/id35884310" target="_blank">Любовь Дудко</li></ul></p></div>\n<br><br>', 'contact', 'show', 'ru', '2015-02-25'),
(4, 'Оплата', '<p><b>Вы можете воспользоваться одним из нижеперечисленных способом оплаты товара:</b></p>\n\n<ol><p><li><b>Наличными при получении товара в розничном магазине или пункте выдачи*.</b>\nОплата товара наличными в белорусских рублях осуществляется непосредственно продавцу в розничном магазине или пункте выдачи. Продавец в обязательном порядке выдаст Вам чек (образцы документов: чек, договор рассрочки) в подтверждение факта купли-продажи в соответствии с законодательством Республики Беларусь.</li></p>\n\n<p><li><b>Наложенным платежом.</b>\nОплата товара при его получении наложенным платежом в отделении связи РУП «Белпочта».</b></li></p>\n\n<p><li><b>Банковской пластиковой карточкой, в том числе с помощью SMS-банкинг.</b>\nВозможность этого способа оплаты уточните, пожалуйста, у банка, эмитировавшего Вашу пластиковую банковскую карточку. Наши реквизиты для оплаты смотрите ниже.</b></li></p>\n\n<p><li><b>Почтовым переводом.</b>\nОплата товара в любом почтовом отделении РУП «Белпочта». При заполнении квитанции не забудьте, пожалуйста, указать наши реквизиты (смотрите ниже) и номер заказа.</b></li></p>\n\n<p><li><b>Платежом через банк.</b>\nОплата покупки в Вашем банке путем перечисления необходимой суммы на наш расчетный счет. При заполнении квитанции не забудьте, пожалуйста, указать наши реквизиты (смотрите ниже) и номер заказа.</b></li></p>\n\n<table><tr><td>Реквизиты для оплаты:</td><td></td></tr><tr><td>Получатель: </td><td>ЗАО «КиС»</td></tr><tr><td>Банк:</td><td>Дирекция ОАО "Белинвестбанк", по Витебской области, г.Витебск, ул.Ленина 22/16, код 739</td></tr><tr><td>р/с:</td><td>3012410584023</td></tr><tr><td>УНП: 	</td><td>300299762</td></tr> 	\n</table>\n\n<p><i>* цены указаны за одну единицу товара при оплате за наличный расчёт.</i></p>\n<p><i>** цену за безналичный расчёт просьба уточнять по телефону, т.к. она может отличаться от цены за наличный расчёт.</i></p>\n\n<p>С уважением, администрация интернет-магазина</p>', 'payment', 'show', 'ru', '2015-02-25'),
(5, 'Галерея', '<div class="hovergallery">\n<img src="media/img/picture5.jpg" /><img src="media/img/picture4.jpg" />\n<img src="media/img/picture6.jpg" /><img src="media/img/picture7.jpg" /><img src="media/img/picture8.jpg" /><img src="media/img/picture9.jpg" /></div>', 'gallery', 'show', 'ru', '2015-02-25');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `body` text NOT NULL,
  `price` tinytext NOT NULL,
  `catid` int(11) NOT NULL,
  `showhide` enum('show','hide') NOT NULL DEFAULT 'show',
  `vip` enum('1','2') NOT NULL DEFAULT '1',
  `picture` tinytext NOT NULL,
  `picturesmall` tinytext NOT NULL,
  `putdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `body`, `price`, `catid`, `showhide`, `vip`, `picture`, `picturesmall`, `putdate`) VALUES
(12, 'Подвеска "Paris"', '<p><var>Подвеска с Эйфелевой башней.</var></p>\r\n\r\n<p><var><strong>Материалы</strong>: бант из замшевого шнура,&nbsp; стеклянная бусина, фурнитура.</var></p>\r\n\r\n<p><var><strong>Длина цепочки</strong>:60 см.</var></p>\r\n', '40 000', 2, 'show', '1', '15_03_04_12_47_picture4.jpg', 's_15_03_04_12_47_picture4.jpg', '2015-03-04'),
(14, 'Подвеска "Transperancy"', '<p><var>Подвеска из горного хрусталя. </var></p>\r\n\r\n<p><var><strong>Длина цепочки: </strong>60см.</var></p>\r\n', '45 000', 2, 'show', '1', '15_03_06_11_26_picture8.jpg', 's_15_03_06_11_26_picture8.jpg', '2015-03-06'),
(16, 'Серьги "Geometry"', '<p><var>Серьги с геометрическим узором. </var></p>\r\n\r\n<p><var><strong>Материал</strong>: полимерная глина, железные основы, фурнитура.</var></p>\r\n\r\n<p><var><strong>Размер:</strong> 3,5 см.</var></p>\r\n', '40 000', 1, 'show', '1', '15_03_09_10_47_picture5.jpg', 's_15_03_09_10_47_picture5.jpg', '2015-03-09'),
(17, 'Подвеска "Swallow"', '<p><var>Подвеска с ласточкой.</var></p>\r\n\r\n<p><var><strong>Материалы</strong>: бант из атласной ленты, стеклянная бусина, фурнитура.</var></p>\r\n\r\n<p><var>Длина цепочки: 60см.</var></p>\r\n', '40 000', 2, 'show', '1', '15_03_09_10_52_picture6.jpg', 's_15_03_09_10_52_picture6.jpg', '2015-03-09'),
(19, 'Подвеска "Flying stone"', '<p><var>Подвеска</var></p>\r\n\r\n<p><var><strong>Материалы:</strong> нефритовый камень, железные крылья, фурнитура.</var></p>\r\n\r\n<p><var><strong>Длина цепочки:</strong> 60 см.</var></p>\r\n', '50 000', 2, 'show', '1', '15_03_09_11_15_picture1.jpg', 's_15_03_09_11_15_picture1.jpg', '2015-03-09'),
(20, 'Серьги "Owls"', '<p><var>Серьги с совами.</var></p>\r\n\r\n<p><var><strong>Материалы:</strong> железные подвески, стеклянные черные бусины, фурнитура. </var></p>\r\n\r\n<p><var><strong>Размер:</strong> 4,5 см.</var></p>\r\n', '45 000', 1, 'show', '1', '15_03_09_11_18_picture9.jpg', 's_15_03_09_11_18_picture9.jpg', '2015-03-09'),
(21, 'Серьги "Flower field"', '<p><var>Серьги с цветочным принтом.</var></p>\r\n\r\n<p><var><strong>Материалы</strong>: полимерная глина, фурнитура.</var></p>\r\n\r\n<p><var><strong>Размер:</strong> 4,5 см.</var></p>\r\n', '35 000', 1, 'show', '1', '15_03_09_11_20_picture2.jpg', 's_15_03_09_11_20_picture2.jpg', '2015-03-09'),
(23, 'Серьги "Scissors"', '<p><var>Серьги с ножницами.</var></p>\r\n\r\n<p><var><strong>Материалы</strong>: железные подвески, стеклянные голубые бусины, фурнитура.</var></p>\r\n\r\n<p><var><strong>Размер</strong>: 3см.</var></p>\r\n', '30 000', 1, 'show', '1', '15_03_09_11_27_20.jpg', 's_15_03_09_11_27_20.jpg', '2015-03-09'),
(24, 'Брошь "White flower"', '<p><var>Брошь с цветком.</var></p>\r\n\r\n<p><var><strong>Материалы:</strong> органза, белый мех, полупрозрачный бисер-рубка, фурнитура.</var></p>\r\n\r\n<p><var><strong>Размер:</strong> 7см.</var></p>\r\n', '60 000', 5, 'show', '1', '15_03_09_11_30_GbdOBG1gnnY.jpg', 's_15_03_09_11_30_GbdOBG1gnnY.jpg', '2015-03-09'),
(25, 'Подвеска "Aquamarine fog"', '<p><var>Подвеска.</var></p>\r\n\r\n<p><var><strong>Материалы:</strong> готовая подвеска, фурнитура.</var></p>\r\n\r\n<p><var><strong>Размер:</strong> 4,5см.</var></p>\r\n', '55 000', 2, 'show', '1', 'Array', 's_15_03_09_11_32_17.jpg', '2015-03-09');

-- --------------------------------------------------------

--
-- Структура таблицы `system_accounts`
--

CREATE TABLE IF NOT EXISTS `system_accounts` (
  `id_account` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `pass` tinytext NOT NULL,
  PRIMARY KEY (`id_account`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=27 ;

--
-- Дамп данных таблицы `system_accounts`
--

INSERT INTO `system_accounts` (`id_account`, `name`, `pass`) VALUES
(26, 'test', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` tinytext NOT NULL,
  `pass` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `putdate` date NOT NULL,
  `lastvisit` datetime NOT NULL,
  `blockunblock` enum('block','unblock') NOT NULL DEFAULT 'unblock',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `email`, `putdate`, `lastvisit`, `blockunblock`) VALUES
(1, 'abc', '123', 'abc@abc.com', '2015-03-04', '2015-03-04 09:07:01', 'unblock');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
