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
							<?php echo $this->Html->link('アカウント一覧', '/users/',array('class' => 'list-group-item')); ?>

							<?php echo $this->Html->link('イベント', '/events_participants/',array('class' => 'list-group-item')); ?>
							<?php echo $this->Html->link('修了生向けイベント', '/gevents/form/',array('class' => 'list-group-item')); ?>
							<?php echo $this->Html->link('参加者認証', '/users/uapplist/',array('class' => 'list-group-item')); ?>
							<?php echo $this->Html->link('修了生認証', '/users/gapplist/',array('class' => 'list-group-item')); ?>
							<?php echo $this->Html->link('証明書申請一覧','/certificates/index',array('class' => 'list-group-item')); ?>
							<?php echo $this->Html->link('ユーザー登録','/pages/addhome/',array('class' => 'list-group-item')); ?>
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
							<?php echo $this->Html->link('学生情報編集', '/students/editone',array('class' => 'list-group-item')); ?>
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

