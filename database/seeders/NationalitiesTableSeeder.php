<?php
namespace Database\Seeders;

use App\Models\Nationality;
use Illuminate\Database\Seeder;


class NationalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nationals = array(
            'Nepalese', 'Indian', 'Chinese', 'Bangladeshi', 'Pakistani', 'Bhutanese', 'Afghan', 'Sri Lankan', 'Tibetan', 'American', 'British', 'Australian', 'Canadian', 'Japanese', 'Korean', 'German', 'French', 'Italian', 'Spanish', 'Russian', 'Other'
        );

        foreach ($nationals as $n) {
            Nationality::create(['name' => $n]);
        }
    }
}
