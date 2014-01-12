<h1>イベント一覧</h1>
<?php echo $this->Html->link(
    'イベント参加者情報を追加する',
    array('controller' => 'eventsparticipants', 'action' => 'add')
); ?>


<table>
    <tr>
        <th>id</th>
        <th>participant_id</th>
 				<th>event_id</th>
 	
    </tr>


    <?php foreach ($eventsparticipants as $eventsparticipant): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($eventsparticipant['EventsParticipant']['id'],
array('controller' => 'eventsparticipants', 'action' => 'view', $eventsparticipant['EventsParticipant']['id'])); ?>
        </td>
        <td><?php echo $eventsparticipant['EventsParticipant']['participant_id']; ?></td>
        <td><?php echo $eventsparticipant['EventsParticipant']['event_id']; ?></td>

        <td>
            <?php echo $this->Html->link('編集', array('action' => 'edit', $eventsparticipant['EventsParticipant']['id'])); ?>
            <?php echo $this->Form->postLink(
                '削除',
                array('action' => 'delete', $eventsparticipant['EventsParticipant']['id']),
                array('confirm' => '本当に削除してもいいですか？'));
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($eventsparticipant); ?>
</table>