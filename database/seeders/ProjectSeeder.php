<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Type;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // DB::table('Projects')->truncate();

        //prendo i types (collection)
        $types = Type::all(); 
        
        //converto la collection in array con pluck() in modo da poterlo passare a randomElement()
        $ids = $types->pluck('id')->all(); 

        for ($i = 0; $i < 10; $i++) {

            $project = new Project();

            $title = $faker->sentence(6);

            $project->title = $title;
            $project->description = $faker->optional()->text(500);
            $project->type_id = $faker->randomElement($ids);
            $project->link = $faker->url();

            $project->save();
        }
    }
}
