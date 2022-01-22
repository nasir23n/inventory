<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin panel</title>
    <link rel="stylesheet" href="{{ asset('common/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/master.css') }}">
    <link rel="stylesheet" href="{{ asset('common/css/waves.min.css') }}">
    <script src="{{ asset('common/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('common/js/waves.min.js') }}"></script>
    <script src="{{ asset('backend/js/nl.js') }}"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700" rel="stylesheet">
    <script>
        var url = (location.origin == "http://localhost") ? location.origin + "/" + location.pathname.split("/")[1] +
            "/" : location.origin + "/";
        let goTop = function() {
            $("html, body").animate({ scrollTop: 0 }, 200);
        }
    </script>
    @stack('header_css')
    @stack('header_js')
</head>
<body> 
    <form id="logOut" action="{{ route('admin.logout') }}" method="post">
        @csrf
    </form>
    <div class="main_wrap">
        <div class="aside" id="aside">
            <a href="{{ route('admin.deshboard') }}" class="aside_top wev_effect">
                ADMIN PANEL
            </a>
            <div class="aside_fixed_part">
                <div class="aside_profile">
                    <div class="profile_image">
                        <img src="{{ asset('backend/image/user.svg') }}" alt="U">
                    </div>
                    <div class="info">
                        <h4 class="name">Nasrullah</h4>
                        <p>entnasir23a@gmail.com</p>
                    </div>
                </div>
                <ul class="aside_links">
                    <li>
                        <a class="wev_effect @isset($deshboard_active) {{ $deshboard_active }} @endisset" href="{{ route('admin.deshboard') }}">
                            <i class="aside_icon fa fa-tachometer-alt"></i>
                            Deshboard
                        </a>
                    </li>
                    <li class="aside_drop">
                        <a href="javascript:void(0)" class="aside_drop_btn wev_effect @isset($employee_active) {{ $employee_active }} @endisset">
                            <i class="aside_icon fas fa-hammer"></i>
                            Employee
                        </a>
                        <ul>
                            <li><a class="wev_effect @isset($employee_add_active) {{ $employee_add_active }} @endisset" href="{{ route('employee.add') }}">Add Employee</a></li>
                            <li><a class="wev_effect @isset($employee_all_active) {{ $employee_all_active }} @endisset" href="{{ route('employee.all') }}">All Employee</a></li>
                        </ul>
                    </li>
                    <li class="aside_drop">
                        <a href="javascript:void(0)" class="aside_drop_btn wev_effect @isset($supplier_active) {{ $supplier_active }} @endisset">
                            <i class="aside_icon fas fa-user-secret"></i>
                            Supplier
                        </a>
                        <ul>
                            <li><a class="wev_effect @isset($supplier_add_active) {{ $supplier_add_active }} @endisset" href="{{ route('supplier.add') }}">Add Supplier</a></li>
                            <li><a class="wev_effect @isset($supplier_all_active) {{ $supplier_all_active }} @endisset" href="{{ route('supplier.all') }}">All Supplier</a></li>
                        </ul>
                    </li>
                    <li class="aside_drop">
                        <a href="javascript:void(0)" class="aside_drop_btn wev_effect @isset($catagory_active) {{ $catagory_active }} @endisset">
                            <i class="aside_icon far fa-list-alt"></i>
                            Category
                        </a>
                        <ul>
                            <li><a class="wev_effect @isset($catagory_add_active) {{ $catagory_add_active }} @endisset" href="{{ route('catagory.add') }}">Add Category</a></li>
                            <li><a class="wev_effect @isset($catagory_all_active) {{ $catagory_all_active }} @endisset" href="{{ route('catagory.all') }}">All Category</a></li>
                        </ul>
                    </li>
                    <li class="aside_drop">
                        <a href="javascript:void(0)" class="aside_drop_btn wev_effect @isset($product_active) {{ $product_active }} @endisset">
                            <i class="aside_icon fas fa-shopping-basket"></i>
                            Product
                        </a>
                        <ul>
                            <li><a class="wev_effect @isset($product_add_active) {{ $product_add_active }} @endisset" href="{{ route('product.add') }}">Add Product</a></li>
                            <li><a class="wev_effect @isset($product_all_active) {{ $product_all_active }} @endisset" href="{{ route('product.all') }}">All Product</a></li>
                        </ul>
                    </li>
                    <li class="aside_drop">
                        <a href="javascript:void(0)" class="aside_drop_btn wev_effect @isset($expense_active) {{ $expense_active }} @endisset">
                            <i class="aside_icon fas fa-donate"></i>
                            Expense
                        </a>
                        <ul>
                            <li><a class="wev_effect @isset($expense_add_active) {{ $expense_add_active }} @endisset" href="{{ route('expense.add') }}">Add Product</a></li>
                            <li><a class="wev_effect @isset($expense_all_active) {{ $expense_all_active }} @endisset" href="{{ route('expense.all') }}">All Product</a></li>
                        </ul>
                    </li>
                    <li class="aside_drop">
                        <a href="javascript:void(0)" class="aside_drop_btn wev_effect @isset($customer_active) {{ $customer_active }} @endisset">
                            <i class="aside_icon fas fa-user-friends"></i>
                            Customer
                        </a>
                        <ul>
                            <li><a class="wev_effect @isset($customer_add_active) {{ $customer_add_active }} @endisset" href="{{ route('customer.add') }}">Add Product</a></li>
                            <li><a class="wev_effect @isset($customer_all_active) {{ $customer_all_active }} @endisset" href="{{ route('customer.all') }}">All Product</a></li>
                        </ul>
                    </li>
                    <li class="aside_drop">
                        <a href="javascript:void(0)" class="aside_drop_btn wev_effect @isset($salary_active) {{ $salary_active }} @endisset">
                            <i class="aside_icon fas fa-gifts"></i>
                            Salary
                        </a>
                        <ul>
                            <li><a class="wev_effect @isset($salary_add_active) {{ $salary_add_active }} @endisset" href="{{ route('salary.pay_to') }}">Add Salary</a></li>
                            <li><a class="wev_effect @isset($salary_all_active) {{ $salary_all_active }} @endisset" href="{{ route('salary.all') }}">All Salaryt</a></li>
                        </ul>
                    </li>
                    <li><a class="wev_effect" href="javascript:void(0)">More Class</a></li>
                </ul>
            </div>
        </div>
        <div class="content_wrap">
            <div class="top_nav">
                <button class="top_nav_toggle wev_effect" id="nav_toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <a href="{{ route('admin.deshboard') }}" class="hidden_home">ADMIN PANEL</a>
                <div class="setting_drop">
                    <div class="drop_container">
                        <button class="drop wev_effect"><i class="fa fa-cog"></i></button>
                        <ul class="drop_element drop_right">
							<li><a href="javascript:void(0)"><i class="fa fa-cogs"></i>Vew profile</a></li>
							<li><a href=""><i class="fa fa-users"></i>All Admin</a></li>
							<li><a href="javascript:void(0)"><i class="fa fa-user"></i>Create profile</a></li>
							<li><a href="javascript:void(0)"><i class="fa fa-adjust"></i>Panel layout</a></li>
							<li><a href="javascript:void(0)" onclick="document.getElementById('logOut').submit()"><i class="fa fa-sign-out-alt"></i>Logout</a></li>
						</ul>
                    </div>
                </div>
            </div>
            <div class="main_content"> 
                
                @yield('content')

            </div>
        </div>
    </div>
 
    <script src="{{ asset('backend/js/app.js') }}"></script>
    @stack('footer_js')
    </body>
</html>