<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Accounting extends Component
{
    public Collection $soldProducts;
    public float $total;
    protected ProductRepository $productRepository;

    public function mount(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function render()
    {
        $this->soldProducts = $this->productRepository->findAllSold();

        $this->getTotal();

        return view('livewire.accounting');
    }

    protected function getTotal()
    {
        $this->total = 0;
        $soldProducts = $this->productRepository->findAllSold();

        if ($soldProducts->count() > 0) {
            foreach ($soldProducts as $soldProduct) {
                $this->total += $soldProduct->price;
            }
        }
    }
}
