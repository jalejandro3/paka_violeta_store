<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brandsFilePath = resource_path('json');
        $brandsFileContent = file_get_contents($brandsFilePath . DIRECTORY_SEPARATOR . "brands.json");
        $content = json_decode($brandsFileContent, true);

        foreach ($content['categories'] as $category) {
            $categoryId = Category::whereName($category['name'])->first()->id;

            foreach ($category['brands'] as $brand) {
                if (! Brand::whereName($brand['name'])->first()) {
                    Brand::create([
                        'category_id' => $categoryId,
                        'name' => $brand['name']
                    ]);
                }
            }
        }
    }
}
