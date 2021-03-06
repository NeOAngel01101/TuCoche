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
        factory(App\User::class, 20)->create()->each(function (App\User $user){
            factory(\App\Coche::class,10)->create(['user_id' => $user->id]);
        });

    }
}
