<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $user1 = [
            'firstname' => 'Gabriel',
            'lastname' => 'Baraboi R',
            'email' => 'root@gmail.com',
            'role' => 'root',
            'password' => password_hash('123123', PASSWORD_DEFAULT),
            'created_at' => date("Y-m-d H:i:s")
        ];

        $user2 = [
            'firstname' => 'Gabriel',
            'lastname' => 'Baraboi A',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => password_hash('123123', PASSWORD_DEFAULT),
            'created_at' => date("Y-m-d H:i:s")

        ];

        $user3 = [
            'firstname' => 'Gabriel',
            'lastname' => 'Baraboi T',
            'email' => 'teacher@gmail.com',
            'role' => 'teacher',
            'groups' => 'a:2:{i:0;s:1:"2";i:1;s:1:"3";}',
            'password' => password_hash('123123', PASSWORD_DEFAULT),
            'created_at' => date("Y-m-d H:i:s")

        ];

        $user4 = [
            'firstname' => 'Gabriel',
            'lastname' => 'Baraboi S',
            'email' => 'student@gmail.com',
            'role' => 'student',
            'groups' => '2',
            'password' => password_hash('123123', PASSWORD_DEFAULT),
            'created_at' => date("Y-m-d H:i:s")
        ];

        $user5 = [
            'firstname' => 'Gabriel',
            'lastname' => 'Baraboi S2',
            'email' => 'student2@gmail.com',
            'role' => 'student',
            'groups' => '1',
            'password' => password_hash('123123', PASSWORD_DEFAULT),
            'created_at' => date("Y-m-d H:i:s")
        ];

        $group1 = [
            'name' => 'A1',
            'created_at' => date("Y-m-d H:i:s")
        ];

        $group2 = [
            'name' => 'A2',
            'created_at' => date("Y-m-d H:i:s")
        ];

        $group3 = [
            'name' => 'A3',
            'created_at' => date("Y-m-d H:i:s")
        ];

        $quiz1 = [
            'title' => 'Quiz 1',
            'teacher_id' => '3',
            'group_id' => '2',
            'questions' => 'a:2:{i:0;s:10:"Question 1";i:1;s:11:"Question 2 ";}',
            'answers' => 'a:2:{i:0;a:3:{i:0;s:7:"1231dwd";i:1;s:5:"gffhj";i:2;s:5:"xcxvb";}i:1;a:2:{i:0;s:6:"ouigng";i:1;s:4:"dfdb";}}',
            'correct_answers' => 'a:2:{i:0;s:4:"test";i:1;s:5:"test2";}',
            'questions_count' => '2',
            'start_time' => date('Y-m-d H:i:s'),
            'end_time' => date('Y-m-d H:i:s', strtotime('120 minute'))
        ];

        $this->db->table('users')->insert($user1);
        $this->db->table('users')->insert($user2);
        $this->db->table('users')->insert($user3);
        $this->db->table('users')->insert($user4);
        $this->db->table('users')->insert($user5);
        $this->db->table('groups')->insert($group1);
        $this->db->table('groups')->insert($group2);
        $this->db->table('groups')->insert($group3);
        $this->db->table('quizzes')->insert($quiz1);
    }
}
