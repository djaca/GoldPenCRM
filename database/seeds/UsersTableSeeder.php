<?php

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
        DB::table('users')->insert([
            'role_id' => '1',
            'is_active' => '1',
            'name' => 'Mike Stratton',
            'email' => 'mike@sunnytree.org',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'is_active' => '1',
            'name' => 'Manager',
            'email' => 'manager@sunnytree.org',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'role_id' => '3',
            'is_active' => '1',
            'name' => 'Agent',
            'email' => 'agent@sunnytree.org',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'role_id' => '4',
            'is_active' => '1',
            'name' => 'Subscriber',
            'email' => 'subscriber@sunnytree.org',
            'password' => bcrypt('password'),
        ]);
    }
}
