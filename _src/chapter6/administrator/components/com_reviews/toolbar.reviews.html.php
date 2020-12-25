<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

class TOOLBAR_reviews {
	function _NEW() {
		JToolBarHelper::save();
		JToolBarHelper::apply();
		JToolBarHelper::cancel();
	}

	function _DEFAULT() {
		JToolBarHelper::title( JText::_( 'Restaurant Reviews' ), 'generic.png' );
		JToolBarHelper::publishList();
		JToolBarHelper::unpublishList();
		JToolBarHelper::editList();
		JToolBarHelper::deleteList();
		JToolBarHelper::addNew();
	}
}

class TOOLBAR_reviews_comments 
{
	function _EDIT()
	{
		JToolBarHelper::save('saveComment'); 
		JToolBarHelper::cancel('comments');
	}
	
	function _DEFAULT()
	{
		JToolBarHelper::title( JText::_( 'Comments' ), 'generic.png' );
		JToolBarHelper::editList('editComment');
		JToolBarHelper::deleteList('Are you sure you want to remove these comments?', 'removeComment');
	}
}

?>
