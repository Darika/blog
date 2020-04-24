<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->insert([
			'name' => 'Admin',
			'email' => 'admin@test.loc',
			'password' => bcrypt('password'),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now()
		]);
		factory(App\User::class, 15)->create();
	}
}
