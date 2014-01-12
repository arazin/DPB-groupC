<div class="container"> 
	<div class="row">  
		<div class="col-md-10 col-md-offset-1">
			<h1>アカウント情報編集</h1>
			<?php
			echo $this->Form->create('User',array(
				'inputDefaults' => array(
					'div' => 'form-group',
					'wrapInput' => false,
					'class' => 'form-control',
				),
				'class' => 'well',
			));

			echo $this->Form->input('User.new_password',array(
				'type' => 'password',
				'label' => '新しいパスワード',
				'required' => true,
			));
			echo $this->Form->input('User.password3',array(
				'type' => 'password',
				'label' => 'もう一度入力してください',
			));

			echo $this->Form->end('変更');

			?>
		</div>
	</div>
</div>
