
<h1>Add student</h1>
<?php
echo $this->Form->create('Student');
echo $this->Form->input('User.username',array('label'=>'ゆーざID'));
echo $this->Form->input('User.password',array('label'=>'ぱすわーど'));
echo $this->Form->input('User.name',array('label'=>'おなまえ'));
echo $this->Form->input('User.nationarity',array('label'=>'こくせき'));
echo $this->Form->input('User.prefecture',array('label'=>'とどうふけん'));
echo $this->Form->input('User.remain',array('label'=>'しくちょうそん・番地・など'));
echo $this->Form->input('User.postcord',array('label'=>'ゆうびんばんごう'));
echo $this->Form->input('User.phonenumber',array('label'=>'でんわばんごう'));

echo $this->Form->input('User.industry_id',array(
	'empty'=>'--ぎょうしゅをえらんでね--',
	'label'=>'ぎょうしゅ',
));

echo $this->Form->hidden('User.job',array('value'=>'大学生'));

echo $this->Form->input('User.birthday',array(
	'dateFormat'=>'YMD',
	'minYear'=>date('Y')-100,
	'maxYear'=>date('Y')-1,
	'monthNames'=>false,
	'label'=>'せいねんがっぴ',
));

echo $this->Form->input('User.sex',array(
	'empty' => '--せいべつをえらんでね--',
	'label' => 'せいべつ'
));
echo $this->Form->input('Student.grade',array(
	'empty' => '--がくねんをえらんでね--',
	'label' => 'がくねん'
));
echo $this->Form->input('Student.faculty_id',array(
	'label'=>'がくぶ',
	'empty'=>'--がくぶをえらんでね--'
));
echo $this->Form->input('Student.department_id',array(
	'label'=>'がっか',
	'empty'=>'--がっかをえらんでね--'
));
echo $this->Form->input('Student.labo_id',array(
	'label'=>'けんきゅうしつ',
	'empty'=>'--けんきゅうしつをえらんでね--'
));
echo $this->Form->input('Student.student_id',array(
	'type' => 'text',
	'maxLength' => 30,
	'div' => 'input text required',
	'label' => '学籍番号',
));

echo $this->Form->input('Student.guarantor_name',array(
	'label'=>'保証人氏名',
));

echo $this->Form->input('Student.guarantor_address',array(
	'label'=>'保証人住所',
));

echo $this->Form->input('Student.guarantor_contact',array(
	'label'=>'保証人連絡先',
));

echo $this->Form->input('Student.entrance_date',array(
	'dateFormat'=>'YMD',
	'minYear'=>date('Y')-100,
	'maxYear'=>date('Y')+1,
	'monthNames'=>false,
	'label'=>'入学年',
));



echo $this->Form->end('Add');


?>
