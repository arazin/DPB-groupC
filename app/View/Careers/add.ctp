<!-- app View/Careers/add.ctp -->
<div class="careers form">
<?php echo $this->Form->create('Careers');?>
	<fieldset>
		<legend><?php echo __('進路変更'); ?></legend>
		<?php 
		echo ('変更先を記入してください');
				echo $this->Form->input('belong');
				echo $this->Form->input('posit');
				echo $this->Form->input('special report');
				echo $this->Form->input('Career.industry_id',array(
        'empty'=>'--業種を選んで下さい--',
        'label'=>'業種',
));
				?>
				</fieldset>
	<?php echo $this->Form->end(__('submit')); ?>
	</div>