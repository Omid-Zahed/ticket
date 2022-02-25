<?php

namespace Database\Seeders;

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
        $course = \App\Models\Course::factory(10)->create();
        $moodle_user = \App\Models\MoodleUser::factory(10)->create();
        \App\Models\Report::factory(10)->create();
        $course->each(function (\App\Models\Course $r) use ($moodle_user) {
            $r->moodle_users()->attach(
                $moodle_user->random(rand(5, 10))->pluck('id')->toArray(),
            );
        });
    }
}
