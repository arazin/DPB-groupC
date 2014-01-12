<div class="container"> 
	<div class="row">  
		<div class="col-md-8">

			<h2>アカウント一覧・検索</h2>
			<br>
			<p>
				<?php echo $this->paginator->counter(array('format' => "%count%件ヒットしました")) ?>
			</p>
			<table cellpadding="0" cellspacing="0" class="table  table-condensed">
				<thead>
					<tr>
						<th>#</th>
						<th>名前</th>
						<th>グループ</th>
					</tr>
				</thead>
				<tbody>
					<?php
					/* usersの添字0をfor文に組込めばよい */
					/* $k は結果の数 */
					for($i=0, $k = 1; $i < count($users); $i++, $k++){
						echo "<tr>\n<td>{$k}</td>\n";
						echo "<td>{$this->Html->link($users[$i]['User']['name'],array(
			'controller' => 'users',
			'action' => 'view',
			$users[$i]['User']['id'],
		))}</td>\n";
						echo "<td>{$users[$i]['Group']['name']}</td>\n</tr>\n";
					}
					?>
				</tbody>
			</table>
		</div>

		<div class="col-md-4">
			<br><br><br>
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
				'class' => 'checkbox',
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

			<?php echo $this->Form->submit('検 索', array(
				'div' => 'form-group',
				'class' => 'btn btn-default'
			));?>


			<?php echo $this->Form->end(); ?>

		</div>
	</div>
</div>

<script type="text/javascript">
	window.onload = function(){document.getElementById('UserName').focus();}
</script>


