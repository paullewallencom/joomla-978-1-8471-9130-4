<?php defined('_JEXEC') or die('Restricted access'); ?> 
<ul> 
<?php
foreach ($list as $review)
{ 
	echo "<li>";
	modReviewsHelper::renderReview($review, $params);
	echo "</li>";
}
?>
</ul>
