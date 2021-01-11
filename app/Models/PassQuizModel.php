<?php namespace App\Models;

use CodeIgniter\Model;

class PassQuizModel extends Model
{
    protected $table = 'passed_quizzes';
    protected $allowedFields = ['quiz_id', 'student_id', 'answers', 'mark'];

}