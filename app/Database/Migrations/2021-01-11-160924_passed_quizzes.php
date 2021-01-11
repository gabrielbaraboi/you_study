<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PassedQuizzed extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'					=> ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'quiz_id'			    => ['type' => 'INT', 'null' => true],
            'student_id'			=> ['type' => 'INT', 'null' => true],
            'answers'			    => ['type' => 'TEXT', 'null' => true],
            'mark'	                => ['type' => 'TEXT', 'null' => true]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('passed_quizzes', true);
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('passed_quizzes', true);
    }
}
