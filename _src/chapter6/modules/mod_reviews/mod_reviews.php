<?php 
defined('_JEXEC') or die('Restricted access'); 

require(dirname(__FILE__).DS.'helper.php'); 

$random = $params->get('random', 0); 

if($random)
{
	$list = modReviewsHelper::getRandomReview();
}
else
{
	$list = modReviewsHelper::getReviews($params);
}

if (count($list)) {
	require(JModuleHelper::getLayoutPath('mod_reviews', 'default'));
}

?> 
