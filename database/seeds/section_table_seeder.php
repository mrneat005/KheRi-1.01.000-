<?php

use Illuminate\Database\Seeder;
use App\sections;

class section_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sectionRecords = 
        [
            ['name'=>'classic','status'=>1],
            ['name'=>'modern','status'=>1],
            ['name'=>'tradional','status'=>1],
            
            
        ];
        sections::insert($sectionRecords);
    }
}
