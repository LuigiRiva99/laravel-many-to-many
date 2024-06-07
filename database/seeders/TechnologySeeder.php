<?php

namespace Database\Seeders;

use App\Models\Technology;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;


class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //DB::table('Projects')->truncate();
        $technologies = ['CSS', 'JS', 'SQL', 'VUE', 'PHP', 'LARAVEL'];

        $projects_ids = Project::all()->pluck('id'); 

        foreach ($technologies as $tec_name) {
            $new_tec = new Technology();
            $new_tec->name = $tec_name;

            $new_tec->save();

            $random_projects_ids = $faker->randomElements($projects_ids, null);
            $new_tec->projects()->attach($random_projects_ids);

        }
    }
}
