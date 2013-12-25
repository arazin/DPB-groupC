<div class="container"> 
<div class="row">  
<div class="col-md-9 col-md-offset-1">


<h2>ユーザー情報一覧</h2>
<table>
<tr>
	<th>ID</th>
	<th>名前</th>
	<th>郵便番号</th>
	<th>都道府県</th>
	<th>市町村</th>
	<th>国籍</th>
	<th>電話番号</th>
	<th>職業</th>
	<th>年齢</th>
	<th>生年月日</th>
	<th>性別</th>
</tr>
<?php
	for($i=0; $i<count($users);$i++){

		$arr = $users[$i]['User'];

		echo "<tr><td>{$arr['id']}</td>";
		echo "<td>{$arr['name']}</td>";
		echo "<td>{$arr['postcord']}</td>";
		echo "<td>{$arr['prefecture']}</td>";
		echo "<td>{$arr['remain']}</td>";
		echo "<td>{$arr['nationarity']}</td>";
		echo "<td>{$arr['phonenumber']}</td>";
		echo "<td>{$arr['job']}</td>";
		echo "<td>{$arr['industry_id']}</td>";
		echo "<td>{$arr['birthday']}</td>";
		echo "<td>{$arr['sex']}</td>";
	}
 ?>
</table>

</div></div></div>

