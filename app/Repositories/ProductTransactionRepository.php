<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\ProductTransaction;

interface ProductTransactionRepository
{
    /**
     * Create a product
     *
     * @param array $data Product data
     * @return ProductTransaction
     */
    public function create(array $data): ProductTransaction;
}
