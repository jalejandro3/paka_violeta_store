<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface SizeRepository
{
    /**
     * Get all sizes
     *
     * @return Collection
     */
    public function findAll(): Collection;

    /**
     * Create a size
     *
     * @param string $name size name
     * @return bool
     */
    public function create(string $name): bool;

    /**
     * Update a size
     *
     * @param int $id size id
     * @param string $name size name
     * @return int
     */
    public function update(int $id, string $name): int;

    /**
     * Delete a size
     *
     * @param int $id size id
     * @return int
     */
    public function delete(int $id): int;
}
