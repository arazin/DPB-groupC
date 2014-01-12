<h1>参加者一覧</h1>
<?php if ($participants != NULL): ?>

<table>
    <tr>
        <th>名前</th>
        <th>国名</th>
 				<th>県名</th>
 				<th>住所</th>
 				<th>郵便番号</th>
 				<th>電話番号</th>
 				<th>仕事</th>
 				<th>誕生日</th>
 				<th>性別</th>
    </tr>
    
       <?php foreach ($participants as $participant): ?>
        
    <tr>
        <td><?php echo $participant['User']['name']; ?></td>
        <td><?php echo $participant['User']['nationarity']; ?></td>
        <td><?php echo $participant['User']['prefecture']; ?></td>
        <td><?php echo $participant['User']['remain']; ?></td>
        <td><?php echo $participant['User']['postcord']; ?></td>
        <td><?php echo $participant['User']['phonenumber']; ?></td>
        <td><?php echo $participant['User']['job']; ?></td>
        <td><?php echo $participant['User']['birthday']; ?></td>
        <td><?php if($participant['User']['sex'] == 1){
        						echo ("男");}
        					else{echo ("女");}
        					 ?></td>


    </tr>
<?php endforeach; ?>
</table>
<?php endif; ?>

<?php
    echo $this->Paginator->first('最初 ');
    echo $this->Paginator->prev('前 ');
    echo $this->Paginator->numbers(
        array('separator' => '/','modulus'=>2));
    echo $this->Paginator->next(' 次');
    echo $this->Paginator->last(' 最後');
  ?>