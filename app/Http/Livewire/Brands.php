<?php

namespace App\Http\Livewire;

use App\Repositories\BrandRepository;
use Livewire\Component;

class Brands extends Component
{
    public $search = '';
    public $page = 1;
    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function render(BrandRepository $brandRepository)
    {
        return view('livewire.brands', [
            'brands' => (! empty($this->search)) ? $brandRepository->findByTerm($this->search) : $brandRepository->findAllWithPagination()
        ]);
    }

    public function redirectToBrandForm(): void
    {
        redirect()->to('brands/create');
    }
}
