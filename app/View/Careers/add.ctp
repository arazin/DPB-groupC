<!-- app View/Careers/add.ctp -->
<div class="careers form">
<?php echo $this->Form->create('Careers');?>
	<fieldset>
		<legend><?php echo __('進路変更'); ?></legend>
		<?php 
		echo ('変更先を記入してください');
				echo $this->Form->input('belong');
				?>
				</fieldset>
	<?php echo $this->Form->end(__('submit')); ?>
	</div>