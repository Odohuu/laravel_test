<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MainTest::class);
    }
}

class MainTest extends Seeder
{
    
    public function run()
    {
        DB::table('admins')->insert([
            'username' => 'admin',
            'email' => 'admin@laravel.com',
            'password' => bcrypt(123)
        ]);
        
        $this->command->info('Admin added');
    }
}