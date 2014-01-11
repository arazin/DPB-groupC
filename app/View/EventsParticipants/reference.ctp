<h1>あなたが参加したイベント一覧</h1>
<?php if ($events != NULL): ?>

<table>
    <tr>

        <th>event_date</th>
 		<th>place</th>
        <th>type</th>
    </tr>
    
       <?php foreach ($events as $event): ?>
        
    <tr>
        
        <td><?php echo $event['Event']['event_date']; ?></td>
        <td><?php echo $event['Event']['place']; ?></td>
        <td><?php echo $event['Type']['type_name']; ?></td>
        

    </tr>
<?php endforeach; ?>
</table>
<?php endif; ?>


