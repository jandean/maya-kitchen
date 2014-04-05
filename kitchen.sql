-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2014 at 10:04 AM
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
CREATE DATABASE IF NOT EXISTS `kitchen` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kitchen`;

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
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `type`, `title`, `slug`, `content`, `image`, `is_active`, `is_featured`, `date_created`, `date_updated`) VALUES
(18, 2, 'VASK at The Maya Kitchens', 'vask-at-the-maya-kitchens', 'Regional cuisines from the Basque Country and the North of Spain take center stage on March 15, Saturday, 9am-1pm as Chef Jose Luis Gonzalez of renowned restaurant VASK visits The Maya Kitchen.', 'article-vask-at-the-maya-kitchens.jpg', 1, 1, '0000-00-00 00:00:00', '2014-04-05 09:58:46'),
(19, 2, 'Chef J. Luis Gonzalez', 'chef-j-luis-gonzalez', 'To truly understand the philosophy of a restaurant, one must truly understand the mind of its Chef. In the modern culture we exist in, the culinary profession has evolved from an ordinary occupation into a respected art form. This evolution means that often the greatest moments in our lives our specifically placed in the confines of our favorite restaurants.\r\n\r\nBorn in Santander Spain, Luis Gonzalez found an affinity for cooking at a very early age. Through an innate desire to cook he began to prepare food for his family throughout the years and thoroughly enjoyed doing so. When he reached his maturity, he expressed his desire to cook professionally, which his family strongly disagreed with due to the fact that the culinary profession was not as highly regarded as it is now. Following the behest of his elders, Jose Luis enrolled in a university where he studied Business Management and Marketing. Following his graduation he opened up his own business. Taking his earnings from his business, he enrolled and paid for his culinary education and degree from Artxanda, Bilbao. From that schooling his career started to skyrocket to unimaginable proportions.\r\n\r\nDuring the first two years of his college career Chef Luis spent his summers working in a hotel and finished his college culinary practice in the Michelin star restaurant Andra Mari. After graduation he was rewarded with a position with the world-renowned restaurant Arzak, in San Sebastian. Instantly acknowledged for his inherent talents, he was assigned to the Arzak Laboratory where he developed and facilitated upcoming menus and conceptions. During his time at Arzak, his compulsion for fine cuisine increased and he pursued and strived for more knowledge.\r\n\r\nFollowing his time at Arzak, he continued his career at the legendary restaurant Mugaritz where he was Chef de Partie of fish as well as also working behind the scenes in the laboratory. Luis depicts his time at Mugaritz as the most influential time in his career as he fell in love with the philosophy of the Mugaritz kitchen.\r\n\r\nDue to the good friendship of Arzak Chef Juan Mari Arzak and Ferran Adria, Chef of El Bulli, he transferred to El Bulli, the number one restaurant in the world at that time. He was 1 of 35 chefs accepted, amongst 80, 000 applicants. After finishing a season at El Bulli, he decided to take a tour of restaurants in southern France where had the privilege of experiencing Brass. After his tour of Southern France he spent a few months at yet another world famous location, Cellar de Can Roca before obtaining a position at the Nerua restaurant at the Guggenheim Museum in Bilbao, a part of the Mugaritz company. He started as Chef de Partie of meats, then pastries and starters, and then became head Chef of events and catering as well as Sous Chef for the fine dining and gastronomy restaurant. Jose Luis describes this time in his career as a very important step in his culinary education. Nerua-Guggenheim shared a similar philosophy with Noma and it’s concept of the kitchen. At that time Jose Luis was able to intern with Noma to experience their new technologies and concepts of cooking.\r\n\r\nAfter almost 3 years at Guggenheim, Luis moved to the Philippines to occupy the position of Chef de Cuisine for the luxury hotels Sofitel and Shangri-La where his culinary skills were utilized to run multiple kitchens and increase the food quality of both establishments.\r\n\r\nInfluenced by traveling to all the far reaches of Asia (Indonesia, Vietnam, Cambodia, Laos, etc) Chef Luis Gonzalez strives to find new flavors, ingredients, and most importantly different ways to understand food. This has helped him create a distinctive awareness of how to combine modern techniques with an Asian perspective. From the traditional to the most modern and sophisticated Chef Luis takes the best of both worlds and combines them in his own unique way. Using the knowledge obtained from working in some of the best restaurants in the world and his many Asian culinary trips he creates his own personal world; a world that delivers an exeptional culinary experience at VASK.\r\n\r\n    “The kitchen is passion and love. In some ways I need to cook to live. I don’t understand life without cooking. I don’t see myself in any other job.”\r\n\r\n    - Chef J. Luis Gonzalez', 'article-chef-j-luis-gonzalez.jpg', 1, 0, '2014-04-02 11:08:21', '0000-00-00 00:00:00'),
(20, 2, 'Chef Fern Aracama Recreates Childhood Media Noche', 'chef-fern-aracama-recreates-childhood-media-noche', 'Well known Chef Fernando “Fern” Aracama recalls fond memories of Christmas past in his cooking class at The Maya Kitchen on November 23, Saturday from 9am–1pm.\r\n\r\nA very young boy walking home from midnight mass with his family is something Chef Fern remembers to this day. He took inspiration from the traditional Media Noche meal that awaited them but this time he shares recipes of dishes that are not the usual but delightful nonetheless.\r\n\r\nTo warm you up is Patatas Riojana, a very simple yet hearty and delicious potato and chorizo soup Chef Fern revisited on his recent trip to Spain.\r\n\r\nTo fill you up is Grilled Ensaimada Media Noche style. Hot and crusty butter grilled ensaimada stuffed with Chinese ham and queso de bola.\r\n\r\nInsalata Uvato goes with the Grilled Ensaimada. This is his signature salad with honey balsamico vinaigrette, toasted pine nuts, green and red grapes and kesong puti. Malunggay and Mozzarella dip is nutritious greens in a creamy, cheesy brûleé best served with crispy crostini. This is a signature appetizer in Aracama Filipino Cuisine, one of Chef Fern’s restaurants.\r\n\r\nAnd because it is Christmas there has to be Bunuelos and Warm Chocolate Dip. These are the recipes of Chef Fern’s dear Abuelita of deep fried choux pastries served with a thick and smooth milk chocolate dip.\r\n\r\nChef Fern hails from Bacolod and is a graduate of the University of the Philippines with a degree in Hotel and Restaurant Administration. He took further studies at The New England Culinary Institute in Montpelier, Vermont USA and was a 2003 Cochran Fellowship Program Awardee at the Hilton College, University Of Houston, Texas, USA.\r\n\r\nChef Fern has a long list of bars and restaurants to his name like Aracama Filipino Cuisine, Opus, Republiq & Café Republiq, MYTHAI Kitchen, Lucky Niku Café, The ChopHouse, The Tides Hotel Boracay as well as previous spots Restaurant UVA, Encore/Embassy & Member’s Only and CANTEEN simple+good food. He is also active in World Association of Chef Societies (WACS), Les Toques Blances Philippines, Council of Chefs, United States of America’s Department of Agriculture and is a Chef Consultant with Philippine Airlines.', 'article-chef-fern-aracama-recreates-childhood-media-noche.jpg', 1, 0, '2014-04-02 11:10:02', '0000-00-00 00:00:00'),
(21, 2, 'Farm to Table — Organic Gourmet Cuisine', 'farm-to-table-organic-gourmet-cuisine', 'On September 28, Saturday, 9am–1pm, Chef Robby Goco, the man behind the Cyma Greek Taverna restaurant chain will again launch a new dining concept as he visits The Maya Kitchen for a cooking demonstration.\r\n\r\nChef Robby will share dishes inspired by Green Pastures, his latest restaurant that features a unique farm to table cuisine featuring dishes that are created from all organic, local, original, with no antibiotics, vine ripened, unprocessed whole ingredients.\r\n\r\nThe philosophy behind Green Pastures is to have the taste of the food as the main focus. It is to offer food the way it is supposed to be.\r\n\r\nThe food is not your usual bland, lackluster organic kitchen offerings but rather food of exceptional taste presented in the most creative ways. It is like gourmet organic with the restaurant offering duck, roast beef, chicken cooked slow for as long as six hours. The chef uses lardon and has rillette on his menu. He pulls his own cheese and what he cannot produce on his own, he sources from reliable suppliers.\r\n\r\nChef Robby is a graduate of the California Culinary Academy. He owns and operates a total of eight Cyma Greek Taverna restaurants in Greenbelt 2, Shangri-la Plaza Mall, Trinoma, Eastwood Mall, Robinsons Place Ermita, Robinsons Magnolia, Ayala Mall Cebu and D-Mall Boracay. His latest venture, Green Pastures is on Level 4, East Wing, Shangri–la Plaza Mall.', 'article-farm-to-table-organic-gourmet-cuisine.jpg', 1, 0, '2014-04-02 11:10:43', '0000-00-00 00:00:00'),
(22, 2, 'Ilustrado Restaurant’s ‘Breaking Bread with our Heroes’ at The Maya Kitchen', 'ilustrado-restaurants-breaking-bread-with-our-heroes-at-the-maya-kitchen', 'Ilustrado, the home of heritage Filipino–Spanish cuisine shares well loved dishes from our heroes’ hometowns at The Maya Kitchen, 9am–1pm on October 26, Saturday with Boni Pimentel, Ilustrado president and his chefs taking center stage.\r\n\r\nRecipes include Umbuyan, tinapa flakes sauteed in olive oil and wrapped in pechay leaves has its origins in Manila where Andres Bonifacio was born.\r\n\r\nBagnet with KBL Sauce is an Ilocano version of lechon kawali with kamatis, bagoong and lasuna as sauce. Juan Luna and Antonio Luna are the proud sons of Ilocos Norte.\r\n\r\nManok ng mga Bayani, chicken simmered in bold textures of dill, kamias, ground peanuts and toasted rice is inspired by no less than President Manuel Luis Quezon who hailed from Baler, Aurora.\r\n\r\nNational hero Jose Rizal from Binan, Laguna inspired Jaleang Bayabas, very ripe guavas peeled and mashed in milk and sugar.\r\n\r\nRounding off the recipe line–up is Paella Ilustrado, Spanish rice dish with pork, chicken, seafood, chorizo bilbao, peppers and peas which is a consistent bestseller in the restaurant menu.\r\n\r\nIlustrado, located at 744 General Luna Street, Intramuros, Manila opened its doors in 1989. Through the years it has expanded all over the metro and has also made a name in catering for clients such as Malacanang Palace and other government agencies, foreign embassies, multinational corporations, local businesses and prominent personalities. It is also a favorite wedding reception venue due in part to its proximity to some of Manila’s historic churches.', 'article-ilustrado-restaurants-breaking-bread-with-our-heroes-at-the-maya-kitchen.jpg', 1, 0, '2014-04-02 11:11:10', '0000-00-00 00:00:00'),
(28, 1, 'class title', 'class-title', 'class content', 'class-class-title.jpg', 1, 1, '2014-04-05 09:22:49', '0000-00-00 00:00:00'),
(29, 3, 'Porduct Titles', 'porduct-titles', 'Product Contents', 'product-porduct-titles.jpg', 0, 1, '0000-00-00 00:00:00', '2014-04-05 09:23:42'),
(37, 2, 'New', 'new', 'Article', 'article-new.jpg', 0, 0, '2014-04-05 09:58:03', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `title`, `slug`, `recipe_category_id`, `image`, `is_active`, `is_featured`, `date_created`, `date_updated`) VALUES
(17, 'Veggie Scroll in Red Wine Vinaigrette', 'veggie-scroll-in-red-wine-vinaigrette', 7, 'recipe-veggie-scroll-in-red-wine-vinaigrette.jpg', 1, 1, '0000-00-00 00:00:00', '2014-04-03 02:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_category`
--

CREATE TABLE IF NOT EXISTS `recipe_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `recipe_category`
--

INSERT INTO `recipe_category` (`id`, `name`, `description`) VALUES
(1, 'Filipino', ''),
(2, 'Italian', ''),
(4, 'American', ''),
(7, 'French', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `recipe_contents`
--

INSERT INTO `recipe_contents` (`id`, `recipe_id`, `title`, `content`, `is_active`) VALUES
(31, 17, 'ingredient', '2-3 pieces medium-sized zucchini, cut lengthwise\r\n    olive oil, as needed\r\n    salt and pepper\r\n    1 piece grilled seasoned chicken breast, sliced (prepared)\r\n    1 piece julienne carrots, blanched\r\n    1 small bundle of asparagus spears, blanched (cut into 2-inch)\r\n    cherry tomatoes, halves', 1),
(32, 17, 'procedure', 'Preheat grill pan.\r\n    Brush the front and back of sliced zucchinis with olive oil and season it with salt and pepper. Grill until tender and grill marks are visible. Cool and set aside.\r\n    Lay one piece of grilled zucchini and place chicken, carrots and asparagus at about 1/2 inch from end of the zucchini slice then roll-up and place seam side down. Use toothpick to pierce and attach the tomatoes on top of the rolled zucchini.\r\n    Arrange in serving platter. Set aside.', 1),
(33, 17, 'yield', '16-20 pieces', 1),
(34, 17, 'notes', 'Note', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1396534013, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '0.0.0.0', 'jd fajardo', '$2y$08$pYtR012239ZTjw1J6EgroOAc23rvnddNHW1DVoVuoSyCfcEOOQJ4e', NULL, 'jd@admin.com', NULL, NULL, NULL, NULL, 1396191704, 1396674704, 1, 'Jan', 'Dean', NULL, NULL),
(3, '0.0.0.0', 'just in', '$2y$08$JUC4fdZC/zwYZhE3mIsVh..JpPaFbrqvLQaVkKzfskHVGjWwaTJp.', NULL, 'justin@admin.com', '9cfc3a0365e9d8423132cf44e9f1815356fcfcd3', NULL, NULL, NULL, 1396192463, 1396192463, 0, 'Just', 'In', NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 3, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `recipe_ibfk_1` FOREIGN KEY (`recipe_category_id`) REFERENCES `recipe_category` (`id`);

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
