<?php

use Illuminate\Database\Seeder;

class TimeWorkTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Event',],
            ['id' => 2, 'name' => 'Order-Report',],
            ['id' => 3, 'name' => 'Quick-Report',],
            ['id' => 4, 'name' => 'Debug',],
            ['id' => 5, 'name' => 'Error-Resolution',],
            ['id' => 6, 'name' => 'Budget-Estimation',],

        ];

        foreach ($items as $item) {
            \App\TimeWorkType::create($item);
        }
    }
}
