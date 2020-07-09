<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // BooksSeederを読み込むように指定
        $this->call([
            BooksSeeder::class,
            UserSeeder::class,
            MstUserSeeder::class,
        ]);
    }
}
