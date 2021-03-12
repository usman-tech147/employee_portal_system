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
        $this->call(CourseLevel_ProgramSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(CourseProgramSeeder::class);
        $this->call(SchoolSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(UserTableSeeder::class);
        factory(App\Models\Teacher\Teaching\CourseDetail::class,10)->create();
        factory(App\Models\Teacher\Teaching\CourseAssessment::class, 10)->create();
        factory(App\Models\Teacher\Teaching\NewCourse::class, 10)->create();
        factory(App\Models\Teacher\Teaching\ThesisSupervised::class, 10)->create();
        factory(App\Models\Teacher\Teaching\ProjectSupervision::class, 10)->create();
        factory(App\Models\Teacher\Teaching\WorkshopTerminal::class, 10)->create();
        factory(App\Models\Teacher\Advising\BatchAdvising::class, 10)->create();
        factory(App\Models\Teacher\ResearchAndPublications\TravelAndResearch::class,10)->create();

    }
}
