<?php
namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Collection;

interface CategoryRepositoryInterface
{
   public function all(): Collection;
}