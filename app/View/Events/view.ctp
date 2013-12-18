<!-- CSS -->
<?php echo $this->Html->css('bootstrap'); ?> 

<!-- event view -->

<h1>現状イベントの種類番号を表示させる→<?php echo h($event['Event']['type_id']); ?></h1>

<p>日時: <?php echo $event['Event']['event_date']; ?></p>

<h2>場所 →<?php echo h($event['Event']['place']); ?></h2>

<!-- リンク先が分からなかったので現状TOPにリンク飛ばします。 -->
<?php echo $this->Html->link('参加', '/users/top',array('class' => 'btn btn-success')); ?>