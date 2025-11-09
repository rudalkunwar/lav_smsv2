<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();

        $data = [
            ['type' => 'current_session', 'description' => '2081-2082'],
            ['type' => 'system_title', 'description' => 'SMS'],
            ['type' => 'system_name', 'description' => 'School Management System'],
            ['type' => 'term_ends', 'description' => '2082/03/15'],
            ['type' => 'term_begins', 'description' => '2081/04/01'],
            ['type' => 'phone', 'description' => '01-4444444'],
            ['type' => 'address', 'description' => 'Kathmandu, Nepal'],
            ['type' => 'system_email', 'description' => 'info@school.edu.np'],
            ['type' => 'alt_email', 'description' => 'admin@school.edu.np'],
            ['type' => 'email_host', 'description' => ''],
            ['type' => 'email_pass', 'description' => ''],
            ['type' => 'lock_exam', 'description' => 0],
            ['type' => 'logo', 'description' => ''],
            ['type' => 'next_term_fees_j', 'description' => '15000'],
            ['type' => 'next_term_fees_pn', 'description' => '12000'],
            ['type' => 'next_term_fees_p', 'description' => '18000'],
            ['type' => 'next_term_fees_n', 'description' => '10000'],
            ['type' => 'next_term_fees_s', 'description' => '25000'],
            ['type' => 'next_term_fees_c', 'description' => '8000'],
        ];

        DB::table('settings')->insert($data);

    }
}
