<?php 
defined( '_JEXEC' ) or die( 'Restricted access' ); 

class HTML_reviews 
{ 
	function editReview( $row, $lists, $option ) 
	{ 
		$editor =& JFactory::getEditor(); 
		JHTML::_('behavior.calendar'); 
		?> 
		<form action="index.php" method="post" 
				 name="adminForm" id="adminForm"> 
		<fieldset class="adminform"> 
		<legend>Details</legend> 
		<table class="admintable"> 
		<tr> 
		  <td width="100" align="right" class="key"> 
			Name: 
		  </td> 
		  <td> 
			<input class="text_area" type="text" name="name" 
			   id="name" size="50" maxlength="250" 
			   value="<?php echo $row->name;?>" /> 
		  </td> 
		</tr> 
		<tr> 
		  <td width="100" align="right" class="key"> 
			Address: 
		  </td> 
		  <td> 
			<input class="text_area" type="text" name="address" 
			   id="address" size="50" maxlength="250" 
			   value="<?php echo $row->address;?>" /> 
		  </td> 
		</tr> 
		<tr> 
		  <td width="100" align="right" class="key"> 
			Reservations: 
		  </td> 
		  <td> 
			<?php 
			echo $lists['reservations'];
			?> 
		  </td> 
		</tr> 
		<tr> 
		  <td width="100" align="right" class="key"> 
			Quicktake: 
		  </td> 
		  <td> 
			<?php 
			echo $editor->display( 'quicktake',	 $row->quicktake , 
									  '100%', '150', '40', '5' ) ; 
			?> 
		  </td> 
		</tr> 
		<tr> 
		  <td width="100" align="right" class="key"> 
			Review: 
		  </td> 
		  <td> 
			<?php 
			echo $editor->display( 'review',  $row->review , 
									 '100%', '250', '40', '10' ) ; 
			?> 
		  </td> 
		</tr> 
		<tr> 
		  <td width="100" align="right" class="key"> 
			Notes: 
		  </td> 
		  <td> 
			<textarea class="text_area" cols="20" rows="4" 
			   name="notes" id="notes" style="width:500px"><?php echo 
			   $row->notes; ?></textarea> 
		  </td> 
		</tr> 
		<tr> 
		  <td width="100" align="right" class="key"> 
			Smoking: 
		  </td> 
		  <td> 
			<?php 
			echo $lists['smoking']; 
			?>
		  </td> 
		</tr> 
		<tr> 
		  <td width="100" align="right" class="key"> 
			Credit Cards: 
		  </td> 
		  <td> 
			<input class="text_area" type="text" name="credit_cards" 
			   id="credit_cards" size="50" maxlength="250" 
			   value="<?php echo $row->credit_cards;?>" /> 
		  </td> 
		</tr> 
		<tr> 
		  <td width="100" align="right" class="key"> 
			Cuisine: 
		  </td> 
		  <td> 
			<input class="text_area" type="text" name="cuisine" 
			   id="cuisine" size="31" maxlength="31" 
			   value="<?php echo $row->cuisine;?>" /> 
		  </td> 
		</tr> 
		<tr> 
		  <td width="100" align="right" class="key"> 
			Average Dinner Price: 
		  </td> 
		  <td> 
			$<input class="text_area" type="text" 
				 name="avg_dinner_price" 
				 id="avg_dinner_price" size="5" maxlength="3" 
				 value="<?php echo $row->avg_dinner_price;?>" /> 
		  </td> 
		</tr> 
		<tr> 
		  <td width="100" align="right" class="key"> 
			Review Date: 
		  </td> 
		  <td> 
			<?php echo JHTML::calendar($row->review_date, 'review_date', 'review_date'); ?>
		  </td> 
		</tr> 
		<tr> 
		  <td width="100" align="right" class="key"> 
			Published: 
		  </td> 
		  <td> 
			<?php 
			echo $lists['published']; 
			?> 
		  </td> 
		</tr> 
		</table> 
		</fieldset> 
		<input type="hidden" name="id" value="<?php echo $row->id; ?>" /> 
		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="task" value="" /> 
		<?php echo JHTML::_( 'form.token' ); ?>
		</form> 
		<?php 
	}
	
	function showReviews( $option, &$rows, &$pageNav ) 
	{ 
	  ?> 
	  <form action="index.php" method="post" name="adminForm"> 
	  <table class="adminlist"> 
	    <thead> 
	      <tr> 
	        <th width="20"> 
	          <input type="checkbox" name="toggle" 
	               value="" onclick="checkAll(<?php echo 
	               count( $rows ); ?>);" /> 
	        </th> 
	        <th class="title">Name</th> 
	        <th width="15%">Address</th> 
	        <th width="10%">Reservations</th> 
	        <th width="10%">Cuisine</th> 
	        <th width="10%">Credit Cards</th> 
	        <th width="5%" nowrap="nowrap">Published</th> 
	      </tr> 
	    </thead> 
	    <?php
		jimport('joomla.filter.output');
	    $k = 0;
	    for ($i=0, $n=count( $rows ); $i < $n; $i++) 
	    {
			$row = &$rows[$i]; 
			$checked = JHTML::_('grid.id', $i, $row->id );
			$published = JHTML::_('grid.published', $row, $i );
			$link = JFilterOutput::ampReplace( 'index.php?option=' . $option . '&task=edit&cid[]='. $row->id );
	      ?> 
	      <tr class="<?php echo "row$k"; ?>"> 
	        <td> 
	          <?php echo $checked; ?> 
	        </td> 
	        <td>
			<a href="<?php echo $link; ?>"> 
	          <?php echo $row->name; ?></a>
	        </td> 
	        <td> 
	          <?php echo $row->address; ?> 
	        </td> 
	        <td> 
	          <?php echo $row->reservations; ?> 
	        </td>
	        <td> 
	          <?php echo $row->cuisine; ?> 
	        </td> 
	        <td> 
	          <?php echo $row->credit_cards; ?> 
	        </td> 
	        <td align="center"> 
	          <?php echo $published;?> 
	        </td> 
	      </tr> 
	      <?php 
	      $k = 1 - $k; 
	    } 
	    ?>
		<tfoot> 
		 <td colspan="7"><?php echo $pageNav->getListFooter(); ?></td> 
		</tfoot>
	  </table> 
	  <input type="hidden" name="option" value="<?php echo $option;?>" /> 
	  <input type="hidden" name="task" value="" /> 
	  <input type="hidden" name="boxchecked" value="0" /> 
	  <?php echo JHTML::_( 'form.token' ); ?>
	  </form> 
	  <?php 
	}
	
	function showComments( $option, &$rows, &$pageNav ) 
	{ 
	  ?> 
	  <form action="index.php" method="post" name="adminForm"> 
	  <table class="adminlist"> 
	    <thead> 
	      <tr> 
	        <th width="20"> 
	        <input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" /> 
	        </th> 
	        <th class="title">Review Name</th> 
	        <th width="15%">Commenter</th> 
	        <th width="20%">Comment Date</th> 
	        <th width="30%">Comment</th> 
	      </tr> 
	    </thead> 
	    <?php 
	    jimport('joomla.filter.output'); 
	    $k = 0; 
	    for ($i=0, $n=count( $rows ); $i < $n; $i++) { 
	      $row = &$rows[$i]; 
	      $checked = JHTML::_('grid.id', $i, $row->id ); 
	      $link = JFilterOutput::ampReplace( 'index.php?option=' . $option . '&task=editComment&cid[]='. $row->id ); 
	      ?>
		      <tr class="<?php echo "row$k"; ?>"> 
		        <td><?php echo $checked; ?></td> 
		        <td><a href="<?php echo $link; ?>"><?php echo $row->name; ?></a></td> 
		        <td><?php echo $row->full_name; ?></td> 
		        <td><?php echo JHTML::Date($row->comment_date); ?></td> 
		        <td><?php echo substr($row->comment_text, 0, 149); ?></td> 
		      </tr> 
		      <?php 
		      $k = 1 - $k; 
		    } 
		    ?> 
		  <tfoot> 
		    <td colspan="5"><?php echo $pageNav->getListFooter(); ?></td> 
		  </tfoot> 
		  </table> 
		  <input type="hidden" name="option" 
		                       value="<?php echo $option;?>" /> 
		  <input type="hidden" name="task" value="comments" /> 
		  <input type="hidden" name="boxchecked" value="0" /> 
		  <?php echo JHTML::_( 'form.token' ); ?>
		  </form> 
		  <?php  
	} 
	
	function editComment ($row, $option) 
	{ 
	  JHTML::_('behavior.calendar'); 
	  ?> 
	  <form action="index.php" method="post" name="adminForm" id="adminForm"> 
	    <fieldset class="adminform"> 
	      <legend>Comment</legend> 
	      <table> 
	      <tr> 
	        <td width="100" align="right" class="key"> 
	          Name: 
	        </td> 
	        <td> 
	          <input class="text_area" type="text" name="full_name" id="full_name" size="50" maxlength="250" value="<?php echo $row->full_name;?>" /> 
	        </td> 
	      </tr>
		      <tr> 
		        <td width="100" align="right" class="key"> 
		          Comment: 
		        </td> 
		        <td> 
		          <textarea class="text_area" cols="20" rows="4" name="comment_text" id="comment_text" style="width:500px"><?php echo $row->comment_text; ?></textarea> 
		        </td> 
		      </tr> 
		      <tr> 
		        <td width="100" align="right" class="key"> 
		          Comment Date: 
		        </td> 
		        <td>          
				  <?php echo JHTML::calendar($row->comment_date, 'comment_date', 'comment_date'); ?>
		        </td> 
		      </tr> 
		      </table> 
		    </fieldset> 
		    <input type="hidden" name="id" value="<?php echo $row->id; ?>" /> 
		    <input type="hidden" name="option" value="<?php echo $option; ?>" /> 
		    <input type="hidden" name="task" value="" /> 
			<?php echo JHTML::_( 'form.token' ); ?>
		  </form> 
		  <?php 
	}
}
?>