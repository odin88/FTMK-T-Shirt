<div class="orders form">
<?php echo $this->Form->create('Order', array('action' => 'order'));?>
	<fieldset>
		<legend><?php echo __('Order'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('no_matric');
		echo $this->Form->input('contact_no');
		echo $this->Form->input('email');
		echo $this->Form->input('size_id');
		#echo $this->Form->input('status_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>

