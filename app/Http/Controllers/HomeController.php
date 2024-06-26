<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Flasher\Toastr\Prime\toastr;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::where('usertype', 'user')->count();
        $product = Product::count();
        $order = Order::count();
        $delivered = Order::where('status', 'Delivered')->count();
        
        return view('admin.index', compact('user', 'product', 'order', 'delivered'));
    }

    public function home()
    {
        $product = Product::all();
        $count = 0;
        if (Auth::check()) {
            $count = Cart::where('user_id', Auth::id())->count();
        }
        return view('home.index', compact('product', 'count'));
    }

    public function login_home()
    {
        $product = Product::all();
        $count = 0;
        if (Auth::check()) {
            $count = Cart::where('user_id', Auth::id())->count();
        }
        return view('home.index', compact('product', 'count'));
    }

    public function product_details($id)
    {
        $data = Product::find($id);
        $count = 0;
        if (Auth::check()) {
            $count = Cart::where('user_id', Auth::id())->count();
        }
        if ($data) {
            return view('home.product_details', compact('data', 'count'));
        } else {
            toastr()->timeOut(5000)->closeButton()->addError('Product not found');
            return redirect()->route('home');
        }
    }

    public function add_cart($id)
    {
        $product = Product::find($id);
        if ($product) {
            $user = Auth::user();
            $cart = new Cart;
            $cart->user_id = $user->id;
            $cart->product_id = $product->id;
            $cart->save();

            toastr()->timeOut(5000)->closeButton()->addSuccess('Product Added to The Cart Successfully');
            return redirect()->back();
        } else {
            toastr()->timeOut(5000)->closeButton()->addError('Product not found');
            return redirect()->route('home');
        }
    }

    public function mycart()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
            $cart = Cart::where('user_id', $userid)->get();
        }
        return view('home.mycart', compact('count', 'cart'));
    }

    public function delete_cart($id)
    {
        $cartItem = Cart::find($id);
        if ($cartItem) {
            $cartItem->delete();
            toastr()->timeOut(5000)->closeButton()->addSuccess('Product Removed from Cart Successfully.');
            return redirect()->back();
        } else {
            toastr()->timeOut(5000)->closeButton()->addError('Cart item not found.');
            return redirect()->back();
        }
    }

    public function confirm_order(Request $request)
    {
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $userid = Auth::user()->id;
        $cart = Cart::where('user_id', $userid)->get();

        foreach ($cart as $carts) {
            $order = new Order;
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $carts->product_id;
            $order->save();
        }

        $cart_remove = Cart::where('user_id', $userid)->get();
        foreach ($cart_remove as $remove) {
            $data = Cart::find($remove->id);
            $data->delete();
        }

        toastr()->timeOut(5000)->closeButton()->addSuccess('Product Ordered Successfully');
        return redirect()->back();
    }

    public function myorders()
    {
        $user = Auth::user()->id;
        $count = Order::Where('user_id', $user)->get()->count();
        $order = Order::where('user_id', $user)->get();
        return view('home.order', compact('count', 'order'));
    }

    public function shop()
    {
        $product = Product::all();
        $count = 0;
        if (Auth::check()) {
            $count = Cart::where('user_id', Auth::id())->count();
        }
        return view('home.shop', compact('product', 'count'));
    }


    public function why()
    {
     
        $count = 0;
        if (Auth::check()) {
            $count = Cart::where('user_id', Auth::id())->count();
        }
        return view('home.why', compact('count'));
    }

    public function contact()
    {
     
        $count = 0;
        if (Auth::check()) {
            $count = Cart::where('user_id', Auth::id())->count();
        }
        return view('home.contact', compact('count'));
    }

}
