-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2023 at 01:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pw2`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `nombre`, `color`) VALUES
(1, 'Historia', 'Amarillo'),
(2, 'Entretenimiento', 'Rosa'),
(3, 'Arte', 'Rojo'),
(4, 'Ciencia', 'Verde'),
(5, 'Geografía', 'blue');

-- --------------------------------------------------------

--
-- Table structure for table `partida`
--

CREATE TABLE `partida` (
  `idPartida` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `puntosObtenidos` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partida`
--

INSERT INTO `partida` (`idPartida`, `idUsuario`, `puntosObtenidos`, `fecha`) VALUES
(73, 21, 0, '2023-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `preguntas`
--

CREATE TABLE `preguntas` (
  `pregunta_id` int(11) NOT NULL,
  `enunciado` text DEFAULT NULL,
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
-- Dumping data for table `preguntas`
--

INSERT INTO `preguntas` (`pregunta_id`, `enunciado`, `respuestaA`, `respuestaB`, `respuestaC`, `respuestaD`, `respuesta_correcta`, `categoria_id`, `veces_correcta`, `veces_respondida`, `dificultad`) VALUES
(13, '¿Cuál es el río más largo del mundo?', 'Amazonas', 'Nilo', 'Mississippi', 'Yangtsé', 'Nilo', 5, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `pregunta_usuario`
--

CREATE TABLE `pregunta_usuario` (
  `id_pregunta_usuario` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `estadoRespuesta` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`idRol`, `nombre`) VALUES
(1, 'administrador'),
(2, 'Editor'),
(3, 'Jugador');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
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
  `url_imagen` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellido`, `nacimiento`, `genero`, `pais`, `ciudad`, `email`, `contrasenia`, `hashRegistro`, `usuario`, `estado`, `qr`, `fecha_registro`, `idRol`, `url_imagen`) VALUES
(1, 'pablo', 'Perez', '2000-10-10', 'X', 'Argentina', 'Buenos Aires', 'pabloP@gmail.com', '1234', '', 'admin', 1, '', '2023-05-23', 1, ''),
(11, 'ale', 'paz', '1111-11-11', 'M', 'Argentina', 'asdas', 'ale@ale.com', '$2y$10$o7GynurOgfCttfpi2WZbc.8DzjC2Bdr3249mVre1jpJyNydz2WO7K', '', 'ale', 1, '', '2023-05-28', 3, ''),
(12, 'Alejandro', 'Paz', '1991-12-19', 'M', 'Argentina', 'Lomas del Mirador', 'alejandrodanielpaz92@gmail.com', '$2y$10$z3j2aUSXW40BTw3USqzjQ.KLJ7gJyxn8pgW.VBZ4n0yeQVut/2kKe', '', 'Ale1234', 1, '', '2023-05-29', 3, './uploads/asdasd.png'),
(13, 'Fabio', 'Perez', '1991-12-19', 'M', 'Argentina', 'Lomas del Mirador', 'apaz258@alumno.unlam.edu.ar', '$2y$10$sE/HKDcfSR6l7vQjuJbzzuxZDoe5WVI3ZFkdEbpmaQYsqMVhYxoJy', '', 'Fabio111', 1, '', '2023-05-29', 3, ''),
(14, 'Nico', 'Garrido', '1988-01-06', 'M', 'Argentina', 'Lomas del Mirador', 'garridonm@gmail.com', '$2y$10$jq30NL5YPV6QgQMejk0wue97LtlsQWOZCm1puieTEr3QRd9JpnsmG', '', 'Nico', 0, '', '2023-05-29', 3, ''),
(15, 'asda', 'asdas', '0000-00-00', 'X', 'Argentina', 'aad', 'ale@ale.com', '$2y$10$VsVCIQNz9MpxAk5HN15VDeOvkzM.64sqx6GkZ.XepHpB.SoGolYpu', '', 'asdasd', 0, '', '2023-05-29', 3, './uploads/asdasd.png'),
(21, 'Ivan', 'Dp', '1992-03-01', 'M', 'Argentina', 'Ramos Mejia', 'ivangdelpino4@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2d299bf03bf64cf4c011c786e4bc53e4', 'ivandp', 1, '', '2023-05-31', 3, './uploads/ivandp.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indexes for table `partida`
--
ALTER TABLE `partida`
  ADD PRIMARY KEY (`idPartida`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`pregunta_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indexes for table `pregunta_usuario`
--
ALTER TABLE `pregunta_usuario`
  ADD PRIMARY KEY (`id_pregunta_usuario`),
  ADD KEY `idPregunta` (`idPregunta`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idRol` (`idRol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `partida`
--
ALTER TABLE `partida`
  MODIFY `idPartida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `pregunta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pregunta_usuario`
--
ALTER TABLE `pregunta_usuario`
  MODIFY `id_pregunta_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `partida`
--
ALTER TABLE `partida`
  ADD CONSTRAINT `partida_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Constraints for table `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`categoria_id`);

--
-- Constraints for table `pregunta_usuario`
--
ALTER TABLE `pregunta_usuario`
  ADD CONSTRAINT `pregunta_usuario_ibfk_1` FOREIGN KEY (`idPregunta`) REFERENCES `preguntas` (`pregunta_id`),
  ADD CONSTRAINT `pregunta_usuario_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
