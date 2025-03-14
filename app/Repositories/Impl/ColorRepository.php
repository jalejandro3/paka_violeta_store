<?php

declare(strict_types=1);

namespace App\Repositories\Impl;

use App\Models\Color;
use App\Repositories\ColorRepository as ColorRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class ColorRepository implements ColorRepositoryInterface
{
    /**
     * @var Color
     */
    private $color;

    /**
     * ColorRepository constructor.
     * @param Color $color
     */
    public function __construct(
        Color $color
    )
    {
        $this->color = $color;
    }

    /**
     * @inheritDoc
     */
    public function findAll(): Collection
    {
        return $this->color->get();
    }

    /**
     * @inheritDoc
     */
    public function findAllWithPagination(): LengthAwarePaginator
    {
        return $this->color->paginate(env('COLOR_PAGINATION'));
    }

    /**
     * @inheritDoc
     */
    public function findByTerm(string $searchTerm): LengthAwarePaginator
    {
        $searchTermWildCard = '%' . $searchTerm . '%';
        $fields = ['name'];

        return $this->color->where(function($q) use($searchTerm, $fields, $searchTermWildCard) {
                foreach ($fields as $index => $field) {
                    $q->orWhere($field, 'like', $searchTermWildCard);
                }
            })->paginate(env('COLOR_PAGINATION'));
    }

    /**
     * @inheritDoc
     */
    public function create(string $name): bool
    {
        return $this->color->fill(['name' => $name])->save();
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, string $name): int
    {
        return $this->color->whereId($id)->update(['name' => $name]);
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): int
    {
        return $this->color->whereId($id)->delete();
    }
}
