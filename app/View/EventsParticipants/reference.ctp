<div class="container"> 
	<div class="row">  
		<div class="col-md-10 col-md-offset-1">
			<h1>あなたが参加したイベント一覧</h1>
			<div class="certificates index">
				<table cellpadding="0" cellspacing="0" class="table  table-condensed">
					<?php if ($events != NULL): ?>
							<tr>

								<th>日時</th>
 								<th>場所</th>
								<th>種類</th>
							</tr>
							
							<?php foreach ($events as $event): ?>
								
								<tr>
									
									<td><?php echo $event['Event']['event_date']; ?></td>
									<td><?php echo $event['Event']['place']; ?></td>
									<td><?php echo $event['Type']['type_name']; ?></td>
									

								</tr>
							<?php endforeach; ?>
						</table>
						<?php
						echo $this->Paginator->pagination(array(
							'ul' => 'pagination'));
						?>
						

					<?php endif; ?>
			</div>
	</div>
</div>

