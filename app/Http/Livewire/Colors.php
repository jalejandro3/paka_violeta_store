<?php

namespace App\Http\Livewire;

use App\Repositories\ColorRepository;
use Livewire\Component;

class Colors extends Component
{
    public $page = 1;

    public function render(ColorRepository $colorRepository)
    {
        return view('livewire.colors', [
            'colors' => $colorRepository->findAllWithPagination()
        ]);
    }

    public function redirectToColorForm(): void
    {
        redirect()->to('colors/create');
    }
}
