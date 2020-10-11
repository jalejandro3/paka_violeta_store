<?php

namespace App\Repositories\Impl;

use App\Models\Brand;
use App\Repositories\BrandRepository as BradRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class BrandRepository implements BradRepositoryInterface
{
    /**
     * @var Brand
     */
    private $brand;

    /**
     * BrandRepository constructor.
     * @param Brand $brand
     */
    public function __construct(
        Brand $brand
    )
    {
        $this->brand = $brand;
    }

    /**
     * @inheritDoc
     */
    public function findAll(): Collection
    {
        return $this->brand->get();
    }

    /**
     * @inheritDoc
     */
    public function findAllWithPagination(): LengthAwarePaginator
    {
        return $this->brand->paginate(env('BRAND_PAGINATION'));
    }

    /**
     * @inheritDoc
     */
    public function findByTerm(string $searchTerm): LengthAwarePaginator
    {
        $searchTermWildCard = '%' . $searchTerm . '%';
        $fields = ['categories.name', 'brands.name'];

        return $this->brand->join('categories', 'brands.category_id', '=', 'categories.id')
            ->select('brands.name', 'brands.category_id')
            ->where(function($q) use($searchTerm, $fields, $searchTermWildCard) {
                foreach ($fields as $index => $field) {
                    $q->orWhere($field, 'like', $searchTermWildCard);
                }
            })->paginate(env('BRAND_PAGINATION'));
    }

    /**
     * @inheritDoc
     */
    public function create(int $categoryId, string $name): bool
    {
        return $this->brand->fill(['category_id' => $categoryId, 'name' => $name])->save();
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, string $name): int
    {
        return $this->brand->whereId($id)->update(['name' => $name]);
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): int
    {
        return $this->brand->whereId($id)->delete();
    }
}
