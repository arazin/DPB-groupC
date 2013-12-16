<!-- app View/Certificates/add.ctp -->
<div class="certificatsr form">
<?php echo $this->Form->create('Certificate');?>
	<fieldset>
		<legend><?php echo __('修了書発行'); ?></legend>
				<?php echo $this->Form->input('certificate_type',array(
					'options' => array('学士' => '学士','博士前期' => '博士前期', '博士後期' => '博士後期')));
				echo $this->Form->input('graduate_year');
				echo $this->Form->input('issue_num');
				echo $this->Form->input('purpose');
				echo $this->Form->input('address');
				?>
				</fieldset>
	<?php echo $this->Form->end(__('発行')); ?>
	</div>