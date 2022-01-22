<?php

use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Catagory\CatagoryController;
use App\Http\Controllers\Backend\Customer\CustomerController;
use App\Http\Controllers\Backend\Deshboard\DeshboardController;
use App\Http\Controllers\Backend\Employee\EmployeeController;
use App\Http\Controllers\Backend\Expense\ExpenseController;
use App\Http\Controllers\Backend\Product\ProductController;
use App\Http\Controllers\Backend\Salary\SalaryController;
use App\Http\Controllers\Backend\Supplier\SupplierController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function() {
    Route::get('login', [LoginController::class, 'show_login_form'])->name('admin.login');
    Route::post('login', [LoginController::class, 'login']);

    Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::get('deshboard', [DeshboardController::class, 'index'])->name('admin.deshboard');

    /**
     * Features routes
     */
    Route::get('employee/add', [EmployeeController::class, 'index'])->name('employee.add');
    Route::post('employee/add', [EmployeeController::class, 'store']);
    Route::get('employee/all', [EmployeeController::class, 'all'])->name('employee.all');
    Route::get('employee/{employee}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::post('employee/{employee}/update', [EmployeeController::class, 'update'])->name('employee.update');
    Route::delete('employee/{employee}/delete', [EmployeeController::class, 'delete'])->name('employee.delete');

    Route::get('supplier/add', [SupplierController::class, 'index'])->name('supplier.add');
    Route::post('supplier/add', [SupplierController::class, 'store']);
    Route::get('supplier/all', [SupplierController::class, 'all'])->name('supplier.all');
    Route::get('supplier/{supplier}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::post('supplier/{supplier}/update', [SupplierController::class, 'update'])->name('supplier.update');
    Route::delete('supplier/{supplier}/delete', [SupplierController::class, 'delete'])->name('supplier.delete');
    
    Route::get('catagory/add', [CatagoryController::class, 'index'])->name('catagory.add');
    Route::post('catagory/add', [CatagoryController::class, 'store']);
    Route::get('catagory/all', [CatagoryController::class, 'all'])->name('catagory.all');
    Route::get('catagory/{catagory}/edit', [CatagoryController::class, 'edit'])->name('catagory.edit');
    Route::post('catagory/{catagory}/update', [CatagoryController::class, 'update'])->name('catagory.update');
    Route::delete('catagory/{catagory}/delete', [CatagoryController::class, 'delete'])->name('catagory.delete');

    Route::get('product/add', [ProductController::class, 'index'])->name('product.add');
    Route::post('product/add', [ProductController::class, 'store']);
    Route::get('product/all', [ProductController::class, 'all'])->name('product.all');
    Route::get('product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('product/{product}/update', [ProductController::class, 'update'])->name('product.update');
    Route::delete('product/{product}/delete', [ProductController::class, 'delete'])->name('product.delete');
    
    Route::get('expense/add', [ExpenseController::class, 'index'])->name('expense.add');
    Route::post('expense/add', [ExpenseController::class, 'store']);
    Route::get('expense/all', [ExpenseController::class, 'all'])->name('expense.all');
    Route::get('expense/{expense}/edit', [ExpenseController::class, 'edit'])->name('expense.edit');
    Route::post('expense/{expense}/update', [ExpenseController::class, 'update'])->name('expense.update');
    Route::delete('expense/{expense}/delete', [ExpenseController::class, 'delete'])->name('expense.delete');
    
    Route::get('customer/add', [CustomerController::class, 'index'])->name('customer.add');
    Route::post('customer/add', [CustomerController::class, 'store']);
    Route::get('customer/all', [CustomerController::class, 'all'])->name('customer.all');
    Route::get('customer/{customer}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('customer/{customer}/update', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('customer/{customer}/delete', [CustomerController::class, 'delete'])->name('customer.delete');

    Route::get('salary/salary', [SalaryController::class, 'index'])->name('salary.pay_to');
    Route::get('salary/{employee}/pay', [SalaryController::class, 'pay'])->name('salary.pay');
    Route::post('salary/{employee}/pay', [SalaryController::class, 'store']);
    Route::get('salary/all', [SalaryController::class, 'all'])->name('salary.all');
    Route::get('salary/{mounth}', [SalaryController::class, 'view_salary'])->name('salary.view');
    Route::get('salary/{salary}/edit', [SalaryController::class, 'edit'])->name('salary.edit');
    Route::post('salary/{salary}/update', [SalaryController::class, 'update'])->name('salary.update');
    // Route::post('customer/add', [CustomerController::class, 'store']);
    // Route::get('customer/all', [CustomerController::class, 'all'])->name('customer.all');
    // Route::get('customer/{customer}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
    // Route::post('customer/{customer}/update', [CustomerController::class, 'update'])->name('customer.update');
    // Route::delete('customer/{customer}/delete', [CustomerController::class, 'delete'])->name('customer.delete');
    // /**
    //  * Product routes
    //  */
    // Route::get('product/add', [ProductController::class, 'index'])->name('product.add');
    // Route::post('product/info', [ProductController::class, 'info_add'])->name('product.info.add');
    // Route::get('product/{product}/info', [ProductController::class, 'info_edit'])->name('product.info.edit');
    // Route::post('product/{product}/update', [ProductController::class, 'info_update'])->name('product.info.update');
    // Route::get('product/{product}/gallery', [ProductController::class, 'gallery'])->name('product.gallery');
    // Route::get('product/{product}/publish', [ProductController::class, 'publish'])->name('product.publish');
    // Route::post('product/{product}/publish', [ProductController::class, 'publish_product']);


    // Route::get('product/all', [ProductController::class, 'all'])->name('product.all');
    // Route::post('product/{product}/single_upload', [ProductController::class, 'single_upload'])->name('single_upload');
    // Route::post('product/{product}/multi_upload', [ProductController::class, 'multi_upload'])->name('multi_upload');

    // Route::post('product/{product}/delete_multi', [ProductController::class, 'delete_multi'])->name('delete_multi');
    // Route::post('product/{product}/delete_single', [ProductController::class, 'delete_single'])->name('delete_single');

    // // Route::post('remove', [ProductController::class, 'remove'])->name('remove');
    // // Route::post('product/add', [ProductController::class, 'store']);
    // // Route::get('product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
    // // Route::put('product/update/{product}', [ProductController::class, 'update'])->name('product.update');
    // // Route::delete('product/delete/{product}', [ProductController::class, 'delete'])->name('product.delete');

    // Route::get('product/croup', function() {
    //     return view('backend.product.croup');
    // });
});


