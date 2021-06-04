<?php

namespace App\Repositories\Eloquent;

use App\Repositories\BrandRepositoryInterface;
use Illuminate\Support\Collection;
use App\Models\Brand;

//use Your Model

/**
 * Class BrandRepository.
 */
class BrandRepository extends BaseRepository implements BrandRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function __construct(Brand $model)
    {
        //return YourModel::class;
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function all(): collection
    {
        return $this->model->all();
    }
}
