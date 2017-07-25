<?php

use Illuminate\Database\Seeder;

class TimeProjectSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'OPL',],
            ['id' => 2, 'name' => 'DUQM',],

        ];

        foreach ($items as $item) {
            \App\TimeProject::create($item);
        }
    }
}
