<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Services\ProductService;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class ProductForm extends Component
{
    use WithFileUploads;

    public int $colorId = 0;
    public string $sku = '';
    public float $price = 0;
    public string $size = '';
    public string $description = '';
    public $image;

    public function createProduct(ProductService $productService)
    {
        $this->validate([
            'colorId' => 'required|integer',
            'sku' => 'required|string',
            'size' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'mimes:jpeg,png|max:1014',
        ]);

        $data = [
            'color_id' => $this->colorId,
            'sku' => $this->sku,
            'price' => $this->price,
            'size' => $this->size,
            'description' => $this->description,
            'image' => $this->image
        ];

        $productService->create($data);

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
}
