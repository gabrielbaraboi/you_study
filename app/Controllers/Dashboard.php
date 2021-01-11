<?php namespace App\Controllers;

use App\Models\QuizModel;
use App\Models\UserModel;
use App\Models\GroupModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [];
        $model = new UserModel();
        $quizModel = new QuizModel();
        $groupModel = new GroupModel();
        $currentUser = $model->find(session()->get('id'));
        $data['currentUser'] = $currentUser;
        $teachers = $model->where('role', 'teacher')->findAll();
        $students = $model->where('role', 'student')->findAll();
        $groups = $groupModel->findAll();
        $quizzes = $quizModel->findAll();
        $data['teachers'] = count($teachers);
        $data['students'] = count($students);
        $data['groups'] = count($groups);
        $data['quizzes'] = count($quizzes);


        return view('dashboard\dashboard', $data);
    }
}
