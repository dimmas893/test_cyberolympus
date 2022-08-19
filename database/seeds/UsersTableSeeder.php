<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['first_name' => 'admin', 'email' => 'admin@cyberolympus.com', 'password' => bcrypt('cyberadmin'), 'account_role' => ' administrator'];
        User::insert($data);
    }
}
