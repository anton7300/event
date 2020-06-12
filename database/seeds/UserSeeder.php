<?php

use Illuminate\Database\Seeder;
use App\User;
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
        User::query()->forceDelete();

        $users = [
            [
                'nickname' => 'admin',
                'email' => 'admin@admin.admin',
                'password' => 'adminadmin',
                'name' => 'Admin',
                'phone' => '+333333333333',
                'age' => '1999-11-22',
                'gender' => 1,
                'location' => 'Minsk',
                'interest_id' => null
            ],
            [
                'nickname' => 'user',
                'email' => 'user@user.user',
                'password' => 'useruser',
                'name' => 'User',
                'phone' => '+222222222222',
                'age' => '2000-10-20',
                'gender' => 2,
                'location' => 'Brest',
                'interest_id' => null
            ]
        ];

        foreach ($users as $item) {
            $user = User::create([
                'nickname' => $item['nickname'],
                'email' => $item['email'],
                'password' => Hash::make($item['password']),
            ]);

            $user->profile()->create([
                'name' => $item['name'],
                'age' => $item['age'],
                'gender' => $item['gender'],
                'location' => $item['location'],
            ]);

            $user->phones()->create([
                'phone' => $item['phone'],
            ]);

            $user->emails()->create([
                'email' => $item['email'],
            ]);
        }
    }
}
