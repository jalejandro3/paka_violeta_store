<?php

namespace App\Http\Livewire;

use App\Repositories\ColorRepository;
use Livewire\Component;

class ColorForm extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.color-form');
    }

    public function createBrand(ColorRepository $colorRepository)
    {
        $this->validate([
            'name' => 'required|string'
        ]);

        try {
            $colorRepository->create($this->name);

            session()->flash('message', __("Color successfully created."));
        } catch (\Exception $e) {
            session()->flash('message', __($e->getMessage()));
        }

        $this->redirect('/colors');
    }

    public function redirectToBrands()
    {
        redirect()->to('colors');
    }
}
