<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\ProductTransaction;
use Illuminate\Database\Eloquent\Collection;

interface ProductTransactionRepository
{
    /**
     * Find all product transactions
     *
     * @return Collection
     */
    public function findAll(): Collection;

    /**
     * Create a product
     *
     * @param array $data Product data
     * @return ProductTransaction
     */
    public function create(array $data): ProductTransaction;
}
