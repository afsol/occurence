<?php

namespace Database\Seeders;

use App\Models\OccurrenceType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OccurrenceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OccurrenceType::create([
            'name' => 'Earth Quake',
        ]);
        OccurrenceType::create([
            'name' => 'Thief',
        ]);
        OccurrenceType::create([
            'name' => 'Accident',
        ]);
    }
}
