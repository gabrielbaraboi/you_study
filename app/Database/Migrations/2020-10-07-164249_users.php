<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'id'					=> ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'email'					=> ['type' => 'VARCHAR', 'constraint' => 50],
            'firstname'				=> ['type' => 'VARCHAR', 'constraint' => 40],
            'lastname'				=> ['type' => 'VARCHAR', 'constraint' => 40],
            'password'				=> ['type' => 'VARCHAR', 'constraint' => 255],
            'role'				    => ['type' => 'ENUM', 'constraint' => ['student', 'teacher', 'admin', 'root'], 'default' => 'student'],
            'groups'			    => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'created_at'			=> ['type' => 'DATETIME', 'null' => true],
            'updated_at'            => ['type' => 'DATETIME', 'null' => true]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('users', true);
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->forge->dropTable('users', true);
	}
}
