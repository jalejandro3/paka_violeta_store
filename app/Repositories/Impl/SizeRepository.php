<?php


namespace App\Repositories\Impl;

use App\Models\Size;
use App\Repositories\SizeRepository as SizeRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

final class SizeRepository implements SizeRepositoryInterface
{
    /**
     * @var Size
     */
    private $size;

    /**
     * SizeRepository constructor.
     * @param Size $size
     */
    public function __construct(
        Size $size
    )
    {
        $this->size = $size;
    }

    /**
     * @inheritDoc
     */
    public function findAll(): Collection
    {
        return $this->size->get();
    }

    /**
     * @inheritDoc
     */
    public function create(string $name): bool
    {
        return $this->size->fill(['name' => $name])->save();
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, string $name): int
    {
        return $this->size->whereId($id)->update(['name' => $name]);
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): int
    {
        return $this->size->whereId($id)->delete();
    }
}
