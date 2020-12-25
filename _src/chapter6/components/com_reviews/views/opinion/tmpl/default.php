<?php defined( '_JEXEC' ) or die( 'Restricted access' ); ?> 
<p class="contentheading"> 
  <?php echo $this->review->name; ?> 
</p> 
<p class="createdate"> 
  <?php echo $this->review->review_date; ?> 
</p> 
<p> 
  <?php echo $this->review->quicktake; ?> 
</p> 
<p> 
<strong>Address:</strong> <?php echo $this->review->address; ?> 
</p> 
<p><strong>Cuisine:</strong> 
  <?php echo $this->review->cuisine; ?> 
</p> 
<p><strong>Average dinner price:</strong> 
  $<?php echo $this->review->avg_dinner_price; ?> 
</p> 
<p><strong>Credit cards:</strong> 
  <?php echo $this->review->credit_cards; ?> 
</p> 
<p><strong>Reservations:</strong> 
  <?php echo $this->review->reservations; ?> 
</p> 
<p><strong>Smoking:</strong> 
  <?php echo $this->review->smoking ?> 
</p> 
<p> 
  <?php echo $this->review->review; ?> 
</p> 
<p><em>Notes:</em> 
  <?php echo $this->review->notes; ?> 
</p> 
<a href="<?php echo $this->backlink; ?>">&lt; return to the reviews </a>
<?php if(count($this->comments)) : ?> 
  <br /><br /> 
  <?php foreach($this->comments as $comment): ?> 
  <p><strong><?php echo $comment->full_name; ?></strong> <em><?php echo $comment->comment_date; ?></em></p> 
 <p> 
 <?php echo $comment->comment_text; ?> 
</p> 
 <?php endforeach; ?> 
<?php endif; ?> 
<br /><br /> 
<?php echo $this->loadTemplate('form'); ?>