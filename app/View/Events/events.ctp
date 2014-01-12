
<h1>イベント</h1>
<table>
    <tr>
        <th>Id</th>
				<th>イベント種類</th>
        <th>場所</th>
        <th>日にち</th>
    </tr>

    <!-- ブログチュートリアル参考 -->

    <?php foreach ($events as $event): ?>
    <tr>
        <td><?php echo $event['Event']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($event['Event']['type_id'],
array('controller' => 'events', 'action' => 'view', $event['Event']['id'])); ?>
        </td>
				<td><?php echo $event['Event']['place']; ?></td>
        <td><?php echo $event['Event']['event_date']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($event); ?>
</table>