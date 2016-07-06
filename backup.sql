-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2016 at 09:42 PM
-- Server version: 5.5.49-0+deb8u1
-- PHP Version: 5.6.20-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mc_roiate`
--

-- --------------------------------------------------------

--
-- Table structure for table `associazioni_pazienti_categorie`
--

CREATE TABLE `associazioni_pazienti_categorie` (
  `id` bigint(20) NOT NULL,
  `id_paziente` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `associazioni_studi_domini`
--

CREATE TABLE `associazioni_studi_domini` (
  `id_studio` bigint(20) NOT NULL,
  `dominio_studio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `associazioni_studi_domini`
--

INSERT INTO `associazioni_studi_domini` (`id_studio`, `dominio_studio`) VALUES
(1, 'studioandrea'),
(2, 'studioroiate');

-- --------------------------------------------------------

--
-- Table structure for table `carichi`
--

CREATE TABLE `carichi` (
  `id` int(11) NOT NULL,
  `id_fornitore` int(11) DEFAULT NULL,
  `id_prodotto` int(11) DEFAULT NULL,
  `quantita` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prezzo_acquisto` decimal(10,2) NOT NULL,
  `stato` tinyint(1) NOT NULL,
  `fattura` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carichi`
--

INSERT INTO `carichi` (`id`, `id_fornitore`, `id_prodotto`, `quantita`, `data`, `prezzo_acquisto`, `stato`, `fattura`) VALUES
(1, 4, 1, 100, '2016-04-11 19:53:41', 2.00, 0, ''),
(2, 4, 1, 100, '2016-04-29 15:55:47', 12.00, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `categorie_pazienti`
--

CREATE TABLE `categorie_pazienti` (
  `id_categoria` bigint(20) NOT NULL,
  `nome_categoria` varchar(200) NOT NULL,
  `data_aggiunta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dati_fatturazione`
--

CREATE TABLE `dati_fatturazione` (
  `id` int(11) NOT NULL,
  `intestazione` varchar(250) NOT NULL,
  `cap` varchar(5) NOT NULL,
  `comune` varchar(150) NOT NULL,
  `telefono` varchar(150) NOT NULL,
  `indirizzo` varchar(350) NOT NULL,
  `provincia` varchar(2) NOT NULL,
  `piva` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dati_fatturazione`
--

INSERT INTO `dati_fatturazione` (`id`, `intestazione`, `cap`, `comune`, `telefono`, `indirizzo`, `provincia`, `piva`) VALUES
(1, 'Studio Roiate', '15424', 'Comune di prova', '3333333333', 'Via di prova', 'PR', '12365589547');

-- --------------------------------------------------------

--
-- Table structure for table `dottori`
--

CREATE TABLE `dottori` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `telefono` varchar(80) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `dettagli` varchar(500) NOT NULL,
  `orari_settimanali` varchar(500) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dottori`
--

INSERT INTO `dottori` (`id`, `nome`, `telefono`, `email`, `dettagli`, `orari_settimanali`, `data`) VALUES
(1, 'mario rossi', '9999', 'ciao@ciao.it', '', '', '2016-04-11 09:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `esecuzioni_alerthandler`
--

CREATE TABLE `esecuzioni_alerthandler` (
  `id` bigint(20) NOT NULL,
  `tot_email_inviate` bigint(20) NOT NULL,
  `tot_sms_inviati` bigint(20) NOT NULL,
  `data_esecuzione` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `farmaci`
--

CREATE TABLE `farmaci` (
  `id_farmaco` bigint(20) NOT NULL,
  `nome_farmaco` varchar(500) NOT NULL,
  `data_inserimento_farmaco` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fatture`
--

CREATE TABLE `fatture` (
  `id_fattura` int(11) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `totale` decimal(11,2) NOT NULL,
  `id_dottore` bigint(20) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fornitori`
--

CREATE TABLE `fornitori` (
  `id` int(11) NOT NULL,
  `ragione_sociale` varchar(250) NOT NULL,
  `referente` varchar(250) NOT NULL,
  `indirizzo` varchar(350) NOT NULL,
  `partita_iva` varchar(11) NOT NULL,
  `numero` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fornitori`
--

INSERT INTO `fornitori` (`id`, `ragione_sociale`, `referente`, `indirizzo`, `partita_iva`, `numero`, `email`) VALUES
(4, 'ciao', 'rossi', 'kkkk', '8888', '888888', 'ciao@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `impostazioni`
--

CREATE TABLE `impostazioni` (
  `id` int(11) NOT NULL,
  `impostazione` varchar(200) NOT NULL,
  `valore` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `impostazioni`
--

INSERT INTO `impostazioni` (`id`, `impostazione`, `valore`) VALUES
(1, 'alert_email', 'off'),
(2, 'alert_sms', 'off'),
(3, 'nome_esercizio', 'Clinica1'),
(4, 'plugin_sms_abilitato', 'si');

-- --------------------------------------------------------

--
-- Table structure for table `patologie`
--

CREATE TABLE `patologie` (
  `id_patologia` bigint(20) NOT NULL,
  `nome_patologia` varchar(500) NOT NULL,
  `data_inserimento_patologia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pazienti`
--

CREATE TABLE `pazienti` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(400) NOT NULL,
  `cognome` varchar(400) NOT NULL,
  `email` varchar(500) DEFAULT NULL,
  `telefono` varchar(300) DEFAULT NULL,
  `indirizzo` varchar(300) DEFAULT NULL,
  `cap` varchar(30) DEFAULT NULL,
  `codice_fiscale` varchar(500) NOT NULL,
  `data_nascita` date DEFAULT NULL,
  `luogo_nascita` varchar(300) DEFAULT NULL,
  `dettaglio_paziente` varchar(500) DEFAULT NULL,
  `alert_email` tinyint(1) NOT NULL DEFAULT '0',
  `alert_sms` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pazienti`
--

INSERT INTO `pazienti` (`id`, `nome`, `cognome`, `email`, `telefono`, `indirizzo`, `cap`, `codice_fiscale`, `data_nascita`, `luogo_nascita`, `dettaglio_paziente`, `alert_email`, `alert_sms`) VALUES
(1, 'germana', 'falcone', 'falconegermana@gmail.com', '3665831179', 'VIALE UGO MONACO', '00134', 'flcgmn80l44h501s', '0000-00-00', 'ROMA', '4 precedenti otturazioni', 0, 0),
(2, 'Alessandra', 'Magrini', 'ale.magrini67@gmail.com', '3382107332', 'via della giuliana 74', '00195', 'mgrlsn67r43h501z', '1967-10-03', 'roma', 'richiamo trimestrale', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prestazioni`
--

CREATE TABLE `prestazioni` (
  `id` int(11) NOT NULL,
  `descrizione` varchar(100) NOT NULL,
  `costo_prestazione` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prestazioni`
--

INSERT INTO `prestazioni` (`id`, `descrizione`, `costo_prestazione`) VALUES
(1, 'carie', 50.00),
(2, 'puliza denti', 60.00),
(3, 'ponte', 500.00);

-- --------------------------------------------------------

--
-- Table structure for table `prestazioni_specialistiche`
--

CREATE TABLE `prestazioni_specialistiche` (
  `id_prestazione` bigint(20) NOT NULL,
  `nome_prestazione` varchar(500) NOT NULL,
  `data_aggiunta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `preventivi`
--

CREATE TABLE `preventivi` (
  `id` int(11) NOT NULL,
  `data_preventivo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `totale` decimal(11,2) NOT NULL,
  `id_paziente` int(11) NOT NULL,
  `stato` tinyint(1) NOT NULL,
  `data_pagamento` date DEFAULT NULL,
  `sconto` decimal(10,2) NOT NULL,
  `parziale` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `preventivi`
--

INSERT INTO `preventivi` (`id`, `data_preventivo`, `totale`, `id_paziente`, `stato`, `data_pagamento`, `sconto`, `parziale`) VALUES
(2, '2016-04-11 09:31:43', 60.00, 1, 0, NULL, 0.00, 0.00),
(3, '2016-04-11 11:50:34', 50.00, 1, 0, NULL, 0.00, 0.00),
(6, '2016-04-20 12:03:34', 600.00, 1, 0, '2016-04-22', 10.00, 200.00),
(8, '2016-04-29 15:57:52', 100.00, 1, 1, '2016-05-05', 10.00, 100.00),
(9, '2016-05-05 11:59:01', 600.00, 2, 0, NULL, 10.00, 0.00),
(10, '2016-05-05 11:59:43', 500.00, 2, 0, NULL, 10.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `prodotti`
--

CREATE TABLE `prodotti` (
  `id` int(11) NOT NULL,
  `nome` varchar(350) NOT NULL,
  `quantita` int(11) NOT NULL,
  `prezzo_vendita` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prodotti`
--

INSERT INTO `prodotti` (`id`, `nome`, `quantita`, `prezzo_vendita`) VALUES
(1, 'siringhe', 200, 3.00);

-- --------------------------------------------------------

--
-- Table structure for table `prodotti_to_visita`
--

CREATE TABLE `prodotti_to_visita` (
  `id_prodotto_visita` int(11) NOT NULL,
  `id_prodotto` int(11) NOT NULL,
  `id_visita` bigint(20) NOT NULL,
  `quantita` int(11) NOT NULL,
  `prezzo_vendita` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `relationship_dottori_studi`
--

CREATE TABLE `relationship_dottori_studi` (
  `id_persona` bigint(20) NOT NULL,
  `id_studio` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relationship_dottori_studi`
--

INSERT INTO `relationship_dottori_studi` (`id_persona`, `id_studio`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `relationship_pazienti_studi`
--

CREATE TABLE `relationship_pazienti_studi` (
  `id_persona` bigint(20) NOT NULL,
  `id_studio` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relationship_pazienti_studi`
--

INSERT INTO `relationship_pazienti_studi` (`id_persona`, `id_studio`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(6) NOT NULL,
  `rserial` varchar(50) NOT NULL,
  `ultimoclick` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(11) NOT NULL,
  `descrizione_task` varchar(300) DEFAULT NULL,
  `completato` tinyint(1) NOT NULL DEFAULT '0',
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tipoacc` int(2) NOT NULL COMMENT '0->superadmin; 1->admin',
  `ragione_sociale` varchar(300) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `scadenza_utente` timestamp NULL DEFAULT NULL COMMENT 'NULL->senza scadenza, TIMESTAMP->scadenza utente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `tipoacc`, `ragione_sociale`, `data`, `scadenza_utente`) VALUES
(1, 'studioroiate@gmail.com', '1d784258cf99ca912618e9398d026d41', 0, 'Studio Roiate', '2015-11-03 17:24:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visite`
--

CREATE TABLE `visite` (
  `id` bigint(20) NOT NULL,
  `id_paziente` bigint(20) NOT NULL,
  `nome_paziente` varchar(500) NOT NULL,
  `id_dottore` bigint(20) DEFAULT NULL,
  `data_visita` date DEFAULT NULL,
  `orario_visita` time DEFAULT NULL,
  `descrizione` varchar(800) NOT NULL,
  `dettaglio` varchar(700) DEFAULT NULL COMMENT 'dettaglio della visita: un dottore scrive qui il resoconto dopo aver fatto la visita',
  `fattura` varchar(350) NOT NULL,
  `id_preventivo` int(11) NOT NULL,
  `id_prestazione` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visite`
--

INSERT INTO `visite` (`id`, `id_paziente`, `nome_paziente`, `id_dottore`, `data_visita`, `orario_visita`, `descrizione`, `dettaglio`, `fattura`, `id_preventivo`, `id_prestazione`) VALUES
(8, 1, 'germana falcone', 1, '2016-04-30', '14:05:00', 'puliza denti', '', '', 6, 2),
(9, 1, 'germana falcone', NULL, NULL, NULL, 'ponte', NULL, '', 6, 3),
(10, 1, 'germana falcone', NULL, NULL, NULL, 'carie', NULL, '', 6, 1),
(14, 1, 'germana falcone', NULL, NULL, NULL, 'carie', NULL, '', 8, 1),
(15, 1, 'germana falcone', NULL, NULL, NULL, 'puliza denti', NULL, '', 8, 2),
(16, 2, 'Alessandra Magrini', NULL, NULL, NULL, 'carie', NULL, '', 9, 1),
(17, 2, 'Alessandra Magrini', NULL, NULL, NULL, 'puliza denti', NULL, '', 9, 2),
(18, 2, 'Alessandra Magrini', NULL, NULL, NULL, 'ponte', NULL, '', 9, 3),
(19, 2, 'Alessandra Magrini', NULL, NULL, NULL, 'ponte', NULL, '', 10, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `associazioni_pazienti_categorie`
--
ALTER TABLE `associazioni_pazienti_categorie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paziente` (`id_paziente`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `associazioni_studi_domini`
--
ALTER TABLE `associazioni_studi_domini`
  ADD PRIMARY KEY (`id_studio`);

--
-- Indexes for table `carichi`
--
ALTER TABLE `carichi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fornitore` (`id_fornitore`),
  ADD KEY `id_prodotto` (`id_prodotto`);

--
-- Indexes for table `categorie_pazienti`
--
ALTER TABLE `categorie_pazienti`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity` (`last_activity`);

--
-- Indexes for table `dati_fatturazione`
--
ALTER TABLE `dati_fatturazione`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dottori`
--
ALTER TABLE `dottori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `esecuzioni_alerthandler`
--
ALTER TABLE `esecuzioni_alerthandler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmaci`
--
ALTER TABLE `farmaci`
  ADD PRIMARY KEY (`id_farmaco`);

--
-- Indexes for table `fatture`
--
ALTER TABLE `fatture`
  ADD PRIMARY KEY (`id_fattura`),
  ADD KEY `id_dottore` (`id_dottore`);

--
-- Indexes for table `fornitori`
--
ALTER TABLE `fornitori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `impostazioni`
--
ALTER TABLE `impostazioni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patologie`
--
ALTER TABLE `patologie`
  ADD PRIMARY KEY (`id_patologia`);

--
-- Indexes for table `pazienti`
--
ALTER TABLE `pazienti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prestazioni`
--
ALTER TABLE `prestazioni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prestazioni_specialistiche`
--
ALTER TABLE `prestazioni_specialistiche`
  ADD PRIMARY KEY (`id_prestazione`);

--
-- Indexes for table `preventivi`
--
ALTER TABLE `preventivi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodotti_to_visita`
--
ALTER TABLE `prodotti_to_visita`
  ADD PRIMARY KEY (`id_prodotto_visita`),
  ADD KEY `id_prodotto` (`id_prodotto`,`id_visita`),
  ADD KEY `id_visita` (`id_visita`);

--
-- Indexes for table `relationship_dottori_studi`
--
ALTER TABLE `relationship_dottori_studi`
  ADD KEY `id_persona` (`id_persona`),
  ADD KEY `id_studio` (`id_studio`);

--
-- Indexes for table `relationship_pazienti_studi`
--
ALTER TABLE `relationship_pazienti_studi`
  ADD KEY `id_paziente` (`id_persona`),
  ADD KEY `id_studio` (`id_studio`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visite`
--
ALTER TABLE `visite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paziente` (`id_paziente`),
  ADD KEY `id_dottore` (`id_dottore`),
  ADD KEY `id_preventivo` (`id_preventivo`),
  ADD KEY `id_prestazione` (`id_prestazione`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `associazioni_pazienti_categorie`
--
ALTER TABLE `associazioni_pazienti_categorie`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `associazioni_studi_domini`
--
ALTER TABLE `associazioni_studi_domini`
  MODIFY `id_studio` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `carichi`
--
ALTER TABLE `carichi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categorie_pazienti`
--
ALTER TABLE `categorie_pazienti`
  MODIFY `id_categoria` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dati_fatturazione`
--
ALTER TABLE `dati_fatturazione`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dottori`
--
ALTER TABLE `dottori`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `esecuzioni_alerthandler`
--
ALTER TABLE `esecuzioni_alerthandler`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `farmaci`
--
ALTER TABLE `farmaci`
  MODIFY `id_farmaco` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fatture`
--
ALTER TABLE `fatture`
  MODIFY `id_fattura` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fornitori`
--
ALTER TABLE `fornitori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `impostazioni`
--
ALTER TABLE `impostazioni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `patologie`
--
ALTER TABLE `patologie`
  MODIFY `id_patologia` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pazienti`
--
ALTER TABLE `pazienti`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `prestazioni`
--
ALTER TABLE `prestazioni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `prestazioni_specialistiche`
--
ALTER TABLE `prestazioni_specialistiche`
  MODIFY `id_prestazione` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `preventivi`
--
ALTER TABLE `preventivi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `prodotti_to_visita`
--
ALTER TABLE `prodotti_to_visita`
  MODIFY `id_prodotto_visita` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `visite`
--
ALTER TABLE `visite`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `carichi`
--
ALTER TABLE `carichi`
  ADD CONSTRAINT `carichi_ibfk_1` FOREIGN KEY (`id_fornitore`) REFERENCES `fornitori` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `carichi_ibfk_2` FOREIGN KEY (`id_prodotto`) REFERENCES `prodotti` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `fatture`
--
ALTER TABLE `fatture`
  ADD CONSTRAINT `fatture_ibfk_1` FOREIGN KEY (`id_dottore`) REFERENCES `dottori` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `prodotti_to_visita`
--
ALTER TABLE `prodotti_to_visita`
  ADD CONSTRAINT `prodotti_to_visita_ibfk_3` FOREIGN KEY (`id_prodotto`) REFERENCES `prodotti` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `prodotti_to_visita_ibfk_4` FOREIGN KEY (`id_visita`) REFERENCES `visite` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `relationship_dottori_studi`
--
ALTER TABLE `relationship_dottori_studi`
  ADD CONSTRAINT `relationship_dottori_studi_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `dottori` (`id`),
  ADD CONSTRAINT `relationship_dottori_studi_ibfk_2` FOREIGN KEY (`id_studio`) REFERENCES `associazioni_studi_domini` (`id_studio`);

--
-- Constraints for table `relationship_pazienti_studi`
--
ALTER TABLE `relationship_pazienti_studi`
  ADD CONSTRAINT `relationship_pazienti_studi_ibfk_2` FOREIGN KEY (`id_studio`) REFERENCES `associazioni_studi_domini` (`id_studio`),
  ADD CONSTRAINT `relationship_pazienti_studi_ibfk_3` FOREIGN KEY (`id_persona`) REFERENCES `pazienti` (`id`);

--
-- Constraints for table `visite`
--
ALTER TABLE `visite`
  ADD CONSTRAINT `visite_ibfk_1` FOREIGN KEY (`id_preventivo`) REFERENCES `preventivi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visite_ibfk_2` FOREIGN KEY (`id_prestazione`) REFERENCES `prestazioni` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
