<?php

namespace App\Http\Livewire;

use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use Livewire\Component;

class BrandForm extends Component
{
    public $name;
    public $categoryId;
    public $categories;

    public function mount(CategoryRepository $categoryRepository)
    {
        $this->categories = $categoryRepository->findAll();
    }

    public function render()
    {
        return view('livewire.brand-form');
    }

    public function createBrand(BrandRepository $brandRepository)
    {
        $this->validate([
            'categoryId' => 'required|integer',
            'name' => 'required|string'
        ]);

        try {
            $brandRepository->create($this->categoryId, $this->name);

            session()->flash('message', __("Brand successfully created."));
        } catch (\Exception $e) {
            session()->flash('message', __($e->getMessage()));
        }

        $this->redirect('/brands');
    }

    public function redirectToBrands()
    {
        redirect()->to('brands');
    }
}
