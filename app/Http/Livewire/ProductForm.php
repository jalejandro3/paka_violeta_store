<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Repositories\ColorRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SizeRepository;
use App\Services\ProductService;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductForm extends Component
{
    use WithFileUploads;

    public $price;
    public $image;
    public ?int $brandId = null;
    public ?int $categoryId = null;
    public ?int $colorId = null;
    public ?int $sizeId = null;
    public string $sku = '';
    public string $description = '';
    public ?Collection $brands = null;
    public ?Collection $categories = null;
    public ?Collection $colors = null;
    public ?Collection $sizes = null;

    public function mount(ColorRepository $colorRepository, SizeRepository $sizeRepository)
    {
        $this->categories = Category::all();
        $this->colors = $colorRepository->findAll()->sortBy("name", SORT_ASC);
        $this->sizes = $sizeRepository->findAll();
    }

    public function createProduct(ProductService $productService)
    {
        $this->validate([
            'brandId' => 'required|integer',
            'colorId' => 'required|integer',
            'sizeId' => 'required|integer',
            'sku' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'mimes:jpeg,png|max:1014'
        ]);

        $data = [
            'brand_id' => $this->brandId,
            'color_id' => $this->colorId,
            'size_id' => $this->sizeId,
            'sku' => $this->sku,
            'price' => $this->price,
            'description' => $this->description
        ];

        try {
            $data['image'] = $this->storeImageInAws();

            $productService->create($data);

            session()->flash('message', __("Product successfully created."));
        } catch (\Exception $e) {
            session()->flash('message', __("Product successfully created."));
        }

        $this->redirect('/products');
    }

    public function render(ProductRepository $productRepository)
    {
        $this->getBrandsByCategoryId();

        $this->setProductSku($productRepository);

        return view('livewire.product-form');
    }

    public function redirectToProducts()
    {
        redirect()->to('products');
    }

    protected function getBrandsByCategoryId()
    {
        if (! is_null($this->categoryId)) {
            $this->brands = Brand::whereCategoryId($this->categoryId)->get();
        }
    }

    //@TODO: Pasar logica de imagen a un componente de imagenes.

    private function storeImageInAws()
    {
        $storedImage = $this->image->storePublicly('products', 's3');

        return get_image_name('products', $storedImage);
    }

    private function setProductSku(ProductRepository $productRepository)
    {
        $skuId = 1;

        if ($latest = $productRepository->findLatest()) {
            $skuId = $latest->id + 1;
        }

        $this->sku = "P-{$skuId}";
    }
}
