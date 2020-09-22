<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Products extends Component
{
    public Collection $products;
    public string $searchTerm = '';

    public function mount(ProductRepository $productRepository)
    {
        $this->products = $productRepository->findAll();
    }

    public function render()
    {
        return view('livewire.products');
    }

    public function filterProduct(ProductRepository $productRepository)
    {
        if (! empty($this->searchTerm)) {
            $this->products = $productRepository->findByTerm($this->searchTerm);

        } else {
            $this->products = $productRepository->findAll();
        }
    }

    public function redirectToProductForm()
    {
        $this->redirect('product/create');
    }

    public function getProductDetail()
    {
        dd("hola producto");
    }
}
