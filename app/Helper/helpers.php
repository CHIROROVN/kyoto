<?php

	function CusName($ent_id){
		$data = App\Http\Controllers\Backend\EnterpriseController::getCusName($ent_id);
		if(!empty($data)){
			return $data;
		}else{
			return null;
		}
	}

