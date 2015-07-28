<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//recordar composer dump-autoload

        \DB::table('USUARIOS')->insert(array (
        	'name' => 'joaquin',
        	'email' => 'jastudillo@gitech.cl',
        	'password' => \Hash::make('1234')
        ));

        \DB::table('USUARIOS')->insert(array (
            'name' => 'roberto',
            'email' => 'resparza@gitech.cl',
            'password' => \Hash::make('1234')
        ));

        \DB::table('USUARIOS')->insert(array (
            'name' => 'mauricio',
            'email' => 'mpaez@gitech.cl',
            'password' => \Hash::make('1234')
        ));

    }
}
