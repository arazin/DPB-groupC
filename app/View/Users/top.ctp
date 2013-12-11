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
    <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
					<?php echo $this->Html->link('Project name', array('action' => 'top'),array('class' => 'navbar-brand')); ?>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            <h1>トップページへようこそ（ここに見出し）</h1>
            <p>ここにコメント</p>
          </div>
          <div class="row">
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>ここに他情報</h2>
              <p>他情報の所にイベントが表示されるように書き直すかもしれない</p>
              <p><?php echo $this->Html->link('View details >>', array('action' => 'link'),array('class' => 'btn btn-default')); ?></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>他情報2</h2>
              <p>色、構造はそのままになってしまってるんであとで調整します</p>
              <p><?php echo $this->Html->link('View details >>', array('action' => 'link'),array('class' => 'btn btn-default')); ?></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>他情報3</h2>
              <p>6まで必要ないなら消去</p>
              <p><?php echo $this->Html->link('View details >>', array('action' => 'link'),array('class' => 'btn btn-default')); ?></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>他情報4</h2>
              <p>上のCakePHPへのリンクもあとで消去します</p>
              <p><?php echo $this->Html->link('View details >>', array('action' => 'link'),array('class' => 'btn btn-default')); ?></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>他情報５</h2>
              <p>少し大きな青ボタンにも変更可</p>
              <p><?php echo $this->Html->link('View details >>', array('action' => 'link'),array('class' => 'btn btn-primary btn-lg')); ?></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>他情報６</h2>
              <p>ほかほか</p>
              <p><?php echo $this->Html->link('View details >>', array('action' => 'link'),array('class' => 'btn btn-default')); ?></p>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="list-group">
						<?php echo $this->Html->link('TOP', array('action' => 'top'),array('class' => 'list-group-item active')); ?>
            <?php echo $this->Html->link('情報', array('action' => 'link'),array('class' => 'list-group-item')); ?>
            <?php echo $this->Html->link('イベント', array('action' => 'link'),array('class' => 'list-group-item')); ?>
            <?php echo $this->Html->link('修了証発行', array('action' => 'link'),array('class' => 'list-group-item')); ?>
            <?php echo $this->Html->link('Link1', array('action' => 'link'),array('class' => 'list-group-item')); ?>
            <?php echo $this->Html->link('Link2', array('action' => 'link'),array('class' => 'list-group-item')); ?>
            <?php echo $this->Html->link('Link3', array('action' => 'link'),array('class' => 'list-group-item')); ?>
            <?php echo $this->Html->link('Link4', array('action' => 'link'),array('class' => 'list-group-item')); ?>
            <?php echo $this->Html->link('Link5', array('action' => 'link'),array('class' => 'list-group-item')); ?>
            <?php echo $this->Html->link('Link6', array('action' => 'link'),array('class' => 'list-group-item')); ?>
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
