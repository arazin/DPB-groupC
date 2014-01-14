<h1>参加者リスト(未認証)</h1>
<?php pr($data);?>
<table>
	<?php echo $this->Paginator->pager(); ?>
<tr>
	<th><?php echo "名前";?></th>
	<th><?php echo "国籍";?></th>
	<th><?php echo "作成日";?></th>
	<th><?php echo "アクション";?></th>
</tr>
<?php foreach($data as $row):?>
	<tr>
		<!-- <td><?php echo h($row['User']['name']); ?></td> -->
		<td><?php echo $this->Html->link($row['User']['name'],array(
					'controller' => 'users',
					'action' => 'view',
					$row['User']['id'],)
				); ?></td>

		<td><?php echo h($row['User']['nationarity']); ?></td>
		<td><?php echo h($row['User']['created']); ?></td>
		<td>
		<?php echo $this->Form->postLink(
			'認証',
			array('action' => 'approve', h($row['User']['id']),),
			array('confirm' => 'この参加者を認証します。\nよろしいですか？')
			);
		?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>





