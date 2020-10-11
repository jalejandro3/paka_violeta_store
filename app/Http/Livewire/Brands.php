<?php

namespace App\Http\Livewire;

use App\Repositories\BrandRepository;
use Livewire\Component;

class Brands extends Component
{
    public $page = 1;

    public function render(BrandRepository $brandRepository)
    {
        return view('livewire.brands', [
            'brands' => $brandRepository->findAllWithPagination()
        ]);
    }

    public function redirectToBrandForm(): void
    {
        redirect()->to('brands/create');
    }
}
