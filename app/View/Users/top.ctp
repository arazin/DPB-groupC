<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>TOP</title>

    <!-- Bootstrap core CSS -->
		<?php echo $this->Html->css('bootstrap.min'); ?> 

    <!-- Custom styles for this template -->
		<?php echo $this->Html->css('offcanvas'); ?> 

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
						<h1>ここに</h1>
						<h1>なにか</h1>
						<h1>欲しい</h1>
						<h1>かな</h1>
          </div>
        </div><!--/span-->
				
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="list-group">
						<?php if($acllist[$groupId]=='administrators'): ?>
							<?php echo $this->Html->link('大学TOP', array('action' => 'top'),array('class' => 'list-group-item active')); ?>
							<?php echo $this->Html->link('ユーザー一覧', '/users/',array('class' => 'list-group-item')); ?>
							<?php echo $this->Html->link('イベント', '/events/',array('class' => 'list-group-item')); ?>
							<?php echo $this->Html->link('参加者認証', '/users/uapplist/',array('class' => 'list-group-item')); ?>
							<?php echo $this->Html->link('学生新規登録','/students/add/',array('class' => 'list-group-item')); ?>
							<?php echo $this->Html->link('証明書発行申請','/certificates/index',array('class' => 'list-group-item')); ?>
							<?php echo $this->Html->link('修了生認証', '/users/gapplist/',array('class' => 'list-group-item')); ?>
							<?php echo $this->Html->link('ユーザー登録','/pages/addhome/',array('class' => 'list-group-item')); ?>
							<?php echo $this->Html->link('統計分析', '/users/research',array('class' => 'list-group-item')); ?>

						<?php endif; ?>
						
						<?php if($acllist[$groupId]=='generals'): ?>
							<?php echo $this->Html->link('参加者TOP', array('action' => 'top'),array('class' => 'list-group-item active')); ?>
							<?php echo $this->Html->link('参加者情報参照', '/participants/index',array('class' => 'list-group-item')); ?>
						<?php endif; ?>
						
						<?php if($acllist[$groupId]=='students'): ?>
							<?php echo $this->Html->link('学生TOP', array('action' => 'top'),array('class' => 'list-group-item active')); ?>

							<?php echo $this->Html->link('学生情報参照', '/students/index',array('class' => 'list-group-item')); ?>
							<?php echo $this->Html->link('学生情報編集', '/students/editone',array('class' => 'list-group-item')); ?>

						<?php endif; ?>

						<?php if($acllist[$groupId]=='graduates'): ?>
							<?php echo $this->Html->link('修了生TOP', array('action' => 'top'),array('class' => 'list-group-item active')); ?>
							<?php echo $this->Html->link('修了生情報参照', '/graduates/index',array('class' => 'list-group-item')); ?>
							<?php echo $this->Html->link('進路編集','/careers/add',array('class' => 'list-group-item')); ?>
							<?php echo $this->Html->link('証明書発行申請','/certificates/add',array('class' => 'list-group-item')); ?>
						<?php endif; ?>
          </div>
        </div><!--/span-->



				
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Company 2013</p>
      </footer>

    </div><!--/.container-->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="offcanvas.js"></script>
  </body>
</html>
