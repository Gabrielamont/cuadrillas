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
        // $this->call(UsersTableSeeder::class);

        App\User::create([
          'name'   => 'Admin',
          'user'   => 'Admin',
          'email'     => 'admin@admin.com',
          'password'  => bcrypt('admin123456')
        ]);
    }
}
