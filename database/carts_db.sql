-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 20 2023 г., 23:02
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `carts_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `pid` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE `message` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `number` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `message` varchar(500) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(16, 24, 'frodofedorovich', 'baukinskayporoda@gmail.com', '1223', '1223');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `number` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `method` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `total_products` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `total_price` int NOT NULL,
  `placed_on` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `payment_status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'В ожидании',
  `order_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`, `order_id`) VALUES
(64, 27, 'Егор Баукин', '89051068938', 'baukinskayporoda@gmail.com', 'Оплата при получении', 'Кв.№ 2, 4 Ефремковская 4, Иваново, Россия - 153021', ' ПИЦЦА КЕБАБ 500г  (1) ', 505, '15-May-2023', 'Завершенный', 32351),
(65, 27, 'Егор Баукин', '89051068938', 'baukinskayporoda@gmail.com', 'Оплата при получении', 'Кв.№ 2, 4 Ефремковская 4, Иваново, Россия - 153021', ' ПИЦЦА КУРИЦА ПЕСТО 550г  (1) ', 520, '15-May-2023', 'В ожидании', 61443),
(66, 27, 'Егор Баукин', '89051068938', 'baukinskayporoda@gmail.com', 'Оплата при получении', 'Кв.№ 2, 4 Ефремковская 4, Иваново, Россия - 153021', ' СПАГЕТТИ С МОРЕПРОДУКТАМИ  260г (1) ', 430, '15-May-2023', 'В ожидании', 30542),
(67, 27, 'Егор Баукин', '89051068938', 'baukinskayporoda@gmail.com', 'Оплата при получении', 'Кв.№ 2, 4 Ефремковская 4, Иваново, Россия - 153021', '  КЛАССИЧЕСКИЙ ПОКЕ С ЛОСОСЕМ 350г    (1) ', 490, '18-May-2023', 'В ожидании', 25971),
(68, 27, 'Егор Баукин', '89051068938', 'baukinskayporoda@gmail.com', 'Оплата при получении', 'Кв.№ 2, 4 Ефремковская 4, Иваново, Россия - 153021', ' ПИЦЦА МАРГАРИТА 450г (1) ', 550, '18-May-2023', 'В ожидании', 61020),
(69, 27, 'Егор Баукин', '89051068938', 'baukinskayporoda@gmail.com', 'СБП', 'Кв.№ 2, 4 Ефремковская 4, Иваново, Россия - 153021', ' ЖАРЕНЫЙ РИС С МОРЕПРОДУКТАМИ 370г (2) ', 880, '18-May-2023', 'Завершенный', 15121);

-- --------------------------------------------------------

--
-- Структура таблицы `payment`
--

CREATE TABLE `payment` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `payment`
--

INSERT INTO `payment` (`id`, `order_id`, `name`, `email`, `image`) VALUES
(16, 80244, 'Егор', 'lopashka90@mail.ru', 'images/18a4ee46df0aea9263f2533c6f96afbe.jpg\r\n'),
(17, 30593, 'Егор', 'lopashka90@mail.ru', 'images/90871b87823f7cbbcd4f5d9d3b065931.jpg'),
(18, 90001, 'shema', 'shema@mail.ru', 'images/1G-PAlsBpyw.jpg'),
(19, 15121, 'shema', 'shema@mail.ru', 'images/3b55cf415734b805d37d423e79ed90b4.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(31, ' КЛАССИЧЕСКИЙ ПОКЕ С ЛОСОСЕМ 350г   Состав - Лосось в соусе понзу, тайский рис, спайси соус, мусс из авокадо, битые огурцы, бакинские томаты, водоросли нори, чукка.', 490, '1.jpg'),
(35, 'ЖАРЕНЫЙ РИС С МОРЕПРОДУКТАМИ 370г Состав - Омлет, цветная капуста, шиитаке, рыбный соус с травами, креветочный биск. Подается с луком фри и соусом терияки-петрушка.', 440, '2.jpg'),
(36, 'ПИЦЦА КУРИЦА ПЕСТО 550г Состав - Курица, шампиньоны, моцарелла, сливочный соус, базилик, брынза, песто арахис.', 520, '3.jpg'),
(37, 'ПОКЕ С ЛОСОСЕМ И СЫРНЫМ МУССОМ 390г Состав - Лосось в соусе понзу, тайский рис, спайси соус, мусс из авокадо, сливочный мусс с копченым сулугуни, бакинские томаты, апельсин, водоросли нори, кунжут.', 490, 'trop.jpg'),
(38, 'ТРОПИЧЕСКИЙ ПОКЕ С ЛОСОСЕМ  380г  Состав - Лосось с соусом севиче и маракуйи, спайси соус, тайский рис, манго, крем из авокадо, ананас, апельсин, нори. ', 490, 'qw3e.jpg'),
(39, 'СПАГЕТТИ С МОРЕПРОДУКТАМИ  260г Состав - С соусом из рыбного демигляса и белого вина.', 430, 'спаг.jpg'),
(40, 'ЛАПША С КУРИЦЕЙ 350г Состав - Шиитаке, вешенки, шампиньоны, карамелизированная морковь, соус черный перец. Подается с миксом трав и кунжутом.', 360, 'курц.jpg'),
(41, ' COCA-COLA CLASSIC 0,5', 120, '1642575856_22-adoniu.jpg'),
(42, 'ПИЦЦА КЕБАБ 500г Состав - Котлетки из баранины, красный лук, болгарский перец, моцарелла, томатный соус, кинза.', 505, 'kebab.jpg'),
(43, 'ПИЦЦА 4 СЫРА 450Г Состав - Моцарелла, пармезан, горгондзола, творожный сыр.', 515, '4_.jpg'),
(44, 'ПИЦЦА С ЛОСОСЕМ 500г Состав - Лосось, мусс из лосося и сметаны, моцарелла, cливочный соус, руккола, шпинат.', 570, 'fish.jpg'),
(45, 'ПИЦЦА МАРГАРИТА 450г  Состав - Моцарелла, томатный соус, базилик.', 550, 'margarit.jpg'),
(46, 'ПИЦЦА СУЛУГУНИ И БЕКОН 450г Состав - Бекон, сулугуни, яйцо, картофель, сливочный соус, кинза, красный лук.', 510, 'sulug.jpg'),
(47, 'Морс вишневый 0,45л', 170, 'mors-zhivaya-yagoda-vishnya-0-45l-pic-8187-87721.jpg'),
(48, 'Морс клюквенный 0,45л', 150, 'mors-zhivaya-yagoda-klyukva-0-45l-pic-8188-70551.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `user_type` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(25, 'frodofedorovich@mail.ru', 'frodofedorovich@mail.ru', '4438f15b1c4be130f504c2b39a7d3c35', 'admin'),
(27, 'shema', 'shema@mail.ru', 'c635952f31583d472928795ef7d422c0', 'user'),
(29, 'lopashka90', 'lopashka90@mail.ru', '3991779e1aab1bdc392c1a4539cd02b1', 'user'),
(30, 'wqeqweq', 'wqeqweq@mail.ru', '1410255415ee0f809b85ede4f1123d78', 'user'),
(31, 'Егор', 'baukinskayporoda@gmail.com', '66bb49b89bb157a75a13f4050cc1f363', 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `pid` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `pid`, `name`, `price`, `image`) VALUES
(90, 27, 36, 'ПИЦЦА КУРИЦА ПЕСТО 550г', 520, '3.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT для таблицы `message`
--
ALTER TABLE `message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT для таблицы `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
