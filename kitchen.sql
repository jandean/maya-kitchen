-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2014 at 02:18 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kitchen`
--
USE `themayak_kitchen`;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 Class; 2 Article; 3 Products',
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `class_category_id` int(10) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `type`, `title`, `slug`, `content`, `image`, `is_active`, `is_featured`, `class_category_id`, `date_created`, `date_updated`) VALUES
(44, 3, 'Chocolate Truffle', 'chocolate-truffle', 'Description<br>', 'product-product-1.jpg', 1, 0, NULL, '2014-04-22 01:00:54', '2014-04-26 11:06:10'),
(45, 1, 'Dough-Re-Mi', 'dough-re-mi', '26 April 2014', 'class-dough-re-mi.jpg', 0, 0, 3, '0000-00-00 00:00:00', '2014-04-26 01:08:51'),
(46, 2, 'Ilustrado Restaurant’s ‘Breaking Bread with our Heroes’ at The Maya Kitchen', 'ilustrado-restaurants-breaking-bread-with-our-heroes-at-the-maya-kitchen', '<p><strong>Ilustrado</strong>, the home of heritage Filipino–Spanish \r\ncuisine shares well loved dishes from our heroes’ hometowns at The Maya \r\nKitchen, 9am–1pm on October 26, Saturday with Boni Pimentel, Ilustrado \r\npresident and his chefs taking center stage.</p>\r\n<p>Recipes include Umbuyan, tinapa flakes sauteed in olive oil and \r\nwrapped in pechay leaves has its origins in Manila where Andres \r\nBonifacio was born.</p>\r\n<p><strong>Bagnet with KBL</strong> Sauce is an Ilocano version of \r\nlechon kawali with kamatis, bagoong and lasuna as sauce. Juan Luna and \r\nAntonio Luna are the proud sons of Ilocos Norte.</p>\r\n<p><strong>Manok ng mga Bayani</strong>, chicken simmered in bold \r\ntextures of dill, kamias, ground peanuts and toasted rice is inspired by\r\n no less than President Manuel Luis Quezon who hailed from Baler, \r\nAurora.</p>\r\n<p>National hero Jose Rizal from Binan, Laguna inspired <strong>Jaleang Bayabas</strong>, very ripe guavas peeled and mashed in milk and sugar.</p>\r\n<p>Rounding off the recipe line–up is <strong>Paella Ilustrado</strong>,\r\n Spanish rice dish with pork, chicken, seafood, chorizo bilbao, peppers \r\nand peas which is a consistent bestseller in the restaurant menu.</p>\r\n<p>Ilustrado, located at 744 General Luna Street, Intramuros, Manila \r\nopened its doors in 1989. Through the years it has expanded all over the\r\n metro and has also made a name in catering for clients such as \r\nMalacanang Palace and other government agencies, foreign embassies, \r\nmultinational corporations, local businesses and prominent \r\npersonalities. It is also a favorite wedding reception venue due in part\r\n to its proximity to some of Manila’s historic churches.</p>', 'article-ilustrado-restaurants-breaking-bread-with-our-heroes-at-the-maya-kitchen.jpg', 0, 0, NULL, '2014-04-26 10:52:32', '2014-04-26 12:48:19'),
(49, 2, 'Farm to Table — Organic Gourmet Cuisines', 'farm-to-table-organic-gourmet-cuisines', '<p>COn September 28, Saturday, 9am–1pm, Chef Robby Goco, the man behind \r\nthe Cyma Greek Taverna restaurant chain will again launch a new dining \r\nconcept as he visits The Maya Kitchen for a cooking demonstration.</p>\r\n<p>Chef Robby will share dishes inspired by Green Pastures, his latest \r\nrestaurant that features a unique farm to table cuisine featuring dishes\r\n that are created from all organic, local, original, with no \r\nantibiotics, vine ripened, unprocessed whole ingredients.</p>\r\n<p>The philosophy behind Green Pastures is to have the taste of the food\r\n as the main focus. It is to offer food the way it is supposed to be.</p>\r\n<p>The food is not your usual bland, lackluster organic kitchen \r\nofferings but rather food of exceptional taste presented in the most \r\ncreative ways. It is like gourmet organic with the restaurant offering \r\nduck, roast beef, chicken cooked slow for as long as six hours. The chef\r\n uses lardon and has rillette on his menu. He pulls his own cheese and \r\nwhat he cannot produce on his own, he sources from reliable suppliers.</p>\r\n<p>Chef Robby is a graduate of the California Culinary Academy. He owns \r\nand operates a total of eight Cyma Greek Taverna restaurants in \r\nGreenbelt 2, Shangri-la Plaza Mall, Trinoma, Eastwood Mall, Robinsons \r\nPlace Ermita, Robinsons Magnolia, Ayala Mall Cebu and D-Mall Boracay. \r\nHis latest venture, Green Pastures is on Level 4, East Wing, Shangri–la \r\nPlaza Mall.</p>', 'article-farm-to-table-organic-gourmet-cuisines.jpg', 1, 0, NULL, '2014-04-26 11:03:31', '2014-04-26 12:47:06'),
(50, 2, 'Chef Fern Aracama Recreates Childhood Media Noche', 'chef-fern-aracama-recreates-childhood-media-noche', '<p>Well known Chef Fernando “Fern” Aracama recalls fond memories of \r\nChristmas past in his cooking class at The Maya Kitchen on November 23, \r\nSaturday from 9am–1pm.</p>\r\n<p>A very young boy walking home from midnight mass with his family is \r\nsomething Chef Fern remembers to this day. He took inspiration from the \r\ntraditional Media Noche meal that awaited them but this time he shares \r\nrecipes of dishes that are not the usual but delightful nonetheless.</p>\r\n<p>To warm you up is <strong>Patatas Riojana</strong>, a very simple yet hearty and delicious potato and chorizo soup Chef Fern revisited on his recent trip to Spain.</p>\r\n<p>To fill you up is <strong>Grilled Ensaimada</strong> Media Noche style. Hot and crusty butter grilled ensaimada stuffed with Chinese ham and queso de bola.</p>\r\n<p><strong>Insalata Uvato</strong> goes with the Grilled Ensaimada. This\r\n is his signature salad with honey balsamico vinaigrette, toasted pine \r\nnuts, green and red grapes and kesong puti. Malunggay and Mozzarella dip\r\n is nutritious greens in a creamy, cheesy brûleé best served with crispy\r\n crostini. This is a signature appetizer in Aracama Filipino Cuisine, \r\none of Chef Fern’s restaurants.</p>\r\n<p>And because it is Christmas there has to be <strong>Bunuelos and Warm Chocolate Dip</strong>.\r\n These are the recipes of Chef Fern’s dear Abuelita of deep fried choux \r\npastries served with a thick and smooth milk chocolate dip.</p>\r\n<p>Chef Fern hails from Bacolod and is a graduate of the University of \r\nthe Philippines with a degree in Hotel and Restaurant Administration. He\r\n took further studies at The New England Culinary Institute in \r\nMontpelier, Vermont USA and was a 2003 Cochran Fellowship Program \r\nAwardee at the Hilton College, University Of Houston, Texas, USA.</p>\r\n<p>Chef Fern has a long list of bars and restaurants to his name like \r\nAracama Filipino Cuisine, Opus, Republiq &amp; Café Republiq, MYTHAI \r\nKitchen, Lucky Niku Café, The ChopHouse, The Tides Hotel Boracay as well\r\n as previous spots Restaurant UVA, Encore/Embassy &amp; Member’s Only \r\nand CANTEEN simple+good food. He is also active in World Association of \r\nChef Societies (WACS), Les Toques Blances Philippines, Council of Chefs,\r\n United States of America’s Department of Agriculture and is a Chef \r\nConsultant with Philippine Airlines.</p>', 'article-chef-fern-aracama-recreates-childhood-media-noche.jpg', 1, 1, NULL, '2014-04-26 11:05:17', '2014-04-26 12:47:12'),
(51, 1, 'Basic Culinary', 'basic-culinary', 'May 13 to 16<br>', 'class-basic-culinary.jpg', 1, 0, 2, '2014-04-26 12:30:33', '2014-04-26 12:31:15'),
(52, 1, 'Mother’s Day Baking Class', 'mothers-day-baking-class', 'May 10<br>', 'class-mothers-day-baking-class.jpg', 1, 0, 2, '2014-04-26 12:31:08', '2014-04-26 12:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 Recipe; 2 Class',
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `type`, `name`, `description`) VALUES
(1, 2, 'Lifestyle Courses', ''),
(2, 2, 'Short Courses', ''),
(3, 2, 'Kids', ''),
(4, 1, 'Filipino', ''),
(5, 1, 'International', ''),
(6, 1, 'Kids', '');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE IF NOT EXISTS `recipe` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `recipe_category_id` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `recipe_category_id` (`recipe_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `title`, `slug`, `recipe_category_id`, `image`, `is_active`, `is_featured`, `date_created`, `date_updated`) VALUES
(23, 'Fresh Vegetarian Spring Roll', 'fresh-vegetarian-spring-roll', 4, 'recipe-fresh-vegetarian-spring-roll.jpg', 1, 0, '2014-04-26 10:47:21', '2014-04-26 01:07:52'),
(24, 'Blinis Shrimp Torte Canapes', 'blinis-shrimp-torte-canapes', 6, 'recipe-blinis-shrimp-torte-canapes.jpg', 0, 0, '2014-04-26 10:48:41', '2014-04-26 01:08:38'),
(25, 'Cheesecake Crunch Bites', 'cheesecake-crunch-bites', 6, 'recipe-cheesecake-crunch-bites.jpg', 1, 1, '2014-04-26 10:51:06', '2014-04-26 01:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_contents`
--

CREATE TABLE IF NOT EXISTS `recipe_contents` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `recipe_id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `recipe_id` (`recipe_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `recipe_contents`
--

INSERT INTO `recipe_contents` (`id`, `recipe_id`, `title`, `content`, `is_active`) VALUES
(55, 23, 'ingredient', '<ul><li>Rice Wrapper, sprayed with water</li><li>Lettuce</li><li>Ubod,shredded, blanched</li><li>Angel’s hair pasta, cooked</li><li>Thai Basil</li><li>Carrots (shredded)</li><li>Cabbage (shredded</li><li>Radish (shredded)</li><li>Coriander</li></ul>\r\n<p><font size="3">Sauce:</font><font size="3"><br></font></p><ul><li><font size="3">Sweet Chili, prepared</font></li></ul>\r\n<p>Garnish:</p>\r\n<ul><li>Fried Shallot</li><li>Crushed Peanuts</li></ul>', 1),
(56, 23, 'procedure', '<ol><li>Spray rice wrapper with water to soften.</li><li>Place the wrapper on middle of plate.</li><li>Arrange in alternate layers the vegetables and pasta according to the listing.</li><li>Roll wrapper to form cylinder.</li><li>Garnish with fried shallot and crushed peanuts.</li><li>Serve with sweet chili.</li></ol>', 1),
(57, 23, 'yield', '', 1),
(58, 23, 'notes', '<br>', 1),
(59, 24, 'ingredient', '<p>Shrimp Torte:</p>\r\n<ul><li>1 cup shrimps, deveined, shelled and cooked</li><li>1 package cream cheese</li><li>1/4 cup bacon bits</li><li>2 tablespoons green onions, chopped</li><li>2 tablespoons marsala wine</li></ul>\r\n<p>Blinis:</p>\r\n<ul><li>1 piece egg</li><li>1 cup water</li><li>2 tablespoons oil</li><li>1 pack MAYA Whole Wheat Pancake Mix 200g</li><li>fresh dill</li></ul>', 1),
(60, 24, 'procedure', 'Combine all ingredients for shrimp torte in a food processor and process until smooth and well blended. Set aside. <strong>Prepare Blinis:</strong>\r\n Combine egg, water and oil. Mix in pancake mix until well blended. Drop\r\n one tablespoon of pancake mixture onto a heated teflon coated pan. Do \r\nthe same procedure with the rest of the mixture. Get one piece of blinis\r\n then put a little shrimp mixture on top then cover with another blinis \r\nand garnish on top as desired then serve.', 1),
(61, 24, 'yield', '', 1),
(62, 24, 'notes', '<br>', 1),
(63, 25, 'ingredient', '<p>Base crumbs:</p>\r\n<ul><li>1 cup Japanese crumbs</li><li>1/4 cup MAYA All–Purpose Flour</li><li>1/2 cup butter</li><li>1/3 cup grated parmesan</li><li>pepper to taste</li><li>1 tablespoon chopped parsley</li></ul>\r\n<p>Filling:</p>\r\n<ul><li>1/2 cup dry white wine</li><li>1/4 cup minced shallots</li><li>1/2 cup cream cheese</li><li>1/2 cup cubed cheddar cheese</li><li>1 piece egg</li></ul>\r\n<p>Toppings:</p>\r\n<ul><li>glazed sweet ham, diced</li><li>chopped spring onions</li></ul>', 1),
(64, 25, 'procedure', '<ol><li><font size="3">Preheat oven to 350F/177C. </font></li><li><font size="3">Grease 1 ounce muffin tins. </font></li><li><font size="3">Set aside.</font></li></ol><strong>Prepare Base Crumbs:</strong>\r\n<br><ol><li> Combine all ingredients in a food processor then pulse until well \r\nblended. </li><li>Press into prepared muffin tins and bake for 5 to 10 minutes or \r\nuntil golden brown. </li><li>Set aside. </li></ol><strong>Prepare Filling:</strong> <br><ol><li>In a \r\nsmall saucepan, heat wine and shallots until liquid is reduced. </li><li>Lower \r\nthe heat and mix in the cheeses, keep stirring until well incorporated. \r\n</li><li>Whisk in the egg until mixture become smooth. </li><li>Set aside. </li></ol><strong>To Assemble:</strong> <br><ol><li>Fill each prepared base crumbs with filling and top with glazed ham. </li><li>Garnish with chopped spring onions.</li></ol>', 1),
(65, 25, 'yield', '', 1),
(66, 25, 'notes', '<br>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `static_pages`
--

CREATE TABLE IF NOT EXISTS `static_pages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` tinyint(10) NOT NULL COMMENT '1 Contact; 2 Terms; 3 Policy; 4 banner;',
  `content` text NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `static_pages`
--

INSERT INTO `static_pages` (`id`, `type`, `content`, `date_updated`) VALUES
(1, 1, '<article>\r\n            <div class="details"><article>\r\n            <div class="details"><article>\r\n            <div class="details">\r\n                <h4 align="center">Maya Kitchen Culinary Arts Center</h4>\r\n                <p align="center">8th Floor, Liberty Building</p>\r\n                <p align="center">835 A. Arnaiz Avenue</p>\r\n                <p align="center">Legazpi Village, Makati City</p>\r\n                <p align="center"><span class="icon iconphone"></span> 892-5011 loc. 108</p>\r\n                <p align="center"><span class="icon iconprint"></span> 892-1185 (fax)</p>\r\n            </div>\r\n        </article></div>\r\n        </article></div>\r\n        </article>', '2014-04-26 11:07:15'),
(2, 2, '<h4 align="center">Terms of Use<br></h4>', '2014-04-26 11:07:31'),
(3, 3, '<h4 align="center">Privacy Policy<br></h4>', '2014-04-26 11:07:45'),
(4, 4, '<h1 align="center">Welcome to the Maya Kitchen</h1>\r\n            <h5 align="center">Take a look at the classes we offer, try out our recipes, or catch up with our latest news!</h5>\r\n                                                <div align="center"><img src="http://themayakitchen.com/wp-content/uploads/2014/03/familymatters_main.jpg"></div>', '2014-04-26 12:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1398134374, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '0.0.0.0', 'jd fajardo', '$2y$08$pYtR012239ZTjw1J6EgroOAc23rvnddNHW1DVoVuoSyCfcEOOQJ4e', NULL, 'jd@admin.com', NULL, NULL, NULL, NULL, 1396191704, 1398501471, 1, 'Jan', 'Dean', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `recipe_ibfk_1` FOREIGN KEY (`recipe_category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `recipe_contents`
--
ALTER TABLE `recipe_contents`
  ADD CONSTRAINT `recipe_contents_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`);

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
