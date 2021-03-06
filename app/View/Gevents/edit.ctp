﻿<div class="container"> 
	<div class="row">  
		<div class="col-md-10 col-md-offset-1">
			<h1>編集</h1>
			<?php
			echo $this->Form->input('id', array('type' => 'hidden'));
			echo $this->Form->create('Gevent',array(
				'inputDefaults' => array(
					'div' => 'form-group',
					'wrapInput' => false,
					'class' => 'form-control',
				),
				'class' => 'well',
			));
			echo $this->Form->input('title',array('label'=>'タイトル'));
			echo $this->Form->input('gevent_date',array(
				'dateFormat'=>'YMD',
				'minYear'=>date('Y'),
				'maxYear'=>date('Y')+100,
				'monthNames'=>false,
				'label'=>'日にち',
			));
			echo $this->Form->input('place',array('label'=>'場所'));
			echo $this->Form->input('detail',array('label'=>'詳細'));
			echo $this->Form->end('保存');
			?>
		</div>
	</div>
</div>
