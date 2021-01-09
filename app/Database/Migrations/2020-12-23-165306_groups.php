<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Groups extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'					=> ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'name'					=> ['type' => 'VARCHAR', 'constraint' => 50],
            'created_at'			=> ['type' => 'DATETIME', 'null' => true],
            'updated_at'            => ['type' => 'DATETIME', 'null' => true]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('groups', true);
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('groups', true);
    }
}
