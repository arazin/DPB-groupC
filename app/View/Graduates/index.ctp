<div class="container"> 
	<div class="row">  
		<div class="col-md-10 col-md-offset-1">

			<h2><?php echo h($data['User']['username']) ?>さんの情報</h2>
			<h3>基本情報</h3>
			<table class="table table-striped table-bordered">
				<tr>
					<th> 氏名</th>
					<td><?php echo h($data['User']['name']) ?></td>
				</tr>
				<tr>
					<th> 生年月日</th>
					<td><?php echo h($data['User']['birthday']) ?></td>
				</tr>
				<tr>
					<th> 郵便番号</th>
					<td><?php echo h($data['User']['postcord']) ?></td>
				</tr>
				<tr>
					<th> 住所</th>
					<td>
							<?php echo h($data['User']['prefecture']) ?>
							<?php echo h($data['User']['remain']) ?>
					</td>
				</tr>
				<tr>
					<th> 電話番号</th>
					<td><?php echo h($data['User']['phonenumber']) ?></td>
				</tr>
			</table>

			<h3>希望進路</h3>
			<?php if(!empty($data2)){ ?>
				<table class="table table-striped table-bordered">
					<tr>
					<th> 業種</th>
						<td><?php echo h($data2['Industry']['industry_name']) ?></td>
					</tr>
					<tr>
						<th> 所属</th>
						<td><?php echo h($data2['Career']['belong']) ?></td>
					</tr>
					<tr>
						<th> 役職</th>
						<td><?php echo h($data2['Career']['posit']) ?></td>
					</tr>
				</table>
				<p>※進路変更はTOPページのリンクから</p>
			<?php }else{ ?>
				<p>
					　希望進路が登録されていません。TOPページのリンクから登録して下さい。
				</p>
				<br>
			<?php } ?>
			<?php
				echo $this->Html->link('修了生情報編集', '/graduates/editone',array('class' => 'btn btn-primary')); 
			?>

		</div>
	</div>
</div>

