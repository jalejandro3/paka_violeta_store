<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Services\ProductService;
use Livewire\Component;

class DeleteModal extends Component
{
    public $title;
    public $content;
    public $objectId;

    public function mount($title, $content, $objectId)
    {
        $this->title = $title;
        $this->content = $content;
        $this->objectId = $objectId;
    }

    public function render()
    {
        return view('livewire.delete-modal');
    }

    public function delete(ProductService $productService)
    {
        $productService->delete($this->objectId);

        session()->flash('message', __("Product successfully deleted."));

        redirect()->to('products');
    }
}
