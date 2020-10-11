<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface BrandRepository
{
    /**
     * Get all brands
     *
     * @return Collection
     */
    public function findAll(): Collection;

    /**
     * Find all brands paginated
     *
     * @return LengthAwarePaginator
     */
    public function findAllWithPagination(): LengthAwarePaginator;

    /**
     * Find products by a term
     *
     * @param string $searchTerm
     * @return LengthAwarePaginator
     */
    public function findByTerm(string $searchTerm): LengthAwarePaginator;

    /**
     * Create a brand
     *
     * @param int $categoryId category id
     * @param string $name brand name
     * @return bool
     */
    public function create(int $categoryId, string $name): bool;

    /**
     * Update a brand
     *
     * @param int $id brand id
     * @param string $name brand name
     * @return int
     */
    public function update(int $id, string $name): int;

    /**
     * Delete a brand
     *
     * @param int $id brand id
     * @return int
     */
    public function delete(int $id): int;
}
