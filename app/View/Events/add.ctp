<h1>追加</h1>
<?php
echo $this->Form->create('Event');
echo $this->Form->input('event_date',array(
	'dateFormat'=>'YMD',
	'minYear'=>date('Y')-100,
	'maxYear'=>date('Y')+100,
	'monthNames'=>false,
	'label'=>'日にち',
));
echo $this->Form->input('place',array('label'=>'場所'));
echo "対象者";
echo $this->Form->select('type_id',
	array("1" => '一般向け',
		"2" => '高校生向け',
		"3" => '在学生向け',
		"4" => '修了生向け',
	)
	);
echo $this->Form->end('保存');
?>
