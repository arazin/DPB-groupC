﻿<h1>イベント一覧</h1>
<?php if ($user_gevents != NULL): ?>
<table>
    <tr>
				<th>新着情報</th>
        <th>タイトル</th>
        <th>日にち</th>
 				<th>場所</th>
 				<th>詳細</th>
 				<th>作成日</th>
 				<th>更新日</th>
    </tr> <?php $i = 0;?>
		

    <?php foreach($user_gevents as $user_gevent): ?>

    <tr> 
				<td><?php if($newflag[$i] == 1){echo "new";} ?></td>
        <td>
        
            <?php echo $this->Html->link($user_gevent['Gevent']['title'],
array('controller' => 'gevents', 'action' => 'view', $user_gevent['Gevent']['id'])); ?>
        </td>
        <td><?php echo $user_gevent['Gevent']['gevent_date']; ?></td>
        <td><?php echo $user_gevent['Gevent']['place']; ?></td>
        <td><?php echo $user_gevent['Gevent']['detail']; ?></td>
        <td><?php echo $user_gevent['Gevent']['created']; ?></td>
        <td><?php echo $user_gevent['Gevent']['modified']; ?></td>
    </tr>
	<?php $i++;?>
<?php endforeach; ?>
</table>
<?php endif; ?>


<?php
    echo $this->Paginator->first('最初 ');
    echo $this->Paginator->prev('前 ');
    echo $this->Paginator->numbers(
        array('separator' => '/','modulus'=>2));
    echo $this->Paginator->next(' 次');
    echo $this->Paginator->last(' 最後');
  ?>