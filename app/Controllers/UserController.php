<?php

namespace App\Controllers;
use App\Models\UserModel;

class UserController extends BaseController
{
	function index()
	{
		$crudModel = new UserModel();
  
		$data['user_table'] = $crudModel->orderBy('id', 'DESC')->paginate(10);
		$data['pagination_link'] = $crudModel->pager;
		return view('users/users_view', $data);
	}
	public function create(){
        return view('addname');
    }
 
    // add data
    public function store() {
            $session = \Config\Services::session();
        $UserModel = new UserModel();
        $data = [
            'name' => $this->request->getVar('nom'),
            'email'  => $this->request->getVar('email'),
			'gender'  => $this->request->getVar('sex'),
        ];
        if($UserModel->insert($data)){
            $session->setFlashdata('success', 'utilisateur ajouté avec success');
        }else{
            $session->setFlashdata('error', 'Echec insertion');
        }

        return $this->response->redirect(site_url('/liste'));
    }

    public function singleUser(){
        $id= $_GET['id'];
        $UserModel = new UserModel();
        $data['user_obj'] = $UserModel->where('id', $id)->first();
        return view('users/user_edit', $data);
    }

    // update name data
    public function update(){
        $UserModel = new UserModel();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
            'gender'  => $this->request->getVar('sex'),
        ];
        $UserModel->update($id, $data);
        return $this->response->redirect(site_url('/liste'));
    }
 
    // delete name
    public function delete($id = null){
        $UserModel = new UserModel();
        $data['user'] = $UserModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/liste'));
    }   

public function welcome(){
    return view('users/otherview');
}
}
?>