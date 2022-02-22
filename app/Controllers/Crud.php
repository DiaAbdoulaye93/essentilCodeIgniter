<?php

namespace App\Controllers;

use App\Models\CrudModel;

class Crud extends BaseController
{
	function index()
	{
		$crudModel = new CrudModel();
  
		$data['user_tabl'] = $crudModel->orderBy('id', 'DESC')->paginate(10);
		$data['pagination_link'] = $crudModel->pager;
		return view('crud_view', $data);
	}
}

?>