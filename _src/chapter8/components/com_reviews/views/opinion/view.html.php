<?php

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.view');

class ViewOpinion extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe;
		
		$model =& $this->getModel();
		$user =& JFactory::getUser();

		$review = $model->getReview();
		$comments = $model->getComments();
		$pathway =& $mainframe->getPathWay();
		
		$backlink = JRoute::_('index.php?option=' . $option . '&view=all' );
		
		$params = &$mainframe->getParams();
		$currency = $params->get('currency_symbol', '$');
		
		$review->review_date = JHTML::Date($review->review_date);
		
		if($review->smoking == 1)
		{
			$review->smoking = "Yes";
		}
		else
		{
			$review->smoking = "No";
		}
		
		for($i = 0; $i < count($comments); $i++)
		{
			$row =& $comments[$i];
			$row->comment_date = JHTML::Date($row->comment_date);
		}
		
		$pathway->addItem($review->name, '');
		
		$this->assignRef('review', $review);
		$this->assignRef('comments', $comments);
		$this->assignRef('backlink', $backlink);
		$this->assignRef('option', $option);
		$this->assignRef('name', $user->name);
		$this->assignRef('currency', $currency);
		
		parent::display($tpl);
	}
}

?>