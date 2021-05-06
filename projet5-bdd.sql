-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 06, 2021 at 06:22 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oc-projet5`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentId` int(11) NOT NULL,
  `commentContent` text NOT NULL,
  `commentDate` datetime NOT NULL,
  `commentValidation` tinyint(1) NOT NULL,
  `postId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentId`, `commentContent`, `commentDate`, `commentValidation`, `postId`, `userId`) VALUES
(1, 'Très intéressant ! Bon courage pour cette reconversion !', '2021-05-02 14:36:53', 1, 9, 27),
(2, 'Super intéressant ! Hâte de lire / écouter tout ça...', '2021-05-05 12:12:57', 0, 10, 21),
(3, 'Cool, je prends note de tous ces conseils...', '2021-05-05 15:48:13', 1, 11, 21);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `excerpt` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `dateModification` datetime NOT NULL,
  `authorId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `excerpt`, `content`, `dateModification`, `authorId`) VALUES
(9, 'L\'histoire de ma reconversion', 'Ce fut une longue réflexion, mais après plusieurs années où mon épanouissement professionnel était limité, j\'ai décidé enfin de franchir le pas et de me former au développement web.', '<p><strong>1. Les limites</strong></p>\r\n<p>Une fois la d&eacute;cision de la reconversion prise, il n\'en reste pas moins plusieurs obstacles. Tout d\'abord, faire face aux interrogations de l\'entourage avec les questions clich&eacute;es telles que : Tu vas tout recommencer &agrave; z&eacute;ro ? Tout ce travail et cet argent pour rien ? Puis viennent les doutes, les peurs d\'avoir fait le bon choix ou non...&nbsp;</p>\r\n<p>Quand on choisit de faire une reconversion, le sommeil tranquille et apais&eacute; devient un lointain souvenir. Cependant, une fois ce choix fait, si le projet est abouti et r&eacute;fl&eacute;chi, pour rien au monde tu souhaites revenir en arri&egrave;re.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>2. Pourquoi le d&eacute;veloppement web ?</strong></p>\r\n<p>Je ne pense pas que lorsque nous faisons notre choix au lyc&eacute;e, nous avons toutes les cartes en main pour r&eacute;ellement choisir la carri&egrave;re qui nous convienne. Bien souvent, tout le monde y va de son conseil, &eacute;tale son exp&eacute;rience, ce dont on a besoin sur le march&eacute; (comment &ccedil;a dresseuse de dauphin n\'est pas un m&eacute;tier avec des d&eacute;bouch&eacute;s???). Souvent tu te retrouves &agrave; choisir la voie la moins pire, et bien souvent, ces choix sont d&eacute;termin&eacute;s par les images que tu te fais de tel ou tel m&eacute;tier. Marketing? Tr&egrave;s glamour et tendance - D&eacute;veloppement web ? c\'est pour les ados qui ne sortent pas de leur chambre ou les matheux et j\'aime pas les maths.&nbsp;</p>\r\n<p>Et pourtant, loin des paillettes, une fois dans le vif du sujet, tu te rends compte que l\'aspect technique du eCommerce est vraiment ce qui t\'int&eacute;resse le plus, que tu veux en savoir plus et que l\'aspect superficiel du marketing ne convient pas &agrave; ton esprit, qui veut des faits, des faits et encore des faits.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>3. Recommencer &agrave; z&eacute;ro</strong></p>\r\n<p>Alors oui, c\'est bien la premi&egrave;re r&eacute;action des gens. Et pourtant je ne consid&egrave;re pas une reconversion comme recommencer &agrave; z&eacute;ro. Il ne s\'agit pas d\'arracher toutes les pages des chapitres pr&eacute;c&eacute;dents, mais au contraire puiser en elles tous les apprentissages pour m\'aider dans cette nouvelle qu&ecirc;te. Sur le long terme, l\'id&eacute;e est devenir ce couteau suisse, cette version 2.0 de moi-m&ecirc;me, qui apporte &agrave; la fois son expertise en eCommerce et son expertise dans le d&eacute;veloppement informatique.</p>\r\n<p>Merci pour votre lecture!</p>', '2021-05-05 12:10:45', 30),
(10, 'Ressources pour aider dans la reconversion', 'Une fois le choix fait, il devient difficile de savoir par où commencer. Heureusement, il y a beaucoup de ressources disponibles qui permettent de nous aiguiller pour commencer du bon pied.', '<p><strong>1) Le Manuel de l\'Affranchi - de Chlo&eacute; Schemoul</strong></p>\r\n<p>Ce livre est tr&egrave;s bien car il te propose une m&eacute;thologie qui aide &agrave; former ton nouveau projet professionnel, et ce par toi-m&ecirc;me. Il sert en fait &agrave; remplacer le coach, fait se poser les bonnes questions. J\'ai particuli&egrave;rement appr&eacute;cier le fait que l\'auteur insiste pour que nous cherchions la source de notre mal-&ecirc;tre dans notre profession actuelle - parfois, ce n\'est pas la profession en elle-m&ecirc;me qui pose probl&egrave;me mais le cadre ou le contexte.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>2) Trouver son Ikigai de Christie Vanbremeersch</strong></p>\r\n<p>Pour ceux qui ne connaisse rien de l\'ikigai, ce livre n\'est peut &ecirc;tre pas la meilleure ressource. L\'id&eacute;e ici est surtout de trouver un livre sur l\'Ikigai pour comprendre le concept - il y en a plusieurs sur le march&eacute;, c\'est facile &agrave; trouver. Derri&egrave;re ce concept japonais se cache une philosophie de vie positive et qui peut aider toute personne en mal de sens dans leur travail. Traduit litt&eacute;ralement par \"ce pour quoi la vie m&eacute;rite d\'&ecirc;tre v&eacute;cue\", tout est dit.</p>\r\n<p><strong>3) Le podcast \"Graines d\'orient&eacute;s\"</strong></p>\r\n<p>Pour changer un peu des livres, il y a cette s&eacute;rie de podcasts qui m\'a beaucoup inspir&eacute;, d&eacute;j&agrave; pour se sentir moins seule dans notre qu&ecirc;te de changement, et voir qu\'il y a de nombreuses personnes qui se sont pos&eacute;s les m&ecirc;mes questions et ont r&eacute;ussi leur reconversion.</p>\r\n<p>4) Le podcast \"How to fail with Elisabeth Day\"</p>\r\n<p>Parce que toute reconversion est faite de doutes et d\'obstacle, il est important de changer sa perception des &eacute;checs. Ce podcast anglais est une suite d\'interview de personnes c&eacute;l&egrave;bres, que tout le monde d&eacute;crirait comme ayant r&eacute;ussi, qui viennent raconter leurs plus beaux &eacute;checs et les le&ccedil;ons apprises.</p>\r\n<p>N\'h&eacute;sitez pas &agrave; donner d\'autres ressources dans les commentaires.</p>\r\n<p>Bonne lecture / &eacute;coute :)</p>', '2021-05-03 19:34:21', 13),
(11, '5 tips quand on débute le code', 'Cette liste pourrait être bien plus longue mais à mon sens, ces 5 là sont indispensables et à bien garder en tête.', '<p>1. Faire des pauses</p>\r\n<p>Il y a tellement de choses &agrave; apprendre qu\'on a l\'impression que la montagne est bien trop haute. Savoir prendre des pauses ou m&ecirc;me savoir quand s\'arr&ecirc;ter est &agrave; mon sens indispensable pour laisser &agrave; notre cerveau le temps de dig&eacute;rer toutes ces nouvelles informations. Et tant pis, si un jour on ne peut travailler que 2h avant que notre cerveau sature...</p>\r\n<p>&nbsp;</p>\r\n<p>2. Tenir une liste de nos accomplissements</p>\r\n<p>Croyez-moi, il y aura des jours o&ugrave; vous vous sentirez comme un bon &agrave; rien. Ecrire, dans un cahier si tu veux le faire old school ou sur Notepad, les petites victoires de notre long apprentissage, c\'est d&eacute;construire le mythe &agrave; chaque nouvel obstacle : le \"je n\'y arriverai jamais\" est remplac&eacute; par \"tu te souviens quand tu &eacute;tais incapable d\'utiliser Flexbox ?&nbsp; Et ben maintenant tu peux...\"</p>\r\n<p>&nbsp;</p>\r\n<p>3. Ne pas multiplier les sources.</p>\r\n<p>Alors oui, avec internet, maintenant on peut tout apprendre et gratuitement. Mais un peu en lien avec le premier point, la capacit&eacute; de notre cerveau reste limit&eacute;. Friande de podcasts, de Twitter et autres... &eacute;couter et lire tous les conseils de ces d&eacute;veloppeurs, regarder leurs vid&eacute;os etc... commencaient &agrave; me rendre anxieuse car il y a toujours un concept, un nouveau truc que tu ne sais pas / connais pas...</p>\r\n<p>&nbsp;</p>\r\n<p>4. Changer les supports</p>\r\n<p>Parfois,&nbsp; un concept nous &eacute;chappe - mais la raison n\'est pas forc&eacute;ment notre incompr&eacute;hension. Tout d&eacute;pend de notre mani&egrave;re d\'apprendre qui est diff&eacute;rente en fonction de chacun. Pour ma part, lire sur un &eacute;cran est difficile pour vraiment imprimer les id&eacute;es dans ma t&ecirc;te - les vid&eacute;os sont plus faciles &agrave; retenir ou &agrave; comprendre, et pour approfondir un concept, j\'aime pouvoir le lire sur le papier (imprimer les cours, avoir un livre sur le sujet etc...)</p>\r\n<p>&nbsp;</p>\r\n<p>5. Ne pas se comparer aux autres</p>\r\n<p>Chacun &agrave; des situations, des fa&ccedil;ons d\'apprendre diff&eacute;rentes... Parfois nous allons bloquer sur quelque chose que notre coll&egrave;gue trouvera absolument limpide. Mais il est s&ucirc;r qu\'&agrave; un moment donn&eacute;, la situation sera inverse. Ne pas perdre son temps &agrave; se comparer aux autres, c\'est nous laisser du temps pour se concentrer sur nous-m&ecirc;me et notre propre progression.</p>\r\n<p>&nbsp;</p>\r\n<p>Et surtout, n\'abandonnez pas !</p>', '2021-05-05 12:35:39', 30);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleId` int(11) NOT NULL,
  `roleUser` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleId`, `roleUser`) VALUES
(1, 'administrator'),
(2, 'visitor');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roleId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `lastName`, `name`, `email`, `username`, `password`, `roleId`) VALUES
(13, 'Potter', 'Harry', 'hpotter@hogwarts.com', 'Hpotter', '$2y$10$0Oz4M4uwhe51M/51WJgW0Ozsle.kAUzIXR9uZwXAManLh7Ck45.TW', 1),
(19, 'Granger', 'Hermione', 'hgranger@hogwarts.com', 'PerfectPrefect', '$2y$10$xgqvQersbHodjlVT1byRmernrAJJW1zA5M6lN.sUDZyfvURsuHvtm', 2),
(20, 'Weasley', 'Ron', 'ronWeasley@hogwarts.com', 'rWeasley', '$2y$10$YMKoLN4OBgafMhT5ybYjyee/daRstAv1HMCo5faaC./yDNkrQmNo.', 2),
(21, 'Brekker', 'Kaz', 'manager@crowclub.com', 'DirtyHands', '$2y$10$NUw22e9s1H8Duo1cWnjDkuD.U0eDdeFYstFjRwi6r2l6/n1QLXoh.', 2),
(24, 'Helvar', 'Matthias', 'druskelle@ice-court.com', 'WhiteWolf', '$2y$10$anR5GMYx6kf4xba55l6jn./IMgmFDqOkxuX2d2v.AvZCoCcZnf7Pe', 2),
(26, 'Starkov', 'Alina', 'a.starkov@ravka.com', 'SunSummoner', '$2y$10$iHhsETVEMAUpvP9e2DiAMOpAl21orJO6l05mywqrwajI9Gw0qYqa2', 2),
(27, 'Ghafa', 'Inej', 'inej@the-dregs.com', 'TheWraith', '$2y$10$glLkOg/AAKoSgPwxcDkHvuyWLsbn7tcscOxYSwAsvI7nXXKFHV79.', 2),
(30, 'Auteur', 'Blog', 'test@gmail.com', 'Admin1', '$2y$10$VrkmN6pSP1ADlOe7dISadu6J.g3YC3B61eCHS6Oc7q7vAyZM/9ydO', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `fk_comments_postId` (`postId`),
  ADD KEY `fk_comments_userId` (`userId`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_userId` (`authorId`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `fk_user_role` (`roleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_postId` FOREIGN KEY (`postId`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `fk_comments_userId` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_userId` FOREIGN KEY (`authorId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`roleId`) REFERENCES `role` (`roleId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
