<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Quizzes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'					=> ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'title'					=> ['type' => 'VARCHAR', 'constraint' => 50],
            'teacher_id'			=> ['type' => 'INT', 'null' => true],
            'group_id'			    => ['type' => 'INT', 'null' => true],
            'questions'			    => ['type' => 'TEXT', 'null' => true],
            'answers'			    => ['type' => 'TEXT', 'null' => true],
            'questions_count'		=> ['type' => 'INT', 'null' => true],
            'start_time'			=> ['type' => 'TIMESTAMP', 'null' => true],
            'end_time'			    => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('quizzes', true);
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('quizzes', true);
    }
}
