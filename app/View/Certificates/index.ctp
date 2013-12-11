<div class="certificates index">
    <h2><?php echo __('Certificates'); ?></h2>
    <table cellpadding="0" cellspacing="0">
    <tr>
            <th><?php echo $this->Paginator->sort('certificate_type'); ?></th>
            <th><?php echo $this->Paginator->sort('graduate_year'); ?></th>
            <th><?php echo $this->Paginator->sort('issue_num'); ?></th>
            <th><?php echo $this->Paginator->sort('purpose'); ?></th>
            <th><?php echo $this->Paginator->sort('address'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($certificates as $graduate_id): ?>
    <tr>
        <td><?php echo h($user['Certificate']['certificate_type']); ?>&nbsp;</td>
        <td><?php echo h($user['Certificate']['graduate_year']); ?>&nbsp;</td>
        <td><?php echo h($user['Certificate']['issue_num']); ?>&nbsp;</td>
        <td><?php echo h($user['Certificate']['purpose']); ?>&nbsp;</td>
        <td><?php echo h($user['Certificate']['address']); ?>&nbsp;</td>
        </td>
    </tr>
<?php endforeach; ?>
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
        <li><?php echo $this->Html->link(__('修了証発行'), array('action' => 'add')); ?></li>
    </ul>
</div>

