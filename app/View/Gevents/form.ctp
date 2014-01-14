<div class="container"> 
	<div class="row">  
		<div class="col-md-10 col-md-offset-1">
			<h1>修了生向けイベント</h1>
			<div class="certificates index">

				<table cellpadding="0" cellspacing="0" class="table  table-condensed">

					

					<div class="actions">
						<h3><?php echo __('Actions'); ?></h3>
						<ul>
							<li>
								<?php echo $this->Html->link(
									'イベントを追加する',
									array('controller' => 'gevents', 'action' => 'add')
								); ?>
							</li>
						</ul>
					</div>

					<h3>一覧</h3>

					<?php if ($gevents != NULL): ?>
						<thead>

							<tr>
								<th>タイトル</th>
								<th>日時</th>
 								<th>場所</th>
								<th>アクション</th>
							</tr>

						</thead>
						<?php foreach ($gevents as $gevent): ?>
							<tr>
								<td>
									<?php echo $this->Html->link($gevent['Gevent']['title'],
																							 array('controller' => 'gevents', 'action' => 'view', $gevent['Gevent']['id'])); ?>
								</td>
								<td><?php echo $gevent['Gevent']['gevent_date']; ?></td>
								<td><?php echo $gevent['Gevent']['place']; ?></td>
								<td>
									<?php echo $this->Html->link('編集', array(
										'action' => 'edit', $gevent['Gevent']['id']),
																							 array('class' => 'btn-sm btn-primary')
																							 ); ?>
									<?php echo $this->Form->postLink(
										'削除',
										array('action' => 'delete', $gevent['Gevent']['id']),
										array('confirm' => '本当に削除してもいいですか？',
													'class' => 'btn-sm btn-danger'
													));
									?>
								</td>
							</tr>
						<?php endforeach; ?>
						<?php unset($gevent); ?>
				</table>
				<p>
					<?php
					echo $this->Paginator->counter(array(
						'format' => __(' ページ {:page} / {:pages}、  {:count} 件中 {:current} 件 表示しています。  {:start}から{:end}')
					));
					?>   </p>
				<?php
				echo $this->Paginator->pagination(array(
					'ul' => 'pagination'));
				?>
					<?php endif; ?>
			</div>
		</div>
	</div>
</div>

