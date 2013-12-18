<?php
echo $this->Form->create('Graduate');
echo $this->Form->input('Graduate.garaduation_date',array(
	'dateFormat'=>'YMD',
	'minYear'=>date('Y')-70,
	'maxYear'=>date('Y')+1,
	'monthNames'=>false,
	'label'=>'修了日',
));
$msg=__('大学が確認するまでログインできなくなります。\nよろしいですか？\n');
echo $this->Form->submit('修了申請',array('onClick'=>"return confirm('$msg')"));
echo $this->Form->end();

?>
