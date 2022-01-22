<?php

namespace App\Http\Controllers\Backend\Salary;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
        $this->data['salary_active'] = 'active';
    }
    public function index() {
        $this->data['salary_add_active'] = 'active';
        $this->data['employee'] = Employee::orderBy('created_at', 'DESC')->get();
        return view('backend.salary.pay_to', $this->data);
    }
    public function pay(Employee $employee) {
        $this->data['salary_add_active'] = 'active';
        $this->data['employee'] = $employee;
        return view('backend.salary.add', $this->data);
    }
    public function all() {
        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July ',
            'August',
            'September',
            'October',
            'November',
            'December',
        ];
        $arr = [];
        for ($i=0; $i < count($months); $i++) {
            $sl = DB::table('salaries')->where('mounth', $months[$i])->get()->toArray();
            if (count($sl)) {
                array_push($arr, $months[$i]);
            }
        }
        $this->data['mounth'] = Collection::make($arr);
        $this->data['salary_all_active'] = 'active';
        return view('backend.salary.all', $this->data);
        // $this->data['salary'] = Salary::orderBy('created_at', 'DESC')->get(); 
    }
    public function view_salary($mounth_name) {
        $this->data['salary'] = Salary::where('mounth', $mounth_name)->get();
        $this->data['mounth'] = $mounth_name;
        return view('backend.salary.view_salary', $this->data);
    }
    public function store(Request $request, Employee $employee) {
        $request->validate([
            'mounth' => 'required',
            'salary' => 'required',
        ]);
        $ex = Salary::where([
            'mounth' => $request->mounth,
            'employee_id' => $employee->id,
        ])->get();
        $data = [
            'name' => $employee->full_name,
            'email' => $employee->email,
            'mounth' => $request->mounth,
            'salary' => $request->salary,
            'employee_id' => $employee->id,
        ];
        if (count($ex) > 0) {
            return back()->withErrors('Salary Already paid in this month!');
        }
        Salary::create($data);
        return back()->with('success', 'Salary Created Successfully!');
    }
    public function edit(Salary $salary) {
        $month = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July ',
            'August',
            'September',
            'October',
            'November',
            'December',
        ];
        $this->data['mounth'] = Collection::make($month);
        $this->data['salary'] = $salary;
        return view('backend.salary.edit', $this->data);
    }
    public function update(Request $request, Salary $salary) {
        $request->validate([
            'mounth' => 'required',
            'salary' => 'required',
        ]);
        $salary->update([
            'mounth' => $request->mounth,
            'salary' => $request->salary,
        ]);
        return back()->with('success', 'Salary Update Successfully');
    }
    public function delete() {}
}
