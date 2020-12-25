<?php 
defined( '_JEXEC' ) or die( 'Restricted access' ); 

jimport('joomla.application.component.view'); 

class ViewAll extends JView
{

	function display($tpl = null)
	{
		global $option;

		$model = &$this->getModel();
		$list = $model->getList();

		for($i = 0; $i < count($list); $i++) 
		{ 
			$row =& $list[$i]; 
			$row->link = JRoute::_('index.php?option=' . $option . '&id=' . $row->id  . '&view=opinion'); 
		}

		$this->assignRef('list', $list); 
		parent::display($tpl);	
	}

} 

?>