<?php

declare(strict_types=1);

namespace App\Repositories\Impl;

use App\Models\Product;
use App\Repositories\ProductRepository as ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

final class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @var Product
     */
    private Product $product;

    /**
     * ProductRepository constructor.
     *
     * @param Product $product
     */
    public function __construct(
        Product $product
    )
    {
        $this->product = $product;
    }

    /**
     * @inheritDoc
     */
    public function findAll(): Collection
    {
        return $this->product->get();
    }

    /**
     * @inheritDoc
     */
    public function findAllSold(): Collection
    {
        return $this->product->whereIsSold(true)->get();
    }

    /**
     * @inheritDoc
     */
    public function findByTerm(string $searchTerm): Collection
    {
        $fields = $this->product->getFillable();

        return $this->product->where(function($query) use($searchTerm, $fields) {
            $searchTermWildCard = '%' . $searchTerm . '%';

            foreach ($fields as $index => $field) {
                $query->orWhere($field, 'like', $searchTermWildCard);
            }
        })->get();
    }

    /**
     * @inheritDoc
     */
    public function findById(int $id): ?Product
    {
        return $this->product->whereId($id)->first();
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): Product
    {
        return $this->product->create($data);
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data): int
    {
        return $this->product->whereId($id)->update($data);
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): int
    {
        return $this->product->whereId($id)->delete();
    }
}
