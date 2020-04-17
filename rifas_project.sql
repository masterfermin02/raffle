-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-02-2019 a las 01:48:21
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rifas_project`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raffle`
--

CREATE TABLE `raffle` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `header_image` varchar(255) NOT NULL,
  `right_lateral_image` varchar(255) NOT NULL,
  `left_lateral_image` varchar(255) NOT NULL,
  `footer_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `active` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `raffle`
--

INSERT INTO `raffle` (`id`, `name`, `logo`, `header_image`, `right_lateral_image`, `left_lateral_image`, `footer_image`, `created_at`, `updated_at`, `deleted_at`, `active`) VALUES
(3, 'Hola', '15506125060e9f2f1b31202bf4c466dc8c0cbd143f.jpg', '155061250656cfb007f4f704f8b58f7d93e0806ae3.jpg', '1550612506c9dcf986c256a6e93358b45635b222d9.jpg', '155061250657e2e84bc00bc8fafc709bb7c9acbb2f.jpg', '15506125060aaf676b6c0aa83026d3ebb6646af779.jpg', '2019-02-19 23:20:44', '2019-02-19 23:20:44', NULL, 0),
(4, 'Rifa 2', '1550612540a5781a3648629dcbc6773d916e03c55f.jpg', '15506125403fca92f849203949a6f67ad7bc02c770.jpg', '155061254056cfb007f4f704f8b58f7d93e0806ae3.jpg', '155061254097265eef8034e52271976d98266929f7.jpg', '15506125400aaf676b6c0aa83026d3ebb6646af779.jpg', '2019-02-19 21:57:21', '2019-02-19 21:57:21', NULL, 0),
(5, 'Test3', '1550618429a5781a3648629dcbc6773d916e03c55f.jpg', '15506184290aaf676b6c0aa83026d3ebb6646af779.jpg', '155061842956cfb007f4f704f8b58f7d93e0806ae3.jpg', '15506184293fca92f849203949a6f67ad7bc02c770.jpg', '155061842997265eef8034e52271976d98266929f7.jpg', '2019-02-20 00:22:06', '2019-02-20 00:22:06', NULL, 0),
(6, 'Funcional01', '15506219150aaf676b6c0aa83026d3ebb6646af779.jpg', '', '', '', '', '2019-02-20 00:18:35', '2019-02-20 00:18:35', NULL, 0),
(9, 'Funcional03', '1550622113d4c17d48d9e0a5ac9986887163f435ec.jpg', '', '', '', '', '2019-02-20 00:22:06', '2019-02-20 00:22:06', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raffle_details`
--

CREATE TABLE `raffle_details` (
  `id` int(11) NOT NULL,
  `content_type` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `raffle_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `raffle_details`
--

INSERT INTO `raffle_details` (`id`, `content_type`, `content`, `raffle_id`) VALUES
(10, 'image', 'a5781a3648629dcbc6773d916e03c55f1550585788.jpg', 2),
(11, 'image', '0aaf676b6c0aa83026d3ebb6646af7791550585788.jpg', 2),
(12, 'image', '0e9f2f1b31202bf4c466dc8c0cbd143f1550585788.jpg', 2),
(13, 'image', '3fca92f849203949a6f67ad7bc02c7701550585788.jpg', 2),
(14, 'image', 'c9dcf986c256a6e93358b45635b222d91550585788.jpg', 2),
(15, 'image', '56cfb007f4f704f8b58f7d93e0806ae31550585788.jpg', 2),
(16, 'image', '57e2e84bc00bc8fafc709bb7c9acbb2f1550585788.jpg', 2),
(17, 'image', 'e6f5dd69be1562d0fa64a44aeba33ce81550585788.jpg', 2),
(18, 'image', 'a5781a3648629dcbc6773d916e03c55f1550612506.jpg', 3),
(19, 'image', '0aaf676b6c0aa83026d3ebb6646af7791550612506.jpg', 3),
(20, 'image', '0e9f2f1b31202bf4c466dc8c0cbd143f1550612506.jpg', 3),
(21, 'image', '3fca92f849203949a6f67ad7bc02c7701550612506.jpg', 3),
(22, 'image', 'c9dcf986c256a6e93358b45635b222d91550612506.jpg', 3),
(23, 'image', '56cfb007f4f704f8b58f7d93e0806ae31550612506.jpg', 3),
(24, 'image', '57e2e84bc00bc8fafc709bb7c9acbb2f1550612506.jpg', 3),
(25, 'image', '97265eef8034e52271976d98266929f71550612506.jpg', 3),
(26, 'image', 'e6f5dd69be1562d0fa64a44aeba33ce81550612506.jpg', 3),
(27, 'image', 'a5781a3648629dcbc6773d916e03c55f1550612540.jpg', 4),
(28, 'image', '0aaf676b6c0aa83026d3ebb6646af7791550612540.jpg', 4),
(29, 'image', '0e9f2f1b31202bf4c466dc8c0cbd143f1550612540.jpg', 4),
(30, 'image', '3fca92f849203949a6f67ad7bc02c7701550612540.jpg', 4),
(31, 'image', 'c9dcf986c256a6e93358b45635b222d91550612540.jpg', 4),
(32, 'image', '56cfb007f4f704f8b58f7d93e0806ae31550612540.jpg', 4),
(33, 'image', '57e2e84bc00bc8fafc709bb7c9acbb2f1550612540.jpg', 4),
(34, 'image', '97265eef8034e52271976d98266929f71550612540.jpg', 4),
(35, 'image', 'e6f5dd69be1562d0fa64a44aeba33ce81550612540.jpg', 4),
(36, 'image', 'a5781a3648629dcbc6773d916e03c55f1550618430.jpg', 5),
(37, 'image', '0aaf676b6c0aa83026d3ebb6646af7791550618430.jpg', 5),
(38, 'image', '0e9f2f1b31202bf4c466dc8c0cbd143f1550618430.jpg', 5),
(39, 'image', '3fca92f849203949a6f67ad7bc02c7701550618430.jpg', 5),
(40, 'image', 'c9dcf986c256a6e93358b45635b222d91550618430.jpg', 5),
(41, 'image', '56cfb007f4f704f8b58f7d93e0806ae31550618430.jpg', 5),
(42, 'image', '57e2e84bc00bc8fafc709bb7c9acbb2f1550618430.jpg', 5),
(43, 'image', '97265eef8034e52271976d98266929f71550618430.jpg', 5),
(44, 'image', 'e6f5dd69be1562d0fa64a44aeba33ce81550618430.jpg', 5),
(45, 'image', 'a5781a3648629dcbc6773d916e03c55f1550621915.jpg', 6),
(46, 'image', '0aaf676b6c0aa83026d3ebb6646af7791550621916.jpg', 6),
(47, 'image', '0e9f2f1b31202bf4c466dc8c0cbd143f1550621916.jpg', 6),
(48, 'image', '3fca92f849203949a6f67ad7bc02c7701550621916.jpg', 6),
(49, 'image', 'c9dcf986c256a6e93358b45635b222d91550621916.jpg', 6),
(50, 'image', '56cfb007f4f704f8b58f7d93e0806ae31550621916.jpg', 6),
(51, 'image', '57e2e84bc00bc8fafc709bb7c9acbb2f1550621916.jpg', 6),
(52, 'image', '97265eef8034e52271976d98266929f71550621916.jpg', 6),
(53, 'image', 'e6f5dd69be1562d0fa64a44aeba33ce81550621916.jpg', 6),
(54, 'image', 'd226aa34f44e022cec4c7fc27f0538d81550622069.jpeg', 7),
(55, 'image', '45149ed00f4083360908b8ad9f08a7271550622069.jpg', 7),
(56, 'image', 'e291c24873370a7ea12539629792dd421550622069.jpg', 7),
(57, 'image', '8971ff710dc7939112e6c2737fdc41841550622069.jpg', 7),
(58, 'image', '3be94de4a210e486066e94517b1973461550622069.png', 7),
(59, 'image', '059715b3be90463ffd26bd18141e24791550622069.jpg', 7),
(60, 'image', 'fd60d46f5ffa26b19a43c1773df48adf1550622069.png', 7),
(61, 'image', '97e598f7521a9d740e6cceb1d0613dcf1550622069.png', 7),
(62, 'image', 'b37eeff653b5c599228f2f545ac9b3811550622069.jpg', 7),
(63, 'image', '27d1f26923dae585d95468f900e801491550622069.png', 7),
(64, 'image', '44536c531f71253b5318c87ce1d001ef1550622069.jpg', 7),
(65, 'image', 'c1d4250e17cbaa5722695f49fd6459fc1550622069.jpg', 7),
(66, 'image', 'd4c17d48d9e0a5ac9986887163f435ec1550622102.jpg', 8),
(67, 'image', '198cf232ab1f43a9c4a7d4e241e730971550622102.jpg', 8),
(68, 'image', 'd226aa34f44e022cec4c7fc27f0538d81550622102.jpeg', 8),
(69, 'image', '45149ed00f4083360908b8ad9f08a7271550622102.jpg', 8),
(70, 'image', '0b34e9cce342927f524ae4bd289818271550622102.jpg', 8),
(71, 'image', '0cc20eb87e700f9fefcf7f355a56703f1550622102.jpg', 8),
(72, 'image', 'e291c24873370a7ea12539629792dd421550622102.jpg', 8),
(73, 'image', '8971ff710dc7939112e6c2737fdc41841550622102.jpg', 8),
(74, 'image', '5f5f4cce5526e5069039ec24429499ab1550622102.jpg', 8),
(75, 'image', '116d0a3b18e598ded23819682c9548721550622102.png', 8),
(76, 'image', '3be94de4a210e486066e94517b1973461550622102.png', 8),
(77, 'image', '059715b3be90463ffd26bd18141e24791550622102.jpg', 8),
(78, 'image', 'e1ebee69ddd092fe7b4dba30e12acd761550622102.png', 8),
(79, 'image', 'e9ef3bb442100bd31663feeadc35caa61550622102.png', 8),
(80, 'image', 'fd60d46f5ffa26b19a43c1773df48adf1550622102.png', 8),
(81, 'image', '97e598f7521a9d740e6cceb1d0613dcf1550622102.png', 8),
(82, 'image', '16c087d311ded124ac3085481f869f021550622102.png', 8),
(83, 'image', 'd72a78723801b59f0a83ec0f243f5ee81550622102.png', 8),
(84, 'image', 'b37eeff653b5c599228f2f545ac9b3811550622102.jpg', 8),
(85, 'image', '2373bc93a5fbdbacd09eae92091564a91550622113.jpg', 9),
(86, 'image', '3725b6ee5fc124ab6079def058ead84a1550622113.png', 9),
(87, 'image', 'd4c17d48d9e0a5ac9986887163f435ec1550622113.jpg', 9),
(88, 'image', '198cf232ab1f43a9c4a7d4e241e730971550622113.jpg', 9),
(89, 'image', 'd226aa34f44e022cec4c7fc27f0538d81550622113.jpeg', 9),
(90, 'image', '45149ed00f4083360908b8ad9f08a7271550622113.jpg', 9),
(91, 'image', '073c91fe8074dc05b3a273868a5bc6031550622113.jpg', 9),
(92, 'image', '3b6bae75e12194a88316ce9293cabf2e1550622113.jpg', 9),
(93, 'image', 'c9c9b8c501297a306cdd35121f3085641550622113.jpg', 9),
(94, 'image', '5bf219b66de5ee639c72bee3a31ab0141550622113.png', 9),
(95, 'image', '0b34e9cce342927f524ae4bd289818271550622113.jpg', 9),
(96, 'image', '0cc20eb87e700f9fefcf7f355a56703f1550622113.jpg', 9),
(97, 'image', 'e291c24873370a7ea12539629792dd421550622113.jpg', 9),
(98, 'image', '8971ff710dc7939112e6c2737fdc41841550622113.jpg', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `user`, `pass`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin Rifas', 'admin', 'admin', '2019-02-18 13:15:27', '2019-02-18 13:15:27', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `raffle`
--
ALTER TABLE `raffle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `raffle_details`
--
ALTER TABLE `raffle_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `raffle_id` (`raffle_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `raffle`
--
ALTER TABLE `raffle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `raffle_details`
--
ALTER TABLE `raffle_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
