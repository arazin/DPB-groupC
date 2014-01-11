<!-- app View/Careers/add.ctp -->
<div class="careers form">
	<?php echo $this->Form->create('Career',array(
		'inputDefaults' => array(
			'div' => 'form-group',
			'wrapInput' => false,
			'class' => 'form-control',
		),
		'class' => 'well',
	));?>
	<fieldset>
		<legend><?php echo __('進路変更'); ?></legend>
		<?php 
		echo ('変更先を記入してください');
		echo $this->Form->input('belong',array(
			'label' => '所属'
		));
		echo $this->Form->input('posit',array(
			'label' => '役職'
		));
		echo $this->Form->input('special_report',array(
			'label'=>'その他特記事項',
		));
		echo $this->Form->input('Career.industry_id',array(
      'empty'=>'--業種を選んで下さい--',
      'label'=>'業種',
		));
		echo $this->Recaptcha->display();
		?>
		
	</fieldset>
	<?php echo $this->Form->end(__('submit')); ?>
</div>
