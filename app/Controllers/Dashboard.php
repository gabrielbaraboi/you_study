<?php namespace App\Controllers;

use App\Models\UserModel;

class Dashboard extends BaseController
{
	public function index()
	{
	    $data = [];
	    $model = new UserModel();
        $user = $model->where('id', session()->get('id'))
            ->first();
        $data['user'] = $user;
        if (session('isLoggedIn') and strcmp($user['role'], 'teacher') == 0)
            return view('dashboard', $data);
        else if (session('isLoggedIn') and strcmp($user['role'], 'admin') == 0)
            return view('dashboard', $data);
        else if (session('isLoggedIn') and strcmp($user['role'], 'root') == 0)
            return view('dashboard', $data);
        else if (session('isLoggedIn'))
            return redirect()->to('home');

        return redirect()->to('login');
	}
}
