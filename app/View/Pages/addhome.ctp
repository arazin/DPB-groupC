<div class="container">
	<div class="jumbotron">
		<div class="row">  
			<div class="col-md-8 col-md-offset-2">

				
				
				<?php
				echo $this->Html->link('学生新規登録','/students/add',
															 array('class' => 'btn btn-primary btn-lg btn-block'));
				echo $this->Html->link('参加者新規登録','/participants/add',
															 array('class' => 'btn btn-primary btn-lg btn-block'));
				echo $this->Html->link('修了生新規登録','/graduates/add',
															 array('class' => 'btn btn-primary btn-lg btn-block'));
				
				?>
			
			</div>
		</div><!-- /row -->
	</div>
</div><!-- container -->
