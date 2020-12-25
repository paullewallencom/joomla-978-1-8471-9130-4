<?php
defined('_JEXEC') or die('Restricted access');

foreach ($list as $review){
	modReviewsHelper::renderReview($review, $params);
}

?>