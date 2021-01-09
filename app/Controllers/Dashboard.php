<?php namespace App\Controllers;

use App\Models\QuizModel;
use App\Models\UserModel;
use App\Models\GroupModel;
use Config\Services;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [];
        $model = new UserModel();
        $currentUser = $model->find(session()->get('id'));
        $data['currentUser'] = $currentUser;

        return view('dashboard\dashboard', $data);
    }

    public function all_users()
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

    public function new_user()
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

    public function edit_user($id)
    {
        $data = [];
        $model = new UserModel();
        $currentUser = $model->find(session()->get('id'));
        $data['currentUser'] = $currentUser;

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

                    if ($this->request->getVar('password') == null) {
                        $newData = [
                            'firstname' => $this->request->getVar('firstname'),
                            'lastname' => $this->request->getVar('lastname'),
                            'email' => $this->request->getVar('email'),
                        ];
                    } else {
                        $newData = [
                            'firstname' => $this->request->getVar('firstname'),
                            'lastname' => $this->request->getVar('lastname'),
                            'email' => $this->request->getVar('email'),
                            'password' => $this->request->getVar('password'),
                        ];
                    }
                    $model->update($id, $newData);
                    return redirect()->to(base_url('dashboard/users/all'));

                }
            }
        }

        return view('dashboard\users_edit', $data);
    }

    public function all_groups()
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

    public function new_group()
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

    public function edit_group($id)
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

    public function assign($id)
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
                if ($this->request->getVar('userGroups')) {
                    $serializedGroups = serialize($this->request->getVar('userGroups'));

                    $newData = [
                        'groups' => $serializedGroups
                    ];

                    $model->update($id, $newData);
                    return redirect()->to(base_url('dashboard/users/all'));
                } else {
                    $groupId = $this->request->getVar('userGroup');

                    $newData = [
                        'groups' => $groupId
                    ];

                    $model->update($id, $newData);
                    return redirect()->to(base_url('dashboard/users/all'));

                }
            }

            return view('dashboard/users/all', $data);
        }

    }

    public function new_quiz_1()
    {
        $data = [];
        $model = new UserModel();
        $groupModel = new GroupModel();
        $groups = $groupModel->findAll();
        $session = Services::session();
        $currentUser = $model->find(session()->get('id'));
        $data['currentUser'] = $currentUser;
        $data['groups'] = $groups;

        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'group_id' => 'required',
                'questions_count' => 'required',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $group_id = $this->request->getVar('group_id');
                $questions_count = $this->request->getVar('questions_count');
                $session->setFlashdata('group_id', $group_id);
                $session->setFlashdata('questions_count', $questions_count);
                return redirect()->to(base_url('dashboard/quizzes/new/2'));

            }
        }
        return view('dashboard\quizzes_new_1', $data);
    }

    public function new_quiz_2()
    {
        $data = [];
        $model = new UserModel();
        $quizModel = new QuizModel();
        $currentUser = $model->find(session()->get('id'));
        $data['currentUser'] = $currentUser;
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'title' => 'required|min_length[5]|max_length[50]',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {

                $questions = [];
                for ($i = 1; $i <= $this->request->getVar('questions_count'); $i++) {
                    $question = 'question-' . $i;
                    array_push($questions, $this->request->getVar($question));
                }
                $questions = serialize($questions);
                $answers = [];
                for ($i = 1; $i <= $this->request->getVar('questions_count'); $i++) {
                    $answer = 'answer-' . $i;
                    array_push($answers, $this->request->getVar($answer));
                }
                $answers = serialize($answers);
                $newData = [
                    'title' => $this->request->getVar('title'),
                    'teacher_id' => $currentUser['id'],
                    'group_id' => $this->request->getVar('group_id'),
                    'questions_count' => $this->request->getVar('questions_count'),
                    'questions' => $questions,
                    'answers' => $answers,
                    'start_time' => $this->request->getVar('start_time'),
                    'end_time' => $this->request->getVar('end_time'),
                ];

                $quizModel->save($newData);
                return redirect()->to(base_url('dashboard/quizzes/all'));
            }
        }
        return view('dashboard\quizzes_new_2', $data);
    }
}
