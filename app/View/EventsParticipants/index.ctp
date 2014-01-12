<h1>イベント一覧</h1>

<?php echo $this->Html->link(
    '説明会を追加する',
    array('controller' => 'events_participants', 'action' => 'eventadd')
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
        <td>

            <?php echo $this->Html->link($event['Event']['id'],
array('controller' => 'events_participants', 'action' => 'view', $event['Event']['id'])); ?>
        </td>
        <td><?php echo $event['Event']['event_date']; ?></td>
        <td><?php echo $event['Event']['place']; ?></td>
        <td><?php echo $event['Type']['type_name']; ?></td>
				<td><?php echo $this->Form->postLink(
              '説明会を削除',
              array('action' => 'delete', $event['Event']['id']),
              array('confirm' => '本当に削除してもいいですか？'));
            ?></td>
        <td><?php echo $this->Html->link('参加者を追加', array('action' => 'search', $event['Event']['id'])); ?></td>
				
    </tr>
<?php endforeach; ?>
</table>


<?php
    echo $this->Paginator->first('最初 ');
    echo $this->Paginator->prev('前 ');
    echo $this->Paginator->numbers(
        array('separator' => '/','modulus'=>2));
    echo $this->Paginator->next(' 次');
    echo $this->Paginator->last(' 最後');
  ?>

<?php endif; ?>