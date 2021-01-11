<?php namespace App\Controllers;

use App\Models\GroupModel;
use App\Models\QuizModel;
use App\Models\UserModel;

class Quiz extends BaseController
{
    public function index()
    {
        $data = [];
        $model = new UserModel();
        $quizModel = new QuizModel();
        $groupModel = new GroupModel();
        $user = $model->where('id', session()->get('id'))->first();
        $groups = $groupModel->findAll();
        $quizzes = $quizModel->findAll();
        $teachers = $model->where('role', 'teacher')->findAll();
        $data['user'] = $user;
        $data['quizzes'] = $quizzes;
        $data['teachers'] = $teachers;
        $data['groups'] = $groups;


        return view('quizzes', $data);
    }

    public function view_quiz($id)
    {
        $data = [];
        $model = new UserModel();
        $quizModel = new QuizModel();
        $groupModel = new GroupModel();
        $user = $model->where('id', session()->get('id'))->first();
        $quiz = $quizModel->where('id', $id)->first();;
        $group = $groupModel->where('id', $quiz['group_id'])->first();;
        $teacher = $model->where('id',  $quiz['teacher_id'])->first();
        $data['user'] = $user;
        $data['quiz'] = $quiz;
        $data['teacher'] = $teacher;
        $data['group'] = $group;
        $data['start'] = False;

        $date = date('Y-m-d H:i:s');

        if ($date < $quiz['end_time'] and $date > $quiz['start_time'])
            $data['start'] = True;

        return view('quiz', $data);
    }

    public function answer_quiz($id)
    {
        $data = [];
        $model = new UserModel();
        $quizModel = new QuizModel();
        $groupModel = new GroupModel();
        $user = $model->where('id', session()->get('id'))->first();
        $quiz = $quizModel->where('id', $id)->first();;
        $group = $groupModel->where('id', $quiz['group_id'])->first();;
        $teacher = $model->where('id',  $quiz['teacher_id'])->first();
        $data['user'] = $user;
        $data['quiz'] = $quiz;
        $data['teacher'] = $teacher;
        $data['group'] = $group;
        $data['start'] = False;

        $answers = unserialize($quiz['answers']);

        $data['answers'] = $answers;
        $date = date('Y-m-d H:i:s');

        if ($date < $quiz['end_time'] and $date > $quiz['start_time'])
            $data['start'] = True;

        return view('quiz_answer', $data);
    }
}
