<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizesFilePath = resource_path('json');
        $sizesFileContent = file_get_contents($sizesFilePath . DIRECTORY_SEPARATOR . "sizes.json");
        $content = json_decode($sizesFileContent, true);

        foreach ($content['sizes'] as $size) {
            if (! Size::whereName($size['name'])->first()) {
                Size::create($size);
            }
        }
    }
}
