-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generato il: Gen 14, 2017 alle 21:42
-- Versione del server: 10.0.27-MariaDB-cll-lve
-- Versione PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `solx10bz_db`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `calendar_events`
--

CREATE TABLE IF NOT EXISTS `calendar_events` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `URL` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`student_id`),
  KEY `student_id` (`student_id`),
  KEY `category_name` (`category_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dump dei dati per la tabella `calendar_events`
--

INSERT INTO `calendar_events` (`id`, `student_id`, `start_date`, `end_date`, `name`, `URL`, `category_name`) VALUES
(1, 714233, '2017-01-18 10:00:00', '2017-01-18 12:00:00', 'Esame Ingegneria del Software', '', 'Esami'),
(1, 718520, '2017-01-18 10:00:00', '2017-01-18 12:00:00', 'Esame Ingegneria del Software', '', 'Esami'),
(2, 714233, '2017-01-31 06:00:00', '2017-01-31 21:00:00', 'Scandenza Pagamento, Seconda Rata', '', 'Tasse'),
(2, 718520, '2017-01-31 10:00:00', '2017-01-31 12:00:00', 'Scandenza Pagamento, Seconda Rata', '', 'Tasse'),
(3, 714233, '2017-01-20 01:00:00', '2017-01-20 21:00:00', 'Iscrizioni laurea Marzo 2017', '', 'Laurea'),
(4, 714233, '2017-02-01 08:00:00', '2017-01-01 12:00:00', 'Scadenza iscrizioni laurea Marzo 2017', '', 'Laurea');

-- --------------------------------------------------------

--
-- Struttura della tabella `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `name` varchar(255) NOT NULL,
  `URL` varchar(255) DEFAULT NULL,
  `icon` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL DEFAULT '#373a3c',
  `section_name` varchar(255) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `categories`
--

INSERT INTO `categories` (`name`, `URL`, `icon`, `description`, `color`, `section_name`) VALUES
('Bacheca', NULL, 'pin', 'Some quick example text to build on the card title.', '#373a3c', 'Servizi e Mobilita'),
('Borsa di Studio', NULL, 'handbag', 'Some quick example text to build on the card title.', '#373a3c', 'Info e Carriera'),
('Carriera', 'career.php', 'graduation', 'Some quick example text to build on the card title.', '#373a3c', 'Info e Carriera'),
('Contatti', NULL, 'people', 'Some quick example text to build on the card title.', '#373a3c', 'Info e Carriera'),
('Email', NULL, 'envelope', 'Some quick example text to build on the card title.', '#d9534f', 'Info e Carriera'),
('Erasmus', NULL, 'plane', 'Some quick example text to build on the card title.', '#373a3c', 'Servizi e Mobilita'),
('Esami', NULL, 'badge', 'Some quick example text to build on the card title.', '#0275d8', 'Info e Carriera'),
('Laurea', NULL, 'eyeglass', 'Some quick example text to build on the card title.', '#373a3c', 'Info e Carriera'),
('Lezioni', NULL, 'clock', 'Some quick example text to build on the card title.', '#373a3c', 'Info e Carriera'),
('Materiale', NULL, 'book-open', 'Some quick example text to build on the card title.', '#373a3c', 'Info e Carriera'),
('Piano di Studi', 'plan.php', 'notebook', 'Some quick example text to build on the card title.', '#373a3c', 'Info e Carriera'),
('Rinuncia agli Studi', NULL, 'fire', 'Some quick example text to build on the card title.', '#373a3c', 'Info e Carriera'),
('Servizi Convenzionati', NULL, 'credit-card', 'Some quick example text to build on the card title.', '#373a3c', 'Servizi e Mobilita'),
('Sospensione', NULL, 'cup', 'Some quick example text to build on the card title.', '#373a3c', 'Info e Carriera'),
('Tasse', NULL, 'wallet', 'Some quick example text to build on the card title.', '#5bc0de', 'Info e Carriera'),
('Tirocinio', NULL, 'briefcase', 'Some quick example text to build on the card title.', '#373a3c', 'Info e Carriera'),
('Trasferimento', NULL, 'directions', 'Some quick example text to build on the card title.', '#373a3c', 'Info e Carriera'),
('Trasporti', NULL, 'location-pin', 'Some quick example text to build on the card title.', '#373a3c', 'Servizi e Mobilita');

-- --------------------------------------------------------

--
-- Struttura della tabella `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `duration` int(255) NOT NULL,
  `total_credits` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `courses`
--

INSERT INTO `courses` (`id`, `name`, `location`, `duration`, `total_credits`) VALUES
(1, 'Ingegneria e Scienze Informatiche', 'Cesena (FC)', 3, 180);

-- --------------------------------------------------------

--
-- Struttura della tabella `curriculum`
--

CREATE TABLE IF NOT EXISTS `curriculum` (
  `name` varchar(255) NOT NULL,
  `course_id` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`name`,`course_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `curriculum`
--

INSERT INTO `curriculum` (`name`, `course_id`, `description`) VALUES
('Ingegneria Informatica', 1, 'Il curriculum prevede lo svolgimento dei seguenti esami: </br>\r\n- Sistemi e architetture per l''automazione (6 CFU) - Secondo Anno  </br>\r\n- Sistemi embedded e internet of things (6 CFU) - Terzo Anno'),
('Scienze Informatiche', 1, 'Il curriculum prevede lo svolgimento dei seguenti esami:</br>\r\n- Algoritmi Numerici  (6 CFU) - Secondo Anno </br>\r\n- Laboratorio di Basi di Dati (6 CFU)  - Terzo Anno');

-- --------------------------------------------------------

--
-- Struttura della tabella `exams`
--

CREATE TABLE IF NOT EXISTS `exams` (
  `id` int(255) NOT NULL,
  `credits` int(255) NOT NULL,
  `year_of_course` int(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `course_id` int(255) NOT NULL,
  `optional` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `exams`
--

INSERT INTO `exams` (`id`, `credits`, `year_of_course`, `subject`, `course_id`, `optional`) VALUES
(17865, 12, 1, 'Analisi Matematica 1', 1, 0),
(22765, 6, 3, 'Programmazione di sistemi mobile', 1, 0),
(23456, 12, 1, 'Algoritmi e Strutture Dati', 1, 0),
(26754, 6, 3, 'Programmazione di Sistemi Embedded', 1, 0),
(26985, 6, 1, 'Idoneita'' Inglese B1', 1, 0),
(37625, 12, 2, 'Sistemi Operativi', 1, 0),
(37654, 6, 2, 'Algebra e Geometria', 1, 0),
(45634, 12, 1, 'Programmazione', 1, 0),
(45667, 12, 3, 'Programmazione di Reti', 1, 0),
(55346, 12, 3, 'Algoritmi Numerici', 1, 1),
(56745, 6, 2, 'Controlli Automatici', 1, 0),
(56784, 6, 3, 'Informatica e Diritto', 1, 1),
(56786, 6, 3, 'Laboratorio di Basi di Dati', 1, 1),
(56834, 6, 3, 'Computer Graphics', 1, 0),
(59873, 12, 3, 'Ingegneria del software', 1, 0),
(67548, 6, 2, 'Elettronica', 1, 0),
(88773, 6, 3, 'Tecnologie Web', 1, 0),
(99152, 12, 2, 'Programmazione ad Oggetti', 1, 0),
(99875, 12, 2, 'Architetture degli elaboratori', 1, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `student_id` int(255) NOT NULL,
  `time` varchar(30) NOT NULL,
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `login_attempts`
--

INSERT INTO `login_attempts` (`student_id`, `time`) VALUES
(714233, '1484448009'),
(714233, '1484448028');

-- --------------------------------------------------------

--
-- Struttura della tabella `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL,
  `student_id` int(255) NOT NULL,
  `pub_date` datetime NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `read_flag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`student_id`),
  UNIQUE KEY `id` (`id`),
  KEY `student_id` (`student_id`),
  KEY `category_name` (`category_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `notifications`
--

INSERT INTO `notifications` (`id`, `student_id`, `pub_date`, `category_name`, `subject`, `description`, `read_flag`) VALUES
(1, 714233, '2017-01-11 07:00:00', 'Email', 'Nuova email', 'Hai ricevuto una nuova email', 0),
(2, 714233, '2016-12-20 10:00:00', 'Esami', 'Risultati Esame', 'Usciti i voti di "Algoritmi e Strutture Dati" del 13/12/2016', 0),
(3, 714233, '2017-01-02 15:00:00', 'Piano di Studi', 'Compilazione Piano di Studi', 'Aperte le compilazioni per il tuo piano di studi', 0),
(4, 718520, '2016-12-13 07:00:00', 'Erasmus', 'Bandi erasmus 2016/2017', 'Usciti i bandi erasmus. Prenotati entro il 31/01/2017.', 0),
(5, 718520, '2017-01-10 08:00:00', 'Tasse', 'Scadenza Pagamento', 'Scadenza seconda rata del 31/01/2017', 0),
(6, 718520, '2017-01-11 07:00:00', 'Carriera', 'Verbalizzazione voto', 'Il voto è stato verbalizzato', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `plan_modifications`
--

CREATE TABLE IF NOT EXISTS `plan_modifications` (
  `type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `URL` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `plan_modifications`
--

INSERT INTO `plan_modifications` (`type`, `description`, `icon`, `URL`) VALUES
('Curriculum', 'Scelta del curriculum', 'graduation', NULL),
('Piano di Studi', 'Scegli le materie del piano di studi', 'book-open', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT 'img/user.png',
  `matriculation_year` int(255) NOT NULL,
  `course_id` int(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `curriculum` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`student_id`),
  KEY `course_id` (`course_id`),
  KEY `curriculum` (`curriculum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `students`
--

INSERT INTO `students` (`student_id`, `name`, `surname`, `photo`, `matriculation_year`, `course_id`, `email`, `password`, `salt`, `curriculum`, `active`) VALUES
(222222, 'Giulio', 'Miao', 'img/user.png', 2016, 1, 'giulio@miao.com', 'd7ac9a45f82c0e3940e0ecd1ce533f655e3585d41f5330250c1d8a159594202eec3f00e9252b6b5b2c87f9182417198cc283d83581c96dce805e7596a0b7708f', '9c8900ee86061deccc9b338fde35a2474a708461c169cfcbb80c131a8f7524333af42b56eaeebf1f5aa4a1ba233f4c934392e0dc9efe9541e8185771f351db51', NULL, 1),
(333333, 'Veronica', 'Cecchetti', 'img/user.png', 2014, 1, 'veronica.cecchetti3@studio.unibo.it', 'fa499782269fe740adbc635d1d0d7e13c4d33f550947c118a4a4e59e7d88135a1ceab48de88c5da1780bea8b218561f11055838237b47e0f9d36513d0653f691', '2469e3afb24b22aa979357d57116a49829c0297556cca7a5b17273f7f6914c78988a64f75ec1f9c1ab5f546fd91422fb86e5e1e819ce0fdc2858f581f2b1d508', 'Ingegneria Informatica', 1),
(714233, 'Andrea', 'Colombo', 'img/user.png', 2014, 1, 'andrea.colombo4@studio.unibo.it', 'b4e6819f4cb15fea089ae8f3caa544ea7fe89fd396c42435208a147c76324311872c95a47e031a461cfa3f435f099ea2eb32362070d6b39f267b1b4c797c5346', '5ef8141763aa3ac89fac68a03fc13688b0a1eeb477b38508d6a8ec8d0bfccb1b0a79b792eba3229992490234b064a575a577cd80fa82bd20a7725ea7c0b2af0b', 'Ingegneria Informatica', 1),
(718520, 'Giulia', 'Cecchetti', 'img/user.png', 2014, 1, 'info@cgiulia.com', '7ff26dd1ad0ee5b6bf1cfcb65f59f6e675ea13cef1a60f0ebaa7ef29ce915cdf113b9f246b92b62aae2b5a952a3d8408c1071321a7376ff5a0ba979e311ffa33', '1128b2aa50fabab90a9b46eafa044afee048d2ac902c5d40b0843e9a82bfd9d98e8c347af236d5730b0f0d3139511f34041ca677e9e36b43daf697b45e5d21ec', 'Ingegneria Informatica', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `student_categories`
--

CREATE TABLE IF NOT EXISTS `student_categories` (
  `category_name` varchar(255) NOT NULL,
  `student_id` int(255) NOT NULL,
  `favorite` tinyint(1) NOT NULL,
  PRIMARY KEY (`category_name`,`student_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `student_categories`
--

INSERT INTO `student_categories` (`category_name`, `student_id`, `favorite`) VALUES
('Bacheca', 222222, 0),
('Bacheca', 333333, 0),
('Bacheca', 714233, 0),
('Bacheca', 718520, 0),
('Borsa di Studio', 222222, 0),
('Borsa di Studio', 333333, 0),
('Borsa di Studio', 714233, 0),
('Borsa di Studio', 718520, 0),
('Carriera', 222222, 1),
('Carriera', 333333, 1),
('Carriera', 714233, 1),
('Carriera', 718520, 1),
('Contatti', 222222, 1),
('Contatti', 333333, 1),
('Contatti', 714233, 1),
('Contatti', 718520, 1),
('Email', 222222, 1),
('Email', 333333, 1),
('Email', 714233, 1),
('Email', 718520, 1),
('Erasmus', 222222, 0),
('Erasmus', 333333, 0),
('Erasmus', 714233, 1),
('Erasmus', 718520, 0),
('Esami', 222222, 1),
('Esami', 333333, 1),
('Esami', 714233, 1),
('Esami', 718520, 1),
('Laurea', 222222, 0),
('Laurea', 333333, 0),
('Laurea', 714233, 0),
('Laurea', 718520, 1),
('Lezioni', 222222, 1),
('Lezioni', 333333, 1),
('Lezioni', 714233, 1),
('Lezioni', 718520, 1),
('Materiale', 222222, 0),
('Materiale', 333333, 0),
('Materiale', 714233, 1),
('Materiale', 718520, 0),
('Piano di Studi', 222222, 0),
('Piano di Studi', 333333, 0),
('Piano di Studi', 714233, 0),
('Piano di Studi', 718520, 0),
('Rinuncia agli Studi', 222222, 0),
('Rinuncia agli Studi', 333333, 0),
('Rinuncia agli Studi', 714233, 1),
('Rinuncia agli Studi', 718520, 0),
('Servizi Convenzionati', 222222, 0),
('Servizi Convenzionati', 333333, 0),
('Servizi Convenzionati', 714233, 0),
('Servizi Convenzionati', 718520, 0),
('Sospensione', 222222, 0),
('Sospensione', 333333, 0),
('Sospensione', 714233, 0),
('Sospensione', 718520, 0),
('Tasse', 222222, 1),
('Tasse', 333333, 1),
('Tasse', 714233, 1),
('Tasse', 718520, 0),
('Tirocinio', 222222, 0),
('Tirocinio', 333333, 0),
('Tirocinio', 714233, 0),
('Tirocinio', 718520, 0),
('Trasferimento', 222222, 0),
('Trasferimento', 333333, 0),
('Trasferimento', 714233, 0),
('Trasferimento', 718520, 0),
('Trasporti', 222222, 0),
('Trasporti', 333333, 0),
('Trasporti', 714233, 0),
('Trasporti', 718520, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `student_exams`
--

CREATE TABLE IF NOT EXISTS `student_exams` (
  `exam_id` int(255) NOT NULL,
  `student_id` int(255) NOT NULL,
  `record_date` date DEFAULT NULL,
  `result` int(255) DEFAULT NULL,
  `honour` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`exam_id`,`student_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `student_exams`
--

INSERT INTO `student_exams` (`exam_id`, `student_id`, `record_date`, `result`, `honour`) VALUES
(17865, 333333, NULL, NULL, 0),
(17865, 714233, NULL, NULL, 0),
(17865, 718520, NULL, NULL, 0),
(22765, 333333, NULL, NULL, 0),
(22765, 714233, NULL, NULL, 0),
(22765, 718520, NULL, NULL, 0),
(23456, 333333, NULL, NULL, 0),
(23456, 714233, NULL, NULL, 0),
(23456, 718520, NULL, NULL, 0),
(26754, 333333, NULL, NULL, 0),
(26754, 714233, NULL, NULL, 0),
(26754, 718520, NULL, NULL, 0),
(26985, 333333, NULL, NULL, 0),
(26985, 714233, NULL, NULL, 0),
(26985, 718520, NULL, NULL, 0),
(37625, 333333, NULL, NULL, 0),
(37625, 714233, NULL, NULL, 0),
(37625, 718520, NULL, NULL, 0),
(37654, 333333, NULL, NULL, 0),
(37654, 714233, NULL, NULL, 0),
(37654, 718520, NULL, NULL, 0),
(45634, 333333, NULL, NULL, 0),
(45634, 714233, NULL, NULL, 0),
(45634, 718520, NULL, NULL, 0),
(45667, 333333, NULL, NULL, 0),
(45667, 714233, NULL, NULL, 0),
(45667, 718520, NULL, NULL, 0),
(56745, 333333, NULL, NULL, 0),
(56745, 714233, NULL, NULL, 0),
(56745, 718520, NULL, NULL, 0),
(56784, 333333, NULL, NULL, 0),
(56786, 333333, NULL, NULL, 0),
(56834, 333333, NULL, NULL, 0),
(56834, 714233, NULL, NULL, 0),
(56834, 718520, NULL, NULL, 0),
(59873, 333333, NULL, NULL, 0),
(59873, 714233, NULL, NULL, 0),
(59873, 718520, NULL, NULL, 0),
(67548, 333333, NULL, NULL, 0),
(67548, 714233, NULL, NULL, 0),
(67548, 718520, NULL, NULL, 0),
(88773, 333333, NULL, NULL, 0),
(88773, 714233, NULL, NULL, 0),
(88773, 718520, NULL, NULL, 0),
(99152, 333333, NULL, NULL, 0),
(99152, 714233, NULL, NULL, 0),
(99152, 718520, NULL, NULL, 0),
(99875, 333333, NULL, NULL, 0),
(99875, 714233, NULL, NULL, 0),
(99875, 718520, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `student_plan_modifications`
--

CREATE TABLE IF NOT EXISTS `student_plan_modifications` (
  `student_id` int(255) NOT NULL,
  `plan_modification_type` varchar(255) NOT NULL,
  `done` tinyint(1) NOT NULL,
  PRIMARY KEY (`student_id`,`plan_modification_type`),
  KEY `plan_modification_type` (`plan_modification_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `student_plan_modifications`
--

INSERT INTO `student_plan_modifications` (`student_id`, `plan_modification_type`, `done`) VALUES
(333333, 'Curriculum', 1),
(333333, 'Piano di Studi', 1),
(714233, 'Curriculum', 1),
(714233, 'Piano di Studi', 0),
(718520, 'Curriculum', 1),
(718520, 'Piano di Studi', 1);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `calendar_events`
--
ALTER TABLE `calendar_events`
  ADD CONSTRAINT `calendar_events_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `calendar_events_ibfk_2` FOREIGN KEY (`category_name`) REFERENCES `categories` (`name`);

--
-- Limiti per la tabella `curriculum`
--
ALTER TABLE `curriculum`
  ADD CONSTRAINT `curriculum_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Limiti per la tabella `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Limiti per la tabella `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD CONSTRAINT `login_attempts_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Limiti per la tabella `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`category_name`) REFERENCES `categories` (`name`);

--
-- Limiti per la tabella `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`curriculum`) REFERENCES `curriculum` (`name`);

--
-- Limiti per la tabella `student_categories`
--
ALTER TABLE `student_categories`
  ADD CONSTRAINT `student_categories_ibfk_1` FOREIGN KEY (`category_name`) REFERENCES `categories` (`name`),
  ADD CONSTRAINT `student_categories_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Limiti per la tabella `student_exams`
--
ALTER TABLE `student_exams`
  ADD CONSTRAINT `student_exams_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`),
  ADD CONSTRAINT `student_exams_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Limiti per la tabella `student_plan_modifications`
--
ALTER TABLE `student_plan_modifications`
  ADD CONSTRAINT `student_plan_modifications_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `student_plan_modifications_ibfk_2` FOREIGN KEY (`plan_modification_type`) REFERENCES `plan_modifications` (`type`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
