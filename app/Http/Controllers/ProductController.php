<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Collections;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use DB;
use Auth;
use Session;

class ProductController extends Controller
{
    private $productRepository;
    private $categoryRepository;

    public function __construct(ProductRepositoryInterface $productRepository,CategoryRepositoryInterface $categoryRepository)
    {
        //$this->middleware('auth');
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function getForm() {

        //$data['category'] = Category::all();
        $data['category'] = $this->categoryRepository->all();
        return view('product',$data);
    }

    //save record
    public function saveProduct(Request $request) {

        $this->validate($request, [

            'productName'   => 'string',
            'category'      => 'string',
            'description'   => 'string',
            'qty'           => 'string',
            'price'         => 'string',
            'discount'      => 'string',
            'specialOffer'  => 'string',
            'image'     => 'mimes:jpeg,png,gif,jpg|max:10000',
            'status'    => 'string',

        ]);
        
        $fileName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('products'), $fileName);
        
        $save = new Product;
        $save->productName  = $request->productName;
        $save->category     = $request->category;
        $save->description  = $request->description;
        $save->qty          = $request->quantity;
        $save->price        = $request->price;
        $save->discount     = $request->discount;
        $save->specialOffer = $request->specialOffer;
        $save->image        = $fileName;
        $save->status       = $request->status;

        $save->save();
        
        return back()->with('success','Submitted uploaded');
    }

    public function singleProduct($id)
    {
       // dd($id);
        $pid = base64_decode($id);
        $data['brands'] = Brand::all();
        $data['categories'] = Category::all();

        $data['single'] = Product::where('products.id',$pid)
        ->leftjoin('categories','products.category','=','categories.id')  
        ->leftjoin('brands','products.brand','=','brands.id')                   
        ->first();
        $data['products'] = Product::all();

        return view('single',$data);
    }

    public function addCart(Request $request, $id) {

        $product = Product::find($id);
        $category = Category::find($product->category);
       // dd($category);
        $cart = $request->session()->get('cart');

        if(!$cart){

            $cart = [
                    $id=>[
                        "name" => $product->productName,
                        "category" => $category->category,
                        "description" => $product->description,
                        "price" => $product->price,
                        "image" => $product->image,
                        'qty'=>1,
                        ]
                    ];
            //$request->session()->increment('count');
            $request->session()->put('cart',$cart);

            return back()->with('success','Item added to cart successfully');
        }
        
         if(isset($cart[$id])){
            
            $cart[$id]['qty']++;
                    
            //$request->session()->increment('count');
            $request->session()->put('cart',$cart);

            return back()->with('success','Item added to cart successfully');
        }
        else {

            $cart[$id] = [

                    "name" => $product->productName,
                    "category" => $category->category,
                    "description" => $product->description,
                    "price" => $product->price,
                    "image" => $product->image,
                    'qty'=>1,
                                       
                ];

                $request->session()->put('cart',$cart);
                return back()->with('success','Item added to cart successfully');
        }
        

    }

}
