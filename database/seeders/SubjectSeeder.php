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
            'degree' => 'Ingeniería Informáctica',
            'credits' => '3',
            'academicCourse' => '1',
            'maxStudents' => '5',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('subjects')->insert([
            'name' => 'Ética fundamental',
            'degree' => 'Ciencias de la filosofía',
            'credits' => '6',
            'academicCourse' => '2',
            'maxStudents' => '6',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('subjects')->insert([
            'name' => 'Anatomía Patológica',
            'degree' => 'Medicina',
            'credits' => '6',
            'academicCourse' => '1',
            'maxStudents' => '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('subjects')->insert([
            'name' => 'Base de datos',
            'degree' => 'Ingeniería Informáctica',
            'credits' => '3',
            'academicCourse' => '3',
            'maxStudents' => '3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('subjects')->insert([
            'name' => 'Nutrición',
            'degree' => 'INEF',
            'credits' => '3',
            'academicCourse' => '2',
            'maxStudents' => '6',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('subjects')->insert([
            'name' => 'Cálculo Avanzado',
            'degree' => 'Matemáticas',
            'credits' => '6',
            'academicCourse' => '1',
            'maxStudents' => '4',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
