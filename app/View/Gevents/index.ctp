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
    
       
        <?php for($i = 0; $i < $count; $i++): ?>
    <tr>
        <td>

            <?php echo $this->Html->link($newgevents[$i]['Gevent']['title'],
array('controller' => 'gevents', 'action' => 'view', $newgevents[$i]['Gevent']['id'])); ?>
        </td>
        <td><?php echo $newgevents[$i]['Gevent']['gevent_date']; ?></td>
        <td><?php echo $newgevents[$i]['Gevent']['place']; ?></td>
        <td><?php echo $newgevents[$i]['Gevent']['detail']; ?></td>
        <td><?php echo $newgevents[$i]['Gevent']['created']; ?></td>
        <td><?php echo $newgevents[$i]['Gevent']['modified']; ?></td>
    </tr>

</table>
<?php endfor ?>
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


    <tr>
        <td>
        <?php for($j = 0; $j < $oldcount; $j++): ?>
            <?php echo $this->Html->link($oldgevents[$j]['Gevent']['title'],
array('controller' => 'gevents', 'action' => 'view', $oldgevents[$j]['Gevent']['id'])); ?>
        </td>
        <td><?php echo $oldgevents[$j]['Gevent']['gevent_date']; ?></td>
        <td><?php echo $oldgevents[$j]['Gevent']['place']; ?></td>
        <td><?php echo $oldgevents[$j]['Gevent']['detail']; ?></td>
        <td><?php echo $oldgevents[$j]['Gevent']['created']; ?></td>
        <td><?php echo $oldgevents[$j]['Gevent']['modified']; ?></td>
    </tr>

</table>
<?php endfor ?>
<?php endif; ?>

