<head>
	<!-- Javascript 時計 -->
	<?php echo $this->Html->script('tokei'); ?> 
</head>
<body>
	<div class="container">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				<p class="pull-right visible-xs">
					<button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
				</p>
				<div class="jumbotron">
					<p>ようこそ<?php echo $user; ?>さん</p>
					本日は<br>
					<script type="text/JavaScript">
						<!--
						date();
						//-->
					</script>
					<br>時刻は<br>
					<div class="box1">
						<script type="text/JavaScript">
							<!--
							sinpletokei();
							//-->
						</script>
					</div>
				</div>
			</div><!--/span-->
			<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
				<div class="list-group">
					<?php if($acllist[$groupId]=='administrators'): ?>
						<?php echo $this->Html->link('大学TOP', array('action' => 'top'),array('class' => 'list-group-item active')); ?>
						<?php echo $this->Html->link('アカウント一覧', '/users/',array('class' => 'list-group-item')); ?>
						<?php echo $this->Html->link('ユーザー登録','/pages/addhome/',array('class' => 'list-group-item')); ?>
						<?php echo $this->Html->link('説明会情報', '/events_participants/',array('class' => 'list-group-item')); ?>
						<?php echo $this->Html->link('修了生向けイベント', '/gevents/form/',array('class' => 'list-group-item')); ?>
						<?php echo $this->Html->link('参加者認証', '/users/uapplist/',array('class' => 'list-group-item')); ?>
						<?php echo $this->Html->link('修了生認証', '/users/gapplist/',array('class' => 'list-group-item')); ?>
						<?php echo $this->Html->link('証明書申請一覧','/certificates/index',array('class' => 'list-group-item')); ?>
						<?php echo $this->Html->link('大学アカウント管理', '/users/edit',array('class' => 'list-group-item')); ?>

					<?php endif; ?>

					<?php if($acllist[$groupId]=='generals'): ?>
						<?php echo $this->Html->link('参加者TOP', array('action' => 'top'),array('class' => 'list-group-item active')); ?>
						<?php echo $this->Html->link('参加者情報参照', '/participants/index',array('class' => 'list-group-item')); ?>
						<?php echo $this->Html->link('説明会参加履歴', '/events_participants/reference/',array('class' => 'list-group-item')); ?>

					<?php endif; ?>

					<?php if($acllist[$groupId]=='students'): ?>
						<?php echo $this->Html->link('学生TOP', array('action' => 'top'),array('class' => 'list-group-item active')); ?>
						<?php echo $this->Html->link('学生情報参照', '/students/index',array('class' => 'list-group-item')); ?>
					<?php endif; ?>

					<?php if($acllist[$groupId]=='graduates'): ?>
						<?php echo $this->Html->link('修了生TOP', array('action' => 'top'),array('class' => 'list-group-item active')); ?>
						<?php echo $this->Html->link('修了生情報参照', '/graduates/index',array('class' => 'list-group-item')); ?>
						<?php echo $this->Html->link('進路編集','/careers/add',array('class' => 'list-group-item')); ?>
						<?php echo $this->Html->link('証明書発行申請','/certificates/add',array('class' => 'list-group-item')); ?>
						<?php echo $this->Html->link('イベント','/gevents/',array('class' => 'list-group-item')); ?>
					<?php endif; ?>
				</div>
			</div><!--/span-->
		</div><!--/row-->

		<hr>
		<footer>
			<p>&copy; DesignProjectB 2013 GroupC</p>
		</footer>

	</div><!--/.container-->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="offcanvas.js"></script>

