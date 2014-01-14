<div class="container"> 
	<div class="row">  
		<div class="col-md-10 col-md-offset-1">

			<h2><?php echo h($userdata['User']['username']) ?>さんの情報</h2>
			<table class="table table-striped table-bordered">
				<tr>
					<th>氏名</th>
					<td><?php echo h($userdata['User']['name']) ?></td>
				</tr>
				<tr>
					<th>国籍</th>
					<td><?php echo h($userdata['User']['nationarity']) ?></td>
				</tr>
				<tr>
					<th>郵便番号</th>
					<td><?php echo h($userdata['User']['postcord']) ?></td>
				</tr>
				<tr>
					<th>住所</th>
					<td>
						<?php echo h($userdata['User']['prefecture']) ?>
						<?php echo h($userdata['User']['remain']) ?>
					</td>
				</tr>
				<tr>
					<th>電話番号</th>
					<td><?php echo h($userdata['User']['phonenumber']) ?></td>
				</tr>
				<tr>
					<th>生年月日</th>
					<td><?php echo h($userdata['User']['birthday']) ?></td>
				</tr>
				<tr>
					<th>性別</th>
					<?php if($userdata['User']['sex'] == 1){ ?>
						<td><p>女</p></td>
					<?php }else{ ?>
						<td><p>男</p></td>
					<?php } ?>
				</tr>
				<tr>
					<th>学籍番号</th>
					<td><?php echo h($studentdata['Student']['student_id']) ?></td>
				</tr>
				<tr>
					<th>学年</th>
					<td><?php echo h($studentdata['Student']['grade']) ?></td>
				</tr>
				<tr>
					<th>学部</th>
					<td><?php echo h($studentdata['Faculty']['faculty_name']) ?></td>
				</tr>
				<tr>
					<th>学科</th>
					<td><?php echo h($studentdata['Department']['department_name']) ?></td>
				</tr>
				<tr>
					<th>研究室</th>
					<td><?php echo h($studentdata['Labo']['labo_name']) ?></td>
				</tr>
				<tr>
					<th>保証人氏名</th>
					<td><?php echo h($studentdata['Student']['guarantor_name']) ?></td>
				</tr>
				<tr>
					<th>保証人住所</th>
					<td><?php echo h($studentdata['Student']['guarantor_address']) ?></td>
				</tr>
				<tr>
					<th>保証人連絡先</th>
					<td><?php echo h($studentdata['Student']['guarantor_contact']) ?></td>
				</tr>

			</table>

			<?php
				echo $this->Html->link('学生情報編集', '/students/editone',array('class' => 'btn btn-primary'));
			?>
			&nbsp;&nbsp;&nbsp;
			<?php
				echo $this->Html->link('修了する', '/students/compadd',array('class' => 'btn btn-warning'));
			?>
		</div>
	</div>
</div>

