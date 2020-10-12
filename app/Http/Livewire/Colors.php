<?php

namespace App\Http\Livewire;

use App\Repositories\ColorRepository;
use Livewire\Component;

class Colors extends Component
{
    public $search = '';
    public $page = 1;
    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function render(ColorRepository $colorRepository)
    {
        return view('livewire.colors', [
            'colors' => (! empty($this->search)) ? $colorRepository->findByTerm($this->search) : $colorRepository->findAllWithPagination()
        ]);
    }

    public function redirectToColorForm(): void
    {
        redirect()->to('colors/create');
    }
}
