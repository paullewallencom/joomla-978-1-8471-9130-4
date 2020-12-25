<?php 
defined( '_JEXEC' ) or die( 'Restricted access' ); 

jimport( 'joomla.application.component.model' ); 

class ModelReviewsOpinion extends JModel 
{
	var $_review = null; 
	var $_comments = null; 
	var $_id = null; 

	function __construct() 
	{ 
		parent::__construct(); 
		$id = JRequest::getVar('id', 0); 
		$this->_id = $id; 
	} 

	function getReview() 
	{ 
		if(!$this->_review) 
		{ 
			$query = "SELECT * FROM #__reviews WHERE id = '" . $this->_id . "'"; 
			$this->_db->setQuery($query); 
			$this->_review = $this->_db->loadObject();
			 
			if(!$this->_review->published) 
			{ 
				JError::raiseError( 404, "Invalid ID provided" ); 
			} 
		}
		
		return $this->_review; 
	} 

	function getComments() 
	{
		if(!$this->_comments) 
		{ 
			$query = "SELECT * FROM #__reviews_comments WHERE review_id = '" . $this->_id . "' ORDER BY comment_date"; 
			$this->_comments = $this->_getList($query, 0, 0);      
		}
		
		return $this->_comments; 
	} 

} 

?>