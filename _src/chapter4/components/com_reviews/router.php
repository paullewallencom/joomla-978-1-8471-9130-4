<?php 
defined( '_JEXEC' ) or die( 'Restricted access' ); 

function ReviewsBuildRoute(&$query)
{
	$segments = array();

	if (isset($query['task'])) {
		$segments[] = $query['task'];
		unset($query['task']);
	}

	if(isset($query['id']))
	{
		$segments[] = $query['id'];
		unset($query['id']);
	}

	return $segments;
}

function ReviewsParseRoute($segments) 
{ 
	$vars = array();

	$vars['task'] = $segments[0];
	$vars['id'] = $segments[1];

	return $vars;
}

?>
