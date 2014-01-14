<!-- app View/Certificates/add.ctp -->
<div class="container"> 
	<div class="row">  
		<div class="col-md-8 col-md-offset-2" >

			<div class="certificatsr form">
				<fieldset>				
				<?php echo $this->Form->create('Certificate',array(
				'inputDefaults' => array(
					'div' => 'form-group',
					'class' => 'form-control',
				),
				'class' => 'well',
			));?>

					<legend><?php echo __('修了書発行'); ?></legend>
					<?php echo $this->Form->input('certificate_type',array(
						'options' => array('学士' => '学士','博士前期' => '博士前期', '博士後期' => '博士後期'),
						'label' => '証明所種類'
					));
					
					echo $this->Form->input('graduate_year',array(
						'label' => '卒業年'
					));
					echo $this->Form->input('issue_num',array(
						'label' => '発行枚数'
					));
					echo $this->Form->input('purpose',array(
						'label' => '使用目的'
					));
					echo $this->Form->input('address',array(
						'label' => '送り先(登録住所と異なる場合)',
						'required' => false,
					));
					echo $this->Recaptcha->display();
					?>



				<?php echo $this->Form->end(__('発行')); ?>
				</fieldset>
			</div>

		</div>
	</div>
</div>

<script type="text/javascript">
	window.onload = function(){document.getElementById('CertificateCertificateType').focus();}
</script>

