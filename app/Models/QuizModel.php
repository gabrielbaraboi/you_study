<?php namespace App\Models;

use CodeIgniter\Model;

class QuizModel extends Model
{
    protected $table = 'quizzes';
    protected $allowedFields = ['title', 'teacher_id', 'group_id', 'questions', 'answers', 'questions_count', 'start_time', 'end_time'];

}