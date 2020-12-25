CREATE TABLE IF NOT EXISTS `#__reviews` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `reservations` varchar(31) NOT NULL,
  `quicktake` text NOT NULL,
  `review` text NOT NULL,
  `notes` text NOT NULL,
  `smoking` tinyint(1) NOT NULL default '0',
  `credit_cards` varchar(255) NOT NULL,
  `cuisine` varchar(31) NOT NULL,
  `avg_dinner_price` tinyint(3) NOT NULL default '0',
  `review_date` datetime NOT NULL,
  `published` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
);

CREATE TABLE IF NOT EXISTS `#__reviews_comments` (
  `id` int(11) NOT NULL auto_increment,
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `comment_date` datetime NOT NULL,
  `comment_text` text NOT NULL,
  PRIMARY KEY  (`id`)
);