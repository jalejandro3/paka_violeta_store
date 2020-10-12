<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Color;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface ColorRepository
{
    /**
     * Get all colors
     *
     * @return Collection
     */
    public function findAll(): Collection;

    /**
     * Find all colors paginated
     *
     * @return LengthAwarePaginator
     */
    public function findAllWithPagination(): LengthAwarePaginator;

    /**
     * Find colors by a term
     *
     * @param string $searchTerm
     * @return LengthAwarePaginator
     */
    public function findByTerm(string $searchTerm): LengthAwarePaginator;

    /**
     * Create a color
     *
     * @param string $name Color name
     * @return bool
     */
    public function create(string $name): bool;

    /**
     * Update a color
     *
     * @param int $id Color id
     * @param string $name Color name
     * @return int
     */
    public function update(int $id, string $name): int;

    /**
     * Delete a color
     *
     * @param int $id Color id
     * @return int
     */
    public function delete(int $id): int;
}
