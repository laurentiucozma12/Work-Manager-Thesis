-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2023 at 02:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `work_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `projectName` varchar(255) DEFAULT NULL,
  `projectPosition` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `userId`, `projectName`, `projectPosition`) VALUES
(141, 8, 'Sesiune - Examene', 0),
(142, 8, 'Licență', 1),
(143, 8, 'Sesiune - Restanțe', 2),
(144, 11, 'Proiect de Investiții', 0),
(145, 10, 'Brainstorming - Marketing', 0),
(146, 10, 'Conținutul market-ingului', 1),
(147, 10, 'Comunicare', 2),
(148, 10, 'Parteneriate', 3),
(149, 10, 'Organizare', 4),
(150, 9, 'Recrutare post Manager', 0),
(151, 9, 'Răspunsurile aplicanților', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `projectId` int(11) NOT NULL,
  `taskName` varchar(255) DEFAULT NULL,
  `taskDescription` varchar(9999) DEFAULT NULL,
  `is_checked` tinyint(1) NOT NULL,
  `date_time` datetime DEFAULT NULL,
  `taskPosition` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `projectId`, `taskName`, `taskDescription`, `is_checked`, `date_time`, `taskPosition`) VALUES
(227, 141, 'Comunicare în afaceri în Limba Engleză', 'Sala 001\nNota: 10', 1, '2023-05-20 12:00:00', 0),
(228, 141, 'Investiții directe și finanțarea lor', 'Sala 043\nNota: 6', 1, '2023-06-24 16:00:00', 0),
(229, 142, 'Prezentarea Licenței', 'Sala: \n\nComisia:\n      - Comisia 3		\n      - Dan Andrei Sitar-Téut		\n      - Conf.univ.dr. Ramona Lacurezeanu		\n      - Paul Vasile Bresfelean		\n      - Darie Vasile Moldovan		\n      - Secretar: Asist.univ.dr. Diana Aderina Moisuc		\n      - Lect.univ.dr. Miranda Petronela Vlad		\n\nNota:  ?', 0, '0000-00-00 00:00:00', 0),
(230, 142, 'Examen Licență', 'Sala:\nNota: ', 0, NULL, 0),
(231, 143, 'Managementul Investițiilor', 'Sala: 001\nNota: 9.75', 1, '2023-06-18 12:00:00', 0),
(232, 141, 'Managementul întreprinderilor mici și mijlocii', 'Sala: AULA\nNota: 10', 1, '2023-06-25 09:00:00', 0),
(233, 141, 'Managementul achizițiilor', 'Sala: AULA\nNota: 10', 1, '2023-06-28 12:00:00', 0),
(234, 141, 'Managementul resurselor umane', 'Sala: AULA\nNota: 8', 1, '2023-06-05 16:00:00', 0),
(235, 141, 'Managementul calității totale', 'Sala: 001\nNota: 7', 1, '2023-06-07 11:00:00', 0),
(237, 144, 'Detaliile proiectului', 'Un proiect de investiții se caracterizează prin următoarea structură:\n- Costurile de investiții sunt eșalonate astfel: 150000 lei în primul an de\nconstrucție, 200000 lei în al doilea an și 250000 lei în cel de-al treilea an;\n- Costurile de producție (operaționale) sunt de 400000 lei în primul an de\nfuncționare, 450000 lei în cel de-al doilea, 475000 lei în anul trei, 500000\nlei între anii patru și șase și 525000 lei în restul perioadei de funcționare;\n- Veniturile anuale sunt în sumă de 575000 lei în primul an de funcționare,\n600000 lei în cel de-al doilea, 625000 lei în al treilea an, 675000 lei între\nanii patru și șapte și 700000 lei în restul perioadei de funcționare;\n- Impozitul pe profit este de 19%;\n- Durata de funcționare este de 25 de ani, iar amortizarea este considerată\nconstantă de-a lungul întregii perioade de funcționare;\nSă se analizeze regimul de eficiență a variantei de proiect prin intermediul\nindicatorilor dinamici VNA, durată de recuperare (D) și randament economic (Re)\nla o rată de actualizare de 12%.', 0, NULL, 0),
(238, 144, 'Investiție - An 2024', 'Investiție = 150,000 Euro', 0, '2024-12-31 16:00:00', 0),
(239, 144, 'Investiție - An 2025', 'Investiție = 200,000 Euro', 0, '2025-12-31 18:00:00', 0),
(240, 144, 'Investiție - An 2026', 'Investiție = 180,000 Euro', 0, '2026-12-31 18:00:00', 0),
(241, 145, 'Conținutul market-ingului', '', 0, NULL, 0),
(242, 145, 'Comunicare', '', 0, NULL, 0),
(243, 145, 'Parteneriate', '', 0, NULL, 0),
(244, 145, 'Organizare', '', 0, NULL, 0),
(245, 146, 'Audiență', '', 0, NULL, 0),
(246, 146, 'Platforme', '', 0, NULL, 0),
(247, 146, 'Strategie', '', 0, NULL, 0),
(248, 147, 'PR', '', 0, NULL, 0),
(249, 147, 'Sponsori', '', 0, NULL, 0),
(250, 147, 'Media', '', 0, NULL, 0),
(251, 147, 'Evenimente', '', 0, NULL, 0),
(252, 148, 'Conturi', '', 0, NULL, 0),
(253, 148, 'Contractori', '', 0, NULL, 0),
(254, 148, 'Competiții', '', 0, NULL, 0),
(255, 149, 'Analiză', '', 0, NULL, 0),
(256, 149, 'Buget', '', 0, NULL, 0),
(257, 149, 'Creativitate', '', 0, NULL, 0),
(258, 150, 'Întrebări Interviu', '1. Descrieți experiența dumneavoastră anterioară în poziții de conducere și management. Cum v-ați dezvoltat abilitățile de leadership în acele roluri?\n2. Cum abordați procesul de luare a deciziilor într-un mediu de lucru dinamic și presat? Puteți da un exemplu concret din experiența dumneavoastră anterioară?\n3. Cum vă asigurați că echipa pe care o conduceți rămâne motivată și își atinge obiectivele? Ce strategii folosiți pentru a gestiona performanța angajaților?\n4. Cum vă adaptați la schimbările și provocările din mediul de afaceri? Puteți oferi un exemplu în care ați trebuit să vă adaptați rapid și să luați măsuri corespunzătoare?\n5. Cum comunicați eficient cu diferitele niveluri ierarhice și departamente dintr-o organizație? Cum gestionați conflictele de interese sau dezacordurile între echipe?\n6. Ce strategii utilizați pentru a identifica și atrage talente în cadrul echipei dumneavoastră? Cum asigurați o dezvoltare continuă a angajaților și o succesiune adecvată?\n7. Cum gestionați bugetul și resursele în cadrul departamentului sau proiectului dumneavoastră? Cum vă asigurați că respectați termenele și bugetul stabilit?\n8. Cum faceți față situațiilor de stres și presiune intensă în rolul de manager? Cum vă mențineți calmul și abilitățile de leadership în astfel de momente?\n9. Cum vă asigurați că dezvoltarea personală și profesională a dumneavoastră este într-o continuă creștere? Ce măsuri luați pentru a vă menține la curent cu noile tendințe și practici în domeniul managementului?\n10. Cum evaluați succesul echipei dumneavoastră și al proiectelor pe care le-ați condus? Cum ați implementat măsuri de îmbunătățire continuă și cum ați obținut rezultate remarcabile în trecut?', 0, '0000-00-00 00:00:00', 0),
(259, 151, 'Aplicant 1', '1. Am acumulat experiență în poziții de conducere timp de șase ani într-o companie globală, dezvoltându-mi abilitățile de leadership prin gestionarea echipelor și implementarea de schimbări organizaționale.\n2. În medii dinamice și presante, iau decizii pe baza unei analize atente a informațiilor disponibile, consultând echipele implicate și prioritizând obiectivele organizației.\n3. Pentru a menține echipa motivată, promovez comunicarea deschisă și transparentă, ofer feedback regulat și creez oportunități de dezvoltare profesională.\n4. Sunt flexibil și mă adaptez rapid la schimbări și provocări în mediul de afaceri, ca exemplu relevant putând fi integrarea cu succes a două companii în urma unei fuziuni.\n5. Comunic eficient cu diferite niveluri ierarhice și departamente prin promovarea comunicării deschise și organizarea ședințelor de sincronizare.\n6. Pentru a atrage talente în echipa mea, utilizez strategii precum recrutarea activă, participarea la evenimente și conferințe relevante și promovarea culturii organizaționale atractivă. În ceea ce privește dezvoltarea angajaților, ofer programe de formare și mentorat și încurajez participarea la proiecte provocatoare pentru a le permite să-și dezvolte abilitățile și să-și atingă potențialul maxim.\n7. Gestionez bugetul și resursele prin planificare riguroasă, monitorizare atentă a cheltuielilor și prioritizare strategică a investițiilor. Respect termenele și bugetul stabilit prin organizarea eficientă a echipei, identificarea și gestionarea riscurilor și ajustarea planurilor în mod corespunzător în funcție de nevoile proiectului.\n8. În situații de stres și presiune intensă, îmi păstrez calmul și abilitățile de leadership prin practici precum gestionarea timpului și prioritizarea sarcinilor, delegarea responsabilităților și încurajarea unei culturi a echipei bazată pe sprijin reciproc și rezolvarea eficientă a problemelor.\n9. Pentru a-mi menține dezvoltarea personală și profesională în creștere, particip la programe de formare și conferințe, citesc cărți și articole de specialitate și caut feedback constant de la colegi și mentori. Îmi propun să fiu mereu în pas cu noile tendințe și practici în domeniul managementului.\n10. Evaluarea succesului echipei și a proiectelor se realizează prin măsurători obiective, cum ar fi indicatorii de performanță, feedback-ul de la clienți și rezultatele financiare. Implementez măsuri de îmbunătățire continuă prin analizarea rezultatelor, identificarea oportunităților de optimizare și implementarea de schimbări strategice pentru a obține rezultate remarcabile.', 1, '2023-06-22 12:00:00', 0),
(260, 151, 'Aplicant 2', 'Nu a venit la interviu', 0, '2023-06-20 12:00:00', 0),
(261, 151, 'Aplicant 3', '', 0, '2023-08-11 12:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `firstname`, `lastname`) VALUES
(8, 'laurentiucozma12@gmail.com', '$2y$04$Q95A8vXwFbolhxHz28Owo.mT4l0xI4L91kbJXCYx1rlyPpfcbGVhC', 'laurentiucozma12', 'Laurentiu', 'Cozma'),
(9, 'recrutor@gmail.com', '$2y$04$JBkn9yv1R8890u0M/GLjq.zi85FrE.tETIRvltWwhYrVP.r0w0dW2', 'Recrutor', 'John', 'Doe'),
(10, 'brainstorming@gmail.com', '$2y$04$63z6rgkw41xTwUjvqun.CuqQXV/7Sq0g9nLW61JabdCf9YrWUm6.a', 'Creativ', 'Laurentiu', 'Cozma'),
(11, 'investitii@gmail.com', '$2y$04$aXBcqg05sSFjrJ8UKhWypOt03ClERo40JGZwid8VAgXd7t75qupsW', 'investitii', 'Laurentiu', 'Cozma');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Cascade_Users` (`userId`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Cascade_Projects` (`projectId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `Cascade_Users` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `Cascade_Projects` FOREIGN KEY (`projectId`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
