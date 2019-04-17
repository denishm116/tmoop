-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 17 2019 г., 10:23
-- Версия сервера: 8.0.12
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `taskmgr`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `short_description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `userid`, `title`, `short_description`, `description`, `img`) VALUES
(4, 72, 'уерц', 'ерцыу4ер', 'цыу4екроцуке4р', '5ca62b35284cc.jpg'),
(5, 73, 'Ирина запись', '$_SESSION[\'userid\']$_SESSION[\'userid\']', 'Ирина записьИрина записьИрина записьИрина записьИрина записьИрина записьИрина записьИрина записьИрина записьИрина запись', '5ca63098cce9a.jpg'),
(44, 71, 'https://potolkov', 'https://potolkov.net/https://potolkov.net/', 'https://potolkov.net/https://potolkov.net/https://potolkov.net/https://potolkov.net/https://potolkov.net/htwgvg', '5cae17337583e.jpg'),
(49, 74, 'fvbsavb', 'fdsbdfb ', 'sdfg bsdfgb sgfdn b febbvsafvb', '5ca74835035d9.jpg'),
(50, 73, 'bsaeb', 'eargergqe', 'arghqaerghqae3rhg', 'noimage.jpg'),
(51, 73, '4fvbafvba5запись', 'fykuyukyukyk', 'fbedfba4yk,mfyu,kmf', '5cab6ffba8a6b.jpg'),
(53, 71, 'Ирина запись2', 'Ирина запись2Ирина запись2', 'Ирина запись2Ирина запись2Ирина запись2Ирина запись2Ирина зап', '5cae191768000.jpg'),
(54, 71, 'Ирина запись  выфмыпми', 'fwasgvwg', 'bvwgrwrgbwr', '5cae177be5e28.jpg'),
(55, 71, 'фпрупк', 'фупрурп', 'фвркеифувекри', '5cae196d591a3.png'),
(56, 90, '111', 'fsdvasvbafdsvb', 'abdfvafdwbvasedfb', '5caee7669f790.jpg'),
(57, 90, 'yjtdyty', 'jtgmtyum', 'tyukjmedtyjmntm', '5caee790e19d1.png'),
(58, 71, 'rthrth', 'rhwrthwr5', 'thwrthwrthrtyhj', '5cb4cd2d090d8.jpg'),
(59, 71, 'rthrth', 'rhwrthwr5', 'thwrthwrthrtyhj', '5cb4cd9782058.jpg'),
(60, 71, 'Нормальная запись', 'Еще Тм не начал на ООП писать, но тоже с ООП провожу не мало времени)). Вот дошел до абстрактных ', 'Еще Тм не начал на ООП писать, но тоже с ООП провожу не мало времени)). Вот дошел до абстрактных классов и интерфейсов, правда еще на знаю что это, но скоро узнаю!!!\r\nТянет уже ТМ на ООП писать, но дождусь перечини требований ))\r\nХочу заметить, что ООП крутенская штука! Маленько сносит мне мозг, но мне нравиться!))', '5cb4cdcd67284.jpg'),
(61, 113, 'Нормальная ', 'А я только что закончил добавление задачи ))) Тоже сто пудов не правильно ))) Я вот не особо запоминаю', 'термины (полиморфизм, инкапсуляция), я много раз посмотрел видосы по основам ООП, и просто позапоминал как там что делается. Потом есть один видос по построению mvc каркаса, который я не мог даже повторить за автором ))) Но после того, как написал ТМ, а особенно после рефакторинга, я вкурил напроч в тот видос, запилил каркас. И теперь на его основе пилю ТМ ))) С маршрутами, все как полагается )))', '5cb4efea6ae16.jpg'),
(62, 113, 'Ирина запись; ?>', 'Еще Тм не начал на ', 'Еще Тм не начал на ООП писать, но тоже с ООП провожу не мало времени)). Вот дошел до абстрактных классов и интерфейсов, правда еще на знаю что это, но скоро узнаю!!!\r\nТянет уже ТМ на ООП писать, но дождусь перечини требований ))\r\nХочу заметить, что ООП крутенская штука! Маленько сносит мне мозг, но мне нравиться!))', '5cb62af77092c.jpg'),
(63, 113, 'Vadi', 'ну вот, постигаю дзен ООП самостоятельно, уже написал класс валидации, коннекта бд, свой построитель запро', 'ну вот, постигаю дзен ООП самостоятельно, уже написал класс валидации, коннекта бд, свой построитель запросов, начинаю потихоньку вникать в инкапсуляцию, наследование, трейты (замена множественного наследования), вот полиморфизм пока еще не пригодился) но я думаю позже при рефакторинге нужен будет) Башка конечно пухнет от кол-ва информации\r\nа вообще очень даже интересно:)\r\nпишу конечно неправильно, вроде бы надо начинать с интерфейсов, а я наоборот с самого низа начал переводить процедурку) В итоге посмотрю, что из этого выйдет)', '5cb4f01a0fd82.jpg'),
(64, 113, 'ARP-spoofing', 'ARP-spoofing — техника атаки в Ethernet сетях, позволяющая перехватывать трафик между хостами. Основана на использовании протокола ARP.', 'При использовании в распределённой ВС алгоритмов удалённого поиска существует возможность осуществления в такой сети типовой удалённой атаки «ложный объект РВС». Анализ безопасности протокола ARP показывает, что, перехватив на атакующем хосте внутри данного сегмента сети широковещательный ARP-запрос, можно послать ложный ARP-ответ, в котором объявить себя искомым хостом (например, маршрутизатором), и в дальнейшем активно контролировать сетевой трафик дезинформированного хоста, воздействуя на него по схеме «ложный объект РВС».', '5cb4f035866a3.jpg'),
(65, 113, 'Нормалэ', 'srethre', 'tgrhbwsrthth', '5cb620c9ef4d6.jpg'),
(66, 113, 'Ирина запись', 'ebebebe', 'tbebtsrnbdsrfnrn', '5cb6013c1f389.jpg'),
(67, 113, 'Ирина ', 'rhndrtynretd', 'ynjrtyjmrdtyukmfykum,fyut', '5cb620245d6b1.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(71, 'Denis', 'eglobus080@gmail.com', '698d51a19d8a121ce581499d7b701668'),
(111, 'denishm120', 'denishm129@yandex.ru', '698d51a19d8a121ce581499d7b701668'),
(112, 'Denis22', 'eglobus080@gmail.com22', '698d51a19d8a121ce581499d7b701668'),
(113, 'denishm116', 'denishm116@yandex.ru', '698d51a19d8a121ce581499d7b701668'),
(114, 'denishm117', 'denishm117@yandex.ru', '698d51a19d8a121ce581499d7b701668');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
