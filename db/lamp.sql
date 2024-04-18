-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: database
-- Время создания: Апр 12 2024 г., 10:35
-- Версия сервера: 5.7.29
-- Версия PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lamp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `basket_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `basket_goods`
--

CREATE TABLE `basket_goods` (
  `basket_id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `category_goods`
--

CREATE TABLE `category_goods` (
  `category_id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `chapter`
--

CREATE TABLE `chapter` (
  `chapter_id` int(11) NOT NULL,
  `chapter_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `chapter_goods`
--

CREATE TABLE `chapter_goods` (
  `chapter_id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `price` text NOT NULL,
  `img` text NOT NULL,
  `discr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `title`, `price`, `img`, `discr`) VALUES
(1, 'Iphone 14 Pro Max', '99 000', '1.jpg', 'Новый телефон.'),
(2, 'Iphone 13 Pro Max', '89 000', '1.jpg', 'Новый телефон.'),
(3, 'Iphone 12 Pro Max', '49 000', '1.jpg', 'Новый телефон.'),
(4, 'Iphone 11 Pro', '39 990', '1.jpg', 'Новый телефон.'),
(5, 'Iphone 10 Xr', '11 990', '1.jpg', 'Новый телефон.');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

SELECT order_id, date_order FROM orders, order_goods WHERE id = 3 ORDER BY date_order DESC

-- --------------------------------------------------------

--
-- Структура таблицы `order_goods`
--

CREATE TABLE `order_goods` (
  `order_id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `password`) VALUES
(0, 'admin', 'admin@mail.ru', 'uploads/avatar_1712407191.jpg', '$2y$10$dCmVczovVJKZFUybLZEOWes77upi4dYExozmvhwkR4XHgvfCR27Bq'),
(1, 'kostya', 'rodion@mail.ru', 'uploads/avatar_1712163618.jpg', '$2y$10$NZDxviSmHO5HYsZEIewwieT0/ZZHwVngK8b.FumU1kLoI9asE.E8q'),
(2, 'KostyAAA', 'rodionov@mail.ru', 'uploads/avatar_1712652478.jpg', '$2y$10$I9CMwDIFqMm/Ys3nzlqRI.hRh1MNKPU46tpQopZTnJIZuPzu.Y5wS');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`basket_id`);

--
-- Индексы таблицы `basket_goods`
--
ALTER TABLE `basket_goods`
  ADD PRIMARY KEY (`basket_id`,`goods_id`),
  ADD KEY `goods_id` (`goods_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `category_goods`
--
ALTER TABLE `category_goods`
  ADD PRIMARY KEY (`category_id`,`goods_id`),
  ADD KEY `goods_id` (`goods_id`);

--
-- Индексы таблицы `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`chapter_id`);

--
-- Индексы таблицы `chapter_goods`
--
ALTER TABLE `chapter_goods`
  ADD PRIMARY KEY (`chapter_id`,`goods_id`),
  ADD KEY `goods_id` (`goods_id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `order_goods`
--
ALTER TABLE `order_goods`
  ADD PRIMARY KEY (`order_id`,`goods_id`),
  ADD KEY `goods_id` (`goods_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `basket_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `chapter`
--
ALTER TABLE `chapter`
  MODIFY `chapter_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket_goods`
--
ALTER TABLE `basket_goods`
  ADD CONSTRAINT `basket_goods_ibfk_1` FOREIGN KEY (`basket_id`) REFERENCES `basket` (`basket_id`),
  ADD CONSTRAINT `basket_goods_ibfk_2` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`);

--
-- Ограничения внешнего ключа таблицы `category_goods`
--
ALTER TABLE `category_goods`
  ADD CONSTRAINT `category_goods_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `category_goods_ibfk_2` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`);


--
-- Ограничения внешнего ключа таблицы `chapter_goods`
--
ALTER TABLE `chapter_goods`
  ADD CONSTRAINT `chapter_goods_ibfk_1` FOREIGN KEY (`chapter_id`) REFERENCES `chapter` (`chapter_id`),
  ADD CONSTRAINT `chapter_goods_ibfk_2` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`);

--
-- Ограничения внешнего ключа таблицы `order_goods`
--
ALTER TABLE `order_goods`
  ADD CONSTRAINT `order_goods_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_goods_ibfk_2` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`);
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
