<div class="container"> 
<div class="row">  
<div class="col-md-10 col-md-offset-1">

<h2>ユーザー情報</h2>

<table class="table table-striped table-bordered table-condensed">
<tr>
	<th>氏名</th>
	<td><?php echo h($data['User']['name']) ?></td>
</tr>
<tr>
	<th>生年月日</th>
	<td><?php echo h($data['User']['birthday']) ?></td>
</tr>
<tr>
	<th>郵便番号</th>
	<td><?php echo h($data['User']['postcord']) ?></td>
</tr>
<tr>
	<th>住所</th>
	<td>
		<?php echo h($data['User']['prefecture']) ?>
		<?php echo h($data['User']['remain']) ?>
	</td>
</tr>
<tr>
	<th>電話番号</th>
	<td><?php echo h($data['User']['phonenumber']) ?></td>
</tr>
<tr>
	<th>職業</th>
</tr>
<tr>
	<th>学部</th>
	<td><?php echo h($data['Industry']['industry_name']) ?></td>
</tr>
<tr>
	<th>学科</th>
</tr>
<tr>
	<th>研究室</th>
</tr>

</table>

<?php
echo $this->Html->link('学生情報編集', '/students/editone',array('class' => 'btn btn-primary')); 

/* 学部情報とか希望学部とか進路とかも表示。空っぽなら表示させない */
/* $data : 学生の情報(ユーザー情報)が入ってます */
pr($userdata);
pr($studentdata);

?>
