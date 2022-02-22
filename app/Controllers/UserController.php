<?php

namespace App\Controllers;
use App\Models\UserModel;

class UserController extends BaseController
{
	function index()
	{
		$crudModel = new UserModel();
  
		$data['user_tabl'] = $crudModel->orderBy('id', 'DESC')->paginate(10);
		$data['pagination_link'] = $crudModel->pager;
		return view('users/users_view', $data);
	}
}

?>