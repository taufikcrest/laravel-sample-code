<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements EloquentRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all models
     *
     * @param array $columns
     * @param array $relations
     * @return Collection
     */
    public function all(array $columns = ['*'], array $relations = []): Collection
    {
        return $this->model->with($relations)->get($columns);
    }

    /**
     * Create a Model
     *
     * @param array $attributes
     *
     * @return Model
     */
    public function create($attributes)
    {
        $model = $this->model->create($attributes);
        return $model->fresh();
    }

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
    ): ?Model {
        return $this->model->select($columns)->with($relations)->findOrFail($modelId)->append($appends);
    }

    /**
     * Find model - Including deleted by Id
     *
     * @param int $modelId
     * @return Model
     */
    public function findTrashedById($modelId): ?Model
    {
        return $this->model->withTrashed()->findOrFail($modelId);
    }

    /**
     * Find model - Including deleted by Id
     *
     * @param int $modelId
     * @return Model
     */
    public function findOnlyTrashedById($modelId): ?Model
    {
        return $this->model->onlyTrashed()->findOrFail($modelId);
    }

    /**
     * Update an existing model
     *
     * @param int $modelId
     * @param array $attributes
     * @return Model
     */
    public function update($modelId, $attributes)
    {
        $model = $this->findById($modelId);
        $model->update($attributes);
        return $model->fresh();
    }

    /**
     * Delete a model by Id
     *
     * @param int $modelId
     * @return boolean
     */
    public function deleteById($modelId)
    {
        return $this->model->destroy($modelId);
    }

    /**
     * Hard delete a model by Id
     *
     * @param int $modelId
     * @return boolean
     */
    public function permanentlyDeleteById($modelId)
    {
        return $this->findById($modelId)->forceDelete();
    }

    /**
     * Restore a model by Id
     *
     * @param int $modelId
     * @return boolean
     */
    public function restoreById($modelId)
    {
        return $this->model->onlyTrashed()->findOrFail($modelId)->forceDelete();
    }
}
