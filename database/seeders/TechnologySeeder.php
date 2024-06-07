<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['CSS', 'JS', 'SQL', 'VUE', 'PHP', 'LARAVEL'];

        foreach ($technologies as $tec_name) {
            $new_tec = new Technology();
            $new_tec->name = $tec_name;

            $new_tec->save();

        }
    }
}
