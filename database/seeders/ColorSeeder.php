<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colorsFilePath = resource_path('json');
        $colorsFileContent = file_get_contents($colorsFilePath . DIRECTORY_SEPARATOR . "colors.json");
        $content = json_decode($colorsFileContent, true);

        foreach ($content['colors'] as $color) {
            if (! Color::whereName($color['name'])->first()) {
                Color::create($color);
            }
        }
    }
}
