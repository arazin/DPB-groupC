<h1>新着イベント一覧</h1>

<?php if ($newgevents != NULL): ?>

<table>
    <tr>
        <th>タイトル</th>
        <th>日にち</th>
 				<th>場所</th>
 				<th>詳細</th>
 				<th>作成日</th>
 				<th>更新日</th>
    </tr>
    
       <?php foreach ($newgevents as $newgevent): ?>
        
    <tr>
        <td>

            <?php echo $this->Html->link($newgevent['Gevent']['title'],
array('controller' => 'gevents', 'action' => 'view', $newgevent['Gevent']['id'])); ?>
        </td>
        <td><?php echo $newgevent['Gevent']['gevent_date']; ?></td>
        <td><?php echo $newgevent['Gevent']['place']; ?></td>
        <td><?php echo $newgevent['Gevent']['detail']; ?></td>
        <td><?php echo $newgevent['Gevent']['created']; ?></td>
        <td><?php echo $newgevent['Gevent']['modified']; ?></td>
    </tr>
<?php endforeach; ?>
</table>
<?php endif; ?>


<br>
<h1>イベント一覧</h1>
<?php if ($oldgevents != NULL): ?>
<table>
    <tr>
        <th>タイトル</th>
        <th>日にち</th>
 				<th>場所</th>
 				<th>詳細</th>
 				<th>作成日</th>
 				<th>更新日</th>
    </tr>
    <?php foreach ($oldgevents as $oldgevent): ?>

    <tr>
        <td>
        
            <?php echo $this->Html->link($oldgevent['Gevent']['title'],
array('controller' => 'gevents', 'action' => 'view', $oldgevent['Gevent']['id'])); ?>
        </td>
        <td><?php echo $oldgevent['Gevent']['gevent_date']; ?></td>
        <td><?php echo $oldgevent['Gevent']['place']; ?></td>
        <td><?php echo $oldgevent['Gevent']['detail']; ?></td>
        <td><?php echo $oldgevent['Gevent']['created']; ?></td>
        <td><?php echo $oldgevent['Gevent']['modified']; ?></td>
    </tr>
<?php endforeach; ?>
</table>
<?php endif; ?>
