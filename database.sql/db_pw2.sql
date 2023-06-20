-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2023 a las 21:46:25
-- Versión del servidor: 8.0.26
-- Versión de PHP: 8.1.4

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
  `categoria_id` int NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `color` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL
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
  `idPartida` int NOT NULL,
  `idUsuario` int NOT NULL,
  `puntosObtenidos` int NOT NULL,
  `fecha` date NOT NULL,
  `idPreguntaActual` int DEFAULT NULL,
  `numPartidaDelJugador` int NOT NULL DEFAULT '0',
  `terminada` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `pregunta_id` int NOT NULL,
  `enunciado` varchar(260) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `respuestaA` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `respuestaB` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `respuestaC` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `respuestaD` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `respuesta_correcta` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `categoria_id` int DEFAULT NULL,
  `veces_correcta` int DEFAULT '0',
  `veces_respondida` int DEFAULT '0',
  `reportada` tinyint(1) NOT NULL DEFAULT '0',
  `motivo_reporte` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`pregunta_id`, `enunciado`, `respuestaA`, `respuestaB`, `respuestaC`, `respuestaD`, `respuesta_correcta`, `categoria_id`, `veces_correcta`, `veces_respondida`, `reportada`, `motivo_reporte`) VALUES
(50, '¿Quién pintó la Mona Lisa?', 'Pablo Picasso', 'Leonardo da Vinci', 'Vincent van Gogh', 'Frida Kahlo', 'Leonardo da Vinci', 3, 1, 4, 0, NULL),
(51, '¿En qué año ocurrió la Revolución Rusa?', '1917', '1789', '1945', '1871', '1917', 1, 2, 8, 0, NULL),
(52, '¿Quién escribió la novela \"Cien años de soledad\"?', 'Gabriel García Márquez', 'Julio Cortázar', 'Jorge Luis Borges', 'Mario Vargas Llosa', 'Gabriel García Márquez', 2, 7, 12, 0, NULL),
(53, '¿Cuál es el elemento químico más abundante en la corteza terrestre?', 'Hierro', 'Carbono', 'Silicio', 'Oxígeno', 'Oxígeno', 4, 14, 15, 0, NULL),
(54, '¿En qué ciudad se encuentra la Torre Eiffel?', 'París', 'Londres', 'Roma', 'Nueva York', 'París', 5, 3, 4, 0, NULL),
(55, '¿En qué año se firmó la Declaración de Independencia de los Estados Unidos?', '1776', '1789', '1804', '1812', '1776', 1, 11, 22, 0, NULL),
(56, '¿Quién fue el primer presidente de Estados Unidos?', 'George Washington', 'Thomas Jefferson', 'Abraham Lincoln', 'John F. Kennedy', 'George Washington', 1, 1, 5, 0, NULL),
(57, '¿Cuál es la montaña más alta del mundo?', 'Monte Kilimanjaro', 'Monte Everest', 'Monte Aconcagua', 'Monte McKinley', 'Monte Everest', 5, 20, 24, 0, NULL),
(58, '¿Cuál es el río más largo del mundo?', 'Nilo', 'Amazonas', 'Misisipi', 'Yangtsé', 'Amazonas', 5, 8, 8, 0, NULL),
(59, '¿Quién descubrió la penicilina?', 'Alexander Fleming', 'Marie Curie', 'Albert Einstein', 'Isaac Newton', 'Alexander Fleming', 4, 7, 16, 0, NULL),
(60, '¿En qué año se fundó la compañía Apple?', '1976', '1984', '1991', '2001', '1976', 4, 2, 5, 0, NULL),
(61, '¿Quién pintó el famoso cuadro \"La noche estrellada\"?', 'Vincent van Gogh', 'Pablo Picasso', 'Leonardo da Vinci', 'Salvador Dalí', 'Vincent van Gogh', 3, 3, 7, 0, NULL),
(62, '¿Cuál es el país más grande del mundo en términos de superficie?', 'China', 'Estados Unidos', 'Rusia', 'India', 'Rusia', 5, 5, 10, 0, NULL),
(63, '¿En qué año se llevó a cabo la Revolución Francesa?', '1789', '1815', '1848', '1905', '1789', 1, 1, 4, 0, NULL),
(64, '¿Quién escribió la obra de teatro \"Romeo y Julieta\"?', 'William Shakespeare', 'Miguel de Cervantes', 'Jane Austen', 'Charles Dickens', 'William Shakespeare', 3, 4, 8, 0, NULL),
(65, '¿Cuál es el satélite natural de la Tierra?', 'Marte', 'Luna', 'Júpiter', 'Venus', 'Luna', 5, 2, 6, 0, NULL),
(66, '¿Quién es considerado el padre de la computación?', 'Alan Turing', 'Steve Jobs', 'Bill Gates', 'Mark Zuckerberg', 'Alan Turing', 4, 3, 9, 0, NULL),
(67, '¿En qué año se llevó a cabo la caída del Muro de Berlín?', '1989', '1975', '1991', '1961', '1989', 1, 2, 5, 0, NULL),
(68, '¿Cuál es el océano más grande del mundo?', 'Atlántico', 'Índico', 'Pacífico', 'Ártico', 'Pacífico', 5, 4, 11, 0, NULL),
(69, '¿Quién fue el primer hombre en pisar la Luna?', 'Neil Armstrong', 'Buzz Aldrin', 'Yuri Gagarin', 'Alan Shepard', 'Neil Armstrong', 4, 1, 2, 0, NULL),
(70, '¿Quién escribió la novela \"1984\"?', 'George Orwell', 'Aldous Huxley', 'Ray Bradbury', 'Jorge Luis Borges', 'George Orwell', 2, 2, 5, 0, NULL),
(71, '¿En qué país se encuentra la ciudad de Machu Picchu?', 'Perú', 'Colombia', 'Brasil', 'México', 'Perú', 5, 3, 7, 0, NULL),
(72, '¿Cuál es el símbolo químico del oro?', 'Ag', 'Au', 'O', 'Hg', 'Au', 4, 1, 3, 0, NULL),
(73, '¿Cuál es la capital de Australia?', 'Sídney', 'Melbourne', 'Brisbane', 'Canberra', 'Sídney', 5, 2, 6, 0, NULL),
(74, '¿Quién pintó \"La persistencia de la memoria\", también conocida como \"Los relojes blandos\"?', 'Pablo Picasso', 'Salvador Dalí', 'Frida Kahlo', 'Diego Rivera', 'Salvador Dalí', 3, 4, 9, 0, NULL),
(75, '¿Cuál es el río más largo de África?', 'Nilo', 'Zambeze', 'Congo', 'Níger', 'Nilo', 5, 3, 7, 0, NULL),
(76, '¿En qué año se produjo el hundimiento del Titanic?', '1912', '1905', '1921', '1918', '1912', 1, 2, 5, 0, NULL),
(77, '¿Quién escribió \"Don Quijote de la Mancha\"?', 'Miguel de Cervantes', 'Gabriel García Márquez', 'William Shakespeare', 'Friedrich Nietzsche', 'Miguel de Cervantes', 3, 1, 2, 0, NULL),
(78, '¿Cuál es el planeta más grande del Sistema Solar?', 'Júpiter', 'Saturno', 'Neptuno', 'Urano', 'Júpiter', 4, 3, 5, 0, NULL),
(79, '¿Cuál es el monte más alto de África?', 'Monte Everest', 'Monte Kilimanjaro', 'Monte Aconcagua', 'Monte McKinley', 'Monte Kilimanjaro', 5, 3, 6, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_sugerida`
--

CREATE TABLE `pregunta_sugerida` (
  `id_sugerencia` int NOT NULL,
  `enunciado_s` varchar(260) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `respuestaA_s` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `respuestaB_s` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `respuestaC_s` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `respuestaD_s` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `respuesta_correcta_s` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `categoria_id_s` int DEFAULT NULL,
  `creado_por` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_usuario`
--

CREATE TABLE `pregunta_usuario` (
  `id_pregunta_usuario` int NOT NULL,
  `idPartida` int NOT NULL,
  `idPregunta` int NOT NULL,
  `idUsuario` int NOT NULL,
  `respuesta` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estadoRespuesta` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_general_ci NOT NULL
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
  `idUsuario` int NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nacimiento` date NOT NULL,
  `genero` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `pais` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `ciudad` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `contrasenia` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `hashRegistro` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `usuario` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `qr` varchar(140) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_registro` date NOT NULL,
  `idRol` int NOT NULL,
  `url_imagen` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `puntosTotales` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellido`, `nacimiento`, `genero`, `pais`, `ciudad`, `email`, `contrasenia`, `hashRegistro`, `usuario`, `estado`, `qr`, `fecha_registro`, `idRol`, `url_imagen`, `puntosTotales`) VALUES
(1, 'pablo', 'Perez', '2000-10-10', 'X', 'Argentina', 'Buenos Aires', 'pabloP@gmail.com', '1234', '', 'admin', 1, '', '2023-05-23', 1, '', 0),
(16, 'Ale', 'Paz', '1991-12-19', 'M', 'Argentina', 'Lomas del Mirador', 'alejandrodanielpaz92@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'a11b4b285bfc222f8f4635b80b9cd39a', 'Aleee', 1, '', '2023-05-31', 3, './uploads/Aleee.png', 0),
(18, 'Luis Agustin', 'Vega Dobal', '2023-06-13', 'X', 'Argentina', 'Hurlingham', 'vegadobal@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'fc2d395d19537bac3690ce59a786314a', 'fello', 1, '', '2023-06-12', 3, './uploads/fello.jpeg', 9),
(21, 'Leo', 'Messi', '1992-01-03', 'M', 'Argentina', 'Lomas del Mirador', 'ivandp6880@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'fcd2324cb4e9be6e33aabfeb9be8c424', 'lmessi', 1, '', '2023-06-13', 3, './uploads/lmessi.jpg', 1),
(22, 'Ivan', 'Del Pino', '1992-01-03', 'M', 'Argentina', 'Ramos Mejia', 'ivangdelpino4@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '9c011f5f48c9a41931c39c2d416714ee', 'ivan6880', 1, '', '2023-06-20', 2, './uploads/ivan6880.jpg', 2);

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
-- Indices de la tabla `pregunta_sugerida`
--
ALTER TABLE `pregunta_sugerida`
  ADD PRIMARY KEY (`id_sugerencia`);

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
  MODIFY `idPartida` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `pregunta_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `pregunta_sugerida`
--
ALTER TABLE `pregunta_sugerida`
  MODIFY `id_sugerencia` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pregunta_usuario`
--
ALTER TABLE `pregunta_usuario`
  MODIFY `id_pregunta_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
