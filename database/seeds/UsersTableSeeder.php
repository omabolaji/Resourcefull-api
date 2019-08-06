<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Book;
use App\Rating;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 5)->create();
            // $user->books()->save(factory(App\Book::class)->make());
            // $user->ratings()->save(factory(App\Rating::class)->make());
        // });
    }
}
