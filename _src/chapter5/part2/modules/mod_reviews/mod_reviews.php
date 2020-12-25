<?php 
defined('_JEXEC') or die('Restricted access'); 

require(dirname(__FILE__).DS.'helper.php'); 

$list = modReviewsHelper::getReviews($params); 

require(JModuleHelper::getLayoutPath('mod_reviews', 'bulleted'));

?> 
