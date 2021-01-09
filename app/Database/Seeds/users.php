<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $data = [
            'firstname' => 'Gabriel',
            'lastname' => 'Baraboi',
            'email'    => 'gabrielbaraboigames@gmail.com',
            'role' => 'root',
            'password'    => password_hash('123123', PASSWORD_DEFAULT)
        ];

        $this->db->table('users')->insert($data);
    }
}
