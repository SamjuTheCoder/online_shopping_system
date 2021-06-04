<?php

namespace App\Repositories\Eloquent;

use App\Repositories\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Support\Collection;

/**
 * Class ProductRepository.
 * @param Product $model
 */
class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function __construct(Product $model)
    {
        //$this->model = $model;
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
