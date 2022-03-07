-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 07 2022 г., 07:15
-- Версия сервера: 10.4.21-MariaDB
-- Версия PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `products`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `teaser_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `label`, `teaser_text`) VALUES
(1, 'Мужская одежка', 'Описание для категории мужской одежды'),
(2, 'Мужские костюмы', 'Описание для категории мужских костюмов'),
(3, 'Мужские брюки', 'Описание для категории мужских брюки'),
(4, 'Женская одежка', 'Описание для категории женской одежды'),
(5, 'Мужские носки', 'Описание для категории мужских носков'),
(6, 'Жилеты', 'Описание для категории жилеты'),
(7, 'Женские толстовки и свитшоты', 'Описание для категории женские толстовки и свитшоты'),
(8, 'Женская верхняя одежда', 'Описание для категории женской верхней одежды'),
(9, 'Платья', 'Описание для категории платьев'),
(10, 'Женские костюмы', 'Описание для категории женских костюмов');

-- --------------------------------------------------------

--
-- Структура таблицы `field_categories`
--

CREATE TABLE `field_categories` (
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `field_categories`
--

INSERT INTO `field_categories` (`pid`, `cid`) VALUES
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(7, 4),
(8, 4),
(9, 4),
(10, 4),
(11, 4),
(12, 4),
(13, 4),
(14, 4),
(15, 4),
(16, 4),
(17, 1),
(18, 1),
(20, 1),
(20, 6),
(21, 1),
(22, 1),
(22, 6),
(23, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `field_images`
--

CREATE TABLE `field_images` (
  `pid` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `field_images`
--

INSERT INTO `field_images` (`pid`, `image_id`) VALUES
(1, 2),
(1, 5),
(2, 10),
(3, 3),
(4, 4),
(5, 7),
(6, 8),
(7, 1),
(8, 3),
(8, 4),
(9, 7),
(10, 9),
(11, 1),
(12, 3),
(13, 5),
(14, 7),
(15, 9),
(16, 1),
(17, 3),
(18, 5),
(19, 7),
(20, 9),
(21, 1),
(22, 3),
(23, 5),
(24, 7),
(25, 9),
(26, 1),
(27, 3),
(28, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `field_main_categories`
--

CREATE TABLE `field_main_categories` (
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `field_main_categories`
--

INSERT INTO `field_main_categories` (`pid`, `cid`) VALUES
(1, 1),
(2, 8),
(3, 8),
(4, 8),
(5, 8),
(6, 8),
(7, 8),
(8, 8),
(9, 8),
(10, 8),
(11, 8),
(12, 8),
(13, 8),
(14, 8),
(15, 9),
(16, 7),
(17, 3),
(18, 3),
(19, 1),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `field_main_images`
--

CREATE TABLE `field_main_images` (
  `pid` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `field_main_images`
--

INSERT INTO `field_main_images` (`pid`, `image_id`) VALUES
(1, 1),
(2, 9),
(3, 1),
(4, 2),
(5, 6),
(6, 5),
(7, 3),
(8, 2),
(9, 1),
(10, 8),
(11, 10),
(12, 2),
(13, 4),
(14, 6),
(15, 8),
(16, 10),
(17, 2),
(18, 4),
(19, 6),
(20, 8),
(21, 10),
(22, 2),
(23, 4),
(24, 6),
(25, 8),
(26, 8),
(27, 2),
(28, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(512) NOT NULL,
  `birth_year` int(11) NOT NULL,
  `gender` enum('Мужской','Женский') NOT NULL,
  `subject` varchar(512) NOT NULL,
  `text` text NOT NULL,
  `agree` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `form`
--

INSERT INTO `form` (`id`, `name`, `email`, `birth_year`, `gender`, `subject`, `text`, `agree`) VALUES
(56, 'ываыва', 'info.denisbronnikov@gmail.com', 1949, 'Мужской', 'dfgfdg', 'fdgdfgdfgfgdgdfgdfg', 1),
(57, 'aaaa', 'info.denisbronnikov@gmail.com', 1958, 'Женский', 'sdfsdfsdf', 'sdfsdfsdfsdfsdf', 1),
(58, 'aaaa', 'info.denisbronnikov@gmail.com', 1958, 'Женский', 'jkljkljlk', 'kjlkjlkjlkjkljlkjlkjlk', 1),
(59, 'asdasdasd', 'asd@gmail.com', 2000, 'Мужской', 'sada', 'asdasdasdasdsadasdasdasd', 1),
(60, 'asdasdasd', 'asd@gmail.com', 2002, 'Женский', 'asdasd', 'asdasdasdasdasdsadsadasdasd', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `file_path` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `alt`, `file_path`) VALUES
(1, 'Картинка 1', '/img/01.png'),
(2, 'Картинка 2', '/img/02.png'),
(3, 'Картинка 3', '/img/03.png'),
(4, 'Картинка 4', '/img/04.png'),
(5, 'Картинка 5', '/img/05.png'),
(6, 'Картинка 6', '/img/06.png'),
(7, 'Картинка 7', '/img/07.png'),
(8, 'Картинка 8', '/img/08.png'),
(9, 'Картинка 9', '/img/09.png'),
(10, 'Картинка 10', '/img/10.png');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `status` enum('ENABLE','DISABLE') NOT NULL,
  `price` int(11) NOT NULL,
  `original_price` int(11) NOT NULL,
  `promo_price` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `label`, `status`, `price`, `original_price`, `promo_price`, `description`) VALUES
(1, 'Серое удлиненное пальто Other fluence', 'ENABLE', 2500, 2500, 2000, 'Большое, красивое описание серого удлинненного пальто'),
(2, 'Женская куртка с принтом, гоночный костюм', 'ENABLE', 3700, 3800, 3000, 'Размеры M: обхват груди: 124 см, длина: 69 см, ширина плеч: 58 см L: обхват груди: 128 см, длина: 70,5 см, ширина плеч: 60 см XL: обхват груди: 132 см, длина: 72 см, ширина плеч: 62 см 2XL: обхват груди: 136 см, длина: 73,5 см, ширина плеч: 64 см'),
(3, 'Серое удлиненное пальто Other fluence', 'ENABLE', 2500, 2500, 2000, 'Большое, красивое описание серого удлинненного пальто'),
(4, 'Женская куртка в стиле ретро Y2K с буквенным принтом', 'ENABLE', 2634, 2700, 2500, 'аниме, свободная бейсбольная униформа для пары, американская уличная куртка в стиле Харадзюку, утепленная куртка'),
(5, 'Зимняя женская меховая куртка с поясом на молнии', 'ENABLE', 7500, 7500, 6000, 'свободная теплая утепленная куртка из овечьей шерсти, винтажная Женская шикарная мотоциклетная куртка из искусственной кожи с локомотивным лацканом'),
(6, 'Куртка-бомбер Женская Весенняя', 'ENABLE', 3500, 3500, 3000, 'большого размера, на пуговицах, с карманами и длинными рукавами'),
(7, 'Зимние длинные пуховики большого размера', 'ENABLE', 4500, 4500, 4000, '2022, женское повседневное Модное теплое пальто, зеленая куртка для Франции, роскошный фирменный дизайн eden'),
(8, 'Женская парка', 'ENABLE', 2250, 2250, 1750, 'женский корейский пуховик, бежевая, черная хлопковая Повседневная утепленная Длинная зимняя куртка на пуговицах, 2022'),
(9, 'Куртка Бейсбольная женская с принтом', 'ENABLE', 2500, 2500, 2000, 'Куртка Бейсбольная женская с принтом, брендовая Тонкая Повседневная Свободная куртка-бомбер с карманами, на пуговицах, джинсовая куртка'),
(10, 'Куртка-бомбер женская осенне-зимняя', 'ENABLE', 2500, 2500, 2000, 'Куртка-бомбер женская осенне-зимняя, теплая, однобортная, 2021'),
(11, 'Женский шерстяной кардиган', 'ENABLE', 3615, 3615, 2400, 'ВИНТАЖНАЯ ДЖИНСОВАЯ КУРТКА оверсайз с отложным воротником и карманами, длинная теплая зимняя верхняя одежда'),
(12, 'Куртка-бомбер YICIYA', 'ENABLE', 2500, 2500, 2000, 'Куртка-бомбер YICIYA, Женская куртка, винтажная куртка с буквенным принтом, повседневная куртка-бомбер с длинным рукавом, осенняя бейсбольная куртка оверсайз'),
(13, 'HaiLuoZi 2022 весна осень', 'ENABLE', 2500, 2500, 2000, 'HaiLuoZi 2022 весна осень Женская куртка с капюшоном теплое Женское пальто короткая женская парка высокое качество био хлопок Верхняя одежда 7083'),
(14, 'Осень 2021, Женская куртка с капюшоном', 'ENABLE', 5500, 5500, 5000, 'Осень 2021, Женская куртка с капюшоном, Повседневная ветровка с длинным рукавом и карманами на молнии, базовые куртки, верхняя одежда женская 4XL E25'),
(15, 'Осенне-зимнее женское ретро платье', 'ENABLE', 10500, 10500, 10000, 'С высоким воротом шикарная на пуговицах свитер до колена юбка на талии теплое и мягкое вязаное платье OL'),
(16, 'Женское вязаное платье-свитер', 'ENABLE', 2500, 2500, 2000, 'С высокой эластичной талией, повседневное облегающее мини-платье с вырезами, 4 цвета, Осень-зима'),
(17, 'Новые брюки-карго, брюки для мужчин', 'ENABLE', 3500, 3500, 3000, 'Новые брюки-карго, брюки для мужчин, Военный стиль, тактические хлопковые комбинезоны, мужские свободные прямые спортивные штаны с несколькими карманами PA1228'),
(18, 'Брюки-карго мужские', 'ENABLE', 3500, 3500, 3000, 'Брюки-карго мужские, в Корейском стиле, спортивные, в стиле хип-хоп'),
(19, 'Бомбер мужской, ветровка в стиле хип-хоп', 'ENABLE', 4500, 4500, 4000, 'Бомбер мужской, ветровка в стиле хип-хоп, Повседневная Верхняя одежда 2018, весна-осень 692'),
(20, 'Мужской облегающий смокинг', 'ENABLE', 8500, 8500, 8000, 'Мужской облегающий смокинг для чудесного жениха зеленого цвета, мужская деловая одежда для работы, костюмы, комплект из 3 предметов (пиджак + брюки + жилет)'),
(21, 'Мужской деловой костюм', 'ENABLE', 2500, 2500, 2000, 'Мужской деловой костюм из 3 предметов, мужское свадебное платье в клетку (пиджак + жилет + брюки), деловая официальная одежда, занятия'),
(22, 'Новинка Весна 2021, модный мужской Клетчатый костюм', 'ENABLE', 8500, 8500, 8000, 'Новинка Весна 2021, модный мужской Клетчатый костюм для отдыха в стиле джентльмена, английский простой костюм для жениха из 3 предметов + брюки + жилет 5xl'),
(23, 'Новинка, рубашка-поло, мужская хлопковая деловая', 'ENABLE', 4500, 4500, 4000, 'Новинка, рубашка-поло, мужская хлопковая деловая Повседневная рубашка-поло с отложным воротником и вышивкой, летняя Облегающая рубашка-поло для гольфа с короткими рукавами, брендовая одежда'),
(24, 'Вязаная футболка с жемчужными бусинами', 'ENABLE', 1500, 1500, 1000, 'Вязаная футболка с жемчужными бусинами, топы, женские летние пуловеры с коротким рукавом и отложным воротником, однотонная облегающая корейская модная женская футболка'),
(25, 'Рубашка-поло мужская классическая из хлопка', 'ENABLE', 1500, 1500, 1000, 'Рубашка-поло мужская классическая из хлопка, на молнии, размера плюс, 5XL, 6XL, лето 2021 г., новая мужская деловая Повседневная, дышащая футболка-поло'),
(26, 'Летняя мужская рубашка-поло', 'ENABLE', 2500, 2500, 2000, 'Летняя мужская рубашка-поло, недорогая Повседневная рубашка с коротким рукавом и логотипом персональной компании, мужская и женская рубашка-поло на заказ, 101'),
(27, 'Красное удлиненное пальто Other fluence', 'DISABLE', 2500, 2500, 2000, 'Большое, красивое описание красного удлинненного пальто'),
(28, 'Желтое удлиненное пальто Other fluence', 'DISABLE', 2500, 2500, 2000, 'Большое, красивое описание желтого удлинненного пальто');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `field_categories`
--
ALTER TABLE `field_categories`
  ADD PRIMARY KEY (`pid`,`cid`),
  ADD KEY `Field_categories_fk1` (`cid`);

--
-- Индексы таблицы `field_images`
--
ALTER TABLE `field_images`
  ADD PRIMARY KEY (`pid`,`image_id`),
  ADD KEY `field_images_fk1` (`image_id`);

--
-- Индексы таблицы `field_main_categories`
--
ALTER TABLE `field_main_categories`
  ADD PRIMARY KEY (`pid`,`cid`),
  ADD KEY `Field_main_categories_fk1` (`cid`);

--
-- Индексы таблицы `field_main_images`
--
ALTER TABLE `field_main_images`
  ADD PRIMARY KEY (`pid`,`image_id`),
  ADD KEY `field_main_images_fk1` (`image_id`);

--
-- Индексы таблицы `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `field_categories`
--
ALTER TABLE `field_categories`
  ADD CONSTRAINT `Field_categories_fk0` FOREIGN KEY (`pid`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `Field_categories_fk1` FOREIGN KEY (`cid`) REFERENCES `categories` (`id`);

--
-- Ограничения внешнего ключа таблицы `field_images`
--
ALTER TABLE `field_images`
  ADD CONSTRAINT `field_images_fk0` FOREIGN KEY (`pid`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `field_images_fk1` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`);

--
-- Ограничения внешнего ключа таблицы `field_main_categories`
--
ALTER TABLE `field_main_categories`
  ADD CONSTRAINT `Field_main_categories_fk0` FOREIGN KEY (`pid`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `Field_main_categories_fk1` FOREIGN KEY (`cid`) REFERENCES `categories` (`id`);

--
-- Ограничения внешнего ключа таблицы `field_main_images`
--
ALTER TABLE `field_main_images`
  ADD CONSTRAINT `field_main_images_fk0` FOREIGN KEY (`pid`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `field_main_images_fk1` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
