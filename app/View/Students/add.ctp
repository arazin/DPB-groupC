
<div class="container"> 
	<div class="row">  
		<div class="col-md-10 col-md-offset-1">




			<h1>学生新規登録</h1>
			<?php
			echo $this->Form->create('Student',array(
				'inputDefaults' => array(
					'div' => 'form-group',
					'class' => 'form-control',
				),
				'class' => 'well',
				'name' => 'StudentAddForm',
			));

			echo $this->Form->input('User.username',array('label'=>'ユーザーID'));
			echo $this->Form->input('User.password',array('label'=>'パスワード'));
			echo $this->Form->input('User.password2',array('type'=>'password','label'=>'パスワード再入力'));
			echo $this->Form->input('User.name',array('label'=>'お名前'));
			echo $this->Form->input('User.nationarity',array('label'=>'国籍'));
			echo $this->Form->input('User.postcord',array('label'=>'郵便番号'));
			echo $this->Form->input('User.prefecture',array('label'=>'都道府県'));
			echo $this->Form->input('User.remain',array('label'=>'市区町村・番地・その他'));
			echo $this->Form->input('User.phonenumber',array('label'=>'電話番号'));

			echo $this->Form->input('User.industry_id',array(
				'empty'=>'--業種を選んで下さい--',
				'label'=>'業種',
			));

			echo $this->Form->hidden('User.job',array('value'=>'大学生'));

			echo $this->Form->input('User.birthday',array(
				'dateFormat'=>'YMD',
				'minYear'=>date('Y')-100,
				'maxYear'=>date('Y')-1,
				'monthNames'=>false,
				'label'=>'生年月日',
			));

			echo $this->Form->input('User.sex',array(
				'empty' => '--性別を選んで下さい--',
				'label' => '性別'
			));
			echo $this->Form->input('Student.grade',array(
				'empty' => '--学年を選んで下さい--',
				'label' => '学年',
			));
			echo $this->Form->input('Student.faculty_id',array(
				'label'=>'学部',
				'empty'=>'--学部を選んで下さい--',
				'onchange' => 'depSet(this)',
			));


			echo $this->Form->input('Student.department_id',array(
				'label'=>'学科',
				'empty'=>'--学科を選んで下さい--',
				'onchange' => 'labSet(this)',

			));
			echo $this->Form->input('Student.labo_id',array(
				'label'=>'研究室',
				'empty'=>'--研究室を選んで下さい--',
			));
			echo $this->Form->input('Student.student_id',array(
				'type' => 'text',
				'maxLength' => 30,
				'div' => 'input text required',
				'label' => '学籍番号',
			));

			echo $this->Form->input('Student.guarantor_name',array(
				'label'=>'保証人氏名',
			));

			echo $this->Form->input('Student.guarantor_address',array(
				'label'=>'保証人住所',
			));

			echo $this->Form->input('Student.guarantor_contact',array(
				'label'=>'保証人連絡先',
			));

			echo $this->Form->input('Student.entrance_date',array(
				'dateFormat'=>'YMD',
				'minYear'=>date('Y')-100,
				'maxYear'=>date('Y')+1,
				'monthNames'=>false,
				'label'=>'入学年',
			));


			echo $this->Form->submit('確 認', array(
				'div' => 'form-group',
				'class' => 'btn btn-default'
			));



			echo $this->Form->end();

			?>

		</div>
	</div>
</div>

<script type="text/javascript" >
 window.onload = function(){document.getElementById('UserUsername').focus();}
 
 var jsDepartments = new Object();
 var jsLabos = new Object();
 var noneKey = <?php echo array_search('なし',$labSets['0'])?>;
 
 <?php
 foreach($faculties as $fKey => $fValue){
	 if(isset($depSets[$fKey])){
		 echo "jsDepartments[$fKey] = new Object();\n";
		 foreach($depSets[$fKey] as $dKey => $dValue){
			 echo "jsDepartments[$fKey][$dKey] = '$dValue';\n";
		 }
	 }
 }

 foreach($departments as $dKey => $dValue){
	 echo "jsLabos[$dKey] = new Object();\n";
	 if(isset($labSets[$dKey])){
		 foreach($labSets[$dKey] as $lKey => $lValue){
			 echo "jsLabos[$dKey][$lKey] = '$lValue';\n";
		 }
	 }
	 echo "jsLabos[$dKey][noneKey] = 'なし';\n";
 }
 ?>

 function depSet(fObj){
	 dObj = document.StudentAddForm.elements['StudentDepartmentId'];
	 dObj.length = 1;
	 dObj.options[dObj.length-1].text = "--学科を選んでください--";
	 
	 for(var key in jsDepartments[fObj.value]){
		 dObj.options.length++;
		 dObj.options[dObj.options.length-1].value = key;
		 dObj.options[dObj.options.length-1].text = jsDepartments[fObj.value][key];
	 }
 }

 function labSet(dObj){
	 lObj = document.StudentAddForm.elements['StudentLaboId'];
	 lObj.length = 1;
	 lObj.options[lObj.length-1].text = "--研究室を選んでください--";
	 for(var key in jsLabos[dObj.value]){
		 lObj.options.length++;
		 lObj.options[lObj.options.length-1].value = key;
		 lObj.options[lObj.options.length-1].text = jsLabos[dObj.value][key];
	 }
 }
</script>

