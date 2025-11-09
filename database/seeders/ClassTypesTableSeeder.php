<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_types')->delete();

        $data = [
            ['name' => 'Early Childhood', 'code' => 'EC'],
            ['name' => 'Pre-Primary', 'code' => 'PP'],
            ['name' => 'Pre-Primary', 'code' => 'N'],
            ['name' => 'Primary Level', 'code' => 'P'],
            ['name' => 'Lower Secondary', 'code' => 'LS'],
            ['name' => 'Secondary', 'code' => 'S'],
        ];

        DB::table('class_types')->insert($data);

    }
}
