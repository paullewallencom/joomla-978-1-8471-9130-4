<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

require_once( JApplicationHelper::getPath( 'toolbar_html' ) );

switch($task)
{
	case 'edit':
	case 'add':
		TOOLBAR_reviews::_NEW();
		break;
	
	case 'comments': 
	case 'saveComment': 
	case 'removeComment': 
		TOOLBAR_reviews_comments::_DEFAULT(); 
		break; 

	case 'editComment': 
		TOOLBAR_reviews_comments::_EDIT(); 
		break;	
	
	default:
		TOOLBAR_reviews::_DEFAULT();
		break;
}

?>