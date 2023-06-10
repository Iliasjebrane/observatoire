-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 12 mai 2022 à 22:50
-- Version du serveur :  8.0.21
-- Version de PHP : 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ck_obs_urbain`
--
CREATE DATABASE IF NOT EXISTS `ck_obs_urbain`;
USE `ck_obs_urbain`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title_fr` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `content_fr` text CHARACTER SET utf8 COLLATE utf8_bin,
  `content_ar` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `is_published` int DEFAULT '1',
  `inserting_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title_ar` (`title_ar`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title_fr`, `title_ar`, `content_fr`, `content_ar`, `is_published`, `inserting_time`, `is_deleted`) VALUES
(1, NULL, 'المرصد الحضري', NULL, 'أحدث المرصد الحضري لمدينة القنيطرة لجمع وتحليل البيانات والإحصاءات والمعلومات في مجال التنمية الحضرية المختلفة وتحويلها إلى مؤشرات يمكن تقيمها ومتابعتها ومعالجتها وتشغيلها لتتماشى مع متطلبات القياس والمقارنة والنشر و الحفظ قصد توفير رصد دائم لسير عملية التنمية الحضرية في جميع جوانبها الاقتصادية والاجتماعية والبيئية والعمرانية ، بهدف العمل على تحسين ظروف الحياة سكان مدينة القنيطرة والمساهمة في وضع السياسات ورسم الخطط التي تحقق أهداف التنمية الحضرية الشاملة والمستدامة.\r\n\r\nالتعريف بالمرصد الحضري:\r\n\r\nالمراصد الحضرية قضية بالغة الأهمية في عملية تحقيق شبكة معلومات حضرية هدفها الاستفادة من البيانات والمعلومات والمؤشرات الحضرية بهدف رسم سياسة حضرية فعالة وأكثر كفاءة هدفها توفير معلومات تساعد على رصد وتشخيص الوضع الراهن من أجل تحسين معدلات التقدم نحو مسيرة التنمية المنشودة والمستدامة .\r\n\r\nلذا أصبحت الحاجة ماسة لإنشاء مرصد حضري يتعامل مع مسيرة التنمية الحضرية، وبناءا عليه قرر المجلس الجماعي الحضري لمدينة القنيطرة إنشاء مرصد حضري، وتم ذلك ضمن برنامج التعاون الإقليمي بين المعهد العربي لإنماء المدن التابع لمنظمة المدن العربية وبرنامج الأمم المتحدة للمستوطنات البشرية.\r\n\r\nنشأة المرصد :\r\n\r\nأحدث المرصد الحضري لمدينة القنيطرة وهو أول مرصد حضري بالمملكة المغربية، لجمع، تحليل البيانات والإحصاءات والمعلومات في مجال التنمية الحضرية المختلفة وتحويلها إلى مؤشرات يمكن تقييمها ومتابعتها ومعالجتها وتشغيلها لتتماشى مع متطلبات القياس والمقارنة والنشر والحفظ قصد توفير رصد دائم لسير عملية التنمية الحضرية في جميع جوانبها الاقتصادية، الاجتماعية، البيئية والعمرانية، بهدف العمل على تحسين ظروف الحياة لسكان مدينة القنيطرة والمساهمة في وضع السياسات ورسم الخطط التي تحقق أهداف التنمية الحضرية الشاملة والمستدامة.\r\n\r\nوقد تم إحداثه ضمن برنامج التعاون الإقليمي بين المعهد العربي وبرنامج الأمم المتحدة للمستوطنات البشرية في إطار مذكرة التفاهم والتي تم التوقيع عليها بقصر البلدية للجماعة الحضرية لمدينة القنيطرة بتاريخ 30 نونبر 2011.', 1, '2022-04-20 12:00:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `axe`
--

DROP TABLE IF EXISTS `axe`;
CREATE TABLE IF NOT EXISTS `axe` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description_ar` text CHARACTER SET utf8 COLLATE utf8_bin,
  `name_fr` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `description_fr` text CHARACTER SET utf8 COLLATE utf8_bin,
  `img` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `ico` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `is_deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `axe`
--

INSERT INTO `axe` (`id`, `name_ar`, `description_ar`, `name_fr`, `description_fr`, `img`, `ico`, `is_deleted`) VALUES
(1, 'التنمية الاقتصادية', NULL, NULL, NULL, 'line-chart.png', 'bi bi-graph-up-arrow', 0),
(2, 'الحكامة المحلية', 'قدرات التدبير الجماعي، وتأهيل المجتمع المدني', NULL, NULL, 'users.png', 'bi bi-people-fill', 0),
(3, 'التنمية الاجتماعية\r\n والثقافية والرياضية', NULL, NULL, NULL, 'universal-acces.png', 'bi bi-boxes', 0),
(4, 'البيئة والتنمية المستدامة', NULL, NULL, NULL, 'globe.png', 'bi bi-building', 0);

-- --------------------------------------------------------

--
-- Structure de la table `proposition_solution`
--

DROP TABLE IF EXISTS `proposition_solution`;
CREATE TABLE IF NOT EXISTS `proposition_solution` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sous_axe` int NOT NULL,
  `probleme_ar` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `solution_ar` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `probleme_fr` text CHARACTER SET utf8 COLLATE utf8_bin,
  `solution_fr` text CHARACTER SET utf8 COLLATE utf8_bin,
  `adresse` text CHARACTER SET utf8 COLLATE utf8_bin,
  `time_inserted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sous_axes` (`sous_axe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `sous_axe`
--

DROP TABLE IF EXISTS `sous_axe`;
CREATE TABLE IF NOT EXISTS `sous_axe` (
  `id` int NOT NULL AUTO_INCREMENT,
  `objet_ar` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `objet_fr` text CHARACTER SET utf8 COLLATE utf8_bin,
  `axe` int NOT NULL,
  `is_deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `axe` (`axe`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `sous_axe`
--

INSERT INTO `sous_axe` (`id`, `objet_ar`, `objet_fr`, `axe`, `is_deleted`) VALUES
(1, 'التجارة', NULL, 1, 0),
(2, 'الصناعة', NULL, 1, 0),
(3, 'الصناعة التقليدية', NULL, 1, 0),
(4, 'تثمين المنتوج المحلي', NULL, 1, 0),
(5, 'السياحة', NULL, 1, 0),
(6, 'تثمين الرأسمال اللامادي', NULL, 1, 0),
(7, 'تأهيل التعاونيات والمقاولات', NULL, 1, 0),
(8, 'الصغرى والأنشطة المدرة للدخل', NULL, 1, 0),
(9, 'الاستثمار', NULL, 1, 0),
(10, 'شيء آخر يذكر', NULL, 1, 0),
(11, 'الموارد البشرية', NULL, 2, 0),
(12, 'تنظيم إدارة الجماعة، وخدمات القرب', NULL, 2, 0),
(13, 'رقمنة الإدارة وخدماتها', NULL, 2, 0),
(14, 'تدبير الملك العمومي', NULL, 2, 0),
(15, 'مشاريع الجماعة', NULL, 2, 0),
(16, 'تنمية المداخيل', NULL, 2, 0),
(17, 'أسواق الجماعة: (أسواق البيع بالجملة الحبوب والخضر والفواكه، المجزرة الجماعية...', NULL, 2, 0),
(18, 'الميزانية التشاركية', NULL, 2, 0),
(19, 'تأهيل هيئات المجتمع المدني', NULL, 2, 0),
(20, 'تدبير الدعم لفائدة الجمعيات', NULL, 2, 0),
(21, 'التعاون اللامركزي', NULL, 2, 0),
(22, 'معالجة قضايا محلية عبر التعاون اللامركزي', NULL, 2, 0),
(23, 'شيء آخر يذكر', NULL, 2, 0),
(24, 'الطرق والبنيات التحتية', NULL, 3, 0),
(25, 'النقل', NULL, 3, 0),
(26, 'التنقلات الحضرية والسير والجولان', NULL, 3, 0),
(27, 'خدمات الماء الصالح للشرب', NULL, 3, 0),
(28, 'خدمات الكهرباء', NULL, 3, 0),
(29, 'الإنارة العمومية', NULL, 3, 0),
(30, 'التربية والتعليم', NULL, 3, 0),
(31, 'التكوين المهني', NULL, 3, 0),
(32, 'الهدر المدرسي', NULL, 3, 0),
(33, 'الأمية', NULL, 3, 0),
(34, 'إنعاش الشغل', NULL, 3, 0),
(35, 'حفظ الصحة والتغطية الاجتماعية', NULL, 3, 0),
(36, 'العناية بالطفولة', NULL, 3, 0),
(37, 'الشأن الثقافي والفني', NULL, 3, 0),
(38, 'الشأن الرياضي', NULL, 3, 0),
(39, 'شيء آخر يذكر', NULL, 3, 0),
(40, 'المجال الغابوي والمنتزهات', NULL, 4, 0),
(41, 'نهر سبو', NULL, 4, 0),
(42, 'خدمات التطهير الصلب، وتثمين النفايات', NULL, 4, 0),
(43, 'خدمات التطهير السائل ومعالجة المياه العادمة', NULL, 4, 0),
(44, 'النسيج العمراني وإعداد التراب', NULL, 4, 0),
(45, 'تنمية المجال الأخضر', NULL, 4, 0),
(46, 'شيء آخر يذكر', NULL, 4, 0);

-- --------------------------------------------------------

--
-- Structure de la table `suggestion`
--

DROP TABLE IF EXISTS `suggestion`;
CREATE TABLE IF NOT EXISTS `suggestion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `proposeur` enum('personne','association') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `intitule` text CHARACTER SET utf8 COLLATE utf8_bin,
  `nom_ar` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `prenom_ar` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nom_fr` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `prenom_fr` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `telephone` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date_inserted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `piece_jointe` text CHARACTER SET utf8 COLLATE utf8_bin,
  `is_deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `proposition_solution`
--
ALTER TABLE `proposition_solution`
  ADD CONSTRAINT `proposition_solution_ibfk_1` FOREIGN KEY (`sous_axe`) REFERENCES `sous_axe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sous_axe`
--
ALTER TABLE `sous_axe`
  ADD CONSTRAINT `sous_axe_ibfk_1` FOREIGN KEY (`axe`) REFERENCES `axe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
