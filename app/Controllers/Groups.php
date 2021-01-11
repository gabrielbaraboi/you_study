<?php namespace App\Controllers;

use App\Models\QuizModel;
use App\Models\UserModel;
use App\Models\GroupModel;
use Config\Services;

class Groups extends BaseController
{
    public function index()
    {
        $data = [];
        $model = new UserModel();
        $groupModel = new GroupModel();
        $currentUser = $model->find(session()->get('id'));
        $groups = $groupModel->findAll();
        $data['currentUser'] = $currentUser;
        $data['groups'] = $groups;

        return view('dashboard\groups_all', $data);
    }

    public function create()
    {
        $data = [];
        $model = new UserModel();
        $groupModel = new GroupModel();
        $currentUser = $model->find(session()->get('id'));
        $data['currentUser'] = $currentUser;
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'name' => 'required|min_length[2]|max_length[20]',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {

                $newData = [
                    'name' => $this->request->getVar('name'),
                ];
                $groupModel->save($newData);
                return redirect()->to(base_url('dashboard/groups/all'));

            }
        }
        return view('dashboard\groups_new', $data);
    }

    public function edit($id)
    {
        $data = [];
        $model = new UserModel();
        $groupModel = new GroupModel();
        $currentUser = $model->find(session()->get('id'));
        $data['currentUser'] = $currentUser;

        $group = $groupModel->where('id', $id)
            ->first();

        if ($group == null) {
            return redirect()->to(base_url('dashboard/groups/all'));
        } else {
            $data['group'] = $group;

            if ($this->request->getMethod() == 'post') {
                $rules = [
                    'name' => 'required|min_length[2]|max_length[20]',
                ];

                if (!$this->validate($rules)) {
                    $data['validation'] = $this->validator;
                } else {
                    $newData = [
                        'name' => $this->request->getVar('name')
                    ];
                    $groupModel->update($id, $newData);
                    return redirect()->to(base_url('dashboard/groups/all'));
                }
            }
        }
        return view('dashboard\groups_edit', $data);
    }

    public function delete($id)
    {
        $model = new GroupModel();

        $model->where('id', $id)->delete();
        $model->purgeDeleted();

        return redirect()->to(base_url('dashboard/groups/all'));
    }
}
