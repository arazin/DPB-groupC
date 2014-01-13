<div class="container"> 
	<div class="row">  
		<div class="col-md-10 col-md-offset-1">


			<?php
			echo $this->Form->create('Participant',array(
				'inputDefaults' => array(
					'div' => 'form-group',
					'wrapInput' => false,
					'class' => 'form-control',
				),
				'class' => 'well',
			));


			echo $this->Form->input('User.new_password',array(
				'type' => 'password',
				'label'=>'新しいパスワード',
				'required' => false,
			));
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

			echo $this->Form->input('User.job',array('label'=>'職種'));

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

			echo $this->Form->input('Participant.curriculum_id',array(
				'empty' => '--課程を選んで下さい--',
				'label' => '志望課程'
			));
			echo $this->Form->input('Participant.course_id',array(
				'label'=>'志望コース',
				'empty'=>'--コースを選んで下さい--'
			));
			echo $this->Form->input('Participant.teacher_name',array(
				'label'=>'志望指導教員名',
			));
			echo $this->Form->end('更新');
			?>

		</div>
	</div>
</div>
