--Voila le premier apercu de la base de donnée que j'avais commencé à imaginer. J y avais injecté les clés primaires et secondaires
-- Base de données : `restaurant`

CREATE DATABASE IF NOT EXISTS 'restaurant' SET utf8mb4 COLLATE utf8mb4_general_ci;

-- table `restaurant`

CREATE TABLE `restaurant` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) NOT NULL,
  `couverts` int(11) NOT NULL,
  `ouv_midi` varchar(250) NOT NULL,
  `ferm_midi` varchar(250) NOT NULL,
  `ouv_soir` varchar(250) NOT NULL,
  `ferm_soir` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `restaurant` (`nom`, `couverts`, `ouv_midi`, `ferm_midi`, `ouv_soir`, `ferm_soir`) VALUES
('Quai Antique', 60, '12h00', '15h00', '19h00', '22h00');

-- --------------------------------------------------------

-- table `reservation`

CREATE TABLE `reservation` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `couverts` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `allergie` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

-- table `admin`

CREATE TABLE `admin` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `e-mail` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `admin` (`e-mail`, `password`) VALUES
('admin@admin.com', 'YE5qxKCv725tf6');

-- --------------------------------------------------------

-- table `users`

CREATE TABLE `users` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `e-mail` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*-- --------------------------------------------------------

-- table `galerie`

CREATE TABLE `galerie` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `photo` varchar(250) NOT NULL,
  `titre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------*/

-- table `menu`

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

-- table `plats`

CREATE TABLE `entrée` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredients` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

-- table `plat`

CREATE TABLE `plat` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredients` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

-- table `dessert`

CREATE TABLE `dessert` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredients` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

-- table `ingrédients`

CREATE TABLE `ingrédients` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) NOT NULL,
  ADD FOREIGN KEY (plats_id)
  REFERENCES plats (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

COMMIT;
