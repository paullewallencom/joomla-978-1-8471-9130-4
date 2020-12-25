<?php

defined( '_JEXEC' ) or die( 'Restricted access' );

$mainframe->registerEvent( 'onPrepareContent', 'pluginReviewInfo' );

function pluginReviewInfo ( &$row, &$params )
{
	$plugin =& JPluginHelper::getPlugin('content', 'reviewinfo');
 	$pluginParams = new JParameter( $plugin->params );
	
	preg_match_all('/\{reviewinfo (.*)\}/U', $row->text, $matches);
	
	foreach( $matches[1] as $name )
	{
		$review = contentReviewInfo_getReviewByName($name);
		$html = contentReviewInfo_createHTML($review, $pluginParams);
		$row->text = str_replace("{reviewinfo $name}", $html, $row->text);
	}

	return true;
}

function contentReviewInfo_getReviewByName ($name)
{
	$db =& JFactory::getDBO();
	
	$name = addslashes($name);
	
	$query = "SELECT * FROM #__reviews WHERE name = '$name'";
	
	$db->setQuery($query);
	
	$review = $db->loadObject();
		
	return $review;
}

function contentReviewInfo_createHTML (&$review, &$pluginParams)
{
	$html = '<table class="moduletable">';
	$html .= '<tr><th colspan="2">Info</th></tr>';

	if($pluginParams->get('address', 1))
	{
		$html .= '<tr><td>Address:</td><td>' . $review->address . '</td></tr>';
	}
	
	if($pluginParams->get('price_range', 1))
	{
		$html .= '<tr><td>Price Range:</td><td>$' . $review->avg_dinner_price . '</td></tr>';
	}
	
	if($pluginParams->get('reservations', 1))
	{
		$html .= '<tr><td>Reservations:</td><td>' . $review->reservations . '</td></tr>';
	}
	
	if ( $review->smoking == 0 )
	{
		$smoking = 'No';
	}
	else
	{
		$smoking = 'Yes';
	}
	
	if($pluginParams->get('smoking', 1))
	{
		$html .= '<tr><td>Smoking:</td><td>' . $smoking . '</td></tr>';
	}
	
	$html .= '</table>';
	
	return $html;
}

?>