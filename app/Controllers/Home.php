<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
        if (session('isLoggedIn'))
            return view('home');
        else
            return redirect()->to('login');
	}

	//--------------------------------------------------------------------

}
