<?php namespace App\Controllers;

use App\Models\GroupModel;
use App\Models\PassQuizModel;
use App\Models\QuizModel;
use App\Models\UserModel;
use Config\Services;

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

    public function view($id)
    {
        $data = [];
        $model = new UserModel();
        $quizModel = new QuizModel();
        $groupModel = new GroupModel();
        $passModel = new PassQuizModel();
        $user = $model->where('id', session()->get('id'))->first();
        $quiz = $quizModel->where('id', $id)->first();;
        $teacher = $model->where('id', $quiz['teacher_id'])->first();
        $group = $groupModel->where('id', $quiz['group_id'])->first();
        $passed = $passModel->where('quiz_id', $id)->findAll();
        $data['user'] = $user;
        $data['quiz'] = $quiz;
        $data['teacher'] = $teacher;
        $data['group'] = $group;
        $data['passed'] = $passed;
        $data['start'] = False;
        $data['mark'] = 'You did not pass the test!';

        $date = date('Y-m-d H:i:s');

        if ($date < $quiz['end_time'] and $date > $quiz['start_time'])
            $data['start'] = True;

        for ($i = 1; $i <= count($passed); $i++) {
            if ($passed[$i - 1]['student_id'] == session()->get('id')) {
                $data['start'] = False;
                $data['mark'] = $passed[$i - 1]['mark'];
                break;
            }
        }

        return view('quiz', $data);
    }

    public function all()
    {
        $data = [];
        $model = new UserModel();
        $quizModel = new QuizModel();
        $groupModel = new GroupModel();
        $currentUser = $model->find(session()->get('id'));
        $groups = $groupModel->findAll();
        $quizzes = $quizModel->findAll();
        $teachers = $model->where('role', 'teacher')->findAll();
        $data['currentUser'] = $currentUser;
        $data['quizzes'] = $quizzes;
        $data['teachers'] = $teachers;
        $data['groups'] = $groups;

        return view('dashboard\quizzes_all', $data);
    }

    public function passed()
    {
        $data = [];
        $model = new UserModel();
        $passedModel = new PassQuizModel();
        $quizModel = new QuizModel();
        $groupModel = new GroupModel();
        $currentUser = $model->find(session()->get('id'));
        $quizzes = $quizModel->findAll();
        $users = $model->findAll();
        $passedQuizzes = $passedModel->findAll();
        $groups = $groupModel->findAll();
        $teachers = $model->where('role', 'teacher')->findAll();
        $data['currentUser'] = $currentUser;
        for ($i = 1; $i <= count($passedQuizzes); $i++) {
            for ($j = 1; $j <= count($quizzes); $j++) {
                if ($quizzes[$j - 1]['id'] == $passedQuizzes[$i - 1]['quiz_id']) {
                    $passedQuizzes[$i - 1]['title'] = $quizzes[$j - 1]['title'];
                    break;
                }
            }
            for ($t = 1; $t <= count($groups); $t++) {
                if ($groups[$t - 1]['id'] == $quizzes[$passedQuizzes[$i - 1]['quiz_id'] - 1]['group_id']) {
                    $passedQuizzes[$i - 1]['group_name'] = $groups[$t - 1]['name'];
                    break;
                }
            }
            for ($k = 1; $k <= count($users); $k++) {
                if ($users[$k - 1]['id'] == $passedQuizzes[$i - 1]['student_id']){
                    $passedQuizzes[$i - 1]['student'] = $users[$k - 1]['firstname'] . ' ' . $users[$k - 1]['lastname'];
                    break;
                }
            }
        }
        $data['quizzes'] = $passedQuizzes;
        $data['teachers'] = $teachers;
        $data['groups'] = $groups;

        return view('dashboard\quizzes_passed', $data);
    }

    public function create_1()
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

    public function create_2()
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
                    $array = preg_split("/\r\n|\n|\r/", $this->request->getVar($answer));
                    array_push($answers, $array);
                }
                $answers = serialize($answers);

                $correct_answers = [];
                for ($i = 1; $i <= $this->request->getVar('questions_count'); $i++) {
                    $correct_answer = 'correct-' . $i;
                    array_push($correct_answers, $this->request->getVar($correct_answer));
                }
                $correct_answers = serialize($correct_answers);

                $newData = [
                    'title' => $this->request->getVar('title'),
                    'teacher_id' => $currentUser['id'],
                    'group_id' => $this->request->getVar('group_id'),
                    'questions_count' => $this->request->getVar('questions_count'),
                    'questions' => $questions,
                    'answers' => $answers,
                    'correct_answers' => $correct_answers,
                    'start_time' => $this->request->getVar('start_time'),
                    'end_time' => $this->request->getVar('end_time'),
                ];

                $quizModel->save($newData);
                return redirect()->to(base_url('dashboard/quizzes/all'));
            }
        }
        return view('dashboard\quizzes_new_2', $data);
    }

    public function answer($id)
    {
        $data = [];
        $model = new UserModel();
        $quizModel = new QuizModel();
        $groupModel = new GroupModel();
        $passModel = new PassQuizModel();
        $user = $model->where('id', session()->get('id'))->first();
        $quiz = $quizModel->where('id', $id)->first();;
        $group = $groupModel->where('id', $quiz['group_id'])->first();;
        $teacher = $model->where('id', $quiz['teacher_id'])->first();
        $data['user'] = $user;
        $data['quiz'] = $quiz;
        $data['teacher'] = $teacher;
        $data['group'] = $group;
        $data['start'] = False;

        $answers = unserialize($quiz['answers']);
        $correct_answers = unserialize($quiz['correct_answers']);
        for ($i = 1; $i <= $quiz['questions_count']; $i++) {
            array_push($answers[$i - 1], $correct_answers[$i - 1]);
            shuffle($answers[$i - 1]);
        }

        $data['answers'] = $answers;
        $date = date('Y-m-d H:i:s');

        if ($date < $quiz['end_time'] and $date > $quiz['start_time'])
            $data['start'] = True;

        if (!$data['start'])
            return redirect()->to(base_url('quizzes'));
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $answers = [];
            $correct_answers_count = 0;
            for ($i = 1; $i <= $quiz['questions_count']; $i++) {
                $answer = 'answer-' . $i;
                array_push($answers, $this->request->getVar($answer));
                if (strcmp($answers[$i - 1], $correct_answers[$i - 1]) == 0) {
                    $correct_answers_count++;
                }
            }
            $answers = serialize($answers);

            if ($correct_answers_count == $quiz['questions_count']) {
                $mark = 10;
            } else if ($correct_answers_count == 0) {
                $mark = 0;
            } else {
                $mark = round(round(10 / $quiz['questions_count'], 2) * $correct_answers_count, 2);
            }

            $newData = [
                'quiz_id' => $id,
                'student_id' => $user['id'],
                'answers' => $answers,
                'mark' => $mark
            ];

            $passModel->save($newData);
            return redirect()->to(base_url('quizzes/' . $id));
        }

        return view('quiz_answer', $data);
    }

    public function delete($id)
    {
        $model = new QuizModel();

        $model->where('id', $id)->delete();
        $model->purgeDeleted();

        return redirect()->to(base_url('dashboard/quizzes/all'));
    }
}
