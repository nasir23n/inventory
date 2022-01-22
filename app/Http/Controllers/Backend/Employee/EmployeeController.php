<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
        $this->data['employee_active'] = 'active';
    }
    public function index() {
        $this->data['employee_add_active'] = 'active';
        return view('backend.employee.add', $this->data);
    }
    public function all() {
        $this->data['employee_all_active'] = 'active';
        $this->data['employee'] = Employee::orderBy('created_at', 'DESC')->paginate(20);
        return view('backend.employee.all', $this->data);
    }
    public function store(Request $request) {
        $request->validate([
            'full_name' => 'required',
            'phone' => 'required',
            'sallery' => 'required',
            'nid' => 'required',
            'joining_date' => 'required',
        ]);
        $data = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'sallery' => $request->sallery,
            'nid' => $request->nid,
            'joining_date' => $request->joining_date,
            'profile' => '',
        ];
        if ($request->hasFile('profile')) {
            $request->validate([
                'profile' => 'image|mimes:jpeg,jpg,png,gif,webp|max:5120'
            ]);
            $image_name = $request->profile->hashName();
            $request->profile->move(public_path('backend/image/employee'), $image_name);
            $data['profile'] = asset('backend/image/employee').'/'.$image_name;
        }
        Employee::create($data);
        return back()->with('success', 'Employee created successfully!');
    }
    public function edit(Employee $employee) {
        $this->data['employee'] = $employee;
        return view('backend.employee.edit', $this->data);
    }
    public function update(Request $request ,Employee $employee) {
        $request->validate([
            'full_name' => 'required',
            'phone' => 'required',
            'sallery' => 'required',
            'nid' => 'required',
            'joining_date' => 'required',
        ]);
        $data = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'sallery' => $request->sallery,
            'nid' => $request->nid,
            'joining_date' => $request->joining_date,
        ];
        if ($request->hasFile('profile')) {
            $request->validate([
                'profile' => 'image|mimes:jpeg,jpg,png,gif,webp|max:5120'
            ]);
            $image_name = $request->profile->hashName();
            $request->profile->move(public_path('backend/image/employee'), $image_name);
            $data['profile'] = asset('backend/image/employee').'/'.$image_name;
            if (is_file(public_path('backend/image/employee').'/'.basename($employee->profile))) {
                unlink(public_path('backend/image/employee').'/'.basename($employee->profile));
            }
        }
        $employee->update($data);
        return redirect()->route('employee.all')->with('success', 'Employee update successfully!');
    }
    public function delete(Employee $employee) {
        if (is_file(public_path('backend/image/employee').'/'.basename($employee->profile))) {
            unlink(public_path('backend/image/employee').'/'.basename($employee->profile));
        }
        $employee->delete();
        return back()->with('success', 'Employee deleted successfully!');
    }
}
