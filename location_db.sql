
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


--Table structure for table `countries`


CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:Blocked, 1:Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- Dumping data for table `countries`


INSERT INTO `countries` (`country_id`, `country_name`, `status`) VALUES
(1, 'India', 1),
(2, 'Australia', 1);


-- Table structure for table `states`


CREATE TABLE `states` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:Blocked, 1:Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- Dumping data for table `states`


INSERT INTO `states` (`state_id`, `state_name`, `country_id`, `status`) VALUES
(1, 'Punjab', 1, 1),
(2, 'Sydney', 2, 1);
