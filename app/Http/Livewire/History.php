<?php

namespace App\Http\Livewire;

use App\Repositories\ProductTransactionRepository;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class History extends Component
{
    public Collection $history;

    public function mount(ProductTransactionRepository $productTransactionRepository)
    {
        $this->history = $productTransactionRepository->findAll();
    }

    public function render()
    {
        return view('livewire.history');
    }
}
