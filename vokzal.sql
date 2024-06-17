-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 17 2024 г., 11:04
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `vokzal`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`full_name`, `login`, `password`) VALUES
('Зайцева Юлия Владимировна', 'admin1', 'admin1');

-- --------------------------------------------------------

--
-- Структура таблицы `captcha`
--

CREATE TABLE `captcha` (
  `id` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `captcha`
--

INSERT INTO `captcha` (`id`, `url`, `text`) VALUES
('1', 'https://i.stack.imgur.com/Uo4B2.jpg', '18746');

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `№ Билета` int NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `билеты` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`№ Билета`, `user`, `билеты`, `date`) VALUES
(15, 'sofiyaK', '5', '');

-- --------------------------------------------------------

--
-- Структура таблицы `galery`
--

CREATE TABLE `galery` (
  `id` int NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `galery`
--

INSERT INTO `galery` (`id`, `url`) VALUES
(1, 'https://sun9-30.userapi.com/impf/05IntbtgBSzTUyAb5EokEPxcEcDZ2btwAY4rcw/3FoXa2ZmfQw.jpg?size=1248x806&quality=96&sign=0d574ad811b919cc2466294a09af7e72&c_uniq_tag=RKfMOYK3Jrk-ETjp9eURsgO76BY35zWwIZbT5RVmXjQ&type=album'),
(3, 'https://26528.selcdn.ru/irkmo.ru-upload/iblock/bd5/bd57ed05891eb2dee48cf735e430a126/6f456ce1_d9e7_4759_ba97_50b8966c0f19_1_.jpg'),
(5, 'https://o-tendencii.com/uploads/posts/2023-04/1681003957_o-tendencii-com-p-korporativnii-stil-odezhdi-oao-rzhd-foto-34.jpg'),
(2, 'https://svzd.rzd.ru/api/media/resources/1700199'),
(4, 'https://api.riamo.multiadminka.ru/get_resized/K9HhBfYw6AM1OtjNt0t5d3Nk-BU=/1920x1080/filters:focal(0.5:0.5):format(webp)/YXJ0aWNsZXMvaW1hZ2UvMjAxNS83L2RjL2I5L2RqYi5qcGc.webp'),
(6, 'https://anna-news.info/wp-content/uploads/2017/12/rzhd-train.jpg'),
(7, 'https://kartinki.pics/uploads/posts/2022-02/1645712036_1-kartinkin-net-p-kartinki-poezdov-1.jpg'),
(8, 'https://s2.stc.all.kpcdn.net/russia/wp-content/uploads/2022/06/turisticheskij-poezd-bajkalskaya-skazka-sostav.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `кассы`
--

CREATE TABLE `кассы` (
  `№ Кассы` int NOT NULL,
  `Время работы` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `кассы`
--

INSERT INTO `кассы` (`№ Кассы`, `Время работы`) VALUES
(1, '3 часа'),
(2, '4 часа'),
(3, '2 часа'),
(4, '6 часов'),
(5, '2 часа');

-- --------------------------------------------------------

--
-- Структура таблицы `пассажиры`
--

CREATE TABLE `пассажиры` (
  `Код Пассажира` int NOT NULL,
  `ФИО Пассажира` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Пол` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Дата рождения` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Паспорт` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Номер телефона` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Эл. почта` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `пассажиры`
--

INSERT INTO `пассажиры` (`Код Пассажира`, `ФИО Пассажира`, `Пол`, `Дата рождения`, `Паспорт`, `Номер телефона`, `Эл. почта`, `login`, `password`, `date`) VALUES
(1, 'Кондратьева София Павловна', 'Ж', '2006-10-20', '1416 244119', '+79818110177', 'sofiya_post@mail.ru', 'sofiyaK', 'kkkkkk', '17:59 20-04-2024'),
(2, 'Иванова Дарья Константиновна', 'Ж', '2019-03-20', '8021 296331', '+79173728109', 'daryaI_01@gmail.com', 'darya', 'iiiiiii', '15:03 20-04-2024'),
(3, 'Рахуба Сергей Алексеевич', 'М', '2002-07-20', '2936 103856', '+79810721979', 'liasl_@yandex.ru', 'sergey', 'ssssss', '21:10 01-06-2024'),
(4, 'Рощупкина София Евгеньевна', 'Ж', '2022-02-20', '8123 654738', '+79112845732', 'roschupa02@mail.ru', 'sofiyaR', 'rrrrrr', '09:44 22-05-2024'),
(5, 'Пискленов Тимофей Александрович', 'М', '2002-05-20', '1589 274365', '+79173759128', 'pocket_brain@gmail.com', 'timaP', 'tttttt', '12:12 13-05-2024'),
(6, 'Яковлева Екатерина Олеговна', 'Ж', '2000-12-14', '7891 108227', '+79221008833', 'katya1214yakov@yandex.ru', 'katya', 'yyyyyy', '23:25 30-04-2024');

-- --------------------------------------------------------

--
-- Структура таблицы `поезда`
--

CREATE TABLE `поезда` (
  `№ Поезда` int NOT NULL,
  `Тип поезда` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `поезда`
--

INSERT INTO `поезда` (`№ Поезда`, `Тип поезда`) VALUES
(1, 'Скоростной'),
(2, 'Фирменный'),
(3, 'Ласточка'),
(4, 'Фирменный'),
(5, 'Скоростной');

-- --------------------------------------------------------

--
-- Структура таблицы `предоставляют услуги`
--

CREATE TABLE `предоставляют услуги` (
  `Код Сотрудника` int NOT NULL,
  `Код Пассажира` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `предоставляют услуги`
--

INSERT INTO `предоставляют услуги` (`Код Сотрудника`, `Код Пассажира`) VALUES
(1, 4),
(2, 2),
(3, 5),
(4, 1),
(5, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `билеты`
--

CREATE TABLE `билеты` (
  `№ Билета` int NOT NULL,
  `Тип вагона` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Дата/Время отправления` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Дата/Время прибытия` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Откуда` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Куда` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Время в пути` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Номер вагона` int NOT NULL,
  `Место` int NOT NULL,
  `Наличие багажа` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Цена` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `№ Кассы` int NOT NULL,
  `Код Пассажира` int NOT NULL,
  `№ Поезда` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `билеты`
--

INSERT INTO `билеты` (`№ Билета`, `Тип вагона`, `Дата/Время отправления`, `Дата/Время прибытия`, `Откуда`, `Куда`, `Время в пути`, `Номер вагона`, `Место`, `Наличие багажа`, `Цена`, `№ Кассы`, `Код Пассажира`, `№ Поезда`) VALUES
(1, 'Плацкарт', '2024-02-18 20:46:00', '2024-02-19 01:06:00', 'Санкт-Петербург', 'Москва', '6 часов', 7, 42, 'Да', '3000 руб.', 4, 1, 2),
(2, 'Сидячее', '2024-03-17 15:51:00', '2024-03-17 19:41:00', 'Санкт-Петербург', 'Псков', '4 часа', 2, 23, 'Нет', '970 руб.', 5, 3, 3),
(3, 'Купе', '2024-03-12 02:00:00', '2024-03-13 05:09:00', 'Сочи', 'Волгоград', '27 часов', 11, 16, 'Да', '5990 руб.', 3, 2, 1),
(4, 'Плацкарт', '2024-03-13 10:23:00', '2024-03-18 15:57:35', 'Москва', 'Краснодар', '30 часов', 4, 39, 'Нет', '7000 руб.', 1, 5, 5),
(5, 'Сидячее', '2024-03-18 06:02:00', '2024-03-18 08:10:00', 'Санкт-Петербург', 'Выборг', '2 часа', 8, 4, 'Нет', '680 руб.', 2, 4, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `обслуживают`
--

CREATE TABLE `обслуживают` (
  `№ Кассы` int NOT NULL,
  `Код Пассажира` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `обслуживают`
--

INSERT INTO `обслуживают` (`№ Кассы`, `Код Пассажира`) VALUES
(1, 5),
(2, 4),
(3, 2),
(4, 1),
(5, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `сотрудники`
--

CREATE TABLE `сотрудники` (
  `Код Сотрудника` int NOT NULL,
  `ФИО Сотрудника` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Должность` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `График работы` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `сотрудники`
--

INSERT INTO `сотрудники` (`Код Сотрудника`, `ФИО Сотрудника`, `Должность`, `График работы`) VALUES
(1, 'Сорокин Андрей Владимирович', 'Кассир', '2/2'),
(2, 'Бондарева Светлана Николаевна ', 'Уборщица', '5/2'),
(3, 'Утин Владимир Владимирович', 'Проводник', '3/1'),
(4, 'Облепихова Жанна Эдуардовна', 'Кассир', '2/2'),
(5, 'Метлицкая Мария Михайловна', 'Кассир', '5/2');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`№ Билета`);

--
-- Индексы таблицы `кассы`
--
ALTER TABLE `кассы`
  ADD PRIMARY KEY (`№ Кассы`);

--
-- Индексы таблицы `пассажиры`
--
ALTER TABLE `пассажиры`
  ADD PRIMARY KEY (`Код Пассажира`);

--
-- Индексы таблицы `поезда`
--
ALTER TABLE `поезда`
  ADD PRIMARY KEY (`№ Поезда`);

--
-- Индексы таблицы `предоставляют услуги`
--
ALTER TABLE `предоставляют услуги`
  ADD PRIMARY KEY (`Код Пассажира`),
  ADD UNIQUE KEY `Код Сотрудника` (`Код Сотрудника`),
  ADD KEY `Код Пассажира` (`Код Пассажира`);

--
-- Индексы таблицы `билеты`
--
ALTER TABLE `билеты`
  ADD PRIMARY KEY (`№ Билета`),
  ADD KEY `№ Кассы` (`№ Кассы`,`Код Пассажира`,`№ Поезда`),
  ADD KEY `Код Пассажира` (`Код Пассажира`),
  ADD KEY `№ Поезда` (`№ Поезда`);

--
-- Индексы таблицы `обслуживают`
--
ALTER TABLE `обслуживают`
  ADD PRIMARY KEY (`Код Пассажира`),
  ADD UNIQUE KEY `№ Кассы` (`№ Кассы`),
  ADD KEY `Код Пассажира` (`Код Пассажира`);

--
-- Индексы таблицы `сотрудники`
--
ALTER TABLE `сотрудники`
  ADD PRIMARY KEY (`Код Сотрудника`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `№ Билета` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `пассажиры`
--
ALTER TABLE `пассажиры`
  MODIFY `Код Пассажира` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `поезда`
--
ALTER TABLE `поезда`
  MODIFY `№ Поезда` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `предоставляют услуги`
--
ALTER TABLE `предоставляют услуги`
  MODIFY `Код Пассажира` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `билеты`
--
ALTER TABLE `билеты`
  MODIFY `№ Билета` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `обслуживают`
--
ALTER TABLE `обслуживают`
  MODIFY `Код Пассажира` int NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `предоставляют услуги`
--
ALTER TABLE `предоставляют услуги`
  ADD CONSTRAINT `предоставляют услуги_ibfk_1` FOREIGN KEY (`Код Сотрудника`) REFERENCES `сотрудники` (`Код Сотрудника`);

--
-- Ограничения внешнего ключа таблицы `обслуживают`
--
ALTER TABLE `обслуживают`
  ADD CONSTRAINT `обслуживают_ibfk_1` FOREIGN KEY (`№ Кассы`) REFERENCES `кассы` (`№ Кассы`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
