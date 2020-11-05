<?php namespace App\Controllers;

class Main extends BaseController
{
	public function index()
	{
        if (session('isLoggedIn'))
            return redirect()->to('home');

        return view('main');
	}

	//--------------------------------------------------------------------

}
