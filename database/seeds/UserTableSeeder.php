<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
        	[
        		'id' => '1',
        		'name' => 'Eric Bastarache',
        		'email' => 'eric_bastarache@hotmail.com',
        		'password' => bcrypt('testpass')
        	],
        	[
        		'id' => '2',
        		'name' => 'Evelyn Butler',
        		'email' => 'aibhlin.b031913@hotmail.ca',
        		'password' => bcrypt('1234567890')
        	]
        ]);
    }
}
