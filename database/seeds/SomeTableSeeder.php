<?php

use Illuminate\Database\Seeder;

class SomeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 0; $i < 10; $i++) {
            $pass = str_random(10);
            \App\Models\User::create([
                'email' => 'user' . $i . '@mail.ru',
                'password' => bcrypt($pass),
                'name' => 'Default user #' . $i
            ]);
            echo 'user' . $i . '@mail.ru: ' . $pass."\n";
        }
    }
}
