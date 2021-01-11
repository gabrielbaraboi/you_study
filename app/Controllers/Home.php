<?php namespace App\Controllers;

use App\Models\GroupModel;
use App\Models\UserModel;

class Home extends BaseController
{
	public function index()
	{
	    $data = [];
	    $model = new UserModel();
	    $groupsModel = new GroupModel();
        $user = $model->where('id', session()->get('id'))
            ->first();
        $groups = $groupsModel->findAll();
        $data['user'] = $user;
        $data['groups'] = $groups;

        if(!session()->get('isLoggedIn')){
            return redirect()->to('/login');
        }

        return view('home', $data);
	}
}
