<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTableSeeder extends Seeder {
    private function randDate() {
	return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
    }
    
    public function run(){
        DB::table('users')->delete();

        for($i = 0; $i < 5; ++$i) {
            DB::table('users')->insert([
                'name' => 'Nom' . $i,
                'email' => 'email' . $i . '@blop.fr',
                'password' => bcrypt('password' . $i),
                'admin' => rand(0, 1)
            ]);
        }
    }
}