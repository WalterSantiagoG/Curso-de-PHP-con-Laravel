<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 50)->create()->each(function(App\User $user){
            factory(App\Message::class)
            ->times(20)
            ->create([
                'user_id' => $user->id,
            ]);
        });
        // $this->call(UsersTableSeeder::class);
        //factory(App\Message::class, 100)->create();//Segundo parametro la cantidad de mensajes a crear
        //factory(App\Message::class)
            //->times(20)
            //->create([
            //    'user_id' => $user->id,
            //]); //Otra forma
        //factory(App\Message::class)->create();//1 solo mensaje
    }
}
