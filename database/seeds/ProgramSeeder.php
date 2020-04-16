<?php

use Illuminate\Database\Seeder;
use App\Models\Hr\Program;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $programs = [
            [
                'name' => 'software engineering',
            ],
            [
                'name' => 'Electrical engineering',
            ],
            [
                'name' => 'Medical',
            ],
            [
                'name' => 'Social Sciences',
            ],
        ];

        foreach ($programs as $program) {
            Program::create($program);
        }
    }
}
