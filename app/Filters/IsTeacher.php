<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

use App\Models\UserModel;

class IsTeacher implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $data = [];
        $model = new UserModel();
        $user = $model->where('id', session()->get('id'))
            ->first();
        $data['user'] = $user;
        if(! session()->get('isLoggedIn')){
            return redirect()->to('/');
        }
        if (strcmp($user['role'], 'admin') == 0) {
            return redirect()->to('/dashboard');
        }
        if (strcmp($user['role'], 'student') == 0) {
            return redirect()->to('/home');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}