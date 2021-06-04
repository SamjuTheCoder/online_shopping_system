<?php
namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Collection;

interface ProductRepositoryInterface
{
   public function all(): Collection;
}