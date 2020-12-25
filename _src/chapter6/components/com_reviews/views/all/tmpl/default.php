<?php defined( '_JEXEC' ) or die( 'Restricted access' ); ?> 
<table> 
<?php foreach($this->list as $l): ?> 
<tr><td> 
<a href="<?php echo $l->link; ?>"><?php echo $l->name; ?></a> 
</td></tr> 
<?php endforeach; ?> 
</table>