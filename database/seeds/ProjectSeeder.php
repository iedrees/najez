<?php

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Task;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();


        Project::create([
            'name'           => 'كابتشر',
            'user_id'        => 1,
        ]);

        Project::create([
            'name'           => 'طويق',
            'user_id'        => 1,
            'color'          => 'purple',
        ]);

        Project::create([
            'name'           => 'تثقيف',
            'user_id'        => 1,
            'color'          => 'indigo',
        ]);

        for ($i = 0; $i < 50; $i++) {
            Task::create([
                'task'           => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'user_id'        => 1,
                'project_id'     => array_rand([1=>1,2=>2,3=>3]),
                'done'           => array_rand([true,false])
            ]);
          }
 
    }
}
