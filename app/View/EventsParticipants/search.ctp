<div class="container"> 
	<div class="row">  
		<div class="col-md-8">



<?php if ($data != NULL): ?>
	<h1>検索結果</h1>
	<table cellpadding="0" cellspacing="0" class="table  table-condensed">
		<thead>
    <tr>
				<th>追加情報</th>
        <th>名前</th>
        <th>国籍</th>
 				<th>県名</th>
 				<th>郵便番号</th>
 				<th>性別</th>
    </tr>
    
       <?php foreach ($data as $dataaa): ?>
        
    <tr>
				<td><?php if($eps_ids != NULL){
										foreach ($eps_ids as $eps_id){
											if($eps_id == $dataaa['User']['id']){
												echo "追加済み";
											}
										}
									}
				?></td>

        <td><?php echo $dataaa['User']['name']; ?></td>
        <td><?php echo $dataaa['User']['nationarity']; ?></td>
        <td><?php echo $dataaa['User']['prefecture']; ?></td>
        <td><?php echo $dataaa['User']['postcord']; ?></td>
        <td><?php if($dataaa['User']['sex'] == 1){
        			echo ("男");}
        		else{echo ("女");}
        		?></td>

					<td><?php echo $this->Html->link('追加', array('action' => 'add', $dataaa['User']['id'], $eveid)); ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
				<?php endif; ?>
		</div>

		<div class="col-md-4">
			<br><br><br>
			<legend>参加者検索</legend>
			
			<?php
			echo $this->Form->create('Search',array(
				'inputDefaults' => array(
					'div' => 'form-group',
					'wrapInput' => false,
					'class' => 'form-control',
				),
				'class' => 'well',
			));
			echo $this->Form->input('name', array('label'=>'名前'));
			echo $this->Form->input('nationarity', array('label'=>'国名'));
			echo $this->Form->input('prefecture', array('label'=>'県名'));
			echo $this->Form->input('remain', array('label'=>'残りの住所'));
			echo $this->Form->input('postcord', array('label'=>'郵便番号'));
			echo $this->Form->input('phonenumber', array('label'=>'電話番号'));
			echo $this->Form->input('birthday', array('label'=>'誕生日（xxxx-xx-xxの形式で入力）'));
			echo $this->Form->input('sex', array('label'=>'性別（男なら1を、女なら0を入力）'));
			echo $this->Form->end('検索');
			?>
		</div>
	</div>
</div>

<script type="text/javascript">
	window.onload = function(){document.getElementById('SearchName').focus();}
</script>
