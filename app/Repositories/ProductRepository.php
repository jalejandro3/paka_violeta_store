<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProductRepository
{
    /**
     * Find all products
     *
     * @return Collection
     */
    public function findAll(): Collection;

    /**
     * Find latest product record
     *
     * @return Product|null
     */
    public function findLatest(): ?Product;

    /**
     * Find all products paginated
     *
     * @return LengthAwarePaginator
     */
    public function findAllWithPagination(): LengthAwarePaginator;

    /**
     * Find a product by id
     *
     * @param int $id Product id
     * @return Product|null
     */
    public function findById(int $id): ?Product;

    /**
     * Find all sold products
     *
     * @return Collection
     */
    public function findAllSold(): Collection;

    /**
     * Find products by a term
     *
     * @param string $searchTerm
     * @return LengthAwarePaginator
     */
    public function findByTerm(string $searchTerm): LengthAwarePaginator;

    /**
     * Create a product
     *
     * @param array $data Product data
     * @return Product
     */
    public function create(array $data): Product;

    /**
     * Update a product
     *
     * @param int $id Product id
     * @param array $data Product data
     * @return int
     */
    public function update(int $id, array $data): int;

    /**
     * Delete a product
     *
     * @param int $id Product id
     * @return int
     */
    public function delete(int $id): int;
}
