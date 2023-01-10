<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<10; $i++){
            $project = new Project();
            $project->title = $faker->words(3, true);
            $project->slug = Str::slug($project->title, '-');
            $project->description = $faker->paragraph();
            $project->dev_lang = $faker->words(4, true);
            $project->framework = $faker->words(3, true);
            $project->difficulty = $faker->numberBetween(1, 10);
            $project->team = $faker->firstName();
            $project->git_link = $faker->url();
            $project->save();

        }
    }
}
