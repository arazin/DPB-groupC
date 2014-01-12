<div class="container"> 
<div class="row">  
<div class="col-md-10 col-md-offset-1">

<h2>
	<?php echo h($data['User']['username']) ?>
	さんの登録情報
</h2>
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
<tr>
	<th> 志望課程</th>
	<td>カリキュラム<?php echo h($data['Participant']['curriculum_id']) ?></td>
</tr>
<tr>	
<th> 志望コース</th>
	<td>コース<?php echo h($data['Participant']['course_id']) ?></td>
</tr>
<tr>	
<th> 志望指導教員</th>
	<td><?php echo h($data['Participant']['teacher_name']) ?></td>
</tr>
</table>

<?php
echo $this->Html->link('参加者情報編集', '/participants/editone',array('class' => 'btn btn-primary'));
?>
&nbsp;&nbsp;&nbsp;
<?php 
echo $this->Html->link('参加者情報削除', '/participants/deleteone',array(
	'class' => 'btn btn-danger'),
	'削除するとログインできなくなります。\nよろしいですか?'
);
?>

</div></div></div>
