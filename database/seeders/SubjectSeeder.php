<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'name' => 'Matemática Discreta',
            'degree_id' => 1,
            'credits' => '3',
            'academicCourse' => '1',
            'maxStudents' => '5',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('subjects')->insert([
            'name' => 'Ética fundamental',
            'degree_id' => 2,
            'credits' => '6',
            'academicCourse' => '2',
            'maxStudents' => '6',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('subjects')->insert([
            'name' => 'Anatomía Patológica',
            'degree_id' => 3,
            'credits' => '6',
            'academicCourse' => '1',
            'maxStudents' => '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('subjects')->insert([
            'name' => 'Base de datos',
            'degree_id' => 4,
            'credits' => '3',
            'academicCourse' => '3',
            'maxStudents' => '3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('subjects')->insert([
            'name' => 'Nutrición',
            'degree_id' => 5,
            'credits' => '3',
            'academicCourse' => '2',
            'maxStudents' => '6',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('subjects')->insert([
            'name' => 'Cálculo Avanzado',
            'degree_id' => 6,
            'credits' => '6',
            'academicCourse' => '1',
            'maxStudents' => '4',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
