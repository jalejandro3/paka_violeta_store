<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoriesFilePath = resource_path('json');
        $categoriesFileContent = file_get_contents($categoriesFilePath . DIRECTORY_SEPARATOR . "categories.json");
        $content = json_decode($categoriesFileContent, true);

        foreach ($content['categories'] as $category) {
            if (! Category::whereName($category['name'])->first()) {
                Category::create($category);
            }
        }
    }
}
