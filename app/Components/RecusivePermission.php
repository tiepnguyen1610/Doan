<?php

namespace App\Components;


class RecusivePermission{

	private $data;
	private $htmlSelect = '';

	public function __construct($data)
	{
		$this->data = $data;
	}

	public function permissionRecusive($parentId, $id = 0, $text = '')
	{
		foreach($this->data as $value){
			if($value['parent_id'] == $id ){
				if(!empty($parentId) && $parentId == $value['id']){

					$this->htmlSelect .= "<option selected value='" . $value['id'] . "'>" . $text . $value['permission_name'] . "</option>";
				}else{

					$this->htmlSelect .= "<option value='" . $value['id'] . "'>" . $text . $value['permission_name'] . "</option>";
				}
				
				$this->permissionRecusive($parentId, $value['id'], $text .'----');
			}
		}
		return $this->htmlSelect;
	}

}