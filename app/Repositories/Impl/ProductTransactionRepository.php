<?php

declare(strict_types=1);

namespace App\Repositories\Impl;

use App\Models\ProductTransaction;
use App\Repositories\ProductTransactionRepository as ProductTransactionRepositoryInterface;

final class ProductTransactionRepository implements ProductTransactionRepositoryInterface
{
    public $productTransaction;

    public function __construct(
        ProductTransaction $productTransaction
    )
    {
        $this->productTransaction = $productTransaction;
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): ProductTransaction
    {
        return $this->productTransaction->create($data);
    }
}
