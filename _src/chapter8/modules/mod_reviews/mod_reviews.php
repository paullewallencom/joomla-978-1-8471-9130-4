<?php 
defined('_JEXEC') or die('Restricted access'); 

require(dirname(__FILE__).DS.'helper.php'); 

$random = $params->get('random', 0); 
$style = $params->get('style', 'default'); 

if($random)
{
	$list = modReviewsHelper::getRandomReview();
}
else
{
	$list = modReviewsHelper::getReviews($params);
}

if (count($list)) {
	require(JModuleHelper::getLayoutPath('mod_reviews', $style));
}

?> 
