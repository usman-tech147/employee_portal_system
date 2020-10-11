<?php

use Illuminate\Database\Seeder;
use App\User;
use App\EmployeeFinalReport;
use Spatie\Permission\Models\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teachers = [
            [
                'first_name' => 'tayab',
                'last_name' => 'tayab',
                'email' => 'tayab@gmail.com',
                'email_verified_at' => now(),
                'designation' => 'professor',
                'gender' => 'male',
                'department_id' => 1,
                'password' => bcrypt('tayab_147'),
                'remember_token' => Str::random(10),
            ],
            [
                'first_name' => 'saad',
                'last_name' => 'saad',
                'email' => 'saad@gmail.com',
                'email_verified_at' => now(),
                'designation' => 'assistant professor',
                'gender' => 'male',
                'department_id' => 1,
                'password' => bcrypt('saad_147'),
                'remember_token' => Str::random(10),
            ],
            [
                'first_name' => 'ahsan',
                'last_name' => 'ahsan',
                'email' => 'ahsan@gmail.com',
                'email_verified_at' => now(),
                'designation' => 'professor',
                'gender' => 'male',
                'department_id' => 1,
                'password' => bcrypt('ahsan_147'),
                'remember_token' => Str::random(10),
            ],
        ];

        $hrs = [
            [
                'first_name' => 'shehzad',
                'last_name' => 'shehzad',
                'email' => 'shehzad@gmail.com',
                'email_verified_at' => now(),
                'gender' => 'male',
                'password' => bcrypt('shehzad_147'),
                'remember_token' => Str::random(10),
            ],
            [
                'first_name' => 'usman',
                'last_name' => 'usman',
                'email' => 'usman@gmail.com',
                'email_verified_at' => now(),
                'gender' => 'male',
                'password' => bcrypt('usman_147'),
                'remember_token' => Str::random(10),
            ]
        ];

        $deans = [
            [
                'first_name' => 'ans',
                'last_name' => 'arif',
                'email' => 'ans@gmail.com',
                'email_verified_at' => now(),
                'gender' => 'male',
                'password' => bcrypt('ans_147'),
                'remember_token' => Str::random(10),
            ],
        ];

        foreach ($deans as $dean) {
            $u = User::create($dean);
            $u->assignRole('dean');
        }

        foreach ($teachers as $teaher) {
            $u = User::create($teaher);
            $u->assignRole('teacher');
        }

        foreach ($hrs as $hr) {
            $u = User::create($hr);
            $u->assignRole('hr');
        }

    }
}
