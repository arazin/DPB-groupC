<h1>説明会一覧</h1>

<?php echo $this->Html->link(
    '説明会を追加する',
    array('controller' => 'events', 'action' => 'add')
); ?>

<?php if ($events != NULL): ?>

<table>
    <tr>
        <th>id</th>
        <th>日時</th>
 		<th>開催場所</th>
        <th>種類</th>
    </tr>
    
       <?php foreach ($events as $event): ?>
        
    <tr>
        <td><?php echo $event['Event']['id']; ?></td>
        <td><?php echo $event['Event']['event_date']; ?></td>
        <td><?php echo $event['Event']['place']; ?></td>
        <td><?php echo $event['Type']['type_name']; ?></td>
				<td><?php echo $this->Form->postLink(
              '削除',
              array('action' => 'delete', $event['Event']['id']),
              array('confirm' => '本当に削除してもいいですか？'));
            ?></td>
    </tr>
<?php endforeach; ?>
</table>
<?php endif; ?>

 <?php
    echo $this->Paginator->first('<< ');
    echo $this->Paginator->prev('< ');
    echo $this->Paginator->next(' >');
    echo $this->Paginator->last(' >>');
  ?>
