<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
        $this->data['product_active'] = 'active';
    }

    public function index() {
        $this->data['product_add_active'] = 'active';
        $this->data['catagory'] = Catagory::orderBy('created_at', 'DESC')->get();
        $this->data['supplier'] = Supplier::orderBy('created_at', 'DESC')->get();
        return view('backend.product.add', $this->data);
    }
    public function all() {
        $this->data['product_all_active'] = 'active';
        $products = Product::query()
                            ->leftJoin('catagories as c', 'c.id', '=', 'products.category_id')
                            ->leftJoin('suppliers as s', 's.id', '=', 'products.supplier_id')
                            ->get([
                                'products.*',
                                'c.c_name as category_name',
                                's.full_name as supplier_name'
                            ]);
        $this->data['products'] = $products;
        return view('backend.product.all', $this->data);
    }
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'quantity' => 'required',
            'buying_date' => 'required',
        ]);
        $data = [
            'name' => $request->name,
            'code' => $request->code,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
            'root' => $request->root,
            'buying_price' => $request->buying_price,
            'selling_price' => $request->selling_price,
            'quantity' => $request->quantity,
            'buying_date' => $request->buying_date,
            'image' => '',
        ];
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:png,jpg,jpeg,gif,webp|max:5120'
            ]);
            $file_name = $request->image->hashName();
            $data['image'] = asset('backend/image/product').'/'.$file_name;
            $request->image->move(public_path('backend/image/product'), $file_name);
        }
        Product::create($data);
        return back()->with('success', 'Product created successfully!');
    }
    public function edit(Product $product) {
        $this->data['product'] = $product;
        $this->data['catagory'] = Catagory::orderBy('created_at', 'DESC')->get();
        $this->data['supplier'] = Supplier::orderBy('created_at', 'DESC')->get();
        return view('backend.product.edit', $this->data);
    }
    public function update(Request $request, Product $product) {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'quantity' => 'required',
            'buying_date' => 'required',
        ]);
        $data = [
            'name' => $request->name,
            'code' => $request->code,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
            'root' => $request->root,
            'buying_price' => $request->buying_price,
            'selling_price' => $request->selling_price,
            'quantity' => $request->quantity,
            'buying_date' => $request->buying_date,
        ];
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:png,jpg,jpeg,gif,webp|max:5120'
            ]);
            $file_name = $request->image->hashName();
            $data['image'] = asset('backend/image/product').'/'.$file_name;
            $request->image->move(public_path('backend/image/product'), $file_name);
            if (is_file(public_path('backend/image/product').'/'.basename($product->image))) {
                unlink(public_path('backend/image/product').'/'.basename($product->image));
            }
        }
        $product->update($data);
        return redirect()->route('product.all')->with('success', 'Product Updated Successfully!');
    }
    public function delete(Product $product) {
        if (is_file(public_path('backend/image/product').'/'.basename($product->image))) {
            unlink(public_path('backend/image/product').'/'.basename($product->image));
        }
        $product->delete();
        return redirect()->route('product.all')->with('success', 'Product Deleted Successfully!');
    }
}
