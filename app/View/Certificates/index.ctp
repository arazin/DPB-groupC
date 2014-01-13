
<div class="container"> 
	<div class="row">  
		<div class="col-md-10 col-md-offset-1">

			<div class="certificates index">
				<table cellpadding="0" cellspacing="0" class="table  table-condensed">
					<!-- <tr>
					<th><?php echo $this->Paginator->sort('id',''); ?></th>
					<th><?php echo $this->Paginator->sort('graduate_id'); ?></th>
					<th><?php echo $this->Paginator->sort('certificate_type'); ?></th>
					<th><?php echo $this->Paginator->sort('graduate_year'); ?></th>
					<th><?php echo $this->Paginator->sort('issue_num'); ?></th>
					<th><?php echo $this->Paginator->sort('purpose'); ?></th>
					<th><?php echo $this->Paginator->sort('address'); ?></th>

					<th class="actions"><?php echo __('Actions'); ?></th>
					</tr> -->

					<h2>証明書発行申請</h2>
					<table>
						<tr>
							<th>申請者氏名</th>
							<th>コース</th>
							<th>卒業年度</th>
							<th>発行枚数</th>
							<th>目的</th>
							<th>送り先</th>
							<th>消去</th>
						</tr>

						<?php
						for($i=0; $i<count($certificates);$i++){
						echo "<tr>";
							$arr = $certificates[$i]['Certificate'];
							echo "<td>{$certificates[$i]['Graduate']['User']['name']}</td>";
							echo "<td>{$arr['certificate_type']}</td>";
							echo "<td>{$arr['graduate_year']}</td>";
							echo "<td>{$arr['issue_num']}</td>";
							echo "<td>{$arr['purpose']}</td>";
							echo "<td>{$arr['address']}</td>";
							echo "<td>{$this->Form->postLink('削除',
		array('action' => 'delete',$arr['id']),
		array('confirm' => '本当に削除しますか？',
					'class' => 'btn btn-danger',)
					)}</td>";
					echo "</tr>";
						}
						?>

				</table>
				<p>
					<?php
					echo $this->Paginator->counter(array(
						'format' => __(' ページ {:page} / {:pages}、  {:count} 件中 {:current} 件 表示しています。  {:start}から{:end}')
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

			<!-- <div class="actions">
			<h3><?php echo __('Actions'); ?></h3>
			<ul>
			<li><?php echo $this->Html->link(__('New Certificates'), array('action' => 'add')); ?></li>
			</ul>
			</div> -->

