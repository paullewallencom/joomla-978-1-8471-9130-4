<?php

defined( '_JEXEC' ) or die( 'Restricted access' );

$mainframe->registerEvent( 'onPrepareContent', 'pluginReviews' );

function pluginReviews( &$row, &$params )
{
	$plugin =& JPluginHelper::getPlugin('content', 'reviews');
 	$pluginParams = new JParameter( $plugin->params );
	
	$reviews = contentReviews_getlist();
	
	$pattern = array();
	$replace = array();
	
	foreach($reviews as $review)
	{
		$pattern[] = '/' . preg_quote($review) . '/';
		$replace[] = contentReviews_makeLink($review, $reviews, $pluginParams);
	}
		
	$row->text = preg_replace($pattern, $replace, $row->text);
	
	return true;
}

function contentReviews_makeLink ($title, &$reviews, &$pluginParams)
{
	$linkcode = $pluginParams->get('linkcode', '');
	
	$id = array_search($title, $reviews);
	
	$link = JRoute::_('index.php?option=com_reviews&view=opinion&id=' . $id );

	if($linkcode == '')
	{
		$linkcode = '<a href="' . $link . '">' . $title . '</a>';
	}
	else
	{
		$linkcode = str_replace('{link}', $link, $linkcode);
		$linkcode = str_replace('{title}', $title, $linkcode);
	}

	return $linkcode;	
}

function contentReviews_getlist()
{
	$reviews = array();

	$db =& JFactory::getDBO();
	
	$query = "SELECT id, name FROM #__reviews";
	
	$db->setQuery($query);
	
	$rows = $db->loadObjectList('id');
	
	foreach($rows as $id => $row)
	{
		$reviews[$id] = $row->name;
	}
	
	return $reviews;
}

?>