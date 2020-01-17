<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::query()->create([
            'name' => 'admin',
            'mobile' => '13500000000',
            'email' => 'admin@example.com',
            'avatar' => 'https://cdn.51zts.com/FnnisPEhU7czoQWy4qh1PwKXP0iM.jpg',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'remember_token' => Str::random(10),
        ]);
        factory(User::class, 10)->create();
    }
}
