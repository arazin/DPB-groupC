<div class="container"> 
	<div class="row">  
		<div class="col-md-10 col-md-offset-1">

			<h2><?php echo h($oneuser['User']['name']) ?>さんの情報</h2>
			<h3>基本情報</h3>
			<table class="table table-striped table-bordered">
				<tr>
					<th> 氏名</th>
					<td><?php echo h($oneuser['User']['name']) ?></td>
				</tr>
					<th> ID</th>
					<td><?php echo h($oneuser['User']['username']) ?></td>
				</tr>
				<tr>
					<th> 生年月日</th>
					<td><?php echo h($oneuser['User']['birthday']) ?></td>
				</tr>
				<tr>
					<th> 郵便番号</th>
					<td><?php echo h($oneuser['User']['postcord']) ?></td>
				</tr>
				<tr>
					<th> 住所</th>
					<td>
							<?php echo h($oneuser['User']['prefecture']) ?>
							<?php echo h($oneuser['User']['remain']) ?>
					</td>
				</tr>
				<tr>
					<th> 電話番号</th>
					<td><?php echo h($oneuser['User']['phonenumber']) ?></td>
				</tr>
					<th> グループ</th>
					<td><?php echo h($oneuser['Group']['name']) ?></td>
				</tr>
			</table>

			<?php echo $this->Form->postLink(
				$oneuser['User']['name'] .' さんを 削除',
				array('action' => 'delete',$oneuser['User']['id']),
				array('confirm' => $oneuser['User']['name'] . 'さんを削除しますか？',
					'class' => 'btn btn-danger',)
				);
			?>



<?php
pr($oneuser);
?>

		</div>
	</div>
</div>
