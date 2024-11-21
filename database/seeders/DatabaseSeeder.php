<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            ['email' => 'betofoxnet.info@betofoxnet.com'],
            'name' => 'Humberto Ribeiro',
            'password' => Hash::make('123456@Laravel'),
        ]);
    }
}
