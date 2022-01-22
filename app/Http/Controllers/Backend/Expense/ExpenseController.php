<?php

namespace App\Http\Controllers\Backend\Expense;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public $data = [];
    public function __construct() {
        $this->middleware('auth:admin');
        $this->data['expense_active'] = 'active';
    }
    public function index() {
        $this->data['expense_add_active'] = 'active';
        return view('backend.expense.add', $this->data);
    }
    public function all() {
        $this->data['expense_all_active'] = 'active';
        $this->data['expense'] = Expense::orderBy('created_at', 'DESC')->get();
        return view('backend.expense.all', $this->data);
    }
    public function store(Request $request) {
        $request->validate([
            'details' => 'required',
            'amount' => 'required'
        ]);
        Expense::create([
            'details' => $request->details,
            'amount' => $request->amount
        ]);
        return redirect()->route('expense.add')->with('success', 'Expense Created Successfuly!');
    }
    public function edit(Expense $expense) {
        $this->data['expense'] = $expense;
        return view('backend.expense.edit', $this->data);
    }
    public function update(Request $request, Expense $expense) {
        $request->validate([
            'details' => 'required',
            'amount' => 'required'
        ]);
        $expense->update([
            'details' => $request->details,
            'amount' => $request->amount
        ]);
        return redirect()->route('expense.all')->with('success', 'Expense Updated Successfuly!');
    }
    public function delete(Expense $expense) {
        $expense->delete();
        return redirect()->route('expense.all')->with('success', 'Expense Deleted Successfuly!');
    }
}
