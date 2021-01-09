<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Validation\UserRules;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[6]|max_length[255]|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Email or Password don\'t match'
                ]
            ];

            if (! $this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            }else{
                $model = new UserModel();

                $user = $model->where('email', $this->request->getVar('email'))
                    ->first();

                $this->setUserSession($user);
                return redirect()->to('home');

            }
        }

        return view('login', $data);
    }

    private function setUserSession($user){
        $data = [
            'id' => $user['id'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'email' => $user['email'],
            'role' => $user['role'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function logout(){
        session()->destroy();
        return redirect()->to('/');
    }

}
