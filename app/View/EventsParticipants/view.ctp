<div class="container"> 
	<div class="row">  
		<div class="col-md-10 col-md-offset-1">
			<div class="certificates index">
				<table cellpadding="0" cellspacing="0" class="table  table-condensed">

					<h2>参加者一覧</h2>
					<?php if ($participants != NULL): ?>
						<thead>
							<tr>
								<th>名前</th>
								<th>国名</th>
 								<th>県名</th>
 								<th>住所</th>
 								<th>郵便番号</th>
 								<th>電話番号</th>
 								<th>仕事</th>
 								<th>誕生日</th>
 								<th>性別</th>
							</tr>
						</thead>
						<tbody>						
						<?php foreach ($participants as $participant): ?>

								<tr>
									<td><?php echo $participant['User']['name']; ?></td>
									<td><?php echo $participant['User']['nationarity']; ?></td>
									<td><?php echo $participant['User']['prefecture']; ?></td>
									<td><?php echo $participant['User']['remain']; ?></td>
									<td><?php echo $participant['User']['postcord']; ?></td>
									<td><?php echo $participant['User']['phonenumber']; ?></td>
									<td><?php echo $participant['User']['job']; ?></td>
									<td><?php echo $participant['User']['birthday']; ?></td>
									<td><?php if($participant['User']['sex'] == 1){
        								echo ("女");}
        							else{echo ("男");}
        							?></td>
								</tr>

						<?php endforeach; ?>
						</tbody>
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
				</div>
									<?php endif; ?>
