<?php

use Illuminate\Database\Seeder;

class catagoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $catagoryRecords = 
        [
            ['name'=>'classic','status'=>1],
            ['name'=>'modern','status'=>1],
            ['name'=>'tradional','status'=>1],
            
            
        ];
        Catagories::insert($catagoriesRecords);
    }
}
