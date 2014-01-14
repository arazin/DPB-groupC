<div class="container"> 
	<div class="row">  
		<div class="col-md-10 col-md-offset-1">

			<h2><?php echo h($oneuser['User']['name']) ?>さんの情報</h2>

			<table class="table table-striped table-bordered">
				<tr>
					<th> 氏名</th>
					<td><?php echo h($oneuser['User']['name']) ?></td>
				</tr>
					<th> ID</th>
					<td><?php echo h($oneuser['User']['username']) ?></td>
				</tr>
				<tr>
					<th> 生年月日</th>
					<td><?php echo h($oneuser['User']['birthday']) ?></td>
				</tr>
				<tr>
					<th> 郵便番号</th>
					<td><?php echo h($oneuser['User']['postcord']) ?></td>
				</tr>
				<tr>
					<th> 住所</th>
					<td>
							<?php echo h($oneuser['User']['prefecture']) ?>
							<?php echo h($oneuser['User']['remain']) ?>
					</td>
				</tr>
				<tr>
					<th> 電話番号</th>
					<td><?php echo h($oneuser['User']['phonenumber']) ?></td>
				</tr>

				<?php if(isset($studentuser)){ ?>
					<tr>
						<th> 学部</th>
						<td><?php echo h($studentuser['Faculty']['faculty_name']) ?></td>
					</tr>
					<tr>
						<th> 学科</th>
						<td>
							<?php echo h($studentuser['Department']['department_name']) ?>
						</td>
					</tr>
					<tr>
						<th> 研究室</th>
						<td><?php echo h($studentuser['Labo']['labo_name']) ?></td>
					</tr>
				<?php }else if(($participantuser)){ ?>
					<tr>
						<th> 志望課程</th>
						<td>
							<?php echo h($participantuser['Curriculum']['curriculum_name']) ?>
						</td>
					</tr>
					<tr>
						<th> 志望コース</th>
						<td><?php echo h($participantuser['Course']['course_name']) ?></td>
					</tr>
					<tr>
						<th> 志望指導教員</th>
						<td>
							<?php echo h($participantuser['Participant']['teacher_name']) ?>
						</td>
					</tr>
/* 上手く作れないから保留
					<?php for($i = 0; count($Event); $i++){ ?>
					<tr>
						<th> 参加イベント</th>
						<td>
							<?php echo h($participantuser['Event']['$i'][id]) ?>
						</td>
					</tr>
*/
				<?php } ?>
			</table>

			<?php echo $this->Form->postLink(
				$oneuser['User']['name'] .' さんを 削除',
				array('action' => 'delete',$oneuser['User']['id']),
				array('confirm' => $oneuser['User']['name'] . 'さんを削除しますか？',
					'class' => 'btn btn-danger',)
				);
			?>



<?php
pr($oneuser);
pr($studentuser);
pr($participantuser);
?>

		</div>
	</div>
</div>
