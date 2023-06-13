-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2023 a las 20:51:26
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_pw2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `nombre`, `color`) VALUES
(1, 'Historia', 'lightgoldenrodyellow'),
(2, 'Entretenimiento', 'lightsalmon'),
(3, 'Arte', 'lightpink'),
(4, 'Ciencia', 'lightgreen'),
(5, 'Geografía', 'lightblue');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partida`
--

CREATE TABLE `partida` (
  `idPartida` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `puntosObtenidos` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idPreguntaActual` int(11) DEFAULT NULL,
  `numPartidaDelJugador` int(11) NOT NULL DEFAULT 0,
  `terminada` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `partida`
--

INSERT INTO `partida` (`idPartida`, `idUsuario`, `puntosObtenidos`, `fecha`, `idPreguntaActual`, `numPartidaDelJugador`, `terminada`) VALUES
(1, 16, 0, '2023-06-04', 0, 0, 0),
(2, 16, 0, '2023-06-04', 0, 0, 0),
(3, 16, 0, '2023-06-04', 0, 0, 0),
(4, 16, 0, '2023-06-04', 0, 0, 0),
(5, 16, 0, '2023-06-04', 0, 0, 0),
(6, 16, 0, '2023-06-04', 0, 0, 0),
(7, 16, 0, '2023-06-04', 0, 0, 0),
(8, 16, 0, '2023-06-04', 0, 0, 0),
(9, 16, 0, '2023-06-04', 0, 0, 0),
(10, 16, 0, '2023-06-04', 0, 0, 0),
(11, 16, 0, '2023-06-04', 0, 0, 0),
(12, 16, 0, '2023-06-04', 0, 0, 0),
(13, 16, 0, '2023-06-04', 0, 0, 0),
(14, 16, 0, '2023-06-04', 0, 0, 0),
(15, 16, 0, '2023-06-04', 0, 0, 0),
(16, 16, 0, '2023-06-04', 0, 0, 0),
(17, 16, 0, '2023-06-04', 0, 0, 0),
(18, 16, 0, '2023-06-04', 0, 0, 0),
(19, 16, 0, '2023-06-04', 0, 0, 0),
(20, 16, 0, '2023-06-04', 0, 0, 0),
(21, 16, 0, '2023-06-04', 0, 0, 0),
(22, 16, 0, '2023-06-04', 0, 0, 0),
(23, 16, 0, '2023-06-04', 0, 0, 0),
(24, 16, 0, '2023-06-04', 0, 0, 0),
(25, 16, 0, '2023-06-04', 0, 0, 0),
(26, 16, 0, '2023-06-04', 0, 0, 0),
(27, 16, 0, '2023-06-04', 0, 0, 0),
(28, 16, 0, '2023-06-04', 0, 0, 0),
(29, 16, 0, '2023-06-04', 0, 0, 0),
(30, 16, 0, '2023-06-04', 0, 0, 0),
(31, 16, 0, '2023-06-04', 0, 0, 0),
(32, 16, 0, '2023-06-04', 0, 0, 0),
(33, 16, 0, '2023-06-04', 0, 0, 0),
(34, 16, 0, '2023-06-04', 0, 0, 0),
(35, 16, 0, '2023-06-04', 0, 0, 0),
(36, 16, 0, '2023-06-04', 0, 0, 0),
(37, 16, 0, '2023-06-04', 0, 0, 0),
(38, 16, 0, '2023-06-04', 0, 0, 0),
(39, 16, 0, '2023-06-04', 0, 0, 0),
(40, 16, 0, '2023-06-04', 0, 0, 0),
(41, 16, 0, '2023-06-04', 0, 0, 0),
(42, 16, 0, '2023-06-04', 0, 0, 0),
(43, 16, 0, '2023-06-04', 0, 0, 0),
(44, 16, 0, '2023-06-04', 0, 0, 0),
(45, 16, 0, '2023-06-04', 0, 0, 0),
(46, 16, 0, '2023-06-04', 0, 0, 0),
(47, 16, 0, '2023-06-04', 0, 0, 0),
(48, 16, 0, '2023-06-04', 0, 0, 0),
(49, 16, 0, '2023-06-04', 0, 0, 0),
(50, 16, 0, '2023-06-04', 0, 0, 0),
(51, 16, 0, '2023-06-04', 0, 0, 0),
(52, 16, 0, '2023-06-04', 0, 0, 0),
(53, 16, 0, '2023-06-04', 0, 0, 0),
(54, 16, 0, '2023-06-04', 0, 0, 0),
(55, 16, 0, '2023-06-04', 0, 0, 0),
(56, 16, 0, '2023-06-04', 0, 0, 0),
(57, 16, 0, '2023-06-04', 0, 0, 0),
(58, 16, 0, '2023-06-04', 13, 0, 1),
(59, 16, 0, '2023-06-05', 27, 1, 1),
(60, 16, 0, '2023-06-05', 16, 2, 1),
(61, 16, 0, '2023-06-05', 16, 0, 0),
(62, 16, 0, '2023-06-05', 22, 0, 0),
(63, 16, 0, '2023-06-05', 16, 7, 1),
(64, 16, 0, '2023-06-05', 39, 3, 1),
(65, 16, 0, '2023-06-05', 33, 9, 1),
(66, 16, 0, '2023-06-05', 41, 6, 1),
(67, 16, 0, '2023-06-05', 29, 10, 1),
(68, 16, 4, '2023-06-05', 39, 11, 1),
(69, 16, 1, '2023-06-05', 21, 8, 1),
(70, 16, 1, '2023-06-05', 22, 5, 1),
(71, 16, 2, '2023-06-05', 27, 12, 1),
(72, 16, 0, '2023-06-05', 17, 0, 1),
(73, 16, 0, '2023-06-05', 23, 4, 1),
(74, 17, 6, '2023-06-08', 15, 13, 1),
(75, 17, 3, '2023-06-09', 33, 12, 1),
(76, 17, 3, '2023-06-09', 19, 19, 1),
(77, 17, 2, '2023-06-09', 29, 11, 1),
(78, 17, 2, '2023-06-09', 16, 14, 1),
(79, 17, 0, '2023-06-09', 22, 15, 1),
(80, 17, 3, '2023-06-09', 18, 16, 1),
(81, 17, 2, '2023-06-09', 18, 17, 1),
(82, 17, 3, '2023-06-09', 16, 18, 1),
(83, 17, 2, '2023-06-09', 35, 10, 1),
(84, 17, 2, '2023-06-09', 18, 9, 1),
(85, 17, 2, '2023-06-09', 32, 8, 1),
(86, 17, 1, '2023-06-09', 37, 1, 1),
(87, 17, 2, '2023-06-09', 32, 2, 1),
(88, 17, 3, '2023-06-09', 14, 3, 1),
(89, 17, 2, '2023-06-09', 18, 4, 1),
(90, 17, 4, '2023-06-09', 37, 5, 1),
(91, 18, 11, '2023-06-12', 13, 0, 0),
(92, 18, 1, '2023-06-12', 29, 0, 0),
(93, 17, 0, '2023-06-12', 35, 6, 1),
(95, 17, 0, '2023-06-12', 40, 7, 1),
(97, 18, 2, '2023-06-12', 31, 1, 1),
(98, 18, 0, '2023-06-12', 15, 0, 0),
(99, 18, 1, '2023-06-12', 33, 0, 0),
(100, 18, 2, '2023-06-12', 18, 2, 1),
(101, 18, 2, '2023-06-12', 22, 3, 1),
(102, 18, 0, '2023-06-12', 22, 4, 1),
(103, 18, 0, '2023-06-12', 36, 5, 1),
(104, 18, 0, '2023-06-12', 24, 6, 1),
(105, 18, 0, '2023-06-12', 34, 7, 1),
(106, 18, 0, '2023-06-12', 23, 8, 1),
(107, 18, 3, '2023-06-12', 38, 9, 1),
(108, 17, 0, '2023-06-12', 19, 20, 1),
(109, 17, 1, '2023-06-12', 30, 21, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `pregunta_id` int(11) NOT NULL,
  `enunciado` varchar(260) DEFAULT NULL,
  `respuestaA` varchar(100) DEFAULT NULL,
  `respuestaB` varchar(100) DEFAULT NULL,
  `respuestaC` varchar(100) DEFAULT NULL,
  `respuestaD` varchar(100) DEFAULT NULL,
  `respuesta_correcta` varchar(100) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `veces_correcta` int(11) DEFAULT 0,
  `veces_respondida` int(11) DEFAULT 0,
  `dificultad` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`pregunta_id`, `enunciado`, `respuestaA`, `respuestaB`, `respuestaC`, `respuestaD`, `respuesta_correcta`, `categoria_id`, `veces_correcta`, `veces_respondida`, `dificultad`) VALUES
(13, '¿Cuál es el río más largo del mundo?', 'Amazonas', 'Nilo', 'Mississippi', 'Yangtsé', 'Nilo', 5, 0, 0, ''),
(14, '¿Cuál es el capital de Francia?', 'Madrid', 'Londres', 'París', 'Roma', 'París', 5, 0, 0, ''),
(15, '¿Cuál es el río más largo del mundo?', 'Amazonas', 'Nilo', 'Yangtsé', 'Misisipi', 'Nilo', 5, 0, 0, ''),
(16, '¿Cuál es el elemento más abundante en la Tierra?', 'Oxígeno', 'Silicio', 'Hierro', 'Carbono', 'Oxígeno', 4, 0, 0, ''),
(17, '¿Quién pintó la Mona Lisa?', 'Pablo Picasso', 'Leonardo da Vinci', 'Vincent van Gogh', 'Salvador Dalí', 'Leonardo da Vinci', 3, 0, 0, ''),
(18, '¿Cuál es la montaña más alta del mundo?', 'K2', 'Monte Everest', 'Aconcagua', 'Mont Blanc', 'Monte Everest', 5, 0, 0, ''),
(19, '¿Cuál es la moneda oficial de Japón?', 'Dólar', 'Euro', 'Yen', 'Libra esterlina', 'Yen', 5, 0, 0, ''),
(20, '¿Quién escribió \"Don Quijote de la Mancha\"?', 'Miguel de Cervantes', 'Gabriel García Márquez', 'Jorge Luis Borges', 'William Shakespeare', 'Miguel de Cervantes', 3, 0, 0, ''),
(21, '¿Cuál es el país más grande del mundo en términos de superficie?', 'Estados Unidos', 'Rusia', 'China', 'Canadá', 'Rusia', 5, 0, 0, ''),
(22, '¿Cuál es el océano más grande del mundo?', 'Océano Pacífico', 'Océano Atlántico', 'Océano Índico', 'Océano Ártico', 'Océano Pacífico', 5, 0, 0, ''),
(23, '¿Quién descubrió América?', 'Cristóbal Colón', 'Fernando de Magallanes', 'Vasco da Gama', 'Hernán Cortés', 'Cristóbal Colón', 1, 0, 0, ''),
(24, '¿Cuál es el símbolo químico del oro?', 'Ag', 'Au', 'Pt', 'Hg', 'Au', 4, 0, 0, ''),
(25, '¿Cuál es el autor de la obra \"Romeo y Julieta\"?', 'William Shakespeare', 'Charles Dickens', 'Jane Austen', 'Fyodor Dostoyevsky', 'William Shakespeare', 3, 0, 0, ''),
(26, '¿Cuál es el planeta más grande del sistema solar?', 'Mercurio', 'Venus', 'Júpiter', 'Saturno', 'Júpiter', 5, 0, 0, ''),
(27, '¿Cuál es la fórmula química del agua?', 'H2O', 'CO2', 'NaCl', 'CH4', 'H2O', 4, 0, 0, ''),
(28, '¿Cuál es el capital de Francia?', 'Madrid', 'Londres', 'París', 'Roma', 'París', 5, 0, 0, ''),
(29, '¿Cuál es el río más largo del mundo?', 'Amazonas', 'Nilo', 'Yangtsé', 'Misisipi', 'Nilo', 5, 0, 0, ''),
(30, '¿Cuál es el elemento más abundante en la Tierra?', 'Oxígeno', 'Silicio', 'Hierro', 'Carbono', 'Oxígeno', 4, 0, 0, ''),
(31, '¿Quién pintó la Mona Lisa?', 'Pablo Picasso', 'Leonardo da Vinci', 'Vincent van Gogh', 'Salvador Dalí', 'Leonardo da Vinci', 3, 0, 0, ''),
(32, '¿Cuál es la montaña más alta del mundo?', 'K2', 'Monte Everest', 'Aconcagua', 'Mont Blanc', 'Monte Everest', 5, 0, 0, ''),
(33, '¿Cuál es la moneda oficial de Japón?', 'Dólar', 'Euro', 'Yen', 'Libra esterlina', 'Yen', 5, 0, 0, ''),
(34, '¿Quién escribió \"Don Quijote de la Mancha\"?', 'Miguel de Cervantes', 'Gabriel García Márquez', 'Jorge Luis Borges', 'William Shakespeare', 'Miguel de Cervantes', 3, 0, 0, ''),
(35, '¿Cuál es el país más grande del mundo en términos de superficie?', 'Estados Unidos', 'Rusia', 'China', 'Canadá', 'Rusia', 5, 0, 0, ''),
(36, '¿Cuál es el océano más grande del mundo?', 'Océano Pacífico', 'Océano Atlántico', 'Océano Índico', 'Océano Ártico', 'Océano Pacífico', 5, 0, 0, ''),
(37, '¿Quién descubrió América?', 'Cristóbal Colón', 'Fernando de Magallanes', 'Vasco da Gama', 'Hernán Cortés', 'Cristóbal Colón', 5, 0, 0, ''),
(38, '¿Cuál es el símbolo químico del oro?', 'Ag', 'Au', 'Pt', 'Hg', 'Au', 5, 0, 0, ''),
(39, '¿Cuál es el autor de la obra \"Romeo y Julieta\"?', 'William Shakespeare', 'Charles Dickens', 'Jane Austen', 'Fyodor Dostoyevsky', 'William Shakespeare', 5, 0, 0, ''),
(40, '¿Cuál es el planeta más grande del sistema solar?', 'Mercurio', 'Venus', 'Júpiter', 'Saturno', 'Júpiter', 5, 0, 0, ''),
(41, '¿Cuál es la fórmula química del agua?', 'H2O', 'CO2', 'NaCl', 'CH4', 'H2O', 5, 0, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_usuario`
--

CREATE TABLE `pregunta_usuario` (
  `id_pregunta_usuario` int(11) NOT NULL,
  `idPartida` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `respuesta` varchar(100) DEFAULT NULL,
  `estadoRespuesta` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pregunta_usuario`
--

INSERT INTO `pregunta_usuario` (`id_pregunta_usuario`, `idPartida`, `idPregunta`, `idUsuario`, `respuesta`, `estadoRespuesta`) VALUES
(1, 59, 27, 16, NULL, 0),
(2, 60, 16, 16, NULL, 0),
(3, 61, 16, 16, NULL, 0),
(4, 62, 22, 16, NULL, 0),
(5, 63, 16, 16, 'Carbono', 0),
(6, 64, 34, 16, 'Miguel de Cervantes', 0),
(7, 64, 23, 16, 'Cristóbal Colón', 0),
(8, 64, 39, 16, NULL, 0),
(9, 65, 33, 16, '', 0),
(10, 66, 41, 16, '', 0),
(11, 67, 29, 16, '', 0),
(12, 68, 17, 16, 'Leonardo da Vinci', 0),
(13, 68, 34, 16, 'Miguel de Cervantes', 0),
(14, 68, 14, 16, 'París', 0),
(15, 68, 20, 16, 'Miguel de Cervantes', 0),
(16, 68, 39, 16, '', 0),
(17, 69, 16, 16, 'Oxígeno', 0),
(18, 69, 21, 16, '', 0),
(19, 70, 39, 16, 'William Shakespeare', 0),
(20, 70, 22, 16, 'Océano Atlántico', 0),
(21, 71, 19, 16, 'Yen', 0),
(22, 71, 30, 16, 'Oxígeno', 0),
(23, 71, 27, 16, 'NaCl', 0),
(24, 72, 17, 16, '', 0),
(25, 73, 23, 16, '', 0),
(26, 74, 34, 17, 'Miguel de Cervantes', 0),
(27, 74, 35, 17, 'Rusia', 0),
(28, 74, 26, 17, 'Júpiter', 0),
(29, 74, 32, 17, 'Monte Everest', 0),
(30, 74, 15, 17, '', 0),
(31, 74, 19, 17, 'Yen', 0),
(32, 74, 15, 17, '', 0),
(33, 75, 25, 17, 'William Shakespeare', 0),
(34, 75, 26, 17, 'Júpiter', 0),
(35, 75, 19, 17, 'Yen', 0),
(36, 75, 33, 17, 'Libra esterlina', 0),
(37, 76, 23, 17, 'Cristóbal Colón', 0),
(38, 76, 34, 17, 'Miguel de Cervantes', 0),
(39, 76, 30, 17, 'Oxígeno', 0),
(40, 76, 19, 17, 'Libra esterlina', 0),
(41, 77, 16, 17, 'Oxígeno', 0),
(42, 77, 23, 17, 'Cristóbal Colón', 0),
(43, 77, 29, 17, 'Misisipi', 0),
(44, 78, 27, 17, 'H2O', 0),
(45, 78, 38, 17, 'Au', 0),
(46, 78, 16, 17, 'Carbono', 0),
(47, 79, 22, 17, 'Océano Atlántico', 0),
(48, 80, 35, 17, 'Rusia', 0),
(49, 80, 35, 17, 'Rusia', 0),
(50, 80, 33, 17, 'Yen', 0),
(51, 80, 18, 17, 'K2', 0),
(52, 81, 17, 17, 'Leonardo da Vinci', 0),
(53, 81, 29, 17, 'Nilo', 0),
(54, 81, 18, 17, 'Mont Blanc', 0),
(55, 82, 30, 17, 'Oxígeno', 0),
(56, 82, 27, 17, 'H2O', 0),
(57, 82, 29, 17, 'Nilo', 0),
(58, 82, 16, 17, 'Hierro', 0),
(59, 83, 29, 17, 'Nilo', 0),
(60, 83, 22, 17, 'Océano Pacífico', 0),
(61, 83, 35, 17, 'Canadá', 0),
(62, 84, 26, 17, 'Júpiter', 0),
(63, 84, 19, 17, 'Yen', 0),
(64, 84, 18, 17, '', 0),
(65, 85, 20, 17, 'Miguel de Cervantes', 0),
(66, 85, 14, 17, 'París', 0),
(67, 85, 32, 17, 'Mont Blanc', 0),
(68, 86, 20, 17, 'Miguel de Cervantes', 0),
(69, 86, 37, 17, 'Hernán Cortés', 0),
(70, 87, 18, 17, 'Monte Everest', 0),
(71, 87, 21, 17, 'Rusia', 0),
(72, 87, 32, 17, 'Mont Blanc', 0),
(73, 88, 33, 17, 'Yen', 0),
(74, 88, 25, 17, 'William Shakespeare', 0),
(75, 88, 37, 17, 'Cristóbal Colón', 0),
(76, 88, 14, 17, 'Londres', 0),
(77, 89, 24, 17, 'Au', 0),
(78, 89, 22, 17, 'Océano Pacífico', 0),
(79, 89, 18, 17, 'Mont Blanc', 0),
(80, 90, 29, 17, 'Nilo', 0),
(81, 90, 30, 17, 'Oxígeno', 0),
(82, 90, 27, 17, 'H2O', 0),
(83, 90, 30, 17, 'Oxígeno', 0),
(84, 90, 37, 17, 'Hernán Cortés', 0),
(85, 91, 41, 18, 'H2O', 0),
(86, 91, 16, 18, 'Oxígeno', 0),
(87, 91, 31, 18, 'Leonardo da Vinci', 0),
(88, 91, 29, 18, 'Nilo', 0),
(89, 91, 15, 18, 'Nilo', 0),
(90, 91, 37, 18, 'Cristóbal Colón', 0),
(91, 91, 40, 18, 'Júpiter', 0),
(92, 91, 20, 18, 'Miguel de Cervantes', 0),
(93, 91, 29, 18, 'Nilo', 0),
(94, 91, 29, 18, 'Nilo', 0),
(95, 91, 41, 18, 'H2O', 0),
(96, 91, 13, 18, '', 0),
(97, 92, 38, 18, 'Au', 0),
(98, 92, 29, 18, 'Misisipi', 0),
(99, 93, 35, 17, 'Estados Unidos', 0),
(100, 94, 34, 17, 'Miguel de Cervantes', 0),
(101, 94, 35, 17, 'Rusia', 0),
(102, 94, 29, 17, 'Nilo', 0),
(103, 94, 37, 17, 'Hernán Cortés', 0),
(104, 95, 40, 17, 'Mercurio', 0),
(105, 96, 33, 17, 'Yen', 0),
(106, 96, 38, 17, NULL, 0),
(107, 97, 30, 18, 'Oxígeno', 0),
(108, 97, 31, 18, 'Vincent van Gogh', 0),
(109, 97, 31, 18, 'Vincent van Gogh', 0),
(110, 98, 15, 18, 'Amazonas', 0),
(111, 99, 41, 18, 'H2O', 0),
(112, 99, 33, 18, 'Euro', 0),
(113, 100, 31, 18, 'Leonardo da Vinci', 0),
(114, 100, 21, 18, 'Rusia', 0),
(115, 100, 18, 18, 'Aconcagua', 0),
(116, 101, 19, 18, 'Yen', 0),
(117, 101, 13, 18, 'Nilo', 0),
(118, 101, 22, 18, 'Océano Ártico', 0),
(119, 102, 22, 18, 'Océano Ártico', 0),
(120, 103, 36, 18, 'Océano Índico', 0),
(121, 104, 24, 18, 'Pt', 0),
(122, 105, 34, 18, 'Jorge Luis Borges', 0),
(123, 106, 23, 18, 'Hernán Cortés', 0),
(124, 107, 29, 18, 'Nilo', 0),
(125, 107, 33, 18, 'Yen', 0),
(126, 107, 15, 18, 'Nilo', 0),
(127, 107, 38, 18, 'Hg', 0),
(128, 108, 19, 17, 'Euro', 0),
(129, 109, 13, 17, 'Nilo', 0),
(130, 109, 30, 17, 'Hierro', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombre`) VALUES
(1, 'administrador'),
(2, 'Editor'),
(3, 'Jugador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `nacimiento` date NOT NULL,
  `genero` varchar(2) NOT NULL,
  `pais` varchar(120) NOT NULL,
  `ciudad` varchar(120) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasenia` varchar(250) NOT NULL,
  `hashRegistro` varchar(100) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `qr` varchar(140) NOT NULL,
  `fecha_registro` date NOT NULL,
  `idRol` int(11) NOT NULL,
  `url_imagen` varchar(250) NOT NULL,
  `puntosTotales` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellido`, `nacimiento`, `genero`, `pais`, `ciudad`, `email`, `contrasenia`, `hashRegistro`, `usuario`, `estado`, `qr`, `fecha_registro`, `idRol`, `url_imagen`, `puntosTotales`) VALUES
(1, 'pablo', 'Perez', '2000-10-10', 'X', 'Argentina', 'Buenos Aires', 'pabloP@gmail.com', '1234', '', 'admin', 1, '', '2023-05-23', 1, '', 0),
(16, 'Ale', 'Paz', '1991-12-19', 'M', 'Argentina', 'Lomas del Mirador', 'alejandrodanielpaz92@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'a11b4b285bfc222f8f4635b80b9cd39a', 'Aleee', 1, '', '2023-05-31', 3, './uploads/Aleee.png', 0),
(17, 'Ivan', 'Dp', '1992-01-03', 'M', 'Argentina', 'Ramos Mejia', 'ivangdelpino4@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '5f3ef04d6af3a8dc400b6fa4b6fade78', 'ivandp', 1, '', '2023-06-08', 3, './uploads/ivandp.png', 5),
(18, 'Luis Agustin', 'Vega Dobal', '2023-06-13', 'X', 'Argentina', 'Hurlingham', 'vegadobal@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'fc2d395d19537bac3690ce59a786314a', 'fello', 1, '', '2023-06-12', 3, './uploads/fello.jpeg', 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `partida`
--
ALTER TABLE `partida`
  ADD PRIMARY KEY (`idPartida`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`pregunta_id`);

--
-- Indices de la tabla `pregunta_usuario`
--
ALTER TABLE `pregunta_usuario`
  ADD PRIMARY KEY (`id_pregunta_usuario`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idRol` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `partida`
--
ALTER TABLE `partida`
  MODIFY `idPartida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de la tabla `pregunta_usuario`
--
ALTER TABLE `pregunta_usuario`
  MODIFY `id_pregunta_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
