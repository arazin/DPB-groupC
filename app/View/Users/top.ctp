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
						<?php echo $this->Html->image('kousya.jpg-large',array('width'=>'555')); ?>
          </div>
        </div><!--/span-->
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="list-group">
						<?php echo $this->Html->link('TOP', array('action' => 'top'),array('class' => 'list-group-item active')); ?>
            <?php echo $this->Html->link('情報', array('action' => 'link'),array('class' => 'list-group-item')); ?>
            <?php echo $this->Html->link('イベント', array('action' => 'link'),array('class' => 'list-group-item')); ?>
            <?php echo $this->Html->link('修了証発行', array('action' => 'link'),array('class' => 'list-group-item')); ?>
            <?php echo $this->Html->link('Link1', array('action' => 'link'),array('class' => 'list-group-item')); ?>
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
