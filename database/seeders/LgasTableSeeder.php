<?php
namespace Database\Seeders;

use App\Models\Lga;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class LgasTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('lgas')->delete();

        // Nepal's 77 Districts organized by Province
        // Province 1 (Koshi) - 14 districts
        // Province 2 (Madhesh) - 8 districts  
        // Province 3 (Bagmati) - 13 districts
        // Province 4 (Gandaki) - 11 districts
        // Province 5 (Lumbini) - 12 districts
        // Province 6 (Karnali) - 10 districts
        // Province 7 (Sudurpashchim) - 9 districts

        $state_id = [
            // Koshi Province (1) - 14 districts
            1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
            // Madhesh Province (2) - 8 districts
            2, 2, 2, 2, 2, 2, 2, 2,
            // Bagmati Province (3) - 13 districts
            3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3,
            // Gandaki Province (4) - 11 districts
            4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4,
            // Lumbini Province (5) - 12 districts
            5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5,
            // Karnali Province (6) - 10 districts
            6, 6, 6, 6, 6, 6, 6, 6, 6, 6,
            // Sudurpashchim Province (7) - 9 districts
            7, 7, 7, 7, 7, 7, 7, 7, 7
        ];

        $lgas = [
            // Koshi Province
            "Bhojpur", "Dhankuta", "Ilam", "Jhapa", "Khotang", "Morang", "Okhaldhunga", 
            "Panchthar", "Sankhuwasabha", "Solukhumbu", "Sunsari", "Taplejung", "Terhathum", "Udayapur",
            
            // Madhesh Province
            "Saptari", "Siraha", "Dhanusha", "Mahottari", "Sarlahi", "Bara", "Parsa", "Rautahat",
            
            // Bagmati Province
            "Bhaktapur", "Chitwan", "Dhading", "Dolakha", "Kathmandu", "Kavrepalanchok", "Lalitpur",
            "Makwanpur", "Nuwakot", "Ramechhap", "Rasuwa", "Sindhuli", "Sindhupalchok",
            
            // Gandaki Province
            "Baglung", "Gorkha", "Kaski", "Lamjung", "Manang", "Mustang", "Myagdi",
            "Nawalpur", "Parbat", "Syangja", "Tanahun",
            
            // Lumbini Province
            "Kapilvastu", "Parasi", "Rupandehi", "Arghakhanchi", "Gulmi", "Palpa",
            "Dang", "Banke", "Bardiya", "Pyuthan", "Rolpa", "Rukum East",
            
            // Karnali Province
            "Dolpa", "Humla", "Jumla", "Kalikot", "Mugu", "Rukum West",
            "Salyan", "Surkhet", "Dailekh", "Jajarkot",
            
            // Sudurpashchim Province
            "Kailali", "Kanchanpur", "Dadeldhura", "Baitadi", "Darchula",
            "Bajhang", "Bajura", "Achham", "Doti"
        ];

        for($i=0; $i<count($lgas); $i++){
            Lga::create(['state_id' => $state_id[$i], 'name' => $lgas[$i]]);
        }
    }

}
