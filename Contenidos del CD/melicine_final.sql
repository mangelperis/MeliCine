-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2015 a las 21:23:53
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `melicine`
--
CREATE DATABASE IF NOT EXISTS `melicine` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `melicine`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE IF NOT EXISTS `generos` (
  `Codigo` smallint(3) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(40) NOT NULL,
  `Descripcion` tinytext,
  PRIMARY KEY (`Codigo`),
  KEY `Codigo` (`Codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`Codigo`, `Nombre`, `Descripcion`) VALUES
(1, 'Drama', 'en el cine, películas que se centran principalmente en el desarrollo de un conflicto entre los protagonistas, o del protagonista con su entorno o consigo mismo'),
(2, 'Comedia', 'películas realizadas con la intención de provocar humor, entretenimiento o/y risa en el espectador.'),
(3, 'Acción', 'cuyo argumento implica una interacción moral entre el «bien» y el «mal» llevada a su fin por la violencia o la fuerza física.'),
(4, ' Aventura', 'contienen situaciones de peligro y riesgo.'),
(5, ' Cine de terror', 'realizadas con la intención de provocar tensión, miedo y/o el sobresalto en la audiencia.'),
(6, 'Cine de ciencia ficción', 'presentan la progresión de lo desconocido a lo conocido por el descubrimiento de una serie de enigmas.'),
(7, ' Cine romántico', 'hacen hincapié en los elementos amorosos y románticos.'),
(8, 'Cine musical', 'contienen interrupciones en su desarrollo, para dar un breve receso por medio de un fragmento musical cantado o acompañados de una coreografía.'),
(9, 'Melodrama', 'tiene una carga emocional o moral muy fuerte o emotiva, atendiendo al gusto de cada persona.'),
(10, 'Cine catástrofe', 'el tema principal es una gran catástrofe  (por ejemplo grandes incendios, terremotos, naufragios o una hipotética colisión de un asteroide contra la Tierra).'),
(11, ' Suspense', 'realizadas con la intención de provocar tensión en el espectador. También suele utilizarse la palabra thriller para designar películas de este tipo, aunque hay sutiles diferencias.'),
(12, 'Fantasía ', 'contienen hechos, mundos, criaturas o cosas fantasiosas.'),
(13, 'Pornográfico', 'contiene escenas sexuales explícitas.'),
(14, 'Cine de explotación ', 'se caracteriza por explotar un tema escabroso o sensacionalista.'),
(15, ' Histórico', 'la acción de estas películas ocurre en el pasado, a menudo con intención de recreación histórica.'),
(16, 'Policíaco', 'la derrota del «Mal» en el reino de la actividad criminal.'),
(17, 'Bélico', 'campos de batalla y posiciones que pertenecen a un tiempo de guerra.'),
(18, ' Western', 'del período colonial a la era moderna de los Estados Unidos de América, a menudo mitificándolos.'),
(19, ' Ciencia ficción', 'el espacio dominado por el hombre o civilizaciones de un posible futuro.'),
(20, 'Fantasía', 'mundos míticos que provienen únicamente de la imaginación de su autor.'),
(21, 'Deportivo', 'entornos o acontecimientos relacionados con un deporte.'),
(22, 'Cine de espías', ''),
(23, 'Cine de artes marciales', ''),
(24, 'Cine de zombis', ''),
(25, 'Cine de catástrofes', ''),
(26, 'Cine gore', ''),
(27, 'Cine de misterio', ''),
(28, 'Animación', 'películas compuestas de fotogramas dibujados a mano que, pasados rápidamente, producen ilusión de movimiento. También se incluyen aquí las películas generadas íntegramente mediante la informática.'),
(29, 'Imagen real, o live action ', 'en oposición a la animación, películas filmadas con actores reales, de «carne y hueso».'),
(30, 'Cine mudo', ''),
(31, 'Cine sonoro', ''),
(32, 'Cine 3D', ''),
(33, 'Cine arte', ''),
(34, 'Cine de serie B', ''),
(35, 'Cine independiente', ''),
(36, 'Mockbuster', ''),
(37, 'Metraje encontrado (género)', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE IF NOT EXISTS `paises` (
  `Codigo` varchar(2) NOT NULL,
  `Pais` varchar(100) NOT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `Codigo` (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`Codigo`, `Pais`) VALUES
('AD', 'Andorra'),
('AE', 'United Arab Emirates'),
('AF', 'Afghanistan'),
('AG', 'Antigua and Barbuda'),
('AI', 'Anguilla'),
('AL', 'Albania'),
('AM', 'Armenia'),
('AO', 'Angola'),
('AP', 'Asia/Pacific Region'),
('AQ', 'Antarctica'),
('AR', 'Argentina'),
('AS', 'American Samoa'),
('AT', 'Austria'),
('AU', 'Australia'),
('AW', 'Aruba'),
('AX', 'Aland Islands'),
('AZ', 'Azerbaijan'),
('BA', 'Bosnia & Herzegovina'),
('BB', 'Barbados'),
('BD', 'Bangladesh'),
('BE', 'Belgium'),
('BF', 'Burkina Faso'),
('BG', 'Bulgaria'),
('BH', 'Bahrain'),
('BI', 'Burundi'),
('BJ', 'Benin'),
('BL', 'Saint Barthelemy'),
('BM', 'Bermuda'),
('BN', 'Brunei Darussalam'),
('BO', 'Bolivia'),
('BQ', 'Bonair'),
('BR', 'Brazil'),
('BS', 'Bahamas'),
('BT', 'Bhutan'),
('BW', 'Botswana'),
('BY', 'Belarus'),
('BZ', 'Belize'),
('CA', 'Canada'),
('CC', 'Cocos (Keeling) Islands'),
('CD', 'Cong'),
('CF', 'Central African Republic'),
('CG', 'Congo'),
('CH', 'Switzerland'),
('CI', 'Cote D''Ivoire'),
('CK', 'Cook Islands'),
('CL', 'Chile'),
('CM', 'Cameroon'),
('CN', 'China'),
('CO', 'Colombia'),
('CR', 'Costa Rica'),
('CU', 'Cuba'),
('CV', 'Cape Verde'),
('CW', 'Curacao'),
('CX', 'Christmas Island'),
('CY', 'Cyprus'),
('CZ', 'Czech Republic'),
('DE', 'Alemania'),
('DJ', 'Djibouti'),
('DK', 'Denmark'),
('DM', 'Dominica'),
('DO', 'República Dominicana'),
('DZ', 'Algeria'),
('EC', 'Ecuador'),
('EE', 'Estonia'),
('EG', 'Egypt'),
('EH', 'Western Sahara'),
('ER', 'Eritrea'),
('ES', 'España'),
('ET', 'Ethiopia'),
('EU', 'Europe'),
('FI', 'Finland'),
('FJ', 'Fiji'),
('FK', 'Falkland Islands (Malvinas)'),
('FM', 'Micronesi'),
('FO', 'Faroe Islands'),
('FR', 'Francia'),
('GA', 'Gabon'),
('GB', 'Reino Unido'),
('GD', 'Grenada'),
('GE', 'Georgia'),
('GF', 'French Guiana'),
('GG', 'Guernsey'),
('GH', 'Ghana'),
('GI', 'Gibraltar'),
('GL', 'Greenland'),
('GM', 'Gambia'),
('GN', 'Guinea'),
('GP', 'Guadeloupe'),
('GQ', 'Equatorial Guinea'),
('GR', 'Grecia'),
('GS', 'South Georgia and the South Sandwich Islands'),
('GT', 'Guatemala'),
('GU', 'Guam'),
('GW', 'Guinea-Bissau'),
('GY', 'Guyana'),
('HK', 'Hong Kong'),
('HN', 'Honduras'),
('HR', 'Croatia'),
('HT', 'Haiti'),
('HU', 'Hungary'),
('ID', 'Indonesia'),
('IE', 'Irlanda'),
('IL', 'Israel'),
('IM', 'Isle of Man'),
('IN', 'India'),
('IO', 'British Indian Ocean Territory'),
('IQ', 'Iraq'),
('IR', 'Ira'),
('IS', 'Iceland'),
('IT', 'Italia'),
('JE', 'Jersey'),
('JM', 'Jamaica'),
('JO', 'Jordan'),
('JP', 'Japon'),
('KE', 'Kenya'),
('KG', 'Kyrgyzstan'),
('KH', 'Cambodia'),
('KI', 'Kiribati'),
('KM', 'Comoros'),
('KN', 'Saint Kitts and Nevis'),
('KP', 'Kore'),
('KR', 'Kore'),
('KW', 'Kuwait'),
('KY', 'Cayman Islands'),
('KZ', 'Kazakhstan'),
('LA', 'Lao People''s Democratic Republic'),
('LB', 'Lebanon'),
('LC', 'Saint Lucia'),
('LI', 'Liechtenstein'),
('LK', 'Sri Lanka'),
('LR', 'Liberia'),
('LS', 'Lesotho'),
('LT', 'Lithuania'),
('LU', 'Luxembourg'),
('LV', 'Latvia'),
('LY', 'Libya'),
('MA', 'Morocco'),
('MC', 'Monaco'),
('MD', 'Moldov'),
('ME', 'Montenegro'),
('MF', 'Saint Martin'),
('MG', 'Madagascar'),
('MH', 'Marshall Islands'),
('MK', 'Macedonia'),
('ML', 'Mali'),
('MM', 'Myanmar'),
('MN', 'Mongolia'),
('MO', 'Macau'),
('MP', 'Northern Mariana Islands'),
('MQ', 'Martinique'),
('MR', 'Mauritania'),
('MS', 'Montserrat'),
('MT', 'Malta'),
('MU', 'Mauritius'),
('MV', 'Maldives'),
('MW', 'Malawi'),
('MX', 'Mexico'),
('MY', 'Malaysia'),
('MZ', 'Mozambique'),
('NA', 'Namibia'),
('NC', 'New Caledonia'),
('NE', 'Niger'),
('NF', 'Norfolk Island'),
('NG', 'Nigeria'),
('NI', 'Nicaragua'),
('NL', 'Netherlands'),
('NO', 'Norway'),
('NP', 'Nepal'),
('NR', 'Nauru'),
('NU', 'Niue'),
('NZ', 'New Zealand'),
('OM', 'Oman'),
('PA', 'Panama'),
('PE', 'Peru'),
('PF', 'French Polynesia'),
('PG', 'Papua New Guinea'),
('PH', 'Philippines'),
('PK', 'Pakistan'),
('PL', 'Poland'),
('PM', 'Saint Pierre and Miquelon'),
('PN', 'Pitcairn Islands'),
('PR', 'Puerto Rico'),
('PS', 'Palestinian Territory'),
('PT', 'Portugal'),
('PW', 'Palau'),
('PY', 'Paraguay'),
('QA', 'Qatar'),
('RE', 'Reunion'),
('RO', 'Romania'),
('RS', 'Serbia'),
('RU', 'Russian Federation'),
('RW', 'Rwanda'),
('SA', 'Saudi Arabia'),
('SB', 'Solomon Islands'),
('SC', 'Seychelles'),
('SD', 'Sudan'),
('SE', 'Sweden'),
('SG', 'Singapore'),
('SH', 'Saint Helena'),
('SI', 'Slovenia'),
('SJ', 'Svalbard and Jan Mayen'),
('SK', 'Slovakia'),
('SL', 'Sierra Leone'),
('SM', 'San Marino'),
('SN', 'Senegal'),
('SO', 'Somalia'),
('SR', 'Suriname'),
('SS', 'South Sudan'),
('ST', 'Sao Tome and Principe'),
('SV', 'El Salvador'),
('SX', 'Sint Maarten (Dutch part)'),
('SY', 'Syrian Arab Republic'),
('SZ', 'Swaziland'),
('TC', 'Turks and Caicos Islands'),
('TD', 'Chad'),
('TF', 'French Southern Territories'),
('TG', 'Togo'),
('TH', 'Thailand'),
('TJ', 'Tajikistan'),
('TK', 'Tokelau'),
('TL', 'Timor-Leste'),
('TM', 'Turkmenistan'),
('TN', 'Tunisia'),
('TO', 'Tonga'),
('TR', 'Turkey'),
('TT', 'Trinidad and Tobago'),
('TV', 'Tuvalu'),
('TW', 'Taiwan'),
('TZ', 'Tanzani'),
('UA', 'Ukraine'),
('UG', 'Uganda'),
('UM', 'United States Minor Outlying Islands'),
('US', 'Estados Unidos'),
('UY', 'Uruguay'),
('UZ', 'Uzbekistan'),
('VA', 'Holy See (Vatican City State)'),
('VC', 'Saint Vincent and the Grenadines'),
('VE', 'Venezuela'),
('VG', 'Virgin Island'),
('VI', 'Virgin Island'),
('VN', 'Vietnam'),
('VU', 'Vanuatu'),
('WF', 'Wallis and Futuna'),
('WS', 'Samoa'),
('YE', ''),
('YT', 'Mayotte'),
('ZA', 'South Africa'),
('ZM', 'Zambia'),
('ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pases`
--

CREATE TABLE IF NOT EXISTS `pases` (
  `NumPase` int(11) NOT NULL AUTO_INCREMENT,
  `NumSala` smallint(2) NOT NULL,
  `NumSesion` int(11) NOT NULL,
  `DiaPase` date NOT NULL,
  `Vendidas` int(3) unsigned NOT NULL DEFAULT '0',
  `CodigoPeli` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`NumPase`,`NumSala`,`NumSesion`),
  KEY `fk_codigo` (`CodigoPeli`),
  KEY `fk_numses` (`NumSesion`),
  KEY `fk_numsala1` (`NumSala`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `pases`
--

INSERT INTO `pases` (`NumPase`, `NumSala`, `NumSesion`, `DiaPase`, `Vendidas`, `CodigoPeli`) VALUES
(7, 1, 1, '2015-05-22', 150, 3),
(8, 2, 3, '2015-05-22', 130, 3),
(9, 1, 4, '2015-05-22', 110, 3),
(10, 1, 6, '2015-05-26', 1, 25),
(11, 1, 8, '2015-05-26', 200, 23),
(12, 2, 5, '2015-05-26', 1, 27),
(13, 2, 8, '2015-05-26', 0, 27),
(14, 1, 10, '2015-05-26', 1, 25),
(15, 2, 4, '2015-05-26', 0, 21),
(16, 3, 7, '2015-05-26', 1, 3),
(17, 3, 4, '2015-05-26', 0, 3),
(18, 4, 1, '2015-05-26', 5, 19),
(19, 4, 7, '2015-05-26', 0, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE IF NOT EXISTS `peliculas` (
  `Codigo` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(50) NOT NULL,
  `Genero` smallint(3) NOT NULL,
  `Pais` varchar(2) NOT NULL,
  `Duracion` int(3) DEFAULT NULL,
  `Director` varchar(50) NOT NULL,
  `Reparto` text NOT NULL,
  `Sinopsis` text NOT NULL,
  `Calificacion` varchar(10) NOT NULL,
  `Trailer` tinytext,
  `Distribuidora` varchar(50) DEFAULT NULL,
  `Estado` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '0 = NADA / 1 = CARTELERA / 2 = PROXIMAMENTE',
  `Cartel` varchar(100) NOT NULL DEFAULT 'no_disponible.jpg',
  `Fecha estreno` date DEFAULT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `Codigo` (`Codigo`),
  KEY `Genero` (`Genero`),
  KEY `Pais` (`Pais`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`Codigo`, `Titulo`, `Genero`, `Pais`, `Duracion`, `Director`, `Reparto`, `Sinopsis`, `Calificacion`, `Trailer`, `Distribuidora`, `Estado`, `Cartel`, `Fecha estreno`) VALUES
(1, 'Sweet Home ', 5, 'ES', 80, 'Rafa Martínez', 'Ingrid García Jonsson, Bruno Sevilla, Oriol Tarrida, Eduardo Lloveras, Miguel Ángel Alarcón, Luka Peros, José María Blanco, Mariona Perrier', 'Una pareja decide pasar una noche romántica en un piso de un edificio semiabandonado al que se cuelan porque ella trabaja como asesora de inmuebles para el Ayuntamiento y tiene las llaves. Durante la velada descubren que unos encapuchados han asesinado al único inquilino que quedaba en el edificio… y ellos se convierten en su nuevo objetivo', '+16', 'https://youtu.be/08c1Qtakai4', ' Filmax ', 0, 'c76b430f13f697c7e8f6389e61fe2e85_Generic.jpg', NULL),
(2, 'WALKING ON SUNSHINE ', 8, 'GB', 93, 'Max Giwa, Dania Pasquini', 'Greg Wise, Joelle Koissi, Leona Lewis, Annabel Scholey, Adrian Palmer, Hannah Arterton, Shane Salter, Val Monk, Terry Noble, Susan Fordham, Katy Brand', 'Maddie está decidida a organizar su boda con Raf, su prometido e invita a su hermana Taylor sin saber que ambos tuvieron una relación amorosa tiempo atrás.', 'TP', 'http://www.dailymotion.com/video/x2i67vm_walking-on-sunshine-trailer-espanol_shortfilms', 'IM Global', 0, '22f4ea961711bcef2dcb95904ab7d319_Generic.jpg', NULL),
(3, 'Mad Max: Furia en la carretera', 6, 'US', 120, 'George Miller', '  Tom Hardy, Nicholas Hoult, Charlize Theron, Rosie Huntington-Whiteley, Zoe Kravitz, Riley Keough, Nathan Jones, Josh Helman, Angus Sampson, Courtney Eaton, Hugh Keays-Byrne, Megan Gale, Richard Carter, Abbey Lee, Melissa Jaffer.		', '  Del director George Miller, creador del género apocalíptico y maestro de la legendaria franquicia “Mad Max”, viene “Mad Max: Furia en la carretera”, una vuelta al mundo del guerrero de la carretera, Max Rockatansky.\r\n\r\nPerseguido por su turbulento pasado, Mad Max cree que la mejor forma de sobrevivir es ir solo por el mundo. Sin embargo, se ve arrastrado a formar parte de un grupo que huye a través del desierto en un War Rig conducido por una Emperatriz de élite: Furiosa.\r\n\r\nEscapan de una Ciudadela tiranizada por Immortan Joe, a quien han arrebatado algo irreemplazable. Enfurecido, el Señor de la Guerra moviliza a todas sus bandas y persigue implacablemente a los rebeldes en la Guerra de la Carretera de altas revoluciones.\r\n\r\n		', 'Pendiente', 'https://youtu.be/GvsFoGIuRX4', 'Warner Bros', 1, '0506f7e99ccc886a2e2f977708283230_Generic.jpg', '0000-00-00'),
(4, 'Cautivos', 11, 'CA', 113, 'Atom Egoyan', 'Ryan Reynolds, Scott Speedman, Mireille Enos, Rosario Dawson, Bruce Greenwood, Kevin Durand, Alexia Fast, Peyton Kennedy, Brendan Gall, Aaron Poole, Jason Blicker', 'Ocho años después de la desaparición de Cassandra, algunos indicios perturbadores parecen indicar que aún está viva. La policía, sus padres y la propia Cassandra intentan esclarecer el misterio de su desaparición.', '+16', 'http://www.dailymotion.com/video/x2ng87k_cautivos-the-captive-trailer-espanol_shortfilms', 'entertainmentone', 0, 'b457c0017d1721e3652b5a778416af89_Generic.jpg', NULL),
(5, 'Suite francesa ', 17, 'GB', 107, 'Saul Dibb', 'Michelle Williams, Matthias Schoenaerts, Kristin Scott Thomas, Sam Riley, Margot Robbie, Ruth Wilson, Alexandra Maria Lara, Tom Schilling, Eileen Atkins, Lambert Wilson', 'Historia ambientada en los años 40, durante la ocupación alemana del ejército nazi en Francia. Gira en torno a un romance que surge entre Lucille Angellier, una campesina francesa que tiene a su marido prisionero de guerra, y un soldado oficial alemán.', 'TP', 'https://youtu.be/7dTb9o_ugeY', 'entertainmentone', 0, 'f8bcd4658f70bd8a859b57787d226a7b_Generic.jpg', NULL),
(6, 'Tomorrowland: El mundo del mañana', 19, 'US', 210, 'Brad Bird', 'George Clooney, Hugh Laurie, Britt Robertson, Raffey Cassidy, Judy Greer, Kathryn Hahn, Lochlyn Munro, Chris Bauer, Tim McGraw, Paul McGillion, Raiden Integra', 'Unidos por el mismo destino, un adolescente inteligente y optimista lleno de curiosidad científica y un antiguo niño prodigio inventor hastiado por las desilusiones se embarcan en una peligrosa misión para desenterrar los secretos de un enigmático lugar localizado en algún lugar del tiempo y el espacio conocido en la memoria colectiva como “Tomorrowland”.', 'TP', 'https://youtu.be/4sDYIehRoFc', 'Walt Disney Pictures', 2, '597849.jpg', '2015-05-29'),
(7, 'San Andrés ', 10, 'US', 0, 'Brad Peyton', 'Dwayne "The Rock" Johnson, Alexandra Daddario, Carla Gugino, Ioan Gruffudd, Art Parkinson, Todd Williams, Kylie Minogue', 'La falla de San Andrés acaba cediendo ante las temibles fuerzas telúricas y desencadena un terremoto de magnitud 9 en California. El piloto de un helicóptero de búsqueda y rescate (Johnson) y su ex esposa viajan juntos desde Los Ángeles hasta San Francisco para salvar a su única hija. Pero su tortuoso viaje hacia el norte solamente es el comienzo, y cuando piensan que ya ha acabado lo peor todo vuelve a empezar.', 'TP', 'https://youtu.be/jFFJIGbPntU', 'Warner Bros', 2, '9be642f7225e5efa14b57559f92dbcc8_Generic.jpg', '2015-05-29'),
(8, 'Jurassic World', 19, 'US', 0, 'Colin Trevorrow', 'Chris Pratt, Bryce Dallas Howard, Omar Sy, Jake Johnson, Vincent D’Onofrio, Judy Greer, Ty Simpkins, BD Wong, Nick Robinson, Irrfan Khan, Katie McGrath, Lauren Lapkus', 'Nueva entrega de la saga iniciada por Steven Spielberg. Veintidós años después de lo ocurrido en Jurassic Park, la isla Nublar ha sido transformada en un parque temático, Jurassic Wold, con versiones «domesticadas» de algunos de los dinosaurios más conocidos. Cuando todo parece ir a la perfección y ser el negocio del siglo, un nuevo dinosaurio de especie todavía desconocida y que es mucho más inteligente de lo que se pensaba, comienza a causar estragos entre los habitantes del Parque.', '+16', 'https://youtu.be/zfURZ-Vb8_E', 'UNIVERSAL', 2, 'da5507c9bb8a579bf46234b854d61f26_Generic.jpg', '2015-06-12'),
(9, 'Pan', 12, 'US', 0, 'Joe Wright', 'Levi Miller, Garrett Hedlund, Hugh Jackman, Rooney Mara, Amanda Seyfried, Adeel Akhtar, Nonso Anozie, Cara Delevingne, Kathy Burke, Jack Lowden, Jimmy Vee, Phill Martin, Ami Metcalf, Jack Charles ', 'Versión alternativa del cuento de Peter Pan, en el que éste es un villano al que debe capturar un policía llamado Garfio (Hook)', 'TP', 'https://www.youtube.com/watch?v=Ohg6H3MJpPo', 'Warner Bros', 2, '4bdefd0ccc884b69ab8e23af52af4cb4_Generic.jpg', '2015-07-17'),
(10, 'Ted 2', 2, 'US', 0, 'Seth MacFarlane', 'Mark Wahlberg, Seth MacFarlane, Amanda Seyfried, Liam Neeson, Morgan Freeman, Patrick Warburton, Dennis Haysbert, Michael Dorn, Martin Klebba, Richard Schiff, Jessica Barth, Sam J. Jones, Bill Smitrovich, Maggie Geha, Kimberly Howe ', 'Seth MacFarlane vuelve en calidad de guionista, director y protagonista doblador de TED 2, la secuela de Universal y Media Rights Capital de la comedia para adultos más taquillera de toda la historia del cine.\r\n\r\nEl actor Mark Wahlberg regresa a su papel, así como los guionistas Alec Sulkin y Wellesley Wild. Seth MacFarlane produce esta comedia junto a Scott Stuber, de Bluegrass Films, John Jacobs y Jason Clark.', 'TP', 'https://youtu.be/gAWixrfbsJs', 'UNIVERSAL', 2, '9de29084b1a4a9f1d8f48c35cfb15fc5_Generic.jpg', '2015-07-31'),
(11, 'Star Wars Episodio VII: El despertar de la Fuerza', 19, 'US', 0, 'J.J. Abrams', 'Harrison Ford, Carrie Fisher, Mark Hamill, John Boyega, Daisy Ridley, Adam Driver, Oscar Isaac, Andy Serkis, Domhnall Gleeson, Max von Sydow, Anthony Daniels, Peter Mayhew, Kenny Baker, Maisie Richardson-Sellers, Katie Jarvis, Gwendoline Christie, Lupita Nyong’o, Crystal Clarke, Pip Andersen, Christina Chong, Miltos Yerolemou, Warwick Davis, Iko Uwais, Yayan Ruhian, Cecep Arif Rahman', 'Séptima entrega de la saga Star Wars. Fue confirmada en octubre de 2012, cuando The Walt Disney Company compró LucasFilms por 4.000 millones de dólares. Se ambientará 30 años después de "El retorno del Jedi" y según Disney, presentará ''un trío de de nuevos personajes y algunos rostros conocidos''.', 'TP', 'https://youtu.be/0DD1zPUxIRc', 'LucasFilms', 2, '2a1efaf12d575df75b411da94af12a4a_Generic.jpg', '2015-12-18'),
(19, '¡Upsss! ¿Dónde está Noé?', 28, 'US', 95, 'Toby Genkel, Sean McCormack', '[Voces] Carla Becker, Ava Connolly, Lotta Doll, Tina Eschmann, Patrick FitzSymons, Tara Flynn, Franciska Friede, Robert Kotulla, Dermot Magennis, Callum Maloney, Robert Missler, Aileen Mythen, Alan Stanford, Paul Tylak. 	', 'Es el fin del mundo. Un diluvio tan inmenso y fuerte como para borrar la faz de la tierra. Por suerte para Dave y su hijo Finny, un par de torpes Nestrians - animales de los que nadie ha oído hablar nunca - han conseguido colarse en el Arca de Noé con la ayuda de Hazel y su hija Leah, dos Grymps.\r\n\r\nCuando todo parecía ir sobre ruedas... ¡los pequeños se caen por la borda! Ahora Finny y Leah tendrán que sobrevivir a la inundación y a depredadores hambrientos para poder llegar a la cima de una montaña, mientras que Dave y Hazel deberán dejar de lado sus diferencias para conseguir que el arca dé la vuelta y puedan salvar a sus crías. Definitivamente este viaje no va a ir viento en popa. Una animada y divertida historia, llena de aventuras. 	', 'TP', 'https://youtu.be/vMLFRAxY5cg', '', 1, '68904008f966ea86ffdacaa829261e3d_L.jpg', '2015-05-22'),
(20, 'Poltergeist', 5, 'US', 100, 'Gil Kenan', 'Sam Rockwell, Rosemarie DeWitt, Jared Harris, Nicholas Braun, Jane Adams, Saxon Sharbino, Kennedi Clements, Kyle Catlett, Susan Heyward, Soma Bhatia, Karen Ivany, L.A. Lopes. 	', 'Una joven familia recibe la visita de fantasmas en su propia casa. Al principio las apariciones parecen amistosas, mueven objetos en la casa, lo que divierte a sus ocupantes.\r\n\r\nPero entonces se vuelven agresivos y comienza una espiral de terror que termina con la desaparición de la hija pequeña. 	', '+18', 'https://www.youtube.com/watch?v=rjfK14dBrjc', '20th Century Fox', 0, '69fe78446c890576263dc762460b71ba_L.jpg', '2015-05-22'),
(21, 'Lazos de sangre', 11, 'FR', 120, 'Guillaume Canet', 'Clive Owen, Billy Crudup, Marion Cotillard, Zoe Saldana, Mila Kunis, James Caan, Matthias Schoenaerts, Noah Emmerich, Lili Taylor, Charlie Tahan, Griffin Dunne, John Ventimiglia, Domenick Lombardozzi, Eve Hewson, Jamie Hector, Yul Vazquez. 	', 'El actor y director francés Guillaume Canet debuta en Hollywood con el thriller Blood Ties, una historia criminal ambientada en la América de los 70 dentro del seno de una familia desestructurada.\r\n\r\nUna conflictiva relación entre ambos hermanos, de caracteres radicalmente opuestos pero unidos, es la columna vertebral sobre la que se sostiene toda la obra cinematográfica. 	', '+16', 'https://www.youtube.com/watch?v=kz2oU5uTewA', 'La Aventura', 1, '9ab257875e071eb99bbac5fecacacf3b_L.jpg', '2015-05-22'),
(22, '52 Martes', 1, 'AU', 125, 'Sophie Hyde', 'Tilda Cobham-Hervey, Del Herbert-Jane, Mario Späte, Beau Travis Williams, Imogen Archer, Sam Althuizen, Danica Moors, Susan Hyde, Greg Marsh, Audrey Mason-Hyde, Susie Skinner. 	', 'La madre de Billie, una chica de 16 años, va a someterse a una operación de cambio de sexo. Durante el tiempo que dure el proceso ésta le pide que sólo se vean los martes por la tarde. Filmada en el transcurso de un año, una vez a la semana, todos los martes, 52 Martes es una historia sobre la identidad, el deseo y la sexualidad cargada de emociones y belleza. 	', 'TP', 'https://www.youtube.com/watch?v=BjNMpnxliR0', 'Miramax', 0, '3ea2730a45b35096a85ff9c85714e595_L.jpg', '2015-05-22'),
(23, 'Con la magia en los zapatos', 2, 'US', 86, 'Thomas McCarthy', 'Adam Sandler, Method Man, Ellen Barkin, Melonie Diaz, Dan Stevens, Fritz Weaver, Yul Vazquez, Steve Buscemi, Dustin Hoffman, Kevin Breznahan, Craig Walker, Sondra James, Fabrizio Brienza, Douglas Taurel, Danny Mastrogiorgio. 	', 'Max Simkin (Adam Sandler) repara zapatos en la misma tienda neoyorquina que ha pertenecido a su familia durante generaciones. Desencantado con su rutina diaria, Max tropieza con una reliquia familiar que le permite ser testigo de excepción de la vida de sus clientes y ver el mundo de una forma totalmente nueva. A veces caminar con los zapatos de otra persona es la única manera de descubrir quién eres realmente. 	', 'TP', 'https://youtu.be/g9I7Z6005PU', 'eOne', 1, 'd9db825e422ebda626554a84f9df350a_L.jpg', '2015-05-22'),
(24, 'Lo mejor para ella', 1, 'US', 103, 'Mike Binder', 'Kevin Costner, Octavia Spencer, Anthony Mackie, Jennifer Ehle, Gillian Jacobs, Bill Burr, Andre Holland, Jillian Estell, Mpho Koaho, Joe Chrest, Patrick Kearns, Paula Newsome, Kenneth Kynt Bryan, Indigo, David Jensen.', '“Lo mejor para ella” narra la historia de Elliot Anderson (Kevin Costner) un hombre golpeado por el reciente fallecimiento de su mujer que debe criar en soledad a su querida nieta Eloise.\r\n\r\nLas cosas se complicarán cuando Rowena, la abuela paterna (Octavia Spencer) reclama judicialmente la custodia de la niña, quien se verá envuelta en un pleito que enfrentará a dos familias que la quieren profundamente. Durante el proceso las dos partes asumirán sus errores pasados y aprenderán que el perdón y la reconciliación entre ambas familias es el único camino para proteger a Eloise y velar por su felicidad. 	', 'Pendiente', 'https://youtu.be/CapEfBDJGiw', 'Inopia Films', 0, 'a5db8c1256359d5e22d55281b76436ae_L.jpg', '2015-05-22'),
(25, 'Caza al asesino', 3, 'US', 140, 'Pierre Morel', 'Sean Penn, Idris Elba, Javier Bardem, Ray Winstone, Mark Rylance, Jasmine Trinca, Peter Franzén, Mark Schardan, Rachel Lascar, Melina Matthews, Daniel Westwood, Deborah Rosan, Jorge Leon Martinez, David Blakeley. 	', 'El francotirador Jim Terrier (Sean Penn), miembro de un equipo de mercenarios asesinos, mata al Ministro de Minas del Congo. A causa de este disparo, Terrier se ve obligado a huir y esconderse para proteger a los miembros de su equipo. Años después, en su regreso al Congo, Terrier descubrirá que esta vez él es el blanco de un escuadrón asesino. 	', '+18', 'https://youtu.be/dOfBuulx8aI', 'DeAPlaneta', 1, '88d9a0cb55d81b8a3601ff79f8d5c68d_L.jpg', '2015-05-22'),
(26, 'Corn Island', 1, 'GE', 100, 'George Ovashvili', 'Ilyas Salman, Tamer Levent, Mariam Buturishvili, Irakli Samushia. 	', 'El río Enguri forma la frontera entre Georgia y la República de Abjasia. Las tensiones entre los dos países no han disminuido desde la guerra de1992-93. Cada primavera, el río trae suelo fecundo desde el Cáucaso hasta las llanuras de Abjasia y noroeste de Georgia, creando pequeñas islas: pequeños grupos de tierra de nadie.\r\n\r\nLas islas son refugios para la vida silvestre, pero en ocasiones también para el hombre. Nuestra historia comienza cuando un viejo granjero de Abjasia pone el pie en una de las islas. El anciano se construye una cabaña para él y su nieta adolescente, él ara la tierra y juntos siembran maíz. El maíz madura y la nieta florece, el anciano se enfrenta al ciclo ineludible de la vida. 	', 'TP', 'https://youtu.be/0ktHpeetfjs', 'PACOPOCH CINEMA', 0, 'e3098320bc9e754479592595bffb1b21_L.jpg', '2015-05-22'),
(27, 'Dando la nota: Aún más alto', 2, 'US', 93, 'Elizabeth Banks', 'Anna Kendrick, Elizabeth Banks, Hailee Steinfeld, Katey Sagal, Alexis Knapp, Brittany Snow, Anna Camp, Rebel Wilson, Freddie Stroma, Skylar Astin, Hana Mae Lee, Brea Grant, Adam DeVine, Birgitte Hjort Sørensen, C.J. Perry. 	', 'Las Barden Bellas vuelven en DANDO LA NOTA – AÚN MÁS ALTO, la secuela de la taquillera película original.\r\n\r\nLas Barden Bellas se han convertido en el grupo a capella más famoso e importante del campus y se van a presentar al Campeonato mundial de coros. 	', '+12', 'https://youtu.be/wUhWZwowtjA', '', 1, 'f551403a022c7e1586bb98fb6eccb44f_L.jpg', '2015-05-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE IF NOT EXISTS `salas` (
  `NumSala` smallint(2) NOT NULL AUTO_INCREMENT,
  `Butacas` int(3) unsigned NOT NULL,
  PRIMARY KEY (`NumSala`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`NumSala`, `Butacas`) VALUES
(1, 200),
(2, 225),
(3, 150),
(4, 175);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE IF NOT EXISTS `sesiones` (
  `NumSesion` int(11) NOT NULL AUTO_INCREMENT,
  `HoraIni` time NOT NULL,
  PRIMARY KEY (`NumSesion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `sesiones`
--

INSERT INTO `sesiones` (`NumSesion`, `HoraIni`) VALUES
(1, '16:00:00'),
(2, '18:00:00'),
(3, '20:00:00'),
(4, '22:00:00'),
(5, '16:30:00'),
(6, '17:30:00'),
(7, '18:30:00'),
(8, '19:30:00'),
(9, '20:30:00'),
(10, '21:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID` smallint(2) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(60) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `password` tinytext NOT NULL,
  `email` varchar(50) NOT NULL,
  `usermaestro` tinyint(1) NOT NULL DEFAULT '2',
  PRIMARY KEY (`ID`,`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Usuarios ' AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `usuario`, `nombre`, `password`, `email`, `usermaestro`) VALUES
(1, 'Administrador', 'Administrador', '$1$K3/.LL2.$nxhV2tvrHTttkRLfabvqA/', 'administrador@melicine.com', 1),
(2, 'pepito', 'Pepito taquilla', '$1$Th/.ga2.$i9sqzck464oxHSXwXjV4F/', 'pepito@melicine.com', 2),
(3, 'demo', 'demo', '$1$Ek/.7A..$HJQlqmoThEtis9sca5Cgj0', 'demo@melicine.com', 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pases`
--
ALTER TABLE `pases`
  ADD CONSTRAINT `fk_codigo` FOREIGN KEY (`CodigoPeli`) REFERENCES `peliculas` (`Codigo`),
  ADD CONSTRAINT `fk_numsala1` FOREIGN KEY (`NumSala`) REFERENCES `salas` (`NumSala`),
  ADD CONSTRAINT `fk_numses` FOREIGN KEY (`NumSesion`) REFERENCES `sesiones` (`NumSesion`);

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `fk_gen` FOREIGN KEY (`Genero`) REFERENCES `generos` (`Codigo`),
  ADD CONSTRAINT `fk_pais` FOREIGN KEY (`Pais`) REFERENCES `paises` (`Codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
