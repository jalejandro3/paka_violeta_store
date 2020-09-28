<?php

declare(strict_types=1);

namespace App\Services\Impl;

use App\Exceptions\ApplicationException;
use App\Exceptions\ResourceNotFoundException;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Repositories\ProductTransactionRepository;
use App\Services\ProductService as ProductServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

final class ProductService implements ProductServiceInterface
{
    /**
     * @var ProductRepository
     */
    protected ProductRepository $productRepository;

    /**
     * @var ProductTransactionRepository
     */
    protected ProductTransactionRepository $productTransactionRepository;

    /**
     * ProductService constructor.
     *
     * @param ProductRepository $productRepository
     * @param ProductTransactionRepository $productTransactionRepository
     */
    public function __construct(
        ProductRepository $productRepository,
        ProductTransactionRepository $productTransactionRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->productTransactionRepository = $productTransactionRepository;
    }

    /**
     * @inheritDoc
     */
    public function getAll(): Collection
    {
        return $this->productRepository->findAll();
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): Product
    {
        $this->checkProductExists($id);

        return $this->productRepository->findById($id);
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): array
    {
        $this->checkIfUserIsLogged();

        return DB::transaction(function() use($data) {
            $product = $this->productRepository->create($data);

            $transactionData = [
                'user_id' => auth()->user()->getAuthIdentifier(),
                'product_id' => $product->id,
                'sku' => $product->sku,
                'action' => 'Created',
                'old_data' => null,
                'new_data' => serialize($product)
            ];

            $this->productTransactionRepository->create($transactionData);

            return ['msg' => __("Product created successfully.")];
        });
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data, string $action): array
    {
        $this->checkIfUserIsLogged();

        $this->checkProductExists($id);

        return DB::transaction(function() use($id, $data, $action) {
            $product = $this->productRepository->findById($id);

            $this->productRepository->update($id, $data);

            $transactionData = [
                'user_id' => auth()->user()->getAuthIdentifier(),
                'product_id' => $id,
                'sku' => $product->sku,
                'action' => $action,
                'old_data' => serialize($product),
                'new_data' => serialize($product->refresh())
            ];

            $this->productTransactionRepository->create($transactionData);

            return ['msg' => __("Product updated successfully.")];
        });
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): array
    {
        $this->checkProductExists($id);

        DB::transaction(function() use($id) {
            $product = $this->productRepository->findById($id);

            $transactionData = [
                'user_id' => auth()->user()->getAuthIdentifier(),
                'product_id' => $product->id,
                'sku' => $product->sku,
                'action' => 'Deleted',
                'old_data' => serialize($product),
                'new_data' => ''
            ];

            $this->productTransactionRepository->create($transactionData);

            $this->productRepository->delete($id);
        });

        return ['msg' => __('Product deleted successfully.')];
    }

    /**
     * Check if a product exists
     *
     * @param int $id Product id
     * @throws ResourceNotFoundException
     */
    private function checkProductExists(int $id)
    {
        if (is_null($this->productRepository->findById($id))) {
            throw new ResourceNotFoundException(__("Product with id {$id} doesn't exists."));
        }
    }

    /**
     * Check if a user is logged
     *
     * @throws ApplicationException
     */
    private function checkIfUserIsLogged()
    {
        if (! auth()->user()) {
            throw new ApplicationException(__("User is not logged."));
        }
    }
}
