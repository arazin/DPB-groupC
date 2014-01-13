
<div class="container"> 
	<div class="row">  
		<div class="col-md-10 col-md-offset-1">
			<div class="certificates index">
				<table cellpadding="0" cellspacing="0" class="table  table-condensed">

					<h2>イベント一覧</h2>


					<?php if ($events != NULL): ?>

						<tr>
							<th>id</th>
							<th>event_date</th>
 							<th>place</th>
							<th>type</th>
							<th>action</th>
						</tr>
						
						<?php foreach ($events as $event): ?>
							
							<tr>
								<td>

									<?php echo $this->Html->link($event['Event']['id'],
																							 array('controller' => 'events_participants', 'action' => 'view', $event['Event']['id'])); ?>
								</td>
								<td><?php echo $event['Event']['event_date']; ?></td>
								<td><?php echo $event['Event']['place']; ?></td>
								<td><?php echo $event['Type']['type_name']; ?></td>
								<td><?php echo $this->Html->link('参加者追加', array(
											'action' => 'search', $event['Event']['id']),
											array('class' => 'btn-sm btn-info')
										); ?>
								<?php echo $this->Form->postLink(
											'説明会削除',
											array('action' => 'delete', $event['Event']['id']),
											array('confirm' => '本当に削除しますか？',
														'class' => 'btn-sm btn-danger'));
										?></td>
								
							</tr>
						<?php endforeach; ?>
				</table>

				<div class="paging">

					<?php
					echo $this->Paginator->first('first ');
					echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
					echo $this->Paginator->numbers(array('separator' => ''));
					echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
					echo $this->Paginator->last('last');
					?>
				</div>
			</div>
					<?php endif; ?>
					 <div class="actions">
					<h3><?php echo __('Actions'); ?></h3>
					<ul>

					<li><?php echo $this->Html->link(
						'説明会を追加する',
						array('controller' => 'EventsParticipants', 'action' => 'eventadd')
							); ?></li>

					</ul>
					</div> 


		</div>
	</div>
</div>
