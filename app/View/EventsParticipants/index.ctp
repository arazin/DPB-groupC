﻿<h1>イベント一覧</h1>
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
array('controller' => 'EventsParticipants', 'action' => 'view', $event['Event']['id'])); ?>
        </td>
        <td><?php echo $event['Event']['event_date']; ?></td>
        <td><?php echo $event['Event']['place']; ?></td>
        <td><?php echo $event['Type']['type_name']; ?></td>
        <td><?php echo $this->Html->link('追加', array('action' => 'search', $event['Event']['id'])); ?></td>

    </tr>
<?php endforeach; ?>
</table>
<?php endif; ?>