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


<?php
    echo $this->Paginator->first('最初 ');
    echo $this->Paginator->prev('前 ');
    echo $this->Paginator->numbers(
        array('separator' => '/','modulus'=>2));
    echo $this->Paginator->next(' 次');
    echo $this->Paginator->last(' 最後');
  ?>

<?php endif; ?>