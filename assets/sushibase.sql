-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 20 2021 г., 10:09
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
-- База данных: `sushibase`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_roll`
--

CREATE TABLE `tbl_roll` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tbl_roll`
--

INSERT INTO `tbl_roll` (`id`, `name`, `code`, `image`, `description`, `price`) VALUES
(1, 'Капа-Маки', 'r1', 'images/kapa-maki.jpg', 'Рис, огурец', 650),
(2, 'Тори Маки', 'r2', 'images/tori_maki.jpg', 'Рис,курица,огурец', 750),
(3, 'Сливочный угорь', 'r3', 'images/slivochnyj_ugor.jpg', 'Рис,сливочный сыр, угорь', 1000),
(4, 'Эби Суши', 'r4', 'images/abi_sushi.jpg', 'Рис,креветки', 690),
(5, 'Магура Суши', 'r5', 'images/magura_sushi.jpg', 'Рис,тунец', 690),
(6, 'Сяке Суши', 'r6', 'images/syake_sushi.jpg', 'Рис,лосось', 690),
(7, 'Унаги', 'r7', 'images/unagi.jpg', 'Рис,угорь', 690),
(8, 'Америка', 'r8', 'images/amerika.jpg', 'Рис,сыр фила,огурец,лосось, угорь', 1700),
(9, 'Чикен Темпура', 'r9', 'images/chiken_tempura.jpg', 'Рис,сыр фила,куриная грудка,огурцы, чикен соус, айзберг', 1600),
(10, 'Роллы с овощами', 'r10', 'images/rolly_s_ovoshhami.jpg', 'Рис,сыр фила,огурец,помидоры,балг.перец, лист салата,зеленый лук,лосось', 1500),
(11, 'Хаманиши', 'r11', 'images/xamanishi.jpg', 'Рис,копченый угорь,королевская креветка, сливочный сыр, огурцы', 1800),
(12, 'Роллы с угрем', 'r12', 'images/rolly_s_ugrem.jpg', 'Рис,сыр фила,огурцы, угорь', 1600),
(13, 'Жареная калифорния', 'r13', 'images/zharenaya_kaliforniya.jpg', 'Рис, тобико, снежный краб,майонез,огурец', 1450),
(14, 'Роллы с лососем', 'r14', 'images/rolly_s_lososem.jpg', 'Рис, сыр фила, огурцы,лосось', 1600),
(15, 'Темпура', 'r15', 'images/tempura.jpg', 'Рис,сливочный сыр,икра,лосось', 1550),
(16, 'Планета', 'r16', 'images/planeta.jpg', 'Рис,сыр фила, лосось, огурцы лист салата', 1300),
(17, 'Филадельфия Кьюри', 'r17', 'images/filadelfiya_kyuri.jpg', 'Рис, сыр фила огурец, тобико, лосось', 1700),
(18, 'Филадельфия лайт', 'r18', 'images/filadelfiya_lajt.jpg', 'Рис,лосось,сры сливочный', 1400),
(19, 'Филадельфия', 'r19', 'images/filadelfiya.jpg', 'Рис, лосось, сыр сливочный', 1650),
(20, 'Аляска', 'r20', 'images/alyaska.jpg', 'Рис, лосось, угорь, креветки, огурец,кунжут, тобико', 1700),
(21, 'LOVE', 'r21', 'images/love.jpg', 'Рис,тунец, лосось сыр фила,тобико', 1800),
(22, 'Оригами', 'r22', 'images/origami.jpg', 'Рис, угорь,кунжут, огурец, черный тобико, икра', 1300),
(23, 'Бонита', 'r23', 'images/bonita.jpg', 'Рис,сыр фила,запеченный лосось, огурец, стружка,тунца', 1400),
(24, 'Филадельфия с креветками', 'r24', 'images/filadelfiya_s_krevetkami.jpg', 'Рис, тигровая креветка, лосось,сыр', 1900),
(25, 'Сенсей', 'r25', 'images/sensej.jpg', 'Рис,сыр фила,огурец, помидор,зеленый лук, болг.перец,салат', 1000);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_sushi`
--

CREATE TABLE `tbl_sushi` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tbl_sushi`
--

INSERT INTO `tbl_sushi` (`id`, `name`, `code`, `image`, `description`, `price`) VALUES
(1, 'Италия', 's1', 'images/italiya.jpg', 'Рис,лосось,угорь, огурец,плавленный сыр', 1500),
(2, 'Инь-Янь', 's2', 'images/in-yan.jpg', 'Рис,угорь,лосос,кунжут,тобико', 1700),
(3, 'Одессе', 's3', 'images/odesse.jpg', 'Рис,сыр фила, огурец, тунец, зеленый тобико, черный тобико', 1500),
(4, 'Калифорния', 's4', 'images/1637201997kaliforniya.jpg', 'Рис, майонез, огурец, снежный краб, тобико', 1400),
(5, 'Дракон', 's5', 'images/drakon.jpg', 'Рис, сыр фила, угорь,огурец,кунжут', 1800),
(6, 'Коко S', 's6', 'images/kokos.jpg', 'Рис, сыр фила, лосось, огурец, черный тобико, икра', 1200),
(7, 'Токио', 's7', 'images/tokio.jpg', 'Рис, сыр фила, угорь, огурец, кунжут', 1400),
(8, 'Филадельфия с овощами', 's8', 'images/filadelfiya_s_ovoshhami.jpg', 'Рис, сыр фила, огурец, помидор, болгарский перец,лист салата, зеленый лук, лосось', 1750),
(9, 'Лайт', 's9', 'images/lajt.jpg', 'Рис, соус спайс, болгарский перец, сыр сливочный, лосось', 1000),
(10, 'Сакура', 's10', 'images/sakura.jpg', 'Рис,курица,краб,майонез,огурец,зеленый лук', 1000),
(11, 'Канада', 's11', 'images/kanada.jpg', 'Рис, сыр фила, угорь, огурец, кунжут', 1900),
(12, 'Эбира', 's12', 'images/abira.jpg', 'Рис, огурец,креветки,майонез,тобико, лосось, угорь', 1800),
(13, 'Филадельфия Грин', 's13', 'images/filadelfiya_grin.jpg', 'Рис,огурец,сыр,лосось,тобико', 1400),
(14, 'Микс Маки', 's14', 'images/miks_maki.jpg', 'Рис,сыр фета, салат,болг.перец,огурец, помидоры', 1000),
(15, 'Филадельфия чикен', 's15', 'images/filadelfiya_chiken.jpg', 'Рис,сыр,курица,лосось, огурец', 1750),
(16, 'Фьюжн', 's16', 'images/fyuzhn.jpg', 'Рис,соус спайс,сыр сливочный,лосось, крабь,тобико,кунжут', 1300),
(17, 'Калифорния Микс', 's17', 'images/kaliforniya_miks.jpg', 'Рис,сыр фила, огурец, тунец, зеленый тобико, черный тобико', 1450),
(18, 'Цезарь', 's18', 'images/cezar.jpg', 'Рис,копченая курица,огурец,соус,кунжут, салат', 1200),
(19, 'Филафорния', 's19', 'images/filadelfiya.jpg', 'Pис, сыр фила, лосось, снежный краб, тобико, лосось', 1800),
(20, 'Филадельфия с икрой', 's20', 'images/filadelfiya_s_ikroj.jpg', 'Рис,сыр фила,икра,майонез, лосось, зеленый лук', 1800),
(21, 'Эби Темпура', 's21', 'images/abi_tempura.jpg', 'Рис,креветки,огурец,спайс соус,лист салат', 1450),
(22, 'Лас-Вегас', 's22', 'images/las-vegas.jpg', 'Рис,сыр фила, краб,лосось,тунец,соус унаги', 1800),
(23, 'Ролл с Тунцом', 's23', 'images/roll_s_tuncom.jpg', 'Рис, тунец', 1000),
(24, 'Капа-Маки', 's24', 'images/kapa-maki.jpg', 'Рис, огурец', 650);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(14, 'Nurda', 'nurad@gmail.com', '9414ebf749446da029bc16087973ec1f');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tbl_roll`
--
ALTER TABLE `tbl_roll`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- Индексы таблицы `tbl_sushi`
--
ALTER TABLE `tbl_sushi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tbl_roll`
--
ALTER TABLE `tbl_roll`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT для таблицы `tbl_sushi`
--
ALTER TABLE `tbl_sushi`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
