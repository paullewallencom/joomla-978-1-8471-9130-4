<?php 
defined( '_JEXEC' ) or die( 'Restricted access' ); 

jimport( 'joomla.application.component.controller' ); 

class ReviewController extends JController 
{
	function display() 
	{ 
		$document =& JFactory::getDocument(); 
		$viewName = JRequest::getVar('view', 'all'); 
		$viewType = $document->getType(); 
		$view = &$this->getView($viewName, $viewType, 'View'); 
		$model =& $this->getModel( $viewName, 'ModelReviews' ); 

		if (!JError::isError( $model )) { 
			$view->setModel( $model, true ); 
		}

		$view->setLayout('default'); 
		$view->display(); 
	}

	function comment() 
	{ 
		global $option; 

		$row =& JTable::getInstance('comment', 'Table');

		if (!$row->bind(JRequest::get('post'))) { 
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

		if (!$row->store()) { 
			echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n"; 
			exit(); 
		}

		$this->setRedirect('index.php?option=' . $option .'&id=' . $row->review_id . '&view=opinion', 'Comment Added.'); 
	}

} 
?>