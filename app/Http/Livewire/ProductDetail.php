<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Livewire\Component;

class ProductDetail extends Component
{
    public ?Product $product;

    public function mount(ProductRepository $productRepository)
    {
        $this->product = $productRepository->findById(request()->route()->parameter('id'));
    }

    public function render()
    {
        return view('livewire.product-detail');
    }

    public function redirectToProducts()
    {
        redirect()->to('products');
    }
}
