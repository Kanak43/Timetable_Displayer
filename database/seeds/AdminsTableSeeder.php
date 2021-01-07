<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('admins')->insert(array(
        	array(
				'name' => "joy",
				'email' => 'joy@gmail.com',
				'password' => bcrypt('123456'),
        	),
        	array(
				'name' => "joy",
				'email' => 'kanak@gmail.com',
				'password' => bcrypt('123456'),
        	)
        ));

    }
}
