<h1>追加</h1>
<?php


echo $this->Form->create('EventsParticipant');

echo $this->Form->label('participant_id', '参加者ID');
echo $this->Form->select('participant_id', $participant_ids);

echo $this->Form->label('event_id', 'イベントID');
echo $this->Form->select('event_id', $event_ids);

echo $this->Form->end('保存');
?>

