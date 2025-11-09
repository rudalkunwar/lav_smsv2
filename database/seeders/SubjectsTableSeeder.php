<?php

namespace Database\Seeders;

use App\Models\MyClass;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->delete();

        $this->createSubjects();
    }

    protected function createSubjects()
    {
        $subjects = [
            'Nepali', 'English', 'Mathematics', 'Science', 'Social Studies',
            'Computer Science', 'Account', 'Economics', 'Optional Mathematics',
            'Physics', 'Chemistry', 'Biology', 'Health & Physical Education'
        ];
        
        $sub_slug = [
            'NEP', 'ENG', 'MATH', 'SCI', 'SOC',
            'COMP', 'ACC', 'ECO', 'OPT-MATH',
            'PHY', 'CHEM', 'BIO', 'HPE'
        ];
        
        $teacher_id = User::where(['user_type' => 'teacher'])->first()->id;
        $my_classes = MyClass::all();

        foreach ($my_classes as $my_class) {
            $data = [];
            
            // Add core subjects for all classes
            $coreSubjects = ['Nepali', 'English', 'Mathematics', 'Science', 'Social Studies'];
            $coreSlug = ['NEP', 'ENG', 'MATH', 'SCI', 'SOC'];
            
            for ($i = 0; $i < count($coreSubjects); $i++) {
                $data[] = [
                    'name' => $coreSubjects[$i],
                    'slug' => $coreSlug[$i],
                    'my_class_id' => $my_class->id,
                    'teacher_id' => $teacher_id
                ];
            }

            DB::table('subjects')->insert($data);
        }

    }

}
