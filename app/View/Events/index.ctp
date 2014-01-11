<h1>イベント一覧</h1>

<?php echo $this->Html->link(
    'イベントを追加する',
    array('controller' => 'events', 'action' => 'add')
); ?>

<?php if ($events != NULL): ?>

<table>
    <tr>
        <th>id</th>
        <th>event_date</th>
 		<th>place</th>
        <th>type</th>
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
