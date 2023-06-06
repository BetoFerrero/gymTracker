<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Exercise;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFile = storage_path('seeds\ejercicios_traducido_sinUrl.json');
        $data = file_get_contents($jsonFile);
        $exercises = json_decode($data, true);

        foreach ($exercises as $exerciseData) {
            Exercise::create([
                'id' => (string) Str::uuid(),
                'Name' => $exerciseData['name'],
                'Description' => '',
                'equipment' => $exerciseData['equipment'],
                'target' => $exerciseData['target'],
                'bodyPart' => $exerciseData['bodyPart'],
                'Tracking' => 'weight',
                'ImageSrc' => $exerciseData['gifUrl'],
            ]);
        }
    }
}
