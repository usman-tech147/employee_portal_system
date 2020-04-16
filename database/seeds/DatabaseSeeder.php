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
        $this->call(RoleSeeder::class);
        $this->call(CourseLevelSeeder::class);
        $this->call(ProgramSeeder::class);
        $this->call(SchoolSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(UserTableSeeder::class);
        factory(App\Models\Teacher\Teaching\CourseDetail::class,20)->create();
        factory(App\Models\Teacher\Teaching\CourseAssessment::class, 20)->create();
    }
}
