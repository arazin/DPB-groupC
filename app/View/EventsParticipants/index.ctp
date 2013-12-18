<h1>参加イベント一覧</h1>
<?php if ($myparticipants != NULL): ?>

<table>
    <tr>
        <th>id</th>
        <th>participant_id</th>
 				<th>event_id</th>

    </tr>
    
       <?php foreach ($myparticipants as $myparticipant): ?>
        
    <tr>
        <td>

            <?php echo $this->Html->link($myparticipant['EventsParticipant']['id'],
array('controller' => 'eventsparticipants', 'action' => 'view', $myparticipant['EventsParticipant']['id'])); ?>
        </td>
        <td><?php echo $myparticipant['EventsParticipant']['participant_id']; ?></td>
        <td><?php echo $myparticipant['EventsParticipant']['event_id']; ?></td>

    </tr>
<?php endforeach; ?>
</table>
<?php endif; ?>


