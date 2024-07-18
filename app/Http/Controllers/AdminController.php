<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Message;
use App\Models\Order;
use App\Models\Prdoduct;
use App\Models\Product;
use Illuminate\Http\Request;

use function Flasher\Toastr\Prime\toastr;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category_name;  
        $category->save();

        toastr()->timeOut(5000)->closeButton()->addSuccess('Category Added Successfully');

        return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);

        if (!$data) {
            toastr()->timeOut(10000)->closeButton()->addError('Category not found');
            return redirect()->back();
        }

        $data->delete();

        toastr()->timeOut(3000)->closeButton()->addSuccess('Category Deleted Successfully');

        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = category::find($id);
        return view('admin.edit_category',compact('data'));

    }

    public function update_category(Request $request, $id) {
        $data = Category::find($id);
        
        if ($data) {
            $data->category_name = $request->category;
            $data->save();
            toastr()->timeOut(3000)->closeButton()->addSuccess('Category Updated Successfully');
        } else {
            toastr()->timeOut(3000)->closeButton()->addError('Category not found');
        }
    
        return redirect()->route('view.category');
    }
    
    public function add_product(){

        $category = category::all(); 
        return view('admin.add_product',compact('category'));
    }
    public function upload_product(Request $request)
{
    $data = new Product; // Assuming your model is named Product
    $data->title = $request->title;
    $data->description = $request->description;
    $data->price = $request->price;
    $data->quantity = $request->qty;
    $data->category = $request->category;

    $image = $request->file('image'); // Use file() method to retrieve the uploaded file
    if ($image) {
        $imageName = time() . '.' . $image->getClientOriginalExtension(); // Generate unique file name
        $image->move(public_path('products'), $imageName); // Move uploaded file to public/products directory
        $data->image = $imageName; // Store file name in database
    }

    $data->save();

    toastr()->success('Product Added Successfully');
    return redirect()->back();
}

public function view_product(){

    $product= Product::paginate(5);
    return view('admin.view_product',compact('product'));
}

public function delete_product($id){
    $data = Product::find($id);
    $image_path = public_path('products/' . $data->image);
    if (file_exists($image_path)) {
        unlink($image_path);
    }
    $data->delete();

    toastr()->timeOut(3000)->closeButton()->addSuccess('Product Deleted Successfully');
    // return redirect()->back();
    return redirect()->route('view.product');
}


public function update_product($id){
    $data = product::find($id);
    $category = category::all();
    return view('admin.update_page',compact('data','category'));
}




public function edit_product(Request $request, $id)
{
    $data = Product::find($id);
    if (!$data) {
        toastr()->error('Product not found');
        return redirect()->back();
    }

    $data->title = $request->title;
    $data->description = $request->description;
    $data->price = $request->price;
    $data->quantity = $request->qty;
    $data->category = $request->category;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('products', $imageName);
        $data->image = $imageName;
    }

    $data->save();
    toastr()->success('Product Updated Successfully');
    return redirect()->route('view.product');
}


public function product_search(Request $request)
{
    $search = $request->search;
    $product = product::where('title','LIKE','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->paginate(3);

    return view('admin.view_product', compact('product'));
}

public function view_order() {
    $data = Order::all();
    return view('admin.order', compact('data'));
}

public function on_the_way($id) {
    $order = Order::find($id);
    if ($order) {
        $order->status = 'On The Way';
        $order->save();
        toastr()->timeOut(3000)->closeButton()->addSuccess('Order status updated to On The Way');
    }
    return redirect()->back();
}

public function delivered($id) {
    $order = Order::find($id);
    if ($order) {
        $order->status = 'Delivered';
        $order->save();
        toastr()->timeOut(3000)->closeButton()->addSuccess('Order status updated to Delivered');
    }
    return redirect()->back();
}


public function messages()
{
    $messages = Contact::all(); 
    return view('admin.messages', compact('messages'));
}

 




 
}
