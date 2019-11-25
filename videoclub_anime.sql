-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.27-0ubuntu0.18.04.1 - (Ubuntu)
-- SO del servidor:              Linux
-- HeidiSQL Versión:             10.1.0.5484
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para videoclub_anime
CREATE DATABASE IF NOT EXISTS `videoclub_anime` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `videoclub_anime`;

-- Volcando estructura para tabla videoclub_anime.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla videoclub_anime.categorias: ~9 rows (aproximadamente)
DELETE FROM `categorias`;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `nombre`) VALUES
	(1, 'Acción'),
	(2, 'Histórico'),
	(3, 'Shonen'),
	(4, 'Aventura'),
	(5, 'Comedia'),
	(6, 'Isekai'),
	(7, 'Drama'),
	(8, 'Fantasía'),
	(9, 'Seinen'),
	(11, 'Musical');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla videoclub_anime.categorias_pelicula_serie
CREATE TABLE IF NOT EXISTS `categorias_pelicula_serie` (
  `id_categoria` int(10) NOT NULL,
  `id_pelicula_serie` int(10) NOT NULL,
  KEY `categorias` (`id_categoria`),
  KEY `pelicula_serie` (`id_pelicula_serie`),
  CONSTRAINT `categorias_peli_serie` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`),
  CONSTRAINT `peli_serie_cat` FOREIGN KEY (`id_pelicula_serie`) REFERENCES `peliculas_y_series` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla videoclub_anime.categorias_pelicula_serie: ~39 rows (aproximadamente)
DELETE FROM `categorias_pelicula_serie`;
/*!40000 ALTER TABLE `categorias_pelicula_serie` DISABLE KEYS */;
INSERT INTO `categorias_pelicula_serie` (`id_categoria`, `id_pelicula_serie`) VALUES
	(1, 1),
	(2, 1),
	(1, 2),
	(7, 2),
	(1, 3),
	(4, 3),
	(8, 3),
	(1, 4),
	(7, 4),
	(8, 4),
	(2, 4),
	(1, 5),
	(1, 6),
	(7, 6),
	(8, 6),
	(2, 6),
	(1, 7),
	(7, 7),
	(8, 7),
	(1, 9),
	(7, 9),
	(8, 9),
	(7, 14),
	(9, 14),
	(3, 3),
	(1, 8),
	(5, 8),
	(1, 10),
	(7, 10),
	(5, 11),
	(7, 11),
	(8, 12),
	(1, 12),
	(1, 15),
	(7, 15),
	(8, 15),
	(5, 16),
	(11, 16),
	(6, 17),
	(1, 17),
	(8, 17);
/*!40000 ALTER TABLE `categorias_pelicula_serie` ENABLE KEYS */;

-- Volcando estructura para tabla videoclub_anime.lineas_lista_deseo
CREATE TABLE IF NOT EXISTS `lineas_lista_deseo` (
  `id_lista` int(11) NOT NULL,
  `id_pelicula_serie` int(11) NOT NULL,
  KEY `lista_deseos` (`id_lista`),
  KEY `peliculas_series` (`id_pelicula_serie`),
  CONSTRAINT `lista_deseos` FOREIGN KEY (`id_lista`) REFERENCES `lista_de_deseos` (`id`),
  CONSTRAINT `peliculas_series` FOREIGN KEY (`id_pelicula_serie`) REFERENCES `peliculas_y_series` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla videoclub_anime.lineas_lista_deseo: ~4 rows (aproximadamente)
DELETE FROM `lineas_lista_deseo`;
/*!40000 ALTER TABLE `lineas_lista_deseo` DISABLE KEYS */;
INSERT INTO `lineas_lista_deseo` (`id_lista`, `id_pelicula_serie`) VALUES
	(1, 2),
	(1, 11),
	(1, 3),
	(1, 14),
	(2, 6);
/*!40000 ALTER TABLE `lineas_lista_deseo` ENABLE KEYS */;

-- Volcando estructura para tabla videoclub_anime.lista_de_deseos
CREATE TABLE IF NOT EXISTS `lista_de_deseos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10) NOT NULL DEFAULT '0',
  `nombre` varchar(120) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `lista_usuario` (`id_usuario`),
  CONSTRAINT `lista_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla videoclub_anime.lista_de_deseos: ~0 rows (aproximadamente)
DELETE FROM `lista_de_deseos`;
/*!40000 ALTER TABLE `lista_de_deseos` DISABLE KEYS */;
INSERT INTO `lista_de_deseos` (`id`, `id_usuario`, `nombre`) VALUES
	(1, 1, 'Viendo'),
	(2, 1, 'Deseada');
/*!40000 ALTER TABLE `lista_de_deseos` ENABLE KEYS */;

-- Volcando estructura para tabla videoclub_anime.peliculas_y_series
CREATE TABLE IF NOT EXISTS `peliculas_y_series` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) NOT NULL,
  `descripcion` varchar(3000) NOT NULL DEFAULT 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
  `descripcion_corta` varchar(150) NOT NULL DEFAULT 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!',
  `imagen` varchar(255) NOT NULL DEFAULT 'http://placehold.it/700x400',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla videoclub_anime.peliculas_y_series: ~15 rows (aproximadamente)
DELETE FROM `peliculas_y_series`;
/*!40000 ALTER TABLE `peliculas_y_series` DISABLE KEYS */;
INSERT INTO `peliculas_y_series` (`id`, `nombre`, `descripcion`, `descripcion_corta`, `imagen`) VALUES
	(1, '91 Days', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'https://assetsds.cdnedge.bluemix.net/sites/default/files/styles/very_big_1/public/feature/images/91_days_revenge.jpg?itok=Bd7GwHJI'),
	(2, 'Aldnoah Zero', 'El descubrimiento de un hipergate en la Luna una vez permitió a la raza humana teletransportarse a Marte. Aquellos que decidieron establecerse allí desenterraron una tecnología mucho más avanzada que la de su planeta de origen, que llamaron "Aldnoah". Este descubrimiento condujo a la fundación del Imperio Vers de Marte y a una declaración de guerra contra los "terranos", aquellos que se quedaron en la Tierra. Sin embargo, una batalla en la luna, más tarde llamada "La caída del cielo", hizo que el hipergate explotara, destruyendo la luna y llevando a los dos planetas a establecer un alto el fuego incómodo.', 'El descubrimiento de un hipergate en la Luna una vez permitió a la raza humana teletransportarse a Marte.', 'https://i.ytimg.com/vi/Ooh_7cjiF_4/maxresdefault.jpg'),
	(3, 'Hunter x Hunter', 'Riquezas abundantes, tesoros escondidos, terroríficos monstruos y criaturas exóticas pueden encontrarse dispersos por todo el mundo... Gon parte en un viaje para convertirse en un Cazador profesional que arriesgue su vida en busca de lo desconocido. En el camino conocerá a otros aspirantes a Cazador como él: Kurapika, Leorio y Killua. ¿Podrá Gon superar los rigurosos requisitos del examen y convertirse en el mejor Cazador del mundo? ¡Su épico viaje está por comenzar!', 'Gon, un joven que vive en Isla Ballena, sueña con convertirse en un Cazador como lo era su padre, el cual se fue cuando Gon todavía era un niño.', 'https://dw9to29mmj727.cloudfront.net/promo/2016/5252-SeriesHeaders_HxH_2000x800.jpg'),
	(4, 'Fate Zero', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'https://www.playerone.vg/wp-content/uploads/2019/03/Fate-3-696x420.jpg'),
	(5, 'Dies Irae', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'https://universo-nintendo.com.mx/my_uploads/2017/08/Dies_Irae_Villanos_Principal.jpg'),
	(6, 'Izetta: The Last Witch', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'https://images-na.ssl-images-amazon.com/images/I/91rwBnhNuML._RI_.jpg'),
	(7, 'Saga of Tanya the Evil', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'https://i.ytimg.com/vi/fggISqEyuew/maxresdefault.jpg'),
	(8, 'Bungo Stray Dogs', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'https://www.fantasymundo.com/wp-content/uploads/2018/04/Bungou-Stray-Dogs-1.jpg'),
	(9, 'Akatsuki no Yona', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'https://static.puzzlefactory.pl/puzzle/200/275/original.jpg'),
	(10, 'Genei wo Kakeru Taiyou', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'https://c.wallhere.com/photos/90/6f/Genei_wo_Kakeru_Taiyou_Hoshikawa_Seira_Taiyou_Akari_anime_girls-120231.jpg!d'),
	(11, 'Kotoura-San', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'https://i.pinimg.com/originals/f6/19/7d/f6197d8cf71604191a14f290274934b1.jpg'),
	(12, 'Magical Girl Raising Project', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'https://bubbleblabber-wpengine.netdna-ssl.com/wp-content/uploads/2018/07/magicalgirl.jpg'),
	(13, 'Re:ZERO', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'https://pulpfictioncine.com/download/multimedia.normal.ad20fd84aa97d677.79587554766b762e6a70675f6e6f726d616c2e706e67.png'),
	(14, 'Berserk', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'https://www.deculture.es/wp-content/uploads/2016/07/berserk-anime-2016-header-1000x500.png'),
	(15, 'Parasyte ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'http://4.bp.blogspot.com/-HcnQdDvs2Sw/VWJ5Ekl2DVI/AAAAAAAACzE/2aP0WfwI2wI/s1600/parasyte_background_by_jomzypuff-d8e37r2.png'),
	(16, 'K-ON!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'https://media.shoanime.com/2018/06/K-ON-Foto-Portada.jpg'),
	(17, 'Tensei Shitara Slime Datta Ken', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!', 'https://ramenparados.com/wp-content/uploads/2018/03/Tensei-shitara-Slime-Datta-Ken-game-1000x559.jpg'),
	(18, 'Prueba anime', 'Esto es una prueba de un anime', 'Esto es una prueba de un anime en descripciÃ³n corta', 'https://i.pinimg.com/originals/ed/d2/92/edd292025958dcc5bda162510755d011.jpg');
/*!40000 ALTER TABLE `peliculas_y_series` ENABLE KEYS */;

-- Volcando estructura para tabla videoclub_anime.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `rol` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla videoclub_anime.roles: ~2 rows (aproximadamente)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `rol`) VALUES
	(1, 'empleado'),
	(2, 'cliente');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla videoclub_anime.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_rol` int(10) NOT NULL DEFAULT '2',
  `usuario` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `apellidos` varchar(120) NOT NULL,
  `email` varchar(300) NOT NULL,
  `foto_perfil` varchar(255) NOT NULL DEFAULT 'http://placehold.it/700x400',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_usuario` (`usuario`),
  UNIQUE KEY `email` (`email`),
  KEY `id_rol` (`id_rol`),
  CONSTRAINT `usuarios_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla videoclub_anime.usuarios: ~4 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `id_rol`, `usuario`, `password`, `nombre`, `apellidos`, `email`, `foto_perfil`) VALUES
	(1, 1, 'zaira', '81dc9bdb52d04dc20036dbd8313ed055', 'Zaira', 'Bravo', 'yalabravo@gmail.com', 'https://cdn.myanimelist.net/images/userimages/6486590.jpg'),
	(4, 2, 'nacho', '81dc9bdb52d04dc20036dbd8313ed055', 'Nacho', 'Gomis', 'igomis@cipfpbatoi.es', 'http://placehold.it/700x400'),
	(5, 2, 'prueba', '81dc9bdb52d04dc20036dbd8313ed055', 'Prueba', 'Registro', 'pruebaRegistro@gmail.com', 'http://placehold.it/700x400'),
	(24, 2, 'qwe', '22c276a05aa7c90566ae2175bcc2a9b0', 'qwe', 'qwe', 'wer@gmail.com', 'http://placehold.it/700x400');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla videoclub_anime.valoracion
CREATE TABLE IF NOT EXISTS `valoracion` (
  `id_peli_serie` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `puntuacion` tinyint(1) NOT NULL,
  KEY `id_usuario` (`id_usuario`),
  KEY `id_peli_serie` (`id_peli_serie`),
  CONSTRAINT `peliculas_series_val` FOREIGN KEY (`id_peli_serie`) REFERENCES `peliculas_y_series` (`id`),
  CONSTRAINT `usuarios_val` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla videoclub_anime.valoracion: ~15 rows (aproximadamente)
DELETE FROM `valoracion`;
/*!40000 ALTER TABLE `valoracion` DISABLE KEYS */;
INSERT INTO `valoracion` (`id_peli_serie`, `id_usuario`, `puntuacion`) VALUES
	(3, 1, 10),
	(4, 4, 9),
	(3, 5, 10),
	(1, 1, 5),
	(2, 1, 4),
	(2, 1, 5),
	(11, 1, 8),
	(11, 1, 9),
	(13, 1, 9),
	(4, 1, 10),
	(4, 1, 10),
	(17, 1, 8),
	(8, 1, 8),
	(9, 1, 6),
	(5, 1, 7);
/*!40000 ALTER TABLE `valoracion` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
