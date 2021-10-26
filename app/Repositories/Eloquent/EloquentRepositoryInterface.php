<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface EloquentRepositoryInterface
 * @package App\Repositories
 */
interface EloquentRepositoryInterface
{
    /**
     * Get all models
     *
     * @param array $columns
     * @param array $relations
     * @return Collection
     */
    public function all(array $columns = ['*'], array $relations = []): Collection;

    /**
     * Create a Model
     *
     * @param array $attributes
     * @return Model
     */
    public function create($attributes);

    /**
     * Find a Model by Id
     *
     * @param int $modelId
     * @param array $columns
     * @param array $relations
     * @param array $appends
     * @return Model
     */
    public function findById(
        $modelId,
        $columns = ['*'],
        $relations = [],
        $appends = []
    ): ?Model;

    /**
     * Find model - Including deleted by Id
     *
     * @param int $modelId
     * @return Model
     */
    public function findTrashedById($modelId): ?Model;

    /**
     * Find soft deleted model by Id
     *
     * @param int $modelId
     * @return Model
     */
    public function findOnlyTrashedById($modelId): ?Model;

    /**
     * Update model
     *
     * @param int $modelId
     * @param array $attributes
     * @return Model
     */
    public function update($modelId, $attributes);

    /**
     * Delete a model by Id
     *
     * @param int $modelId
     * @return boolean
     */
    public function deleteById($modelId);

    /**
     * Hard delete a model by Id
     *
     * @param int $modelId
     * @return boolean
     */
    public function permanentlyDeleteById($modelId);

    /**
     * Restore a model by Id
     *
     * @param int $modelId
     * @return boolean
     */
    public function restoreById($modelId);
}
