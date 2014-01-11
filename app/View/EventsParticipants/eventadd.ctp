<div class="container"> 
	<div class="row">  
		<div class="col-md-10 col-md-offset-1">

			<h1>説明会登録フォーム</h1>
			<?php
			echo $this->Form->create('Event',array(
				'inputDefaults' => array(
					'div' => 'form-group',
					'wrapInput' => false,
					'class' => 'form-control',
				),
				'class' => 'well',
			));


			echo $this->Form->input('event_date',array(
				'dateFormat'=>'YMD',
				'minYear'=>date('Y')-10,
				'maxYear'=>date('Y')+20,
				'monthNames'=>false,
				'label'=>'日にち',
			));
			echo $this->Form->input('place',array('label'=>'場所'));

			echo $this->Form->input('type_id',array(
				'label' => '種類',
				'empty' => '--種類を選んで下さい--',
			));

			echo $this->Form->end('保存');
			?>
		</div>
	</div>
</div>

