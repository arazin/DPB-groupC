<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">
    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <?php echo $this->Html->css('bootstrap'); ?> 

    <!-- Custom styles for this template -->
		<?php echo $this->Html->css('starter-template'); ?> 
		<?php echo $this->Html->css('bootstrap.min'); ?> 
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
      <div class="starter-template">
        <p class="lead">
						<?php echo $this->Session->flash('auth'); ?>
						<?php echo $this->Form->create('User',array(
							'inputDefaults' => array(
								'div' => 'form-group',
								'wrapInput' => false,
								'class' => 'form-control',
							),
							'class' => 'well',
						)); ?>
					  <fieldset>
					    <legend><?php echo __('Login Form'); ?></legend>
					    <?php echo $this->Form->input('username',array(
								'label' => 'ID',
							));
					    echo $this->Form->input('password',array(
								'label' => 'パスワード'
							));
					    ?>
					  </fieldset>
						<?php echo $this->Html->link('一般新規登録','/participants/preadd/') ?>
						<?php echo $this->Html->link('修了生新規登録','/graduates/preadd/') ?>

						<?php echo $this->Form->end(__('Login')); ?>

				</p>
      </div>
    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
