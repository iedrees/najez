<?php

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
