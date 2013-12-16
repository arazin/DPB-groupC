<h1>編集</h1>
<?php
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->create('Gevent');
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
