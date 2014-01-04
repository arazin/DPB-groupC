<div class="container"> 
<div class="row">  
<div class="col-md-7">

<h2>情報一覧・検索</h2>

<p>
	<table class="table table-striped table-bordered table-condensed">
	<tr>
		<th>#</th>
		<th>名前</th>
		<th>グループ</th>
	</tr>

	<?php
	/* usersの添字0をfor文に組込めばよい */
	/* $k は結果の数 */
	for($i=0, $k = 1; $i < count($users); $i++, $k++){
		echo "<td>{$k}</td>";

		echo "<td>{$this->Html->link($users[$i]['User']['name'],array(
			'controller' => 'users',
			'action' => 'view',
			$users[$i]['User']['id'],
		))}</td>";

		echo "<td>{$users[$i]['Industry']['industry_name']}</td>";
/*
		echo "<td>{$this->Form->postLink(
		$users[$i]['User']['name'] .'を削除',
		array('action' => 'delete',$users[$i]['User']['id']),
		array('confirm' => $users[$i]['User']['name'] . 'さんを削除しますか？',
					'class' => 'btn btn-danger',)
		)}</td>";
*/
	}
?>
</table>
</p>
</div>

<div class="col-md-5">

<legend>検索</legend>
<?php echo $this->Form->create('User',array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control',
	),
	'url' => '/users/',
	'class' => 'well',
));?>


<?php echo $this->Form->input('User.group_id',array(
	'label' => 'グループ',
	'multiple' => 'checkbox',
	'class' => 'checkbox-inline',
	'required' => false,
)); ?>

<?php echo $this->Form->input('User.name',array(
	'label' => '名前',
	'required' => false,
));?>

<?php echo $this->Form->input('User.nationarity',array(
	'label' => '国籍',
	'required' => false,
));?>

<?php echo $this->Form->input('User.prefecture',array(
	'label' => '都道府県',
	'required' => false,
));?>

<?php echo $this->Form->input('User.remain',array(
	'label' => '市区町村',
	'required' => false,
));?>

<?php echo $this->Form->end('検索'); ?>

</div></div></div>

