<?php 
defined('_JEXEC') or die('Restricted access');

class modReviewsHelper
{
	function getReviews(&$params)
	{
		$items = $params->get('items', 1);
		
		$db =& JFactory::getDBO();
		$query = "SELECT id, name, quicktake FROM #__reviews WHERE  published = '1' ORDER BY review_date DESC";
		$db->setQuery( $query, 0, $items );
		$rows = $db->loadObjectList();
		
		return $rows;
	}

	function renderReview(&$review, &$params)
	{
		$link = JRoute::_("index.php?option=com_reviews&task=view&id=" . $review->id);
		require(JModuleHelper::getLayoutPath('mod_reviews', '_review'));
	}
	
	function getRandomReview() 
	{ 
		$db =& JFactory::getDBO();
		$query = "SELECT id, name, quicktake FROM #__reviews WHERE published = '1'";
		$db->setQuery( $query );
		$rows = $db->loadObjectList();
		
		$row = array();
		
		if (count($rows)) {
			$i = rand(0, count($rows) - 1 );
			$row = array( $rows[$i] );
		}
		
		return $row;
	}

}
 
?>