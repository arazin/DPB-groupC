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


    <tr>
        <td>
            <?php echo $this->Html->link($newgevents['Gevent']['title'],
array('controller' => 'gevents', 'action' => 'view', $newgevents['Gevent']['id'])); ?>
        </td>
        <td><?php echo $newgevents['Gevent']['gevent_date']; ?></td>
        <td><?php echo $newgevents['Gevent']['place']; ?></td>
        <td><?php echo $newgevents['Gevent']['detail']; ?></td>
        <td><?php echo $newgevents['Gevent']['created']; ?></td>
        <td><?php echo $newgevents['Gevent']['modified']; ?></td>
    </tr>

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


    <tr>
        <td>
            <?php echo $this->Html->link($oldgevents['Gevent']['title'],
array('controller' => 'gevents', 'action' => 'view', $oldgevents['Gevent']['id'])); ?>
        </td>
        <td><?php echo $oldgevents['Gevent']['gevent_date']; ?></td>
        <td><?php echo $oldgevents['Gevent']['place']; ?></td>
        <td><?php echo $oldgevents['Gevent']['detail']; ?></td>
        <td><?php echo $oldgevents['Gevent']['created']; ?></td>
        <td><?php echo $oldgevents['Gevent']['modified']; ?></td>
    </tr>

</table>
<?php endif; ?>

