<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Models\Category;
use App\Repositories\ColorRepository;
use App\Repositories\SizeRepository;
use App\Services\ProductService;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductForm extends Component
{
    use WithFileUploads;

    public string $color = '';
    public string $sku = '';
    public float $price = 0;
    public string $size = '';
    public string $description = '';
    public $image = null;
    public ?Collection $colors = null;
    public ?Collection $sizes = null;
    public ?Collection $categories = null;

    public function mount(ColorRepository $colorRepository, SizeRepository $sizeRepository)
    {
        $this->categories = Category::all();
        $this->colors = $colorRepository->findAll()->sortBy("name", SORT_ASC);
        $this->sizes = $sizeRepository->findAll();
    }

    public function createProduct(ProductService $productService)
    {
        $this->validate([
            'color' => 'required|string',
            'sku' => 'required|string',
            'size' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'mimes:jpeg,png|max:1014',
        ]);

        $data = [
            'brand' => 'H&M',
            'color' => $this->color,
            'sku' => $this->sku,
            'price' => $this->price,
            'size' => $this->size,
            'description' => $this->description,
            'image' => $this->image
        ];

        $productService->create($data);

        session()->flash('message', 'Product successfully created.');

        $this->redirect('/products');
    }

    public function render()
    {
        return view('livewire.product-form');
    }

    public function redirectToProducts()
    {
        $this->redirect('/products');
    }

    public function removeImage()
    {
        $this->image = null;
    }

    public function loadCategoryBrands(Category $category)
    {
        $this->brands = $category->brands;
    }
}
