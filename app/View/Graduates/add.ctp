<div class="container"> 
	<div class="row">  
		<div class="col-md-8 col-md-offset-2">

			<h1>修了生登録フォーム</h1>
			<?php
			echo $this->Form->create('Student',array(
				'inputDefaults' => array(
					'div' => 'form-group',
					'wrapInput' => false,
					'class' => 'form-control',
				),
				'class' => 'well',
			));
			echo $this->Form->input('User.username',array('label'=>'ユーザーID'));
			echo $this->Form->input('User.password',array('label'=>'パスワード'));
			echo $this->Form->input('User.password2',array('type'=>'password','label'=>'パスワード再入力'));
			echo $this->Form->input('User.name',array('label'=>'お名前'));
			echo $this->Form->input('User.nationarity',array('label'=>'国籍'));
			echo $this->Form->input('User.postcord',array('label'=>'郵便番号'));
			echo $this->Form->input('User.prefecture',array('label'=>'都道府県'));
			echo $this->Form->input('User.remain',array('label'=>'市区町村・番地・その他'));
			echo $this->Form->input('User.phonenumber',array('label'=>'電話番号'));

			echo $this->Form->input('User.industry_id',array(
				'empty'=>'--業種を選んで下さい--',
				'label'=>'業種',
			));

			echo $this->Form->input('User.job',array(
				'label' => '職種'
			));

			echo $this->Form->input('User.birthday',array(
				'dateFormat'=>'YMD',
				'minYear'=>date('Y')-100,
				'maxYear'=>date('Y')-1,
				'monthNames'=>false,
				'label'=>'生年月日',
			));

			echo $this->Form->input('User.sex',array(
				'empty' => '--性別を選んで下さい--',
				'label' => '性別'
			));

			echo $this->Form->input('Graduate.garaduation_date',array(
				'dateFormat'=>'YMD',
				'minYear'=>date('Y')-70,
				'maxYear'=>date('Y')+1,
				'monthNames'=>false,
				'label'=>'修了日',
			));

			echo $this->Form->end('Add');
			?>
		</div>
	</div>
</div>

<script type="text/javascript">
	window.onload = function(){document.getElementById('UserUsername').focus();}
</script>

