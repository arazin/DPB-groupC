﻿<?php
?>
<!DOCTYPE html>
<html>
	<head>
    <?php echo $this->Html->charset(); ?>
    <title>
      <?php echo $title_for_layout; ?>
    </title>
    <?php

    echo $this->Html->meta('icon');

    // jQuery CDN
    echo $this->Html->script('//code.jquery.com/jquery-1.10.2.min.js');

    // Twitter Bootstrap 3.0 CDN
		echo $this->Html->css('cake.must');
    echo $this->Html->css('//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css');
    echo $this->Html->script('//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js');
  	echo $this->Html->css('bootstrap');
		
		
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
	</head>
	<body>

		<!-- <div class="navbar navbar-inverse navbar-fixed-top" role="navigation"> -->
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<?php echo $this->Html->link('Page Name', '/',array('class' => 'navbar-brand')); ?>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><?php echo $this->Html->link('TOP', '/'); ?></li>
						<li><?php echo $this->Html->link('Infomation', array('action' => 'top')); ?></li>
						<li><?php echo $this->Html->link('Event', array('action' => 'top')); ?></li>
						<li><?php echo $this->Html->link('Issue', array('action' => 'top')); ?></li>
						<li><?php echo $this->Html->link('Other', array('action' => 'top')); ?></li>
						<li><?php echo $this->Html->link('logout', array('controller'=>'users','action'=>'logout')); ?></li>
					</ul>
				</div><!--/.nav-collapse -->
      </div>
			<!-- </div> -->


		<div id="container">
			<div id="content">

				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div>	</div>
			<?php echo $this->element('sql_dump'); ?>
	</body>
</html>
