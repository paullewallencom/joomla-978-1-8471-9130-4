<?php

defined( '_JEXEC' ) or die( 'Restricted access' );

$mainframe->registerEvent( 'onSearch', 'botSearchReviews' );
$mainframe->registerEvent( 'onSearchAreas', 'botSearchReviewAreas' );

function &botSearchReviewAreas() {
	static $areas = array(
		'reviews' => 'Restaurant Reviews'
	);
	return $areas;
}

function botSearchReviews ( $text, $phrase='', $ordering='', $areas=null )
{
	if (!$text) {
		return array();
	}
	
	if (is_array( $areas )) {
		if (!array_intersect( $areas, array_keys( botSearchReviewAreas() ) )) {
			return array();
		}
	}
	
	$db =& JFactory::getDBO();

	if ($phrase == 'exact')
	{
		$where = "(LOWER(name) LIKE '%$text%') OR (LOWER(quicktake) LIKE '%$text%')" .
				" OR (LOWER(review) LIKE '%$text%') OR (LOWER(notes) LIKE '%$text%')";
	}
	else
	{
		$words = explode( ' ', $text );
		$wheres = array();

		foreach ($words as $word) {
			$wheres[] = "(LOWER(name) LIKE '%$word%') OR (LOWER(quicktake) LIKE '%$word%')" .
						" OR (LOWER(review) LIKE '%$word%') OR (LOWER(notes) LIKE '%$word%')";
		}

		if($phrase == 'all')
		{
			$separator = "AND";
		}
		else
		{
			$separator = "OR";
		}

		$where = '(' . implode( ") $separator (" , $wheres ) . ')';
	}

	$where .= ' AND published = 1';
	
	switch ($ordering) {
		case 'oldest':
			$order = 'review_date ASC';
			break;

		case 'alpha':
			$order = 'title ASC';
			break;

		case 'newest':
		default:
			$order = 'review_date DESC';
			break;
	}
	
	$query = "SELECT name AS title, quicktake AS text, review_date AS created, " .
		"\n 'Restaurant Reviews' AS section," .
		"\n CONCAT('index.php?option=com_reviews&view=opinion&id=', id) AS href," .
		"\n '2' AS browsernav" .
		"\n FROM #__reviews" .
		"\n WHERE $where" .
		"\n ORDER BY $order";

	$db->setQuery( $query );
	$rows = $db->loadObjectList();

	return $rows;
}

?>