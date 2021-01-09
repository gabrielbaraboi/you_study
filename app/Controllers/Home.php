<?php namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
	public function index()
	{
	    $data = [];
	    $model = new UserModel();
        $user = $model->where('id', session()->get('id'))
            ->first();
        $data['user'] = $user;

        return view('home', $data);
	}
}
