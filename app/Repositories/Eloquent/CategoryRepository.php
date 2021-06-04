<?php

namespace App\Repositories\Eloquent;

use App\Repositories\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Support\Collection;

/**
 * Class CategoryRepository.
 */
class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

}
