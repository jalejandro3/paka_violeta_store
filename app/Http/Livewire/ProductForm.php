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
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ProductForm extends Component
{
    public $price;
    public ?string $imageName = null;
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

    protected $listeners = ['imageUploaded' => 'setImageName'];

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
            'description' => 'required|string'
        ]);

        $data = [
            'brand_id' => $this->brandId,
            'color_id' => $this->colorId,
            'size_id' => $this->sizeId,
            'sku' => $this->sku,
            'price' => $this->price,
            'description' => $this->description,
            'image' => $this->imageName
        ];

        try {
            $productService->create($data);

            session()->flash('message', __("Product successfully created."));
        } catch (\Exception $e) {
            //@TODO: revisar como enviar eventos desde una excepcion. Manejar eliminacion de imagen desde el componente de imagenes.
            Storage::disk('s3')->delete("products/8KavsRDecn4vidvl3rd22RmlnPmjThBiFEUrYylU.png");

            session()->flash('message', __($e->getMessage()));
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

    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
    }

    protected function getBrandsByCategoryId()
    {
        if (! is_null($this->categoryId)) {
            //@TODO: inyectar BrandRepository
            $this->brands = Brand::whereCategoryId($this->categoryId)->get();
        }
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
