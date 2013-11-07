<h1>Blog post</h1>

<table>
	<tr>
		<th>Id</th>
		<th>title</th>		
		<th>created</th>		
	</tr>

	<!--投稿記事の表示  -->
<?php foreach($posts as $post) ?>
	<tr>
		<td><?php echo $post['Post']['id'] ?></td>
		<td><?php echo $this->Html->link($post['Post']['title'],
array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>
        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>
	
	
