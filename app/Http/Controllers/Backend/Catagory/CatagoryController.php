<?php

namespace App\Http\Controllers\Backend\Catagory;

use App\Http\Controllers\Controller;
use App\Models\Catagory;
use Illuminate\Http\Request;

class CatagoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
        $this->data['catagory_active'] = 'active';
    }
    public function index() {
        $this->data['catagory_add_active'] = 'active';
        return view('backend.catagory.add', $this->data);
    }
    public function store(Request $request) {
        $request->validate(['name' => 'required']);

        Catagory::create([
            'c_name' => $request->name,
        ]);
        return back()->with('success', 'Catagory Created Successfully!');
    }
    public function all() {
        $this->data['catagory_all_active'] = 'active';
        $this->data['catagory'] = Catagory::orderBy('created_at', 'DESC')->get();
        return view('backend.catagory.all', $this->data);
    }
    public function edit(Catagory $catagory) {
        $this->data['catagory'] = $catagory;
        return view('backend.catagory.edit', $this->data);
    }
    public function update(Request $request, Catagory $catagory) {
        $request->validate(['name' => 'required']);
        $catagory->update([
            'c_name' => $request->name
        ]);
        return redirect()->route('catagory.all')->with('success', 'Catagory updated successfully!');
    }
    public function delete(Catagory $catagory) {
        $catagory->delete();
        return redirect()->route('catagory.all')->with('success', 'Catagory deleted successfully!');
    }
}
