<div class="certificates index">
    <h2><?php echo __('Certificates'); ?></h2>
    <table cellpadding="0" cellspacing="0">
    <tr>
            <th><?php echo $this->Paginator->sort('user_id'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('password'); ?></th>
            <th><?php echo $this->Paginator->sort('role'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>

<h2>証明書発行</h2>
<table>
<tr>
	<th>ID</th>
	<th>卒業ID</th>
	<th>コース</th>
	<th>卒業年度</th>
	<th>発行枚数</th>
	<th>目的</th>
	<th>住所</th>
</tr>
<?php
	for($i=0; $i<count($certificates);$i++){

		$arr = $certificates[$i]['Certificate'];

		echo "<tr><td>{$arr['id']}</td>";
		echo "<td>{$arr['graduate_id']}</td>";
		echo "<td>{$arr['certificate_type']}</td>";
		echo "<td>{$arr['graduate_year']}</td>";
		echo "<td>{$arr['issue_num']}</td>";
		echo "<td>{$arr['purpose']}</td>";
		echo "<td>{$arr['address']}</td>";
	}
 ?>
</table>
    </table>
    <p>
    <?php
    echo $this->Paginator->counter(array(
    'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
    ));
    ?>   </p>
    <div class="paging">
    <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
    ?>
    </div>
</div>

<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
    </ul>
</div>

