<?php 
defined('_JEXEC') or die('Restricted access');

$items = $params->get('items', 1); 

$db =& JFactory::getDBO(); 
$query = "SELECT id, name FROM #__reviews WHERE published = '1' ORDER BY review_date DESC"; 
$db->setQuery( $query, 0, $items ); 
$rows = $db->loadObjectList(); 

foreach($rows as $row) 
{ 
	echo '<p><a href="' . JRoute::_('index.php?option=com_reviews&id=' . $row->id . '&task=view') . '">' . $row->name . '</a></p>'; 
}
 
?>