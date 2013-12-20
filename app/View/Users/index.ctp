<div class="container"> 
<div class="row">  
<div class="col-md-9 col-md-offset-1">


<h1>ユーザー検索</h1>

<?php
echo $this->Form->create('Student',array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control',
	),
	'class' => 'well form-inline',
));

echo $this->Form->input('User.name',array('label'=>'名前'));
echo $this->Form->input('User.nationarity',array('label'=>'国籍'));
echo $this->Form->input('User.postcord',array('label'=>'郵便番号'));
echo $this->Form->input('User.prefecture',array('label'=>'都道府県'));
echo $this->Form->input('User.remain',array('label'=>'市区町村));

echo $this->Form->input('User.industry_id',array(
	'empty'=>'--業種を選んで下さい--',
	'label'=>'業種',
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

echo $this->Form->input('Student.grade',array(
	'empty' => '--学年を選んで下さい--',
	'label' => '学年'
));

echo $this->Form->input('Student.faculty_id',array(
	'label'=>'学部',
	'empty'=>'--学部を選んで下さい--'
));

echo $this->Form->input('Student.department_id',array(
	'label'=>'学科',
	'empty'=>'--学科を選んで下さい--'
));

echo $this->Form->input('Student.labo_id',array(
	'label'=>'研究室',
	'empty'=>'--研究室を選んで下さい--'
));

echo $this->Form->input('Student.student_id',array(
	'type' => 'text',
	'maxLength' => 30,
	'div' => 'input text required',
	'label' => '学籍番号',
));

echo $this->Form->submit('検 索', array(
	'div' => 'form-group',
	'class' => 'btn btn-default'
));

echo $this->Form->end();

?>


<br><br>

<h2>ユーザー情報一覧</h2>
<table>
<tr>
	<th>ID</th>
	<th>名前</th>
	<th>郵便番号</th>
	<th>都道府県</th>
	<th>市町村</th>
	<th>国籍</th>
	<th>電話番号</th>
	<th>職業</th>
	<th>年齢</th>
	<th>生年月日</th>
	<th>性別</th>
</tr>
<?php
	for($i=0; $i<count($users);$i++){

		$arr = $users[$i]['User'];

		echo "<tr><td>{$arr['id']}</td>";
		echo "<td>{$arr['name']}</td>";
		echo "<td>{$arr['postcord']}</td>";
		echo "<td>{$arr['prefecture']}</td>";
		echo "<td>{$arr['remain']}</td>";
		echo "<td>{$arr['nationarity']}</td>";
		echo "<td>{$arr['phonenumber']}</td>";
		echo "<td>{$arr['job']}</td>";
		echo "<td>{$arr['industry_id']}</td>";
		echo "<td>{$arr['birthday']}</td>";
		echo "<td>{$arr['sex']}</td>";
	}
 ?>
</table>

</div></div></div>

