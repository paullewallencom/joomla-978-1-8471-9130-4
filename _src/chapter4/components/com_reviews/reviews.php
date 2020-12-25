<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

echo '<div class="componentheading">Restaurant Reviews</div>';

jimport('joomla.application.helper');
require_once( JApplicationHelper::getPath( 'html' ) );
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS. 'components'.DS.$option.DS.'tables');

switch($task)
{
	case 'view': 
	    viewReview($option); 
	    break;
	
	case 'comment': 
		addComment($option); 
		break; 
	
	default:
		showPublishedReviews($option);
		break;
}

function showPublishedReviews($option)
{
	$db =& JFactory::getDBO();
	$query = "SELECT * FROM #__reviews WHERE published = '1' ORDER BY review_date DESC";
	$db->setQuery( $query ); 
	$rows = $db->loadObjectList(); 
	
	if ($db->getErrorNum()) 
	{ 
		echo $db->stderr(); 
		return false; 
	} 
	
	HTML_reviews::showReviews($rows, $option); 
}

function viewReview($option)
{
	$id = JRequest::getVar('id', 0);

	$row =& JTable::getInstance('review', 'Table');
	$row->load($id);

	if(!$row->published)
	{
		JError::raiseError( 404, JText::_( 'Invalid ID provided' ) );
	}

	HTML_reviews::showReview($row, $option);
	
	$db =& JFactory::getDBO();
	
	$db->setQuery("SELECT * FROM #__reviews_comments WHERE review_id = '$id' ORDER BY comment_date");
	$rows = $db->loadObjectList();
	
	foreach($rows as $row)
	{
		HTML_reviews::showComment($row);
	}
	
	$user =& JFactory::getUser(); 
	
	if($user->name) 
	{ 
		$name = $user->name; 
	} 
	else 
	{ 
		$name = ''; 
	} 

	HTML_reviews::showCommentForm($option, $id, $name);
}

function addComment($option) 
{ 
	global $mainframe;
	
	jimport('joomla.utilities.date');
	
	$row =& JTable::getInstance('comment', 'Table');

	if (!$row->bind(JRequest::get('post')))
	{
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	
	$row->id = null;
	$row->review_id = (int) $row->review_id;
	$row->user_id = (int) $row->user_id;
	
	$currDate =& JFactory::getDate();
	$row->comment_date = $currDate->toMySQL();
	
	$user =& JFactory::getUser();

	if($user->id) 
	{ 
		$row->user_id = $user->id; 
	} else {
		$row->user_id = 0;
	}

	if (!$row->store()) 
	{ 
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n"; 
		exit(); 
	}

	$mainframe->redirect('index.php?option=' . $option . '&id=' . $row->review_id . '&task=view', 'Comment Added.'); 
}

?>