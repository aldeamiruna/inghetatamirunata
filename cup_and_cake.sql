-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2020 at 03:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cup_and_cake`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(100) NOT NULL,
  `county` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `house_number` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `county`, `city`, `street`, `house_number`, `zipcode`) VALUES
(23, 'Brasov', 'Brașov', 'Sunset Boulevard', '142', '123456'),
(24, 'Brasov', 'Brașov', 'Strada Stejarului', '175', '987654'),
(25, 'Brasov', 'Prejmer', 'Strada Galaxiei', '96', '369852'),
(26, 'Brasov', 'Brașov', 'Strada Pinewood', '78', '789456'),
(27, 'Brasov', 'Brașov', 'Aleea Lavandei', '204', '202454');

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `admin_id` int(100) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`admin_id`, `admin_name`, `admin_email`, `admin_username`, `admin_password`, `admin_phone`) VALUES
(1, 'admin', 'admin@mail.com', 'admin', '202cb962ac59075b964b07152d234b70', '0749483271');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `article_id` int(100) NOT NULL,
  `article_image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `article_title` varchar(255) NOT NULL,
  `article_link` varchar(255) NOT NULL,
  `article_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`article_id`, `article_image`, `date`, `article_title`, `article_link`, `article_description`) VALUES
(2, 'images/article_3.jpg', '2020-06-09 22:29:58', '12 Secrets to Take Your Baking from Good to Great', 'https://www.tasteofhome.com/collection/baking-tips-that-take-your-baking-from-good-to-great/', 'Descriere descriere descriere descriere descrieredescscsdc dsddvssds dsedsc'),
(3, 'images/article_2.jpg', '2020-06-09 23:04:27', 'The Rise & Fall Of The Cupcake', 'https://www.tastemade.com/articles/the-rise-and-fall-of-the-cupcake', 'Descriere descriere descriere descriere descrieredescscsdc dsddvssds dsedsc'),
(4, 'images/article_1.jpg', '2020-06-10 17:27:04', 'Everything You Need to Know to Make Gorgeous Cupcakes', 'https://food52.com/blog/14296-everything-you-need-to-know-to-make-gorgeous-cupcakes', 'Descriere descriere descriere descriere descrieredescscsdc dsddvssds dsedsc'),
(5, 'images/article_4.jpg', '2020-06-10 17:30:38', 'Cupcake Fun Facts', 'https://mobile-cuisine.com/did-you-know/cupcake-fun-facts/', 'Descriere descriere descriere descriere descrieredescscsdc dsddvssds dsedsc');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(100) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Ciocolată'),
(2, 'Fructe'),
(3, 'Cafea'),
(4, 'Cremoase'),
(5, 'Rafinate'),
(6, 'Speciale'),
(7, 'Vegane');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(100) NOT NULL,
  `client_firstname` varchar(255) NOT NULL,
  `client_lastname` varchar(255) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `client_username` varchar(255) NOT NULL,
  `client_password` varchar(255) NOT NULL,
  `client_birthdate` date NOT NULL,
  `client_gender` varchar(255) NOT NULL,
  `client_phone` varchar(255) NOT NULL,
  `ban_expiry_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_firstname`, `client_lastname`, `client_email`, `client_username`, `client_password`, `client_birthdate`, `client_gender`, `client_phone`, `ban_expiry_date`) VALUES
(8, 'Jackson', 'Judy', 'judyjackson@yourmail.com', 'judyjackson12', '827ccb0eea8a706c4c34a16891f84e7b', '1975-07-14', 'F', '798653212', '2020-06-21'),
(9, 'Harry', 'Bailly', 'harry.b20@yourmail.com', 'baillyharry20', 'e10adc3949ba59abbe56e057f20f883e', '1985-03-10', 'M', '758963254', NULL),
(10, 'Lily', 'Bart', 'lily.bart@yourmail.com', 'lily_bart384', '827ccb0eea8a706c4c34a16891f84e7b', '1995-07-16', 'F', '735169854', NULL),
(11, 'Jim', 'Hawkins', 'thejimhawkins@yourmail.com', 'thejimhawk', '827ccb0eea8a706c4c34a16891f84e7b', '1988-12-18', 'M', '718936542', NULL),
(12, 'Nora', 'Helmer', 'nora.helmer@yourmail.com', 'norahelm40', '827ccb0eea8a706c4c34a16891f84e7b', '1992-11-26', 'F', '725264896', NULL),
(13, 'Daisy', 'Miller', 'daisy.m@yourmail.com', 'daisym145', '827ccb0eea8a706c4c34a16891f84e7b', '1996-08-30', 'F', '796451325', NULL),
(14, 'Sadie', 'Thompson', 'sadie.thompson@yourmail.com', 'sadiet17', '827ccb0eea8a706c4c34a16891f84e7b', '1984-04-19', 'F', '758964512', NULL),
(15, 'Sam', 'Weller', 'samuel.weller17@yourmail.com', 'samwell17', '827ccb0eea8a706c4c34a16891f84e7b', '1993-06-18', 'M', '789653214', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(100) NOT NULL,
  `client_id` int(100) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `recipe_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `client_id`, `message`, `date`, `recipe_id`) VALUES
(14, 12, 'I tried out the recipe, these are really great!', '2020-06-21 15:24:42', 9),
(16, 12, 'Love this recipe so much! The kids ate all of them in no time.', '2020-06-21 15:31:56', 10),
(17, 12, 'Really liked this one!', '2020-06-21 15:32:53', 8),
(18, 14, 'The banana-walnut combination is just amazing! ', '2020-06-21 15:33:51', 10),
(19, 14, 'This recipe is among my favourites! ', '2020-06-21 15:34:36', 8),
(20, 8, 'I recommend this recipe!', '2020-06-21 15:35:46', 10);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `discount_code` varchar(12) NOT NULL,
  `discount_amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`discount_code`, `discount_amount`) VALUES
('DXBNTPWFAL15', 15),
('PBAGEWUXJL12', 12),
('QHCFLVKSUB8', 8),
('QHSBLKNIPD15', 15),
('RAKBCWXLMD15', 15),
('RSTJIGLZVB12', 12),
('ZSFTUDQIYK12', 12);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(100) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `sender`, `sender_email`, `subject`, `comment`) VALUES
(4, 'Matthew Anna', 'anna.matthew90@yourmail.com', 'Birthday Event', 'Hello! Does the cafe allow small birthday get-together given the pandemic conditions? ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `order_discount` decimal(10,2) NOT NULL,
  `order_delivery` decimal(10,2) NOT NULL,
  `order_subtotal` decimal(10,2) NOT NULL,
  `order_total` decimal(10,2) NOT NULL,
  `address_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `client_id`, `date`, `order_discount`, `order_delivery`, `order_subtotal`, `order_total`, `address_id`) VALUES
(17, 11, '2020-06-21 16:18:29', '12.00', '0.00', '79.00', '67.00', 23),
(18, 10, '2020-06-21 16:20:14', '0.00', '0.00', '51.00', '51.00', 24),
(19, 13, '2020-06-21 16:22:04', '12.00', '0.00', '84.00', '72.00', 25),
(20, 15, '2020-06-21 16:25:33', '0.00', '12.00', '34.50', '46.50', 26),
(21, 9, '2020-06-21 16:30:15', '12.00', '0.00', '58.50', '46.50', 27);

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `order_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`order_id`, `product_id`, `quantity`) VALUES
(17, 15, 2),
(17, 10, 1),
(17, 13, 1),
(17, 2, 1),
(17, 7, 1),
(18, 20, 1),
(18, 8, 3),
(19, 12, 2),
(19, 8, 2),
(19, 1, 2),
(20, 27, 1),
(20, 3, 1),
(20, 4, 1),
(21, 24, 3),
(21, 6, 1),
(21, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_price` decimal(65,2) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_code`, `product_price`, `product_image`, `product_description`) VALUES
(1, 'Coacăze roșii și alune', 'CUPCRA100', '13.50', 'images/pcf_1.jpg', 'Descriere descrieredescscsdc descrierii descrieredescscsdc desc descrieredses'),
(2, 'Cireșe și rachiu', 'CUPCRC100', '16.00', 'images/imb_2.jpg', 'Descriere descrieredescscsdc descrierii descrieredescscsdc desc descrieredses'),
(3, 'Pădurea neagră', 'CUPPDN100', '13.00', 'images/imb_4.jpg', 'Descriere descrieredescscsdc descrierii descrieredescscsdc desc descrieredses'),
(4, 'Clasice cu afine', 'CUPCLAF100', '12.50', 'images/pcf_4.jpg', 'Descriere descrieredescscsdc descrierii descrieredescscsdc desc descrieredses'),
(5, 'Chocolate Peanut Butter Pretzel', 'CUPBESTCPB100', '15.00', 'images/best_1.jpg', 'Descriere descriereresdesdesdc descriere descriere descriere'),
(6, 'Lemon Meringue', 'CUPBESTLM200', '12.00', 'images/best_2.jpg', 'Descriere descriereresdesdesdc descriere descriere descriere'),
(7, 'Vanilla Bean Popcorn Chocolate', 'CUPBESTVBPC200', '15.00', 'images/best_3.jpg', 'Descriere descriereresdesdesdc descriere descriere descriere'),
(8, 'Fererro Dream', 'CUPBESTFERD200', '14.50', 'images/best_4.jpg', 'Descriere descriereresdesdesdc descriere descriere descriere'),
(9, 'Suc de Portocale', 'RACORSUCPOR', '12.00', 'images/colddrink6.jpg', 'Descriere descrieredescscsdc descrierii descrieredescscsdc desc descrieredses'),
(10, 'Suc de Ananas', 'RACORSUCANNS', '13.00', 'images/colddrink1.jpg', 'Descriere descrieredescscsdc descrierii descrieredescscsdc desc descrieredses'),
(11, 'Băutură Carbogazoasă', 'RACORCARB', '6.00', 'images/colddrink2.png', 'Descriere descrieredescscsdc descrierii descrieredescscsdc desc descrieredses'),
(12, 'Suc de Rodii', 'RACORSUCRODIE', '14.00', 'images/colddrink3.jpg', 'Descriere descrieredescscsdc descrierii descrieredescscsdc desc descrieredses'),
(13, 'Limonadă cu Mentă', 'RACORLIMMINT', '11.00', 'images/colddrink4.jpg', 'Descriere descrieredescscsdc descrierii descrieredescscsdc desc descrieredses'),
(14, 'Suc de Mango', 'RACORSUCMANGO', '12.00', 'images/colddrink5.jpg', 'Descriere descrieredescscsdc descrierii descrieredescscsdc desc descrieredses'),
(15, 'AFFOGATO (ITALIA)', 'XTRAAFFOG', '12.00', 'images/eu_affogato.jpg', 'Una dintre vedetele Italiei, cafeaua Affogato e printre favoritele tuturor'),
(16, 'EINSPÄNNER (AUSTRIA)', 'XTRAEINSPNNR', '11.50', 'images/eu_einspanner.jpg', 'Gustul autentic din Alpi, gata să-ți coloreze fiecare zi a săptămânii'),
(17, 'KAFFEOST (SUEDIA)', 'XTRAKAFFEOST', '9.50', 'images/eu_kaffeost.jpg', 'Combinația aparte a suedezilor va fi garantat o surpriză plăcută'),
(18, 'ESPRESSO ROMANO (ITALIA)', 'XTRASPRSSROMANO', '7.00', 'images/eu_espresso_romano.jpg', 'Descriere descriereresdesdesdc descriere descriere descriere'),
(19, 'PHARISÄER KAFFEE (GERMANIA)', 'XTRAPHARISAER', '9.50', 'images/eu_pharisaer.jpg', 'Descriere descriereresdesdesdc descriere descriere descriere'),
(20, 'MAZAGRAN (PORTUGALIA)', 'XTRAMZGRN', '7.50', 'images/eu_mazagran.jpg', 'Descriere descriereresdesdesdc descriere descriere descriere'),
(21, 'CA PHE TRUNG (VIETNAM)', 'XTRACAPHETRNG', '9.50', 'images/alte_caphetrung.jpg', 'Descriere descriereresdesdesdc descriere descriere descriere'),
(22, 'KOPI JOSS (INDONESIA)', 'XTRAKOPIJOSS', '8.50', 'images/alte_kopijoss.jpg', 'Descriere descriereresdesdesdc descriere descriere descriere'),
(23, 'QAHWA (ARABIA SAUDITĂ)', 'XTRAQAHWA', '7.00', 'images/alte_qahwa.jpg', 'Descriere descriereresdesdesdc descriere descriere descriere'),
(24, 'BULLETPROOF COFFEE (USA)', 'XTRABLLTPRF', '11.00', 'images/alte_bulletproof.jpg', 'Descriere descriereresdesdesdc descriere descriere descriere'),
(27, 'CAFE LAGRIMA (ARGENTINA)', 'XTRALAGRIMA', '9.00', 'images/alte_lagrima.jpg', 'Descriere descriereresdesdesdc descriere descriere descriere\r\n'),
(28, 'CAFEZINHO (BRAZILIA)', 'XTRACAFEZINHO', '9.00', 'https://i.ibb.co/K5RvkS4/alte-cafezinho.jpg', 'Descriere descriereresdesdesdc descriere descriere descriere');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `recipe_id` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_idea` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `first_header` varchar(255) NOT NULL,
  `first_list` text NOT NULL,
  `second_header` varchar(255) NOT NULL,
  `second_list` text NOT NULL,
  `third_header` varchar(255) NOT NULL,
  `third_list` text NOT NULL,
  `prep_header` varchar(255) NOT NULL,
  `prep_content` text NOT NULL,
  `prep_time_header` varchar(255) NOT NULL,
  `prep_time_content` text NOT NULL,
  `tags` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `category_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`recipe_id`, `title`, `short_idea`, `image`, `first_header`, `first_list`, `second_header`, `second_list`, `third_header`, `third_list`, `prep_header`, `prep_content`, `prep_time_header`, `prep_time_content`, `tags`, `datetime`, `category_id`) VALUES
(1, 'Cupcakes cu Smântână Grasă și Fulgi de Ciocolată', 'Pentru iubitorii de ciocolată', 'images/recipe_1.jpg', 'Pentru 12 bucăți', '120 g unt moale;150 g zahăr;1 plic zahăr vanilat;2 ouă;150 g făină;1/2 linguriță praf de copt;1 priză de sare;100 g ciocolată amăruie;100 g smântână grasă;12 forme de hârtie;fulgi de ciocolată pentru decor', 'Pentru cremă', '100 g unt moale;2 linguri smântână grasă;1 linguriță vanilină (pudră de vanilie);200 g zahăr pudră', '', '', 'Mod de preparare', 'Preîncălziți cuptorul la 170°C. Puneți formele de hârtie în tava de brioșe. Mixați untul cu zahărul și zahărul vanilat până devine cremos, apoi încorporați pe rând ouăle. Amestecați făina cu praful de copt și sarea si înglobați-o în compoziția de unt și ouă.</br></br>Topiți ciocolata la bain-marie și încorporați-o în aluat amestecând continuu. La final, adăugați smântână grasă. Distribuiți aluatul în forme și coaceți cca 25 de minute pe raftul din mijloc al cuptorului, apoi lăsați să se răcească pe un grătar pentru prăjituri.</br></br>Pentru cremă, mixați untul cu smântână grasă și extractul de vanilie până obțineți o compoziție spumoasă, apoi adăugați zahărul pudră. Dacă crema este prea moale, mai adăugați zahăr pudră până obțineți consistența dorită. Umpleți cu cremă un cornet de șpirțat cu duză mare și distribuiți pe cupcake-uri sau întindeți cu un cuțit neted. Serviți-le presărate cu fulgi de ciocolată', 'Timp de preparare', 'Timp de preparare: cca 20 de minute (plus cca 25 de minute timp de coacere și cca 30 de minute timp de răcire). Per bucată cca 404 kcal/1.692 kJ 4 g P, 22 g G, 45 g CH', 'SMÂNTÂNĂ;CIOCOLATĂ;BRIOȘE;CUPCAKE', '2020-05-13 22:41:19', 1),
(2, 'Cupcakes Espresso', 'Băutura preferată sub acoperire', 'images/recipe_2.jpg', 'Pentru 12 bucăți', '60 g ciocolată amăruie;140 g unt;2 ouă;120 g zahăr;150 g făină;1 lingură cacao pudră;1 lingură praf de espresso instant;1 linguriță praf de copt;1/2 linguriță bicarbonat de sodiu;2 lingurițe espresso;3 linguri marmeladă de portocale;12 forme de hârtie', 'Pentru bezea', '3 albușuri;1 priză de sare;125 g zahăr;2 linguri cacao pudră;sos de ciocolată pentru decor', '', '', 'Mod de preparare', 'Preîncălziți cuptorul la 175°C și puneți formele de hârtie într-o tavă de brioșe. Topiți ciocolata amăruie cu untul la bain-marie. Lăsați să se răcească ușor. Bateți ouăle spumă împreună cu zahărul. Încorporați încet compoziția de ciocolată și unt, apoi amestecați făina cu pudra de cacao, praful espresso și praful de copt. Cerneți deasupra aluatului și amestecați împreună cu espresso până la omogenizare. Distribuiți în forme și coaceți pe raftul din mijloc al cuptorului cca 25 de minute. Scoateți și lăsați să se răcească complet în tavă. Cu o linguriță, întindeți marmelada de portocale pe cupcake-uri. Setați cuptorul la 200°C. </br></br>Pentru bezea, bateți spumă alubușurile cu o priză de sare. Adăugați zahărul și continuați să bateți cca 6 minute, până când compoziția este foarte tare. Cerneți pulberea de cacao deasupra și încorporați. Umpleți cu compoziție un cornet se șpirțat cu duză normală și decorați cupcake-urile. Introduceți în cuptor pentru cca 5 minute, apoi scoateți, lăsați să se răcească și picurați puțin sos de ciocolată înainte de servire.', 'Timp de preparare', 'Timp de preparare: cca 30 de minute (plus cca 30 de minute timp de coacere și cca 30 de minute timp de răcire). Per bucată cca 277 kcal/1.163 kJ, 5 g P, 13 g G, 35 g CH', 'CAFEA;CUPCAKE;PORTOCALE;BRIOȘE', '2020-05-13 22:45:13', 3),
(3, 'Cupcakes cu Alune', 'O combinație aparte și înduioșătoare cu alune', 'images/recipe_3.jpg', 'Pentru 12 bucăți', '70 g alune măcinate; 125 g unt moale; 125 g zahăr; 1 priză de sare; 2 ouă; 150 g făină; 2 lingurițe praf de copt; 5 linguri lichior de alune; 12 forme de hârtie', 'Pentru cremă', '120 g zahăr; 75 g unt moale; 175 g brânză grasă proaspătă; 1 priză de sare; 1 linguriță budincă de vanilie; 30 g migdale caramelizate după preferințe; 3 linguri de lichior de nuci; migdale caramelizate pentru decor', '', '', 'Mod de preparare', 'Preîncălziți cuptorul la 175°C și puneți formele de hârtie în tava de brioșe. Prăjiți într-o tavă fără grăsime alunele măcinate până când acestea încep să devină maronii, apoi lăsați-le să se răcească. Amestecați untul moale cu zahărul și sarea până obțineți o compoziție cremoasă. Adăugați treptat ouăle. </br></br> Amestecați făina cu praful de copt și alunele prăjite și înglobați-o în aluat împreună cu lichiorul de alune. Distribuiți în forme și coaceți pe raftul din mijloc al cuptorului cca 20 de minute. Scoateți și lăsați să se răcească. </br></br> Pentru cremă, amestecați toate ingredientele, cu excepția migdalelor caramelizate și a lichiorului de nuci, și mixați-le până când s-a topit zahărul. Înglobați apoi migdalele caramelizate. Puneți crema într-un cornet de șprițat cu duză în formă de stea și distribuiți pe cupcake-uri. Picurați deasupra lichior de nuci după preferințe și serviți cupcake-urile presărate cu migdale caramelizate.', 'Timp de preparare', 'Timp de preparare: cca 30 de minute (plus cca 20 de minute timp de coacere și cca 30 de minute timp de răcire). Per bucată cca 400 kcal/1.681 kJ, 5 g P, 25 g G, 28 g CH', 'CUPCAKE; ALUNE; MIGDALE; VANILIE', '2020-05-25 19:38:00', 4),
(4, 'Cupcakes cu Mere și Cremă de Scorțișoară', 'Combinația ideală de mere cu un strop de scorțișoară', 'images/recipe_4.jpg', 'Pentru 12 bucăți', '120 g unt moale; 120 g zahăr; 2 ouă; 120 g făină; 1 linguriță scorțișoară; 2 mere; 12 forme de hârtie; felii de mere pentru decor', 'Pentru glazură', '100 g brânză grasă proaspătă; 60 g unt moale; 1 linguriță scorțișoară măcinată; 250 g zahăr pudră;', '', '', 'Mod de preparare', 'Preîncălziți cuptorul la 170°C (ventilație 150°C). Așezați formele de hârtie în tava de brioșe. Bateți spumă untul cu zahărul, apoi adăugați treptat ouăle. Amestecați făina cu scorțișoara și înglobați-le în crema de unt și ouă. </br></br> Descojiți merele, tăiați-le în patru, scoateți-le sâmburii și tăiați-le cubulețe sau răzuiți-le fin, în funcție de preferințe. La final, amestecați-le în aluat, apoi distribuiți compoziția rezultată în forme și coaceți-le cca 25 de minute pe raftul din mijoc al cuptorului, după care lăsați-le să se răcească pe un grătar pentru prăjituri.</br></br> Pentru cremă, amestecați spumă brânza grasă proaspătă cu untul. Amestecați scorțișoara cu zahărul pudră și înglobați-le în crema de brânză proaspătă. În cazul în care consistența este prea slabă, mai adăugați puțin zahăr pudră. Umpleți cu cremă un cornet de sprițat cu duză mare și distribuiți pe cupcake-uri sau întindeți cu un cuțit neted. Decorați cu câteva felii subțiri de măr.', 'Timp de preparare', 'Timp de preparare: cca 40 de minute (plus cca 25 de minute timp de coacere și cca 30 de minute timp de răcire). Per bucată cca 337 kcal/1.410 kJ, 4 g P, 17 g G, 41 g CH', 'MERE;CUPCAKE;SCORȚIȘOARĂ;BRIOȘĂ', '2020-05-25 19:59:39', 2),
(5, 'Cupcakes cu Limoncello', 'Gustul aparte al lichiorului italienesc în mici cupcake-uri', 'images/recipe_5.jpg', 'Pentru 12 bucăți', '100 g marțipan; 120 g unt moale; 120 g zahăr; 170 g făină; 2 plicuri zahăr vanilat; 1 priză de sare; 2 ouă; 1 lingură coajă răzuită de la 1 lămâie netratată; 1 linguriță praf de copt; 3 linguri cacao pudră; 75 ml lapte; 12 forme de hârtie', 'Pentru cremă', '125 ml frișcă; 1/2 plic întăritor de frișcă; 1 plic zahăr vanilat; 200 g mascarpone; 3 linguri Limoncello; 50 g zahăr; 12 bucățele lămâie confiată pentru decor', '', '', 'Mod de preparare', 'Preîncălziți cuptorul la 175°C și puneți formele de hârtie în tava de brioșe. Formați 12 biluțe din marțipan, de aceeași mărime. Amestecați untul moale cu zahărul, zahărul vanilat și sarea până obțineți o compoziție cremoasă. Adăugați treptat ouăle, apoi înglobați coaja de lămâie. Amestecați făina cu praful de copt și cacaua pudră și încorporați în aluat alternând laptele. Distribuiți jumătate din aluat în adâncituri. Așezați biluțele de marțipan și acoperiți-le cu aluatul rămas. Coaceți cca 25 de minute pe raftul din mijloc al cuptorului, după care scoateți și lăsați să se răcească pe un grătar pentru prăjituri. </br></br> Pentru cremă, bateți spumă frișcă cu întăritorul de frișcă și zahărul vanilat. Amestecați bine brânza mascarpone cu Limoncello și zahărul, până când zahărul s-a dizolvat. Încorporați frișca. Umpleți cu cremă un cornet de șpirțat și distribuiți pe cupcake-uri, apoi așezați deasupra câte o bucată de lămâie confiată.', 'Timp de preparare', 'Timp de preparare: cca 30 de minute (plus cca 25 de minute timp de coacere și cca 30 de minute timp de răcire). Per bucată cca 350 kcal/1.470 kJ, 6 g P, 22 g G, 31 g CH', 'CUPCAKE;LIMONCELLO;LĂMÂIE;MARȚIPAN', '2020-05-25 20:45:29', 5),
(6, 'Cupcakes cu Fructe de Pădure și Ciocolată Albă', 'Gustul inedit și tandru al ciocolatei albe alături de irezistibilele fructe de pădure', 'images/recipe_6.jpg', 'Pentru 12 bucăți', '175 g fructe de pădure (congelate); 100 g ciocolată albă; 125 g unt; 125 g zahăr; 1 priză de sare; 2 ouă; 60 ml lapte; 175 g făină; 2 lingurițe praf de copt; 12 forme de hârtie', 'Pentru glazură', '2 albușuri; 1 priză de sare; 100 g zahăr; 1/2 linguriță praf de copt; 100 g mure', '', '', 'Mod de preparare', 'Preîncălziți cuptorul la 175°C și așezați formele de hârtie în tava de brioșe. Puneți fructele de pădure la decongelat într-o sită și lăsați-le să se scurgă. Răzuiți ciocolata. Topiți untul la bain-marie, apoi turnați-l într-un castron și bateți-l spumă cu zahărul și sarea. Adăugați ouăle pe rând, în timp ce bateți cu telul. Încorporați laptele. Amestecați făina cu praful de copt, cerneți deasupra și amestecați. La final, înglobați fructele de pădure și ciocolata răzuită. Distribuiți aluatul în forme și coaceți cca 25 de minute pe raftul din mijloc al cuptorului. Scoateți și lăsați să se răcească complet pe un grătar pentru prăjituri.</br></br>\r\nPentru glazură, bateți spumă albușurile cu sarea până se întăresc. Turnați zahărul în ploaie și bateți totul cu praful de copt la bain-marie până se întărește. Scoateți și bateți în continuare cu telul, până când compoziția s-a răcit. Spălați murele, zvântați-le, puneți 12 bucăți deoparte, iar pe restul încorporați-le.  Distribuiți glazura pe cupcake-uri și așezați deasupra câte o mură. Serviți imediat.', 'Timp de preparare', 'Timp de preparare: cca 35 de minute (plus cca 25 de minute timp de coacere și cca 30 de minute timp de răcire). Per bucată cca 299 kcal/1.256 kJ, 5 g P, 14 g G, 38 g CH', 'CUPCAKE;FRUCTE DE PĂDURE;CIOCOLATĂ;CIOCOLATĂ ALBĂ', '2020-05-25 21:34:27', 2),
(7, 'Cupcakes cu Pere și Topping de Ciocolată', 'Gustul irezistibil al ciocolății alături de inconfundabilele pere', 'images/recipe_7.jpg', 'Pentru 12 bucăți', '1 lămâie netratată; 2 pere tari de mărime mijlocie; 100 ml suc de mere; 150 g zahăr; 100 g unt; 50 g ciocolată amăruie; 2 ouă; 1 priză de sare; 150 g făină ; 1 linguriță praf de copt; 50 ml lapte; 12 forme de hârtie', 'Pentru cremă', '30 g alune măcinate; 250 g ciocolată amăruie; 250 ml frișcă; 2 linguri fistic mărunțit pentru decor', '', '', '', 'Preîncălziți cuptorul la 175°C. Așezați formele de hârtie în tava de brioșe. Spălați bine lămâia, ștergeți-o, răzuiți fin coaja și stoarceți sucul. Spălați perele, descojiți-le, scoateți miezul cu sâmburii și tăiați-le felii. Amestecați perele cu coaja de lămâie, 2 linguri de suc de lămâie, sucul de mere și 2 linguri de zahăr și fierbeți-le înăbușit cca 5 minute până se înmoaie. Scurgeți zeama și tăiați perele în bucăți. </br></br> Topiți untul și ciocolata la bain-marie. Luați de pe foc și lăsați să se răcească ușor. Bateți spumă ouăle cu restul de zahăr și sare. Turnați în fir subțire compoziția de unt și ciocolată. Amestecați făina cu praful de copt și adăugați-o în aluat alternând cu laptele. La final, încorporați bucățile de pere. Compoziția se pune în forme și se coace cca 25 de minute pe raftul din mijloc al cuptorului, după care se scot și se lasă să se răcească.</br></br> Pentru cremă, prăjiți alunele într-o tigaie. Luați de pe foc. Rupeți ciocolata în bucăți. Încălziți frișca amestecând continuu, turnați peste ciocolată și lăsați să stea cca 5 minute, apoi amestecați bine. Puneți cel puțin 2 ore la rece, apoi bateți până se întărește. Încorporați alunele. Umpleți un cornet de șprițat cu duză în formă de stea și șprițați pe cupcake-uri. Decorați cu fistic mărunțit.', 'Timp de preparare', 'Timp de preparare: cca 30 de minute (plus cca 25 de minute timp de coacere și cca 2 ore timp de stat la rece). Per bucată cca 404 kcal/1.698 kJ, 6 g P, 26 g G, 38 g CH', 'CIOCOLATĂ;PERE;ALUNE;FISTIC', '2020-05-25 22:27:41', 2),
(8, 'Cupcakes cu Căpșuni și Migdale', 'Deliciile mici și roșii însoțite de gustul autentic al migdalelor', 'images/recipe_8.jpg', 'Pentru 12 bucăți', '300 g căpșuni;125 g unt moale;125 g zahăr;1 priză de sare;2 ouă; 150 g făină;1 linguriță praf de copt;1 linguriță bicarbonat de sodiu;80 g migdale măcinate;12 forme de hârtie\r\n', 'Pentru cremă', '225 g ciocolată albă;40 g unt;250 g mascarpone;12 căpșuni pentru decor', '', '', 'Mod de preparare', 'Preîncălziți cuptorul la 175°C. Așezați formele de hârtie în tava de brioșe. Spălați căpșunile, zvântați-le, curățați-le și faceți-le piure. Amestecând continuu, dați-le o dată în clocot, apoi lăsați-le să se răcească. Amestecați spumă untul cu zahărul și sarea. Încorporați treptat ouăle. Amestecați făina cu praful de copt, bicarbonatul de sodiu și migdalele, apoi încorporați-le în aluat alternând cu piureul de căpșuni. Puneți compoziția în forme și coaceți-o cca 25 de minute pe raftul din mijloc al cuptorului. Scoateți apoi și lăsați să se răcească pe un grătar pentru prăjituri. </br></br>Pentru cremă, rupeți ciocolata în bucăți și puneți-o împreună cu untul să se topească la bain-marie. Spălați căpșunile pentru decor și zvântați-le. Introduceți-le pe jumătate în ciocolată, apoi așezați-le pe un grătar pentru prăjituri și lăsați să se răcească. Lăsați restul compoziției de ciocolată să se răcească puțin, apoi adăugați brânza mascarpone. Umpleți un cornet de șpirțat cu duză mare în formă de stea și șpirțați pe cupcake-uri. Așezați deasupra câte o căpșună trasă în ciocolată.\r\n', 'Timp de preparare', 'Timp de preparare: cca 30 de minute (plus cca 25 de minute timp de coacere și cca 30 de minute timp de răcire). Per bucată cca 415 kcal/1.744 kJ, 7 g P, 28 g G, 35 g CH\r\n', 'CUPCAKES; MIGDALE; CÂPȘUNI; BRIOȘE', '2020-05-31 18:18:18', 2),
(9, 'Cupcakes cu Ananas', 'Nelipsitul gust autentic al fructului tropical', 'images/recipe_9.jpg', 'Pentru 12 bucăți', '125 g unt;2 ouă;125 g zahăr;2 plicuri de zahăr vanilat;1 priză de sare;150 g făină;2 lingurițe de praf de copt;1/2 linguriță de bicarbonat de sodiu;50 ml suc de ananas;50 ml lapte;200 g pulpă proaspătă de ananas tăiată în bucăți;50 g fulgi de cocos;12 forme de hârtie\r\n', 'Pentru cremă', '\r\n225 g ciocolată albă;50 g unt;225 g brânză grasă proaspătă;90 g fulgi de cocos\r\n', '', '', 'Mod de preparare', '\r\nPreîncălziți cuptorul la 175°C. Așezați formele de hârtie în tava de brioșe. Topiți untul și lăsați să se răcească ușor. Bateți spumă ouăle cu zahărul, zahărul vanilat și sarea. Turnați untul în fir subțire, amestecând continuu. Amestecați făina cu praful de copt și bicarbonatul de sodiu și înglobați-o în aluat alternând cu sucul de ananas și laptele. La final, amestecați bucățile de ananas și fulgii de cocos. Puneți compoziția în forme și coaceți-o cca 25 de minute pe raftul din mijloc al cuptorului. Scoateți apoi și lăsați să se răcească pe un grătar pentru prăjituri.</br></br>Pentru cremă, rupeți ciocolata în bucățele și topiți-o cu untul la bain-marie, apoi amestecați-o cu brânza proaspătă și jumătate din cantitatea de fulgi de cocos și puneți-o la rece pentru cca 30 de minute. Umpleți cu cremă un cornet de șpirțat cu duză simplă și distribuiți-o pe cupcake-uri. Presărați deasupra restul fulgilor de cocos.', 'Timp de preparare', 'Timp de preparare: cca 40 de minute (plus cca 25 de minute timp de coacere, cca 30 de minute timp de răcire și cca 30 de minute timp de stat la rece). Per bucată cca 477 kcal/2.004 kJ, 7 g P, 34 g G, 37 g CH\r\n', 'CUPCAKE; ANANAS; COCOS; CIOCOLATĂ ALBĂ', '2020-05-31 18:29:27', 2),
(10, 'Cupcakes cu Banane și Glazură de Brânză Proaspătă ', 'Mult îndrăgitele banane învăluite de gustul unic al brânzei proaspete', 'images/recipe_10.jpg', 'Pentru 12 bucăți', '100 g unt moale;150 g zahăr brun;1 plic zahăr vanilat;2 ouă;150 g făină;1 linguriță praf de copt;1/2 linguriță bicarbonat de sodiu;1 priză de sare;1/2 linguriță de scorțișoară;2 banane coapte;75 ml lapte bătut;50 g nuci mărunțite;12 forme de hârtie;12 jumătăți de sâmbure de nucă pentru decor\r\n', 'Pentru cremă', '\r\n70 g unt moale;50 g brânză grasă proaspătă;100 g zahăr pudră;1 linguriță vanilină (pudră de vanilie)', '', '', 'Mod de preparare', 'Preîncălziți cuptorul la 175°C și așezați formele de hârtie în tava de brioșe. Bateți spumă untul cu zahărul și zahărul vanilat și încorporați ouăle pe rând. Amestecați făina cu praful de copt, bicarbonatul de sodiu, sarea și scorțișoara. Zdrobiți bananele cu o furculiță și amestecați cu laptele bătut. Înglobați alternativ făina și amestecul de banane în compoziția de unt și ouă, iar la sfârșit adăugați nucile.</br></br>Distribuiți uniform aluatul în formele de brioșe și coaceți cca 25 de minute pe raftul din mijloc al cuptorului, după care lăsați să se răcească pe un grătar de prăjituri.</br></br>Între timp, pentru glazură, amestecați spumă untul și brânza proaspătă. Adăugați zahărul pudră și vanilina, apoi întindeți crema pe cupcake-uri. Așezați deasupra jumătățile de nucă și serviți. ', 'Timp de preparare', 'Timp de preparare: cca 30 de minute (plus cca 25 de minute timp de coacere și cca 30 de minute timp de răcire). Per bucată cca 338 kcal/1.415 kJ, 5 g P, 18 g G, 36 g CH\r\n', 'CUPCAKE;BANANE; NUCĂ;BRÂNZĂ;', '2020-05-31 18:33:10', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(100) NOT NULL,
  `res_firstname` varchar(255) NOT NULL,
  `res_lastname` varchar(255) NOT NULL,
  `res_table` varchar(255) NOT NULL,
  `res_date` date NOT NULL,
  `res_time` varchar(255) NOT NULL,
  `res_phone` varchar(255) NOT NULL,
  `res_message` varchar(255) NOT NULL,
  `res_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `res_firstname`, `res_lastname`, `res_table`, `res_date`, `res_time`, `res_phone`, `res_message`, `res_status`) VALUES
(30, 'Vane', 'Angela', 'masa 1', '2020-07-02', '16:00 - 18:00', '0789546216', '', ''),
(31, 'Bennett', 'Sarah', 'masa 3', '2020-07-03', '19:00 - 21:00', '0785416548', '', ''),
(32, 'Smith', 'Gerald', 'masa 2', '2020-06-28', '13:00 - 15:00', '0798654123', '', ''),
(33, 'Dresden', 'Joseph', 'masa 4', '2020-07-10', '22:00 - 00:00', '0736251498', '2 seats on the right side', ''),
(41, 'Flagg', 'Kevin', 'masa 3', '2020-06-28', '19:00 - 21:00', '0794587621', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comments_recipes_FK` (`recipe_id`),
  ADD KEY `comments_client_FK` (`client_id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discount_code`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `address_orders_FK` (`address_id`),
  ADD KEY `orders_client_FK` (`client_id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD KEY `orders_products_order_FK` (`order_id`),
  ADD KEY `orders_products_product_FK` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`recipe_id`),
  ADD KEY `recipes_categoy_FK` (`category_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `article_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `recipe_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_client_FK` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`),
  ADD CONSTRAINT `comments_recipes_FK` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `address_orders_FK` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`),
  ADD CONSTRAINT `orders_client_FK` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`);

--
-- Constraints for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `orders_products_order_FK` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `orders_products_product_FK` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_categoy_FK` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
