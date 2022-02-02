<?php

use Illuminate\Database\Seeder;
Use App\Entities\Event;
class DatabaseSeeder extends Seeder
{
    public function run()
        {
          $data = [
            ['title'=>'Demo Event-1', 'start'=>'2020-01-02', 'end'=>'2020-01-04'],
            ['title'=>'Demo Event-2', 'start'=>'2020-01-10', 'end'=>'2020-01-12'],
            ['title'=>'Demo Event-3', 'start'=>'2020-01-14', 'end'=>'2020-01-16'],
            ['title'=>'Demo Event-4', 'start'=>'2020-01-18', 'end'=>'2020-01-20'],
        ];
        foreach ($data as $key => $value) {
            Event::create($value);
        }
    }
}

