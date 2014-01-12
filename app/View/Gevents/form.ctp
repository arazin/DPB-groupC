<h1>イベント一覧</h1>


<?php echo $this->Html->link(
    'イベントを追加する',
    array('controller' => 'gevents', 'action' => 'add')
); ?>

<?php if ($gevents != NULL): ?>

<table>
    <tr>
        <th>タイトル</th>
        <th>日にち</th>
 				<th>場所</th>
 				<th>詳細</th>
 				<th>作成日</th>
 				<th>更新日</th>
    </tr>


    <?php foreach ($gevents as $gevent): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($gevent['Gevent']['title'],
array('controller' => 'gevents', 'action' => 'view', $gevent['Gevent']['id'])); ?>
        </td>
        <td><?php echo $gevent['Gevent']['gevent_date']; ?></td>
        <td><?php echo $gevent['Gevent']['place']; ?></td>
        <td><?php echo $gevent['Gevent']['detail']; ?></td>
        <td><?php echo $gevent['Gevent']['created']; ?></td>
        <td><?php echo $gevent['Gevent']['modified']; ?></td>
        <td>
            <?php echo $this->Html->link('編集', array('action' => 'edit', $gevent['Gevent']['id'])); ?>
            <?php echo $this->Form->postLink(
                '削除',
                array('action' => 'delete', $gevent['Gevent']['id']),
                array('confirm' => '本当に削除してもいいですか？'));
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($gevent); ?>
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