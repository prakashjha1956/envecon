<?php

use Illuminate\Database\Seeder;

class RequestToTechnicalSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'project_id' => 1, 'work_type_id' => 2, 'priority' => 'Medium', 'request_name' => 'whevsdjbkzn', 'small_description' => 'vchjb,nm',],

        ];

        foreach ($items as $item) {
            \App\RequestToTechnical::create($item);
        }
    }
}
