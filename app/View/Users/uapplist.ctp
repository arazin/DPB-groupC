<h1>参加者リスト(未認証)</h1>
<?php pr($data);?>
<table>
	<?php echo $this->Paginator->pager(); ?>
<?php 
echo $this->Paginator->prev('< 前へ', array(), null, array('class' => 'prev disabled'));
echo $this->Paginator->numbers(array('separator' => ''));
echo $this->Paginator->next('次へ >', array(), null, array('class' => 'next disabled'));
?>
<tr>
	<th><?php echo "名前";?></th>
	<th><?php echo "国籍";?></th>
	<th><?php echo "性別";?></th>
	<th><?php echo "作成日";?></th>
	<th><?php echo "アクション";?></th>
</tr>
<?php foreach($data as $row):?>
	<tr>
		<td><?php echo h($row['User']['name']); ?></td>
		<td><?php echo h($row['User']['nationarity']); ?></td>
		<td><?php echo h($row['User']['sex']); ?></td>
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





