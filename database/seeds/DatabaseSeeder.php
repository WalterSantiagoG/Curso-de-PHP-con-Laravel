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
        // $this->call(UsersTableSeeder::class);
        //factory(App\Message::class, 100)->create();//Segundo parametro la cantidad de mensajes a crear
        factory(App\Message::class)
            ->times(100)
            ->create(); //Otra forma
        //factory(App\Message::class)->create();//1 solo mensaje
    }
}
