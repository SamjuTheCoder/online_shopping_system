<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Product;
use App\Models\Cart;

class OrderingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function checkOut() {
        
        return view('checkout');
    }

    public function placeOrder(Request $request) {
    
        
        if(session('cart')) {
            //dd(session('cart'));
            foreach(session('cart') as $id => $details) {
                    //$total += $details['price'] * $details['qty']
            $save = new Cart;
            $save->userID = Auth::user()->id;
            $save->productID = $id;
            $save->qty = $details['qty'];
            $save->price = $details['price'];
            $save->save();

            }
        }    
        $request->session()->forget('cart');

        return redirect()->route('home');
    }
}
