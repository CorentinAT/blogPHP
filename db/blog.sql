-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 11 oct. 2023 à 06:13
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `description`, `id_user`) VALUES
(48, 'Comprendre les Boucles en PHP', 'Les boucles sont un concept central en programmation, et elles sont particulièrement essentielles dans le langage de script PHP. Les boucles permettent de répéter des actions ou des tâches de manière efficace, ce qui simplifie la gestion des données et l\'automatisation des processus. Dans cet article, nous allons explorer les trois types de boucles les plus couramment utilisés en PHP : la boucle for, la boucle while, et la boucle foreach.\n\n<strong>La Boucle for</strong>\n\nLa boucle for est utilisée lorsque vous connaissez le nombre d\'itérations nécessaires à l\'avance. Elle est souvent utilisée pour parcourir un ensemble de valeurs ou exécuter une série d\'actions un certain nombre de fois.\n\n<strong>La Boucle while</strong>\n\nLa boucle while est employée lorsque vous souhaitez répéter une action tant qu\'une condition spécifique est vraie. Elle est utile lorsque le nombre d\'itérations n\'est pas prédéfini, mais dépend d\'une condition.\n\n<strong>La Boucle foreach</strong>\n\nLa boucle foreach est spécialement conçue pour parcourir les éléments d\'un tableau ou d\'une collection de données. Elle simplifie le processus de parcours de tableaux en éliminant la nécessité de gérer les indices.\n\n<strong>Conclusion</strong>\n\nLes boucles en PHP sont des structures de contrôle puissantes qui vous permettent d\'automatiser des tâches répétitives et de traiter efficacement les données. Chacun des types de boucles a ses avantages et son utilité dans différentes situations de programmation.\n\nEn apprenant à utiliser ces boucles, vous serez en mesure de créer des scripts PHP plus efficaces et plus flexibles. Que ce soit pour traiter des données, générer des pages web dynamiques ou automatiser des processus, les boucles sont un outil essentiel pour tout développeur PHP.', 10),
(51, 'Pourquoi PHP est Meilleur que Java', 'Le débat entre PHP et Java a toujours été une source de controverse parmi les développeurs. Cependant, dans cet article, nous allons avancer l\'argument selon lequel PHP est indéniablement supérieur à Java.\r\n\r\n<strong>1. Facilité d\'Apprentissage</strong>\r\n\r\nL\'une des principales raisons pour lesquelles PHP l\'emporte sur Java est sa facilité d\'apprentissage. PHP est connu pour sa simplicité syntaxique, ce qui en fait un choix idéal pour les débutants en programmation. Contrairement à Java, qui peut être complexe avec ses classes, ses packages et ses typages stricts, PHP permet aux développeurs de se mettre rapidement au travail sans être submergés par une courbe d\'apprentissage abrupte.\r\n\r\n<strong>2. Rapidité de Développement</strong>\r\n\r\nPHP est un langage de script conçu spécifiquement pour le web, ce qui signifie qu\'il est rapide à mettre en place. Les développeurs PHP peuvent créer des pages web dynamiques en un temps record. Avec Java, le développement peut être plus long en raison de la nécessité de compiler le code à chaque modification. PHP offre une expérience de développement plus fluide et productive.\r\n\r\n<strong>3. Grande Communauté et Ressources Abondantes</strong>\r\n\r\nPHP bénéficie d\'une communauté massive de développeurs et d\'une abondance de ressources en ligne. Il existe d\'innombrables forums, tutoriels et frameworks PHP qui facilitent le développement. Les développeurs PHP ont un accès facile à une grande base de connaissances pour résoudre des problèmes et apprendre de nouvelles techniques.\r\n\r\n<strong>4. Flexibilité</strong>\r\n\r\nPHP est extrêmement flexible. Vous pouvez l\'utiliser pour créer des petites pages web statiques, des applications web complexes, des API REST, ou même des scripts en ligne de commande. Cette polyvalence fait de PHP un choix attrayant pour divers projets, tandis que Java est souvent associé à des applications d\'entreprise massives.\r\n\r\n<strong>5. Hébergement Abordable</strong>\r\n\r\nLorsqu\'il s\'agit d\'hébergement web, PHP a un avantage clair. De nombreux hébergeurs web proposent des plans d\'hébergement PHP à des prix abordables, ce qui permet aux développeurs de lancer leurs projets en ligne sans dépenser une fortune. En revanche, Java nécessite généralement un hébergement plus coûteux.\r\n\r\n<strong>Conclusion</strong>\r\n\r\nBien sûr, ce point de vue est biaisé et ne tient pas compte des avantages de Java dans certains domaines, notamment les applications d\'entreprise complexes. Cependant, il est important de reconnaître que PHP offre des avantages significatifs en matière de simplicité, de rapidité de développement, de communauté et de flexibilité pour le développement web.\r\n\r\nEn fin de compte, le choix entre PHP et Java dépend des besoins spécifiques de votre projet et de votre expérience personnelle. Cependant, il est indéniable que PHP mérite une place de choix dans le monde du développement web.', 10),
(50, 'Sécurisez Vos Mots de Passe en PHP : Le Hachage Expliqué', 'La sécurité des données est une préoccupation majeure dans le développement web, en particulier lorsqu\'il s\'agit de gérer les informations sensibles des utilisateurs, telles que les mots de passe. Le hachage des mots de passe est une pratique essentielle pour protéger ces informations contre les accès non autorisés. Dans cet article, nous allons explorer ce qu\'est le hachage de mots de passe en PHP et comment l\'utiliser pour renforcer la sécurité de votre application web.\r\n\r\n<strong>Qu\'est-ce que le Hachage de Mots de Passe ?</strong>\r\n\r\nLe hachage de mots de passe est le processus de conversion d\'un mot de passe en une chaîne de caractères aléatoire, appelée hachage. Le hachage est unidirectionnel, ce qui signifie qu\'il est difficile, voire impossible, de reconvertir le hachage en mot de passe d\'origine. Cela rend les mots de passe hachés plus sécurisés, car même si la base de données de votre application est compromise, les pirates informatiques ne peuvent pas facilement récupérer les mots de passe en clair.\r\n\r\n<strong>Comment Hacher un Mot de Passe en PHP</strong>\r\n\r\nEn PHP, vous pouvez utiliser la fonction password_hash() pour hacher un mot de passe.\r\nLa fonction password_hash() génère automatiquement un sel aléatoire et hache le mot de passe en utilisant un algorithme de hachage sécurisé. Le résultat est un hachage unique qui peut être stocké en toute sécurité dans votre base de données.\r\n\r\n<strong>Vérification des Mots de Passe</strong>\r\n\r\nPour vérifier si un mot de passe entré par un utilisateur correspond au hachage stocké dans la base de données, vous pouvez utiliser password_verify().\r\nLa fonction password_verify() compare le mot de passe saisi par l\'utilisateur avec le hachage stocké en base de données et renvoie true si le mot de passe est correct, sinon false.\r\n\r\n<strong>Conclusion</strong>\r\n\r\nLe hachage de mots de passe est une étape cruciale pour garantir la sécurité des données utilisateur dans une application web. En utilisant les fonctions password_hash() et password_verify() de PHP, vous pouvez facilement mettre en place une sécurité robuste pour les mots de passe. N\'oubliez pas de prendre en compte d\'autres aspects de la sécurité, tels que la protection de votre base de données, pour garantir la sécurité globale de votre application.\r\n\r\nEn appliquant ces bonnes pratiques de sécurité, vous pouvez offrir à vos utilisateurs une expérience en ligne plus sûre et renforcer la réputation de votre application en tant qu\'entité digne de confiance.', 16),
(52, 'La dernière version de PHP enterre la concurrence', 'PHP, l\'un des langages de programmation les plus populaires au monde pour le développement web, est sur le point de prendre un nouvel envol avec sa dernière version. Avec des améliorations significatives, une performance accrue et des fonctionnalités modernes, PHP laisse ses concurrents loin derrière. Dans cet article, nous allons explorer ce qui rend la dernière version de PHP si impressionnante et pourquoi elle semble enterrer ses rivaux.\r\n\r\n<strong>1. Des Performances Optimisées</strong>\r\n\r\nLa dernière version de PHP a fait des progrès significatifs en termes de performances. Les développeurs PHP peuvent désormais bénéficier de temps de chargement plus rapides, ce qui améliore l\'expérience utilisateur. Les optimisations internes et les mises à jour de la compilation JIT (Just-In-Time) ont permis de réduire considérablement la latence et d\'augmenter la vitesse d\'exécution des scripts.\r\n\r\n<strong>2. Syntaxe Améliorée et Fonctionnalités Modernes</strong>\r\n\r\nPHP a également modernisé sa syntaxe et ajouté de nouvelles fonctionnalités. Les développeurs peuvent désormais tirer parti de la syntaxe plus concise et des fonctionnalités telles que la correspondance de motifs (pattern matching) et les opérateurs nullables. Ces ajouts facilitent la rédaction de code plus lisible et maintenable.\r\n\r\n<strong>3. Facilité d\'Utilisation et Documentation Complète</strong>\r\n\r\nLa dernière version de PHP est livrée avec une documentation complète et conviviale, ce qui facilite l\'apprentissage et le développement. De plus, les outils de développement tels que Composer et l\'intégration de Composer 2.0 simplifient la gestion des dépendances, ce qui est essentiel pour la création d\'applications web modernes.\r\n\r\n<strong>4. Une Grande Communauté de Développeurs</strong>\r\n\r\nPHP bénéficie d\'une communauté de développeurs active et engagée qui contribue constamment à son amélioration. Cette communauté élargie signifie que les développeurs PHP ont accès à une grande base de connaissances, des forums, des tutoriels et des bibliothèques de code prêtes à l\'emploi.\r\n\r\n<strong>5. Adaptabilité aux Nouvelles Tendances</strong>\r\n\r\nPHP reste adaptatif aux nouvelles tendances technologiques. Il prend en charge les architectures de microservices, les applications serverless, et s\'intègre facilement aux technologies front-end telles que React et Vue.js. Cette polyvalence permet aux développeurs de PHP de rester compétitifs dans un environnement de développement web en constante évolution.\r\n\r\n<strong>Conclusion</strong>\r\n\r\nLa dernière version de PHP ne se contente pas de rivaliser avec ses concurrents, elle les enterre. Avec des améliorations de performance, des fonctionnalités modernes et une communauté de développeurs active, PHP continue d\'être un choix de premier plan pour le développement web.\r\n\r\nBien sûr, chaque langage de programmation a ses avantages et ses inconvénients, et le choix dépendra toujours des besoins spécifiques du projet. Cependant, il est indéniable que PHP est une option puissante et compétitive pour le développement web moderne.', 16),
(55, 'L\'excellence incarnée : Notre Professeur de PHP, Alexis Monnet', 'Lorsque nous parlons de professeurs qui laissent une impression durable et profonde sur leurs élèves, le nom d\'Alexis Monnet surgit immédiatement à l\'esprit. En tant que passionné de PHP et expert dans son domaine, Alexis incarne l\'excellence en enseignement, et nous ne pouvons pas être plus reconnaissants de l\'avoir comme guide dans notre voyage vers la maîtrise de ce langage de programmation.\r\n\r\n<strong>Une Passion Contagieuse</strong>\r\n\r\nDès le premier jour de cours avec Alexis, on ressent sa passion inébranlable pour PHP. Sa manière de parler du langage et des projets qu\'il a réalisés avec PHP est contagieuse. Il réussit à captiver l\'attention de chaque étudiant, même ceux qui n\'avaient aucune expérience préalable en programmation.\r\n\r\nAlexis ne se contente pas de partager ses connaissances théoriques sur PHP. Il nous emmène également dans un voyage pratique à travers ce langage, en nous encourageant à coder, à tester et à expérimenter par nous-mêmes. Sa pédagogie active et sa volonté de répondre à toutes nos questions font de chaque séance de cours une opportunité d\'apprentissage enrichissante.\r\n\r\n<strong>Un Mentor Inspirant</strong>\r\n\r\nEn dehors des cours, Alexis joue également un rôle essentiel en tant que mentor. Il est toujours disponible pour discuter de nos projets personnels, nous conseiller sur la résolution de problèmes complexes, et nous guider vers les meilleures pratiques en matière de développement PHP. Sa porte est toujours ouverte, et il se montre patient et bienveillant dans ses interactions avec les étudiants.\r\n\r\nCe mentorat va au-delà de la simple programmation. Alexis nous inculque des compétences essentielles pour réussir dans le monde professionnel, telles que la résolution de problèmes, la collaboration en équipe et la pensée critique. Sa vision globale de l\'industrie de la programmation nous aide à comprendre comment PHP s\'intègre dans un écosystème plus vaste de technologies.\r\n\r\n<strong>Un Innovateur dans l\'Âme</strong>\r\n\r\nCe qui distingue Alexis Monnet, c\'est sa capacité à rester à la pointe de l\'innovation dans le domaine de PHP. Il ne se contente pas d\'enseigner les concepts établis, mais il nous montre également les dernières tendances et les technologies émergentes. Grâce à lui, nous sommes toujours informés des mises à jour et des nouvelles fonctionnalités de PHP.\r\n\r\nAlexis nous encourage également à explorer et à contribuer à la communauté open source PHP. Il nous montre comment notre passion pour la programmation peut avoir un impact positif sur la communauté, en partageant nos connaissances et en contribuant au développement de PHP lui-même.\r\n\r\n<strong>Conclusion</strong>\r\n\r\nEn fin de compte, avoir Alexis Monnet comme professeur de PHP est une bénédiction. Sa passion, son mentorat et son engagement envers l\'innovation sont des éléments clés qui ont un impact durable sur la vie de ses étudiants. Grâce à lui, nous devenons non seulement des programmeurs PHP compétents, mais aussi des individus mieux préparés à réussir dans le monde de la technologie.\r\n\r\nNous ne pouvons qu\'espérer que d\'autres auront également la chance de bénéficier de son enseignement exceptionnel. Merci, Alexis Monnet, pour tout ce que vous faites pour nous et pour la communauté PHP. Vous êtes une source d\'inspiration et un exemple à suivre pour nous tous.', 17),
(54, 'Python surpasse enfin PHP ? (pas du tout)', 'Dans le vaste paysage des langages de programmation, il existe un champion incontesté depuis des années : PHP. Bien que certaines voix s\'efforcent de promouvoir Python, il est temps de rappeler pourquoi PHP continue de dominer le monde du développement web et pourquoi il n\'y a aucune chance que cela change de sitôt.\r\n\r\n<strong>1. PHP : Un Géant du Web</strong>\r\n\r\nPHP est depuis longtemps un géant incontesté du web. Il est utilisé par des millions de sites web et d\'applications web dans le monde entier. Cette popularité continue de croître grâce à une base de code solide et à des performances fiables.\r\n\r\n<strong>2. Une Grande Famille de Frameworks</strong>\r\n\r\nPHP dispose d\'une large gamme de frameworks robustes qui facilitent le développement d\'applications web complexes. Que vous optiez pour Laravel, Symfony, ou CodeIgniter, vous avez l\'embarras du choix pour développer rapidement des applications puissantes.\r\n\r\n<strong>3. La Simplicité à son Meilleur</strong>\r\n\r\nPHP est reconnu pour sa simplicité. Il offre une syntaxe intuitive qui permet aux développeurs de se concentrer sur la création de fonctionnalités sans être entravés par des détails techniques inutiles. Cette simplicité est essentielle pour la productivité des développeurs.\r\n\r\n<strong>4. Performance Stupéfiante</strong>\r\n\r\nContrairement à ce que certains pourraient prétendre, PHP offre des performances stupéfantes pour les applications web. Les améliorations continues apportées au langage garantissent une exécution rapide des scripts, ce qui est essentiel pour répondre aux besoins de l\'utilisateur moderne.\r\n\r\n<strong>5. Une Communauté Active et Engagée</strong>\r\n\r\nPHP bénéficie d\'une communauté active et engagée de développeurs. Cette communauté se traduit par une abondance de ressources, des forums de support, des tutoriels en ligne et des contributions constantes à l\'évolution du langage.\r\n\r\n<strong>Conclusion</strong>\r\n\r\nMalgré les prétentions de certains à vouloir propulser Python au sommet, PHP demeure le choix incontesté pour le développement web. Sa longue histoire de succès, ses frameworks puissants, sa simplicité, ses performances époustouflantes et sa communauté engagée en font un langage imbattable.\r\n\r\nEn fin de compte, le choix du langage de programmation dépend des besoins spécifiques de chaque projet, mais il est indéniable que PHP est un choix solide et durable pour créer des applications web puissantes et efficaces.', 16);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(5, 'Actualité'),
(4, 'Web'),
(53, 'Java'),
(57, 'Python'),
(41, 'PHP');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8mb4_bin NOT NULL,
  `id_user` int NOT NULL,
  `id_article` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `description`, `id_user`, `id_article`) VALUES
(10, 'J\'ai rarement lu un article qui étale autant de vérité, félicitations !', 19, 55),
(9, 'Complètement d\'accord !\r\nCe professeur est vraiment excellent (le meilleur ??) dans son domaine', 18, 55),
(11, 'J\'ai eu peur en voyant le titre...\nHeureusement vous m\'avez encore régalé !', 20, 54);

-- --------------------------------------------------------

--
-- Structure de la table `lien_categorie_article`
--

DROP TABLE IF EXISTS `lien_categorie_article`;
CREATE TABLE IF NOT EXISTS `lien_categorie_article` (
  `id_article` int NOT NULL,
  `id_categorie` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `lien_categorie_article`
--

INSERT INTO `lien_categorie_article` (`id_article`, `id_categorie`) VALUES
(26, 4),
(28, 5),
(28, 4),
(29, 5),
(31, 5),
(33, 5),
(33, 4),
(50, 41),
(33, 41),
(34, 5),
(34, 4),
(36, 4),
(34, 53),
(37, 5),
(34, 41),
(36, 5),
(49, 41),
(37, 53),
(37, 41),
(38, 5),
(38, 4),
(38, 53),
(39, 5),
(39, 4),
(48, 41),
(39, 53),
(39, 57),
(39, 41),
(40, 57),
(41, 53),
(42, 5),
(42, 4),
(43, 53),
(43, 57),
(46, 5),
(47, 5),
(47, 41),
(51, 53),
(51, 41),
(52, 5),
(52, 4),
(52, 41),
(53, 5),
(53, 57),
(53, 41),
(54, 57),
(54, 41),
(55, 5),
(55, 41);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` text COLLATE utf8mb4_bin NOT NULL,
  `pseudo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '',
  `mdp` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `pseudo`, `mdp`, `admin`) VALUES
(18, 'toto@localhost.fr', 'Marc', '31f7a65e315586ac198bd798b6629ce4903d0899476d5741a9f32e2e521b6a66', 0),
(10, 'corentin@localhost.fr', 'Corentin', '4f682b71153ffa91e608445d7ea1257e2076d0d95eab6336cd1aa94b49680f11', 0),
(9, 'admin@localhost.fr', 'Admin', '210151a65a14a22f3e3daf068d898bef2a9c88551c4a46ac42d8b93b94349c54', 1),
(20, 'elouan@localhost.fr', 'Elouan', '7aeac0134ea941e94a2b3b48dd956fd1d187222f9a1880810ab460c4ecd87e41', 0),
(19, 'astrid@localhost.fr', 'Astrid', '9c804f2550e31d8f98ac9b460cfe7fbfc676c5e4452a261a2899a1ea168c0a50', 0),
(17, 'corentin_aime@localhost.fr', 'Corentin et Aimé', 'f4f263e439cf40925e6a412387a9472a6773c2580212a4fb50d224d3a817de17', 0),
(16, 'aime@localhost.fr', 'Aimé', '2c22b54025700ef14dff1e050798fa1e981e359071b55672e5e6f70e5bcca181', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
