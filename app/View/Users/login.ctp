
    <div class="container">
      <div class="starter-template">
				<div class="row">  
					<div class="col-md-8 col-md-offset-2">

        <p class="lead">

						<?php echo $this->Form->create('User',array(
							'inputDefaults' => array(
								'div' => 'form-group',
								'wrapInput' => false,
								'class' => 'form-control',
							),
							'class' => 'well',
						)); ?>
					<?php echo $this->Session->flash('auth'); ?>
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
				</div><!-- /row -->
      </div>
    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>


