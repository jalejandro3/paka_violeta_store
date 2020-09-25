<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Livewire\Component;

class ProductDetail extends Component
{
    public function render()
    {
        return view('livewire.product-detail');
    }

}
