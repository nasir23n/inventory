<?php

namespace App\Http\Controllers\Backend\Supplier;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
        $this->data['supplier_active'] = 'active';
    }
    public function index() {
        $this->data['supplier_add_active'] = 'active';
        return view('backend.supplier.add', $this->data);
    }
    public function all() {
        $this->data['supplier_add_active'] = 'active';
        $this->data['supplier'] = Supplier::orderBy('created_at', 'DESC')->paginate(20);
        return view('backend.supplier.all', $this->data);
    }
    public function store(Request $request) {
        $request->validate([
            'full_name' => 'required',
            'email' => ($request->email) ? 'email' : '',
            'phone' => 'required'
        ]);
        $data = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'shop_name' => $request->shop_name,
            'profile' => '',
        ];
        if ($request->hasFile('profile')) {
            $file_name = $request->profile->hashName();
            $request->profile->move(public_path('backend/image/supplire'), $file_name);
            $data['profile'] = asset('backend/image/supplire').'/'.$file_name;
        }
        Supplier::create($data);
        return back()->with('success', 'Supplier created successfully!');
        // full_name
        // email
        // phone
        // shop_name
        // profile
        // dd($request->all());
    }
    public function edit(Supplier $supplier) {
        $this->data['supplier'] = $supplier;
        return view('backend.supplier.edit', $this->data);
    }
    public function update(Request $request, Supplier $supplier) {
        $request->validate([
            'full_name' => 'required',
            'email' => ($request->email) ? 'email' : '',
            'phone' => 'required'
        ]);
        $data = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'shop_name' => $request->shop_name
        ];
        // dd($supplier);
        if ($request->hasFile('profile')) {
            $file_name = $request->profile->hashName();
            $data['profile'] = asset('backend/image/supplire').'/'.$file_name;
            $request->profile->move(public_path('backend/image/supplire'), $file_name);
            if (is_file(public_path('backend/image/supplire').'/'.basename($supplier->profile))) {
                unlink(public_path('backend/image/supplire').'/'.basename($supplier->profile));
            }
        }
        $supplier->update($data);
        return redirect()->route('supplier.all')->with('success', 'Supplier updated successfully!');
    }
    public function delete(Supplier $supplier) {
        if (is_file(public_path('backend/image/supplire').'/'.basename($supplier->profile))) {
            unlink(public_path('backend/image/supplire').'/'.basename($supplier->profile));
        }
        $supplier->delete();
        return redirect()->route('supplier.all')->with('success', 'Supplier deleted successfully!');
    }
}
