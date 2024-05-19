<?php


use Illuminate\Database\Seeder;
use Database\Seeders\SiswaSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Siswa::factory(100)->create();
        // $this->call([UsersTableSeeder::class]);
        $this->call([SiswaSeeder::class]);
    }
}
