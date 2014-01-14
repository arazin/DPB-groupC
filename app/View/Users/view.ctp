<div class="container"> 
	<div class="row">  
		<div class="col-md-10 col-md-offset-1">

			<h2><?php echo h($oneuser['User']['name']) ?>さんの情報</h2>

			<table class="table table-striped table-bordered">
				<tr>
					<th> 氏名</th>
					<td><?php echo h($oneuser['User']['name']) ?></td>
				</tr>
				<tr>
					<th> ID</th>
					<td><?php echo h($oneuser['User']['username']) ?></td>
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
				<tr>
					<th>生年月日</th>
					<td><?php echo h($oneuser['User']['birthday']) ?></td>
				</tr>
				<tr>
					<th>性別</th>
					<?php if($oneuser['User']['sex'] == 1){ ?>
						<td><p>女</p></td>
					<?php }else{ ?>
						<td><p>男</p></td>
					<?php } ?>
				</tr>

				<?php if(isset($studentuser)){ ?>
					<tr>
						<th>学年</th>
						<td><?php echo h($studentuser['Student']['grade']) ?></td>
					</tr>
					<tr>
						<th>学籍番号</th>
						<td><?php echo h($studentuser['Student']['student_id']) ?></td>
					</tr>
					<tr>
						<th>学部</th>
						<td><?php echo h($studentuser['Faculty']['faculty_name']) ?></td>
					</tr>
					<tr>
						<th>学科</th>
						<td>
							<?php echo h($studentuser['Department']['department_name']) ?>
						</td>
					</tr>
					<tr>
						<th>研究室</th>
						<td><?php echo h($studentuser['Labo']['labo_name']) ?></td>
					</tr>
					<tr>
						<th>保証人氏名</th>
						<td><?php echo h($studentuser['Student']['guarantor_name']) ?></td>
					</tr>
					<tr>
						<th>保証人住所</th>
						<td><?php echo h($studentuser['Student']['guarantor_address']) ?></td>
					</tr>
					<tr>
						<th>保証人連絡先</th>
						<td><?php echo h($studentuser['Student']['guarantor_contact']) ?></td>
					</tr>

				<?php }else if(isset($participantuser)){ ?>
					<tr>
						<th>業種</th>
						<td><?php echo h($oneuser['Industry']['industry_name']) ?></td>
					</tr>
					<tr>
						<th>職種</th>
						<td><?php echo h($oneuser['User']['job']) ?></td>
					</tr>
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
					<?php for($i = 0; $i < count($participantuser['Event']); $i++){ ?>
					<tr>
						<th> 参加イベント<?php echo h($i + 1); ?></th>
						<td>
							イベント <?php echo h($participantuser['Event'][$i]['id']) ?>
						</td>
					</tr>

				<?php }} else if(isset($oneuser['Graduate'])){?>
					<tr>
						<th> 修了日</th>
						<td><?php echo h($oneuser['Graduate']['garaduation_date']) ?></td>
					</tr>
				<?php } ?>
			</table>

			<?php echo $this->Form->postLink(
				$oneuser['User']['name'] .' さんを 削除',
				array('action' => 'delete',$oneuser['User']['id']),
				array('confirm' => $oneuser['User']['name'] . 'さんを削除しますか？',
					'class' => 'btn btn-danger',)
				);
			?>
		</div>
	</div>
</div>
