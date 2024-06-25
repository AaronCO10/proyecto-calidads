<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CampaniaSeeder;
use Database\Seeders\TipoSangreSeeder;
use Illuminate\Support\Facades\Storage;
use DragonCode\Contracts\Routing\Core\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(CampaniaSeeder::class);
        $this->call(TipoSangreSeeder::class);
        $this->call(UserSeeder::class);
    }
}
