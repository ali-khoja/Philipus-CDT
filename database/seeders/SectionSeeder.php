<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('section')->insert([
        [
            'name' => 'قسم التدريب العام',
        ] ,
        [
            'name' => 'قسم التدريب الإداري والمهني',
        ],
        [
            'name' => 'قسم تأهيل المدربين',
        ],
        [
            'name' => 'قسم برامج التدريب المخصص',
        ]
        ]
    );
    }
}
