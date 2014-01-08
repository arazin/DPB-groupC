<div class="container"> 
<div class="row">  
<div class="col-md-10 col-md-offset-1">

<h2>学生情報</h2>

<table class="table table-striped table-bordered">
<tr>
	<th> 氏名</th>
	<td><?php echo h($userdata['User']['name']) ?></td>
</tr>
<tr>
	<th> 生年月日</th>
	<td><?php echo h($userdata['User']['birthday']) ?></td>
</tr>
<tr>
	<th> 郵便番号</th>
	<td><?php echo h($userdata['User']['postcord']) ?></td>
</tr>
<tr>
	<th> 住所</th>
	<td>
		<?php echo h($userdata['User']['prefecture']) ?>
		<?php echo h($userdata['User']['remain']) ?>
	</td>
</tr>
<tr>
	<th> 電話番号</th>
	<td><?php echo h($userdata['User']['phonenumber']) ?></td>
</tr>
<tr>
	<th> 学部</th>
	<td><?php echo h($studentdata['Faculty']['faculty_name']) ?></td>
</tr>
<tr>
	<th> 学科</th>
	<td><?php echo h($studentdata['Department']['department_name']) ?></td>
</tr>
<tr>
	<th> 研究室</th>
	<td><?php echo h($studentdata['Labo']['labo_name']) ?></td>
</tr>

</table>

<?php
echo $this->Html->link('学生情報編集', '/students/editone',array('class' => 'btn btn-primary')); 
?>

