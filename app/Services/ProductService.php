<?php

declare(strict_types=1);

namespace App\Services;

use App\Exceptions\ApplicationException;
use App\Exceptions\ResourceNotFoundException;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductService
{
    /**
     * Get all products
     *
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * Get a product by id
     *
     * @param int $id
     * @return Product|null
     * @throws ResourceNotFoundException
     */
    public function getById(int $id): Product;

    /**
     * Create a product
     *
     * @param array $data
     * @return array
     * @throws ApplicationException
     */
    public function create(array $data): array;

    /**
     * Update a product
     *
     * @param int $id Product id
     * @param array $data Product data
     * @param string $action Update action
     * @return array
     * @throws ResourceNotFoundException|ApplicationException
     */
    public function update(int $id, array $data, string $action): array;

    /**
     * Delete a product
     *
     * @param int $id Product id
     * @return array
     * @throws ResourceNotFoundException
     */
    public function delete(int $id): array;
}
