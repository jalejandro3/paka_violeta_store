<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadImage extends Component
{
    use WithFileUploads;

    public $image;

    public function render()
    {
        $this->dispatchUploadImage();

        return view('livewire.upload-image');
    }

    private function dispatchUploadImage()
    {
        if (! is_null($this->image)) {
            $imageName = $this->storeImage();

            $this->emitTo('product-form', 'imageUploaded', $imageName);
        }
    }

    protected function storeImage()
    {
        $storedImage = $this->image->storePublicly('products', 's3');

        return get_image_name('products', $storedImage);
    }
}
