<?php
namespace App\Repositories;

use App\Models\Brand;
use Illuminate\Support\Collection;

interface BrandRepositoryInterface
{
   public function all(): Collection;
}