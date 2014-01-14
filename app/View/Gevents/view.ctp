<div class="container"> 
	<div class="row">  
		<div class="col-md-10 col-md-offset-1">

			<h2><?php echo h($gevent['Gevent']['title']); ?>の詳細</h2>

			<table class="table table-striped table-bordered">
				<tr>
					<th>イベントID</th>
					<td><?php echo h($gevent['Gevent']['id']); ?></td>
				</tr>
				<tr>
					<th>日時</th>
					<td><?php echo h($gevent['Gevent']['gevent_date']); ?></td>
				</tr>
				<tr>
					<th>場所</th>
					<td><?php echo h($gevent['Gevent']['place']); ?></td>
				</tr>
				<tr>
					<th>詳細</th>
					<td><?php echo h($gevent['Gevent']['detail']); ?></td>
				</tr>
					<th>作成日時</th>
					<td><?php echo h($gevent['Gevent']['created']); ?></td>
				</tr>
					<th>更新日時</th>
					<td><?php echo h($gevent['Gevent']['modified']); ?></td>
				</tr>
			</table>
		</div>
	</div>
</div>

