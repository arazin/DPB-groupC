<h2>ユーザー情報検索</h2>

<legend>検索</legend>
<?php echo $this->Form->create('User',array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control',
	),
	'class' => 'well',
));?>

<?php echo $this->Form->input('User.name',array(
	'label' => '名前',
	'required' => false,
));?>

<?php echo $this->Form->input('User.group_id',array(
	'label' => 'ロール',
	'multiple' => 'checkbox',
)); ?>
<?php echo $this->Form->end('検索'); ?>


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
