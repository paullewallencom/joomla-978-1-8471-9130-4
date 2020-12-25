CREATE TABLE `jos_reviews_comments` (
  `id` int(11) NOT NULL auto_increment,
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `comment_date` datetime NOT NULL,
  `comment_text` text NOT NULL,
  PRIMARY KEY  (`id`)
);