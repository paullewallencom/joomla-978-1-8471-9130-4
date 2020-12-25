<?php 
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.model' );

class ModelReviewsAll extends JModel
{
	var $_reviews = null;

	function getList()
	{
		if(!$this->_reviews)
		{
			$query = "SELECT * FROM #__reviews WHERE published = '1'";
			$this->_reviews = $this->_getList($query, 0, 0);
		}
		
		return $this->_reviews;
	}
}

?>