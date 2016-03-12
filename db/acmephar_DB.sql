-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 09, 2015 at 04:45 PM
-- Server version: 5.5.32-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `acmephar_DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `k8_admin_article`
--

CREATE TABLE IF NOT EXISTS `k8_admin_article` (
  `ad_art_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ad_art_pagetitle` varchar(255) NOT NULL,
  `ad_art_content_title` varchar(255) NOT NULL,
  `ad_art_desc` longtext,
  `updtime` datetime NOT NULL,
  PRIMARY KEY (`ad_art_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12346 ;

--
-- Dumping data for table `k8_admin_article`
--

INSERT INTO `k8_admin_article` (`ad_art_id`, `ad_art_pagetitle`, `ad_art_content_title`, `ad_art_desc`, `updtime`) VALUES
(1, 'Home', 'Welcome to Acme Pharma', '<p class="p2">\r\n	Acme Pharma is a rapidly expanding licensed pharmaceutical wholesaler located in London trading across Europe who supplies both branded and generic pharmaceuticals.<br />\r\n	<br />\r\n	We are always on the look out to provide our customers quality products at the most competitive prices. We specialise in providing high value pharmaceuticals for &#39;hospital&#39; prescribing or Long-term care or to parallel importersss.</p>\r\n<div id="panel">\r\n	We do business with new and established wholesalers, and can provide regulatory support to those who aspire to become established wholesalers.<br />\r\n	<br />\r\n	We pride ourselves on excellent levels of customer and distribution service. Our central networks of experienced advisors are allocated to wholesale, pharmacy, GP and surgery customers according to their experience. Informed advice is provided on the best products and service, at the most competitive price.<br />\r\n	<br />\r\n	We are very thorough and thrive in providing our customers with the knowledge and confidence in doing business with us.<br />\r\n	<br />\r\n	Acme Pharma offers a quality and timely service to our customers; we believe in transparency for the success of your business. Our service specifications are bespoke and flexible, tailored to suit your requirements. We are continuously developing innovative ideas and services in the business of pharmaceuticals. The aim is to have a streamlined distribution of products in line with the standards set on Good Distribution Practice [GDP] to ensure patients receive the correct medication.</div>\r\n<div id="flip">\r\n	Read More</div>\r\n<div class="clear">\r\n	&nbsp;</div>\r\n', '0000-00-00 00:00:00'),
(47, 'Business Principles', 'Business Principles', '<h2 class="top-1 p0">\r\n	Business <span>Principles</span></h2>\r\n<p class="p2">\r\n	<strong>Exceptional Services</strong><br />\r\n	We ensure we are continually evaluating our service we provide and listen to our customers to provide a positive experience and service.<br />\r\n	<br />\r\n	Our knowledge of the global pharmaceutical industry means that we can help you to source such products and streamline your supply. We handle import and export regulations quickly and efficiently, ensuring that you receive the supplies you need on time.<br />\r\n	<br />\r\n	<strong>Availability&amp; Cost</strong><br />\r\n	We provide a consistent flow of both high quality branded and generic pharmaceutical products at the most competitive prices.<br />\r\n	<br />\r\n	Acme Pharma is a fast growing customer and supplier of branded and generic pharmaceuticals. Our ambition is to supply high quality pharmaceuticals at low cost creating large savings for societies and consumers. In other words: we give people and societies more health care for their money!<br />\r\n	<br />\r\n	<strong>Long term relationship</strong><br />\r\n	We do our upmost to create a long lasting working relationship and guarantee we are a reliable and trustworthy partner.<br />\r\n	<br />\r\n	We don&#39;t just offer a product and services but we present a confidence to all our customer they can rely on.</p>\r\n', '2013-01-10 15:35:37'),
(48, 'Career', 'Career', '<p>\r\n	At Acme Pharma we are dedicated to provide a complete satisfaction to individual client requirement along with the corporate clients. Our team fully understands the critical factor needs to be considered in order to provide up to date services to our customers and partners. If you are young and energetic, drop your CV and excell to the profession of wisdom, learning and medicine</p>\r\n', '0000-00-00 00:00:00'),
(50, 'Why Choose Us?', 'Why Choose Us?', '<h3 class="p3">\r\n	Why <span>Choose Us?</span></h3>\r\n<blockquote>\r\n	<p class="p4">\r\n		Acme Pharma is a rapidly expanding licensed pharmaceutical wholesaler located in London trading across Europe who supplies both branded and generic pharmaceuticals.<br />\r\n		<br />\r\n		<strong>Choose us because:</strong></p>\r\n	<div class="why">\r\n		<ul>\r\n			<li>\r\n				We offer quality and timely service to our customers</li>\r\n			<li>\r\n				Customer Satisfaction is our Key</li>\r\n			<li>\r\n				We are spread to Hospitals, distributors &amp; pharmacies</li>\r\n			<li>\r\n				We are cost effective</li>\r\n			<li>\r\n				We are cost effective and good</li>\r\n		</ul>\r\n	</div>\r\n	<p>\r\n		&nbsp;</p>\r\n</blockquote>\r\n', '0000-00-00 00:00:00'),
(42, 'Mission(HOME PAGE)', 'Mission(HOME PAGE)', 'We believe in wholesaling to improve availability and accessibility to drugs, reduce drug costs around Europe and raise the standards in the supply chain. In simple\r\n', '0000-00-00 00:00:00'),
(43, 'Vision(HOME PAGE)', 'Vision(HOME PAGE)', 'Healthy world is our vision. We are pledged to create an environment where people can live a healthy live. It is in our dreams where we aspire to drive away diseases', '0000-00-00 00:00:00'),
(44, 'Business principles(HOME PAGE)', 'Business principles(HOME PAGE)', 'We ensure we are continually evaluating our service we provide and listen to our customers to provide a positive experience and service. ', '0000-00-00 00:00:00'),
(41, 'About Us', 'About Us', '<p class="p2">\r\n	Acme Pharma Limited is a privately held &amp; well established pharmaceutical distributor and supplier to the Healthcare sectors. We bring a wealth of experience in pharmaceutical industry, from providing a range of services including pharmaceutical storage, distribution and pharmaceutical exports to the world market. All our sites are fully audited and regulated by Medicines Health and Regulatory Authority (MHRA) with state-of-the art storage and distribution facilities.<br />\r\n	<br />\r\n	At Acme Pharma we are dedicated to provide a complete satisfaction to individual client requirement along with the corporate clients. Our team fully understands the critical factor needs to be considered in order to provide up to date services to our customers and partners.<br />\r\n	<br />\r\n	As an integrated health care distributor, we are always keen to work with hospitals, pharmaceutical distributors, surgeries and independent pharmacies at highest level of customer satisfaction.</p>\r\n', '0000-00-00 00:00:00'),
(45, 'Mission', 'Mission', '<h2 class="top-1 p0">\r\n	Mission</h2>\r\n<p class="p2">\r\n	We believe in wholesaling to improve availability and accessibility to drugs, reduce drug costs around Europe and raise the standards in the supply chain. In simple words, better health care at affordable and effective prices.</p>\r\n', '0000-00-00 00:00:00'),
(46, 'Vision', 'Vision', '<h2 class="top-1 p0">Vision <span>&nbsp;</span></h2>\r\n          <p class="p2">Healthy world is our vision. We are pledged to create an environment where people can live a healthy live. It is in our dreams where we aspire to drive away diseases that plague human civilization. With cleanliness there comes godliness. We firmly believe so and therefore strongly incline to build a world that sparkle the serenity with vivacious grandeur. \r\n          </p>', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `k8_admin_menu`
--

CREATE TABLE IF NOT EXISTS `k8_admin_menu` (
  `AdmMenuID` int(5) NOT NULL AUTO_INCREMENT,
  `AdmMenuParent` int(5) NOT NULL DEFAULT '0',
  `AdmMenuTitle` varchar(64) NOT NULL DEFAULT '',
  `AdmMenuDesc` text,
  `AdmMenuPath` varchar(128) NOT NULL DEFAULT '',
  `AdmMenuOrder` int(5) NOT NULL DEFAULT '0',
  `AdmMenuOpenIn` int(1) NOT NULL DEFAULT '0',
  `AdmMenuStatus` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`AdmMenuID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `k8_admin_menu`
--

INSERT INTO `k8_admin_menu` (`AdmMenuID`, `AdmMenuParent`, `AdmMenuTitle`, `AdmMenuDesc`, `AdmMenuPath`, `AdmMenuOrder`, `AdmMenuOpenIn`, `AdmMenuStatus`) VALUES
(1, 0, 'Home', 'Index page Details', 'index.php', 1, 0, 1),
(2, 0, 'Administrator', 'Administrator Managent', 'administrator.php', 1, 0, 1),
(3, 2, 'Site Settings', 'Site Settings Managent', 'site_settings.php', 2, 0, 1),
(4, 2, 'Admin Settings', 'Admin Settings Management', 'admin_settings.php', 0, 0, 1),
(5, 2, 'Admin Management', 'Admin Management', 'admin_set.php', 0, 0, 1),
(6, 0, 'Pages', 'Articles Management', 'admin_article.php', 0, 0, 1),
(12, 0, 'Feedback', 'Feedback Management', 'feedback.php', 0, 0, 0),
(13, 0, 'Gallery', 'Gallery Management', 'gallery.php', 0, 0, 0),
(14, 13, 'Gallery Category ', 'Gallery Category Management', 'gal_cat.php', 0, 0, 1),
(15, 13, 'Gallery Images', 'Gallery Images Management', 'gallery_img.php', 0, 0, 1),
(23, 0, 'Product List', 'Product / Services Management', 'product_services.php', 0, 0, 0),
(26, 0, 'Real State', 'Real State Management', 'real_state.php', 0, 0, 0),
(27, 26, 'Location', 'Real State Location Management', 'real_state_location.php', 0, 0, 1),
(31, 26, 'Price', 'Real State Price Management', 'real_state_price.php', 0, 0, 1),
(29, 26, 'Area', 'Real State Area Management', 'real_state_area.php', 0, 0, 1),
(30, 26, 'Real State Detail', 'Real State Description Management', 'real_state_desc.php', 0, 0, 0),
(35, 0, 'Tour Programme', 'Tour Programme Management', 'tour_programme.php', 0, 0, 0),
(65, 0, 'News', NULL, 'news.php', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `k8_configuration`
--

CREATE TABLE IF NOT EXISTS `k8_configuration` (
  `CfgID` int(5) NOT NULL DEFAULT '0',
  `CfgKey` varchar(64) NOT NULL DEFAULT '',
  `CfgCaption` varchar(80) NOT NULL DEFAULT '',
  `CfgDesc` varchar(128) DEFAULT NULL,
  `CfgValue` text,
  `CfgVariable` text,
  `CfgType` char(1) NOT NULL DEFAULT '',
  `CfgEditable` int(1) NOT NULL DEFAULT '1',
  `CfgOrder` int(5) NOT NULL DEFAULT '0',
  `CfgGroupID` int(1) DEFAULT NULL,
  `CfgFldSize` varchar(5) NOT NULL DEFAULT '90%',
  PRIMARY KEY (`CfgID`),
  UNIQUE KEY `cfg_key` (`CfgKey`),
  UNIQUE KEY `cfg_id` (`CfgID`),
  UNIQUE KEY `cfg_key_2` (`CfgKey`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `k8_configuration`
--

INSERT INTO `k8_configuration` (`CfgID`, `CfgKey`, `CfgCaption`, `CfgDesc`, `CfgValue`, `CfgVariable`, `CfgType`, `CfgEditable`, `CfgOrder`, `CfgGroupID`, `CfgFldSize`) VALUES
(15, 'CFG_DEFAULT_META_AUTHOR', 'Meta Author', 'Please enter default meta author', 'Admin Panel', NULL, 'T', 1, 15, 6, '90%'),
(14, 'CFG_DEFAULT_META_KEY', 'Meta Keywords', 'Please enter default meta keywords', 'Admin Panel', NULL, 'A', 1, 14, 6, '90%'),
(13, 'CFG_DEFAULT_META_DESC', 'Meta Description', 'Please enter default meta description', 'Admin Panel', NULL, 'A', 1, 13, 6, '90%'),
(19, 'CONFIG_CONT_ROOT_URL', 'Root Path', 'Please enter site root path.', '', NULL, 'T', 1, 0, 3, '90%'),
(12, 'CFG_DEFAULT_PAGE_TITLE', 'Default Page Title', 'Please enter default page title', 'Welcome to Admin Panel', NULL, 'T', 1, 12, 6, '90%'),
(11, 'CFG_DEFAULT_ADMIN_PAGE_TITLE', 'Default Admin Panel Page Title', 'Please enter default Admin Panel page title', 'Acme Pharma Admin', NULL, 'T', 1, 11, 3, '90%'),
(10, 'CFG_DEFAULT_DATE_SEPARATOR', 'Date Separated By', 'Please select date separator', '/', '/=/\r\n-=-\r\n = ', 'S', 1, 10, 6, '200px'),
(8, 'CONFIG_CONT_ADMIN_COPYRIGHT', 'Admin Panel Copyright', NULL, '2012-13 © Admin Panel', NULL, 'T', 1, 8, 3, '200px'),
(7, 'CONFIG_CONT_HOME_ADMIN_BREADCRUMBS', 'Start Admin Panel Breadcrumbs with home', NULL, '1\r', 'Yes=1\r\nNo=0', 'S', 1, 7, 4, '200px'),
(6, 'CONFIG_CONT_SHOW_ADMIN_BREADCRUMBS', 'Show Admin Panel Breadcrumbs', NULL, '1\r', 'Yes=1\r\nNo=0', 'S', 1, 6, 4, '100px'),
(5, 'CONFIG_CONT_ADMIN_LANGUAGE', 'Admin Panel Language', 'Please select Admin Panel Language', 'eng', 'Default=eng\r\nEnglish=eng', 'S', 1, 4, 4, '90%'),
(4, 'CONFIG_CONT_ADMIN_TEMPLATE', 'Admin Panel Template', 'Please select Admin PanelTemplate', 'default', 'Default=default\r\nSite Builder Temp 01=sb_temp_2', 'S', 1, 4, 7, '90%'),
(3, 'CONFIG_CONT_LOGO_PATH', 'Select Logo', 'Please select logo', 'logo/logo.png', NULL, 'A', 1, 3, 3, '200px'),
(9, 'CFG_DEFAULT_DATE_FORMAT', 'Date Format', 'Please select date format', 'd/M/Y', 'DD MM YYYY=d/m/Y\r\nMM DD YYYY=m/d/Y\r\nYYYY DD MM=Y/d/m\r\nDD Month YYYY=d/M/Y', 'S', 1, 9, 6, '200px'),
(2, 'CONFIG_CONT_LOGO_TYPE', 'Logo Type', 'Please select logo type', '1\r\n', 'Image=1\r\nText=0', 'S', 1, 2, 3, '200px'),
(1, 'CONFIG_CONT_SITENAME', 'Company Name', 'Please enter your company name', 'kre8iveminds', NULL, 'T', 1, 1, 3, '200px'),
(16, 'CFG_DEFAULT_REPLY_FROM', 'E-mail Reply From', 'Please enter email sender''s name', 'Site Builder', NULL, 'T', 1, 16, 8, '90%'),
(17, 'CFG_DEFAULT_REPLY_EMAIL', 'Reply Email ID', 'Please enter reply email ID', 'noreply@domain.com', NULL, 'T', 1, 17, 8, '90%'),
(18, 'CONFIG_CONT_SITE_TEMPLATE', 'Site Template', 'Please enter site template', 'Admin Panel', 'Default=default\r\nAdmin Panel=Admin Panel', 'S', 1, 18, 7, '200px'),
(20, 'CFG_ADMINISTRATOR_MAIL_ID', 'Administrator mail id', 'Edit super admin Mail id', 'contact@kre8iveminds.com', 'ram.kre8iveminds@gmail.com', 'T', 1, 0, 3, '90%');

-- --------------------------------------------------------

--
-- Table structure for table `k8_config_group`
--

CREATE TABLE IF NOT EXISTS `k8_config_group` (
  `CfgGroupID` int(2) NOT NULL DEFAULT '0',
  `CfgGroupName` varchar(64) NOT NULL DEFAULT '',
  `CfgGroupOrder` char(2) NOT NULL DEFAULT '',
  `CfgGroupStatus` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`CfgGroupID`),
  KEY `cfg_grp_name` (`CfgGroupName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `k8_config_group`
--

INSERT INTO `k8_config_group` (`CfgGroupID`, `CfgGroupName`, `CfgGroupOrder`, `CfgGroupStatus`) VALUES
(2, 'Template Settings', '2', 1),
(5, 'Title/Metadata Settings', '5', 1),
(4, 'Admin Settings', '4', 1),
(1, 'Site Settings', '1', 1),
(3, 'Email Template', '3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `k8_feedback`
--

CREATE TABLE IF NOT EXISTS `k8_feedback` (
  `feed_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `feed_name` varchar(255) NOT NULL,
  `feed_emailid` varchar(250) NOT NULL,
  `feed_contact` varchar(255) NOT NULL,
  `feed_comment` text NOT NULL,
  `feed_image` varchar(255) NOT NULL,
  `activate` enum('1','0') NOT NULL DEFAULT '0',
  `publish` enum('1','0') NOT NULL DEFAULT '0',
  `updtime` datetime NOT NULL,
  `newOrder` bigint(20) NOT NULL,
  PRIMARY KEY (`feed_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

-- --------------------------------------------------------

--
-- Table structure for table `k8_gallery`
--

CREATE TABLE IF NOT EXISTS `k8_gallery` (
  `gal_img_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `gal_cat_id` int(11) NOT NULL,
  `gal_img_heading` varchar(255) NOT NULL,
  `gal_img_sdesc` longtext NOT NULL,
  `gal_img_image` varchar(255) DEFAULT NULL,
  `publish` enum('1','0') NOT NULL DEFAULT '0',
  `newOrder` bigint(20) NOT NULL,
  `updtime` datetime NOT NULL,
  PRIMARY KEY (`gal_img_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

--
-- Table structure for table `k8_gallery_cat`
--

CREATE TABLE IF NOT EXISTS `k8_gallery_cat` (
  `gal_cat_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `gal_cat_heading` varchar(255) NOT NULL,
  `gal_cat_sdesc` longtext NOT NULL,
  `gal_cat_image` varchar(255) DEFAULT NULL,
  `publish` enum('1','0') NOT NULL DEFAULT '0',
  `newOrder` bigint(20) NOT NULL,
  `updtime` datetime NOT NULL,
  PRIMARY KEY (`gal_cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `k8_gallery_cat`
--

INSERT INTO `k8_gallery_cat` (`gal_cat_id`, `gal_cat_heading`, `gal_cat_sdesc`, `gal_cat_image`, `publish`, `newOrder`, `updtime`) VALUES
(12, 'Shade Systems', '', NULL, '0', 0, '0000-00-00 00:00:00'),
(13, 'Installed Projects', '', NULL, '0', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `k8_herbal_product`
--

CREATE TABLE IF NOT EXISTS `k8_herbal_product` (
  `herbal_state_id` bigint(20) NOT NULL,
  `herbal_state_location` varchar(255) NOT NULL,
  `herbal_state_area` varchar(255) NOT NULL,
  `herbal_state_price` varchar(255) NOT NULL,
  `herbal_state_description` text NOT NULL,
  `publish` enum('1','0') NOT NULL,
  `newOrder` bigint(20) NOT NULL,
  `updtime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `k8_member_logs`
--

CREATE TABLE IF NOT EXISTS `k8_member_logs` (
  `MemID` int(1) NOT NULL DEFAULT '0',
  `MemLogIP` varchar(16) NOT NULL DEFAULT '',
  `MemLogDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `k8_member_logs`
--

INSERT INTO `k8_member_logs` (`MemID`, `MemLogIP`, `MemLogDate`) VALUES
(1, '127.0.0.1', '2012-09-07 11:05:46'),
(1, '127.0.0.1', '2012-09-05 17:03:35'),
(1, '127.0.0.1', '2012-09-05 14:30:54'),
(1, '127.0.0.1', '2012-09-05 13:33:23'),
(1, '127.0.0.1', '2012-11-21 16:26:03'),
(1, '127.0.0.1', '2012-11-21 16:36:13'),
(1, '127.0.0.1', '2012-11-21 16:37:25'),
(1, '127.0.0.1', '2012-11-21 16:39:21'),
(1, '127.0.0.1', '2012-11-22 11:41:12'),
(1, '127.0.0.1', '2012-12-06 10:22:27'),
(1, '127.0.0.1', '2012-12-06 10:32:03'),
(1, '127.0.0.1', '2012-12-06 16:33:45'),
(1, '127.0.0.1', '2012-12-07 10:48:49'),
(1, '192.168.1.6', '2012-12-07 13:24:49'),
(1, '127.0.0.1', '2012-12-10 15:37:27'),
(1, '192.168.1.6', '2012-12-11 16:24:40'),
(1, '192.168.1.8', '2012-12-17 11:05:50'),
(1, '127.0.0.1', '2013-01-10 10:05:55'),
(1, '127.0.0.1', '2013-03-11 17:03:28'),
(1, '127.0.0.1', '2013-03-11 17:43:34'),
(1, '192.168.1.3', '2013-03-13 12:14:04'),
(1, '192.168.0.2', '2013-05-23 11:26:38'),
(1, '127.0.0.1', '2013-06-13 14:50:56'),
(1, '127.0.0.1', '2013-06-14 10:52:24'),
(1, '127.0.0.1', '2013-06-14 13:56:24'),
(1, '127.0.0.1', '2013-06-13 16:36:48'),
(1, '127.0.0.1', '2013-06-14 09:54:57'),
(1, '127.0.0.1', '2013-06-15 13:18:04'),
(1, '127.0.0.1', '2013-06-15 16:47:51'),
(1, '127.0.0.1', '2013-06-17 13:52:36'),
(1, '192.168.0.4', '2013-06-17 18:16:44'),
(1, '127.0.0.1', '2013-06-18 10:12:28'),
(1, '127.0.0.1', '2013-06-20 10:56:12'),
(1, '127.0.0.1', '2013-06-21 15:02:59'),
(1, '192.168.0.2', '2013-06-21 15:07:01'),
(1, '127.0.0.1', '2013-06-24 10:21:42'),
(1, '127.0.0.1', '2013-06-24 10:33:13'),
(1, '192.168.0.4', '2013-06-24 11:02:00'),
(1, '122.163.43.17', '2013-06-26 04:19:58'),
(1, '122.163.57.123', '2013-07-12 02:05:51'),
(1, '122.163.65.213', '2013-09-11 06:23:33'),
(1, '122.163.49.215', '2013-09-20 01:55:36'),
(1, '122.163.61.72', '2013-09-21 02:38:29'),
(1, '122.163.4.17', '2013-09-23 03:12:20'),
(1, '122.163.8.99', '2013-09-24 03:54:30'),
(1, '122.163.1.0', '2013-09-25 00:43:25'),
(1, '122.163.1.0', '2013-09-25 03:39:02'),
(1, '122.163.1.0', '2013-09-25 05:53:54'),
(1, '122.163.32.147', '2013-09-25 23:45:06'),
(1, '122.163.78.229', '2013-09-26 08:47:49'),
(1, '122.163.6.195', '2013-09-27 06:26:46'),
(1, '122.163.11.177', '2013-09-30 00:13:11'),
(1, '122.163.4.152', '2013-11-21 03:32:30'),
(1, '122.163.72.172', '2013-11-25 00:02:17'),
(1, '122.163.72.172', '2013-11-25 03:46:00'),
(1, '122.163.18.199', '2013-11-26 00:21:03'),
(1, '122.163.49.192', '2013-11-29 23:49:15'),
(1, '122.163.18.52', '2013-12-05 00:33:37'),
(1, '122.163.14.223', '2013-12-10 03:41:53'),
(1, '122.163.42.184', '2013-12-13 05:55:00'),
(1, '127.0.0.1', '2014-01-16 15:30:38'),
(1, '127.0.0.1', '2014-01-16 15:33:29'),
(1, '127.0.0.1', '2014-02-22 12:05:10'),
(1, '127.0.0.1', '2014-02-27 12:43:22'),
(1, '127.0.0.1', '2014-03-05 17:10:38'),
(1, '127.0.0.1', '2014-09-06 13:58:37'),
(1, '127.0.0.1', '2014-09-06 20:05:44'),
(1, '127.0.0.1', '2014-09-07 13:19:40'),
(1, '127.0.0.1', '2014-09-10 21:08:12'),
(1, '127.0.0.1', '2014-09-26 21:24:51'),
(1, '127.0.0.1', '2014-09-28 16:42:27'),
(1, '127.0.0.1', '2014-10-04 13:02:58'),
(1, '127.0.0.1', '2014-10-04 13:05:55'),
(1, '127.0.0.1', '2014-10-05 21:33:03'),
(1, '127.0.0.1', '2014-10-10 20:51:47'),
(1, '127.0.0.1', '2014-10-10 21:32:07'),
(1, '101.221.131.249', '2014-10-10 22:28:17'),
(1, '115.118.171.110', '2014-10-16 18:29:37'),
(1, '101.221.136.48', '2014-11-15 22:24:39'),
(1, '115.118.31.135', '2014-12-01 21:10:55'),
(1, '115.118.106.52', '2014-12-06 13:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `k8_member_log_details`
--

CREATE TABLE IF NOT EXISTS `k8_member_log_details` (
  `MemID` int(11) NOT NULL DEFAULT '0',
  `MemTypeKey` varchar(64) NOT NULL DEFAULT '',
  `MemUsername` varchar(32) NOT NULL DEFAULT '',
  `MemPassword` varchar(32) NOT NULL DEFAULT '',
  `MemName` varchar(64) NOT NULL DEFAULT '',
  `MemPic` varchar(32) DEFAULT NULL,
  `MemVerifyCode` varchar(32) DEFAULT NULL,
  `MemIsLog` int(1) NOT NULL DEFAULT '0',
  `MemFeatured` int(1) NOT NULL DEFAULT '0',
  `MemLogStatus` int(1) NOT NULL DEFAULT '0',
  `MemBlock` int(1) NOT NULL DEFAULT '0',
  `MemEmail` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `admintype` enum('Super','Sub') NOT NULL DEFAULT 'Super',
  PRIMARY KEY (`MemID`),
  UNIQUE KEY `MemUsername` (`MemUsername`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `k8_member_log_details`
--

INSERT INTO `k8_member_log_details` (`MemID`, `MemTypeKey`, `MemUsername`, `MemPassword`, `MemName`, `MemPic`, `MemVerifyCode`, `MemIsLog`, `MemFeatured`, `MemLogStatus`, `MemBlock`, `MemEmail`, `phone`, `address`, `admintype`) VALUES
(1, 'MEM_TYPE_ADMINS', 'admin', 'admin', 'Acorn Solution', NULL, NULL, 1, 0, 2, 0, 'contact@kre8iveminds.com', '+919903118211', 'kolkata', 'Super');

-- --------------------------------------------------------

--
-- Table structure for table `k8_news`
--

CREATE TABLE IF NOT EXISTS `k8_news` (
  `real_state_id` bigint(20) NOT NULL,
  `real_state_date` date NOT NULL,
  `real_state_short` text NOT NULL,
  `real_state_description` text NOT NULL,
  `publish` enum('1','0') NOT NULL,
  `newOrder` bigint(20) NOT NULL,
  `updtime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `k8_news`
--

INSERT INTO `k8_news` (`real_state_id`, `real_state_date`, `real_state_short`, `real_state_description`, `publish`, `newOrder`, `updtime`) VALUES
(1, '2014-05-16', 'lorem ipsum 1999', '<p>\r\n	<em style="border: 0px; font-size: 14px; margin: 0px; padding: 0px; outline: 0px; vertical-align: top; color: rgb(76, 76, 76); font-family: Georgia, serif; line-height: 20px;"><strong style="border: 0px; background-color: transparent; font-size: 11px; margin: 0px; padding: 0px; outline: 0px; vertical-align: top; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; line-height: 14px; text-align: justify; background-position: initial initial; background-repeat: initial initial;">Lorem Ipsum</strong><span style="border: 0px; background-color: transparent; font-size: 11px; margin: 0px; padding: 0px; outline: 0px; vertical-align: top; color: rgb(0, 0, 0); line-height: 14px; text-align: justify; background-position: initial initial; background-repeat: initial initial;">&nbsp;is simply dummy text of the printing and typesetting industry.&nbsp;</span></em><em style="border: 0px; font-size: 14px; margin: 0px; padding: 0px; outline: 0px; vertical-align: top; color: rgb(76, 76, 76); font-family: Georgia, serif; line-height: 20px;"><strong style="border: 0px; background-color: transparent; font-size: 11px; margin: 0px; padding: 0px; outline: 0px; vertical-align: top; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; line-height: 14px; text-align: justify;">Lorem Ipsum</strong><span style="border: 0px; background-color: transparent; font-size: 11px; margin: 0px; padding: 0px; outline: 0px; vertical-align: top; color: rgb(0, 0, 0); line-height: 14px; text-align: justify;">&nbsp;is simply dummy text of the printing and typesetting industry.&nbsp;</span></em><em style="border: 0px; font-size: 14px; margin: 0px; padding: 0px; outline: 0px; vertical-align: top; color: rgb(76, 76, 76); font-family: Georgia, serif; line-height: 20px;"><strong style="border: 0px; background-color: transparent; font-size: 11px; margin: 0px; padding: 0px; outline: 0px; vertical-align: top; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; line-height: 14px; text-align: justify;">Lorem Ipsum</strong><span style="border: 0px; background-color: transparent; font-size: 11px; margin: 0px; padding: 0px; outline: 0px; vertical-align: top; color: rgb(0, 0, 0); line-height: 14px; text-align: justify;">&nbsp;is simply dummy text of the printing and typesetting industry.&nbsp;</span></em><em style="border: 0px; font-size: 14px; margin: 0px; padding: 0px; outline: 0px; vertical-align: top; color: rgb(76, 76, 76); font-family: Georgia, serif; line-height: 20px;"><strong style="border: 0px; background-color: transparent; font-size: 11px; margin: 0px; padding: 0px; outline: 0px; vertical-align: top; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; line-height: 14px; text-align: justify;">Lorem Ipsum</strong><span style="border: 0px; background-color: transparent; font-size: 11px; margin: 0px; padding: 0px; outline: 0px; vertical-align: top; color: rgb(0, 0, 0); line-height: 14px; text-align: justify;">&nbsp;is simply dummy text of the printing and typesetting industry.&nbsp;</span></em></p>\r\n', '1', 1, '2014-05-05 11:43:54'),
(2, '2014-10-08', 'test', '<p>\r\n	Following stories in the Daily Telegraph about their joint investigation with the British Medical Journal into the European regulatory system for medical devices, the MHRA have released the following statement:<br />\r\n	<br />\r\n	An MHRA spokesperson said:<br />\r\n	<br />\r\n	&ldquo;We recognise that improvements to the regulation of medical devices need to be made. That&rsquo;s why we fed into the European Commission&rsquo;s review, specifically recommending improving the oversight of Notified Bodies, the improved surveillance of post-market events and the better collaboration between national regulatory bodies.<br />\r\n	<br />\r\n	&ldquo;The European Commission published their proposals on 26 September that includes many of the areas of improvement that the UK has been pushing for. We will shortly be consulting on the approach that the UK should take for negotiating the proposed legislation.&rdquo;</p>\r\n', '1', 2, '2014-10-04 14:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `k8_product_services`
--

CREATE TABLE IF NOT EXISTS `k8_product_services` (
  `gal_cat_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `gal_cat_heading` varchar(255) NOT NULL,
  `gal_cat_sdesc` text NOT NULL,
  `gal_cat_image` varchar(255) NOT NULL,
  `gal_cat_catagory` varchar(50) NOT NULL,
  `publish` enum('1','0') NOT NULL DEFAULT '0',
  `newOrder` bigint(20) NOT NULL,
  `updtime` datetime NOT NULL,
  `gal_cat_composition` text NOT NULL,
  `gal_cat_composition_new` text NOT NULL,
  `gal_cat_dosage` text NOT NULL,
  `gal_cat_indication` text NOT NULL,
  `gal_cat_presentation` text NOT NULL,
  PRIMARY KEY (`gal_cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `k8_product_services`
--

INSERT INTO `k8_product_services` (`gal_cat_id`, `gal_cat_heading`, `gal_cat_sdesc`, `gal_cat_image`, `gal_cat_catagory`, `publish`, `newOrder`, `updtime`, `gal_cat_composition`, `gal_cat_composition_new`, `gal_cat_dosage`, `gal_cat_indication`, `gal_cat_presentation`) VALUES
(3, 'Amrita Pushti', 'A complete Natural and herbal health tonic for all age groups', '3.jpg', 'abc', '1', 3, '2013-07-12 03:59:16', '0', '0', '', '', ''),
(2, 'Kalmegh Rasayan', '1.	Liver Stimulant<br>\r\n2.	Bowels Regulator<br>\r\n3.	Cure Pimples,Acne<br>\r\n4.	Blood Purifier<br>\r\n', '2.jpg', '', '1', 2, '2013-07-12 02:15:49', '<p>\r\n	hfghfgh</p>\r\n', '<p>\r\n	fgfdhfh</p>\r\n', '', '', 'fghfghf'),
(4, 'Brahmi Compound ', 'An Ideal Brain Tonic to Control Stress and Enhance Memory', '4.jpg', 'abc', '1', 4, '2013-07-12 04:03:23', '0', '0', '', '', ''),
(5, 'Hazmi Rasayan', 'A  Unique Digestive Rasayan to control gas, acidity and heaviness in the    stomach', '5.jpg', 'abc', '1', 5, '2013-07-12 04:11:08', '0', '0', '', '', ''),
(6, 'VASAKATULSI', 'A unique combination for controlling old, chronic and bronchial cough', '6.jpg', 'abc', '1', 6, '2013-07-12 04:13:51', '0', '0', '', '', ''),
(7, 'ASHOKA  COMPOUND ', 'All type of menstrual irregularities and as tonic to improve the Feminine Health', '7.jpg', '', '1', 7, '2013-07-12 04:19:00', '<p>\r\n	0</p>\r\n', '<p>\r\n	0</p>\r\n', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `k8_real_state`
--

CREATE TABLE IF NOT EXISTS `k8_real_state` (
  `real_state_id` bigint(20) NOT NULL,
  `real_state_location` varchar(255) NOT NULL,
  `real_state_area` varchar(255) NOT NULL,
  `real_state_price` varchar(255) NOT NULL,
  `real_state_description` text NOT NULL,
  `publish` enum('1','0') NOT NULL,
  `newOrder` bigint(20) NOT NULL,
  `updtime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `k8_real_state`
--

INSERT INTO `k8_real_state` (`real_state_id`, `real_state_location`, `real_state_area`, `real_state_price`, `real_state_description`, `publish`, `newOrder`, `updtime`) VALUES
(5, 'Ujjaini', '16 - 20', '1,51,000 - 2,00,000', 'Plot is a literary term defined as the events that make up a story, particularly as they relate to one ', '1', 5, '2012-12-11 16:42:35'),
(6, 'Panchabati', '1 - 2', '50,000 - 60,000', 'Plot is a literary term defined as the events that make up a story, particularly as they relate to one ', '1', 6, '2012-12-11 16:42:44'),
(2, 'Ujjaini', '2 - 4', '61,000 - 80,000', 'Plot is a literary term defined as the events that make up a story, particularly as they relate to one ', '1', 2, '2012-12-11 16:41:36'),
(3, 'Ujjaini', '5- 8', '81,000 - 1,00,000', 'Plot is a literary term defined as the events that make up a story, particularly as they relate to one ', '1', 3, '2012-12-11 16:41:58'),
(4, 'Ujjaini', '9 - 15', '1,01,000- 1,50,000', 'Plot is a literary term defined as the events that make up a story, particularly as they relate to one ', '1', 4, '2012-12-11 16:42:21'),
(1, 'Ujjaini', '1 - 2', '50,000 - 60,000', 'Plot is a literary term defined as the events that make up a story, particularly as they relate to one ', '1', 1, '2012-12-11 16:32:35'),
(7, 'Panchabati', '2 - 4', '61,000 - 80,000', 'Plot is a literary term defined as the events that make up a story, particularly as they relate to one ', '1', 7, '2012-12-11 16:42:54'),
(8, 'Panchabati', '5- 8', '81,000 - 1,00,000', 'Plot is a literary term defined as the events that make up a story, particularly as they relate to one ', '1', 8, '2012-12-11 16:43:04'),
(9, 'Panchabati', '9 - 15', '1,01,000- 1,50,000', 'Plot is a literary term defined as the events that make up a story, particularly as they relate to one ', '1', 9, '2012-12-11 16:43:20'),
(10, 'Panchabati', '16 - 20', '1,51,000 - 2,00,000', 'Plot is a literary term defined as the events that make up a story, particularly as they relate to one ', '1', 10, '2012-12-11 16:43:40'),
(11, 'Indraprastha', '1 - 2', '50,000 - 60,000', 'Plot is a literary term defined as the events that make up a story, particularly as they relate to one ', '1', 11, '2012-12-11 16:48:59'),
(12, 'Indraprastha', '2 - 4', '61,000 - 80,000', 'Plot is a literary term defined as the events that make up a story, particularly as they relate to one ', '1', 12, '2012-12-11 16:49:12'),
(13, 'Indraprastha', '5- 8', '81,000 - 1,00,000', 'Plot is a literary term defined as the events that make up a story, particularly as they relate to one ', '1', 13, '2012-12-11 16:49:22'),
(14, 'Indraprastha', '9 - 15', '1,01,000- 1,50,000', 'Plot is a literary term defined as the events that make up a story, particularly as they relate to one ', '1', 14, '2012-12-11 16:49:36'),
(15, 'Indraprastha', '16 - 20', '1,51,000 - 2,00,000', 'Plot is a literary term defined as the events that make up a story, particularly as they relate to one ', '1', 15, '2012-12-11 16:49:46'),
(16, 'Panchabati', '9 - 15', '61,000 - 80,000', 'Plot is a literary term defined as the events that make up a story, particularly as they relate to one ', '1', 16, '2012-12-11 16:50:00'),
(17, 'Indraprastha', '5- 8', '1,51,000 - 2,00,000', 'Plot is a literary term defined as the events that make up a story, particularly as they relate to one ', '1', 17, '2012-12-11 16:50:07'),
(18, 'Ujjaini', '16 - 20', '50,000 - 60,000', 'Plot is a literary term defined as the events that make up a story, particularly as they relate to one ', '1', 18, '2012-12-11 16:50:20'),
(19, 'Panchabati', '9 - 15', '1,51,000 - 2,00,000', 'Plot is a literary term defined as the events that make up a story, particularly as they relate to one ', '1', 19, '2012-12-11 16:50:32'),
(20, 'Indraprastha', '2 - 4', '1,51,000 - 2,00,000', 'Commercial Plot for SALE', '1', 20, '2012-12-17 11:09:16');

-- --------------------------------------------------------

--
-- Table structure for table `k8_real_state_area`
--

CREATE TABLE IF NOT EXISTS `k8_real_state_area` (
  `area_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `area` varchar(255) NOT NULL,
  `publish` enum('1','0') NOT NULL,
  `newOrder` bigint(20) NOT NULL,
  `updtime` datetime NOT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `k8_real_state_area`
--

INSERT INTO `k8_real_state_area` (`area_id`, `area`, `publish`, `newOrder`, `updtime`) VALUES
(1, '9 - 15', '1', 1, '2012-12-07 12:42:45'),
(2, '5- 8', '1', 2, '2012-12-07 14:26:19'),
(3, '2 - 4', '1', 3, '2012-12-07 14:43:05'),
(4, '1 - 2', '1', 4, '2012-12-10 14:19:04'),
(5, '16 - 20', '1', 5, '2012-12-11 16:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `k8_real_state_location`
--

CREATE TABLE IF NOT EXISTS `k8_real_state_location` (
  `location_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `location` varchar(255) NOT NULL,
  `publish` enum('1','0') NOT NULL,
  `newOrder` bigint(20) NOT NULL,
  `updtime` datetime NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `k8_real_state_location`
--

INSERT INTO `k8_real_state_location` (`location_id`, `location`, `publish`, `newOrder`, `updtime`) VALUES
(3, 'Ujjaini', '1', 3, '2012-12-07 14:41:57'),
(2, 'Panchabati', '1', 2, '2012-12-07 14:41:51'),
(1, 'Indraprastha', '1', 1, '2012-12-07 14:41:39');

-- --------------------------------------------------------

--
-- Table structure for table `k8_real_state_price`
--

CREATE TABLE IF NOT EXISTS `k8_real_state_price` (
  `price_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `price` varchar(255) NOT NULL,
  `publish` enum('1','0') NOT NULL,
  `newOrder` bigint(20) NOT NULL,
  `updtime` datetime NOT NULL,
  PRIMARY KEY (`price_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `k8_real_state_price`
--

INSERT INTO `k8_real_state_price` (`price_id`, `price`, `publish`, `newOrder`, `updtime`) VALUES
(1, '1,01,000- 1,50,000', '1', 2, '2012-12-07 12:37:11'),
(2, '81,000 - 1,00,000', '1', 1, '2012-12-07 13:25:49'),
(3, '61,000 - 80,000', '1', 3, '2012-12-07 14:42:43'),
(4, '50,000 - 60,000', '1', 4, '2012-12-10 15:01:12'),
(5, '1,51,000 - 2,00,000', '1', 5, '2012-12-11 16:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `k8_tour_programme`
--

CREATE TABLE IF NOT EXISTS `k8_tour_programme` (
  `tour_cat_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tour_cat_name` varchar(255) NOT NULL,
  `tour_cat_sdesc` text NOT NULL,
  `tour_cat_time` varchar(255) NOT NULL,
  `tour_cat_price` double NOT NULL,
  `tour_cat_image` varchar(255) NOT NULL,
  `publish` enum('1','0') NOT NULL DEFAULT '0',
  `newOrder` bigint(20) NOT NULL,
  `updtime` datetime NOT NULL,
  PRIMARY KEY (`tour_cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `k8_tour_programme`
--

INSERT INTO `k8_tour_programme` (`tour_cat_id`, `tour_cat_name`, `tour_cat_sdesc`, `tour_cat_time`, `tour_cat_price`, `tour_cat_image`, `publish`, `newOrder`, `updtime`) VALUES
(1, 'KERALA', '<p>\r\n	<span style="color: rgb(64, 138, 255);"><strong>Day 1:</strong></span><br />\r\n	Train from Howrah for Madurai</p>\r\n<hr style="color: rgb(240, 240, 240);" />\r\n<p>\r\n	<span style="color: rgb(64, 138, 255);"><strong>Day 2:</strong></span><br />\r\n	In train</p>\r\n<hr style="color: rgb(240, 240, 240);" />\r\n<p>\r\n	<span style="color: rgb(64, 138, 255);"><strong>Day 3:</strong></span><br />\r\n	Reach Madurai. Drive to Cochin (approx time 5 hrs 48 mins). Transfer to your hotel. afternoon sightseeing visiting Jewish Synagogue, Dutch Palace, St.Thomas Church, St.Mary&#39;s cathedral, Chinese Fishing Nets and Bolghaty Palace. Overnight stay at Cochin.</p>\r\n<hr style="color: rgb(240, 240, 240);" />\r\n<p>\r\n	<span style="color: rgb(64, 138, 255);"><strong>Day 4:</strong></span><br />\r\n	Morning proceed to Munnar (4 hrs, 130km) on your way visiting Cheyyappara Water Falls. Check in to your hotel by noon. Overnight stay at Munnar.</p>\r\n<hr style="color: rgb(240, 240, 240);" />\r\n<p>\r\n	<span style="color: rgb(64, 138, 255);"><strong>Day 5:</strong></span><br />\r\n	Morning, Sightseeing visiting tea plantations, Eravikulam National Park, Devikulam, Mattupetty, Echo Point, Kundal Dam, etc. Over night at Munnar.</p>\r\n<hr style="color: rgb(240, 240, 240);" />\r\n<p>\r\n	<span style="color: rgb(64, 138, 255);"><strong>Day 6:</strong></span><br />\r\n	Morning proceed to Thekkady (Periyar) check in to your hotel by noon afternoon boating through Periyar lake -Wildlife sanctuary visiting spice villages, Overnight stay at Thekkady.</p>\r\n<hr style="color: rgb(240, 240, 240);" />\r\n<p>\r\n	<span style="color: rgb(64, 138, 255);"><strong>Day 7:</strong></span><br />\r\n	Morning proceed to Kumarakom check in to your resort by noon, Evening visiting Kumarakom bird sanctuary watch birds like Kingfisher, Drongo , Egrets etc. Over Night stay at Kumarakom.</p>\r\n<hr style="color: rgb(240, 240, 240);" />\r\n<p>\r\n	<span style="color: rgb(64, 138, 255);"><strong>Day 8:</strong></span><br />\r\n	Morning proceed to Alleppey, check in to your house boat Back water cruise through paddy fields, coconut lagoons, narrow canals and coir villages to Alleppy. Overnight stay at House Boat.</p>\r\n<hr style="color: rgb(240, 240, 240);" />\r\n<p>\r\n	<span style="color: rgb(64, 138, 255);"><strong>Day 9:</strong></span><br />\r\n	Morning, proceed to Kovalam on the way sightseeing of Trivandrum, visiting Sri Padmanabha Swamy Temple, zoo etc. Check into your hotel at Kovalam</p>\r\n<hr style="color: rgb(240, 240, 240);" />\r\n<p>\r\n	<span style="color: rgb(64, 138, 255);"><strong>Day 10:</strong></span><br />\r\n	Spending the entire day at beaches:- the paradise of sun, sea, sand and surf. Find out one of the best 10 beaches in the world Overnight stay at Kovalam</p>\r\n<hr style="color: rgb(240, 240, 240);" />\r\n<p>\r\n	<span style="color: rgb(64, 138, 255);"><strong>Day 11:</strong></span><br />\r\n	Drive to railway station at Trivandrum (approx time 20 mins). Train for Howrah.</p>\r\n<hr style="color: rgb(240, 240, 240);" />\r\n<p>\r\n	<span style="color: rgb(64, 138, 255);"><strong>Day 12:</strong></span><br />\r\n	In train</p>\r\n<hr style="color: rgb(240, 240, 240);" />\r\n<p>\r\n	<span style="color: rgb(64, 138, 255);"><strong>Day 13:</strong></span><br />\r\n	Reach Howrah.</p>\r\n', 'October & April                                                                                                                                                                                                                                                ', 10000, '1.jpg', '1', 1, '2013-06-21 16:48:44'),
(2, 'ANDAMAN', '<p> <span style="color: rgb(64, 138, 255);"><strong>Day 1:</strong></span><br />\r\n  Arrival at airport. Transfer and stay at hotel.</p>\r\n<hr style="color: rgb(240, 240, 240);">\r\n<p><span style="color: rgb(64, 138, 255);"><strong>Day 2: </strong></span><br />\r\n  City tour (local sightseeing). Cellular jail, fisheries aquarium (marine museum), anthoropoligical museum (tribals museum), samudrika (naval museum), chatam saw mill, mini zoo, marina park, light and sound show etc.</p>\r\n<hr style="color: rgb(240, 240, 240);">\r\n<p><span style="color: rgb(64, 138, 255);"><strong>Day 3:</strong></span><br />\r\n  Transfer to Havelock Island, Stay at Hotel.</p>\r\n<hr style="color: rgb(240, 240, 240);">\r\n<p><span style="color: rgb(64, 138, 255);"><strong>Day 4:</strong></span><br />\r\n  Transfer to Andaman.</p>\r\n<hr style="color: rgb(240, 240, 240);">\r\n<p><span style="color: rgb(64, 138, 255);"><strong>Day 5:</strong></span><br />\r\n  Baratang Island (Lime Stone, Mud Valcano And Jarwa).</p>\r\n<hr style="color: rgb(240, 240, 240);">\r\n<p><span style="color: rgb(64, 138, 255);"><strong>Day 6:</strong></span><br />\r\n  Sight Seeing at Ross Islands, North Bay Islands (Coral Islands And Beach), Viper Island.</p>\r\n<hr style="color: rgb(240, 240, 240);">\r\n<p><span style="color: rgb(64, 138, 255);"><strong>Day 7:</strong></span><br />\r\n  Check out from hotel and transfer to airport.</p>\r\n', '6 Nights & 7 Days (Anytime)                                                                                                        ', 12000, '2.jpg', '1', 2, '2013-06-21 16:48:44'),
(3, 'VIZAG-ARAKU ', '<p>\r\n	<span style="color: rgb(64, 138, 255);"><strong>Day 1:</strong></span><br />\r\n	Journey start from Howrah to Vizag.</p>\r\n<hr style="color: rgb(240, 240, 240);" />\r\n<p>\r\n	<span style="color: rgb(64, 138, 255);"><strong>Day 2: </strong></span><br />\r\n	Morning arrival at Vizag hotel check in.</p>\r\n<hr style="color: rgb(240, 240, 240);" />\r\n<p>\r\n	<span style="color: rgb(64, 138, 255);"><strong>Day 3:</strong></span><br />\r\n	Local sightseeing, Vishakha musueum, Kailashgiri heals etc.Stay.</p>\r\n<hr style="color: rgb(240, 240, 240);" />\r\n<p>\r\n	<span style="color: rgb(64, 138, 255);"><strong>Day 4:</strong></span><br />\r\n	To Araku, Sight seen at Bora caves, Araku museum, coffee plantation etc. Night stay.</p>\r\n<hr style="color: rgb(240, 240, 240);" />\r\n<p>\r\n	<span style="color: rgb(64, 138, 255);"><strong>Day 5:</strong></span><br />\r\n	Araku to Jagdalpur.Sight seen at Tirathgarh falls, Kutumsar cave etc.</p>\r\n<hr style="color: rgb(240, 240, 240);" />\r\n<p>\r\n	<span style="color: rgb(64, 138, 255);"><strong>Day 6:</strong></span><br />\r\n	Jagdalpur to Vizag.Sight seen at Simachalam, Rishikonda beach etc.Night stay.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<hr style="color: rgb(240, 240, 240);" />\r\n<p>\r\n	<span style="color: rgb(64, 138, 255);"><strong>Day 7:</strong></span><br />\r\n	Return start for Howrah, hotel check out.</p>\r\n<hr style="color: rgb(240, 240, 240);" />\r\n<p>\r\n	<span style="color: rgb(64, 138, 255);"><strong>Day 8:</strong></span><br />\r\n	Arrival at Howrah.</p>\r\n', 'OCTOBER, DECEMBER & FEBRUARY                                                                                         ', 12000, '3.jpg', '1', 2, '2013-06-21 16:48:44');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
