<?php

defined('_JEXEC') or die('Restricted access');

class TableComment extends JTable
{
	var $id = null;
	var $review_id = null;
	var $user_id = null;
	var $full_name = null;
	var $comment_date = null;
	var $comment_text = null;

	function __construct(&$db)
	{
		parent::__construct( '#__reviews_comments', 'id', $db );
	}
}

?>