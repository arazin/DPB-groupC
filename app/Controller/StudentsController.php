<?php
class StudentsController extends AppController{
	public $scaffold;
	public $helpers =array('Form','Html','Js','Time');

	public function add(){
		/*
		 *findで検索し、viewでselectの選択肢とする
		 */
		//業種
		$findoption = array(
			'fields' => array('id','industry_name'),//取り出す属性
			'recursive' => 0,//関連テーブルからは検索しない
			);
		$this->set('industries',$this->Student->User->Industry->find('list',$findoption));

		//学部
		$findoption = array(
			'fields' => array('id','faculty_name'),
			'recursive' => 0,
		);
		$this->set('faculties',$this->Student->Faculty->find('list',$findoption));

		//学科
		$findoption = array(
			'fields' => array('id','department_name'),
			'recursive' => 0,
		);
		$this->set('departments',$this->Student->Department->find('list',$findoption));

		//研究室
		$findoption = array(
			'fields' => array('id','labo_name'),
			'recursive' => 0,
		);
		$this->set('labos',$this->Student->Labo->find('list',$findoption));

		//性別
		$this->set('sexes',array('男','女'));//viewでselectフォームにする
		//学年
		$this->set('grades',array(1,2,3,4,5));//viewでselectフォームにする
	}
}

?>
