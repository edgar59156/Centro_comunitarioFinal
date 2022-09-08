-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2021 a las 03:40:48
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `centro_comunitario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(13) NOT NULL,
  `ine` varchar(32) NOT NULL,
  `comprobante_domicilio` varchar(32) NOT NULL,
  `constancia_estudios` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `id_usuario`, `direccion`, `telefono`, `ine`, `comprobante_domicilio`, `constancia_estudios`) VALUES
(1, 4, 'Direccion de prueba para el cliente 1', '4611111111', '', '', ''),
(2, 5, 'Direccion de prueba para el cliente 2', '4611111111', '', '', ''),
(3, 6, 'fasdfasdfasdf', '4611111111', '', '', ''),
(4, 7, 'Direcccion del cliente 4', '4611111111', '', '', ''),
(7, 45, '', '', '', '', ''),
(11, 45, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `id_editorial` int(11) NOT NULL,
  `editorial` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id_editorial`, `editorial`) VALUES
(1, 'Editorial Planeta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL,
  `evento` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `fecha` date NOT NULL,
  `horario_inicio` time NOT NULL,
  `horario_fin` time NOT NULL,
  `id_salon` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fotografia` varchar(100) NOT NULL DEFAULT 'nofoto.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id_evento`, `evento`, `descripcion`, `fecha`, `horario_inicio`, `horario_fin`, `id_salon`, `id_usuario`, `fotografia`) VALUES
(1, 'Evento Dia de Muertos', 'El Día de Muertos es una tradición mexicana celebrada el 1 y 2 de noviembre en la que se honra a los muertos. Se originó como un sincretismo entre las celebraciones católicas así como las diversas cos', '2021-11-01', '12:00:00', '14:00:00', 1, 1, 'diamuertos.jpg'),
(2, 'Evento Dia de Muertos', 'El Día de Muertos es una tradición mexicana celebrada el 1 y 2 de noviembre en la que se honra a los muertos. Se originó como un sincretismo entre las celebraciones católicas así como las diversas cos', '2021-11-01', '12:00:00', '14:00:00', 1, 1, 'diamuertos2.jpg'),
(3, 'Organízate mejor y equilibra tu vida Planifica ahora para un 2022 con tus objetivos cumplidos ¡Aplic', 'Planeación anual Personal y Profesional\r\nOrganízate mejor y equilibra tu vida\r\nPlanifica ahora para un 2022 con tus objetivos cumplidos\r\n¡Aplica la metodología para lograr tus sueños personales y profesionales!', '2021-11-23', '00:40:10', '22:40:10', 2, 1, 'organizate.jpg'),
(12, 'inteligencia ar', 'qwerwqer', '2021-12-08', '17:42:00', '17:42:00', 1, 1, 'nofoto.png'),
(13, 'IENTE', 'sdfgsdfg', '2021-12-07', '17:47:00', '17:49:00', 1, 2, '3819ba93d364c06976ff0308a49537c4.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_cliente`
--

CREATE TABLE `evento_cliente` (
  `id_evento` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evento_cliente`
--

INSERT INTO `evento_cliente` (`id_evento`, `id_cliente`) VALUES
(2, 2),
(1, 1),
(1, 3),
(1, 4),
(3, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `genero` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `genero`) VALUES
(1, 'Novela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id_libro` int(11) NOT NULL,
  `libro` varchar(50) NOT NULL,
  `id_editorial` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `edicion` varchar(15) NOT NULL,
  `descripcion` varchar(800) NOT NULL,
  `imagen` varchar(100) NOT NULL DEFAULT 'noimagen.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id_libro`, `libro`, `id_editorial`, `id_genero`, `edicion`, `descripcion`, `imagen`) VALUES
(1, 'La bestia', 1, 1, '1a Edicion', 'Corre el año 1834 y Madrid, una pequeña ciudad que trata de abrirse paso más allá de las murallas que la rodean, sufre una terrible epidemia de cólera. Pero la peste no es lo único que aterroriza a sus habitantes: en los arrabales aparecen cadáveres desmembrados de niñas que nadie reclama. Todos los rumores apuntan a la Bestia, un ser a quien nadie ha visto pero al que todos temen.\n\nCuando la pequeña Clara desaparece, su hermana Lucía, junto con Donoso, un policía tuerto, y Diego, un periodista buscavidas, inician una frenética cuenta atrás para encontrar a la niña con vida. En su camino tropiezan con fray Braulio, un monje guerrillero, y con un misterioso anillo de oro con dos mazas cruzadas que todo el mundo codicia y por el que algunos están dispuestos a matar.', 'labestia.jpg'),
(2, 'Últimos días en Berlín', 1, 1, '1a Edicion', 'Cuando Yuri Santacruz asistió al nombramiento como canciller de Adolf Hitler, no podía imaginar lo mucho que cambiaría su vida en Berlín. Había llegado allí unos meses atrás, después de haber huido, junto con parte de su familia, de San Petersburgo, asfixiados por una revolución que los había dejado sin nada. A Yuri también lo privó de su madre y su hermano pequeño, a quienes las autoridades rusas no permitieron la salida del país.\r\nYa en Berlín, su sentido de la justicia lo impulsará a defender a un joven comunista agredido por las tropas de asalto de Hitler. Ese día, además, conocerá a su gran amor, Claudia. Su vida dará un giro inesperado, y la que hasta entonces había sido su máxima prioridad, buscar a su madre y a su hermano, será sustituida por otra más urgente en esos tiempos convul', 'berlin.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `id_prestamo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `fecha_prestamo` date NOT NULL,
  `fecha_devolucion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`) VALUES
(1, 'administrador'),
(2, 'cliente'),
(3, 'tallerista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salon`
--

CREATE TABLE `salon` (
  `id_salon` int(11) NOT NULL,
  `salon` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salon`
--

INSERT INTO `salon` (`id_salon`, `salon`) VALUES
(1, 'A'),
(2, 'B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller`
--

CREATE TABLE `taller` (
  `id_taller` int(11) NOT NULL,
  `taller` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `horario_inicio` time NOT NULL,
  `horario_fin` time NOT NULL,
  `fotografia` varchar(100) NOT NULL DEFAULT 'nofoto.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `taller`
--

INSERT INTO `taller` (`id_taller`, `taller`, `descripcion`, `horario_inicio`, `horario_fin`, `fotografia`) VALUES
(1, 'Taller de repostería', 'Ideal si no tienes ningún conocimiento en el arte de la pastelería. Recomendado para cualquier persona que desee dominar las técnicas básicas, aplicándolas en recetas tradicionales y variadas.2', '13:00:00', '14:00:00', 'reposteria.jpg'),
(3, 'Taller de costura', 'El Taller de costura CONFE te da un servicio integral: recibimos tu idea u orden de producción; si es necesario desarrollamos el diseño del producto; compramos o recibimos los materiales, los cortamos y los cosemos. Además, podemos, planchar, doblar, empacar y etiquetar el producto final para su venta al público. ¡10 años de experiencia nos avalan!', '16:00:00', '17:00:00', 'costura.jpg'),
(4, 'Taller de Musica', 'En este Taller se parte de que la música, como lenguaje universal, es un producto\r\ndel medio histórico-social y regional que tiene diferentes fuentes: parte de los\r\nrituales mágico-religiosos, la expresión del ser y la imitación de la naturaleza. El\r\neje central del programa es entender a la música como un medio que contribuye a\r\nla formación integral del sujeto alumno, ayudándolo a descubrirse y entenderse\r\ncomo producto de su medio.\r\n', '16:00:00', '18:00:00', 'musica.jpg'),
(5, 'Curso de carpintería', 'El curso de carpintería tiene el propósito que el estudiante conozca y comprenda la naturaleza de la madera y sus derivados, con el fin de entender cómo se puede modificar su materia prima, para crear diferentes tipos de objetos esenciales al desarrollo humano, tal como es el caso de los muebles para el hogar, las molduras, los escritorios, los marcos de la puerta, los escritorios, entre otros. Es fácil de aprender y solo se requiere tener conocimientos elementales.', '13:00:00', '15:00:00', 'carpinteria.jpg'),
(6, 'Taller de Pintura', 'Este taller ofrece clases de pintura', '16:00:00', '17:00:00', 'nofoto.png'),
(7, 'Taller de Pintura2', 'Taller de prueba', '16:00:00', '17:00:00', 'd42406ec1f3cddcba9d2a3a83992f20d.jpeg'),
(11, 'Fri fayer 2', 'eqweqwewqe', '18:19:00', '18:22:00', 'nofoto.png'),
(12, 'Fri fayer 3', 'asdasdasd', '18:21:00', '18:21:00', 'nofoto.png'),
(13, 'Fri fayer 4', 'sdfasdfsadf', '18:25:00', '18:28:00', 'nofoto.png'),
(14, 'Fri fayer 4', 'qaqewrwqer', '19:27:00', '18:30:00', 'nofoto.png'),
(15, 'Fri fayer 5', 'jsad.knas.nfdsdf', '18:42:00', '18:43:00', 'a906a9d5e62a14dfdacf86ae36e3b30d.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallerista`
--

CREATE TABLE `tallerista` (
  `id_usuario` int(11) NOT NULL,
  `id_taller` int(11) NOT NULL,
  `tratamiento` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tallerista`
--

INSERT INTO `tallerista` (`id_usuario`, `id_taller`, `tratamiento`) VALUES
(1, 3, 'Instructor'),
(2, 4, 'Tallerista'),
(3, 5, 'Tallerista'),
(1, 1, 'Tallerista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller_cliente`
--

CREATE TABLE `taller_cliente` (
  `id_taller` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `asistencia` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `taller_cliente`
--

INSERT INTO `taller_cliente` (`id_taller`, `id_cliente`, `asistencia`) VALUES
(1, 1, 0),
(1, 2, 0),
(1, 3, 0),
(1, 4, 0),
(4, 7, 0),
(5, 11, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller_tallerista`
--

CREATE TABLE `taller_tallerista` (
  `id_usuario` int(11) NOT NULL,
  `id_taller` int(11) DEFAULT NULL,
  `costo` decimal(10,2) DEFAULT NULL,
  `id_salon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `taller_tallerista`
--

INSERT INTO `taller_tallerista` (`id_usuario`, `id_taller`, `costo`, `id_salon`) VALUES
(1, 1, '30.00', 1),
(2, 4, '30.00', 1),
(3, 5, '50.00', 2),
(1, 1, NULL, 1),
(2, 13, NULL, 2),
(2, 13, '50.00', 2),
(3, 15, '50.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(32) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `primer_apellido` varchar(50) NOT NULL,
  `segundo_apellido` varchar(50) NOT NULL,
  `fotografia` varchar(100) NOT NULL DEFAULT 'nofoto.png',
  `telefono` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `correo`, `contrasena`, `nombre`, `primer_apellido`, `segundo_apellido`, `fotografia`, `telefono`) VALUES
(1, '18030537@itcelaya.edu.mx', '202cb962ac59075b964b07152d234b70', 'Edgar', 'Gonzalez', 'Gonzalez1', '9b892fca7162dc8a8511f3ef152a10d3.jpeg', '00000'),
(2, 'juan@gmail.com', '123', 'Juan', 'Perez', 'Perez', 'nofoto.png', '461111111'),
(3, 'luis@gmail.com', '123', 'Luis', 'Lopez', 'Lopez', 'nofoto.png', '4611111111'),
(4, 'cliente1@gmail.com', '123', 'NuevoCliente', 'Perez', 'Lopez', 'nofoto.png', '11111111'),
(5, 'cliente2@gmail.com', '123', 'Pedro', 'Delgado', 'Gutierrez', 'nofoto.png', '4611111111'),
(6, 'cliente3@gmail.com', '123', 'Cliente 3', 'J', 'Baltranena', 'nofoto.png', '4611111111'),
(7, 'cliente4@gmail.com', '123', 'Cliente 4', 'Perez', 'Tapia', 'nofoto.png', '4611111111'),
(13, '1111@gmail.com', '202cb962ac59075b964b07152d234b70', 'Pedro', 'Gonzalez', 'Tapia', 'nofot.png', '111111111'),
(21, '123', '202cb962ac59075b964b07152d234b70', '123', '123', '123', '23', '23'),
(23, 'cliente1@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ejemplo', '111', '111', '', '1111'),
(45, 'gonzalez.tapia.edgaralejandro@gmail.com', '202cb962ac59075b964b07152d234b70', 'Juanito', 'Lopez', 'Gonzalez', 'nofoto.png', '4611111111');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_rol`
--

CREATE TABLE `usuario_rol` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_rol`
--

INSERT INTO `usuario_rol` (`id_usuario`, `id_rol`) VALUES
(45, 2),
(45, 2),
(45, 2),
(48, 2),
(45, 2),
(1, 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_eventos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_eventos` (
`id_evento` int(11)
,`evento` varchar(100)
,`fecha` date
,`horario_inicio` time
,`horario_fin` time
,`fotografia` varchar(100)
,`impartido_por` varchar(101)
,`usuarios_inscritos` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_talleres`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_talleres` (
`id_taller` int(11)
,`taller` varchar(100)
,`horario_inicio` time
,`horario_fin` time
,`fotografia` varchar(100)
,`instructor` varchar(101)
,`usuarios_inscritos` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_eventos`
--
DROP TABLE IF EXISTS `vw_eventos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_eventos`  AS   (select `e`.`id_evento` AS `id_evento`,`e`.`evento` AS `evento`,`e`.`fecha` AS `fecha`,`e`.`horario_inicio` AS `horario_inicio`,`e`.`horario_fin` AS `horario_fin`,`e`.`fotografia` AS `fotografia`,concat(`u`.`nombre`,' ',`u`.`primer_apellido`) AS `impartido_por`,coalesce(count(distinct `ec`.`id_cliente`),0) AS `usuarios_inscritos` from ((`evento` `e` join `usuario` `u` on(`e`.`id_usuario` = `u`.`id_usuario`)) left join `evento_cliente` `ec` on(`e`.`id_evento` = `ec`.`id_evento`)) group by `e`.`id_evento`)  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_talleres`
--
DROP TABLE IF EXISTS `vw_talleres`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_talleres`  AS   (select `t`.`id_taller` AS `id_taller`,`t`.`taller` AS `taller`,`t`.`horario_inicio` AS `horario_inicio`,`t`.`horario_fin` AS `horario_fin`,`t`.`fotografia` AS `fotografia`,concat(`u`.`nombre`,' ',`u`.`primer_apellido`) AS `instructor`,coalesce(count(distinct `c`.`id_usuario`),0) AS `usuarios_inscritos` from ((((`usuario` `u` join `taller_tallerista` `tt` on(`u`.`id_usuario` = `tt`.`id_usuario`)) left join `taller` `t` on(`t`.`id_taller` = `tt`.`id_taller`)) left join `taller_cliente` `tc` on(`t`.`id_taller` = `tc`.`id_taller`)) left join `cliente` `c` on(`c`.`id_cliente` = `tc`.`id_cliente`)) group by `t`.`id_taller`)  ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `cliente_fk1` (`id_usuario`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`id_editorial`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `evento_fk1` (`id_salon`),
  ADD KEY `evento_fk2` (`id_usuario`);

--
-- Indices de la tabla `evento_cliente`
--
ALTER TABLE `evento_cliente`
  ADD KEY `evento_cliente_fk1` (`id_cliente`),
  ADD KEY `evento_cliente_fk2` (`id_evento`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `editorial_fk1` (`id_editorial`),
  ADD KEY `libro_fk2` (`id_genero`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`id_prestamo`),
  ADD KEY `prestamo_fk1` (`id_cliente`),
  ADD KEY `prestamo_fk2` (`id_libro`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `salon`
--
ALTER TABLE `salon`
  ADD PRIMARY KEY (`id_salon`);

--
-- Indices de la tabla `taller`
--
ALTER TABLE `taller`
  ADD PRIMARY KEY (`id_taller`);

--
-- Indices de la tabla `tallerista`
--
ALTER TABLE `tallerista`
  ADD KEY `tallerista_fk2` (`id_taller`);

--
-- Indices de la tabla `taller_cliente`
--
ALTER TABLE `taller_cliente`
  ADD KEY `taller_cliente_fk1` (`id_taller`),
  ADD KEY `taller_cliente_fk2` (`id_cliente`);

--
-- Indices de la tabla `taller_tallerista`
--
ALTER TABLE `taller_tallerista`
  ADD KEY `taller_tallerista_fk1` (`id_taller`),
  ADD KEY `taller_tallerista_fk2` (`id_salon`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `id_editorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `id_prestamo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `salon`
--
ALTER TABLE `salon`
  MODIFY `id_salon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `taller`
--
ALTER TABLE `taller`
  MODIFY `id_taller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_fk1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_fk1` FOREIGN KEY (`id_salon`) REFERENCES `salon` (`id_salon`),
  ADD CONSTRAINT `evento_fk2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `evento_cliente`
--
ALTER TABLE `evento_cliente`
  ADD CONSTRAINT `evento_cliente_fk1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `evento_cliente_fk2` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`);

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `editorial_fk1` FOREIGN KEY (`id_editorial`) REFERENCES `editorial` (`id_editorial`),
  ADD CONSTRAINT `libro_fk2` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`);

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_fk1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `prestamo_fk2` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id_libro`);

--
-- Filtros para la tabla `tallerista`
--
ALTER TABLE `tallerista`
  ADD CONSTRAINT `tallerista_fk2` FOREIGN KEY (`id_taller`) REFERENCES `taller` (`id_taller`);

--
-- Filtros para la tabla `taller_cliente`
--
ALTER TABLE `taller_cliente`
  ADD CONSTRAINT `taller_cliente_fk1` FOREIGN KEY (`id_taller`) REFERENCES `taller` (`id_taller`),
  ADD CONSTRAINT `taller_cliente_fk2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `taller_tallerista`
--
ALTER TABLE `taller_tallerista`
  ADD CONSTRAINT `taller_tallerista_fk1` FOREIGN KEY (`id_taller`) REFERENCES `taller` (`id_taller`),
  ADD CONSTRAINT `taller_tallerista_fk2` FOREIGN KEY (`id_salon`) REFERENCES `salon` (`id_salon`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
