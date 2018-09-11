-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2018 a las 20:24:21
-- Versión del servidor: 10.1.24-MariaDB
-- Versión de PHP: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestionbodega1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasignacion_bodega_producto`
--

CREATE TABLE `tasignacion_bodega_producto` (
  `ID_BODEGA` int(11) NOT NULL,
  `ID_PRODUCTO` int(11) NOT NULL,
  `FECHA_HORA_ASIG` datetime DEFAULT NULL,
  `CANTIDAD_PRODUCTO` decimal(10,0) DEFAULT NULL,
  `OBSERVACION` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tasignacion_bodega_producto`
--

INSERT INTO `tasignacion_bodega_producto` (`ID_BODEGA`, `ID_PRODUCTO`, `FECHA_HORA_ASIG`, `CANTIDAD_PRODUCTO`, `OBSERVACION`) VALUES
(1, 1, '2018-09-03 15:33:29', '3450', 'cosas que se estÃ¡n almacenad'),
(1, 2, '2018-09-03 15:36:39', '12', 'dsfdsdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbodega`
--

CREATE TABLE `tbodega` (
  `ID_BODEGA` int(11) NOT NULL,
  `ID_TIPO_BODEGA` int(11) NOT NULL,
  `ID_EMPLEADO` int(11) NOT NULL,
  `DESCRIPCION_BODEGA` varchar(50) DEFAULT NULL,
  `OBSERVACION_BODEGA` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbodega`
--

INSERT INTO `tbodega` (`ID_BODEGA`, `ID_TIPO_BODEGA`, `ID_EMPLEADO`, `DESCRIPCION_BODEGA`, `OBSERVACION_BODEGA`) VALUES
(1, 3, 1, 'utiles de aceo baÃ±os', 'esta bodega es solo para almacenar cosas que son productos de aseo y limpieza de baÃ±os ojo esta Ã¡rea debe mantenerse alejada de el alcance de los niÃ±os menores de edad seguridad ante todo. ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdestino`
--

CREATE TABLE `tdestino` (
  `ID_DESTINO` int(11) NOT NULL,
  `DESCRIPCION_DESTINO` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tdestino`
--

INSERT INTO `tdestino` (`ID_DESTINO`, `DESCRIPCION_DESTINO`) VALUES
(1, 'RRHH');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdetalle_recepcion`
--

CREATE TABLE `tdetalle_recepcion` (
  `ITEM_RECEPCION` int(11) NOT NULL,
  `ID_RECEPCION` int(11) NOT NULL,
  `ID_BODEGA` int(11) NOT NULL,
  `ID_PRODUCTO` int(11) NOT NULL,
  `FECHA_HORA_ASIG` datetime DEFAULT NULL,
  `CANTIDAD_PRODUCTO` decimal(10,0) DEFAULT NULL,
  `LINEA_CODIGO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tdetalle_recepcion`
--

INSERT INTO `tdetalle_recepcion` (`ITEM_RECEPCION`, `ID_RECEPCION`, `ID_BODEGA`, `ID_PRODUCTO`, `FECHA_HORA_ASIG`, `CANTIDAD_PRODUCTO`, `LINEA_CODIGO`) VALUES
(1, 1, 1, 1, '2018-09-04 05:23:00', '12', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdetalle_salida`
--

CREATE TABLE `tdetalle_salida` (
  `ITEM_SALIDA` int(11) NOT NULL,
  `ID_SALIDA` int(11) NOT NULL,
  `ID_PRODUCTO` int(11) NOT NULL,
  `ID_BODEGA` int(11) NOT NULL,
  `FECHA_HORA_ASIG` datetime DEFAULT NULL,
  `CANTIDAD_PRODUCTO` decimal(10,0) DEFAULT NULL,
  `LINEA_CODIGO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdetalle_solicitud`
--

CREATE TABLE `tdetalle_solicitud` (
  `ITEM_SOLICITUD` int(11) NOT NULL,
  `ID_SOLICITUD` int(11) NOT NULL,
  `ID_PRODUCTO` int(11) NOT NULL,
  `FECHA_HORA_ASIG` datetime DEFAULT NULL,
  `CANTIDAD_PRODUCTO` decimal(10,0) DEFAULT NULL,
  `LINEA_CODIGO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tdetalle_solicitud`
--

INSERT INTO `tdetalle_solicitud` (`ITEM_SOLICITUD`, `ID_SOLICITUD`, `ID_PRODUCTO`, `FECHA_HORA_ASIG`, `CANTIDAD_PRODUCTO`, `LINEA_CODIGO`) VALUES
(1, 1, 1, '2018-06-28 05:35:17', '34', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `templeado`
--

CREATE TABLE `templeado` (
  `ID_EMPLEADO` int(11) NOT NULL,
  `ID_TIPO_EMPLEADO` int(11) NOT NULL,
  `RUT_EMPLEADO` varchar(12) DEFAULT NULL,
  `IMAGEN_EMPLEADO` varchar(200) DEFAULT NULL,
  `NOMBRES_EMPLEADO` varchar(50) DEFAULT NULL,
  `APELLIDOPATER_EMPLEADO` varchar(20) DEFAULT NULL,
  `APELLIDOMATER_EMPLEADO` varchar(20) DEFAULT NULL,
  `FECHA_NACIMIENTO` date DEFAULT NULL,
  `GENERO_EMPLEADO` varchar(10) DEFAULT NULL,
  `DIRECCION_EMPLEADO` varchar(50) DEFAULT NULL,
  `FONO_EMPLEADO` varchar(15) DEFAULT NULL,
  `EMAIL_EMPLEADO` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `templeado`
--

INSERT INTO `templeado` (`ID_EMPLEADO`, `ID_TIPO_EMPLEADO`, `RUT_EMPLEADO`, `IMAGEN_EMPLEADO`, `NOMBRES_EMPLEADO`, `APELLIDOPATER_EMPLEADO`, `APELLIDOMATER_EMPLEADO`, `FECHA_NACIMIENTO`, `GENERO_EMPLEADO`, `DIRECCION_EMPLEADO`, `FONO_EMPLEADO`, `EMAIL_EMPLEADO`) VALUES
(1, 1, '11111111-1', NULL, 'hola', 'jujji', 'fufuf', '1999-06-14', 'Hombre', 'fdsfdsfs213123', '2121434', 'dasdsaddasad@live.com'),
(2, 2, '22222222-2', NULL, 'Andrea Maria', 'smith', 'smithf', '1999-12-11', 'Mujer', 'fdsfdsfs213123', '3434', 'dasad@live.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproducto`
--

CREATE TABLE `tproducto` (
  `ID_PRODUCTO` int(11) NOT NULL,
  `ID_TIPO_PRODUCTO` int(11) NOT NULL,
  `NOMBRE_PRODUCTO` varchar(50) DEFAULT NULL,
  `IMAGEN_PRODUCTO` varchar(200) DEFAULT NULL,
  `DESCRIPCION_PRODUCTO` varchar(250) DEFAULT NULL,
  `OBSERVACION_PRODUCTO` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tproducto`
--

INSERT INTO `tproducto` (`ID_PRODUCTO`, `ID_TIPO_PRODUCTO`, `NOMBRE_PRODUCTO`, `IMAGEN_PRODUCTO`, `DESCRIPCION_PRODUCTO`, `OBSERVACION_PRODUCTO`) VALUES
(1, 1, 'popeye x3', NULL, 'elementos quimicos: H2O, H1, etc.', 'uso exclusivo para limpieza personal mantener alejado del alcance de niÃ±os '),
(2, 2, 'frit', NULL, 'papel igenico uso de baÃ±o', 'articulo de igene ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trecepcion`
--

CREATE TABLE `trecepcion` (
  `ID_RECEPCION` int(11) NOT NULL,
  `ID_EMPLEADO` int(11) NOT NULL,
  `ID_TIPO_DOCUMENTO` int(11) NOT NULL,
  `FECHA_HORA` datetime DEFAULT NULL,
  `NUMERO_TIPO_DOCUMENTO` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trecepcion`
--

INSERT INTO `trecepcion` (`ID_RECEPCION`, `ID_EMPLEADO`, `ID_TIPO_DOCUMENTO`, `FECHA_HORA`, `NUMERO_TIPO_DOCUMENTO`) VALUES
(1, 1, 2, '2018-08-14 05:13:00', '13244');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tsalida`
--

CREATE TABLE `tsalida` (
  `ID_SALIDA` int(11) NOT NULL,
  `ID_DESTINO` int(11) NOT NULL,
  `ID_EMPLEADO` int(11) NOT NULL,
  `FECHA_HORA` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tsalida`
--

INSERT INTO `tsalida` (`ID_SALIDA`, `ID_DESTINO`, `ID_EMPLEADO`, `FECHA_HORA`) VALUES
(1, 1, 1, '2018-08-14 06:11:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tsolicitud`
--

CREATE TABLE `tsolicitud` (
  `ID_SOLICITUD` int(11) NOT NULL,
  `ID_EMPLEADO` int(11) NOT NULL,
  `FECHA_HORA` datetime DEFAULT NULL,
  `OBSERVACION_SOLICITUD` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tsolicitud`
--

INSERT INTO `tsolicitud` (`ID_SOLICITUD`, `ID_EMPLEADO`, `FECHA_HORA`, `OBSERVACION_SOLICITUD`) VALUES
(1, 1, '2018-06-28 10:27:22', 'dsdsaddasdsadas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttipo_bodega`
--

CREATE TABLE `ttipo_bodega` (
  `ID_TIPO_BODEGA` int(11) NOT NULL,
  `DESCRIPCION` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ttipo_bodega`
--

INSERT INTO `ttipo_bodega` (`ID_TIPO_BODEGA`, `DESCRIPCION`) VALUES
(3, 'baÃ±o'),
(4, 'eerer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttipo_documento`
--

CREATE TABLE `ttipo_documento` (
  `ID_TIPO_DOCUMENTO` int(11) NOT NULL,
  `DESCRIPCION` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ttipo_documento`
--

INSERT INTO `ttipo_documento` (`ID_TIPO_DOCUMENTO`, `DESCRIPCION`) VALUES
(1, 'Boleta'),
(2, 'Factura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttipo_empleado`
--

CREATE TABLE `ttipo_empleado` (
  `ID_TIPO_EMPLEADO` int(11) NOT NULL,
  `DESCRIPCION` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ttipo_empleado`
--

INSERT INTO `ttipo_empleado` (`ID_TIPO_EMPLEADO`, `DESCRIPCION`) VALUES
(1, 'Directora encargada'),
(2, 'Bodegera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttipo_producto`
--

CREATE TABLE `ttipo_producto` (
  `ID_TIPO_PRODUCTO` int(11) NOT NULL,
  `DESCRIPCION` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ttipo_producto`
--

INSERT INTO `ttipo_producto` (`ID_TIPO_PRODUCTO`, `DESCRIPCION`) VALUES
(1, 'javon'),
(2, 'confort');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttipo_usuario`
--

CREATE TABLE `ttipo_usuario` (
  `ID_TIPO_USUARIO` int(11) NOT NULL,
  `DESCRIPCION` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ttipo_usuario`
--

INSERT INTO `ttipo_usuario` (`ID_TIPO_USUARIO`, `DESCRIPCION`) VALUES
(1, 'administrador'),
(2, 'usuario'),
(3, 'Informatico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuario`
--

CREATE TABLE `tusuario` (
  `ID_USUARIO` int(11) NOT NULL,
  `ID_TIPO_USUARIO` int(11) NOT NULL,
  `ID_EMPLEADO` int(11) NOT NULL,
  `DESCRIPCION_USUARIO` varchar(50) DEFAULT NULL,
  `CONTRASENA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tusuario`
--

INSERT INTO `tusuario` (`ID_USUARIO`, `ID_TIPO_USUARIO`, `ID_EMPLEADO`, `DESCRIPCION_USUARIO`, `CONTRASENA`) VALUES
(1, 1, 1, 'handy', '1234'),
(2, 2, 2, 'hi', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tasignacion_bodega_producto`
--
ALTER TABLE `tasignacion_bodega_producto`
  ADD PRIMARY KEY (`ID_BODEGA`,`ID_PRODUCTO`),
  ADD KEY `FK_PRODUCTO_1` (`ID_PRODUCTO`),
  ADD KEY `FK_BODEGA_1` (`ID_BODEGA`) USING BTREE;

--
-- Indices de la tabla `tbodega`
--
ALTER TABLE `tbodega`
  ADD PRIMARY KEY (`ID_BODEGA`),
  ADD KEY `FK_ID_TIPO_BODEGA` (`ID_TIPO_BODEGA`),
  ADD KEY `FK_ID_EMPLEADO` (`ID_EMPLEADO`);

--
-- Indices de la tabla `tdestino`
--
ALTER TABLE `tdestino`
  ADD PRIMARY KEY (`ID_DESTINO`);

--
-- Indices de la tabla `tdetalle_recepcion`
--
ALTER TABLE `tdetalle_recepcion`
  ADD KEY `FK_RECEPCION_3` (`ID_RECEPCION`),
  ADD KEY `FK_ASIGNACION_BODEGA_PRODUCTO_4` (`ID_BODEGA`,`ID_PRODUCTO`);

--
-- Indices de la tabla `tdetalle_salida`
--
ALTER TABLE `tdetalle_salida`
  ADD KEY `FK_SALIDA_1` (`ID_SALIDA`),
  ADD KEY `FK_ASIGNACION_BODEGA_PRODUCTO_3` (`ID_BODEGA`,`ID_PRODUCTO`);

--
-- Indices de la tabla `tdetalle_solicitud`
--
ALTER TABLE `tdetalle_solicitud`
  ADD KEY `FK_SOLICITUD_6` (`ID_SOLICITUD`),
  ADD KEY `FK_PRODUCTO_6` (`ID_PRODUCTO`);

--
-- Indices de la tabla `templeado`
--
ALTER TABLE `templeado`
  ADD PRIMARY KEY (`ID_EMPLEADO`),
  ADD KEY `FK_ID_TIPO_EMPLEADO` (`ID_TIPO_EMPLEADO`);

--
-- Indices de la tabla `tproducto`
--
ALTER TABLE `tproducto`
  ADD PRIMARY KEY (`ID_PRODUCTO`),
  ADD KEY `FK_ID_TIPO_PRODUCTO` (`ID_TIPO_PRODUCTO`);

--
-- Indices de la tabla `trecepcion`
--
ALTER TABLE `trecepcion`
  ADD PRIMARY KEY (`ID_RECEPCION`),
  ADD KEY `FK_ID_EMPLEADO_1` (`ID_EMPLEADO`),
  ADD KEY `FK_ID_TIPO_DOCUMENTO_1` (`ID_TIPO_DOCUMENTO`);

--
-- Indices de la tabla `tsalida`
--
ALTER TABLE `tsalida`
  ADD PRIMARY KEY (`ID_SALIDA`),
  ADD KEY `FK_ID_DESTINO_1` (`ID_DESTINO`),
  ADD KEY `FK_ID_EMPLEADO_2` (`ID_EMPLEADO`);

--
-- Indices de la tabla `tsolicitud`
--
ALTER TABLE `tsolicitud`
  ADD PRIMARY KEY (`ID_SOLICITUD`),
  ADD KEY `FK_ID_EMPLEADO_3` (`ID_EMPLEADO`);

--
-- Indices de la tabla `ttipo_bodega`
--
ALTER TABLE `ttipo_bodega`
  ADD PRIMARY KEY (`ID_TIPO_BODEGA`);

--
-- Indices de la tabla `ttipo_documento`
--
ALTER TABLE `ttipo_documento`
  ADD PRIMARY KEY (`ID_TIPO_DOCUMENTO`);

--
-- Indices de la tabla `ttipo_empleado`
--
ALTER TABLE `ttipo_empleado`
  ADD PRIMARY KEY (`ID_TIPO_EMPLEADO`);

--
-- Indices de la tabla `ttipo_producto`
--
ALTER TABLE `ttipo_producto`
  ADD PRIMARY KEY (`ID_TIPO_PRODUCTO`);

--
-- Indices de la tabla `ttipo_usuario`
--
ALTER TABLE `ttipo_usuario`
  ADD PRIMARY KEY (`ID_TIPO_USUARIO`);

--
-- Indices de la tabla `tusuario`
--
ALTER TABLE `tusuario`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD KEY `FK_TIPO_USUARIO_1` (`ID_TIPO_USUARIO`),
  ADD KEY `FK_EMPLEADO_8` (`ID_EMPLEADO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbodega`
--
ALTER TABLE `tbodega`
  MODIFY `ID_BODEGA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tdestino`
--
ALTER TABLE `tdestino`
  MODIFY `ID_DESTINO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `templeado`
--
ALTER TABLE `templeado`
  MODIFY `ID_EMPLEADO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tproducto`
--
ALTER TABLE `tproducto`
  MODIFY `ID_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `trecepcion`
--
ALTER TABLE `trecepcion`
  MODIFY `ID_RECEPCION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tsalida`
--
ALTER TABLE `tsalida`
  MODIFY `ID_SALIDA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tsolicitud`
--
ALTER TABLE `tsolicitud`
  MODIFY `ID_SOLICITUD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `ttipo_bodega`
--
ALTER TABLE `ttipo_bodega`
  MODIFY `ID_TIPO_BODEGA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `ttipo_documento`
--
ALTER TABLE `ttipo_documento`
  MODIFY `ID_TIPO_DOCUMENTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ttipo_empleado`
--
ALTER TABLE `ttipo_empleado`
  MODIFY `ID_TIPO_EMPLEADO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ttipo_producto`
--
ALTER TABLE `ttipo_producto`
  MODIFY `ID_TIPO_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ttipo_usuario`
--
ALTER TABLE `ttipo_usuario`
  MODIFY `ID_TIPO_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tusuario`
--
ALTER TABLE `tusuario`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tasignacion_bodega_producto`
--
ALTER TABLE `tasignacion_bodega_producto`
  ADD CONSTRAINT `FK_BODEGA_1` FOREIGN KEY (`ID_BODEGA`) REFERENCES `tbodega` (`ID_BODEGA`),
  ADD CONSTRAINT `FK_PRODUCTO_1` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `tproducto` (`ID_PRODUCTO`);

--
-- Filtros para la tabla `tbodega`
--
ALTER TABLE `tbodega`
  ADD CONSTRAINT `FK_ID_EMPLEADO` FOREIGN KEY (`ID_EMPLEADO`) REFERENCES `templeado` (`ID_EMPLEADO`),
  ADD CONSTRAINT `FK_ID_TIPO_BODEGA` FOREIGN KEY (`ID_TIPO_BODEGA`) REFERENCES `ttipo_bodega` (`ID_TIPO_BODEGA`);

--
-- Filtros para la tabla `tdetalle_recepcion`
--
ALTER TABLE `tdetalle_recepcion`
  ADD CONSTRAINT `FK_ASIGNACION_BODEGA_PRODUCTO_4` FOREIGN KEY (`ID_BODEGA`,`ID_PRODUCTO`) REFERENCES `tasignacion_bodega_producto` (`ID_BODEGA`, `ID_PRODUCTO`),
  ADD CONSTRAINT `FK_RECEPCION_3` FOREIGN KEY (`ID_RECEPCION`) REFERENCES `trecepcion` (`ID_RECEPCION`);

--
-- Filtros para la tabla `tdetalle_salida`
--
ALTER TABLE `tdetalle_salida`
  ADD CONSTRAINT `FK_ASIGNACION_BODEGA_PRODUCTO_3` FOREIGN KEY (`ID_BODEGA`,`ID_PRODUCTO`) REFERENCES `tasignacion_bodega_producto` (`ID_BODEGA`, `ID_PRODUCTO`),
  ADD CONSTRAINT `FK_SALIDA_1` FOREIGN KEY (`ID_SALIDA`) REFERENCES `tsalida` (`ID_SALIDA`);

--
-- Filtros para la tabla `tdetalle_solicitud`
--
ALTER TABLE `tdetalle_solicitud`
  ADD CONSTRAINT `FK_PRODUCTO_6` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `tproducto` (`ID_PRODUCTO`),
  ADD CONSTRAINT `FK_SOLICITUD_6` FOREIGN KEY (`ID_SOLICITUD`) REFERENCES `tsolicitud` (`ID_SOLICITUD`);

--
-- Filtros para la tabla `templeado`
--
ALTER TABLE `templeado`
  ADD CONSTRAINT `FK_ID_TIPO_EMPLEADO` FOREIGN KEY (`ID_TIPO_EMPLEADO`) REFERENCES `ttipo_empleado` (`ID_TIPO_EMPLEADO`);

--
-- Filtros para la tabla `tproducto`
--
ALTER TABLE `tproducto`
  ADD CONSTRAINT `FK_ID_TIPO_PRODUCTO` FOREIGN KEY (`ID_TIPO_PRODUCTO`) REFERENCES `ttipo_producto` (`ID_TIPO_PRODUCTO`);

--
-- Filtros para la tabla `trecepcion`
--
ALTER TABLE `trecepcion`
  ADD CONSTRAINT `FK_ID_EMPLEADO_1` FOREIGN KEY (`ID_EMPLEADO`) REFERENCES `templeado` (`ID_EMPLEADO`),
  ADD CONSTRAINT `FK_ID_TIPO_DOCUMENTO_1` FOREIGN KEY (`ID_TIPO_DOCUMENTO`) REFERENCES `ttipo_documento` (`ID_TIPO_DOCUMENTO`);

--
-- Filtros para la tabla `tsalida`
--
ALTER TABLE `tsalida`
  ADD CONSTRAINT `FK_ID_DESTINO_1` FOREIGN KEY (`ID_DESTINO`) REFERENCES `tdestino` (`ID_DESTINO`),
  ADD CONSTRAINT `FK_ID_EMPLEADO_2` FOREIGN KEY (`ID_EMPLEADO`) REFERENCES `templeado` (`ID_EMPLEADO`);

--
-- Filtros para la tabla `tsolicitud`
--
ALTER TABLE `tsolicitud`
  ADD CONSTRAINT `FK_ID_EMPLEADO_3` FOREIGN KEY (`ID_EMPLEADO`) REFERENCES `templeado` (`ID_EMPLEADO`);

--
-- Filtros para la tabla `tusuario`
--
ALTER TABLE `tusuario`
  ADD CONSTRAINT `FK_EMPLEADO_8` FOREIGN KEY (`ID_EMPLEADO`) REFERENCES `templeado` (`ID_EMPLEADO`),
  ADD CONSTRAINT `FK_TIPO_USUARIO_1` FOREIGN KEY (`ID_TIPO_USUARIO`) REFERENCES `ttipo_usuario` (`ID_TIPO_USUARIO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
