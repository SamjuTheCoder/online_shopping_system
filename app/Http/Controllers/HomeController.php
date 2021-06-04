<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\BrandRepositoryInterface;
use Illuminate\Http\Collections;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $productRepository;
    private $categoryRepository;
    private $brandRepository;

    public function __construct(ProductRepositoryInterface $productRepository, CategoryRepositoryInterface $categoryRepository, BrandRepositoryInterface $brandRepository)
    {
        //$this->middleware('auth');
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->brandRepository = $brandRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //session()->forget('cart');

        $data['products'] = $this->productRepository->all();
        $data['brands'] = $this->brandRepository->all();
        $data['categories'] = $this->categoryRepository->all();
        
        $data['humanHair'] = Product::where('category', 1)->get();
        $data['humanHairBlend'] = Product::where('category', 2)->get();;
        $data['syntheticHair'] = Product::where('category', 3)->get();;
        $data['fibreHair'] = Product::where('category', 4)->get();

        $data['accessory'] = Product::where('category', 5)->get();
        $data['accessoryx'] = Product::where('category', 5)->exists();

        return view('home',$data);
    }
}
