<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

class HTML_reviews
{
	function showReviews($rows, $option)
	{
		?><table><?php
		foreach($rows as $row)
		{
			$link = JRoute::_('index.php?option=' . $option . '&id=' . $row->id .  '&task=view');
			echo '<tr><td><a href="' . $link . '">' . $row->name . '</a></td></tr>';
		}
		?></table><?php
	}
	
	function showReview($row, $option) 
	{
		?> 
		<p class="contentheading"><?php echo $row->name; ?></p>
		<p class="createdate"><?php echo JHTML::Date($row->review_date); ?></p> 
		<p><?php echo $row->quicktake; ?></p> 
		<p><strong>Address:</strong> <?php echo $row->address; ?></p> 
		<p><strong>Cuisine:</strong> <?php echo $row->cuisine; ?></p> 
		<p><strong>Average dinner price:</strong> $<?php echo $row->avg_dinner_price; ?></p> 
		<p><strong>Credit cards:</strong> <?php echo $row->credit_cards; ?></p> 
		<p><strong>Reservations:</strong> <?php echo $row->reservations; ?></p> 
		<p><strong>Smoking:</strong> <?php 
			if($row->smoking == 0) 
			{ 
			  echo "No"; 
			} 
			else 
			{ 
			  echo "Yes"; 
			} 
		?></p>  
		<p><?php echo $row->review; ?></p> 
		<p><em>Notes:</em> <?php echo $row->notes;?></p>
		<?php $link = JRoute::_('index.php?option=' . $option) ; ?> 
		<a href="<?php echo $link; ?>">&lt; return to the reviews</a> 
		<?php 
	}
	
	function showCommentForm($option, $review_id, $name) 
	{
	  ?>
	  <p>&nbsp;</p>
	  <form action="<?php echo JRoute::_('index.php') ?>" method="post"> 
	  <table> 
	    <tr> 
	      <td> 
	        <strong>Name:</strong> 
	      </td> 
	      <td> 
	        <input class="text_area" type="text" name="full_name" 
	          id="full_name" value="<?php echo $name; ?>" /> 
	      </td> 
	    </tr> 
	    <tr> 
	      <td> 
	        <strong>Comment:</strong> 
	      </td> 
	      <td> 
	        <textarea class="text_area" cols="20" rows="4" 
	           name="comment_text" id="comment_text" 
	           style="width:500px"></textarea> 
	      </td> 
	    </tr>
	  </table>
	  <input type="hidden" name="review_id" value="<?php echo $review_id; ?>" />
	  <input type="hidden" name="task" value="comment" />
	  <input type="hidden" name="option" value="<?php echo $option; ?>" />
	  <input type="submit" class="button" id="button" value="Submit" />
	  </form> 
	  <?php 
	}
	
	function showComment($row) 
	{ 
		?> 
		<p>&nbsp;</p>
		<p><strong><?php echo $row->full_name; ?></strong> <em><?php echo JHTML::Date($row->comment_date); ?></em></p> 
		<p><?php echo $row->comment_text; ?></p> 
		<?php 
	}
}

?>