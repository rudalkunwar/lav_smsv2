<?php
namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('states')->delete();

        // Nepal's 7 Provinces
        $states = [
            'Koshi Province',
            'Madhesh Province', 
            'Bagmati Province',
            'Gandaki Province',
            'Lumbini Province',
            'Karnali Province',
            'Sudurpashchim Province',
        ];

        foreach ($states as $state) {
            State::create(['name' => $state]);
        }
    }

}
