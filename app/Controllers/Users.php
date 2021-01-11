<?php namespace App\Controllers;

use App\Models\QuizModel;
use App\Models\UserModel;
use App\Models\GroupModel;
use Config\Services;

class Users extends BaseController
{
    public function index()
    {
        $data = [];
        $model = new UserModel();
        $groupModel = new GroupModel();
        $groups = $groupModel->findAll();
        $currentUser = $model->find(session()->get('id'));
        $users = $model->findAll();
        $data['currentUser'] = $currentUser;
        $data['groups'] = $groups;
        $data['users'] = $users;

        return view('dashboard\users_all', $data);
    }

    public function create()
    {
        $data = [];
        $model = new UserModel();
        $currentUser = $model->find(session()->get('id'));
        $data['currentUser'] = $currentUser;
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[6]|max_length[255]',
                'password_confirm' => 'matches[password]',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {

                $newData = [
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                ];
                $model->save($newData);
                return redirect()->to(base_url('dashboard/users/all'));

            }
        }
        return view('dashboard\users_new', $data);
    }

    public function edit($id)
    {
        $data = [];
        $model = new UserModel();
        $groupModel = new GroupModel();
        $groups = $groupModel->findAll();
        $currentUser = $model->find(session()->get('id'));
        $data['currentUser'] = $currentUser;
        $data['groups'] = $groups;

        $user = $model->where('id', $id)
            ->first();

        if ($user == null) {
            return redirect()->to(base_url('dashboard/users/all'));
        } else {
            $data['user'] = $user;

            if ($this->request->getMethod() == 'post') {
                $rules = [
                    'firstname' => 'required|min_length[3]|max_length[20]',
                    'lastname' => 'required|min_length[3]|max_length[20]',
                    'email' => 'required|min_length[6]|max_length[50]|valid_email',
                    'password' => 'max_length[255]',
                    'password_confirm' => 'matches[password]',
                ];

                if (!$this->validate($rules)) {
                    $data['validation'] = $this->validator;
                } else {
                    if (strcmp($user['role'], 'teacher') == 0) {
                        $group = serialize($this->request->getVar('userGroups'));
                    } else {
                        $group = $this->request->getVar('userGroup');
                    }
                    if ($this->request->getVar('password') == null) {
                        $newData = [
                            'firstname' => $this->request->getVar('firstname'),
                            'lastname' => $this->request->getVar('lastname'),
                            'email' => $this->request->getVar('email'),
                            'role' => $this->request->getVar('role'),
                            'groups' => $group,
                        ];
                    } else {
                        $newData = [
                            'firstname' => $this->request->getVar('firstname'),
                            'lastname' => $this->request->getVar('lastname'),
                            'email' => $this->request->getVar('email'),
                            'password' => $this->request->getVar('password'),
                            'role' => $this->request->getVar('role'),
                            'groups' => $group,
                        ];
                    }
                    $model->update($id, $newData);
                    return redirect()->to(base_url('dashboard/users/all'));

                }
            }
        }

        return view('dashboard\users_edit', $data);
    }

    public function delete($id)
    {
        $model = new UserModel();

        $model->where('id', $id)->delete();
        $model->purgeDeleted();

        return redirect()->to(base_url('dashboard/users/all'));
    }
}
