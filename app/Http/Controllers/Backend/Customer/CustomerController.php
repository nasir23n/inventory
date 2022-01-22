<?php

namespace App\Http\Controllers\Backend\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
        $this->data['customer_active'] = 'active';
    }
    public function index() {
        $this->data['customer_add_active'] = 'active';
        return view('backend.customer.add', $this->data);
    }
    public function store(Request $request) {
        $request->validate([
            'full_name' => 'required',
            'phone' => 'required',
        ]);
        $data = [
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'profile' => '',
        ];
        if ($request->hasFile('profile')) {
            $file_name = $request->profile->hashName();
            $request->profile->move(public_path('backend/image/supplire'), $file_name);
            $data['profile'] = asset('backend/image/supplire').'/'.$file_name;
        }
        Customer::create($data);
        return back()->with('success', 'Customer Created Succerssfully');
    }
    public function all() {
        $this->data['customer_all_active'] = 'active';
        $this->data['customers'] = Customer::orderBy('created_at', 'DESC')->get();
        return view('backend.customer.all', $this->data);
    }
    public function edit(Customer $customer) {
        $this->data['customer'] = $customer;
        return view('backend.customer.edit', $this->data);
    }
    public function update(Request $request, Customer $customer) {
        $request->validate([
            'full_name' => 'required',
            'phone' => 'required',
        ]);
        $data = [
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
        ];
        if ($request->hasFile('profile')) {
            $file_name = $request->profile->hashName();
            $request->profile->move(public_path('backend/image/supplire'), $file_name);
            if (is_file(public_path('backend/image/supplire').'/'.basename($customer->profile))) {
                unlink(public_path('backend/image/supplire').'/'.basename($customer->profile));
            }
            $data['profile'] = asset('backend/image/supplire').'/'.$file_name;
        }
        $customer->update($data);
        return back()->with('success', 'Customer Created Succerssfully');
    }
    public function delete(Customer $customer) {
        $customer->delete();
        return redirect()->route('customer.all')->with('success', 'Customer Created Succerssfully');
    }
}
