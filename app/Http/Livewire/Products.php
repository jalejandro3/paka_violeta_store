<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Services\ProductService;
use Livewire\Component;

class Products extends Component
{
    public string $search = '';
    public int $page = 1;
    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function mount(): void
    {
        $this->fill(request()->only('search', 'page'));
    }

    public function render(ProductRepository $productRepository)
    {
        return view('livewire.products', [
            'products' => (! empty($this->search)) ? $productRepository->findByTerm($this->search) : $productRepository->findAllWithPagination()
        ]);
    }

    public function checkAsSold(ProductService $productService, Product $product)
    {
        $productService->update($product->id, ['is_sold' => true], 'Sold');
    }

    public function checkAsInStock(ProductService $productService, Product $product)
    {
        $productService->update($product->id, ['is_sold' => false], 'Available again');
    }

    public function redirectToProductForm(): void
    {
        redirect()->to('products/create');
    }

    public function redirectToProductDetail(int $productId): void
    {
        redirect()->route("product-detail", ['id' => $productId]);
    }
}
