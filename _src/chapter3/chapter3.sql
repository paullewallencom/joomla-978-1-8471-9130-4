CREATE TABLE `jos_reviews`
(
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `reservations` varchar(31) NOT NULL,
  `quicktake` text NOT NULL,
  `review` text NOT NULL,
  `notes` text NOT NULL,
  `smoking` tinyint(1) unsigned NOT NULL default '0',
  `credit_cards` varchar(255) NOT NULL,
  `cuisine` varchar(31) NOT NULL,
  `avg_dinner_price` tinyint(3) unsigned NOT NULL default '0',
  `review_date` datetime NOT NULL,
  `published` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
);