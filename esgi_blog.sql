-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 13 déc. 2023 à 13:43
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `esgi_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '4f56fe65c8bd5296ca6a5f95faa0d65fb54b1ad8a87a1f816c7206803bcff938', 'admin@mail.com');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `author_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `author_id`, `category_id`) VALUES
(2, NULL, NULL, NULL, NULL),
(3, 'HopToDesk – Une solution gratuite de prise de contrôle d’ordinateur à distance', 'Laissez-moi vous présenter HopToDesk, une solution de bureau à distance, qui est non seulement gratuite, mais également disponible sur toutes vos plateformes préférées, notamment Windows, Mac, Linux, Android, iOS et Raspberry Pi.\r\n\r\nVous avez peut-être déjà dû dépanner un membre de sa famille totalement noob, à l’autre bout de la France ?\r\n\r\nOu alors vous vous êtes retrouvé coincer en vacances sans pouvoir accéder à un document important resté sur votre ordinateur de bureau ?\r\n\r\nLa galère !\r\n\r\nMais ça c’était avant car maintenant, vous connaissez HopToDesk.\r\n\r\nHopToDesk est conçu pour être sécurisé avec un chiffrement total du trafic réseau, ce qui garantit que toutes les données transférées entre les périphériques sont protégées et ne peuvent pas être interceptées par des criminels trop curieux.\r\n\r\nEdit : Thibault, lecteur de Korben.info, vient de me signaler que HopToDesk était un fork complet de RustDesk dont je vous ai déjà parlé. Toutefois, les deux projets ne semblent pas en bon terme puisque HopToDesk aurait repris à son compte le code de RustDesk sans les mentions de licence d’usage. Vous trouverez plus d’infos ici et là.\r\n\r\n\r\nIl est également doté d’un chat en direct, ce qui signifie que vous pouvez discuter avec vos collègues ou amis directement depuis le logiciel, facilitant ainsi la collaboration et la résolution rapide des problèmes.\r\n\r\nUne autre fonctionnalité intéressante de HopToDesk est le transfert de fichiers qui permet de transmettre des documents entre votre ordinateur local et celui auquel vous accédez à distance. Comme ça, plus besoin de vous galérer à passer par un service de stockage en ligne.\r\n\r\n\r\nPour tester ça, rendez-vous simplement sur le site officiel de HopToDesk et télécharger l’application pour votre plateforme préférée (Mac / Windows / Linux / Android / iOS…etc.).', 1, 2),
(4, 'Nuclear – Un player musical multi-source', 'À cause de la guerre en Ukraine, de Bruno Le Maire et de l’inflation galopante, tout le monde, n’a malheureusement, pas les moyens de s’offrir un abonnement Spotify à 10,99 euros par mois. Mais plutôt que de se galérer avec des moyens illégaux pour télécharger de la musique, je vous propose de tester Nuclear.\r\n\r\n\r\nCe player au design proche de Spotify et similaire à mps-youtube vous permet de chercher des morceaux sur différentes sources telles que Bandcamp, Soundcloud, Youtube, de voir les pochettes des albums, d’écouter la musique, de faire des playlists et même de la télécharger dans certains cas (quand c’est sur Youtube surtout).\r\n\r\n\r\nNuclear est dispo pour Linux, macOS et Windows, et propose également d’avoir les paroles des chansons, un égalisateur pour régler le son, et même un visualiseur pour se faire un petit moment psychédélique.\r\n\r\n\r\nBref, c’est le feu parce qu’on y trouve tous les artistes, les albums, des plus connus aux plus obscurs. Nuclear propose également des playlists du moment (comme sur Spotify), des artistes similaires et même un mode « folie » pour se laisser surprendre par les musiques.\r\n\r\n\r\nVous pouvez le télécharger ici.\r\n\r\nMerci Letsar !', 1, 3),
(5, 'Comment détecter les clé USB / Cartes SD frauduleuses avec ValiDrive ?', 'Vous avez acheté une clé USB ou une carte SD de plusieurs téraoctets sur AliExpress ou Amazon et vous commencez à douter de la capacité de stockage de votre nouveau joujou. En effet, une arnaque courante chez certains constructeurs bas de gamme, consiste à vendre pas cher des clés USB de 1 ou 2 To totalement frauduleuses. C’est-à-dire que votre système la verra bien, par exemple, comme une clé de 2 To, sauf qu’à l’intérieur il n’y aura que quelques Go de stockage.\r\n\r\nC’est un gros souci, car si vous dépassez la capacité de cette clé en la blindant de fichiers, sans vous en apercevoir, les données ne seront pas écrites du tout et c’est au moment où vous aurez besoin de votre backup ou de vos fichiers que vous vous apercevrez de la supercherie.\r\n\r\nMais alors, comment faire pour vérifier la capacité réelle d’un disque avant d’y stocker toutes vos précieuses données ?\r\n\r\nC’est là qu’intervient ValiDrive. Ce petit logiciel pour Windows, développé par Gibson Research Corporation, va effectuer des vérifications aléatoires sur toute la capacité de stockage d’un disque USB pour s’assurer du stockage et de la récupération des données.\r\n\r\n\r\nUne fois l’analyse terminée, ValiDrive affichera alors les statistiques de temps d’accès du disque ainsi que la valeur réelle du stockage disponible. En gros, en vert, c’est du stockage valide (ici 62 GB) et en rouge l’espace non valide.\r\n\r\n\r\nBref, ne vous laissez pas berner par des offres trop alléchantes et des capacités de stockage trop belles pour être vraies et en cas de doute, un petit coup de ValiDrive. Comme ça, si vous avez acheté de la merde, retour à l’envoyeur !', 1, 4),
(6, 'Gérez les mises à jour de vos logiciels Windows grâce à UpdateHub', 'Vous le savez, une fois que votre PC Windows est rempli de tout un tas de logiciels, le suivi des mises à jour peut devenir un véritable casse-tête, notamment si vous êtes une grosse feignasse.\r\n\r\nAh si seulement on pouvait mettre à jour tous ses softs en un seul clic, pendant qu’on est parti prendre sa douche. Ce serait royal !\r\n\r\nLes Linuxiens connaissent d’ailleurs très bien ce super pouvoir et vous pourrez enfin partager quelque chose avec eux !\r\n\r\nEt cela cgrâce à UpdateHub, votre nouvel assistant de mise à jour tout-en-un ! Cette application conviviale simplifie grandement le processus de mise à jour des logiciels. Plus besoin de lancer les softs un par un ou d’aller sur les sites officiels pour vérifier les dernières mises à jour puisque UpdateHub s’occupe de tout, et ce, jusqu’aux MAJ de votre système d’exploitation en passant par les apps du Microsoft Store.\r\n\r\nRien ne lui échappe !\r\n\r\n\r\nAinsi, UpdateHub assure la sécurité de votre machine en maintenant à jour les protections et correctifs de sécurité, et dispose (ouf !) d’une fonction de retour en arrière pour les mises à jour éventuellement problématiques. Donc pas de stress ! Mieux encore, il vous fournit des informations détaillées sur chaque mise à jour, afin de vous aider à comprendre leurs impacts. Pour les amateurs de changelog comme moi, c’est le feu !\r\n\r\nAlors vous vous demandez sûrement comment ça fonctionne ?\r\n\r\nLe processus est simple et se fait en quelques étapes. Tout d’abord, UpdateHub analyse l’ensemble de vos disque dur et détecte tous les logiciels installés. Ensuite, il vérifie si des mises à jour sont disponibles et vous présente une liste complète. Vous pouvez alors choisir les mises à jour que vous souhaitez appliquer et UpdateHub se chargera alors de les télécharger et de les installer.\r\n\r\nUpdateHub est sûr, gratuit et n’a besoin que de 250 Mo d’espace disque disponible pour s’installer. Et même si ça discute d’une version pour macOS et Linux, pour le moment, ce n’est que pour Windows.\r\n\r\nAlors, qu’attendez-vous pour essayer UpdateHub ?\r\n\r\n', 1, 4),
(8, 'Comment installer Windows 11 ARM sur VMware Fusion – Apple Silicon', '\r\nJ’aurais mis quelques années, mais ça y est, je suis enfin passé sur une architecture ARM64 pour mon usage quotidien. Il s’agit d’un iMac M3 (donc Apple Silicon) de couleur bleu pastel et ça marche super bien !\r\n\r\nSauf évidemment, quand on veut faire de la machine virtuelle. Là, ça se complique. En effet, j’ai une licence Vmware Fusion 13.5 et si je veux faire tourner un Windows 11 dedans, il faut forcément que ce soit un Windows ARM.\r\n\r\nAprès quelques errances, j’ai réussi du coup, j’en profite pour vous faire un petit tuto de comment installer Windows 11 ARM dans VMware Fusion.\r\n\r\nPour commencer, vous devez vous procurer l’image Windows 11 ARM chez Microsoft. Vous verrez qu’en la téléchargeant, vous vous retrouverez avec un fichier .VHDX (Hyper-V) totalement inutile pour Vmware… À moins de la convertir !\r\n\r\nEt pour ça, on va utiliser l’outil vdiskmanager de VMware. Ouvre donc un terminal et entrez la commande suivante :\r\n\r\n/Applications/VMware\\ Fusion.app/Contents/Library/vmware-vdiskmanager -r ./Windows11_InsiderPreview_Client_ARM64_en-us_22598.VHDX -t 0 ./Windows11.vmdk\r\n\r\nCela aura pour effet de transformer le VHDX en VMDK (format que vous pouvez aussi ouvrir sous VirtualBox).\r\n\r\nUne fois que c’est fait, lancez Vmware et créez une nouvelle VM. Choisissez ensuite « Créer une machine virtuelle personnalisée« .\r\n\r\n\r\nChoisissez Windows 11 ARM en système d’exploitation, puis n’oubliez pas de cocher la case « Démarrage sécurisé UEFI » (traduction de Secure Boot)\r\n\r\n\r\n\r\nMettez un mot de passe, puis allez chercher l’image VMDK comme Disque virtuel.\r\n\r\n\r\nAu moment de la sélection, n’oubliez pas de choisir « Effectuer une copie séparée du disque virtuel« . Cela aura pour effet de copier le disque virtuel à l’endroit de votre choix au moment de sa création, afin d’éviter tout bug.\r\n\r\n\r\nFinalisez l’opération et lancez la VM. Tadaaaaa ! Windows démarre, c’est merveilleux non ?\r\n\r\n\r\nSauf que y’a pas le support du réseau virtuel de Vmware dans cet image. On va donc devoir installer Windows sans support réseau. Quand vous serez sur cet écran (ou avant), appuyez sur la combinaison de touches MAJ + F10 (si vous avez un clavier Mac, faudra faire Fn + F10).\r\n\r\n\r\nCela va ouvrir un terminal dans lequel vous devrez entrer la commande suivante :\r\n\r\nOOBE\\BYPASSNRO\r\nÇa va activer la possibilité d’installer Windows 11 sans support réseau et relancer l’installation. Maintenant, vous devriez vous ceci :\r\n\r\n\r\n« I don’t have the fucking Internet » !! C’est l’option qu’il nous fallait ! Cliquez dessus puis sur « Continue With Limited Setup« .\r\n\r\n\r\n\r\nEt voilà, finalisez l’install et vous aurez un beau Windows sans réseau. Mais whaaaat, sans réseau c’est nul, alors on va arranger ça. Lancez un Powershell en admin….\r\n\r\n\r\net entrez la commande suivante et faites « A » pour « Yes to All » :\r\n\r\nSet-ExecutionPolicy RemoteSigned\r\n\r\nEnsuite, vous n’avez plus qu’à installer les Vmware Tools en passant par le menu de Vmware :\r\n\r\n\r\nUn petit reboot de Windows plus tard, et voilà, vous avez maintenant un Windows parfaitement fonctionnel (mais non activé) sur votre machine ARM.\r\n\r\nEt en bonus, j’avais fait cette vidéo pour mes Patreons il y a quelques semaines. Rejoignez-nous !', 1, 1),
(9, 'L’auto-hébergement facile avec Cloudron', 'On n’arrête pas le progrès !!\r\n\r\nD’ailleurs, le monde de l’hébergement web n’est pas en reste y compris pour tout ce qui est self-hosting, ou auto-hébergement en bon français. Ce concept, longtemps réservé à une niche de geeks passionnés et de professionnels avertis, s’est largement démocratisé ces dernières années.\r\n\r\nEn effet, l’auto-hébergement offre une autonomie totale sur l’administration et la configuration de vos sites et applications web. Vous êtes le seul maître à bord et cette liberté a un goût particulièrement savoureux dans un monde numérique de plus en plus sujet aux dérives liées à la centralisation des données et à leur exploitation par de grosses entreprises.\r\n\r\nIci, c’est vous qui choisissez où vos données sont stockées, comment elles sont gérées et qui peut y accéder.\r\n\r\nMais évidemment, qui dit grand pouvoir dit aussi grandes responsabilités. L’auto-hébergement nécessite une certaine maîtrise technique et un investissement en temps souvent conséquent pour déployer et maintenir les applications, sans parler de la sécurité. Heureusement, des solutions existent pour vous faciliter la vie et en retirer tous les bénéfices sans avoir à en subir (trop) les inconvénients.\r\n\r\nC’est pourquoi je souhaite vous parler aujourd’hui de Cloudron, une plateforme qui fait véritablement entrer le self-hosting dans une nouvelle ère.\r\n\r\nEn quelques mots, il s’agit d’une plateforme qui simplifie considérablement l’auto-hébergement en permettant de déployer en quelques minutes seulement vos applications préférées, allant de NextCloud à RocketChat en passant par Gogs, pour ne citer qu’eux. Si la liste vous intéresse, cliquez ici.\r\n\r\n\r\nAvec Cloudron, chaque application est déployée dans un container Docker, ce qui facilite à la fois l’installation, la mise à jour et la sauvegarde.\r\n\r\nPas de blabla inutile, pas de manipulations compliquées, tout est pensé pour vous faciliter la vie et vous permettre de vous concentrer sur l’essentiel : l’utilisation de vos applications. L’équipe de Cloudron propose même un service clé en main incluant l’hébergement et le backup si vous ne souhaitez pas vous lancer dans l’hébergement sur votre propre serveur.\r\n\r\nCloudron, c’est aussi une série de fonctionnalités particulièrement attractives pour tous ceux qui s’intéressent à l’auto-hébergement. On y trouve une quarantaine d’applications disponibles en un clic, un serveur mail complet avec SPF, DKIM et DMARC, un système de backup en local ou sur Amazon S3 et via Minio, ainsi qu’un système de sécurité complet avec iptables, les clés SSH et le protocole HTTPS sécurisé avec HSTS pour tous les sous-domaines.\r\n\r\n\r\nEn termes de prérequis, se lancer avec Cloudron ne demande pas grand-chose. Il vous faudra simplement un serveur Ubuntu Jammy 22.04 (x64) avec 1 Go de RAM ou plus, 20 GB d’espace disque, un nom de domaine (et pas seulement un sous-domaine) et une connexion SSH en utilisant une clé SSH. L’installation se fait en quelques minutes seulement grâce à un script de configuration et vous pouvez accéder à votre Cloudron en vous rendant à l’adresse IP de votre serveur (vérifiez bien que les ports 443 et 80 sont dégagés).\r\n\r\nwget https://cloudron.io/cloudron-setup\r\nchmod +x cloudron-setup\r\n./cloudron-setup\r\nUne fois Cloudron installé, vous pourrez configurer votre plateforme, notamment le nom de domaine et la gestion des DNS, soit via Amazon Route 53, DigitalOcean, avec un Wildcard ou manuellement. Une fois l’installation terminée, vous pourrez alors accéder à votre Cloudron via l’adresse principale de votre Cloudron qui sera https://my.votrenomdedomaine.com.\r\n\r\nPour approfondir le sujet et découvrir toutes les fonctionnalités de Cloudron, je vous invite à consulter la documentation complète sur leur site.\r\n\r\nVoilà, vous êtes maintenant armés pour vous lancer dans l’aventure de l’auto-hébergement avec Cloudron. C’est une solution que je recommande chaudement à tous ceux qui souhaitent reprendre le contrôle de leurs données tout en bénéficiant d’un confort d’utilisation et d’une simplicité d’administration hors du commun. Mais attention quand même, vous devrez être rigoureux car la sécurité de vos données ne dépendra alors plus que de vous.\r\n\r\nMerci à FortyTwo pour l’info.', 1, 7),
(10, 'Distil-Whisper – Pour faire de la reconnaissance vocale rapide', 'Vous vous souvenez de Whisper dont je vais déjà parlé à maintes reprises ? C’est un outil qui utilise l’IA pour faire de la reconnaissance vocale, c’est à dire convertir des paroles audio en texte. Et ça marche avec de nombreuses langues, dont le français.\r\n\r\nEt bien vous allez pouvoir faire tout pareil mais encore plus vite grâce à Distil-Whisper, une version allégée de Whisper qui est 6 fois plus rapide et qui utilise un modèle IA 49% plus petit que son grand frère. Pour couronner le tout, Distil-Whisper n’a qu’un taux d’erreur de 1%, ce qui est plutôt impressionnant.\r\n\r\nCela est possible grâce à son algorithme fractionné, qui permet de transcrire des fichiers audio longs 9 fois plus rapidement que l’algorithme séquentiel d’OpenAI. N’ayons pas peur des mots, c’est une véritable révolution pour ceux qui ont besoin de traiter de grands volumes de données audio.\r\n\r\nVoici l’architecture du modèle Distil-Whisper :\r\n\r\n\r\nActuellement, Distil-Whisper est disponible uniquement pour la reconnaissance vocale en anglais, mais avec l’évolution rapide de ce domaine, on peut s’attendre à ce que d’autres langues soient prises en charge bientôt.\r\n\r\nDistil-Whisper est donc conçu pour remplacer Whisper en matière de reconnaissance vocale en anglais, avec cinq avantages clés : une inférence plus rapide, une meilleure robustesse au bruit, une réduction des hallucinations, une utilisation en décodage spéculatif et une licence permissive pour les applications commerciales. Ce bijou de technologie a été entraîné sur 22 000 heures de données audio pseudo-étiquetées dans 10 domaines différents et en provenance de plus de 18 000 intervenants.\r\n\r\nToute la doc et les exemples d’utilisation son ici.\r\n\r\nLe futur de la reconnaissance vocale semble prometteur !', 1, 8);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `libelle`) VALUES
(1, 'MacOS'),
(2, 'Infos'),
(3, 'Linux'),
(4, 'Windows'),
(7, 'Réseaux'),
(8, 'IA');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `content`, `author`, `article_id`) VALUES
(1, 'test', 'nikolai', 3),
(2, 'Super article, j\'ai vraiment adoré, ce fut passionant et j\'ai apris énormément de choses', 'Un super fan', 3),
(3, 'Super cet articles', 'arthur', 4),
(4, 'J\'adore cet article', 'Un super fan', 3),
(6, 'beurk', 'zdaazd', 3),
(7, 'pas ouf', 'dazdzad', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
