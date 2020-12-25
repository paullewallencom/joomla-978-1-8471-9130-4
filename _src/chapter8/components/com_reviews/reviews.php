<?php 
defined('_JEXEC') or die('Restricted access'); 

require_once( JPATH_COMPONENT.DS.'controller.php' );

JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS. 'com_reviews'.DS.'tables'); 

echo '<div class="componentheading">Restaurant Reviews</div>'; 

$controller = new ReviewController(); 
$controller->execute( JRequest::getVar( 'task' ) ); 
$controller->redirect(); 

?> 
