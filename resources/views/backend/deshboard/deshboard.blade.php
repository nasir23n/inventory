@extends('backend.layouts.app')

@section('content')
<div class="panel">
    <div class="header">
        <h2>Header</h2>
    </div>
    <div class="body">
        <div class="container_fluid">
            <div class="row">
                <!-- ------------------------ -->
                <div class="col_lg_4 col_md_6 col_sm_6">
                    <div class="deshboard_items default">
                        <div class="deshboard_icon"><i class="fas fa-hammer"></i></div>
                        <div class="deshboard_content">
                            <h3>Total Employee</h3>
                            <p>0</p>
                        </div>
                    </div>
                </div>
                <!-- ------------------------ -->
                <div class="col_lg_4 col_md_6 col_sm_6">
                    <div class="deshboard_items teal">
                        <div class="deshboard_icon"><i class="fas fa-shopping-basket"></i></div>
                        <div class="deshboard_content">
                            <h3>Total Product</h3>
                            <p>0</p>
                        </div>
                    </div>
                </div>
                <!-- ------------------------ -->
                <div class="col_lg_4 col_md_6 col_sm_6">
                    <div class="deshboard_items success">
                        <div class="deshboard_icon"><i class="fas fa-donate"></i></div>
                        <div class="deshboard_content">
                            <h3>Expense this month</h3>
                            <p>0</p>
                        </div>
                    </div>
                </div>
                <!-- ------------------------ -->
                <div class="col_lg_4 col_md_6 col_sm_6">
                    <div class="deshboard_items danger">
                        <div class="deshboard_icon"><i class="fa fa-cubes"></i></div>
                        <div class="deshboard_content">
                            <h3>lorem ipsum</h3>
                            <p>0</p>
                        </div>
                    </div>
                </div>
                <!-- ------------------------ -->
                <div class="col_lg_4 col_md_6 col_sm_6">
                    <div class="deshboard_items purple">
                        <div class="deshboard_icon"><i class="fa fa-empire"></i></div>
                        <div class="deshboard_content">
                            <h3>lorem ipsum</h3>
                            <p>0</p>
                        </div>
                    </div>
                </div>
                <!-- ------------------------ -->
                <div class="col_lg_4 col_md_6 col_sm_6">
                    <div class="deshboard_items green">
                        <div class="deshboard_icon"><i class="fa fa-filter"></i></div>
                        <div class="deshboard_content">
                            <h3>lorem ipsum</h3>
                            <p>0</p>
                        </div>
                    </div>
                </div>
                <!-- ------------------------ -->
            </div>
        </div>
    </div>
    <div class="footer">Footer</div>
</div>

<style>
.deshboard_items{
    display: flex;
    border-radius: 0 60px 60px 0;
    background: #e91e63;
    color: #fff;
    margin-bottom: 25px;
    box-shadow: 0 5px 10px 0 rgba(0,0,0,0.2);
}

.deshboard_content {
    padding: 20px 10px;
}
.deshboard_content * {
    margin: 0;
    font-size: 18px;
}
.deshboard_content p {
    margin: 0 !important;
    font-size: 15px;
}
.deshboard_icon {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 70px;
    font-size: 35px;
    background: rgba(255, 255, 255, 0.28);
}
.deshboard_items.default {
  background: #2c8edc;
  -webkit-box-shadow: 0 5px 10px 0 rgba(44, 142, 220, 0.4);
          box-shadow: 0 5px 10px 0 rgba(44, 142, 220, 0.4);
}

.deshboard_items.primary {
  background: #5668ce;
  -webkit-box-shadow: 0 5px 10px 0 rgba(86, 104, 206, 0.4);
          box-shadow: 0 5px 10px 0 rgba(86, 104, 206, 0.4);
}

.deshboard_items.secondary {
  background: #aa66cc;
  -webkit-box-shadow: 0 5px 10px 0 rgba(170, 102, 204, 0.4);
          box-shadow: 0 5px 10px 0 rgba(170, 102, 204, 0.4);
}

.deshboard_items.success {
  background: #2dce89;
  -webkit-box-shadow: 0 5px 10px 0 rgba(45, 206, 137, 0.4);
          box-shadow: 0 5px 10px 0 rgba(45, 206, 137, 0.4);
}

.deshboard_items.danger {
  background: #f5365c;
  -webkit-box-shadow: 0 5px 10px 0 rgba(245, 54, 92, 0.4);
          box-shadow: 0 5px 10px 0 rgba(245, 54, 92, 0.4);
}

.deshboard_items.warning {
  background: #ffb41d;
  -webkit-box-shadow: 0 5px 10px 0 rgba(255, 180, 29, 0.4);
          box-shadow: 0 5px 10px 0 rgba(255, 180, 29, 0.4);
}

.deshboard_items.info {
  background: #38b1de;
  -webkit-box-shadow: 0 5px 10px 0 rgba(56, 177, 222, 0.4);
          box-shadow: 0 5px 10px 0 rgba(56, 177, 222, 0.4);
}

.deshboard_items.facebook {
  background: #3b5999;
  -webkit-box-shadow: 0 5px 10px 0 rgba(59, 89, 153, 0.4);
          box-shadow: 0 5px 10px 0 rgba(59, 89, 153, 0.4);
}

.deshboard_items.green {
  background: #4caf50;
  -webkit-box-shadow: 0 5px 10px 0 rgba(76, 175, 80, 0.4);
          box-shadow: 0 5px 10px 0 rgba(76, 175, 80, 0.4);
}

.deshboard_items.purple {
  background: #9c27b0;
  -webkit-box-shadow: 0 5px 10px 0 rgba(156, 39, 176, 0.4);
          box-shadow: 0 5px 10px 0 rgba(156, 39, 176, 0.4);
}

.deshboard_items.deep_purple {
  background: #673ab7;
  -webkit-box-shadow: 0 5px 10px 0 rgba(103, 58, 183, 0.4);
          box-shadow: 0 5px 10px 0 rgba(103, 58, 183, 0.4);
}

.deshboard_items.indigo {
  background: #3f51b5;
  -webkit-box-shadow: 0 5px 10px 0 rgba(63, 81, 181, 0.4);
          box-shadow: 0 5px 10px 0 rgba(63, 81, 181, 0.4);
}

.deshboard_items.teal {
  background: #009688;
  -webkit-box-shadow: 0 5px 10px 0 rgba(0, 150, 136, 0.4);
          box-shadow: 0 5px 10px 0 rgba(0, 150, 136, 0.4);
}

.deshboard_items.orange {
  background: #ff9800;
  -webkit-box-shadow: 0 5px 10px 0 rgba(255, 152, 0, 0.4);
          box-shadow: 0 5px 10px 0 rgba(255, 152, 0, 0.4);
}


.deshboard_items.dark {
  background: #172b4d;
  -webkit-box-shadow: 0 5px 10px 0 rgba(23, 43, 77, 0.4);
          box-shadow: 0 5px 10px 0 rgba(23, 43, 77, 0.4);
}

.deshboard_items.black {
  background: #222222;
  -webkit-box-shadow: 0 5px 10px 0 rgba(34, 34, 34, 0.4);
          box-shadow: 0 5px 10px 0 rgba(34, 34, 34, 0.4);
}

.deshboard_items.red {
  background: #f44336;
  -webkit-box-shadow: 0 5px 10px 0 rgba(244, 67, 54, 0.4);
          box-shadow: 0 5px 10px 0 rgba(244, 67, 54, 0.4);
}

.deshboard_items.pink {
  background: #e91e63;
  -webkit-box-shadow: 0 5px 10px 0 rgba(233, 30, 99, 0.4);
          box-shadow: 0 5px 10px 0 rgba(233, 30, 99, 0.4);
}

.deshboard_items.blue {
  background: #2196f3;
  -webkit-box-shadow: 0 5px 10px 0 rgba(33, 150, 243, 0.4);
          box-shadow: 0 5px 10px 0 rgba(33, 150, 243, 0.4);
}

.deshboard_items.cyan {
  background: #00bcd4;
  -webkit-box-shadow: 0 5px 10px 0 rgba(0, 188, 212, 0.4);
          box-shadow: 0 5px 10px 0 rgba(0, 188, 212, 0.4);
}

.deshboard_items.yellow {
  background: #fbd02d;
  -webkit-box-shadow: 0 5px 10px 0 rgba(251, 208, 45, 0.4);
          box-shadow: 0 5px 10px 0 rgba(251, 208, 45, 0.4);
}


.deshboard_items.grey {
  background: #517385;
  -webkit-box-shadow: 0 5px 10px 0 rgba(81, 115, 133, 0.4);
          box-shadow: 0 5px 10px 0 rgba(81, 115, 133, 0.4);
}

.deshboard_items.fave {
  background: #2956ab;
  -webkit-box-shadow: 0 5px 10px 0 rgba(41, 86, 171, 0.4);
          box-shadow: 0 5px 10px 0 rgba(41, 86, 171, 0.4);
}
</style>
@endsection