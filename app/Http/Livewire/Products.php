<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Repositories\ProductRepository;
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
            'products' => $productRepository->findByTerm($this->search)
        ]);
    }

    public function redirectToProductForm(): void
    {
        redirect()->to('product/create');
    }

    public function redirectToProductDetail(int $productId): void
    {
        redirect()->to("product/detail/}");
    }
}
